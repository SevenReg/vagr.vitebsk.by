<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Карта Витебска</title>
</head>
<body>

  <div id="cm-example" style="width: 731px; height: 500px"></div>

<script type="text/javascript" src="http://tile.cloudmade.com/wml/latest/web-maps-lite.js"></script>
  <script type="text/javascript">
    var cloudmade = new CM.Tiles.CloudMade.Web({key: '62285d9fcea4452db9157d730c629c12', styleId:26153});
    var map = new CM.Map('cm-example', cloudmade);
    var myMarkerLatLng = new CM.LatLng(55.19681992459953,30.203990936279297);
    var myMarker = new CM.Marker(myMarkerLatLng, {title: "РУП Витебское агентство по государственной регистрации и земельному кадастру"});

	map.setCenter(myMarkerLatLng, 14);
    map.addOverlay(myMarker);
	
	map.addControl(new CM.LargeMapControl());
    map.addControl(new CM.ScaleControl());
//	map.addControl(new CM.OverviewMapControl());
  </script>

</body>
</html>
