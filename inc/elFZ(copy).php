<TABLE width="100%" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="?f=hello" tppabs="http://www.vagr.vitebsk.by/">�������</A></div><div class="tax1"><A href="?f=askquestion"></A></div><div class="tax2"><span>����������� ���������</span></div></div></TD>
	</TR>
	<TR>
		<TD align="left" valign="top"><H2>����������� ���������</H2></TD>
	</TR>
	<TR>
	  <td><br />
	  
<br />
<strong style="color:#F00;">��������!</strong> � ������ ������������ � ������������ � ������������, �������������� ������� ���������� �������� ��� ���������� ������� � ����������� ����, ����������� ��������� ����� ���� ��������� ��� ������������ �� ��������.
<br /><br />
<? 
  
  require_once("/home/vagrvitebsk/www/req/in.php"); 

//---------------------------------------------------------------------------------------------------------------------------------

    $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //������� �� ��� ������ ��������� �����.
    $config['smtp_port']     = '25'; // ���� ������. �� �������, ���� �� �������.
    $config['smtp_host']     = 'mail.vagr.vitebsk.by';  //������ ��� �������� �����
    $config['smtp_password'] = '1234Vecb-Gecb4321';  //�������� ������
    $config['smtp_debug']   = true;  //���� �� ������ ������ ��������� ������, ������� true ������ false
    $config['smtp_charset']  = 'windows-1251';  //��������� ���������. (��� UTF-8, ���)
    $config['smtp_from']     = 'vagr.vitebsk.by'; //���� ��� - ��� ��� ������ �����. ����� ���������� ��� ��������� � ���� "�� ����"
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
 
    fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ��������� HELO!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "AUTH LOGIN\r\n");
    if (!server_parse($socket, "334", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ����� ����� �� ������ ����������.</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
    if (!server_parse($socket, "334", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>����� ����������� �� ��� ������ ��������!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
    if (!server_parse($socket, "235", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>������ �� ��� ������ �������� ��� ������! ������ �����������!</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ��������� �������� MAIL FROM: </p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");
 
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ��������� �������� RCPT TO: </p>';
        fclose($socket);
        return false;
    }
    fputs($socket, "DATA\r\n");
 
    if (!server_parse($socket, "354", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ��������� �������� DATA</p>';
        fclose($socket);
        return false;
    }
    fputs($socket, $SEND."\r\n.\r\n");
 
    if (!server_parse($socket, "250", __LINE__)) {
        if ($config['smtp_debug']) echo '<p>�� ���� ��������� ���� ������. ������ �� ���� �����������!</p>';
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
            if ($config['smtp_debug']) echo "<p>�������� � ��������� �����!</p>$response<br>$line<br>";
            return false;
        }
    }
    if (!(substr($server_response, 0, 3) == $response)) {
        if ($config['smtp_debug']) echo "<p>�������� � ��������� �����!</p>$response<br>$line<br>";
        return false;
    }
    return true;
}


//----------------------------------------------------------------------------------------------------------------------------------







  
  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
        // $_POST['title'] �������� ������ �� ���� "����", trim() - ������� ��� ������ ������� � �������� �����, htmlspecialchars() - ����������� ����������� ������� � HTML ��������, ����� ������� ��� ����, ����� ���������� ������� �������� ��� ���� ����������, �� �  substr($_POST['title'], 0, 1000) - ������� ����� �� 1000 ��������. ��� ���������� $_POST['mess'] ��� ���������� 
  
   $subject = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000);
   $fioman = substr(htmlspecialchars(trim($_POST['fioman'])), 0, 400); 
   $fio = substr(htmlspecialchars(trim($_POST['fio'])), 0, 400); 
   $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 30); 
   $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 1000); 
   $question =  substr(htmlspecialchars(trim($_POST['question'])), 0, 2000);
   $message =  substr(htmlspecialchars(trim($_POST['question'])), 0, 10000); 


  // $to - ���� ���������� 
   $to ='a200@nca.by,d200@nca.by';
   
   // if ($_POST['CountryFiz']==200) {$to = 'a200@nca.by,d200@nca.by'; }
   // if ($_POST['CountryFiz']==220) {$to = 'd220@nca.by'; }
   // if ($_POST['CountryFiz']==230) {$to = 'd230@nca.by'; }
   // if ($_POST['CountryFiz']==240) {$to = 'a240@nca.by'; }   
   // if ($_POST['CountryFiz']==250) {$to = 'a250@nca.by'; }	
   // $from - �� ���� 
   $from='a200@nca.by'; 
   //$from="MIME-Version: 1.0\r\n";
   //$from.="Content-Type: text/html; charset=windows-1251\r\n"; 
   $title='� �����';
   // �������, ������� ���������� ���� ������. 


	//�������� ��������� �� ������.
	//��� ����������� ������� ����� ��� ��������� �������� ����, ���� ������ ����� ������ ������.
    if ($_POST['CountryFiz']==200) {$mail_to = 'd200@nca.by'; }
    if ($_POST['CountryFiz']==220) {$mail_to = 'd220@nca.by'; }
    if ($_POST['CountryFiz']==230) {$mail_to = 'd230@nca.by'; }
    if ($_POST['CountryFiz']==240) {$mail_to = 'a240@nca.by'; }   
    if ($_POST['CountryFiz']==250) {$mail_to = 'a250@nca.by'; }		
	
	$type = 'plain'; //����� �������� �� html; plain ��������: ����� ����������� ������ �����.
	$charset = 'windows-1251';
	
	//include('/home/vagr.vitebsk.by/inc/smtp-func.php');
	//if ($_REQUEST['message'])
	//{  
	   //print '+++++++++++++++++++++++++++++++';
	  // $message = $_REQUEST['message'];
	  // $subject = $_REQUEST['subject'];
	  // $mail_from = $_REQUEST['mail_from'];
	  /// $replyto = $_REQUEST['replyto'];
   if (preg_match("/[<>\/]/", $fioman))
   {
	  $soob='                        ������ �� ���������. � ���� "����" ����������� ������� ������ �����.';
	  echo "<script>alert('� ���� <����> ������������ ������� ������ �����!');</script> "; 
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $fio))
	{
	  $soob='                        ������ �� ���������. � ���� "���" ����������� ������� ������ �����.';
	  echo "<script>alert('� ���� <���> ������������ ������� ������ �����!');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $tel))
	{
	  $soob='                        ������ �� ���������. � ���� "�����" ����������� ������� ������ ����� � �����.';
	  echo "<script>alert('� ���� <�����> ������������ ������� ������ ����� � �����!');</script> "; 

	}elseif (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/", $email))
	{
	  $soob='                        ������ �� ���������. � ���� "email" ����������� ������� ������ ����� ����������� ������ ������� �@x.x';
	  echo "<script>alert('� ���� <email> ������������ ������� ������ ����� ����������� �����');</script> "; 
		
	}elseif (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)|(\.)]/", $question))
	{
	  $soob='                        ������ �� ���������. � ���� "������" ����������� ������� ������ �����.';
	  echo "<script>alert('� ���� <������> ������������ ������� ������ �����!');</script> "; 
	}else
	{	  
	   $headers  = 'MIME-Version: 1.0' . "\r\n";
	   //$headers .= 'Content-type: text/html; charset="windows-1251"' . "\r\n";
	   $headers .="Content-Type: multipart/mixed; boundary=\"----------A4D921C2D10D7DB\"\r\n";	   
	   $headers .= 'From: a200@nca.by'. "\r\n";	   
	   $subject='����������� ���������';

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

		//����� ������   
	   $message="------------A4D921C2D10D7DB"."\r\n";
       $message.="Content-Type: text/plain; charset=windows-1251"."\r\n";
       $message.="Content-Transfer-Encoding: quoted-printable\r\n\r\n";
       $message.='������:'.$question.' ����:'.$fioman.' ������� ��� ��������:'.$fio.', e-mail: '.$email.', �����: '.$tel."\r\n\r\n";
	   //����� ������
	   $message.=$file;
   	   $message.="------------A4D921C2D10D7DB--"."\r\n";
	   $sended = smtpmail($mail_to, $subject, $message, $headers);
	   
	   
	   if (!$sended) echo '<b><font color="#F00" size="3pt" >������ ��������. �������� ���� ���������. �� ������ ������ ���� ������, �������� ��� �� ����������� ����� ��������� d200@nca.by. ����� �������� ������� ����.</font></b>'.$mail_to;
	   else echo '<b><font color="#0aa01c" size="3pt">������ ������� ���������. ������� �� ������.</font></b>';
	   //exit;
	   
	}
	//Header('Location: mailer.html');





//    $mes=$question.' '.$fioman.' '.$fio.' '.$email.' '.$tel;
//       if( mail($to, $title, $mes.' ����:'.$fioman.' ������� ��� ��������:'.$fio.', e-mail:'.$email.', �����:'.$tel, 'From:'.$from))
	 //  mail($to, $title, $mes.' ����:'.$fioman.' ������� ��� ��������:'.$fio.', e-mail:'.$email.', �����:'.$tel, 'From:'.$from);
//	$sendmail= mail('a200@nca.by','sdfsdf','sdfsdfsdf'); 
//	if ($sendmail) {print '����������';} else {print '�� ��������';}
/*	 {$soob='                        <b><font color="#0aa01c" size="3pt">������ ������� ���������. ������� �� ������.</font></b>'; } else {$soob='                        <b><font color="#F00" size="3pt" >������ �� ���������. �������� ���� ���������, ������� ����������� ������. �� ������ ������ ���� ������, �������� ��� �� ����������� ����� ��������� d200@nca.by. ����� �������� ������� ����.</font></b>';}*/

   $date_today = date("y.m.d H:i:s");
   $my->in_question=$question;
   $my->fioman=$fioman;
   $my->fio=$fio;
   $my->email= $email;
   $my->tel= $tel;
   $my->date_today=$date_today;
   $err=$my->in_question_add();
   //�������� ���� �� ������ ������� 
  
	if($err)
	{
	  //$my->error=$my->err_to_html($err);
	}else
	{
	  //$my->html_error=$my->ok_to_html("������� '".$my->in_cat_name."' ������� ��������� � ����");
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
<h1 align="center">��� �������</h1><br />
        <div class="TD1">		 
		 <form enctype="multipart/form-data" action="<? $PHP_SELF; ?>" method="post" class="form_"> 
			 <div align="center"> 
              <input type="hidden" name="tt" value="Y">
              <b>��������� ����������� �������������/�������� ����������� ��������������</b><br/>
              <select name="CountryFiz" class="form_text_urgent" style="width:325;">
                <option value="200">��������� ���������</option>
                <option value="240">��������� ������</option> 
                <option value="230">���������� ������</option> 
                <option value="250">�������� ������</option>
                <option value="220">���������� ������</option>  
              </select><br/>              
			   <b>���� (������������ � (���) ����� ����������� ���� ��������� ����, ������� ������������ ���������)/���� (����� � (���) ����� ���������� ����� ������ �����, ��� ����������� ������)</b><br/>
			  <input type="text" name="fioman" value=" <? echo $fioman; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>������� ��� �������� /�������� ��� ��� �� ������ </b></div>
			  <input type="text" name="fio" value=" <? echo $fio; ?> " class="form_text_urgent" size="50"><br /> 
			  <b>����� ����� ���������� (����� ����������)/����� ����� ��������� (����� �����������)</b><br /> 
			  <input type="text" name="tel" value="<? echo $tel; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>e-mail</b><br /> 
			  <input type="text" name="email" value="<? echo $email; ?>" class="form_text_urgent" size="50"><br /> 
			  <b>������</b><br /> 
			  <textarea name="question" value="<? echo $question; ?>" class="form_text_urgent" rows="10" cols="40"></textarea> 
			  <br /><br /> 
              <b>���������� ����</b><br />
              <input type="file" name="file" />
              <br /><br /> 
			  <input type="submit" value="���������" class="form_submit_normal"></div> 
		  </form> 	  
		  <br /><br />
     </td>
	</TR>
</table>
