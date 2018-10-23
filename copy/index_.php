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
<title> Витебское агентство по государственной регистации и земельному кадастру</title>
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
    <H2 align="center"><marquee direction="left" scrollAmount="3" width="931">Внимание! Агентство выполняет геодезические работы в строительстве аттестат III категории: для объектов I-IV класса сложности, топографической и исполнительной съемке по Витебской области. Короткие сроки, рассрочка платежа тел. 8 (0212)60 81 74, 375 33 399 87 07(МТС)</marquee></H2>
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
                            <li><a href="?f=history" tppabs="http://www.vagr.vitebsk.by/inc/" title="История предприятия">История предприятия</a></li>
                            <li><a href="?f=TypeActivity" tppabs="http://www.vagr.vitebsk.by/inc/" title="Виды деятельности">Виды деятельности</a></li>
                            <li><a href="?f=one_win1" tppabs="http://www.vagr.vitebsk.by/inc/" title="Сотрудничество (Одно окно)">Сотрудничество (Одно окно)</a></li>
                            <li><a href="?f=details" tppabs="http://www.vagr.vitebsk.by/inc/" title="Реквизиты">Реквизиты</a></li>
                            <li><a href="?f=links" tppabs="http://www.vagr.vitebsk.by/inc/" title="Ссылки">Ссылки</a></li>
                          </ul>
						<div class="clear"><!-- --></div>
					    </div>
				        </div>
		           	    </div>
		                </div>
	
	                    <a href="?f=about" tppabs="http://www.vagr.vitebsk.by/inc/" title="О нас" id="hml213" onMouseOver="hMenuShow(213);" onMouseOut="hMenuHide(213);"  onclick="return false;">О нас</a></li>

                        <li>
						    <div class="menu2 dn" id="hmm214" onMouseOver="hMenuShow(214);" onMouseOut="hMenuHide(214);">
			                <iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash214"></iframe>
			           <div class="lmenu">
				       <div class="lmenu_bot">
					   <div class="lmenu_top">
						
                       <ul>
<!--                         <li><a href="statutory_requirement/inventory/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="Инвентаризация">Инвентаризация</a> </li> -->
                         <li><a href="?f=tex" tppabs="http://www.vagr.vitebsk.by/inc/" title="Техническая инвентаризация">Техническая инвентаризация</a></li>
                         <li><a href="?f=udost" tppabs="http://www.vagr.vitebsk.by/inc/" title="Удостоверение договоров">Удостоверение договоров по заявлению физических лиц (либо совместным заявлением физических и юридических лиц, а также индивидуальных предпринимателей)</a></li>

                         <li><a href="?f=registry" tppabs="http://www.vagr.vitebsk.by/inc/" title="Регистрация недвижимости">Регистрация недвижимости</a></li>

                         <li><a href="?f=document" tppabs="http://www.vagr.vitebsk.by/inc/" title="Формы документов">Формы документов</a></li>
                       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="statutory_requirement/index.htm" tppabs="http://www.vagr.vitebsk.by/statutory_requirement/" title="Требования законодательства" id="hml214" onMouseOver="hMenuShow(214);" onMouseOut="hMenuHide(214);"  onclick="return false;">Требования законодательства</a>
        </li>
        <li>		
  		<div class="menu2 dn" id="hmm215" onMouseOver="hMenuShow(215);" onMouseOut="hMenuHide(215);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash215"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=department_1" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отделы кадастра">Управление "Кадастр"</a></li>
           <li><a href="?f=department_2" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отделы регистра">Управление "Регистр"</a></li>
           <li><a href="?f=department_3" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отдел оценки">Управление "Оценка"</a></li>
		   <li><a href="?f=department_4" tppabs="http://www.vagr.vitebsk.by/inc/" title="Управление технической инвентаризации линейных объектов, сооружений, ПТК">Управление технической инвентаризации линейных объектов, сооружений, ПТК</a></li>

   		   <li><a href="?f=department_5" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отдел геодезии и землеустройства">Управление геодезии и землеустройства</a></li>
           <li><a href="?f=department_6" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отдел риэлтерских услуг">Отдел риэлтерских услуг</a></li>

       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="Услуги оказывают" id="hml215" onMouseOver="hMenuShow(215);" onMouseOut="hMenuHide(215);"  onclick="return false;">Управления и отделы агентства</a>
