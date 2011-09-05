<?php
/**
 * JEvents Component for Joomla 1.5.x
 *
 * @version     $Id: Category.php 2180 2011-06-11 10:05:07Z geraintedwards $
 * @package     JEvents
 * @copyright   Copyright (C) 2008-2009 GWE Systems Ltd
 * @license     GNU/GPLv2, see http://www.gnu.org/licenses/gpl-2.0.html
 * @link        http://www.jevents.net
 */

// ensure this file is being included by a parent file
defined('_JEXEC') or die( 'Direct Access to this location is not allowed.' );

class jevCategoryFilter extends jevFilter
{
	function __construct($tablename, $filterfield, $isstring=true){

		// setup for all required function and classes
		$file = JPATH_SITE . '/components/com_jevents/mod.defines.php';
		if (file_exists($file) ) {
			include_once($file);
		}
		$reg = & JevRegistry::getInstance("jevents");
		$this->datamodel = $reg->getReference("jevents.datamodel",false);		
		if (!$this->datamodel){
			$this->datamodel = new JEventsDataModel();
			$this->datamodel->setupComponentCatids();
		}

		$this->filterType="category";
		$this->filterLabel=JText::_( 'CATEGORY' );
		$this->filterNullValue="0";
		parent::__construct($tablename,"catid", true);

		$catid = $this->filter_value;
		$this->allAccessibleCategories = $this->datamodel->accessibleCategoryList();		
		if ($this->filter_value==$this->filterNullValue || $this->filter_value==""){ 
			$this->accessibleCategories = $this->allAccessibleCategories;
		}
		else {
			$this->accessibleCategories = $this->datamodel->accessibleCategoryList(null, array($catid), $catid);		
		}
	}

	function _createFilter(){
		if (!$this->filterField ) return "";
		if ($this->filter_value==$this->filterNullValue  || $this->filter_value=="") return "";
		/*
		$sectionname = JEV_COM_COMPONENT;
		
		$db =& JFactory::getDBO();
		$q_published = JFactory::getApplication()->isAdmin() ? "\n WHERE c.published >= 0" : "\n WHERE c.published = 1";
		$where = ' AND (c.id =' . $this->filter_value .' OR p.id =' . $this->filter_value .' OR gp.id =' . $this->filter_value .' OR ggp.id =' . $this->filter_value .')';		
		$query = "SELECT c.id"
			. "\n FROM #__categories AS c"
			. ' LEFT JOIN #__categories AS p ON p.id=c.parent_id' 
			. ' LEFT JOIN #__categories AS gp ON gp.id=p.parent_id ' 
			. ' LEFT JOIN #__categories AS ggp ON ggp.id=gp.parent_id ' 
			. $q_published
			. "\n AND c.section = '".$sectionname."'"
			. "\n " . $where;
			;
			
			$db->setQuery($query);
			$catlist =  $db->loadResultArray();
			array_unshift($catlist,-1);
		
		$filter = " ev.catid IN (".implode(",",$catlist).")";
		*/
		$filter = " ev.catid IN (".$this->accessibleCategories.")";
		return $filter;
	}

	/**
 * Creates javascript session memory reset action
 *
 */
	function _createfilterHTML(){

		if (!$this->filterField) return "";

		$filterList=array();
		$filterList["title"]=JText::_("Select_Category");


		$filterList["html"] = JEventsHTML::buildCategorySelect( $this->filter_value, 'onchange="submit(this.form)" style="font-size:10px;"',$this->allAccessibleCategories,false,false,0,$this->filterType.'_fv' );		
		
		//$script = "function reset".$this->filterType."_fvs(){document.getElements('option',\$('".$this->filterType."_fv')).each(function(item){item.selected=(item.value==0)?true:false;})};\n";
		//$script .= "try {JeventsFilters.filters.push({action:'reset".$this->filterType."_fvs()',id:'".$this->filterType."_fv',value:".$this->filterNullValue."});} catch (e) {}\n";
		// try/catch  incase this is called without a filter module!
		$script = "try {JeventsFilters.filters.push({id:'".$this->filterType."_fv',value:0});} catch (e) {}\n";
		$document = JFactory::getDocument();
		$document->addScriptDeclaration($script);
		
		return $filterList;

	}

}
