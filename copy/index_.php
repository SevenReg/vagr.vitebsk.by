<?
   session_start();
   require_once("/home/vagrvitebsk/www/req/out.php"); 
   $my=new class_out;
   
     if(!isset($_SESSION["pok"]))
   {
	   srand((double) microtime( ) * 1000000);
	   $pok = uniqid(rand( ));
	   $_SESSION["pok"]=$pok;
   }

    $my->sql_connect();  
	
   if(isset($_POST["nextAns"]))
   {  $kol=$my->out_question_kol()-1; 
	  if ($kol!=$_SESSION["page"])
	  {

         $_SESSION["page"]++; 
	  }
	  elseif ($kol==$_SESSION["page"])
	  {
		  $_SESSION["page"]=0;
	  }
   } else
   {
	   $_SESSION["page"]=0; 
   }
	
	
  // echo dirname( __FILE__ );
//<!--/home/vagr.vitebsk.by/req/out.php   /var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php   /www/data/req/out.php-->
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style/stVagr.css" tppabs="http://www.vagr.vitebsk.by/style/stVagr.css" />
<!--<link rel="stylesheet" type="text/css" href="style/unite-gallery.css" tppabs="http://www.vagr.vitebsk.by/style/unite-gallery.css" />-->
<script type="text/javascript" src="js/funclib.js" tppabs="http://www.vagr.vitebsk.by/js/funclib.js"></script>
<script type="text/javascript" src="js/scap.js" tppabs="http://www.vagr.vitebsk.by/js/scap.js"></script>
<script type="text/javascript" src="js/hrequest.js" tppabs="http://www.vagr.vitebsk.by/js/hrequest.js"></script>
<script type="text/javascript" src="js/my.js" tppabs="http://www.vagr.vitebsk.by/js/my.js"></script>
<script type="text/javascript" src="js/custom.js" tppabs="http://www.vagr.vitebsk.by/js/custom.js"></script>
<script type="text/javascript" src="js/jquery.js" tppabs="http://www.vagr.vitebsk.by/js/jquery.js"></script>
<script type="text/javascript" src="js/zoomi.js" tppabs="http://www.vagr.vitebsk.by/js/zoomi.js"></script>
<script type="text/javascript" src="js/runLine.js" tppabs="http://www.vagr.vitebsk.by/js/runLine.js"></script>
<script type="text/javascript" src="js/calendar.js" tppabs="http://www.vagr.vitebsk.by/js/calendar.js"></script>

        <!-- load jQuery -->
        <script src="js/galleria/jquery.js"></script>
        
        <!-- load Galleria -->
        <script src="js/galleria-1.2.2.min.js"></script>


