<TABLE width="100%" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="?f=hello" tppabs="http://www.vagr.vitebsk.by/">Главная</A></div><div class="tax1"><A href="?f=askquestion"></A></div><div class="tax2"><span>Электронные обращения</span></div></div></TD>
	</TR>
	<TR>
		<TD align="left" valign="top"><H2>Электронные обращения</H2></TD>
	</TR>
	<TR>
	  <td><br />
	  
<br />
<strong style="color:#F00;">Внимание!</strong> В случае неоформления в соответствии с требованиями, установленными Законом Республики Беларусь «Об обращениях граждан и юридических лиц», электронное обращение может быть оставлено без рассмотрения по существу.
<br /><br />
<? 
  
  require_once("/home/vagrvitebsk/www/req/in.php"); 

//---------------------------------------------------------------------------------------------------------------------------------

    $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //Смените на имя своего почтового ящика.
    $config['smtp_port']     = '25'; // Порт работы. Не меняйте, если не уверены.
    $config['smtp_host']     = 'vagr.vitebsk.by';  //сервер для отправки почты
    $config['smtp_password'] = '1234Vecb-Gecb4321';  //Измените пароль
    $config['smtp_debug']   = true;  //Если Вы хотите видеть сообщения ошибок, укажите true вместо false
    $config['smtp_charset']  = 'windows-1251';  //кодировка сообщений. (или UTF-8, итд)
    $config['smtp_from']     = 'vagr.vitebsk.by'; //Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого"
