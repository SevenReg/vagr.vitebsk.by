<? 
   $my=new class_out;
   $my->sql_connect();  

    $config['smtp_username'] = 'admin@vagr.vitebsk.by';  //������� �� ��� ������ ��������� �����.
    $config['smtp_port']     = '25'; // ���� ������. �� �������, ���� �� �������.
    $config['smtp_host']     = 'vagr.vitebsk.by';  //������ ��� �������� �����
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
 
    fputs($socket, "EHLO " . $config['smtp_host'] . "\r\n");
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







	if (isset($_POST["saveQ"]))
	{   
	    $depName=$my->out_departmet_name($_POST["strDep"]);
	    $date_today = date ("y.m.d H:i:s");
	    $Department=substr(htmlspecialchars(trim($depName)), 0, 500);
        $Reason=substr(htmlspecialchars(trim($_POST['resonQ'])), 0, 500);
        $TimePriem=substr(htmlspecialchars(trim($_POST['priemQ'])), 0, 500)." ".substr(htmlspecialchars(trim($_POST['priemQText'])), 0, 500);
		$Relationship=substr(htmlspecialchars(trim($_POST['relationshipQ'])), 0, 500)." ".substr(htmlspecialchars(trim($_POST['relationshipQText'])), 0, 500);
        $QualityJob=substr(htmlspecialchars(trim($_POST['qualityQ'])), 0, 500)." ".substr(htmlspecialchars(trim($_POST['qualityQtext'])), 0, 500);
        $Stand=substr(htmlspecialchars(trim($_POST['standQ'])), 0, 500)." ".substr(htmlspecialchars(trim($_POST['standQText'])), 0, 500);
		$Offers=substr(htmlspecialchars(trim($_POST['offersQText'])), 0, 500);

	    $my->Department=$depName;
        $my->Reason=$_POST['resonQ'];
        $my->TimePriem=$_POST['priemQ'].' '.$_POST['priemQText'];
		$my->Relationship=$_POST['relationshipQ'].' '.$_POST['relationshipQText'];
        $my->QualityJob=$_POST['qualityQ'].' '.$_POST['qualityQtext'];
        $my->Stand=$_POST['standQ'].' '.$_POST['standQText'];
		$my->Offers=$_POST['offersQText'];
		$my->DateQ=$date_today;
		$err=$my->out_anket_add(); 
		
		$title='������ � �����';
		//$mail_to= 'R1144@nca.by';
		$mail_to= 'R1747@nca.by';

	    $type = 'plain'; //����� �������� �� html; plain ��������: ����� ����������� ������ �����.
	    $charset = 'windows-1251';
		
	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    //$headers .= "Content-Type: text/plain; charset=windows-1251"."\r\n";
		$headers .='Content-type: text/html; charset="windows-1251"' . "\r\n";
	    $headers .= 'From: a200@nca.by'. "\r\n";	   
	    $subject='������ � �����';
	    $message='<b>������</b>'."\n".'<b>� ����� ��������������� ������������� ����������� �� ���������� (������� ���������� �����):</b>'."\n".$depName."\n".'<b>��� ���� ������� ������������� ������ ��������� � ��� ��������� ��������� �� ��������������� ����������� � ���������� �������� (�������,����):</b>'.'\n'.$_POST['resonQ']."\n".'<b>���������� �� ��� ������������� ��� � ����� ������ � ������ ����������:</b>'."\n".$_POST['priemQ'].' '.$_POST['priemQText']."\n".'<b>������������� �� �� ���������� � ��� ��������������� ������������ �����������:</b>'."\n".$_POST['relationshipQ'].' '.$_POST['relationshipQText']."\n".'<b>������������� �� �� ��������� ���������� ����� (�����):</b>'."\n".$_POST['qualityQ'].' '.$_POST['qualityQtext']."\n".'<b>���������� �� ����������� �� �������������� �������, ��������-����� ���������� � ����������� ������������ ������� (�������):</b>'."\n".$_POST['standQ'].' '.$_POST['standQText']."\n".'<b>���� ����������� �� ���������������� ������ �����������:</b>'."\n".$_POST['offersQText'];
	    
		//$sended = smtpmail($mail_to, $subject, nl2br($message), $headers);
		$sended = smtpmail($mail_to, $subject, $message, $headers);

	    if(!isset($err))
	   {
	      unset($Department, $Reason, $TimePriem, $Relationship, $QualityJob, $Stand, $Offers);
	   }
 		
	}
  
?>
<TABLE width="976" BORDER="0" cellspacing="0" cellpadding="5"> 
	<TR>
		<TD align="left" valign="top"><div class="taxonomy"><div class="tax0"><A href="" tppabs="http://www.vagr.vitebsk.by/">�������</A></div><div class="tax1"><A href="">������ ��� ��������</A></div></div>
	   </TD>
	</TR>
	<TR>
		<TD align="center" valign="top">
             <div class="td1"><H1>������</H1></div>
        </TD>
	</TR>
	<TR>
		<TD align="center" height="800px" valign="top">
        <br/><br/><br/><br/>
              <div align="center" style="font-size:24px; color:#390;">������� ��� �� ����� ����� ��� ���������� ������!!!</div> 
        </TD>
	</TR>

</TABLE>