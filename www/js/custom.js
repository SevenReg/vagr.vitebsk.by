var d = document;

///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
function swSM(){
	if(document.getElementById('sitemap')){
		document.getElementById('sitemap').style.display=document.getElementById('sitemap').style.display=='none'?'block':'none';
	}
}
///////////////////////////////////////////////////////////////////////////////////////////

	 	function changeVideoImage(id,link,sec) {
			//alert("changeVideoImageSrc(" + id + ", '" + link + "')");
			window.setTimeout("changeVideoImageSrc(" + id + ", '" + link + "', '"+sec+"')", sec);
		}
		function changeVideoImageSrc(id,link, sec) {
			document.getElementById('videoImage' + id).src = link + '?rand=' + sh_rand_str(32);
			changeVideoImage(id, link, sec);
		}


var msg='';
function olHandler() {
	if (msg!=''){
		alert(msg)}
}

window.onload = olHandler;


function smapShow() {
	if (d.getElementById('smapm') && d.getElementById('smapi')) { 
		d.getElementById('smapi').className = d.getElementById('smapm').className== 'dn' ? 'mmap' : 'mmap selected';
		d.getElementById('smapm').className = d.getElementById('smapm').className== 'dn' ? '' : 'dn';
	}
}

///////////////////////////////////////выпадающее меню
	var hMenuLI = 0;
	var hMenuTimer;
	function hMenuShow(id) {
		var d = document;
		var x = 0;
		window.clearTimeout(hMenuTimer);		
		if (hMenuLI != id) {
			hMenuHideNow(hMenuLI);
			if (d.getElementById('hml' + id) && d.getElementById('hmm' + id)) {
				d.getElementById('hml' + id).className = 'selected';
				d.getElementById('hmm' + id).style.display = 'block';
				hMenuLI = id;
				x = d.getElementById('hmm' + id).offsetHeight;
				d.getElementById('ifsplash' + id).style.height = x;
			}
		}
	}
	function hMenuHideNow(id) {
		var d = document;
		if (d.getElementById('hml' + id) && d.getElementById('hmm' + id)) {
			d.getElementById('hml' + id).className = '';
			d.getElementById('hmm' + id).style.display = 'none';
			hMenuLI = 0;
		}
	}
	function hMenuHide(id) {
		var d = document;
		if (d.getElementById('hml' + id) && d.getElementById('hmm' + id)) {
			hMenuTimer = window.setTimeout('hMenuHideNow(' + id + ')', 250);
		}
	}
	
	
