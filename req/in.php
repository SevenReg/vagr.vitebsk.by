<?
require_once("/home/vagr.vitebsk.by/req/util.php"); 
class class_in extends class_util
{

var $in_question;   /* /var/www/vhosts/vagr.vitebsk.by/httpdocs/req/util.php  /home/vagr.vitebsk.by/req/util.php*/
var $email;
var $tel;
var $date_today;
var $daterec;
var $timerec;
var $address;

function in_question_check()
{
 // добавление слешей перед управляющими символами .
 $this->in_question=AddSlashes($this->in_question);
 $this->email=AddSlashes($this->email);
 $this->tel=AddSlashes($this->tel);
 $this->date_today=AddSlashes($this->date_today);

 // проверка на кол-во символов
 if(strlen($this->in_question)==0) return(21);
 if(strlen($this->in_question)>900) return(22);

 // проверяем на существование такой рубрики
 //$this->sql_query="select id from ja where fio like '".$fio."';"; 
 //$this->sql_execute();
// if($this->sql_err) return(11);
 //if(mysql_num_rows($this->sql_res)) return(23);

 return(0);
}

var $fio, $fioman; 

function in_question_add()
{
 // Проверяем данные на корректность
// $err=$this->in_cat_add_check();
 //if($err) return($err);
 
 // Формируем запрос в БД

 $this->sql_query="insert into JA(question, fioman, fio, tel, mail, date) values('".$this->in_question."','".$this->fioman."','".$this->fio."','".$this->tel."','".$this->email."','".$this->date_today."')";
 $this->sql_execute();
 
 if($this->sql_err) return(11);

 return(0);
} 


function in_prerecord_add()
{
 // Проверяем данные на корректность
// $err=$this->in_cat_add_check();
 //if($err) return($err);
 
 // Формируем запрос в БД

 $this->sql_query="insert into JPreRecord(date, fio, address, email, tel, daterec, time, subject) values('".$this->date_today."','".$this->fioman."','".$this->address."','".$this->email."','".$this->tel."','".$this->daterec."','".$this->timerec."','".$this->in_question."')";
 $this->sql_execute();
 
 if($this->sql_err) return(11);

 return(0);
} 


/*

var $in_cat_id;

function in_cat_delete()
{
 // Приводим номер рубрики к целочисленному виду
 $this->in_cat_id=(int)$this->in_cat_id;
 // Формируем запрос в БД
 $this->sql_query="delete from tbl_cats where c_id='".$this->in_cat_id."'";
 $this->sql_execute();
 if($this->sql_err) return(11);

 return(0);
} 


function in_cat_rename()
{
 // Приводим номер рубрики к целочисленному виду
 $this->in_cat_id=(int)$this->in_cat_id;
 $this->pos_n=(int)$this->pos_n;
 // Проверяем наличие в базе изменяемой рубрики
 $this->sql_query="select c_id from tbl_cats where c_id='".$this->in_cat_id."'";
 $this->sql_execute();
 //if($this->sql_err) return(11);

 if(mysql_num_rows($this->sql_res)==0) return(24); // нет такой рубрики в базе

 // Проверяем данные на корректность
 $err=$this->in_cat_add_check();
 //if($err) return($err);

 // Формируем запрос в БД
 $this->sql_query="update tbl_cats set c_name='".$this->in_cat_name."', pos_n='".$this->pos_n."' where c_id='".$this->in_cat_id."'";
 $this->sql_execute();
 if($this->sql_err) return(11);

 return(0);
} 


	var $out_cat_list; 
	function out_cat_list()
	{ //print"++++++";
	  $this->sql_query="select c_id, c_name from tbl_cats order by c_name";
	  $this->sql_execute();
	  
	  while(list($id, $name)=mysql_fetch_row($this->sql_res))
	  {
	    $this->out_cat_list.="<a href=/cat/$id>$id $name</a><br />\n";
	  }
//	  print $this->out_cat_list;
	  return(0);
	
	}
	
	var $out_cat_list_txt; 
	function out_cat_list_txt()
	{ //print"++++++";
	  $this->sql_query="select c_id, c_name from tbl_cats order by c_name";
	  $this->sql_execute();
	  
	  while(list($id, $name)=mysql_fetch_row($this->sql_res))
	  {
	    $this->out_cat_list_txt.="$id $name<br />\n";
	  }
//	  print $this->out_cat_list;
	  return(0);
	
	}

//////////////////------------------ФИРМЫ--------------------------------------------------------------

var $in_firm_name;
function in_firm_add_check()
{

 // добавление слешей перед управляющими символами .
 $this->in_firm_name=AddSlashes($this->in_firm_name);

 // проверка на кол-во символов
 if(strlen($this->in_firm_name)==0) return(21);
 if(strlen($this->in_firm_name)>50) return(22);

 // проверяем на существование такой рубрики
 $this->sql_query="select firm_id from tbl_firm where firm_name like '".$name."';"; 
 $this->sql_execute();
// if($this->sql_err) return(11);
 if(mysql_num_rows($this->sql_res)) return(23);

 return(0);
}


function in_firm_add()
{
 // Проверяем данные на корректность
 $err=$this->in_firm_add_check();
 if($err) return($err);

 // Формируем запрос в БД
 $this->sql_query="insert into tbl_firm(firm_name) values('".$this->in_firm_name."')";
 $this->sql_execute();
 if($this->sql_err) return(11);

 return(0);
} 


var $in_firm_id;

function in_firm_delete()
{
 // Приводим номер рубрики к целочисленному виду
 $this->in_firm_id=(int)$this->in_firm_id;

// Формируем запрос в БД
 $this->sql_query="delete from tbl_firm where firm_id='".$this->in_firm_id."'";
 $this->sql_execute();
 if($this->sql_err) return(11);

 return(0);
} 


function in_firm_rename()
{
 // Приводим номер фирмы к целочисленному виду
 $this->in_firm_id=(int)$this->in_firm_id;

 // Проверяем наличие в базе изменяемой фирмы
 $this->sql_query="select firm_id from tbl_firm where firm_id='".$this->in_firm_id."'";
 $this->sql_execute();
 //if($this->sql_err) return(11);

 if(mysql_num_rows($this->sql_res)==0) return(24); // нет такой фирмы в базе

 // Проверяем данные на корректность
 $err=$this->in_firm_add_check();
 //if($err) return($err);

 // Формируем запрос в БД
 $this->sql_query="update tbl_firm set firm_name='".$this->in_firm_name."' where firm_id='".$this->in_firm_id."'";
 $this->sql_execute();
 if($this->sql_err) return(11);

 return(0);
} 


	var $out_firm_list; 
	function out_firm_list()
	{ $this->sql_query="select firm_id, firm_name from tbl_firm order by firm_name";
	  $this->sql_execute();
	  
	  while(list($id, $name)=mysql_fetch_row($this->sql_res))
	  {
	    $this->out_firm_list.="$id $name <br />\n";
	  }
	  return(0);
	}
	

///////////////////---------------------------------Навигатор------------------------------------------

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

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  //var $this->in_text; // сам текст
  //var $this->in_text_name; // название текста
  //var $this->in_text_id; // id текста
  //var $this->in_text_dt; // дата добавления
  //var $this->in_text_cat; // рубрика
  
  
  function in_text_data_check()
 {
  $this->in_text_name=AddSlashes($this->in_text_name);
  if(strlen($this->in_text_name)==0) return(24);
  if(strlen($this->in_text_name)>200) return(25);
  
  return(0);
 }

  function in_text_adapt()
 {
  $this->in_text=strip_tags($this->in_text,"<a><b><u><img><div>");
  $this->in_text=nl2br($this->in_text);
  if(strlen($this-in_text)<201) return(26);
  if(strlen($this->in_text)>102400) return(27);
  return(0);
 }
 
 function in_text_add()
 {
  // Проверяем данные для БД
  $err=$this->in_text_data_check();
  if($err) return($err);

  // Адаптируем текст для сохранения
  $err=$this->in_text_adapt();
  if($err) return($err);

  // Сначала заносим в базу данные
  $this->sql_query="insert into tbl_texts(t_name, t_dt, t_cat)
 values('".$this->in_text_name."', now(), '".$this->in_text_cat."')";
  $this->sql_execute();
  if($this->sql_err) return(11);

  // Получаем сгенерированный базой ID добавленного текста
  $this->sql_query="select last_insert_id";
  $this->sql_execute();
  if($this->sql_err) return(11);

  list($this->in_text_id)=mysql_fetch_row($this->sql_res);

  // Теперь пишем текст в директорию data, в  файл с номером ID
  if($w=fopen($this->PATH_DATA."/".$this->in_text_id,'w'))
  {
   fwrite($w,$this->in_text);
   fclose($w);
  } else
  {
   $this->sql_query="delete from tbl_texts where t_id='".$this->in_text_id."'";
   $this->sql_execute();
   return(31);
  }

  return(0);
 }
 
  function in_text_enable()
 {
  if($this->in_text_enable!='Y') $this->in_text_enable='N';
  $this->in_text_id=(int)$this->in_text_id;
  
  $this->sql_query="update tbl_texts set t_enable='".$this->in_text_enable."
' where t_id='".$this->in_text_id."'";
  $this-sql_execute();
  if($this->sql_err) return(11);

  return(0);
 }

  function in_text_remove()
 {
  $this->in_text_id=(int)in_text_id;

  $this->sql_query="delete from tbl_texts where t_id='".$this->in_text_id;
  $this->sql_execute();
  if($this-sql_err) return(11);

  if(!unlink($this->PATH_DATA."/".$this->in_text_id)) return(32);

  return(0);
 }

*/
}


?>
