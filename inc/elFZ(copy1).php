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




 /*   $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //������� �� ��� ������ ��������� �����.
    $config['smtp_port']     = '25'; // ���� ������. �� �������, ���� �� �������.
    $config['smtp_host']     = 'webmail.vagr.vitebsk.by';  //������ ��� �������� �����
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
}*/


//----------------------------------------------------------------------------------------------------------------------------------







  
  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
        // $_POST['title'] �������� ������ �� ���� "����", trim() - ������� ��� ������ ������� � �������� �����, htmlspecialchars() - ����������� ����������� ������� � HTML ��������, ����� ������� ��� ����, ����� ���������� ������� �������� ��� ���� ����������, �� �  substr($_POST['title'], 0, 1000) - ������� ����� �� 1000 ��������. ��� ���������� $_POST['mess'] ��� ���������� 
  
    $smtp_server = "vagr.vitebsk.by"; // ����� ���������� ������ ���� �������� ���. �.�. ��� ������, � �������� �� ������ ������������
    $port = 25; // ���� �������. �� ��������� ��� ����������� �������� �������� �� ����� 25
    $mydomain = "vagr.vitebsk.by"; // ����� ������������ ��������� �����, ��� ���������� �������� ����� ������ �������� ��������
    $username = "admin@vagr.vitebsk.by"; // ����� �� ���������� ��������� ���� �������� ����, � �������� �� ������ ������������ � �� ����� �������� �� ������ �������� �����
    $password = "1234Vecb-Gecb4321"; //����� �� ���������� ������ ��� ��������� �����
    $sender = "a200@nca.by"; //����� ����������� ��� �����������. ��������� "�� ����"
    $recipient = "booom200585@mail.ru"; //����� ����������� ���� �� ������ �������� ���������
    $subject = "����������� ���������"; //���� ���������
    $content = "test"; //���� ���������

    //���������� ����������� � ���������� �������
    $handle = fsockopen($smtp_server, $port);
    if(!$handle){echo "ERROR";}

    //�������� "�������������� ��������� ��������� �������"
    fputs($handle, "EHLO $mydomain\r\n");

    // ����������� SMTP
    fputs($handle, "AUTH LOGIN\r\n");
    fputs($handle, base64_encode($username)."\r\n");
    fputs($handle, base64_encode($password)."\r\n");

    // �������� ���������
    fputs($handle, "MAIL FROM:<$sender>\r\n");
    fputs($handle, "RCPT TO:<$recipient>\r\n");
    fputs($handle, "DATA\r\n");
    fputs($handle, "To: $recipient\r\n");
    fputs($handle, "Subject: $subject\r\n");
    fputs($handle, "$content\r\n");
    fputs($handle, ".\r\n");

    // ��������� ����������� � �������
    fputs($handle, "QUIT\r\n");


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
