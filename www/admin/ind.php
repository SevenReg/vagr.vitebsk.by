<?
  session_start();
  require_once("/var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php");
  $my=new class_out;
  //setcookie("bgcolor", $bgcolor, time()+3600);
  
  //print 'Your session identification number is'.session_id( ):
  
  //print $username;
  //session_destroy( );


  $my->sql_connect();
  

  //	$my->qwerty();
 
 // include($my->PATH_INC."/navigator.html");
  
  if($_POST["perem"]=="Y")
  {
	$pol=$_POST["val"];
	$pol1=$_POST["val1"];
    $pol=md5($pol);  
    $pol1=md5($pol1);
    
    $fh = fopen($my->PATH_WWW_ADMIN."1.txt", "r") or die("Can't open file!");
	while(!feof($fh))
	{
	  $file = fgets($fh);
	} 
	
    $fh1 = fopen($my->PATH_WWW_ADMIN."2.txt", "r") or die("Can't open file!");
	while(!feof($fh1))
	{
	  $file1 = fgets($fh1);
	} 
     
	print 'Логин-->>'.$pol;
	print ' file-->> '.$file;
	print ' Password-->>'.$pol1;
	print ' file1-->> '.$file1;
	   
	if(($pol==$file)and($pol1==$file1))
	{  
	   $_SESSION["file"]=$file;
	   $_SESSION["file1"]=$file1;	

       $l.='<script language="javascript">
        window.location.href="main_admin.php"
       </script>';
	 echo $l;
	}else
	{
	
	
	}
	print ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; В ДОСТУПЕ ОТКАЗАНО<br>
	       Проверьте правильность ввода логина и пароля';
	//$file = fread($fh, filesize($fh));
	//print 'Логин-->>'.$file;
	

  }
  flush();
?>
   
<table align="center" width="100%" cellspacing="3" cellpadding="3" border="0">
  <tr height="148">
	<td width="24%" rowspan="2"></td> 
	<td width="52%" ><img width="100%" height="180" src="../images/TopBanVit3.png"/></td>
	<td width="24%" rowspan="2"></td>
  </tr>
  <tr>
    <td  valign="top" align="center"><b>Вход в администраторскую часть сайта</b><br />
	<form action="ind.php" method="post" class="search_">
    <input type="hidden" name="perem" value="Y">
	Логин<br />
	<input type="text" name="val" value="<? echo $val; ?>" class="header_form"> <br />
    Пароль<br />
	<input type="password" name="val1" value="<? echo $val1; ?>" class="header_form"><br /><br /> 
	<input type="submit" value="Вход" class="search_submit_normal">
    </form>	
	</td>
  </tr>
</table>

<?
  flush();
  //printf("pas=%s",md5('miha'));
  //include($my->PATH_INC."/navigator.html");
  //include($my->PATH_INC."/bottom.html");
  
  $my->sql_close();


?>