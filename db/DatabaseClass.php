<?php
require_once "config/ConfigClass.php";

class DataBase {
	public $db;
	private $config;
	private $mysqli;
	
	public function __construct()
	{
		$this->config = new Config();
		$this->mysqli = new  mysqli($this->config->host, $this->config->user, $this->config->password, $this->config->db);
		$this->mysqli->query("SET NAMES 'utf8'");
	}
	
	public function query($query)
	{
		return $this->mysqli->query($query);
	}

	public function get_result_query($query)
	{
		$result =  $this->mysqli->query($query);
		$data=$this->dataArray($result);
		return $data;		
	}
	
	protected function dataArray($result_set){
		if(!$result_set) return false;
		$i= 0;
		while ($row = $result_set->fetch_assoc()){
			$data[$i] = $row;
			$i++;
		}
		$result_set->Close();
		
		if (!empty($data))
			return $data;
		return false;
	}

	public function __destruct()
	{
		if($this->mysqli) $this->mysqli->Close();
	}	

	/*-----------Queries-----------*/

	public function getCatForView($id, $userId) {

		if($userId == -1) return "";

		$query = "SELECT * FROM cats WHERE User_id = '".$userId."' AND ID = '".$id."' LIMIT 1;";
		$res = $this->get_result_query($query);

		if(!empty($res)) return $res;

		$query = "SELECT * FROM cats WHERE User_id = '".$userId."' ORDER BY ID DESC LIMIT 1;";
		$res = $this->get_result_query($query );
		return $res;

	}

	public function getCatForUpdate($id, $userId) {

		if($userId == -1) return "";

		$query = "SELECT * FROM cats WHERE User_id = '".$userId."' AND ID = '".$id."' LIMIT 1;";
		$res = $this->get_result_query($query);

		if(!empty($res)) return $res;
		return $res;
	}

	public function getCatsForList($userId) {

		if($userId == -1) return "";

		$query = "SELECT * FROM cats WHERE User_id = '".$userId."' ORDER BY ID;";
		$res = $this->get_result_query($query);

		if(empty($res)) return "";

		return $res;
	}

	public function createCat($name, $age, $poroda, $userId) {

		if($userId == -1) return "";

		$query = "INSERT INTO cats (Name, Age, Poroda, User_id) VALUES ('".$name."', '".$age."', '".$poroda."', '".$userId."');";
		$res = $this->query($query);

		if(empty($res)) return "";

		return $res;
	}

	public function updateCat($name, $age, $poroda, $userId, $idCat) {

		if($userId == -1 || $idCat == -1) return "";

		$query = "UPDATE cats SET Name = '".$name."', Age = '".$age."', Poroda = '".$poroda."' WHERE cats.ID = ".$idCat.";";
		$res = $this->query($query);

		if(empty($res)) return "";

		return $res;
	}

	public function deleteCat($idCat, $userId) {

		if($userId == -1 || $idCat == -1) return "";

		$query = "DELETE FROM cats WHERE cats.ID = ".$idCat.";";
		$res = $this->query($query);

		if(empty($res)) return "";

		return $res;
	}

}

$db = new DataBase(); ?>