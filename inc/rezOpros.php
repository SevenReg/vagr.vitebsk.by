<? 
  //print $_SERVER['REMOTE_ADDR'];
  $my=new class_out;
  $my->sql_connect();  
  
?>


<TABLE width="976" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="?f=hello" tppabs="http://www.vagr.vitebsk.by/">Главная</A></div><div class="tax1"><A href="?f=rezOpros">Оцените качество обслуживания граждан на предприятии</A></div></div>
	   </TD>
	</TR>
	<TR>
		<TD align="left" valign="top">
            <form action="<? $PHP_SELF; ?>" method="POST" class="form_">
            <select name="formQ" style="width:400px;" >    
                <? $my->out_question(); ?>
            </select>
                <input type="submit" value="OK" />
            </form>
        </TD>
	</TR>
	<TR>
		<TD align="left" valign="top">
             <H1>Оцените качество обслуживания граждан на предприятии</H1>
        </TD>
	</TR>
    
	<TR>
		<TD height="550" align="left" valign="top">
         <div class="ctext1">
            <? 
			  if (isset($_POST["ans"]))
			  {    
			      //$IdAnswer = substr(htmlspecialchars(trim($_POST['formAns'])), 0, 30);  
	              $date_today = date ("y.m.d H:i:s");
				  //print $_POST["IdQuestion"];
	              $my->IdQuestion=$_POST["IdQuestion"];
                  $my->IdAnswer=$_POST['mainAns'];
                  $my->IP=$_SERVER['REMOTE_ADDR'];
                  $my->date_today=$date_today;
				  if($my->out_check_ip($_POST["IdQuestion"],$_SERVER['REMOTE_ADDR'])==0)
				  {
				     $my->out_question_add();  				  
				  }
				  $my->out_answer($_POST["IdQuestion"]);
			  }else
			  { 
			      $my->out_answer($_POST["formQ"]); 
			  }

			  if (isset($_POST["formQ"]))
			  {
			     $id_question=$_POST["formQ"];
			  }else
			  {
			     $id_question=$_POST["IdQuestion"]; 
			  }			  
			?> 
         </div>
         <br/>
         <div class="ctext">
         <b>Количество голосов:</b>&nbsp;<? $my->out_kol_qa($id_question); ?><br/>
         <b>Первый голос:</b>&nbsp;<? $my->out_min_date($id_question); ?><br/>
         <b>Последний голос:</b>&nbsp;<? $my->out_max_date($id_question); ?><br/>
         </div>
    
		</TD>
	</TR>
</TABLE>