<!--<script type="text/javascript" src="js/galleria/galleria-1.4.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> -->
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title> ��������� ��������� �� ��������������� ���������� � ���������� ��������</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body onkeydown="if(event.ctrlKey && event.keyCode == 83 && event.shiftKey) window.location='admin/ind.php';">
  <table width="100%" cellpadding="0" cellspacing="5" border="0">
  <tr height="148">
	<td width="10%" rowspan="3"></td> 
	<td width="22%" class="td1" align="left" rowspan="2"><img class="img1" src="images/LogoBti3.png" ></td> 
	<td colspan="2" width="52%" ><img width="100%" height="180" src="images/TopBanVit3.png"/></td>
	<td width="10%" rowspan="3"></td>
	<td width="6%" rowspan="3"></td>
  </tr>
  <tr valign="top" align="center" width="100%" >
    <!--<td width="22%"></td> -->
	<td colspan="2" width="52%" height="100%" valign="top" bgcolor="#FFFFFF" border="5">
	  <? include($my->PATH_INC."/main_men2.php"); ?>
    <H2 align="center"><marquee direction="left" scrollAmount="3" width="931">��������! ��������� ��������� ������������� ������ � ������������� �������� III ���������: ��� �������� I-IV ������ ���������, ��������������� � �������������� ������ �� ��������� �������. �������� �����, ��������� ������� ���. 8 (0212)60 81 74, 375 33 399 87 07(���)</marquee></H2>
	</td>
   </tr>
   <tr>
    <td valign="middle" align="center" class="index" width="22%"> 
	
	<!-- --------------------------------------------------------------------------------------------------------->
		<table width="100%" align="center" cellpadding="0" cellspacing="0" summary="" class="w100">
			<tr>
				<td valign="top" class="index_left_menu">
					<div class="lmenu">
					<div class="lmenu_bot">
					<div class="lmenu_top">
					<div class="menu">
					<ul>
                       <li>		
			              <div class="menu2 dn" id="hmm213" onMouseOver="hMenuShow(213);" onMouseOut="hMenuHide(213);">
	               		  <iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash213"></iframe>
			              <div class="lmenu">
				          <div class="lmenu_bot">
				          <div class="lmenu_top">
						
                          <ul>
                            <li><a href="?f=history" tppabs="http://www.vagr.vitebsk.by/inc/" title="������� �����������">������� �����������</a></li>
                            <li><a href="?f=TypeActivity" tppabs="http://www.vagr.vitebsk.by/inc/" title="���� ������������">���� ������������</a></li>
                            <li><a href="?f=one_win1" tppabs="http://www.vagr.vitebsk.by/inc/" title="�������������� (���� ����)">�������������� (���� ����)</a></li>
                            <li><a href="?f=details" tppabs="http://www.vagr.vitebsk.by/inc/" title="���������">���������</a></li>
                            <li><a href="?f=links" tppabs="http://www.vagr.vitebsk.by/inc/" title="������">������</a></li>
                          </ul>
						<div class="clear"><!-- --></div>
					    </div>
				        </div>
		           	    </div>
		                </div>
	
	                    <a href="?f=about" tppabs="http://www.vagr.vitebsk.by/inc/" title="� ���" id="hml213" onMouseOver="hMenuShow(213);" onMouseOut="hMenuHide(213);"  onclick="return false;">� ���</a></li>

                        <li>
						    <div class="menu2 dn" id="hmm214" onMouseOver="hMenuShow(214);" onMouseOut="hMenuHide(214);">
			                <iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash214"></iframe>
			           <div class="lmenu">
				       <div class="lmenu_bot">
					   <div class="lmenu_top">
						
                       <ul>
<!--                         <li><a href="statutory_requirement/inventory/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������������">��������������</a> </li> -->
                         <li><a href="?f=tex" tppabs="http://www.vagr.vitebsk.by/inc/" title="����������� ��������������">����������� ��������������</a></li>
                         <li><a href="?f=udost" tppabs="http://www.vagr.vitebsk.by/inc/" title="������������� ���������">������������� ��������� �� ��������� ���������� ��� (���� ���������� ���������� ���������� � ����������� ���, � ����� �������������� ����������������)</a></li>

                         <li><a href="?f=registry" tppabs="http://www.vagr.vitebsk.by/inc/" title="����������� ������������">����������� ������������</a></li>

                         <li><a href="?f=document" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� ����������">����� ����������</a></li>
                       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="statutory_requirement/index.htm" tppabs="http://www.vagr.vitebsk.by/statutory_requirement/" title="���������� ����������������" id="hml214" onMouseOver="hMenuShow(214);" onMouseOut="hMenuHide(214);"  onclick="return false;">���������� ����������������</a>
        </li>
        <li>		
  		<div class="menu2 dn" id="hmm215" onMouseOver="hMenuShow(215);" onMouseOut="hMenuHide(215);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash215"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=department_1" tppabs="http://www.vagr.vitebsk.by/inc/" title="������ ��������">���������� "�������"</a></li>
           <li><a href="?f=department_2" tppabs="http://www.vagr.vitebsk.by/inc/" title="������ ��������">���������� "�������"</a></li>
           <li><a href="?f=department_3" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� ������">���������� "������"</a></li>
		   <li><a href="?f=department_4" tppabs="http://www.vagr.vitebsk.by/inc/" title="���������� ����������� �������������� �������� ��������, ����������, ���">���������� ����������� �������������� �������� ��������, ����������, ���</a></li>

   		   <li><a href="?f=department_5" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� �������� � ���������������">���������� �������� � ���������������</a></li>
           <li><a href="?f=department_6" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� ����������� �����">����� ����������� �����</a></li>

       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="������ ���������" id="hml215" onMouseOver="hMenuShow(215);" onMouseOut="hMenuHide(215);"  onclick="return false;">���������� � ������ ���������</a>
</li>

