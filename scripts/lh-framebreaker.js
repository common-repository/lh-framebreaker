if (top != self ) {
	var whitelist =[
		document.location.hostname // your own site
	];
	var i;
	var test = whitelist.length;
	var safe = false;
 
	for (i=0; i < test ; i++) {
		if (document.referrer.indexOf(whitelist[i]) != -1 ) {
        		safe = true;
    		}
   	}
	if (safe === false) {
		top.location.replace(document.location);
	}
}