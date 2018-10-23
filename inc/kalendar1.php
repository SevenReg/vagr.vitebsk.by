<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1088;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077; &#1076;&#1083;&#1103; &#1087;&#1072;&#1082;&#1086;&#1074;&#1082;&#1080;" content="text/html; charset=iso-8859-1" />
<title>Документ без имени</title>
<meta http-equiv="&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1088;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077; &#1076;&#1083;&#1103; &#1087;&#1072;&#1082;&#1086;&#1074;&#1082;&#1080;" content="text/html; charset=iso-8859-1" />
</head>

<body>
<? 
if (isset($_GET['date'])) echo "выбрана дата ".$_GET['date'];
my_calendar(array(date("Y-m-d"))); 
?>

Код:
<? 
function my_calendar($fill=array()) { 
  $month_names=array("январь","февраль","март","апрель","май","июнь",
  "июль","август","сентябрь","октябрь","ноябрь","декабрь"); 
  if (isset($_GET['y'])) $y=$_GET['y'];
  if (isset($_GET['m'])) $m=$_GET['m']; 
  if (isset($_GET['date']) AND strstr($_GET['date'],"-")) list($y,$m)=explode("-",$_GET['date']);
  if (!isset($y) OR $y < 1970 OR $y > 2037) $y=date("Y");
  if (!isset($m) OR $m < 1 OR $m > 12) $m=date("m");

  $month_stamp=mktime(0,0,0,$m,1,$y);
  $day_count=date("t",$month_stamp);
  $weekday=date("w",$month_stamp);
  if ($weekday==0) $weekday=7;
  $start=-($weekday-2);
  $last=($day_count+$weekday-1) % 7;
  if ($last==0) $end=$day_count; else $end=$day_count+7-$last;
  $today=date("Y-m-d");
  $prev=date('?\m=m&\y=Y',mktime (0,0,0,$m-1,1,$y));  
  $next=date('?\m=m&\y=Y',mktime (0,0,0,$m+1,1,$y));
  $i=0;
?> 
<table border=1 cellspacing=0 cellpadding=2> 
 <tr>
  <td colspan=7> 
   <table width="100%" border=0 cellspacing=0 cellpadding=0> 
    <tr> 
     <td align="left"><a href="<? echo $prev ?>">&lt;&lt;&lt;</a></td> 
     <td align="center"><? echo $month_names[$m-1]," ",$y ?></td> 
     <td align="right"><a href="<? echo $next ?>">&gt;&gt;&gt;</a></td> 
    </tr> 
   </table> 
  </td> 
 </tr> 
 <tr><td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td><tr>
<? 
  for($d=$start;$d<=$end;$d++) { 
    if (!($i++ % 7)) echo " <tr>\n";
    echo '  <td align="center">';
    if ($d < 1 OR $d > $day_count) {
      echo "&nbsp";
    } else {
      $now="$y-$m-".sprintf("%02d",$d);
      if (is_array($fill) AND in_array($now,$fill)) {
        echo '<b><a href="'.$_SERVER['PHP_SELF'].'?date='.$now.'">'.$d.'</a></b>'; 
      } else {
        echo $d;
      }
    } 
    echo "</td>\n";
    if (!($i % 7))  echo " </tr>\n";
  } 
?>
</table> 
<? } ?> 

</body>
</html>