<li>		
	
		<div class="menu2 dn" id="hmm216" onMouseOver="hMenuShow(216);" onMouseOut="hMenuHide(216);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash216"></iframe>
			<div class="lmenu">
				<div class="lmenu_bot">
					<div class="lmenu_top">
						
        <ul>

   <!--       <li><a href="help/faq/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� ���������� �������">����� ���������� �������</a></li> -->
          <li><a href="?f=helpfizlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="�� ���������� ���������� ���">�� ���������� ���������� ���</a></li>
          <li><a href="?f=helpurlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="�� ���������� ����������� ��� � ������������� ����������������">�� ���������� ����������� ��� � ������������� ����������������</a></li>
          
          <li><a href="?f=ElectroQueue" tppabs="http://www.vagr.vitebsk.by/inc/" title="������� ���������� �������� ��������">������� ���������� �������� ��������</a></li>
    <!--      <li><a href="help/complaint/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������� �������">��������� �������</a></li> -->

       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

	<a href="?f=helpfizlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="������" id="hml216" onMouseOver="hMenuShow(216);" onMouseOut="hMenuHide(216);"  onclick="return false;">���������������� ���������</a>	
</li>
<!-- --------------------------------------------------- -->
        <li>		
  		<div class="menu2 dn" id="hmm221" onMouseOver="hMenuShow(221);" onMouseOut="hMenuHide(221);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash216"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=prerecord" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������������� ������">��������������� ������ ���������� ����</a></li>
           <li><a href="?f=prerecordur" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������������� ������">��������������� ������ ����������� ����</a></li>
       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="��������������� ������" id="hml221" onMouseOver="hMenuShow(221);" onMouseOut="hMenuHide(221);"  onclick="return false;">��������������� ������</a></li>
<!-- --------------------------------------------------- -->


<li>	
  		<div class="menu2 dn" id="hmm217" onMouseOver="hMenuShow(217);" onMouseOut="hMenuHide(217);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash217"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=el" tppabs="http://www.vagr.vitebsk.by/inc/" title="����������� ���������">����������� ���������</a></li>
           <li><a href="?f=elFZ" tppabs="http://www.vagr.vitebsk.by/inc/" title="����������� ��������� �������">����������� ��������� �������</a></li>
           <li><a href="?f=elUR" tppabs="http://www.vagr.vitebsk.by/inc/" title="����������� ��������� ����������� ��� � �������������� ����������������">����������� ��������� ����������� ��� � �������������� ����������������</a></li>
       </ul>
						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

   <a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="����������� ���������" id="hml217" onMouseOver="hMenuShow(217);" onMouseOut="hMenuHide(217);" onClick="return false;">����������� ���������</a> </li>
   
<li>
	<a href="?f=question" tppabs="http://www.vagr.vitebsk.by/inc/" title="����� ���������� �������" id="hml218" onMouseOver="hMenuShow(218);" onMouseOut="hMenuHide(218);">����� ���������� �������</a> </li>
<li>
	<a href="?f=urlfl" tppabs="http://www.vagr.vitebsk.by/inc/" title="� ������ � ����������� �������, �������������� ���������������� � ����������� ���" id="hml219" onMouseOver="hMenuShow(219);" onMouseOut="hMenuHide(219);">� ������ � ����������� �������, �������������� ���������������� � ����������� ���</a> </li>
	<li>
	<a href="?f=Admproc" tppabs="http://www.vagr.vitebsk.by/inc/" title="���������� - �������� ����" id="hml220" onMouseOver="hMenuShow(220);" onMouseOut="hMenuHide(220);">���������� - �������� ����</a></li>
	<li>
	<a href="?f=marks" tppabs="http://www.vagr.vitebsk.by/inc/" title="������� � ����������� ���������� ���������������� ��� � ��������� ���������� � ���" id="hml220" onMouseOver="hMenuShow(220);" onMouseOut="hMenuHide(220);">������� � ����������� ���������� ���������������� ��� � ��������� ���������� � ���</a></li>
