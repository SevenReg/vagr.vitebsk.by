/*
	Zoom image function
	Copyright (C) Atlant Telecom Web Laboratory, 2006, 2007, 2008
	Development by Vitaly Novik
*/

function Zoom(xlink, width, height, title, charset, xclick){
	
	width = Math.ceil(width);
	height = Math.ceil(height);
	xclick = (xclick==undefined) ? 0 : Math.ceil(xclick);

	var resizeSW = 0;
	
	if (!(width && height) || (!width || !height)) { width = 200; height = 200; resizeSW = 1; }
	
	var xclickScript = '';
	var xmoveScript = '';
	var xMoveMC = '';
	var xMoveMM = '';
	
	var b_op = (window.navigator.userAgent.indexOf("Opera") != -1) ;
	var b_mie = (!b_op && window.navigator.appName.indexOf("Microsoft") != -1);
	
	if (xclick) {
	
		xclickScript = 'onblur="window.close();" ' + 
				    'onclick="window.close();" ' + 
				    'onkeydown="window.close();" ' + 
				    'onkeypress="window.close();" ' +
				    'onkeyup="window.close();" ' +
				    'onmousedown="window.close();" ' + 
				    'onmouseup="window.close();" ';
		
	} else {
		
		xmoveScript = '<script type="text/javascript">';
		
		if (b_mie) {
		xmoveScript += 'var xMoveSW = 0; ' +
					'var xMoveAct = 0; ' +
					'var xMoveX = 0; ' +
					'var xMoveY = 0; ' +
					
					'function xMoveXY() { ' +
					'if (xMoveAct) { ' +
					'xMoveSW = xMoveSW ? 0 : 1;' +
					'xMoveX = xMoveSW ? window.event.offsetX : 0; ' +
					'xMoveY = xMoveSW ? window.event.offsetY: 0; ' +
					'if (xMoveSW) { document.getElementById("img").style.cursor = "move"; } else {document.getElementById("img").style.cursor = "default";} ' +
					' } ' +
					' } ' +
					
					'function xMove() { ' +
					'if (xMoveAct && xMoveSW) { ' +
					'var oX = document.getElementById("image").scrollLeft + (window.event.offsetX - xMoveX)/1.5; ' + 
					'if (oX >= 0 && oX <= document.getElementById("image").offsetWidth) { document.getElementById("image").scrollLeft = oX; } ' +
					'var oY = document.getElementById("image").scrollTop + (window.event.offsetY - xMoveY)/1.5; ' + 
					'if (oY >= 0 && oY <= document.getElementById("image").offsetHeight) { document.getElementById("image").scrollTop = oY; } ' +
					'xMoveX = window.event.offsetX; ' +
					'xMoveY = window.event.offsetY; ' +
					' } ' +
					' } ';
					
					xMoveMC = 'xMoveXY();';
					xMoveMM = 'xMove();';
					
		} else {
		xmoveScript += 'var xMoveSW = 0; ' +
					'var xMoveAct = 0; ' +
					'var xMoveX = 0; ' +
					'var xMoveY = 0; ' +
					
					'function xMoveXY(evt) { ' +
					'if (xMoveAct) { ' +
					'xMoveSW = xMoveSW ? 0 : 1;' +
					'xMoveX = xMoveSW ? evt.clientX : 0; ' +
					'xMoveY = xMoveSW ? evt.clientY: 0; ' +
					'if (xMoveSW) { document.getElementById("img").style.cursor = "move"; } else {document.getElementById("img").style.cursor = "default";} ' +
					' } ' +
					' } ' +
					
					'function xMove(evt) { ' +
					'if (xMoveAct && xMoveSW) { ' +
					'var oX = document.getElementById("image").scrollLeft + (evt.clientX - xMoveX)*2; ' + 
					'if (oX >= 0 && oX <= document.getElementById("image").offsetWidth) { document.getElementById("image").scrollLeft = oX; } ' +
					'var oY = document.getElementById("image").scrollTop + (evt.clientY - xMoveY)*2; ' + 
					'if (oY >= 0 && oY <= document.getElementById("image").offsetHeight) { document.getElementById("image").scrollTop = oY; } ' +
					'xMoveX = evt.clientX; ' +
					'xMoveY = evt.clientY; ' +
					' } ' +
					' } ';
					
					xMoveMC = 'xMoveXY(event);';
					xMoveMM = 'xMove(event);';
					
		}
		
		xmoveScript += '</script>';

	}
	
	var loadScript = 'document.getElementById("loadarea").style.display="none"; ';
			loadScript += 'var iW = document.getElementById("img").offsetWidth; ';
			loadScript += 'var iH = document.getElementById("img").offsetHeight; ';
			loadScript += 'var iWScroll = 0; ';
			loadScript += 'var iHScroll = 0; ';
			loadScript += 'if(iW >= 50 && iH >= 50){ ';
			
			if (resizeSW) {

				loadScript += 'if (document.getElementById("img") && document.getElementById("image")) { ';
				loadScript += 'if (iH > window.screen.height - (window.navigator.userAgent.indexOf("Opera") != -1 ? 200 : 150)) { iH = window.screen.height - (window.navigator.userAgent.indexOf("Opera") != -1 ? 200 : 150); iHScroll = 1; } ';
				loadScript += 'if (iW > window.screen.width - 150) { iW = window.screen.width - 150; iWScroll = 1; } ';
				
				if(b_op){
					loadScript += 'window.resizeTo(iW+window.outerWidth-window.innerWidth, iH+window.outerHeight-window.innerHeight); ';
				} else {
					if(b_mie) {
						loadScript += 'window.resizeTo(iW+100, iH+100); ';
						loadScript += 'var oW = document.getElementById("imagescroll").offsetWidth; ';
						loadScript += 'var oH = document.getElementById("imagescroll").offsetHeight; ';
						loadScript += 'window.resizeTo(iW+100-oW+iW, iH+100-oH+iH); ';
					} else {
						loadScript += 'window.resizeTo(iW+window.outerWidth-window.innerWidth+100, iH+window.outerHeight-window.innerHeight+100); ';
						loadScript += 'window.resizeTo(iW+window.outerWidth-window.innerWidth, iH+window.outerHeight-window.innerHeight); ';
					}
				}
				loadScript += ' if (iHScroll || iWScroll) { ';
				loadScript += ' document.getElementById("image").style.width = iW; ';
				loadScript += ' document.getElementById("image").style.height = iH; ';
				loadScript += ' document.getElementById("image").style.overflow = "auto"; ';
				if (!xclick) { loadScript += ' xMoveAct = 1; '; }
				loadScript += ' } ';
				loadScript += ' document.getElementById("imagescroll").style.display = "none"; ';
				loadScript += ' } ';
			}
			
			loadScript += '} else { document.getElementById("image").style.display="none"; document.getElementById("error").style.display="block"; } ';
			
	var header = '<!DOCTYPE html PUBLIC ' + '"-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' +
			'<' + 'html>' + '<' + 'head>' +
			'<' + 'meta http-equiv="Content-Type" content="text/html;charset=' +
			(charset?charset:'windows-1251') + '" />' +
			
			(title?'<' + 'title>' + title + '<' + '/title>':'<' + 'title>' + '<' + '/title>') +
			
			'<' + 'style type="text/css">' + '<!-- ' +
			'* { margin:0px; padding:0px; }' +
			'body, html { width:100%; height:100%; } ' +
			'body { background-color:#FFFFFF; padding:0px; margin:0px; border:0px; } ' +
			'body,td,th,div { font-family:tahoma; font-size:12px; } ' +
			'#image { width:100%; height:100%; display:block; } ' +
			'#imagescroll { width:100%; height:100%; display:block; position:absolute; z-index:1000; } ' +
			'#loadarea { position:absolute; z-index:1010; width:' + width + 'px; height:' + height + 'px; -moz-opacity:0.85; filter:Alpha(opacity=85); opacity:0.85; background:#FFFFFF; } ' +
			'#loadareatab { width:' + width + 'px; height:' + height + 'px; } ' +
			'#lbar { margin:auto; } ' + 
			'#lbar td { font-size:1px; } ' + 
			'#lbar td div { width:5px; height:5px; font-size:1px; border:1px #666666 solid; background-color:#FFFFFF;} ' +
			'#error { width:' + width + 'px; height:' + height + 'px; display:none; line-height:' + height + 'px; text-align:center; color:#990000; font-size:100px; font-weight:bold; } ' +
			' -->' + '<' + '/style>' +
			
			
			
			'<' + '/head>' + '<' + 'body ' + xclickScript + 	'>';

	var footer = '<' + '/body>' + '<' + '/html>';
	
		img = window.open('','',"width=" + width + ", height=" + height + ", toolbar=no, directories=no, status=yes, menubar=no, scrollbars=no, resizable=no, top=10, left=10");

		img.document.open();

			img.document.write(header +
			
								'<' + 'div id="loadarea">' +
								'<' + 'table id="loadareatab" border="0" cellspacing="0" cellpadding="0"><' +'tr>' +
								'<' + 'td style="vertical-align:middle; text-align:center;">' +
								'<' + 'table id="lbar" border="0" cellspacing="6" cellpadding="0" align="center">' +
								'<' + 'tr>' +
									'<' + 'td><' + 'div id="lb1"><' + '/div><' + '/td>'+
									'<' + 'td><' + 'div id="lb2"><' + '/div><' + '/td>'+
									'<' + 'td><' + 'div id="lb3"><' + '/div><' + '/td>'+
									'<' + 'td><' + 'div id="lb4"><' + '/div><' + '/td>'+
									'<' + 'td><' + 'div id="lb5"><' + '/div><' + '/td>'+
								'<' + '/tr><' + '/table>' +
								
								'<' + 'script type="text/javascript"> ' +
								
								
								
								'function doLoad(){' + loadScript + '} ' +
								'window.onload = doLoad; ' +
								
								'function ZoomCLB(oldnum, newnum) { '+
									'document.getElementById("lb" + oldnum).style.backgroundColor = "#FFFFFF"; '+
									'document.getElementById("lb" + newnum).style.backgroundColor = "#000000"; '+
									'if(newnum==5){ZoomCLBTO(1);} else {ZoomCLBTO(newnum+1);} '+
								'} '+
								'function ZoomCLBTO(num){ '+
									'var oldnum; '+
									'var newnum; '+
									'if(num == 1){oldnum = 5; newnum = num;} else {oldnum = num-1; newnum = num;} '+
									'var LB = window.setTimeout("ZoomCLB(" + oldnum + ", " + newnum + ")", 300); '+
								'} ' +

								'<' + '/script>' +
								
								'<' + '/td><' + '/tr><' + '/table><' + '/div>	' +
								
								'<' + 'div id="imagescroll">' + '<' + '!-- -->' + '<' + '/div>' +
								
								'<' + 'div id="image" onclick="' + xMoveMC + '" onmousemove="' + xMoveMM + '">' +
								'<' + 'img id="img" src="' + xlink + '" alt="" />' +
								'<' + '/div>' +
								
								'<' + 'div id="error">' +
									'&times;' +
								'<' + '/div>' +
								xmoveScript +
							footer);
								
		img.document.close();
		
		img.ZoomCLBTO(1);
		
		img.focus();

}




