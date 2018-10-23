<?
require_once("/home/vagrvitebsk/www/req/util.php");

 /* /home/vagrvitebsk/www/req/util.php  /home/vagr.vitebsk.by/req/util.php*/
class class_out extends class_util
{
    function PageToArray($pc=1,$pa=10,$pp=15)
    {
    $r = array();
    if ($pa<=$pp)
        {
        for ($i=1;$i<=$pa;$i++)
        $r[$i] = $i;

        } else {

        $b = $pc-floor($pp/2);
        if ( $pp%2==0)
            $b++;
        if ( $b<1 )
            $b = 1;

        if ( $b+$pp > $pa)
            $b = $pa-$pp+1;

        for ($i=1;$i<=$pp;$i++)
            $r[$i] = $b++;

        if ( $r[1]!=1 )
            {
            $r[1] = 1;
            $r[2] = '...';
            }

        if ( $r[$pp]!=$pa )
            {
            $r[$pp] = $pa;
            $r[$pp-1] = '...';
            }
        }

    return $r;
    }  
	
	function OutNavigator($iAllPage)
	{
      $iPage = (int)$_GET['page'];
	  $_SESSION['str']=$iPage; 
      if ( $iPage < 1 or $iPage > $iAllPage )
	  {
        $iPage = 1;
	    $_SESSION['str']=$iPage;
	  }
      $aPage = $this->PageToArray($iPage,$iAllPage,10);
	  echo '<p class="page" align="center">';
	  foreach ($aPage as $one)
      if ( $one == '...' )
      {
        echo '<span>...</span>';
      } else {
        echo '<a class="page" href="main_admin.php?page='.$one.'"'.($one==$iPage?'class="active"':'').'>'.$one.'</a>';
      }	
	  echo '</p>';	  
	}	
	
	//выкидной список с струткрными подразделениями
	function out_departmet()
    { 
	  $this->sql_query="SELECT iddep, NameDep FROM Department";
	  $this->sql_execute();
      $out = "<select name='strDep' style='width:400px;' > ";
	  while(list($id, $nameDep)=mysql_fetch_row($this->sql_res))
	  {
        $out.="<option value=".$id.">".$nameDep."</option>";
		//printf("<option value='%s'>%s</option>",$id,$nameDep);
	  }
	  $out.="</select>";
	  print $out;
	  return(0);
   }

	function out_departmet_name($id)
    { 
	  $this->sql_query="SELECT NameDep FROM Department where IDDEP=".$id;
	  $this->sql_execute();
	  list($nameDep)=mysql_fetch_row($this->sql_res);
	  return($nameDep);
   }


   var $Department;
   var $Reason;
   var $TimePriem;
   var $Relationship;
   var $QualityJob;
   var $Stand;
   var $Offers;
   var $DateQ;
   function out_anket_add()
   {

     $this->sql_query="insert into Questionary(Department, Reason, TimePriem, Relationship, QualityJob, Stand, Offers, DateQ) values('".$this->Department."','".$this->Reason."','".$this->TimePriem."','".$this->Relationship."','".$this->QualityJob."','".$this->Stand."','".$this->Offers."','".$this->DateQ."')";
     $this->sql_execute();
 
     if($this->sql_err) return(11);
     return(0);
   }




    //формирует(выдает) список вопросов в "результат" опроса
	function out_question()
    { 
	  $this->sql_query="select id, question from Question order by id";
	  $this->sql_execute();

	  while(list($id, $question)=mysql_fetch_row($this->sql_res))
	  {
        printf("<option value='%s'>%s</option>",$id,$question);
	  }
	  return(0);
   }

