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

	
	//$recipient = "booom200585@mail.ru"; //Здесь указывается кому Вы хотите отсылать сообщения

    //$content = "test"; //тело сообщения

	
//----------------------------------------------------------------------------------------------------------------------------------


  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
       
    $smtp_server = "vagr.vitebsk.by"; // Здесь необходимо ввести Ваше доменное имя. Т.е. тот сервер, к которому Вы будете подключаться
    $port = 25; // Порт сервера. По умолчанию для большинства почтовых серверов он равен 25
    $mydomain = "vagr.vitebsk.by"; // здесь дублирование доменного имени, для корректной передачи писем другим почтовым серверам
    $username = "admin@vagr.vitebsk.by"; // Здесь вы указываете созданный Вами почтовый ящик, к которому Вы будете подключаться и от имени которого Вы будете отсылать почту
    $password = "1234Vecb-Gecb4321"; //Здесь Вы указываете пароль для почтового ящика
    $sender = "a200@nca.by"; //Здесь указывается имя отправителя. Формально "От кого"

  

  $subject = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000);
   $fioman = substr(htmlspecialchars(trim($_POST['fioman'])), 0, 400); 
   $fio = substr(htmlspecialchars(trim($_POST['fio'])), 0, 400); 
   $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 30); 
   $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 1000); 
   $question =  substr(htmlspecialchars(trim($_POST['question'])), 0, 2000);
   $content =  substr(htmlspecialchars(trim($_POST['question'])), 0, 10000); 

    $subject = "Электронные обращения"; //тема сообщения    
   //Замените настройки на нужные.
	//вам потребуется указать здесь Ваш настоящий почтовый ящик, куда должно будет прийти письмо.
    //if ($_POST['CountryFiz']==200) {$recipient = 'd200@nca.by'; }
    if ($_POST['CountryFiz']==200) {$recipient = 'booom200585@mail.ru'; }
	if ($_POST['CountryFiz']==220) {$recipient = 'd220@nca.by'; }
    if ($_POST['CountryFiz']==230) {$recipient = 'd230@nca.by'; }
    if ($_POST['CountryFiz']==240) {$recipient = 'a240@nca.by'; }   
    if ($_POST['CountryFiz']==250) {$recipient = 'a250@nca.by'; }		
	

  if (preg_match("/[<>\/]/", $fioman))
   {
	  $soob='                        Вопрос не отправлен. В поле "Кому" допускается вводить только буквы.';
	  echo "<script>alert('В поле <Кому> допускаетсся вводить только буквы!');</script> "; 
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $fio))
	{
	  $soob='                        Вопрос не отправлен. В поле "ФИО" допускается вводить только буквы.';
	  echo "<script>alert('В поле <ФИО> допускаетсся вводить только буквы!');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $tel))
	{
	  $soob='                        Вопрос не отправлен. В поле "Адрес" допускается вводить только буквы и цифры.';
	  echo "<script>alert('В поле <Адрес> допускаетсся вводить только буквы и цифры!');</script> "; 

	}elseif (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/", $email))
	{
	  $soob='                        Вопрос не отправлен. В поле "email" допускается вводить только адрес электронной почтыв формате х@x.x';
	  echo "<script>alert('В поле <email> допускаетсся вводить только адрес электронной почты');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\.)]/", $question))
	{
	  $soob='                        Вопрос не отправлен. В поле "Вопрос" допускается вводить только буквы.';
	  echo "<script>alert('В поле <Вопрос> допускаетсся вводить только буквы!');</script> "; 
	}else
	{	 
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
      
       //$content.='Вопрос:'.$question.' Кому:'.$fioman.' Фамилия Имя Отчество:'.$fio.', e-mail: '.$email.', Адрес: '.$tel."\r\n\r\n";  //Текст письма
	   $content="------------A4D921C2D10D7DB"."\r\n";
       $content.="Content-Type: text/plain; charset=windows-1251"."\r\n";
       $content.="Content-Transfer-Encoding: quoted-printable\r\n\r\n";
      
	   $content.='Вопрос:'.$question;  //Текст письма
	   
	   $content.=$file;
   	   $content.="------------A4D921C2D10D7DB--"."\r\n";
         //"=?windows-1251?B?". base64_encode($_POST[«username»])	   
	   //$content.='Вопрос:'.$question.' Кому:'.$fioman.' Фамилия Имя Отчество:'.$fio.', e-mail: '.$email.', Адрес: '.$tel."\r\n\r\n"; //тело сообщения
	   
	   
	   //$sended = smtpmail($mail_to, $subject, $message, $headers);
	   
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
    //------------------MY-----------------------------------------
	fputs($handle, "MIME-Version: 1.0\r\n");
	fputs($handle, "Content-Type: multipart/mixed; boundary=\"----------A4D921C2D10D7DB\"\r\n");	
	//fputs($handle, "Content-Type: text/plain; charset=windows-1251\r\n");
	//-----------------------------------------------------------
    fputs($handle, "DATA\r\n");
    fputs($handle, "To: $recipient\r\n");
    fputs($handle, "Subject: $subject\r\n");
    fputs($handle, "$content\r\n");
    fputs($handle, ".\r\n");

    // Закрываем подключение к серверу
   
	   
	   
	   if (!$handle) echo '<b><font color="#F00" size="3pt" >Ошибка отправки. Приносим свои извинения. Вы можете задать свой вопрос, отправив его на электронную почту агентства d200@nca.by. Ящики филиалов указаны выше.</font></b>'.$mail_to;
	   else echo '<b><font color="#0aa01c" size="3pt">Вопрос успешно отправлен. Спасибо за вопрос.</font></b>'.$content;
 
 fputs($handle, "QUIT\r\n");	
	//exit;
	
	
	
	  $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
       $headers .= "From: Birthday Reminder <birthday@example.com>\r\n";
       $headers .= "Bcc: birthday-archive@example.com\r\n"; 
	   $mes = 'Вопрос:'.$_POST['question'].' Кому:'.$_POST['fioman'].' Фамилия Имя Отчество:'.$_POST['fio'].', e-mail: '.$_POST['email'].', Адрес: '.$_POST['tel'];
	   $test=mail($recipient,$subject,$mes,$headers);
	   if (!$test) echo 'Ошибка отправки mail';
	    else echo '<b><font color="#0aa01c" size="3pt">Вопрос успешно отправлен через mail</font></b>';	
	}
	//Header('Location: mailer.html');





//    $mes=$question.' '.$fioman.' '.$fio.' '.$email.' '.$tel;
//       if( mail($to, $title, $mes.' Кому:'.$fioman.' Фамилия Имя Отчество:'.$fio.', e-mail:'.$email.', Адрес:'.$tel, 'From:'.$from))
	 //  mail($to, $title, $mes.' Кому:'.$fioman.' Фамилия Имя Отчество:'.$fio.', e-mail:'.$email.', Адрес:'.$tel, 'From:'.$from);
//	$sendmail= mail('a200@nca.by','sdfsdf','sdfsdfsdf'); 
//	if ($sendmail) {print 'Отправлено';} else {print 'Не работает';}
/*	 {$soob='                        <b><font color="#0aa01c" size="3pt">Вопрос успешно отправлен. Спасибо за вопрос.</font></b>'; } else {$soob='                        <b><font color="#F00" size="3pt" >Вопрос не отправлен. Приносим свои извинения, ведутся технические работы. Вы можете задать свой вопрос, отправив его на электронную почту агентства d200@nca.by. Ящики филиалов указаны выше.</font></b>';}*/

   $date_today = date("y.m.d H:i:s");
   $my->in_question=$question;
   $my->fioman=$fioman;
   $my->fio=$fio;
   $my->email= $email;
   $my->tel= $tel;
   $my->date_today=$date_today;
   $err=$my->in_question_add();
   //проверка есть ли лишние символы 
  
	if($err)
	{
	  //$my->error=$my->err_to_html($err);
	}else
	{
	  //$my->html_error=$my->ok_to_html("Рубрика '".$my->in_cat_name."' успешно добавлено в базу");
	  unset($question, $fioman, $fio, $email, $tel, $date_today);
	}
  
 // $out='<b><font color="#0aa01c" size="3pt">'.$soob.'</font></b>'; 
  $out=$soob;
  print $out; 
 
  if($k==1)
  {
	$k=0;  
	 
  } 
  
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
