<?
//session_start();
  require_once("/home/vagrvitebsk/www/req/in.php"); 
  $admin = 'admin@vagr.vitebsk.by';

if ( isset( $_POST['sendMail'] ) ) {
  $name  = substr( $_POST['name'], 0, 64 );
  $email   = substr( $_POST['email'], 0, 64 );
  $subject = substr( $_POST['subject'], 0, 64 );
  $message = substr( $_POST['message'], 0, 250 );
 
  $error = '';
  if ( empty( $name ) ) $error = $error.'<li>Не заполнено поле "Имя"</li>';
  if ( empty( $email ) ) $error = $error.'<li>Не заполнено поле "E-mail"</li>';
  if ( empty( $subject ) ) $error = $error.'<li>Не заполнено поле "Тема"</li>';
  if ( empty( $message ) ) $error = $error.'<li>Не заполнено поле "Сообщение"</li>';
  if ( !empty( $email ) and !preg_match( "#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#i", $email ) )
    $error = $error.'<li>поле "E-mail" должно соответствовать формату somebody@somewhere.ru</li>';
  if ( !empty( $error ) ) {
    $_SESSION['sendMailForm']['error']   = '<p>При заполнении формы были допущены ошибки:</p><ul>'.$error.'</ul>';
    $_SESSION['sendMailForm']['name']    = $name;
    $_SESSION['sendMailForm']['email']   = $email;
    $_SESSION['sendMailForm']['subject'] = $subject;
    $_SESSION['sendMailForm']['message'] = $message;
    header( 'Location: '.$_SERVER['PHP_SELF'] );
    die();
  }

  if ( !empty( $_FILES['file']['tmp_name'] ) and $_FILES['file']['error'] == 0 ) {
    $filepath = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
  } else {
    $filepath = '';
    $filename = '';
  }
 
  $body = "АВТОР:\r\n".$name."\r\n\r\n";
  $body .= "E-MAIL:\r\n".$email."\r\n\r\n";
  $body .= "ТЕМА:\r\n".$subject."\r\n\r\n";
  $body .= "СООБЩЕНИЕ:\r\n".$message;
 
  if ( send_mail($admin, $body, $email, $filepath, $filename) )
    $_SESSION['success'] = true;
  else
    $_SESSION['success'] = false;
  header( 'Location: '.$_SERVER['PHP_SELF'] );
  die();
}

// Вспомогательная функция для отправки почтового сообщения с вложением
function send_mail($admin, $body, $email, $filepath, $filename)
{
  $subject = '=?windows-1251?B?'.base64_encode('Заполнена форма на сайте').'?=';
  $boundary = "--".md5(uniqid(time())); // генерируем разделитель
  $headers = "From: ".strtoupper($_SERVER['SERVER_NAME'])." <".$email.">\r\n";   
  $headers .= "Return-path: <".$email.">\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .="Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n";
  $multipart = "--".$boundary."\r\n";
  $multipart .= "Content-type: text/plain; charset=\"windows-1251\"\r\n";
  $multipart .= "Content-Transfer-Encoding: quoted-printable\r\n\r\n";

  $body = quoted_printable_encode( $body )."\r\n\r\n";
 
  $multipart .= $body;
 
  $file = '';
  if ( !empty( $filepath ) ) {
    $fp = fopen($filepath, "r");
    if ( $fp ) {
      $content = fread($fp, filesize($filepath));
      fclose($fp);
      $file .= "--".$boundary."\r\n";
      $file .= "Content-Type: application/octet-stream\r\n";
      $file .= "Content-Transfer-Encoding: base64\r\n";
      $file .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
      $file .= chunk_split(base64_encode($content))."\r\n";
    }
  }
  $multipart .= $file."--".$boundary."--\r\n";

  if( mail($admin, $subject, $multipart, $headers) )
    return true;
  else
    return false;
}

function quoted_printable_encode ( $string ) {
   // rule #2, #3 (leaves space and tab characters in tact)
   $string = preg_replace_callback (
   '/[^\x21-\x3C\x3E-\x7E\x09\x20]/',
   'quoted_printable_encode_character',
   $string
   );
   $newline = "=\r\n"; // '=' + CRLF (rule #4)
   // make sure the splitting of lines does not interfere with escaped characters
   // (chunk_split fails here)
   $string = preg_replace ( '/(.{73}[^=]{0,3})/', '$1'.$newline, $string);
   return $string;
}

function quoted_printable_encode_character ( $matches ) {
   $character = $matches[0];
   return sprintf ( '=%02x', ord ( $character ) );
}

if ( isset( $_SESSION['sendMailForm'] ) ) {
  echo $_SESSION['sendMailForm']['error'];
  $name    = htmlspecialchars ( $_SESSION['sendMailForm']['name'] );
  $email   = htmlspecialchars ( $_SESSION['sendMailForm']['email'] );
  $subject = htmlspecialchars ( $_SESSION['sendMailForm']['subject'] );
  $message = htmlspecialchars ( $_SESSION['sendMailForm']['message'] );
  unset( $_SESSION['sendMailForm'] );
} else {
  $name  = '';
  $email   = '';
  $subject = '';
  $message = '';
}

if ( isset( $_SESSION['success'] ) ) {
  if ( $_SESSION['success'] )
    echo '<p>Письмо успешно отправлено</p>';
  else
    echo '<p>Ошибка при отправке письма</p>';
  unset( $_SESSION['success'] );
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
<table>
<tr><td>Имя:</td><td><input type="text" name="name" maxlength="64" value="<?php echo $name ?>" /></td></tr>
<tr><td>E-mail:</td><td><input type="text" name="email" maxlength="64" value="<?php echo $email ?>" /></td></tr>
<tr><td>Тема:</td><td><input type="text" name="subject" maxlength="64" value="<?php echo $subject ?>" /></td></tr>
<tr><td>Сообщение:</td><td><textarea name="message" rows="5" cols="30"><?php echo $message ?></textarea></td></tr>
<tr><td>Файл:</td><td><input type="file" name="file" /></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="sendMail" value="Отправить" /></td></tr>
</table>
</form>

