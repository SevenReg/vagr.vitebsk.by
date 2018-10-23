

        <div class="TD1">	
		<br>	 
		 <form action="<? $PHP_SELF; ?>" method="post" class="form_"> 
	     <input type="hidden" name="tt1" value="Y"> 
		 <div style="padding-left:80px;">
	<table class="td8" style="border:2px; border-style:solid; border-color:#3198fe; background:#dfeaf4;" >
	  <tr valign="bottom">
	    <td class="td8" align="center" valign="top">	
		 <table class="td8" width="100%" border="0" cellpadding="10" align="center">
	     <tr valign="top"><td colspan="2" class="td6" align="center" valign="top"><h1>Форма поиска</h1><br></td></tr>	  
		 <tr><td align="left" class="td6" colspan="2"><b>Фамилия Имя Отчество</b><br> <input style="width:400px;" type="text" name="fam" value="" class="form_text_urgent" size="40"></td>
		 </tr>
		 <tr>
		   <td>
		     <b>e-mail</b><br>
		   </td>
		   <td>
		     <b>Телефон</b><br>
		   </td>
		 </tr>
		 <tr>
		   <td>
  		     <input style="width:200px;" type="text" name="mail" value="" class="form_text_urgent" size="40">
		   </td>
		   <td>
  		     <input style="width:200px;" type="text" name="tele" value="" class="form_text_urgent" size="40">
		   </td>
		 </tr>
		 <tr>
		   <td>
		     <b>Дата начало</b><br>
		   </td>
		   <td>
		     <b>Дата конец</b><br>
		   </td>
		 </tr>
		 <tr>
		   <td>
  		     <input type="text" name="date" rel="tcal" value="" />
		   </td>
		   <td>
  		     <input type="text" name="date1" rel="tcal" value="" />
		   </td>
		 </tr>

         <tr>
		   <td >
		   <br>
             <input type="submit" value="Поиск" style="width:100px;height:25px" class="form_submit_normal">
			 </form>
			</td>
			<td> 
 			 <br>
			 <form action="<? $PHP_SELF; ?>" method="post" class="form_">
			 <input type="hidden" name="Clear" value="Y"> 
			 <input type="submit" value="Очистить" style="width:100px;height:25px" class="form_submit_normal">
			 </form>
		   </td>
		 </tr>
	     <br /><br /><br />
         </table>
	    </td>
	  </tr>
   </table>	 
   
   </div>
	    </div>
	    <br />
<? 
   require_once("/var/www/vhosts/vagr.vitebsk.by/httpdocs/req/out.php");
   // /home/vagr.vitebsk.by/req/out.php
   
   $my=new class_out;
   $my->sql_connect();

/////---------------------------------------------------------------------------------------------------------------------------

