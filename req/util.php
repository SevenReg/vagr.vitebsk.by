<?
require_once("/home/vagr.vitebsk.by/req/mysql.php");
class class_util extends class_mysql
{
  function html_headers()  //  /var/www/vhosts/vagr.vitebsk.by/httpdocs/req/mysql.php
  {
    header( "Cache-Control: max-age=". $this->CACHE_TIME_ALL.", must-revalidate" );
    header( "Last-Modified: " . gmdate("D, d M Y H:i:s", time()-3600) . " GMT");
    header( "Expires: " . gmdate("D, d M Y H:i:s", time()+$this->CACHE_TIME_ALL) . " GMT");
    header( "Content-type:text/html");
  }

var $html_error;
function ok_to_html($text)
{
  return "<font color=green>$text</font><br><br>";
}


}


?>
