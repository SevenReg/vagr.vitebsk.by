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

	
	//$recipient = "booom200585@mail.ru"; //����� ����������� ���� �� ������ �������� ���������

    //$content = "test"; //���� ���������

	
//----------------------------------------------------------------------------------------------------------------------------------


  ///home/vagr.vitebsk.by/req/in.php   /home/vagrvitebsk/www/req/in.php
  $my=new class_in;
  $my->sql_connect();
  

  if($_POST["tt"]=="Y")
  { 
       
    $smtp_server = "vagr.vitebsk.by"; // ����� ���������� ������ ���� �������� ���. �.�. ��� ������, � �������� �� ������ ������������
    $port = 25; // ���� �������. �� ��������� ��� ����������� �������� �������� �� ����� 25
    $mydomain = "vagr.vitebsk.by"; // ����� ������������ ��������� �����, ��� ���������� �������� ����� ������ �������� ��������
    $username = "admin@vagr.vitebsk.by"; // ����� �� ���������� ��������� ���� �������� ����, � �������� �� ������ ������������ � �� ����� �������� �� ������ �������� �����
    $password = "1234Vecb-Gecb4321"; //����� �� ���������� ������ ��� ��������� �����
    $sender = "a200@nca.by"; //����� ����������� ��� �����������. ��������� "�� ����"

  

  $subject = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000);
   $fioman = substr(htmlspecialchars(trim($_POST['fioman'])), 0, 400); 
   $fio = substr(htmlspecialchars(trim($_POST['fio'])), 0, 400); 
   $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 30); 
   $tel = substr(htmlspecialchars(trim($_POST['tel'])), 0, 1000); 
   $question =  substr(htmlspecialchars(trim($_POST['question'])), 0, 2000);
   $content =  substr(htmlspecialchars(trim($_POST['question'])), 0, 10000); 

    $subject = "����������� ���������"; //���� ���������    
   //�������� ��������� �� ������.
	//��� ����������� ������� ����� ��� ��������� �������� ����, ���� ������ ����� ������ ������.
    //if ($_POST['CountryFiz']==200) {$recipient = 'd200@nca.by'; }
    if ($_POST['CountryFiz']==200) {$recipient = 'booom200585@mail.ru'; }
	if ($_POST['CountryFiz']==220) {$recipient = 'd220@nca.by'; }
    if ($_POST['CountryFiz']==230) {$recipient = 'd230@nca.by'; }
    if ($_POST['CountryFiz']==240) {$recipient = 'a240@nca.by'; }   
    if ($_POST['CountryFiz']==250) {$recipient = 'a250@nca.by'; }		
	

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
      
       //$content.='������:'.$question.' ����:'.$fioman.' ������� ��� ��������:'.$fio.', e-mail: '.$email.', �����: '.$tel."\r\n\r\n";  //����� ������
	   $content="------------A4D921C2D10D7DB"."\r\n";
       $content.="Content-Type: text/plain; charset=windows-1251"."\r\n";
       $content.="Content-Transfer-Encoding: quoted-printable\r\n\r\n";
      
	   $content.='������:'.$question;  //����� ������
	   
	   $content.=$file;
   	   $content.="------------A4D921C2D10D7DB--"."\r\n";
         //"=?windows-1251?B?". base64_encode($_POST[�username�])	   
	   //$content.='������:'.$question.' ����:'.$fioman.' ������� ��� ��������:'.$fio.', e-mail: '.$email.', �����: '.$tel."\r\n\r\n"; //���� ���������
	   
	   
	   //$sended = smtpmail($mail_to, $subject, $message, $headers);
	   
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

    // ��������� ����������� � �������
   
	   
	   
	   if (!$handle) echo '<b><font color="#F00" size="3pt" >������ ��������. �������� ���� ���������. �� ������ ������ ���� ������, �������� ��� �� ����������� ����� ��������� d200@nca.by. ����� �������� ������� ����.</font></b>'.$mail_to;
	   else echo '<b><font color="#0aa01c" size="3pt">������ ������� ���������. ������� �� ������.</font></b>'.$content;
 
 fputs($handle, "QUIT\r\n");	
	//exit;
	
	
	
	  $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
       $headers .= "From: Birthday Reminder <birthday@example.com>\r\n";
       $headers .= "Bcc: birthday-archive@example.com\r\n"; 
	   $mes = '������:'.$_POST['question'].' ����:'.$_POST['fioman'].' ������� ��� ��������:'.$_POST['fio'].', e-mail: '.$_POST['email'].', �����: '.$_POST['tel'];
	   $test=mail($recipient,$subject,$mes,$headers);
	   if (!$test) echo '������ �������� mail';
	    else echo '<b><font color="#0aa01c" size="3pt">������ ������� ��������� ����� mail</font></b>';	
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
