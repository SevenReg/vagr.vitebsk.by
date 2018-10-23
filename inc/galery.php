<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" rel="stylesheet" href="style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-galleryview-1.0.1/jquery.galleryview-1.0.1-pack.js"></script>
<script type="text/javascript" src="js/jquery-galleryview-1.0.1/jquery.timers-1.1.2.js"></script>
<style type="text/css">
body {
	
        background: #000000 url(images/header.jpg) no-repeat center top;
	color: white;
}
#gallery_wrap {
	width: 820px;
	height: 368px;
	padding: 25px;
	background: url(images/border.png) top left no-repeat;
}
a:link,a:visited {
	color: #000000 !important;
	text-decoration: underline;
}
a:hover {
	text-decoration: none;
}
h3 {
	border-bottom-color: white;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){		
		$('#photos').galleryView({
			panel_width: 800,
			panel_height: 300,
			frame_width: 100,
			frame_height: 38,
			transition_speed: 1500,
			background_color: '#000000',
			border: 'none',
			easing: 'easeInOutBack',
			pause_on_hover: true,
			nav_theme: 'custom'
		});
	});
</script>
<title>Как создать галерею картинок для сайта</title>
</head>
<br><br><br><br><br><br><br><br><br>
<body>
<div id="gallery_wrap">
<div id="photos" class="galleryview">
  <div class="panel">
     <img src="images/01.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/02.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/03.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/04.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/06.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/05.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/07.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <div class="panel">
     <img src="images/08.jpg" /> 
    <div class="panel-overlay">
      <h2>Тут может быть описание Вашей картинки</h2>
      <p>Сайт для веб-мастеров.</p>

    </div>
  </div>
  <ul class="filmstrip">
    <li><img src="images/frame2-01.jpg" alt="Effet du soleil" title="Сайт для веб-мастеров." /></li>
    <li><img src="images/frame2-02.jpg" alt="Eden" title="Сайт для веб-мастеров." /></li>
    <li><img src="images/frame2-03.jpg" alt="Snail on the Corn" title="Сайт для веб-мастеров." /></li>
    <li><img src="images/frame2-04.jpg" alt="Flowers" title="Сайт для веб-мастеров." /></li>
    <li><img src="images/frame2-06.jpg" alt="Alone Beach" title="Сайт для веб-мастеров." /></li>
    <li><img src="images/frame2-05.jpg" alt="Sunrise Trees" title="Сайт для веб-мастеров." /></li>

    <li><img src="img/frame2-07.jpg" alt="Waterfall" title="Сайт для веб-мастеров." /></li>
    <li><img src="img/frame2-08.jpg" alt="Death Valley" title="Сайт для веб-мастеров." /></li>
  </ul>
</div>
</div>

</body>
</html>
