<?php 

class Usuario{
	private $id;
	private $nome;
	private $sobrenome;
	private $foto;
	private $data;

	public function getIdusuario(){
		return $this->id;
	}

	public function setIdusuario($value){
		$this->id = $value;
	}

	public function getNomeusuario(){
		return $this->nome;
	}

	public function setNomeusuario($value){
		$this->nome = $value;
	}

	public function getSobrenomeusuario(){
		return $this->sobrenome;
	}

	public function setSobrenomeusuario($value){
		$this->sobrenome = $value;
	}

	public function getFotousuario(){
		return $this->foto;
	}

	public function setFotousuario($value){
		$this->foto = $value;
	}

	public function getDatausuario(){
		return $this->data;
	}

	public function setDatausuario($value){
		$this->data = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE id_usuario = :ID", array(

			":ID"=>$id

		));

		if (count($results) > 0) {
			$row = $results[0];

			$this->setIdusuario($row['id_usuario']);
			$this->setNomeusuario($row['nome_usuario']);
			$this->setSobrenomeusuario($row['sobrenome_usuario']);
			$this->setFotousuario($row['foto_usuario']);
			$this->setDatausuario(new DateTime($row['dt_nasc_usuario']));

		}
	}

	public function __toString(){

		return json_encode(array(
			"id_usuario"=>$this->getIdusuario(),"<br>".
			"nome_usuario"=>$this->getNomeusuario(),"<br>".
			"sobrenome_usuario"=>$this->getSobrenomeusuario(),"<br>".
			"foto_usuario"=>$this->getFotousuario(),"<br>".
			"dt_nasc_usuario"=>$this->getDatausuario()->format("d/m/Y h:i:s")

		));
	}
}


 ?>