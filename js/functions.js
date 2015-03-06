function loader(){
	xlink_replace_show_embed();	
}

function shownhide(id) {	
	if(document.getElementById){
		if (document.getElementById(id).style.visibility == "visible"){
			document.getElementById(id).style.visibility = "hidden";
			document.getElementById(id).style.display = "none";
		}else{
			if (document.getElementById(id).style.visibility == "hidden"){
				document.getElementById(id).style.visibility = "visible";
				document.getElementById(id).style.display = "block";
			}
		}
	}
}

// document.getElementsByAttribute([string attributeName],[string attributeValue],[boolean isCommaHyphenOrSpaceSeparatedList:false])
document.getElementsByAttribute=function(attrN,attrV,multi){
    attrV=attrV.replace(/\|/g,'\\|').replace(/\[/g,'\\[').replace(/\(/g,'\\(').replace(/\+/g,'\\+').replace(/\./g,'\\.').replace(/\*/g,'\\*').replace(/\?/g,'\\?').replace(/\//g,'\\/');
    var
        multi=typeof multi!='undefined'?
            multi:
            false,
        cIterate=document.getElementsByTagName('*'),
        aResponse=[],
        attr,
        re=new RegExp(multi?'\\b'+attrV+'\\b':'^'+attrV+'$'),
        i=0,
        elm;
    while((elm=cIterate.item(i++))){
        attr=elm.getAttributeNode(attrN);
        if(attr &&
            attr.specified &&
            re.test(attr.value)
        )
            aResponse.push(elm);
    }
    return aResponse;
}

function ajaxManager() {
	
	var args = ajaxManager.arguments;
	switch (args[0]) {
		case "start_up":
		/*ajaxManager('load_page','navigation.xml','menu'); */
		/*
		Args 0: load_page (der Fall, der bearbeitet werden soll)
		Args 1: navigation.xml (die zu ladende Datei)
		Args 2: contentLYR (das Ziel-Div)
		*/
		break;
		case "load_page":
		if (document.getElementById) { // Nur Browser die "document.getElementById" koennen duerfen weitermachen
			// Browserweiche: IE braucht ActiveX, alle anderen koennen es direkt (if else Geschichte)
			var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
		}//if

		// Jetzt muss es die Variable X geben, ob IE oder sonstwas:
		// X ist irgendwie die XMLHTTP-Schnittstelle...
		if (x) {
			x.onreadystatechange = function() {
				// Vigilant fuer Veraenderungen an X.
				if(x.readyState == 4 && x.status == 200) { // 4 heisst "complete" (0 = uninitialized, 1 = loading, 2 = loaded, 3 = interactive)
					el = document.getElementById(args[2]);
					el.innerHTML = x.responseText;          // "Place the data into an element and display it"
				}//if
			}//function
			x.open("GET",args[1],true); // Get the data, which file?, loading asynchronously is true
			x.send(null); // Es werden keine Daten transferiert, darum Null.
		}//if
		break;
		case "hide_menu":
		document.getElementById("eddies").style.visibility = "hidden";
		break;
	}//switch
}//function ajaxManager

function xlink_replace_show_embed(){
	var results = '';
	results = document.getElementsByAttribute('show', 'embed');
   
	//alert(results[0].attributes.id.value);
	if(results[0]){
		//alert(results.length);
		for (var i = 0; i <= results.length-1; i++){
			//alert(results[i].attributes.href.value);
			ajaxManager('load_page', results[i].attributes.href.value, results[i].attributes.id.value);
		}
	}
}