if($_POST["tt1"]=="Y") 
{ 
    $i=0; 
	$j=0;
	$b=0;
	$fam=$_POST['fam'];
	$mail=$_POST['mail'];
	$tele=$_POST['tele'];
	$my->sql_query=("select * from JA where");
	if ($fam!="")
	{
	   $my->sql_query.=" FIO LIKE '%".$fam."%'";
       $i++;
	}
	if ($tele!="")
	{ if ($i==0) 
	  { 
	    $i++;  
	    $my->sql_query.=" TEL LIKE '%".$tele."%'";
	  }else
	  {
	    $i++;
	    $my->sql_query.=" OR TEL LIKE '%".$tele."%'";
	  }	
	}
	if ($mail!="")
	{
	  if($i==0)
	  { 
	    $i++;
	    $my->sql_query.=" MAIL LIKE '%".$mail."%' ";
	  }else
	  {
	    $i++; 
	    $my->sql_query.=" OR MAIL LIKE '%".$mail."%' ";
	  }
	}
	if (($_POST['date']!="")&&($_POST['date1']!="")) 
	{
	  if($i==0)
	  {
	    $my->sql_query.=" DATE BETWEEN '".$_POST['date']."' AND '".$_POST['date1']."'";
	  }else
	  {
	    $my->sql_query.=" OR DATE BETWEEN '".$_POST['date']."' AND '".$_POST['date1']."'";
	  } 
	}

	//$my->sql_query=("select FIO, TEL, MAIL, QUESTION, DATE from JA order by id");
	/*$my->sql_execute();
	$myRes=$my->sql_res;
	$result=mysql_num_rows($myRes);
	$out.='<br><br>';
	$iAllPage = ceil($result/2);	
	$my->OutNavigator($iAllPage);*/

	$out.='   <br><br>
		          <table border="1" cellspacing="0" cellpadding="0" width="100%">
					  <tr>
						<td class="td6" align="center"><b>Фамилия<BR>Имя Отчество</b></td>
						<td class="td6" align="center"><b>Телефон</b></td>
						<td class="td6" align="center"><b>Электронная почта</b></td>
						<td class="td6" align="justify"><b>Вопрос</b></td>
						<td class="td6" align="center"><b>Дата</b></td>
					  </tr>	
				  
				  
		  ';
	/*$kol=2;
	if ($_SESSION['str']==1) {$_SESSION['lim']=0;}
	if ($_SESSION['str']>1) {$_SESSION['lim']=$_SESSION['str']; $_SESSION['lim']=$_SESSION['lim']*$kol-$kol;}

    $my->sql_query.=" limit ".$_SESSION['lim'].", 2"; */
	$my->sql_execute();
	$myRes1=$my->sql_res;

	while(list($id, $fio, $tel, $mail, $question, $date)=mysql_fetch_row($myRes1))
	{ 
		$out.='
				  <tr>
					<td class="td6" align="center">'.$fio.'</td>
					<td class="td6" align="center">'.$tel.'</td>
					<td class="td6" align="center">'.$mail.'</td>
					<td class="td6" align="justify">'.$question.'</td>
					<td class="td6" align="center">'.$date.'</td>
				  </tr>	
				  
				  
				';
 	}
		$out.=' </table><br><br><br><br><br><br>';
/////----------------------------------------------------------------------------------------



   print $out;

   }else
   { 
    if ($_POST["Clear"]!="Y") 
	{
///-----------------------------------------------------------------------------------------------------------------------------
	$my->sql_query=("select FIO, TEL, MAIL, QUESTION, DATE from JA order by id");
	$my->sql_execute();
	$myRes=$my->sql_res;
	$result=mysql_num_rows($myRes);

    $kol=6;
	$iAllPage = ceil($result/$kol);
	$my->OutNavigator($iAllPage);
    $str=2; 
	$out.='   <br><br>
		          <table border="1" cellspacing="0" cellpadding="0" width="100%">
					  <tr>
						<td class="td6" align="center"><b>№<BR>п/п</b></td>
						<td class="td6" align="center"><b>Фамилия<BR>Имя Отчество</b></td>
						<td class="td6" align="center"><b>Телефон</b></td>
						<td class="td6" align="center"><b>Электронная почта</b></td>
						<td class="td6" align="justify"><b>Вопрос</b></td>
						<td class="td6" align="center"><b>Дата</b></td>
					  </tr>	
				  
				  
				  ';
	
	if ($_SESSION['str']==1) {$_SESSION['lim']=0;}
	if ($_SESSION['str']>1) {$_SESSION['lim']=$_SESSION['str']; $_SESSION['lim']=$_SESSION['lim']*$kol-$kol;}
	//print $str1;
	//$_SESSION['str']=$_SESSION['str']*2-2
    $my->sql_query="select * from JA limit ".$_SESSION['lim'].", 6"; 
	$my->sql_execute();
	$myRes1=$my->sql_res;

	while(list($id, $fio, $tel, $mail, $question, $date)=mysql_fetch_row($myRes1))
	{ 
	    $j++;
		$out.='
				  <tr>
				   	<td class="td6" align="center">'.$j.'</td>
					<td class="td6" align="center">'.$fio.'</td>
					<td class="td6" align="center">'.$tel.'</td>
					<td class="td6" align="center">'.$mail.'</td>
					<td class="td6" align="justify">'.$question.'</td>
					<td class="td6" align="center">'.$date.'</td>
				  </tr>	
				  
				  
				';
 	}
		$out.=' </table><br><br>';
/////----------------------------------------------------------------------------------------



   print $out;
   }
  } 
   if ($_POST["Clear"]=="Y") 
   {
		$my->sql_query=("select FIO, TEL, MAIL, QUESTION, DATE from JA order by id");
		$my->sql_execute();
		$myRes=$my->sql_res;
		$result=mysql_num_rows($myRes);
	
		$kol=6;
		$iAllPage = ceil($result/$kol);
		$my->OutNavigator($iAllPage);
		$str=2; 
		$out.='   <br><br>
					  <table border="1" cellspacing="0" cellpadding="0" width="100%">
						  <tr>
							<td class="td6" align="center"><b>№<BR>п/п</b></td>
							<td class="td6" align="center"><b>Фамилия<BR>Имя Отчество</b></td>
							<td class="td6" align="center"><b>Телефон</b></td>
							<td class="td6" align="center"><b>Электронная почта</b></td>
							<td class="td6" align="justify"><b>Вопрос</b></td>
							<td class="td6" align="center"><b>Дата</b></td>
						  </tr>	
					  
					  
					  ';
		
		if ($_SESSION['str']==1) {$_SESSION['lim']=0;}
		if ($_SESSION['str']>1) {$_SESSION['lim']=$_SESSION['str']; $_SESSION['lim']=$_SESSION['lim']*$kol-$kol;}
		//print $str1;
		//$_SESSION['str']=$_SESSION['str']*2-2
		$my->sql_query="select * from JA limit ".$_SESSION['lim'].", 6"; 
		$my->sql_execute();
		$myRes1=$my->sql_res;
	
		while(list($id, $fio, $tel, $mail, $question, $date)=mysql_fetch_row($myRes1))
		{ 
			$j++;
			$out.='
					  <tr>
						<td class="td6" align="center">'.$j.'</td>
						<td class="td6" align="center">'.$fio.'</td>
						<td class="td6" align="center">'.$tel.'</td>
						<td class="td6" align="center">'.$mail.'</td>
						<td class="td6" align="justify">'.$question.'</td>
						<td class="td6" align="center">'.$date.'</td>
					  </tr>	
					  
					  
					';
		}
			$out.=' </table><br><br>';
	   print $out;     
   
   }
   $my->sql_close();
   

?>

