<?
class class_vars 
{

 var $PATH="/home/vagr.vitebsk.by"; // основной путь к проекту
 var $PATH_INC="/home/vagr.vitebsk.by/inc";
 var $PATH_CAM="/home/vagr.vitebsk.by/VideoCameras"; 
 var $PATH_REQ="/home/vagr.vitebsk.by/req";
 var $PATH_DATA="/home/vagr.vitebsk.by/data";
 var $PATH_WWW="/home/vagr.vitebsk.by/WWW";

 
 // Пути к папкам.
/* var $PATH="/var/www/vhosts/vagr.vitebsk.by/httpdocs"; // основной путь к проекту
 var $PATH_INC="/var/www/vhosts/vagr.vitebsk.by/httpdocs/inc"; 
 var $PATH_REQ="/var/www/vhosts/vagr.vitebsk.by/httpdocs/req";
 var $PATH_DATA="/var/www/vhosts/vagr.vitebsk.by/httpdocs/data";
var $PATH_CAM="/var/www/vhosts/vagr.vitebsk.by/httpdocs/VideoCameras"; 
 var $PATH_WWW="/var/www/vhosts/vagr.vitebsk.by/httpdocs/WWW";*/


 
 //var $PATH_WWW_PIC="/home/vagr.by/WWW/pic";
 //var $PATH_ADMIN="/home/vagr.by/WWW/admin";
// var $PATH_WWW_GUEST="/home/dan.by/WWW/guest"; 

 // Основной URL
 var $PATH_HTTP="http://vagr.vitebsk.by/";

 
 // адрес хозяина страницы
 //var $EMAIL_ADMIN=array("booom200585@mail.ru");

 // техническая служба сайта
 //var $EMAIL_NOC=array("booom200585@mail.ru","noc@21.ru");

 // Время кеширования страниц "Expires" (в секундах)
 var $CACHE_TIME=300; 

 // Максимальный размер подгружаемого в базу текста
 var $TEXT_SIZE_MAX= 1048576; // это мегабайт

 // Минимальный размер подгружаемого в базу текста
 var $TEXT_SIZE_MIN=100; // сто байт

 // Формат вывода времени (из SQL-базы)
 var $TIME_FORMAT="%H:%i:%S"; // ЧЧ:ММ:СС

 // Формат вывода даты (из SQL-базы)
 var $DATE_FORMAT="%d.%m.%Y"; // ДД.ММ.ГГГГ
}
?>