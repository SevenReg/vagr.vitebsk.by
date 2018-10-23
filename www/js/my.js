var d = document;

function lvl1(a){
	d.getElementById('lvl'+a).className = d.getElementById('lvl'+a).className == 'db' ? 'dn' : 'db';	
}

function lvl2(a){
	d.getElementById('lvl_'+a).className = d.getElementById('lvl_'+a).className == 'db' ? 'dn' : 'db';	
}

function show(){
	d.getElementById('vot').className = d.getElementById('vot').className == 'index_voting_type db' ? 'dn' : 'index_voting_type db';	
}