<?php
defined("_JEXEC") or die ("Acesso Restrito");
jimport("joomla.application.component.controller");
class MecenatoFrontController extends JController {
	protected $link = "index.php?option=com_mecenato";
	public function visao(){
		$view = JRequest::getVar("view","projeto");
		$objUser =& JFactory::getUser();
		if($view == "patrocinio" && $objUser->id == 0){
			$itemId = JRequest::getVar("Itemid");
			$this->setRedirect(
					"index.php?option=com_mecenato&view=projeto&Itemid={$itemId}", 
					"Verifique se usuário está logado no sistema", 
					"error"
					);
		}
		JRequest::setVar("view",$view);
		parent::display();
	}
}

?>
