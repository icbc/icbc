<?php
jimport("joomla.application.component.model");
class Modelo extends JModel {
	private $idUser;
	private $dados;
	private $tabela;
	private $post;
	private $file;
	public function __get($name) {
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
	}
	public function armazena(){
		$tabela = $this->getTable($this->tabela);
		if($tabela->save($this->post)){
			return $tabela;
		}
		else{
			return false;
		}
	}
	public function armazenaJUser(){
		jimport("joomla.user.helper");
		global $mainframe;
		$acl =& JFactory::getACL();
		$user = new JUser();
		if(!$user->bind($this->post)){
			JError::raiseError(500, $this->getError());
		}
		$user->set("name", $this->post["nome"]);
		$user->set("usertype", "Registred");
		$user->set("gid", 18);
		$user->set("sendEmail", 0);
		$user->set("activation", JUtility::getHash(JUserHelper::genRandomPassword()));
		$user->set("block", "0");
		
		if($this->post["idUser"] != 0 || $this->post["idUser"] != null){
			$user->set("id",$this->post["idUser"]);
			if($user->save(true)){
				echo JUtility::dump($user);
				return true;
			}
			else{
				$this->setError("Informação não salva:".$this->getError());
				return false;
			}
		}
		else{
			$user->set("id",0);
			if($user->save()){
				$this->post["idUser"] = $user->id;
				return true;
			}
			else{
				$this->setError("Informação não salva:".$this->getError());
				return false;
			}
		}
	}
	public function gravaArquivo(){
		echo JUtility::dump($this->file);
		$arrArquivo = array_reverse(explode(".",$this->file["name"]));
		$this->post["logo"] = $this->post["numPronac"].".".$arrArquivo[0];
	}
}

?>
