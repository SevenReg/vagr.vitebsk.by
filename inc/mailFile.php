<?
  require_once("/home/vagrvitebsk/www/req/in.php"); 
  
if(empty($_POST['mail_to'])) exit("������� ����� ����������"); 
  // ��������� ������������ ���������� � ������� ����������� ��������� 
  if (!preg_match("/^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}$/i", $_POST['mail_to'])) exit("������� ����� � ���� somebody@server.com"); 
  $picture = ""; 
  // ���� ���� ������ �������� �� ������ - ���������� ��� �� ������ 
  if (!empty($_FILES['mail_file']['tmp_name'])) 
  { 
    // ���������� ���� 
    $path = $_FILES['mail_file']['name']; 
    if (copy($_FILES['mail_file']['tmp_name'], $path)) $picture = $path; 
  } 
  $thm = $_POST['mail_subject'];
  $msg = $_POST['mail_msg'];
  $mail_to = $_POST['mail_to'];
  // ���������� �������� ��������� 
  if(empty($picture)) mail($mail_to, $thm, $msg); 
  else send_mail($mail_to, $thm, $msg, $picture); 
  // ��������������� ������� ��� �������� ��������� ��������� � ��������� (Trianon)
  function send_mail($mail_to, $thema, $html, $path)   
  { if ($path) {  
    $fp = fopen($path,"rb");   
    if (!$fp)   
    { print "Cannot open file";   
      exit();   
    }   
    $file = fread($fp, filesize($path));   
    fclose($fp);   
    }  
    $name = "file.ext"; // � ���� ���������� ���� ������������ ��� ����� (��� ������� ����)  
    $EOL = "\r\n"; // ������������ �����, ��������� �������� ������� ������� \n - ��������� ������� ����
    $boundary     = "--".md5(uniqid(time()));  // ����� ������, ������� �� ����� ���� � ������ ������.  
    $headers    = "MIME-Version: 1.0;$EOL";   
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
    $headers   .= "From: address@server.com";  
      
    $multipart  = "--$boundary$EOL";   
    $multipart .= "Content-Type: text/html; charset=windows-1251$EOL";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= $EOL; // ������ ����� ����������� � ����� html-����� 
    $multipart .= chunk_split(base64_encode($html));   

    $multipart .=  "$EOL--$boundary$EOL";   
    $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";   
    $multipart .= $EOL; // ������ ����� ����������� � ����� �������������� ����� 
    $multipart .= chunk_split(base64_encode($file));   

    $multipart .= "$EOL--$boundary--$EOL";   
      
        if(!mail($mail_to, $thema, $multipart, $headers))   
         {return False;           //���� �� ������ �� ����������
      }  
    else { //// ���� ������ ����������
    return True;  
    }  
  exit;  
  }
?>

<table>
<form action=simple_mail.php enctype='multipart/form-data' method=post> 



<tr><td width=50%>To:</td><td align=right><input type=text name=mail_to maxlength=32></td></tr> 

<tr><td width=50%>Subject:</td><td align=right><input type=text name=mail_subject maxlength=64></td></tr> 

<tr><td colspan=2>���������:<br><textarea cols=50 rows=8 name=mail_msg></textarea></td> 

<tr><td width=50%>Photo:</td><td align=right><input type=file name=mail_file maxlength=64></td></tr> 

</tr><tr><td colspan=2><input type=submit value='���������'></td></tr> 

</form> 
</table>