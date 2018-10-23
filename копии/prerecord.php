<TABLE width="971" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="?f=hello" tppabs="http://www.vagr.vitebsk.by/">Главная</A></div><div class="tax1"><A href="?f=prerecord"></A></div><div class="tax2"><span>Предварительная запись</span></div></div></TD>
	</TR>
	<TR>
		<TD align="left" valign="top"><H2>Предварительная запись</H2></TD>
	</TR>
	<TR>
	  <td><br />
	  

<br />
<? 
  
  require_once("/var/www/vhosts/vagr.vitebsk.by/httpdocs/req/in.php"); 

//---------------------------------------------------------------------------------------------------------------------------------

    $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //Смените на имя своего почтового ящика.
    $config['smtp_port']     = '25'; // Порт работы. Не меняйте, если не уверены.
    $config['smtp_host']     = 'smtp.vagr.vitebsk.by';  //сервер для отправки почты
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
            $SEND .= "Content-Type: text/plain; charset=\"".$config['smtp_charset']."\"\r\n";
            $SEND .= "Content-Transfer-Encoding: 8bit\r\n";
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
 
    fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
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

  
  ///home/vagr.vitebsk.by/req/in.php   /var/www/vhosts/vagr.vitebsk.by/httpdocs/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
     if (($_POST["fioman"]!="")&&($_POST["address"]!="")&&($_POST["email"]!="")&&($_POST["tel"]!="")&&($_POST["daterec"]!="")&&($_POST["timerec"]!="")&&($_POST["question"]!=""))
	 {   
         $subject = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000);
         $fioman = substr(htmlspecialchars(trim($_POST['fioman'])), 0, 100); 
         $address = substr(htmlspecialchars(trim($_POST['address'])), 0, 400); 
         $daterec = substr(htmlspecialchars(trim($_POST['daterec'])), 0, 20); 
         $timerec = substr(htmlspecialchars(trim($_POST['timerec'])), 0, 20); 
         $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 30); 
         $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 30); 
         $question =  substr(htmlspecialchars(trim($_POST['question'])), 0, 2000);
         $message =  substr(htmlspecialchars(trim($_POST['question'])), 0, 10000); 


        // $to - кому отправляем 
         $mail_to = 'R1083@NCA.BY';
         $mail_to1= 'R1205@NCA.BY';
		 $mail_to2= 'R839@NCA.BY';

        // if ($_POST['CountryFiz']==200) {$to = 'a200@nca.by,d200@nca.by'; }
        // if ($_POST['CountryFiz']==220) {$to = 'd220@nca.by'; }
        // if ($_POST['CountryFiz']==230) {$to = 'd230@nca.by'; }
        // if ($_POST['CountryFiz']==240) {$to = 'a240@nca.by'; }   
        // if ($_POST['CountryFiz']==250) {$to = 'a250@nca.by'; }	
        // $from - от кого 
         $from='a200@nca.by'; 
        //$from="MIME-Version: 1.0\r\n";
        //$from.="Content-Type: text/html; charset=windows-1251\r\n"; 
         $title='Предварительная запись с сайта. Физ. лица';
        // функция, которая отправляет наше письмо. 


	    //Замените настройки на нужные.
	    //вам потребуется указать здесь Ваш настоящий почтовый ящик, куда должно будет прийти письмо.
        /*  if ($_POST['CountryFiz']==200) {$mail_to = 'd200@nca.by'; }
        if ($_POST['CountryFiz']==220) {$mail_to = 'd220@nca.by'; }
        if ($_POST['CountryFiz']==230) {$mail_to = 'd230@nca.by'; }
        if ($_POST['CountryFiz']==240) {$mail_to = 'a240@nca.by'; }   
        if ($_POST['CountryFiz']==250) {$mail_to = 'a250@nca.by'; }		*/
	
	     $type = 'plain'; //Можно поменять на html; plain означяет: будет присылаться чистый текст.
	     $charset = 'windows-1251';
	
	    //include('/home/vagr.vitebsk.by/inc/smtp-func.php');
	    //if ($_REQUEST['message'])
	    //{  
	         //print '+++++++++++++++++++++++++++++++';
	         // $message = $_REQUEST['message'];
	         // $subject = $_REQUEST['subject'];
	         // $mail_from = $_REQUEST['mail_from'];
	        /// $replyto = $_REQUEST['replyto'];
   
         if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\.)]/", $fioman))
        {
	        $soob='                        <b><font color="#F00" size="3pt" >Запрос на запись не отправлен. В поле "Фамилия, Имя, Отчество" допускается вводить только буквы и точки.</font></b>';
	        echo "<script>alert('В поле <Фамилия, Имя, Отчество> допускаетсся вводить только буквы!');</script> "; 
	    }elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\,)|(\-)|(\.)|(\?)]/", $address))
	    {
	         $soob='                         <b><font color="#F00" size="3pt" >Запрос на запись не отправлен. В поле "Адрес" допускается вводить только буквы, цифры, знаки препинания и тире.</font></b>';
	         echo "<script>alert('В поле <Адрес> допускаетсся вводить только буквы, цифры, знаки препинания и тире!');</script> "; 
		
	    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))//elseif (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/", $email))
	    {
	         $soob='                         <b><font color="#F00" size="3pt" >Запрос на запись не отправлен. В поле "e-mail" допускается вводить только адрес электронной почтыв формате х@x.x</font></b>';
	         echo "<script>alert('В поле <e-mail> допускаетсся вводить только адрес электронной почты');</script> "; 
		
	    }elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\-)|(\.)]/", $tel))
	    {
	         $soob='                         <b><font color="#F00" size="3pt" >Запрос на запись не отправлен. В поле "Телефон" допускается вводить только буквы и цифры и знаки препинания.</font></b>';
	         echo "<script>alert('В поле <Телефон> допускаетсся вводить только буквы и цифры!');</script> "; 

	    }elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\,)|(\.)|(\?)|(\!)]/", $question))
	    {
	         $soob='                         <b><font color="#F00" size="3pt" >Запрос на запись не отправлен. В поле "Причина обращения" допускается вводить только буквы и знаки препинания.</font></b>';
	         echo "<script>alert('В поле <Вопрос> допускаетсся вводить только буквы и знаки препинания!');</script> "; 
	    }else
	   {	  
	        $headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset="windows-1251"' . "\r\n";
	        $headers .= 'From: a200@nca.by'. "\r\n";	   
	        $subject='Предварительная запись с сайта';
	        $message=' Фамилия Имя Отчество:'.$fioman.' Адрес недвижимости, по которому обращаются:'.$address.', e-mail: '.$email.', Телефон: '.$tel.', Дата, на которую хотят записаться: '.$daterec.', Время, которое хотят записаться: '.$timerec.', Причина обращения:'.$question;
	        $sended = smtpmail($mail_to, $subject, $message, $headers);
	        $sended1 = smtpmail($mail_to1, $subject, $message, $headers);
			$sended2 = smtpmail($mail_to2, $subject, $message, $headers);
	        if (!$sended) echo '<b><font color="#F00" size="3pt" >Ошибка отправки. Приносим свои извинения. Вы можете задать свой вопрос, отправив его на электронную почту агентства d200@nca.by. </font></b>'.$mail_to;
	        else echo '<b><font color="#0aa01c" size="3pt">Запрос на запись принят. Он будет обработан, после чего с вами свяжется наш специалист.</font></b>';
	       //exit;
	   }
       $date_today = date("y.m.d H:i:s");
       $my->date_today=$date_today;
       $my->in_question=$question;
       $my->fioman=$fioman;
       $my->address=$address;
       $my->email= $email;
       $my->tel= $tel;
       $my->daterec=$daterec;
       $my->timerec=$timerec;
   
       $err=$my->in_prerecord_add();
      //проверка есть ли лишние символы 
  
	   if($err)
	  {
	      //$my->error=$my->err_to_html($err);
	  }else
	  {
	      //$my->html_error=$my->ok_to_html("Рубрика '".$my->in_cat_name."' успешно добавлено в базу");
	      unset($question, $fioman, $address, $email, $tel, $date_today, $timerec, $daterec);
	  }
  
     // $out='<b><font color="#0aa01c" size="3pt">'.$soob.'</font></b>'; 
      $out=$soob.'<br/><br/>';
      print $out; 
 
      if($k==1)
     {
	      $k=0;  
      } 
	  
  }else
  {
		$soob='                        <b><font color="#F00" size="3pt" >Для отправки запроса на предварителную запись, необходимо заполнить все поля формы!</font></b><br/><br/>';
		print $soob; 
	//		 print  '$fioman='.$fioman.'  $address='.$address.'  $email='.$email.'  $tel='.$tel.'  $daterec='.$daterec.'  $timerec='.$timerec.'  $question='.$question;
  }

}
?>

