<?php
/**
 * @package   gantry
 * @subpackage core
 * @version   3.0.3 June 12, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();

/**
 * @package   gantry
 * @subpackage core
 */
class GantryINI {
    /**
     * @param  $file
     * @param boolean $get_title
     * @param boolean $get_item
     * @param boolean $get_key
     * @return #Ffile_get_contents|array|?
     */
    function read($file, $get_title = false, $get_item = false, $get_key = false) {
        $data = file_get_contents($file);

        $inioutject = GantryINI::_readFile($data, true);

        $parse = get_object_vars( $inioutject );

		$data = array();
		foreach($parse as $title => $content) {
			foreach($content as $prefix => $value) {
				$tmp = explode("_", $prefix);
				$key = $tmp[0];
				$tmp = array_slice($tmp, 1);

				$key_prefix = implode("_", $tmp);

				if (!isset($data[$title][$key])) $data[$title][$key] = array();

				$data[$title][$key][$key_prefix] = $value;
			}
		}

		if ($get_title && !$get_item && !$get_key) {
			if (isset($data[$get_title])) return $data[$get_title];
			else return array();
		}

		if ($get_title && $get_item && !$get_key) {
			if (isset($data[$get_title]) && isset($data[$get_title][$get_item])) return $data[$get_title][$get_item];
			else return array();
		}

		if ($get_title && $get_item && $get_key) {
			if (isset($data[$get_title]) && isset($data[$get_title][$get_item]) && isset($data[$get_title][$get_item][$get_key]))
				return $data[$get_title][$get_item][$get_key];
			else return array();
		}

		return $data;
	}

    /**
     * @param  $file
     * @param  $data
     * @param boolean $merge_data
     * @param boolean $remove_empty
     * @return boolean
     */
    function write($file, $data, $merge_data = true, $remove_empty = true) {
		$ini_array = array();

		foreach($data as $title => $content) {
			$ini_array[$title] = array();
			foreach($content as $prefix => $values) {
				$ini_array[$title][$prefix] = array();
				foreach($values as $key => $value) {
					$ini_array[$title][$prefix][$key] = $value;
				}
			}
		}


        $merged = $ini_array;

        if ($merge_data || $merge_data === 'delete-key'){
            $ini_content = GantryINI::read($file);
            $merged = GantryINI::_array_merge_replace_recursive($ini_content, $ini_array);

            if ($merge_data === 'delete-key') {
                $merged = GantryINI::_deleteKey($merged, $data);
            }
        }

        $isempty = true;
		foreach($merged as $title => $content) {
            foreach($content as $key => $values) {
                foreach($values as $prefix => $value) {
                    $isempty = false;
                    break(3);
                }
            }
        }

        if (!$isempty) {
            $output = "";
			foreach($merged as $title => $content) {
				$output .= "\n[".$title."]\n";
				foreach($content as $key => $values) {
					$key = $key . "_";
					foreach($values as $prefix => $value) {
						$output .= $key . $prefix . "=" . $value . "\n";
					}
				}
			}

			$output = substr($output, 1, strlen($output));

			if (file_put_contents($file, $output)) return true;
			else return false;
		}
        else if ($remove_empty){
            if (file_exists($file) && is_writeable($file)){
                unlink($file);
            }
        }
	}

