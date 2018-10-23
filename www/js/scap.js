	function scapCreate(keyId, capId, type) {
	
		var d = document;
		
		var fieldKey = d.getElementById(keyId);
		var blockCap = d.getElementById(capId);
		
		if (!fieldKey || !blockCap) {
			return false;
		}
		
		type = Math.ceil(type) ? 1 : 0;
		
		var scapInit = new HTMLHttpRequest('scapInit', scapCallback);
		
		var URL = '/scapcreate/?rand=' + sh_rand_str(32);
		
		if (type) {
			blockCap.backgroundImage = 'url(/images/preloader.gif)';
		} else {
			blockCap.src = '/images/preloader.gif';
		}
		
		scapInit.load(URL);
		
		function scapCallback(DOM) {
			var xmldata = this.getXML();
			
			var statusCode = xmldata.getElementsByTagName('code')[0] ? (xmldata.getElementsByTagName('code')[0].childNodes[0] ? xmldata.getElementsByTagName('code')[0].childNodes[0].nodeValue : 0) : 0;
			var scapKey = xmldata.getElementsByTagName('key')[0] ? (xmldata.getElementsByTagName('key')[0].childNodes[0] ? xmldata.getElementsByTagName('key')[0].childNodes[0].nodeValue : '') : '';
			var scapExt = xmldata.getElementsByTagName('ext')[0] ? (xmldata.getElementsByTagName('ext')[0].childNodes[0] ? xmldata.getElementsByTagName('ext')[0].childNodes[0].nodeValue : '') : '';
			
			if (statusCode) {
				fieldKey.value = scapKey;
				if (type) {
					blockCap.backgroundImage = 'url(/img/_cap/items/' + scapKey + '.' + scapExt + ')';
				} else {
					blockCap.src = '/img/_cap/items/' + scapKey + '.' + scapExt + '';
				}
			} else {
				return false;
			}
			
		}
	}