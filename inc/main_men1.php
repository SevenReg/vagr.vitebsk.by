<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1088;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077; &#1076;&#1083;&#1103; &#1087;&#1072;&#1082;&#1086;&#1074;&#1082;&#1080;" content="text/html; charset=iso-8859-1" />
<title>�������� ��� �����</title>
<meta http-equiv="&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1088;&#1072;&#1089;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077; &#1076;&#1083;&#1103; &#1087;&#1072;&#1082;&#1086;&#1074;&#1082;&#1080;" content="text/html; charset=iso-8859-1" />

</head>

<body>
<style type="text/css">
.suckerdiv ul{
margin: 0;
padding: 0;
list-style-type: none;
width: 230px; /* Width of Menu Items */
border-bottom: 1px solid #ccc;
}

.suckerdiv ul li{
position: relative;
}

/*Sub level menu items */
.suckerdiv ul li ul{
position: absolute;
width: 160px; /*sub menu width*/
top: 0;
visibility: hidden;
}

/* Sub level menu links style */
.suckerdiv ul li a{
display: block;
overflow: auto; /*force hasLayout in IE7 */
color: black;
text-decoration: none;
background: #fff;
padding: 1px 5px;
border: 1px solid #ccc;
border-bottom: 0;
}

.suckerdiv ul li a:visited{
color: black;
}

.suckerdiv ul li a:hover{
 background-color: yellow;
}

.suckerdiv .subfolderstyle{
background: url(arrow-list.gif) no-repeat center right;
}


/* Holly Hack for IE \*/
* html .suckerdiv ul li { float: left; height: 1%; }
* html .suckerdiv ul li a { height: 1%; }
/* End */

</style>


<script type="text/javascript">
var menuids=["suckertree1"]

function buildsubmenus(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className="subfolderstyle"
		if (ultags[t].parentNode.parentNode.id==menuids[i])
			ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px"
		else
		  ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px"
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
		for (var t=ultags.length-1; t>-1; t--){
		ultags[t].style.visibility="visible"
		ultags[t].style.display="none"
		}
  }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus)
</script>


<div class="suckerdiv">
<ul id="suckertree1">
<font size="+1"><li><a href="?f=hello">�������</a></li>
<li><a href="?f=structure">��������� �����������</a></li>
<li><a href="?f=registry">����������� ������������</a></li></font>
<li><font size="+1"><a href="#">������</a> </font>
  <ul>
    <li><a href="?f=department_1">������ �������</a></li>
	<li><a href="?f=department_2">������ �������</a></li>
	<li><a href="?f=department_3">������ ������</a></li>	
  </ul>
</li>
<li><font size="+1"><a href="#">������� � ����</a></font>
    <ul>
    <li><a href="?f=02">����������� ����</a></li>
    <li><a href="?f=03">����������� ����</a></li>
	<li><a href="?f=04">����������� ����</a></li>
	<li><a href="?f=08">���������� ������</a>
	<ul>
	  <li><A href="?f=09">���������� ����</A></li>
	  <li><A href="?f=07">������������� ����</A></li>
	</ul>
	</li>
	<li><A href="?f=10">���������� ������</A>
	  <ul>
	    <li><A href="?f=11">�������������� ����</A></li>
		<li><A href="?f=12">������������ ����</A></li>
		<li><A href="?f=13">��������� ����</A></li>
		<li><A href="?f=14">��������������� ����</A></li>
		<li><A href="?f=15">�������� ����</A></li>
		<li><A href="?f=16">���������� ����</A></li>
	  </ul>
	</li>
	<li><A href="?f=17">��������� ������</A>
	  <ul>
        <li><A href="?f=18">���������� ����</A></li>
		<li><A href="?f=19">����������� ����</A></li>
		<li><A href="?f=20">����������� ����</A></li>
		<li><A href="?f=21">������������ ����</A></li>
	  </ul>
	</li>
	<li><A href="?f=22">�������� ������</A>
	  <ul>
	    <li><A href="?f=05">����������� ���� </A></li>
		<li><A href="?f=06">�������� ����</A></li>
		<li><A href="?f=23">������������ ����</A></li>
		<li><A href="?f=24">�������������� ����</A></li>
		<li><A href="?f=25">��������� ����</A></li>
		<li><A href="?f=26">���������� ����</A></li>
	  </ul>
	</li>
    </ul>
</li>
</ul>
</div>


</body>
</html>
