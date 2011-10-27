<?php
defined("_JEXEC") or die("Acesso Restrito");
jimport("joomla.application.component.model");
jimport("joomla.filesystem.folder");
jimport("joomla.filesystem.file");
class Modelo extends JModel {
	private $idUser;
	protected $id;
	protected $campos = "*";
	protected $dados;
	protected $tabela;
	protected $post;
	protected $file;
	protected $complemento = "";
	private $dir = "components/com_mecenato/auxiliares/arquivos/";
	protected $objDB = null;
	public function __construct($config = array()) {
		$this->objDB =& JFactory::getDBO();
		parent::__construct($config);
	}
	public function __get($name) {
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
	}
	public function armazena(){
		$tabela = $this->getTable($this->tabela);
		$this->post["dataHoraCad"] = date("Y-m-d H:i:s");
		$tabela->save($this->post);
		if($tabela->save($this->post)){
			return $tabela;
		}
		else{
			$this->setError("Registro não salvo");
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
					$this->setError("Erro ao gravar o arquivo: {$this->getError()}");
					return false;
				}
			}
		}
	}
	public function organizaData($arrayCampos, $formato = "gravar"){
		$i = 0;
		if($formato == "exibir"){
			if(is_array($this->dados)){
				foreach($this->dados as $obj){
					foreach($obj as $chave => $valor){
						foreach($arrayCampos as $campo){
							if($chave == $campo)
								$this->dados[$i]->$chave = implode("/",  array_reverse(explode("-", $valor)));

						}
					}
					$i++;
				}
			}elseif(is_object($this->dados)){
				foreach($this->dados as $chave => $valor){
					foreach($arrayCampos as $campo){
						if($chave == $campo){
							$this->dados->$chave = implode("/",  array_reverse(explode("-", $valor)));
						}
					}
				}
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
	public function listaDados(){
		$sql = " SELECT {$this->campos} FROM #__mecenato_{$this->tabela} {$this->complemento}";
		$this->objDB->setQuery($sql);
		$this->dados = $this->objDB->loadObjectList();
	}
	public function pegaDado(){
		$sql = " SELECT {$this->campos} FROM #__mecenato_{$this->tabela} {$this->complemento} ";
		$this->objDB->setQuery($sql);
		$this->dados = $this->objDB->loadObject();
	}
	function verificaRelacaoUser($idUser){
		$sql = "SELECT id FROM #__mecenato_{$this->tabela} WHERE idUser = {$idUser}";
		$this->objDB->setQuery($sql);
		return $this->objDB->loadResult();
	}
}