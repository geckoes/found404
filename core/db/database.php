<?php
class Database {

  private $conn;
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $prefix;

  function __construct($servername, $dbname, $username, $password, $prefix='fnd404_') {
    $this->servername = $servername;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->passowrd = $password;
    $this->prefix = $prefix;
    return ;
  }

  function getConnection() {
  	if (!$this->conn) {
      $str_conn = "mysql:host=$this->servername;dbname=$this->dbname";
      $this->conn = new PDO($str_conn, $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $this->conn;		
  }

  function testConnection() {
    try {
      $this->getConnection();

      $table = $this->prefix . "test";
      // sql to create table
      $sql = "CREATE TABLE $table (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      test VARCHAR(30) NOT NULL
      )";

      // use exec() because no results are returned
      $this->conn->exec($sql);

      // sql to create table
      $sql = "DROP TABLE $table;";

      // use exec() because no results are returned
      $this->conn->exec($sql);

      $test = "Test OK";

    } catch (PDOException $e) {
      $test = "Test failed " . $e->getMessage();
    }
    return $test;
  }

  function createDb($table_sql = array(), &$error_message) {
  echo "create db function";
    try {
      $this->getConnection();
      
      foreach ($table_sql as $table => $sql) {
      	$table = $this->prefix . $table;
        echo "<br>" . $table . "<br>\n";
		$sql = str_replace('table_to_change', $table, $sql);
        echo $sql . "<br>\n";
      	$this->conn->exec($sql);
		
      }
      
      $this->closeDb();
      $error_message = "Db created correctly";
	  
  echo "create db ok";
	  $ret = true;

    } catch (PDOException $e) {
      $error_message = "Creating db failed " . $e->getMessage();
  echo "create db failed " . $e->getMessage();
	  $ret = false;
    }
    return $ret;

  }

  function updateDb() {
    try {
      $this->getConnection();
      
      
      $trace_info = "Db updated correctly";
      
      $this->closeDb();

    } catch (PDOException $e) {
      $trace_info = "Update db failed " . $e->getMessage();
    }
    return $trace_info;

  }
  function closeDb() {
  	if ($this->conn)
	    $this->conn = null;
  }
}