<li>
	<a href="?f=department_5" tppabs="http://www.vagr.vitebsk.by/inc/" title="������������� ������ � ������������� �������� III ���������" id="hml219" onMouseOver="hMenuShow(219);" onMouseOut="hMenuHide(219);">������������� ������ � ������������� �������� III ���������</a> </li>    
	<li>
  		<div class="menu2 dn" id="hmm222" onMouseOver="hMenuShow(222);" onMouseOut="hMenuHide(222);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash222"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=auc_ReqPrice" tppabs="http://www.vagr.vitebsk.by/inc/" title="�������� ������">����������� ��������</a></li>
          <!-- <li><a href="?f=elFZ" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������">��������</a></li> -->
       </ul>
						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

	<a href="?f=department_7" tppabs="http://www.vagr.vitebsk.by/inc/" title="��������" id="hml222" onMouseOver="hMenuShow(222);" onMouseOut="hMenuHide(222);">��������</a></li>
    
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
   <div class="ctext1">
	<table border="1" width="230px" bgcolor="eef7ff">
      <tr>
         <td><br/>
           <b>
		   <? 
		      $_SESSION["res_q"]=$my->out_question_main($_SESSION["page"]); 
		   ?> </b>
           <br/><br/>
            <form action="?f=rezOpros" method="post" class="form_">
               <? 
				  $my->out_answer_main($_SESSION["res_q"]); 
			   ?><br/>

         </td>
      </tr>
      <tr>
         <td class="td1">  
               <input type="hidden" name="IdQuestion" value="<? print $_SESSION["res_q"]; ?>" >
               <input type="submit" name="ans" value="����������">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="res" value="���������">
            </form>
         </td>
      </tr>
      <tr>
         <td>      
              <form action="<? $PHP_SELF; ?>" method="post" class="form_">         
               <input style="width:200px;" type="submit" name="nextAns" value="��������� ������" >
            </form>
         </td>
      </tr>
      <tr>
         <td class="td1">
            <a href="?f=questionary">������ �������</a>
         </td>
      </tr>
    </table>

     </div>
    <br />

	<A href="http://www.gosrielt.by"  target="_blank"><img src="images/logorielt1.png"/></A>
	<br /><br />
	<A href="http://vl.nca.by/"  target="_blank"><img src="images/BanerKadastrSt.gif"/></A>
	<br /><br />
	<A href="?f=vacan"><img src="images/BanerVac.gif" /></A>
	<br /><br />
	<A href="?f=one_win"><img src="images/BanerOneWin.gif" /></A>
	<br /><br />
	<A href="?f=wall"><img src="images/WallBan.png" /></A>
	<br /><br />
	<A href="?f=drink"><img src="images/BanSome.png" /></A>
	
	
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
					 $f = strtr($f, array(':'=> '', '//' => '', '/' => '', '.' => '', '&' => '', '=' => '', 'index' => ''));
					 include ($my->PATH_INC."/$f".".php");
				   }
				   else
				   { 	
					 include ($my->PATH_INC."/hello.php");
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
 			   <td></td>
  		       <td colspan="4" align="center" valign="middle" height="65">
			    <br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<A href="http://www.president.gov.by/" TARGET="_blank"><IMG src="images/BanerGovBy.png" border="0" width="230" height="65" alt="����������� ���� ���������� ���������� ��������" TITLE="����������� ���� ���������� ���������� ��������"></A>
                   &nbsp;&nbsp;&nbsp;&nbsp;
				   <A href="http://vl.nca.by/" TARGET="_blank"><IMG src="images/BanerNca.png" border="0" width="240" height="65" alt="������������ ����������� ���������" TITLE="������������ ����������� ���������"></A>
				   &nbsp;&nbsp;&nbsp;&nbsp;
				   <A href="http://www.gki.gov.by/" TARGET="_blank"><IMG src="images/BanerGosIm.png" border="0" width="260" height="65" alt="��������������� ������� �� ��������� ���������� ��������" TITLE="��������������� ������� �� ��������� ���������� ��������"></A>
				   &nbsp;&nbsp;&nbsp;&nbsp;			  
				   <A href="http://www.pravo.by/" TARGET="_blank"><IMG src="images/BanerPravo.png" border="0" width="230" height="65" alt="������������ �������� ��������-������ ���������� ��������" TITLE="������������ �������� ��������-������ ���������� ��������"></A>
<br><br>
			  </td>
			</tr>
  <tr>
    <td></td>
     <td colspan="4" background="images/kropka1.png" height="5" width="761"></td>
  </tr>
  <tr>
    <td></td>
	<td colspan="4"><div class="td4">2009 &copy; ��� "��������� ��������� �� ��������������� ����������� � ���������� ��������"</div> </td>
  </tr>
  </table>
</body>  
</html>

<?
  include($my->PATH_INC."/adv_top.php");
?>