    function &_readFile( $data, $process_sections = false )
    {
        static $inistocache;

        if (!isset( $inistocache )) {
            $inistocache = array();
        }

        if (is_string($data))
        {
            $lines = explode("\n", $data);
            $hash = md5($data);
        }
        else
        {
            if (is_array($data)) {
                $lines = $data;
            } else {
                $lines = array ();
            }
            $hash = md5(implode("\n",$lines));
        }

        if(array_key_exists($hash, $inistocache)) {
            return $inistocache[$hash];
        }

        $obj = new stdClass();

        $sec_name = '';
        $unparsed = 0;
        if (!$lines) {
            return $obj;
        }

        foreach ($lines as $line)
        {
            // ignore comments
            if ($line && $line{0} == ';') {
                continue;
            }

            $line = trim($line);

            if ($line == '') {
                continue;
            }

            $lineLen = strlen($line);
            if ($line && $line{0} == '[' && $line{$lineLen-1} == ']')
            {
                $sec_name = substr($line, 1, $lineLen - 2);
                if ($process_sections) {
                    $obj-> $sec_name = new stdClass();
                }
            }
            else
            {
                if ($pos = strpos($line, '='))
                {
                    $property = trim(substr($line, 0, $pos));

                    // property is assumed to be ascii
                    if ($property && $property{0} == '"')
                    {
                        $propLen = strlen( $property );
                        if ($property{$propLen-1} == '"') {
                            $property = stripcslashes(substr($property, 1, $propLen - 2));
                        }
                    }
                    // AJE: 2006-11-06 Fixes problem where you want leading spaces
                    // for some parameters, eg, class suffix
                    // $value = trim(substr($line, $pos +1));
                    $value = substr($line, $pos +1);

                    if (strpos($value, '|') !== false && preg_match('#(?<!\\\)\|#', $value))
                    {
                        $newlines = explode('\n', $value);
                        $values = array();
                        foreach($newlines as $newlinekey=>$newline) {

                            // Explode the value if it is serialized as an arry of value1|value2|value3
                            $parts	= preg_split('/(?<!\\\)\|/', $newline);
                            $array	= (strcmp($parts[0], $newline) === 0) ? false : true;
                            $parts	= str_replace('\|', '|', $parts);

                            foreach ($parts as $key => $value)
                            {
                                if ($value == 'false') {
                                    $value = false;
                                }
                                else if ($value == 'true') {
                                    $value = true;
                                }
                                else if ($value && $value{0} == '"')
                                {
                                    $valueLen = strlen( $value );
                                    if ($value{$valueLen-1} == '"') {
                                        $value = stripcslashes(substr($value, 1, $valueLen - 2));
                                    }
                                }
                                if(!isset($values[$newlinekey])) $values[$newlinekey] = array();
                                $values[$newlinekey][] = str_replace('\n', "\n", $value);
                            }

                            if (!$array) {
                                $values[$newlinekey] = $values[$newlinekey][0];
                            }
                        }

                        if ($process_sections)
                        {
                            if ($sec_name != '') {
                                $obj->$sec_name->$property = $values[$newlinekey];
                            } else {
                                $obj->$property = $values[$newlinekey];
                            }
                        }
                        else
                        {
                            $obj->$property = $values[$newlinekey];
                        }
                    }
                    else
                    {
                        //unescape the \|
                        $value = str_replace('\|', '|', $value);

                        if ($value == 'false') {
                            $value = false;
                        }
                        else if ($value == 'true') {
                            $value = true;
                        }
                        else if ($value && $value{0} == '"')
                        {
                            $valueLen = strlen( $value );
                            if ($value{$valueLen-1} == '"') {
                                $value = stripcslashes(substr($value, 1, $valueLen - 2));
                            }
                        }

                        if ($process_sections)
                        {
                            $value = str_replace('\n', "\n", $value);
                            if ($sec_name != '') {
                                $obj->$sec_name->$property = $value;
                            } else {
                                $obj->$property = $value;
                            }
                        }
                        else
                        {
                            $obj->$property = str_replace('\n', "\n", $value);
                        }
                    }
                }
                else
                {
                    if ($line && $line{0} == ';') {
                        continue;
                    }
                    if ($process_sections)
                    {
                        $property = '__invalid'.$unparsed ++.'__';
                        if ($process_sections)
                        {
                            if ($sec_name != '') {
                                $obj->$sec_name->$property = trim($line);
                            } else {
                                $obj->$property = trim($line);
                            }
                        }
                        else
                        {
                            $obj->$property = trim($line);
                        }
                    }
                }
            }
        }

        $inistocache[$hash] = clone($obj);
        return $obj;
    }

    function _deleteKey($merged, $data) {
		
		foreach($data as $title => $customs) {
			foreach($customs as $key => $content) {
				$merged[$title][$key] = array();
			}
		}
		
		return $merged;
	}

    function _array_merge_replace_recursive( &$array1,  &$array2) {
		$merged = $array1;

		foreach($array2 as $key => $value) {
			if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
				$merged[$key] = GantryINI::_array_merge_replace_recursive($merged[$key], $value);
			}
			else {
				$merged[$key] = $value;
			}
		}

		return $merged;
	}
}