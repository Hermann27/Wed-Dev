<?php 
class Connexion{
	
	/*private $server='98.130.0.109'; 
	private $userid='C267475_richy';
	private $password='RICHY.2011';
	private $db='C267475_richyconsult';*/
	private $server='localhost'; 
	private $userid='root';
	private $password='';
	private $db='house_bd';
	
	private $con = NULL;
	
	//constructeur
	public function __construct($server,$userid,$password,$db){
		if (func_num_args()!=0){
			$this->server = $server;
			$this->userid =$userid;
			$this->password =$password;
			$this->db = $db;
		}
		$this->con=mysqli_connect($this->server,$this->userid,$this->password,$this->db);
	}
	
	//accesseurs
	public function getServer(){return $this->server;}
	public function getUserId(){return $this->userid;}
	public function getPassword(){return $this->password;}
	public function getDB(){return $this->db;}
	public function getConnexion(){return $this->con;}

	//modificateurs
	public function setServer($value){$this->server=$value;}
	public function setUserId($value){$this->userid=$value;}
	public function setPassword($value){$this->password=$value;}
	public function setDB($value){$this->db=$value;}
	
	//méthodes
	public function Execute($query){
		$result = mysqli_query($this->con,$query);
		if(mysqli_errno($this->con)!='') throw new Exception(mysqli_errno($this->con).': '.mysqli_error($this->con));
		return $result;
	}
	public function Number($query){
		$result = $this->Execute($query);
		if(mysqli_errno($this->con)!='') throw new Exception(mysqli_errno($this->con).': '.mysqli_error($this->con));
		return mysqli_num_rows($result);
	}
	public function Value($query){
		$result = $this->Execute($query);
		if(mysqli_errno($this->con)!='') throw new Exception(mysqli_errno($this->con).': '.mysqli_error($this->con));
		$row = mysqli_fetch_array($result);
		return $row[0];
	}
	
	public function GetRows($query){
		$rows = array();
		//echo $query;
		$result = $this->Execute($query);
		if(mysqli_errno($this->con)!='') throw new Exception(mysqli_errno($this->con).': '.mysqli_error($this->con));
		$i=0;
		//echo $result;
		if(!empty($result))
			while($row = @mysqli_fetch_array($result)){
				$rows[$i] = $row;
				$i++;
			}
		return $rows;
	}
	public function EtablirConnexion(){
		$this->con=mysqli_connect($this->server,$this->userid,$this->password,$this->db);
		if(mysqli_errno($this->con)!='') throw new Exception(mysqli_errno($this->con).': '.mysqli_error($this->con));
	}
	public function Close(){
		//mysqli_close($this->con);
	}
}
?>