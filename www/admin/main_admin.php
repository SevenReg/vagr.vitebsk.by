<?
  session_start();
  
  require_once("/var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php");
  ///home/dan.by/req/out.php
  $my=new class_out;
  
  //print $_SESSION["van"];
  //session_start();

  $my->sql_connect();

  if((!isset($_SESSION["file"]))and(!isset($_SESSION["file1"])))
  {     
       $l='<script language="javascript">
        window.location.href="ind.php"
       </script>';
	 echo $l;  
  
  }  
  //	$my->qwerty();

  //include($my->PATH_INC."/top.html");
  //include($my->PATH_INC."/adv_top.html");
 // include($my->PATH_INC."/navigator.html");
 
 	//$my->sql_query="select sale_id, name_saler, phone_saler, comment_saler, model_name, price from tbl_sales order by sale_id";
	//$my->sql_execute();
	//$myRes=$my->sql_res;  
    //$mes=mysql_num_rows($myRes);
  flush();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/stVagr.css" tppabs="http://www.vagr.vitebsk.by/style/stVagr.css" />
<style type="text/css">
<!--
body
    {
    margin: 20px;
    padding: 20px;
    }

.page a
    {
    padding: 2px 5px;
    font-size: 9pt;
    background: #f7f7f7;
    border: 1px solid #c7c7c7;
    color: #000000;
    text-decoration: none;
    margin: 0px 1px;
    font-weight: bold;
    }

.page a:hover
    {
    background: #cccccc;
    border: 1px solid #666666;
    text-decoration: none;
    }

.page a.active
    {
    background: #666666;
    border: 1px solid #666666;
    color: #ffffff;
    font-weight: bold;
    }

.page a.active:hover
    {
    background: #666666;
    }

.page span
    {
    font-weight:bold;
    padding:0 5px;
    }
-->
</style>
<script type="text/javascript" src="../js/tcal.js" tppabs ="http://www.vagr.vitebsk.by/js/tcal.js"></script> 
<script type="text/javascript" src="../js/funclib.js" tppabs="http://www.vagr.vitebsk.by/js/funclib.js"></script>
<script type="text/javascript" src="../js/scap.js" tppabs="http://www.vagr.vitebsk.by/js/scap.js"></script>
<script type="text/javascript" src="../js/hrequest.js" tppabs="http://www.vagr.vitebsk.by/js/hrequest.js"></script>
<script type="text/javascript" src="../js/my.js" tppabs="http://www.vagr.vitebsk.by/js/my.js"></script>
<script type="text/javascript" src="../js/custom.js" tppabs="http://www.vagr.vitebsk.by/js/custom.js"></script>
<script type="text/javascript" src="../js/jquery.js" tppabs="http://www.vagr.vitebsk.by/js/jquery.js"></script>
<script type="text/javascript" src="../js/zoomi.js" tppabs="http://www.vagr.vitebsk.by/js/zoomi.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title> Витебское агентство по государственной регистации и земельному кадастру</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
  <table width="100%" cellpadding="0" cellspacing="5" border="0">
  <tr height="148">
	<td width="10%" rowspan="3"></td> 
	<td width="22%" class="td1" align="left"><img class="img1" src="../images/LogoBti4.png" ></td> 
	<td colspan="2" width="52%" ><img width="100%" height="180" src="../images/TopBanVit3.png"/></td>
	<td width="10%" rowspan="3"></td>
	<td width="6%" rowspan="3"></td>
  </tr>
  <tr valign="top"> 
    <td valign="top" class="index" width="22%"> 
	
	<!-- --------------------------------------------------------------------------------------------------------->
		<table width="100%" cellpadding="0" cellspacing="0" summary="" class="w100">
			<tr>
				<td valign="top" class="index_left_menu">
					<div class="lmenu">
					<div class="lmenu_bot">
					<div class="lmenu_top">
					<div class="menu">
					<ul>
                       <li>		
						
                  <a href="?f=statistics" tppabs="http://www.vagr.vitebsk.by/admin/" title="Статистика по письмам" id="hml213" onMouseOver="hMenuShow(213);" onMouseOut="hMenuHide(213);">Статистика по письмам</a></li>
<li>
	<a href="?f=statistics" tppabs="http://www.vagr.vitebsk.by/admin/" title="Изменение имени пользователя и пароля" id="hml218" onMouseOver="hMenuShow(218);" onMouseOut="hMenuHide(218);">Изменение имени пользователя и пароля</a> </li>
<li>
	<a href="http://www.vagr.vitebsk.by" title="Выход" id="hml219" onMouseOver="hMenuShow(219);" onMouseOut="hMenuHide(219);">Выход</a> </li>

</ul>
													<div class="clear"><!-- --></div>
												</div>
											</div>
										</div>
									</div>
									<div class="sep"><!-- --></div>									
									<div class="textsep"><!-- --></div>
									
<div class="sep"><!-- --></div>

								</td>
	
	</tr></table>
	<!------------------------------------------------------------------------------------------------------------->
	</td>
	<td width="52%" height="100%">
	   <table style="border:double" bordercolor="#69aefc"> 
	        <tr> 
			    <td align="center" valign="middle">
				<?
				   if (isset($_REQUEST['f']))
				   {
					 $f = $_REQUEST['f'];
					 $f = strtr($f, array(':'=> '', '//' => '', '/' => '', '.' => '', '&' => '', '=' => '', 'ind' => ''));
					 include ($my->PATH_ADMIN."/$f".".php");
				   }
				   else
				   { 	
					 include ($my->PATH_ADMIN."/statistics.php");
				   } 
				?>
				</td>
			</tr>
	   </table>
	   <br>
   </td>
  </tr>
  
  <tr>
    <td></td>
     <td colspan="4" background="images/kropka1.png" height="5" width="761"></td>
  </tr>
  <tr>
    <td></td>
	<td colspan="4"><div class="td4">2009 &copy; РУП "Витебское агентство по государственной регистрации и земельному кадастру"</div> </td>
  </tr>
  </table>  
  
  
<!--------------------------------- --------------------------------------------------------------------------

<table align="center" width="100%" cellspacing="3" cellpadding="3" border="0">
  <tr height="148">
	<td width="24%" rowspan="2"></td> 
	<td width="52%" ><img width="100%" height="180" src="../images/TopBanVit3.png"/></td>
	<td width="24%" rowspan="2"></td>
  </tr>
  <tr>
    <td  valign="top" align="center"><b>Администраторская часть сайта</b><br />
     Вы зашли в администраторскую часть сайта.
	</td>
  </tr>
</table>-->
<!-- <table width="100%" cellspacing="3" cellpadding="3" border="2">
  <tr>
	<td width="200" bgcolor="#FFCC33"><b>Администратор</b><br /><br /><br />
	<br /><b>Главное меню</b><br />
	<br />
	 </td> 
    <td valign="top" align="center"><b>Администраторская часть сайта</b><br />
    <? 
		 /*if($mes!=0)
		 { 
		   $p='<a href="Sales/delete_sale.php"><font color="#FF0000"><h4>Новый заказ!!!!</h4></font></a>';
		   print $p;
		 }
	
	*/
	?>	
	
	</td>
  </tr>
</table> -->
</body>
</html>
<?
  flush();
  
  //include($my->PATH_INC."/navigator.html");
  //include($my->PATH_INC."/adv_top.html");
  //include($my->PATH_INC."/bottom.html");
  
  $my->sql_close();


?>
