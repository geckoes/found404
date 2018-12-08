<?php
class Database 
{
	protected $db_server;
	protected $db_username;
	protected $db_password;
	protected $db_name;
	protected $db_connection;
	
	public function __construct($db_server, $db_username, $db_password, $db_name)  
    {  
        $this->db_server = $db_server;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    } 
	public function connect()
	{
		$this->db_connection=mysqli_connect($this->db_server, $this->db_username, $this->db_password, $this->db_name) or die(mysqli_error($this->db_connection));
	}
	public function execute($sql)
	{
		$qr=mysqli_query($this->db_connection, $sql)  or die($sql.mysqli_error($this->db_connection));
		$result=array();
		if(preg_match("/^select/i", $sql)) { while($r=mysqli_fetch_assoc($qr)) $result[]=$r; }
		return $result;
	}

}
?>