</li>

<li>		
	
		<div class="menu2 dn" id="hmm216" onMouseOver="hMenuShow(216);" onMouseOut="hMenuHide(216);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash216"></iframe>
			<div class="lmenu">
				<div class="lmenu_bot">
					<div class="lmenu_top">
						
        <ul>

   <!--       <li><a href="help/faq/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="Часто задаваемые вопросы">Часто задаваемые вопросы</a></li> -->
          <li><a href="?f=helpfizlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="По заявлениям физических лиц">По заявлениям физических лиц</a></li>
          <li><a href="?f=helpurlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="По заявлениям юридических лиц и индивидульных предпринимателей">По заявлениям юридических лиц и индивидульных предпринимателей</a></li>
          
          <li><a href="?f=ElectroQueue" tppabs="http://www.vagr.vitebsk.by/inc/" title="Система управления потоками клиентов">Система управления потоками клиентов</a></li>
    <!--      <li><a href="help/complaint/index.htm" tppabs="http://www.vagr.vitebsk.by/inc/" title="Обращения граждан">Обращения граждан</a></li> -->

       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

	<a href="?f=helpfizlic" tppabs="http://www.vagr.vitebsk.by/inc/" title="Помощь" id="hml216" onMouseOver="hMenuShow(216);" onMouseOut="hMenuHide(216);"  onclick="return false;">Административные процедуры</a>	
</li>
<!-- --------------------------------------------------- -->
        <li>		
  		<div class="menu2 dn" id="hmm221" onMouseOver="hMenuShow(221);" onMouseOut="hMenuHide(221);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash216"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=prerecord" tppabs="http://www.vagr.vitebsk.by/inc/" title="Предварительная запись">Предварительная запись физические лица</a></li>
           <li><a href="?f=prerecordur" tppabs="http://www.vagr.vitebsk.by/inc/" title="Предварительная запись">Предварительная запись юридические лица</a></li>
       </ul>

						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>
	
	<a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="Предварительная запись" id="hml221" onMouseOver="hMenuShow(221);" onMouseOut="hMenuHide(221);"  onclick="return false;">Предварительная запись</a></li>
<!-- --------------------------------------------------- -->


<li>	
  		<div class="menu2 dn" id="hmm217" onMouseOver="hMenuShow(217);" onMouseOut="hMenuHide(217);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash217"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=el" tppabs="http://www.vagr.vitebsk.by/inc/" title="Электронные обращения">Электронные обращения</a></li>
           <li><a href="?f=elFZ" tppabs="http://www.vagr.vitebsk.by/inc/" title="Электронные обращения граждан">Электронные обращения граждан</a></li>
           <li><a href="?f=elUR" tppabs="http://www.vagr.vitebsk.by/inc/" title="Электронные обращения юридических лиц и индивидуальных предпринимателей">Электронные обращения юридических лиц и индивидуальных предпринимателей</a></li>
       </ul>
						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

   <a href="rendering_of_service/index.htm" tppabs="http://www.vagr.vitebsk.by/rendering_of_service/" title="Электронные обращения" id="hml217" onMouseOver="hMenuShow(217);" onMouseOut="hMenuHide(217);" onClick="return false;">Электронные обращения</a> </li>
   
<li>
	<a href="?f=question" tppabs="http://www.vagr.vitebsk.by/inc/" title="Часто задаваемые вопросы" id="hml218" onMouseOver="hMenuShow(218);" onMouseOut="hMenuHide(218);">Часто задаваемые вопросы</a> </li>
