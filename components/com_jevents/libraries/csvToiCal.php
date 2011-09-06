<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: csvToiCal.php 2255 2011-06-29 08:27:21Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2010 GWE Systems Ltd, 2006-2008 JEvents Project Group
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once("csvLine.php");

if (!function_exists('str_getcsv')) {
	function str_getcsv($input, $delimiter=',', $enclosure='"', $escape=null, $eol=null) {
  $temp=fopen("php://memory", "rw");
  fwrite($temp, $input);
  fseek($temp, 0);
  $r=fgetcsv($temp, 4096, $delimiter, $enclosure);
  fclose($temp);
  return $r;
}
}
/**
 * Class used for CSV transformation to iCal format
 */
class CsvToiCal {

    var $rawText;
    var $file;
    var $columnSeparator;
    var $colsOrder =  array();
    var $colsNum = 0; // to check if every line has right number of columns

    var $tmpFileName;
    var $tmpfile;

    var $timezone = "UTC"; // default timezone

    /**
     * default constructor
     *
     * @param file filename to process
     * @param columnSeparator separator of columns in CSV file - default ,
     */
    public function csvToiCal($file, $columnSeparator = ",") {
        $this->file = $file;
        $this->columnSeparator = $columnSeparator;

        $this->parseFileHeader();

        if(!$this->detectHeadersValidity()) {
            JError::raiseWarning(0, 'Not valid CSV file uploaded - mandatory
                                    cols CATEGORIES, SUMMARY, DTSTART, DTEND and
                                    TIMEZONE are required. Fix your CSV please.');
            return false;
        }
        if(!$this->convertFile()) {
            JError::raiseWarning(0, 'Detected corruption in CSV file - import canceled.');
            return false;
        }
        JError::raiseNotice(0, 'CSV succesfully converted.');
    }

    /**
     * Function for retrive converted temp file information
     *
     * @return array with name and path to temp file
     */
    public function getConvertedTempFile() {
        $file = array("name" => substr($this->tmpFileName, strrpos($this->tmpFileName, DIRECTORY_SEPARATOR) + 1),
                      "tmp_name" => $this->tmpFileName);
        return $file;
    }

    /**
     * Function for retrieve raw converted data from temp file
     *
     * @return raw data converted CSV to iCal
     */
    public function getRawData() {
        return @file_get_contents($this->tmpFileName);
    }

    /**
     * Function parses first line of the CSV input with headers
     */
    private function parseFileHeader() {
        $fp = fopen( $this->file, 'r' );
        $line = fgets($fp, 4096);
        $line = trim($line); // remove white spaces, at the end always \n (or \r\n)
        fclose($fp);
        $headers = explode($this->columnSeparator, $line);
        $this->colsNum = count($headers);
        for($i = 0; $i < $this->colsNum; $i++) {
            $this->colsOrder[str_replace('"','',trim($headers[$i]))] = $i;
            // some people let white space at the end of text, so better to trim
            // CSV has often begining and ending " - replace it
        }
    }

    /**
     * Function parses Csv line due previously detected column order,
     * special treatment for mandatory columns
     *
     * @return parsed data line or false if error
     */
    private function parseCsvLine($line) {
		$data = str_getcsv($line);
        // different count of data cols than header cols, bad CSV
        if(count($data) != $this->colsNum && count($data) != 1) { // == 1 probably last empty line
        // different number of cols than in header, file is not in correct format
            return false;
        }
        $dataLine = new CsvLine($data[$this->colsOrder["CATEGORIES"]],
                                $data[$this->colsOrder["SUMMARY"]],
                                $data[$this->colsOrder["DTSTART"]],
                                $data[$this->colsOrder["DTEND"]]);
        if(isset($this->colsOrder["TIMEZONE"]))
                $dataLine->setTimezone($data[$this->colsOrder["TIMEZONE"]]);
        if(isset($this->colsOrder["LOCATION"]))
                $dataLine->setLocation($data[$this->colsOrder["LOCATION"]]);
        if(isset($this->colsOrder["DTSTAMP"]))
                $dataLine->setDtstamp($data[$this->colsOrder["DTSTAMP"]]);
        if(isset($this->colsOrder["X-EXTRAINFO"]))
                $dataLine->setExtraInfo($data[$this->colsOrder["X-EXTRAINFO"]]);
        if(isset($this->colsOrder["CONTACT"]))
                $dataLine->setContact ($data[$this->colsOrder["CONTACT"]]);
        if(isset($this->colsOrder["DESCRIPTION"]))
                $dataLine->setDescription ($data[$this->colsOrder["DESCRIPTION"]]);
        if(isset($this->colsOrder["RRULE"]))
                $dataLine->setRrule ($data[$this->colsOrder["RRULE"]]);
        return $dataLine;
    }

    /**
     * Check, if mandatory cols are present
     *
     * @return true if necessary headers present, false if not
     */
    private function detectHeadersValidity() {
        if(isSet($this->colsOrder["CATEGORIES"]) &&
           isSet($this->colsOrder["SUMMARY"]) &&
           isSet($this->colsOrder["DTSTART"]) &&
           isSet($this->colsOrder["DTEND"]) &&
           isSet($this->colsOrder["TIMEZONE"])) return true;
        else return false;
    }

    /**
     * Constructs new temporary file in iCal format, which will be
     * used in CSV transformation
     */
    private function createNewTmpICal() {
		$config =& JFactory::getConfig();
        $this->tmpFileName = tempnam($config->getValue('config.tmp_path'), "phpJE");
        //$this->tmpFileName = tempnam("/tmp", "phpJE");
        $this->tmpfile = fopen($this->tmpFileName, "w");
        fwrite($this->tmpfile, "BEGIN:VCALENDAR\n");
        fwrite($this->tmpfile, "VERSION:2.0\n");
        fwrite($this->tmpfile, "PRODID:-//jEvents 2.0 for Joomla//EN\n");
        fwrite($this->tmpfile, "CALSCALE:GREGORIAN\n");
        fwrite($this->tmpfile, "METHOD:PUBLISH\n");
    }

    /**
     * Function finalizes temporary iCal file
     */
    private function finalizeTmpICal() {
        fwrite($this->tmpfile, "END:VCALENDAR\n");
        fclose($this->tmpfile);
    }

    /**
     * Function converts file from CSV to iCal
     *
     * @return true if success, false in case of error
     */
    private function convertFile($delimiter="\n") {
        $fp = fopen( $this->file, 'r' );
        $this->createNewTmpICal();  // creates new temporary iCal file

        $i = 1;
        while (!feof($fp)) {
            $buffer = fgets($fp);
            if($buffer == "") break; // end of file or empty line
            if(!$line = $this->parseCsvLine($buffer)) {
                // something gone wrong, CSV is corrupted, cancel
                return false;
            }
            if($i++ == 1) continue; // fist line is header, so continue
            fwrite($this->tmpfile, $line->getInICalFormat()); // write to the converted file
            $buffer = ''; // clear the buffer
        }

        $this->finalizeTmpICal();
        return true;
    }

}