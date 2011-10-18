<?php
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.model");
jimport("joomla.filesystem.folder");
jimport("joomla.filesystem.file");
class Modelo extends JModel {
	private $idUser;
	protected $dados;
	private $tabela;
	private $post;
	private $file;
	private $dir = "components/com_mecenato/auxiliares/arquivos/";
	public function __get($name) {
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
	}
	public function armazena(){
		$tabela = $this->getTable($this->tabela);
		$this->post["dataHoraCad"] = date("Y-m-d H:i:s");
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
		$arrArquivo = array_reverse(explode(".",$this->file["name"]));
		if($this->file["error"] == 0){
			$this->file["name"] = "{$this->post["numPronac"]}.{$arrArquivo[0]}";
			$diretorio = JPATH_SITE.DS.$this->dir;
			$path = JFolder::exists($diretorio);
			if($path){
				$src = $this->file["tmp_name"];
				$destino = $diretorio.$this->file["name"];
				$file = JFile::upload($src, $destino);
				if($file)
					return true;
				else{
					$modelo->setError("Erro ao gravar o arquivo: {$this->getError()}");
					return false;
				}
			}
		}
	}
	public function organizaData($arrayCampos, $formato = "gravar"){
		$i = 0;
		if($formato == "exibir"){
			foreach($this->dados as $obj){
				foreach($obj as $chave => $valor){
					foreach($arrayCampos as $campo){
						if($chave == $campo)
							$this->dados[$i]->$chave = implode("/",  array_reverse(explode("-", $valor)));

					}
				}
				$i++;
			}
		}
		if($formato == "gravar"){
			foreach($this->post as $chave => $valor){
				foreach($arrayCampos as $campo){
					if($chave == $campo)
						$this->post[$chave] = implode("-",  array_reverse(explode("/", $valor)));
				}
			}
		}
	}
	protected function getDados($id){
		$tabela = $this->getTable($this->tabela);
		$tabela->load();
		$this->dados = $tabela;
	}
}