<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>���������</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="Author" content="��������� �������">
<STYLE>
BODY{
background : #f1f5fa;
}
TD{
font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
font-size : 11px;
color: #000000;
}
.forum{
color : #000080;
font-family : Verdana, Geneva, Arial, Helvetica, sans-serif;
font-size: 11px;
}
.forums{
color : #993300;
font-family : Verdana, Geneva, Arial, Helvetica, sans-serif;
font-size: 11px;
}
.color_table{
BACKGROUND-COLOR: #9fbddd;
}
.color_td{
BACKGROUND-COLOR: #D4DFFF;
}
.color_body{
BACKGROUND-COLOR: #ECEEFF;
}
.color_body_svet{
BACKGROUND-COLOR: #f1f5fa;
}
</style>
</HEAD>
<body>

<?php
function kalendar (){
$td = "<td align='right' class='color_body'>";
$day = date ('j', time ());
$month = date ('n', time ());
$year = date ('Y', time ());
$end_day = date ('t', time ());
$one_day = date ('w', mktime (1,0,0,$month,1,$year))-1;
if ($one_day=='-1'){ $one_day='6'; }
$dass = $month. date ('d', time ());
if ($dass>='119' and $dass <='214'){$dass_s='�������';}
elseif ($dass>='215' and $dass <='310'){$dass_s='�������';}
elseif ($dass>='311' and $dass <='417'){$dass_s='����';}
elseif ($dass>='418' and $dass <='512'){$dass_s='����';}
elseif ($dass>='513' and $dass <='620'){$dass_s='�����';}
elseif ($dass>='621' and $dass <='719'){$dass_s='��������';}
elseif ($dass>='720' and $dass <='809'){$dass_s='���';}
elseif ($dass>='810' and $dass <='915'){$dass_s='���';}
elseif ($dass>='916' and $dass <='1029'){$dass_s='����';}
elseif ($dass>='1030' and $dass <='1121'){$dass_s='����';}
elseif ($dass>='1122' and $dass <='1128'){$dass_s='��������';}
elseif ($dass>='1129' and $dass <='1216'){$dass_s='���������';}
else {$dass_s='�������';}

if ($month=='1'){$month_s='������';}
elseif ($month=='2'){$month_s='�������';}
elseif ($month=='3'){$month_s='����';}
elseif ($month=='4'){$month_s='������';}
elseif ($month=='5'){$month_s='���';}
elseif ($month=='6'){$month_s='����';}
elseif ($month=='7'){$month_s='����';}
elseif ($month=='8'){$month_s='������';}
elseif ($month=='9'){$month_s='��������';}
elseif ($month=='10'){$month_s='�������';}
elseif ($month=='11'){$month_s='������';}
else {$month_s='�������';}
$kalend = "<table align='center' border='0' cellpadding='0' cellspacing='0' class='color_table'>
<tr><td>
<table border='0' cellspacing='1' cellpadding='2' width='100%'>
<tr>
<td align='center' colspan='7' class='color_td'> 
<font class='forum'>
<b> $month_s $year </b></font></td>\n
</tr>
<tr>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
<td align='center' class='color_body'>��</td>
</tr>\n";

     for( $i = 1; $i <= $end_day+$one_day; $i++){
         if($x==0){$x='7';}
         $x = $x-1;
         $a = $i- $one_day;
          if($one_day > $i or $a<1){$kalend .= $td."\n &nbsp;</td>\n";}
            elseif($one_day == $i) {$kalend .= $td."\n".$a."</td>\n"; }
            elseif($i=='6' or $i=='13' or $i=='20' or $i=='27' or $i=='34'){
               if($i==$day+$one_day){$a = "<font class='forums'><u>".$a."</u></font>";}
                $kalend .= $td." <b>".$a."</b> </td>\n";
               }
            elseif($i=='7' or $i=='14' or $i=='21' or $i=='28' or $i=='35'){
               if($i==$day+$one_day){$a = "<font class='forums'><u>".$a."</u></font>";}
               $kalend .= $td." <b>".$a."</b> </td>\n</tr>\n<tr>\n";
               }
            elseif($i==$day+$one_day){$kalend .= "<td align='right' class='color_body_svet'>\n<font class='forums'><b><u>".$a."</b></u></font></td>\n";}
          else{$kalend .= $td." ".$a."\n</td>\n";}
         }
      if($x!=0){  
        for( $i = 0; $i < $x; $i++){ $kalend .= $td."\n &nbsp;</td>\n";   }
        }
$kalend .= "</tr>\n
</table>\n</td>\n</tr>\n</table>\n"; 
return $kalend;
} 

print kalendar (); 
?> 
     
</BODY></HTML>