<div class="TD1">Предварительная запись осуществляется не ранее чем за сутки от желаемой даты и времени приема.</div><br />
<h1 align="center">Для физических лиц</h1><br />
        <div class="TD1">	
         <form action="<? $PHP_SELF; ?>" method="post" class="form_"> 
			 <div class="align_center" > 
              <input type="hidden" name="tt" value="Y">
			   <b>Фамилия, Имя, Отчество:</b><br/>
			  <input type="text" name="fioman" value=" <? echo $fioman; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>Адрес недвижимости, по которому обращаетесь: </b><br /> 
			  <input type="text" name="address" value="<? echo $address; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>E-mail</b><br /> 
			  <input type="text" name="email" value="<? echo $email; ?>" class="form_text_urgent" size="50"><br /> 
              <b>Номер телефона</b><br/>
			  <input type="text" name="tel" value=" <? echo $tel; ?> " class="form_text_urgent" size="50"><br />
              <b>Дата приема </b><br/>
			  <input type="text" name="daterec" value="<? echo $daterec; ?>" onfocus="this.select();lcs(this)" onclick="event.cancelBubble=true;this.select();lcs(this)" size="15"><br/>
              <b>Время приема</b><br/>
              <input type="text" name="timerec" value=" <? echo $timerec; ?> " class="form_text_urgent" size="15"> <br/>
               <br />
			  <b>Причина обращения</b><br /> 
			  <textarea name="question" value="<? echo $question; ?>" class="form_text_urgent" rows="10" cols="40"></textarea> 
			  <br /><br /> </div>
			  <input type="submit" value="Отправить" class="form_submit_normal"></div> 
		  </form>
		  <br /><br />
  
	  </td>
	</TR>
</table>
