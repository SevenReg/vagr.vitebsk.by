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




 /*   $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //Смените на имя своего почтового ящика.
    $config['smtp_port']     = '25'; // Порт работы. Не меняйте, если не уверены.
    $config['smtp_host']     = 'webmail.vagr.vitebsk.by';  //сервер для отправки почты
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
			$SEND .= "To: \"=?".$config['smtp_charset']."?B?".base64_encode($to)."=?=\" <$mail_to>\r\n";
			$SEND .= "MIME-Version: 1.0\r\n";
			$SEND .= "Content-Type: text/html; charset=\"".$config['smtp_charset']."\"\r\n";
			$SEND .= "Content-Transfer-Encoding: 8bit\r\n";
			$SEND .= "From: \"=?".$config['smtp_charset']."?B?".base64_encode($config['smtp_from'])."=?=\" <".$config['smtp_username'].">\r\n";
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
}*/


//----------------------------------------------------------------------------------------------------------------------------------







  
  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
        // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично 
  
    $smtp_server = "vagr.vitebsk.by"; // Здесь необходимо ввести Ваше доменное имя. Т.е. тот сервер, к которому Вы будете подключаться
    $port = 25; // Порт сервера. По умолчанию для большинства почтовых серверов он равен 25
    $mydomain = "vagr.vitebsk.by"; // здесь дублирование доменного имени, для корректной передачи писем другим почтовым серверам
    $username = "admin@vagr.vitebsk.by"; // Здесь вы указываете созданный Вами почтовый ящик, к которому Вы будете подключаться и от имени которого Вы будете отсылать почту
    $password = "1234Vecb-Gecb4321"; //Здесь Вы указываете пароль для почтового ящика
    $sender = "a200@nca.by"; //Здесь указывается имя отправителя. Формально "От кого"
    $recipient = "booom200585@mail.ru"; //Здесь указывается кому Вы хотите отсылать сообщения
    $subject = "Электронные обращения"; //тема сообщения
    $content = "test"; //тело сообщения

    //инициируем подключения к удаленному серверу
    $handle = fsockopen($smtp_server, $port);
    if(!$handle){echo "ERROR";}

    //посылаем "приветственное сообщение почтовому серверу"
    fputs($handle, "EHLO $mydomain\r\n");

    // Авторизация SMTP
    fputs($handle, "AUTH LOGIN\r\n");
    fputs($handle, base64_encode($username)."\r\n");
    fputs($handle, base64_encode($password)."\r\n");

    // Отсылаем сообщение
    fputs($handle, "MAIL FROM:<$sender>\r\n");
    fputs($handle, "RCPT TO:<$recipient>\r\n");
    fputs($handle, "DATA\r\n");
    fputs($handle, "To: $recipient\r\n");
    fputs($handle, "Subject: $subject\r\n");
    fputs($handle, "$content\r\n");
    fputs($handle, ".\r\n");

    // Закрываем подключение к серверу
    fputs($handle, "QUIT\r\n");


  }
?>
<h1 align="center">Для граждан</h1><br />
        <div class="TD1">		 
		 <form enctype="multipart/form-data" action="<? $PHP_SELF; ?>" method="post" class="form_"> 
			 <div align="center"> 
              <input type="hidden" name="tt" value="Y">
              <b>Вывберите структурное подразделение/Выбярыце структурнае падраздзяленне</b><br/>
              <select name="CountryFiz" class="form_text_urgent" style="width:325;">
                <option value="200">Витебское агентство</option>
                <option value="240">Оршанский филиал</option> 
                <option value="230">Лепельский филиал</option> 
                <option value="250">Полоцкий филиал</option>
                <option value="220">Глубокский филиал</option>  
              </select><br/>              
			   <b>Кому (наименование и (или) адрес организации либо должность лица, которым направляется обращение)/Каму (назва і (або) адрас арганізацыі альбо пасаду асобы, якім накіроўваецца зварот)</b><br/>
			  <input type="text" name="fioman" value=" <? echo $fioman; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>Фамилия Имя Отчество /Прозвішча Імя Імя па бацьку </b></div>
			  <input type="text" name="fio" value=" <? echo $fio; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>Адрес места жительства (места пребывания)/Адрас месца жыхарства (месца знаходжання)</b><br /> 
			  <input type="text" name="tel" value="<? echo $tel; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>e-mail</b><br /> 
			  <input type="text" name="email" value="<? echo $email; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>Вопрос</b><br /> 
			  <textarea name="question" value="<? echo $question; ?>" class="form_text_urgent" rows="10" cols="40"></textarea> 
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
