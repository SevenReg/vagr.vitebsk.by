		function getAnchorPosition(anchorname)
		{
			var useWindow=false;
			var coordinates=new Object();
			var x=0,y=0;
			var use_gebi=false, use_css=false, use_layers=false;
			if(document.getElementById)
			{
				use_gebi=true;
			}
			else if(document.all)
			{
				use_css=true;
			}
			else if(document.layers)
			{
				use_layers=true;
			}
			if(use_gebi && document.all)
			{
				x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}else if(use_gebi){var o=document.getElementById(anchorname);x=AnchorPosition_getPageOffsetLeft(o);y=AnchorPosition_getPageOffsetTop(o);}else if(use_css){x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}else if(use_layers){var found=0;for(var i=0;i<document.anchors.length;i++){if(document.anchors[i].name==anchorname){found=1;break;}}if(found==0){coordinates.x=0;coordinates.y=0;return coordinates;}x=document.anchors[i].x;y=document.anchors[i].y;}else{coordinates.x=0;coordinates.y=0;return coordinates;}coordinates.x=x;coordinates.y=y;return coordinates;}
		function getAnchorWindowPosition(anchorname){var coordinates=getAnchorPosition(anchorname);var x=0;var y=0;if(document.getElementById){if(isNaN(window.screenX)){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}else{x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}}else if(document.all){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}else if(document.layers){x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}coordinates.x=x;coordinates.y=y;return coordinates;}
		function AnchorPosition_getPageOffsetLeft(el){var ol=el.offsetLeft;while((el=el.offsetParent) != null){ol += el.offsetLeft;}return ol;}
		function AnchorPosition_getWindowOffsetLeft(el){return AnchorPosition_getPageOffsetLeft(el)-document.body.scrollLeft;}
		function AnchorPosition_getPageOffsetTop(el){var ot=el.offsetTop;while((el=el.offsetParent) != null){ot += el.offsetTop;}return ot;}
		function AnchorPosition_getWindowOffsetTop(el){return AnchorPosition_getPageOffsetTop(el)-document.body.scrollTop;}

		
		var timeout = new Array();
		function show(n,parent) {
			for (var i = 1; i<=100; i++) if (timeout[i]!=null) {clearTimeout(timeout[i]); hide(i);}
			var obj = document.getElementById('submenu'+n);
			var objj = document.getElementById('link'+n);
			/*c = getAnchorPosition('link'+n)
			c.x +=125;
			c.y +=20;
			if (n>5) {
				c.x -=150;
			}
			obj.style.top = c.y + 'px';
			obj.style.left = c.x + 'px';*/
			obj.style.display = 'block';
			objj.className = 'selected';			
			/*timeout[n] = setTimeout('hide(' + n + ')',2000);*/
		}
		function inner_show(n,parent) {
			for (var i = 1; i<=100; i++) if (timeout[i]!=null) {clearTimeout(timeout[i]); hide(i);}
			var obj = document.getElementById('submenu'+n);
			c = getAnchorPosition('link'+n)
			c.y -= 110;
			c.x -=255;
			if (n==61) {
				c.x -=120;
			}
			obj.style.top = c.y + 'px';
			obj.style.left = c.x + 'px';
			obj.style.display = 'block';			
			timeout[n] = setTimeout('hide(' + n + ')',2000);
		}
		function hide(n) {
			var obj = document.getElementById('submenu'+n);
			var objj = document.getElementById('link'+n);
			/*obj.style.top = '0px';
			obj.style.left = '0px';*/
			obj.style.display = 'none';
			objj.className = '';	
		}
		function toggle_form() {
			var obj = document.getElementById('auth-form');
				if (obj.style.display == 'none') {
					c = getAnchorPosition('auth-link')
					c.y += 20;
					c.x -= 190;
					obj.style.top = c.y + 'px';
					obj.style.left = c.x + 'px';
					obj.style.display = 'block';
				} else {
					//obj.style.top = '0px';
					//obj.style.left = '0px';
					obj.style.display = 'none';
				}
		}
		function toggle_formi() {
			var obj = document.getElementById('auth-form');
				if (obj.style.display == 'none') {
					c = getAnchorPosition('auth-link')
					c.y -= 50;
					c.x -= 270;
					obj.style.top = c.y + 'px';
					obj.style.left = c.x + 'px';
					obj.style.display = 'block';
				} else {
					obj.style.top = '0px';
					obj.style.left = '0px';
					obj.style.display = 'none';
				}
		}
		function faq_toggle(n) {
			var obj = document.getElementById('answer' + n);
			var lnk = document.getElementById('lnk' + n);
			if (obj.style.display == 'none') {
					obj.style.display = 'block';
					lnk.innerHTML = 'Скрыть ответ';
					lnk.className = 'minus';
				} else {
					obj.style.display = 'none';
					lnk.innerHTML = 'Показать ответ';
					lnk.className = 'plus';
				}
		}
		function toggle(id) {
			var obj = document.getElementById(id);
			if (obj.style.display == 'none') {
					obj.style.display = 'block';
				} else {
					obj.style.display = 'none';
				}
		}
		