function smtpmail($mail_to, $subject, $message, $headers='') {
    global $config;
    $SEND = "Date: ".date("D, d M Y H:i:s") . " UT\r\n";
    $SEND .=    'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
    if ($headers) $SEND .= $headers."\r\n\r\n";
    else
    {
            $SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
            $SEND .= "MIME-Version: 1.0\r\n";
            //$SEND .= "Content-Type: text/plain; charset=\"".$config['smtp_charset']."\"\r\n";
            //$SEND .= "Content-Transfer-Encoding: 8bit\r\n";
			$SEND .= "Content-Type: multipart/mixed; boundary=\"----------A4D921C2D10D7DB\"\r\n";
            $SEND .= "From: \"".$config['smtp_from']."\" <".$config['smtp_username'].">\r\n";
            $SEND .= "To: $mail_to <$mail_to>\r\n";
            $SEND .= "X-Priority: 3\r\n\r\n";
    }
    $SEND .=  $message."\r\n";
     if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
        if ($config['smtp_debug']) echo $errno."&lt;br&gt;".$errstr;
        return false;
     }
 
    if (!server_parse($socket, "220", __LINE__)) return false;
 
    fputs($socket, "EHLO " . $config['smtp_host'] . "\r\n");
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не могу отправить HELO!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "AUTH LOGIN\r\n");
    if (!server_parse($socket, "334", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос авторизаци.</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
    if (!server_parse($socket, "334", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
    if (!server_parse($socket, "235", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не могу отправить комманду MAIL FROM: </p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");
 
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не могу отправить комманду RCPT TO: </p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "DATA\r\n");
 
    if (!server_parse($socket, "354", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не могу отправить комманду DATA</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, $SEND."\r\n.\r\n");
 
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "QUIT\r\n");
    fclose($socket);
    return TRUE;
}
 
function server_parse($socket, $response, $line = __LINE__) {
    global $config;
    while (@substr($server_response, 3, 1) != ' ') {
        if (!($server_response = fgets($socket, 256))) {
            if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
            return false;
        }
    }
    if (!(substr($server_response, 0, 3) == $response)) {
        if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
        return false;
    }
    return true;
}


//----------------------------------------------------------------------------------------------------------------------------------







  
  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  
 
  if($_POST["tt1"]=="Y")
  { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
   
   $title1 = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000); 
   $fioman1 = substr(htmlspecialchars(trim($_POST['fioman1'])), 0, 400); 
   $fio1 = substr(htmlspecialchars(trim($_POST['fio1'])), 0, 400); 
   $email1 = substr(htmlspecialchars(trim($_POST['email1'])), 0, 30); 
   $tel1 = substr(htmlspecialchars(trim($_POST['tel1'])), 0, 1000); 
   $question1 =  substr(htmlspecialchars(trim($_POST['question1'])), 0, 2000);
   $mes1 =  substr(htmlspecialchars(trim($_POST['question1'])), 0, 10000); 

  // $to - кому отправляем 
    if ($_POST['CountryUr']==200) {$mail_to = 'd200@nca.by'; }
    if ($_POST['CountryUr']==220) {$mail_to = 'd220@nca.by'; }
    if ($_POST['CountryUr']==230) {$mail_to = 'd230@nca.by'; }
    if ($_POST['CountryUr']==240) {$mail_to = 'a240@nca.by'; }   
    if ($_POST['CountryUr']==250) {$mail_to = 'a250@nca.by'; }		
    //if ($_POST['CountryUr']==200) {$to1 = 'd200@nca.by,a200@nca.by'; }
    //if ($_POST['CountryUr']==220) {$to1 = 'd220@nca.by,a220@nca.by'; }
    //if ($_POST['CountryUr']==230) {$to1 = 'd230@nca.by,a230@nca.by'; }
    //if ($_POST['CountryUr']==240) {$to1 = 'd240@nca.by,a240@nca.by'; }   
    //if ($_POST['CountryUr']==250) {$to1 = 'd250@nca.by,a250@nca.by'; }	
   
   // $from - от кого 
   $from1='a200@nca.by'; 

   $title1='с сайта';
   // функция, которая отправляет наше письмо. 
   if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $fioman1))
   {  
	  $soob1='                        Вопрос не отправлен. В поле "Кому" допускается вводить только буквы.';
	  echo "<script>alert('В поле <Кому> допускаетсся вводить только буквы!');</script> "; 
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $fio1))
	{
	  $soob1='                        Вопрос не отправлен. В поле "ФИО" допускается вводить только буквы.';
	  echo "<script>alert('В поле <ФИО> допускаетсся вводить только буквы!');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $tel1))
	{
	  $soob1='                        Вопрос не отправлен. В поле "ФИО руководителя" допускается вводить только буквы.';
	  echo "<script>alert('В поле <ФИО руководителя> допускаетсся вводить только буквы!');</script> "; 

	}elseif (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/", $email1))
	{
	  $soob1='                        Вопрос не отправлен. В поле "email" допускается вводить только адрес электронной почтыв формате х@x.x';
	  echo "<script>alert('В поле <email> допускаетсся вводить только адрес электронной почты');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $question1))
	{
	  $soob1='                        Вопрос не отправлен. В поле "Вопрос" допускается вводить только буквы и цифры.';
	  echo "<script>alert('В поле <Вопрос> допускаетсся вводить только буквы и цифры!');</script> "; 
	}else
	{
  	   $headers1  = 'MIME-Version: 1.0' . "\r\n";
	   //$headers1 .= 'Content-type: text/html; charset="windows-1251"' . "\r\n";
	   $headers1 .="Content-Type: multipart/mixed; boundary=\"----------A4D921C2D10D7DB\"\r\n";
	   $headers1 .= 'From: a200@nca.by'. "\r\n";	   
	   $subject1='Электронное обращение юр. лиц';

       if ( !empty( $_FILES['file']['tmp_name'] ) and $_FILES['file']['error'] == 0 ) {
       $filepath = $_FILES['file']['tmp_name'];
       $filename = $_FILES['file']['name'];
       } else {
       $filepath = '';
       $filename = '';
       }	   
	   
       $file = '';
       if ( !empty( $filepath ) ) 
	   {
           $fp = fopen($filepath, "r");
           if ( $fp ) 
		   {
                $content = fread($fp, filesize($filepath));
                fclose($fp);
                $file .= "------------A4D921C2D10D7DB"."\r\n";
                $file .= "Content-Type: application/octet-stream\r\n";
                $file .= "Content-Transfer-Encoding: base64\r\n";
                $file .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
                $file .= chunk_split(base64_encode($content))."\r\n";
           }
       } 

	   //Текст письма
	   $message1="------------A4D921C2D10D7DB"."\r\n";
       $message1.="Content-Type: text/plain; charset=windows-1251"."\r\n";
       $message1.="Content-Transfer-Encoding: quoted-printable\r\n\r\n";
	   $message1.='Вопрос:'.$_POST['question1'].' Кому:'.$_POST['fioman1'].' Фамилия Имя Отчество:'.$_POST['fio1'].', e-mail: '.$_POST['email1'].', Адрес: '.$_POST['tel1']."\r\n\r\n";
	   
	   //вложенный файл 
	   $message1.=$file;
	   $message1.="------------A4D921C2D10D7DB--"."\r\n";
	   
	   $sended1 = smtpmail($mail_to, $subject1, $message1, $headers1);
	   if (!$sended1) echo '<b><font color="#F00" size="3pt" >Ошибка отправки. Приносим свои извинения. Вы можете задать свой вопрос, отправив его на электронную почту агентства d200@nca.by. Ящики филиалов указаны выше.</font></b>';
	   else echo '<b><font color="#0aa01c" size="3pt">Вопрос успешно отправлен. Спасибо за вопрос.</font></b>';

   

 $date_today = date("y.m.d H:i:s");

   $my->in_question=$_POST['question1'];
   $my->fioman=$_POST['fioman1'];
   $my->fio=$_POST['fio1'];
   $my->email= $_POST['email1'];
   $my->tel= $_POST['tel1'];
   $my->date_today=$date_today;
   $err=$my->in_question_add();
   }//проверка есть ли лишние символы
   
	if($err)
	{
	  //$my->error=$my->err_to_html($err);
	}else
	{
	  //$my->html_error=$my->ok_to_html("Рубрика '".$my->in_cat_name."' успешно добавлено в базу");
	  unset($date_today, $question1, $fioman1, $fio1, $email1, $tel1);
	}
  print $out;

  }  
?> 

<h1 align="center">Для юридических лиц и индивидуальных предпринимателей</h1><br />
        <div class="TD1">		 
		 <form enctype="multipart/form-data" action="<? $PHP_SELF; ?>" method="post" class="form_"> 
			 <div align="center"> 
			  <input type="hidden" name="tt1" value="Y">
              <b>Вывберите структурное подразделение/Выбярыце структурнае падраздзяленне</b><br/>
              <select name="CountryUr" class="form_text_urgent" style="width:325;">
                <option value="200">Витебское агентство</option>
                <option value="240">Оршанский филиал</option> 
                <option value="230">Лепельский филиал</option> 
                <option value="250">Полоцкий филиал</option>
                <option value="220">Глубокский филиал</option>  
              </select><br/>
              <b>Кому (наименование и (или) адрес организации либо должность лица, которым направляется обращение)/Каму (назва і (або) адрас арганізацыі альбо пасаду асобы, якім накіроўваецца зварот)</b><br/>
			  <input type="text" name="fioman1" value=" <? echo $fioman1; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>Полное наименование юридического лица и его место нахождения/Поўнае найменне юрыдычнай асобы і яго месца знаходжання</b></div>
			  <input type="text" name="fio1" value=" <? echo $fio1; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>Фамилия, собственное имя, отчество (если таковое имеется) руководителя или лица, уполномоченного в установленном порядке подписывать обращения -для юр.лиц)/Прозвішча, уласнае імя, імя па бацьку (калі такое маецца) кіраўніка або асобы, упаўнаважанай ва ўстаноўленым парадку падпісваць звароты-для юр.лиц</b><br /> 
			  <input type="text" name="tel1" value="<? echo $tel1; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>e-mail</b><br /> 
			  <input type="text" name="email1" value="<? echo $email1; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>Вопрос</b><br /> 
			  <textarea name="question1" value="<? echo $question1; ?>" class="form_text_urgent" rows="10" cols="40"></textarea> 
              <br /><br /> 
              <b>Прикрепить файл</b><br />
              <input type="file" name="file" />
			  <br /><br /> 
			  <input type="submit" value="Отправить" class="form_submit_normal"></div> 
		  </form> 	  
		  <br /><br />
     </td>
	</TR>
</table>