/*
	Flash loader fix
	Copyright (C) Atlant Telecom Web Laboratory, 2006, 2007, 2008
	Development by Vitaly Novik
*/

function FlashLoad(fname, flocation, fwidth, fheight, fbgcolor, falign, fwmode, fvars, fversion) {
	fversion = '' + fversion;
	document.write (FlashGetCode(fname?fname:'', flocation, fwidth, fheight, fbgcolor, falign?falign:'middle', fwmode?fwmode:'opaque', fvars?fvars:'', fversion));
}

function FlashGetCode(fname, flocation, fwidth, fheight, fbgcolor, falign, fwmode, fvars, fversion) {
	
	fversion = '' + fversion;
	
	if (fversion) {
		fversionarr = fversion.split(',');
		if(fversionarr.length < 4){
			for (i = fversionarr.length; i < 4; i++ ){
				fversion = fversion + ',0';
			}
		}
	} else {
		fversion = '8,0,0,0';
	}

	return		'<object ' +
										'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ' +
										'codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=' + fversion + '" ' +
										'width="' + fwidth + '" ' +
										'height="' + fheight + '" ' +
										(fname?('id="' + fname + '" '):'') +
										(falign?('align="' + falign + '" '):'align="middle"') +
										'>' +
										
										'<param name="allowScriptAccess" value="always" />' +
										'<param name="scale" value="noscale" />' +
										
										'<param name="movie" value="' + flocation + '" />' +
										
										'<param name="quality" value="high" />' +
										
										(fbgcolor?'<param name="bgcolor" value="' + fbgcolor + '" />':'') +
										
										'<param name="wmode" value="' + (fwmode?fwmode:'opaque') + '" />' +
										
										(fvars?'<param name="FlashVars" value="' + fvars + '" />':'') +
										
										'<embed src="' + flocation + '" quality="high" ' +
										'wmode="' + (fwmode?fwmode:'opaque') + '" ' +
										(fbgcolor?'bgcolor="' + fbgcolor + '" ':'') +
										'width="' + fwidth + '" ' +
										'height="' + fheight + '" ' +
										(fname?('name="' + fname + '" '):'') +
										(falign?('align="' + falign + '" '):'align="middle" ') +
										'allowScriptAccess="always" ' +
										'scale="noscale" ' +
										(fvars?'FlashVars="' + fvars + '" ':'') +
										'type="application/x-shockwave-flash" ' +
										'pluginspage="http://www.macromedia.com/go/getflashplayer" />' +
										
										'</' + 'object>';

}