<li>
	<a href="?f=urlfl" tppabs="http://www.vagr.vitebsk.by/inc/" title="О работе с обращениями граждан, индивидуальных предпринимателей и юридических лиц" id="hml219" onMouseOver="hMenuShow(219);" onMouseOut="hMenuHide(219);">О работе с обращениями граждан, индивидуальных предпринимателей и юридических лиц</a> </li>
	<li>
	<a href="?f=Admproc" tppabs="http://www.vagr.vitebsk.by/inc/" title="Нормативно - правовая база" id="hml220" onMouseOver="hMenuShow(220);" onMouseOut="hMenuHide(220);">Нормативно - правовая база</a></li>
	<li>
	<a href="?f=marks" tppabs="http://www.vagr.vitebsk.by/inc/" title="Отметки о поступивших заявлениях заинтересованных лиц о намерении обратиться в суд" id="hml220" onMouseOver="hMenuShow(220);" onMouseOut="hMenuHide(220);">Отметки о поступивших заявлениях заинтересованных лиц о намерении обратиться в суд</a></li>
<li>
	<a href="?f=department_5" tppabs="http://www.vagr.vitebsk.by/inc/" title="Геодезические работы в строительстве аттестат III категории" id="hml219" onMouseOver="hMenuShow(219);" onMouseOut="hMenuHide(219);">Геодезические работы в строительстве аттестат III категории</a> </li>    
	<li>
  		<div class="menu2 dn" id="hmm222" onMouseOver="hMenuShow(222);" onMouseOut="hMenuHide(222);">
		<iframe style="display:none; _display:block; position:absolute; filter:Alpha(opacity=0); z-index:-1; background:#000000; width:230px" id="ifsplash222"></iframe>
		<div class="lmenu">
		<div class="lmenu_bot">
		<div class="lmenu_top">
						
        <ul>

           <li><a href="?f=auc_ReqPrice" tppabs="http://www.vagr.vitebsk.by/inc/" title="Изучение спроса">Объявленные аукционы</a></li>
          <!-- <li><a href="?f=elFZ" tppabs="http://www.vagr.vitebsk.by/inc/" title="Аукционы">Аукционы</a></li> -->
       </ul>
						<div class="clear"><!-- --></div>
					</div>
				</div>
			</div>
		</div>

	<a href="?f=department_7" tppabs="http://www.vagr.vitebsk.by/inc/" title="Аукционы" id="hml222" onMouseOver="hMenuShow(222);" onMouseOut="hMenuHide(222);">Аукционы</a></li>
    
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
               <input type="submit" name="ans" value="Голосовать">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="res" value="Результат">
            </form>
         </td>
      </tr>
      <tr>
         <td>      
              <form action="<? $PHP_SELF; ?>" method="post" class="form_">         
               <input style="width:200px;" type="submit" name="nextAns" value="Следующий вопрос" >
            </form>
         </td>
      </tr>
      <tr>
         <td class="td1">
            <a href="?f=questionary">Анкета клиента</a>
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
				<A href="http://www.president.gov.by/" TARGET="_blank"><IMG src="images/BanerGovBy.png" border="0" width="230" height="65" alt="Официальный сайт Президента Республики Беларусь" TITLE="Официальный сайт Президента Республики Беларусь"></A>
                   &nbsp;&nbsp;&nbsp;&nbsp;
				   <A href="http://vl.nca.by/" TARGET="_blank"><IMG src="images/BanerNca.png" border="0" width="240" height="65" alt="Национальное кадастровое агентство" TITLE="Национальное кадастровое агентство"></A>
				   &nbsp;&nbsp;&nbsp;&nbsp;
				   <A href="http://www.gki.gov.by/" TARGET="_blank"><IMG src="images/BanerGosIm.png" border="0" width="260" height="65" alt="Государственный комитет по имуществу Республики Беларусь" TITLE="Государственный комитет по имуществу Республики Беларусь"></A>
				   &nbsp;&nbsp;&nbsp;&nbsp;			  
				   <A href="http://www.pravo.by/" TARGET="_blank"><IMG src="images/BanerPravo.png" border="0" width="230" height="65" alt="Национальный правовой интернет-портал Республики Беларусь" TITLE="Национальный правовой интернет-портал Республики Беларусь"></A>
<br><br>
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
</body>  
</html>

<?
  include($my->PATH_INC."/adv_top.php");
?>