    //формирует(выдает) вопрос на главной странице
    function out_question_main($next_q) //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="select id, question from Question LIMIT ".$next_q.",1"; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  while(list($id, $question)=mysql_fetch_row($this->sql_res))
	  {
	     printf("%s",$question);
		 return $id;
	  }
   }
	
    function out_question_kol() //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="select count(id) from Question"; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  list($kol)=mysql_fetch_row($this->sql_res);
	  return $kol;
   }

    function out_check_ip($id_q,$ip) //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="SELECT COUNT( idClient ) FROM Golos WHERE IDQuestion = ".$id_q." and IP = '".$ip."'"; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  list($kol)=mysql_fetch_row($this->sql_res);
	  return $kol;
   }
   
    function out_kol_qa($id_q) //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="SELECT COUNT( idClient ) FROM Golos WHERE IDQuestion = ".$id_q; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  list($kol)=mysql_fetch_row($this->sql_res);
	  print $kol;
	  return (0);
   } 
   
    function out_max_date($id_q) //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="SELECT MAX( DATEZap ) FROM Golos WHERE IDQuestion =".$id_q; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  list($kol)=mysql_fetch_row($this->sql_res);
	  print $kol;
	  return (0);
   }    

    function out_min_date($id_q) //$next_q - номер вопроса, нумерация с нуля
    { 
	  $this->sql_query="SELECT MIN( DATEZap ) FROM Golos WHERE IDQuestion =".$id_q; //выбирает 1 запись, из позиции $next_q
	  $this->sql_execute();
      $res=$this->sql_res;  
	  list($kol)=mysql_fetch_row($this->sql_res);
	  print $kol;
	  return (0);
   }    
     	
    //формирует(выдает) варианты ответов на главной странице 
    function out_answer_main($id_q) // $id_q - id вопроса по которому выбируться варианты ответов
    { 
	  $this->sql_query="select idAnswer, answer from JournalAccess.Answer where IDQuestion=".$id_q." order by idAnswer";
	  $this->sql_execute();

	 while(list($idAnswer, $answer)=mysql_fetch_row($this->sql_res))
	  {
        printf("<input type='radio' name='mainAns' value='%s'>&nbsp;&nbsp;%s</option><BR/>",$idAnswer,$answer);
	  }
	  return(0);
    }	
   
    //выдает варинты ответов в "результат" опроса
    function out_answer($id_q)
    { 
	  $this->sql_query="select idAnswer, answer from JournalAccess.Answer where IDQuestion=".$id_q." order by idAnswer";
	  $this->sql_execute();
      $result = $this->sql_res;

  	  $this->sql_query="select count(idClient) from Golos where IDQuestion=".$id_q;
	  $this->sql_execute();	
	  list($AllKol)=mysql_fetch_row($this->sql_res);
	    
	  while(list($idAnswer, $answer)=mysql_fetch_row($result))
	  {
		    $percent=0;
        	$this->sql_query="select count(idClient) from Golos where idAnswer = ".$idAnswer." and IDQuestion=".$id_q;
	        $this->sql_execute();
			list($kol)=mysql_fetch_row($this->sql_res);
			if (($kol==$AllKol)&&($kol!=0)) {$percent=100;} //elseif {$percent=0;}
			if ($kol!=$AllKol) {$percent=round((($kol/$AllKol)*100),2);} //elseif {$percent=0;}
			echo "
			    <table width='100%'>
				  <tr>
				     <td><b>".$answer."</b></td>
				  </tr>
				  <tr>
				     <td><b>".$kol."</b> &nbsp;&nbsp;&nbsp;".$percent."%</td>
				  </tr>
				  
				</table>
			";		
		
		//printf("<input name='formAns' type='radio' value='%s'>%s</option>",$idAnswer,$answer);
	  }
	  return(0);
   }	
   
   var $IdQuestion;
   var $IdAnswer;
   var $IP;
   var $date_today;
   function out_question_add()
   {
    // Проверяем данные на корректность
     // $err=$this->in_cat_add_check();
     //if($err) return($err);
 
    // Формируем запрос в БД

     $this->sql_query="insert into Golos(IDQuestion, IDAnswer, IP, DateZap) values('".$this->IdQuestion."','".$this->IdAnswer."','".$this->IP."','".$this->date_today."')";
     $this->sql_execute();
 
     if($this->sql_err) return(11);

 return(0);
}    
    /* function newUser() /home/vagr.vitebsk.by/req/util.php
	{
		$this->sql_connect();
		
		$flNoZap=FALSE;
		if (isset($_COOKIE["userID"]))
		{
			$this->sql_query="SELECT toolID FROM tblUserTool WHERE userID like '".$_COOKIE["userID"]."';";
			$this->sql_execute();
			if ($this->sql_err) {$this->sendError(10); return 0;}			
			$kol=mysql_num_rows($this->sql_res);
			if (!$kol) $flNoZap=TRUE;
		}
		
		if ((!isset($_COOKIE["userID"]))||($flNoZap))
		{
			srand((double) microtime( ) * 1000000);
			$id=uniqid(rand());
			setcookie ("userID", $id, time()+2592000);
			
			$this->sql_query="DELETE FROM tblUserTool where userID like '%".$id."%';";
			$this->sql_execute();
			if ($this->sql_err) 
			{$this->sendError(11); return 0;}
				
			$this->sql_query="INSERT INTO tblUserTool (userID) values ('".$id."');";
			$this->sql_execute();
			if ($this->sql_err) 
			{$this->sendError(12); return 0;}
		}
		
		$this->sql_close();	
	}	
	//Выводим навигатор
	function OutNavigator($kolZap,$kol,$pageSel,$namePage)
	{
				
		$kolPage=ceil($kolZap/$kol);

		$out=
		"
		<br/>
		<table width=\"95%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=#FFCC33>
		<tr><td>
		";		
		for ($i=1;$i<=$kolPage;$i++)
		if ($pageSel!=$i)
			$out.="<a href=\"$namePage&page=$i\" class=\"text_for_Navigator\">$i</a>&#160;&#160;&#160;";
		else
			$out.="<font class=\"text_for_Navigator\">$i</font>&#160;&#160;&#160;";
		
		$out.=
		"
		</tr>
		</table>
		";
		
		return $out;
	}
	
	function OutCatNavigator($idcat,$namecat)
	{
	     $out.='
		        <table width=\"95%\" cellspacing=\"1\" cellpadding=\"1\" border=\"0\" bgcolor=#FFCC33>
				  <tr> 
				    <td>
					  <a href="$idcat?idMenu2='.$id.'" class="stas">'.$name.'</a><br/>
					</td>
				  </tr>
			    </table>
			   
			   ';
	   
	}
	


/*  function tab()
	{
	
	//<img src=\"file:///Z|/home/dan.by/www/pic/cherti4.gif\"></td>
	
	$out=" 
	<html>
	<head>
	</head>
	<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" vlink=\"#FFFFFF\" link=\"#FFFFFF\" alink=\"#FFFFFF\">
	<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" hspace=\"0\" vspace=\"0\" width=\"100%\" >
	   <tr>
	     <td bgcolor=\"#000066\"> <img src=\"file:///Z|/home/dan.by/www/pic/cherti4.gif\"></td>
	   </tr>
	   <tr>
	     <td height=\"500\" bgcolor=\"#000066\" valign=\"top\">
		 <a href=\"index.php?qwert=1\">laaaa</a></td>
	   </tr>
	 </table>
		
	 -->>".$_GET["qwert"]."<br>
	 ";
	 
	 $out.="
	 </body>
	 </html>";
	 print $out;
	
	}*/
	/*
	var $out_cat_list; 
	function out_cat_list()
	{ //print"++++++";
	  $this->sql_query="select c_id, c_name from tbl_cats order by c_name";
	  $this->sql_execute();
	  
	  while(list($id, $name)=mysql_fetch_row($this->sql_res))
	  {
	    $this->out_cat_list.="<a href=/cat/$id>$name</a><br />\n";
	  }
//	  print $this->out_cat_list;
	  return(0);
	
	}


	var $goods_list; 
	function goods_list()
	{ 
		$this->sql_query="select path_photo, text_goods, model_name, price from tbl_goods where c_id='".$id."' order by model_name LIMIT ".$page.",".$kol."";
		$this->sql_execute();
		//$myRes2=$my->sql_res;
				
		while(list($path_photo, $text_goods, $model_name, $price)=mysql_fetch_row($this->sql_res))	  
		{
		   $this->goods_list.='
		          <table width="100%" border="0" cellspacing="0" cellpadding="0" valign="top">
		 	      <tr>
					  <td align="center" rowspan=3>
					     <img src="'.$path_photo.'">
					  </td>
				      <td class="text_goods">
						    '.$model_name.'
					  </td>
					  <td align="center" class="text_goods">
							    '.$price.'$
					  </td>
				   </tr>
				   <tr>
					  <td valign="top" width="300">'.$text_goods.'</td>
					  <td align="center">
							    <form action="<? $PHP_SELF; ?>" method="post" >
                                <input type="hidden" name="post" value="Y">
                                <input type="submit" value="Купить">
                                </form>
 
					  </td>
					</tr>
				
					</table><br><br>
                    
				   ';	
				}

	  return($goods_list);
	
	}

	var $main_menu_list; 
	function main_menu_list()
	{ 
    $i=0; 
	$j=0;
	$b=0;
	$this->sql_query="select c_id, c_name from tbl_cats order by c_name";
	$this->sql_execute();
	$myRes=$this->sql_res;  
	while(list($id, $name)=mysql_fetch_row($myRes))
	{   //$i++;  
	    $this->main_menu_list.='   <br>
		          <table border="0" cellspacing="0" cellpadding="0">
				  <tr>
				   	<td>
				   		<a href="index.php?idMenu='.$id.'" class="stas2">'.$name.'</a>
					</td>
				  </tr>	
				  
				  
				';
			
			if ($_GET['idMenu']==$id)
			{    
				$this->sql_query="select firm_id, firm_name from tbl_firm where c_id='".$id."' order by firm_name";
				$this->sql_execute();
				$myRes1=$this->sql_res;
				
				while(list($firm_id, $firm_name)=mysql_fetch_row($myRes1))
				{   
					$out.=
					'
					 <tr>
						<td>
							<a href="index.php?idMenu='.$id.'&idMenu1='.$firm_id.'" class="stas1">&#8226;'.$firm_name.'</a><br/>
						</td>
					 </tr>
					';
						 $mas[$i][$j]=$firm_name;
						 $j++;
						 $mas[$i][$j]=$firm_id;
						 $i++; $j=0;
						 //$b++;
	    
					if ($_GET['idMenu1']==$firm_id) 
					{  
					   $this->sql_query="select model_id, model_name from tbl_model where firm_id='".$firm_id."' order by model_name";
				       $this->sql_execute();
					   //$myRes1=$my->sql_res;
					   //$b=0;
                       //$i=0; 
            	       //$j=0;					   
				       while(list($model_id, $model_name)=mysql_fetch_row($this->sql_res))
				      {  $out.=
					     '
						 <tr>
							<td>
							   <a href="index.php?idMenu2='.$model_id.'" class="stas">-'.$model_name.'</a><br/>
							</td>
						</tr>
					     ';
				      }
  					   $mas[0][0]=$firm_name;
					}
					
				}
			}
			
		$this->main_menu_list.=' </table>';

 	}

	  return(0);
	
	}
	

     var $goods_table, $myNav1;
	 function goods_table()
	 {  
	
	$this->goods_table.='
				   <table width="95%" cellspacing="1" cellpadding="1" border="0" bgcolor=#FFCC33 valign="top">
				    <tr> 
					  <td>
					   <a href="/" class="text_for_Navigator">Главное меню </a>
							  &mdash;&gt;
					   <a class="text_for_Navigator">Поиск</a><br/>
					  </td>
					 </tr>
					</table> ';
///------------------------------------------------------------------------------------------------------
				$kol=5;
				if (isset($_GET["page"]))
				{
					$page=$_GET["page"]*$kol-$kol;
					$pageSel=$_GET["page"];
				}
				else
				{
					$page=0;
					$pageSel=1;
				}
				

				$this->sql_query="select COUNT(c_id) from tbl_goods where model_name like '".$_GET['search']." %' or model_name='".$_GET['search']."' order by model_name";				
				$this->sql_execute();

				list($KolZap)=mysql_fetch_row($this->sql_res);	  
			
				$namePage='index.php?search='.$_GET['search'];
				
				
				$_SERVER['myNav1']=$this->OutNavigator($KolZap,$kol,$pageSel,$namePage);

////////////----------------------------------------------------------------------------------------------------------------------------	  
				$this->sql_query="select path_photo, text_goods, model_name, price, goods_id from tbl_goods where model_name like '".$_GET['search']." %' or model_name='".$_GET['search']."' order by model_name LIMIT ".$page.",".$kol."";
				$this->sql_execute();
				//$Ress=$this->sql_res;
				$kol_search=mysql_num_rows($this->sql_res);
				if($kol_search=='0')
				{
				  $this->goods_table.='<h2>По вашему запросу ничего не найдено</h2>';
				}else			  
				while(list($path_photo, $text_goods, $model_name, $price, $goods_id)=mysql_fetch_row($this->sql_res))	  
				{
				   $this->goods_table.='<br>
						  <table width="90%" border="0" cellspacing="0" cellpadding="0" valign="top">
						  <tr>
							  <td align="center" rowspan=3>
									 <img src="'.$path_photo.'">
							  </td>
							  <td class="text_goods">
									'.$model_name.'
							  </td>
							  <td align="center" class="text_goods">
									'.$price.'$
							  </td>
						   </tr>
						   <tr>
							  <td valign="top" width="300">'.$text_goods.'</td>
							  <td align="center">
								  <form action="index.php?sale_p1" method="post" >
									<input type="hidden" name="post1" value="'.$goods_id.'">
									<input type="submit" value="Купить">
								  </form>
		 
							  </td>
							</tr>
                            <tr>
			        		  <td>
					            <a href="index.php?idGoods='.$goods_id.'">Описание...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <!-- <a href="index.php?idbasket='.$goods_id.'" border="0" align="middle">Корзина&nbsp;<img src="Z:/home/dan.by/www/pic/price.gif" border="0" align="middle"></a> -->	
   						        </td>
								<td valign="bottom">
								<form action="index.php?idMenu='.$id.'" method="post" class="basket">
								<input type="hidden" name="bask" value="Y">                                
								<input type="hidden" name="basket" value="'.$goods_id.'">
                                <input type="submit" value="Корзина" class="basket_but">
                                </form>
					          </td>
					        </tr>
								
							</table><br><br>
							
						   ';	
				} 
						
		  
				
			   //print $_POST['search'];
		
		 
		  	 
		 
		return($post);
    }
	/*function qwerty ()
	{
	
		 
		 $this->sql_query="insert into tlb_cats(c_name) values('News');";
		 $this->sql_execute();
		 
		 //$this->sql_query="delete from kategories where kategor_name='News'";
		 //$this->sql_execute();
         //="delete from tbl_texts where t_id='".$this->in_text_id."'"; ".$this->
		 
		 $this->sql_query="select c_name from tlb_cats";
		 $this->sql_execute();
		 
		 while(list($p1)=mysql_fetch_row($this->sql_res))
		 print "$p1<br>";

		 														


	}*/
	
	
//////////////////--------------------Форма покупки--------------------------------------------------------
 /*var $sale_in;
 function sale()
 {
   $this->sale_in.=' <form action="<? $PHP_SELF; ?>" method="post" class="form_">
    <div align=center class="form_text_title">Добавление новой рубрики</div><br>
    <input type="hidden" name="post" value="Y">
    <input type="text" name="cat_name" value="<? echo $cat_name; ?>"  class="form_text_urgent"> — название рубрики<br>
    <input type="text" name="pos_n" value="<? echo $pos_n; ?>"  class="form_text_urgent"> — позиция рубрики<br>	
       <br>
    <input type="submit" value="Добавить" class="form_submit_normal">
    </form>';

  
 }*/
	
}


?>