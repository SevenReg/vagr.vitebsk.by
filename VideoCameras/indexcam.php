<?
   session_start();
   require_once("/var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php"); 
   $my=new class_out;
   
     if(!isset($_SESSION["pok"]))
   {
	   srand((double) microtime( ) * 1000000);
	   $pok = uniqid(rand( ));
	   $_SESSION["pok"]=$pok;
   }

   
  // echo dirname( __FILE__ );
?>
<!--/home/vagr.vitebsk.by/req/out.php   /var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php   /www/data/req/out.php-->
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/stVagr.css" tppabs="http://www.vagr.vitebsk.by/style/stVagr.css" />
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
	<td width="22%" class="td1" align="left" rowspan="1"><img class="img1" src="../images/LogoBti3.png" ></td> 
	<td colspan="2" width="52%" ><img width="100%" height="180" src="../images/TopBanVit3.png"/></td>
	<td width="10%" rowspan="3"></td>
	<td width="6%" rowspan="3"></td>
  </tr>
<!--  <tr valign="top" width="100%" >-->
    <!--<td width="22%"></td> -->
<!--	<td colspan="2" width="52%" height="100%" valign="top" bgcolor="#888888" border="5">
	  <? //include($my->PATH_INC."/main_men2.php"); ?> 
	</td>
   </tr>-->
   <tr>
    <td valign="middle" class="index" width="22%"> 
	
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
	                    <a href="?f=vitebsk" tppabs="http://www.vagr.vitebsk.by/inc/" title="О нас" id="hml213" onMouseOver="hMenuShow(213);" onMouseOut="hMenuHide(213);" >Витебск</a></li>

                        <li>
	
	<a href="?f=orsha" tppabs="http://www.vagr.vitebsk.by/statutory_requirement/" title="Орша и бюро" id="hml214" onMouseOver="hMenuShow(214);" onMouseOut="hMenuHide(214);">Орша и бюро</a>
        </li>
        <li>		
	<a href="?f=lepel" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="Лепель и бюро" id="hml215" onMouseOver="hMenuShow(215);" onMouseOut="hMenuHide(215);">Лепель и бюро</a>
</li>

<li>		
	<a href="?f=polock" tppabs="http://www.vagr.vitebsk.by/inc/" title="Помощь" id="hml216" onMouseOver="hMenuShow(216);" onMouseOut="hMenuHide(216);">Полоцк и бюро</a>	
</li>
<li>	<a href="?f=glubokoe" tppabs="http://www.vagr.vitebsk.by/inc/" title="Глубокое и бюро" id="hml217" onMouseOver="hMenuShow(217);" onMouseOut="hMenuHide(217);">Глубокое и бюро</a> </li>

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
			    <td class="ctext">
				<?
				   if (isset($_REQUEST['f']))
				   {
					 $f = $_REQUEST['f'];
					 $f = strtr($f, array(':'=> '', '//' => '', '/' => '', '.' => '', '&' => '', '=' => '', 'indexcam' => ''));
					 include ($my->PATH_CAM."/$f".".php");
				   }
				   else
				   { 	
					 include ($my->PATH_CAM."/vitebsk.php");
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
  <td colspan="4" background="images/kropka1.png" height="5" width="761"></td></tr>
  			<tr>

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
</body>  
</html>

<?
  include($my->PATH_INC."/adv_top.php");
?>