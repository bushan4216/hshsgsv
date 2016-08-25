<?php
class Mysql 
{
private static $ServerName 		= SERVERNAME;
private static $Username   		= USERNAME;
private static $Password   		= PASSWORD;
private static $Database   		= DATABASE;
private static $SourceConnect;

		public function __construct() 
		{
			if(!self::$SourceConnect) {
			self::$SourceConnect = $this->createConnection() or die ('Server Connection Failed!.');
			}
		}
		
		private function createConnection() 
		{
		return @mysql_connect(self::$ServerName, self::$Username,self::$Password);
		}
		
	    private function setDatbaseConnection()
		{
		return mysql_select_db(self::$Database,self::$SourceConnect);
		}
			
	    public function Query($args = NULL)
		{
			if(!$this->setDatbaseConnection()) {
			die ('Database Connection Failed!.');
			} else {
				$queries =  mysql_query($args,self::$SourceConnect);
				
				if(!$queries) {
				die ($args .' -> '. mysql_error());
				} else {
				return $queries;
				}
			}	
		}
			
		public function getArray($args = NULL, $arraytype = MYSQL_ASSOC) 
		{
			if(!is_null($args)) 
			{
			return mysql_fetch_array($args,$arraytype);
			} else {
			return false;
			}
		}
		
		public function freeResults($args = NULL) 
		{
			if(!is_null($args)) 
			{
			return mysql_free_result($args);
			} else {
			return false;
			}
		}
		
		public function numRows($args = NULL) 
		{
			if(!is_null($args)) 
			{
			return mysql_num_rows($args);
			} else {
			return false;
			}
		}
		
		public function InsertID()  
		{
		return mysql_insert_id(self::$SourceConnect);
		}
		
		
		public function Close()
		{
		return mysql_close(self::$SourceConnect);
		}	
} 
?>