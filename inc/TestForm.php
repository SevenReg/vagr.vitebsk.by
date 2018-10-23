<?
   //require_once("var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php"); 

   $my=new class_out;
   $my->sql_connect();    

   if(isset($_POST["nextAns"]))
   {  $kol=$my->out_question_kol()-1; 
      print "page=".$_SESSION["page"];
      print "kol=".$kol;
	  if ($kol!=$_SESSION["page"])
	  {
		 print "if ";  
         $_SESSION["page"]++; 
	  }
	  elseif ($kol==$_SESSION["page"])
	  {
		  print "else ";
		  $_SESSION["page"]=0;
	  }
   } else
   {
	   $_SESSION["page"]=0; 
   }

  // echo dirname( __FILE__ );
//<!--/home/vagr.vitebsk.by/req/out.php   /home/vagrvitebsk/www/req/out.php   /www/data/req/out.php-->
?>
	<table>
      <tr>
         <td>
           <? 
		      $_SESSION["res_q"]=$my->out_question_main($_SESSION["page"]); 
			  print $_SESSION["res_q"];
		   ?> 
           <br/><br/>
            <form action="?f=rezOpros" method="post" class="form_">
               <? 
				  $my->out_answer_main($_SESSION["res_q"]); 
			   ?><br/>
           
         </td>
      </tr>
      <tr>
         <td>      
               <input type="submit" name="ans" value="Голосовать">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="res" value="Результат">

            </form>
         </td>
      </tr>
      <tr>
         <td>      
              <form action="<? $PHP_SELF; ?>" method="post" class="form_">         
               <input style="width:250px;" type="submit" name="nextAns" value="Следующий вопрос" >
            </form>
         </td>
      </tr>
      
           
    </table>