/*
	Zooom function
	Copyright (C) Atlant Telecom Web Laboratory, 2006, 2007, 2008
*/

function zooom(id) {
	var h = document.getElementById(id).innerHTML;
	document.getElementById(id).innerHTML = h ? '' : '<a href="javascript:zooom(' + "'" + id + "'" + ')"><img src="' + id + '" border="0" /></a>';
}




/*
	Random string function
	Copyright (C) Atlant Telecom Web Laboratory, 2006, 2007, 2008
	Development by Vitaly Novik
*/

function sh_randStr(slen,shex) {
	shex = (shex==undefined) ? 0 : Math.ceil(shex);
	var ch = "0123456789abcdef" + ( shex ? '' : 'ghiklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXTZ' );
	var rs = '';
	for (var i=0; i<slen; i++) {
		rs += ch.substr(Math.floor(Math.random() * ch.length), 1);
	}
	return rs;
}
function sh_rand_str(slen,shex) {
	shex = (shex==undefined) ? 0 : Math.ceil(shex);
	return sh_randStr(slen,shex);
}




/*
	Opacity set function
	Copyright (C) Atlant Telecom Web Laboratory, 2006, 2007, 2008
	Development by Vitaly Novik
*/

function sh_opacitySet (obj, opacity) {
	var flagOpa = (typeof(obj.style.KhtmlOpacity) != "undefined") ? 2
							: (typeof(obj.style.KHTMLOpacity) != "undefined") ? 3
							: (typeof(obj.style.MozOpacity) != "undefined") ? 4
							: (typeof(obj.style.opacity) != "undefined") ? 5
							: (typeof(obj.style.filter) != "undefined") ? 1
							: 0;
	if (flagOpa == 1) {
		if (opacity < 100) {
			obj.style.filter = "alpha(opacity=" + opacity + ")";
		} else {
			obj.style.filter.alpha.enabled = false;
		}
	} else {
			opacity /= 100.0;
		switch (flagOpa) {
			case 2:
				obj.style.KhtmlOpacity = opacity; break;
			case 3:
				obj.style.KHTMLOpacity = opacity; break;
			case 4:
				obj.style.MozOpacity = opacity; break;
			case 5:
			case 0:
				obj.style.opacity = opacity; break;
		}
	}
}
