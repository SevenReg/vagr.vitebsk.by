<?
  require_once("/home/vagrvitebsk/www/req/var.php");
  class class_mysql extends class_vars
  {
     var $sql_login="BTI";   // /home/vagrvitebsk/www/req/var.php    /home/vagr.vitebsk.by/req/var.php
     var $sql_passwd="54321";
     var $sql_database="JournalAccess";
     var $sql_host="localhost";

     var $conn_id;
     var $sql_query;
     var $sql_err;
     var $sql_res;
	 
    function sql_connect()
    {
      $this->conn_id=mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
      $this->conn_log_id=mysql_connect($this->sql_host,$this->sql_login,$this->sql_passwd);
      mysql_select_db($this->sql_database);
	 // mysql_query('set character set cp1251');
	  mysql_set_charset( 'cp1251' );
    }

    function sql_close()
    {
      mysql_close($this->conn_id);
    }

    function sql_execute()
   {
     $this->sql_res=mysql_query($this->sql_query,$this->conn_id);
     $this->sql_err=mysql_error();
   }
 }


?>