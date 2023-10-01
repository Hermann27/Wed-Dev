var komli_base_j="http://track.pubmatic.com/AdServer";
var komliad_pubmatic_url_j="http://www.pubmatic.com/publisherreferral.html";
var ktrack_init_t=new function() {
	if (typeof window.komliad_init_done=='undefined') {
		window.komliad_init_done=0;
	}
}
var BrowserDetect_j = {
init: function () {
		  this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		  this.version = this.searchVersion(navigator.userAgent)
			  || this.searchVersion(navigator.appVersion)
			  || "an unknown version";
		  this.OS = this.searchString(this.dataOS) || "an unknown OS";
	  },
searchString: function (data) {
				  for (var i=0;i<data.length;i++)	{
					  var dataString = data[i].string;
					  var dataProp = data[i].prop;
					  this.versionSearchString = data[i].versionSearch || data[i].identity;
					  if (dataString) {
						  if (dataString.indexOf(data[i].subString) != -1)
							  return data[i].identity;
					  }
					  else if (dataProp)
						  return data[i].identity;
				  }
			  },
searchVersion: function (dataString) {
				   var index = dataString.indexOf(this.versionSearchString);
				   if (index == -1) return;
				   return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
			   },
dataBrowser: [
			 {	string: navigator.userAgent,
subString: "OmniWeb",
		   versionSearch: "OmniWeb/",
		   identity: "OmniWeb"
			 },
			 {
string: navigator.vendor,
		subString: "Apple",
		identity: "Safari"
			 },
			 {
prop: window.opera,
	  identity: "Opera"
			 },
			 {
string: navigator.vendor,
		subString: "iCab",
		identity: "iCab"
			 },
			 {
string: navigator.vendor,
		subString: "KDE",
		identity: "Konqueror"
			 },
			 {
string: navigator.userAgent,
		subString: "Firefox",
		identity: "Firefox"
			 },
			 {
string: navigator.vendor,
		subString: "Camino",
		identity: "Camino"
			 },
			 {		// for newer Netscapes (6+)
string: navigator.userAgent,
		subString: "Netscape",
		identity: "Netscape"
			 },
			 {
string: navigator.userAgent,
		subString: "MSIE",
		identity: "Explorer",
		versionSearch: "MSIE"
			 },
			 {
string: navigator.userAgent,
		subString: "Gecko",
		identity: "Mozilla",
		versionSearch: "rv"
			 },
			 {		// for older Netscapes (4-)
string: navigator.userAgent,
		subString: "Mozilla",
		identity: "Netscape",
		versionSearch: "Mozilla"
			 }
	  ],
		  dataOS : [
		  {
string: navigator.platform,
		subString: "Win",
		identity: "Windows"
		  },
		  {
string: navigator.platform,
		subString: "Mac",
		identity: "Mac"
		  },
		  {
string: navigator.platform,
		subString: "Linux",
		identity: "Linux"
		  }
	  ]

};

if(typeof window.addEventListener!='undefined')
{
	window.addEventListener('load',clicktrack_init_j,false);
}else if(typeof document.addEventListener!='undefined'){
	document.addEventListener('load',clicktrack_init_j,false);
}else if(typeof window.attachEvent!='undefined'){
	window.attachEvent('onload',clicktrack_init_j);
}
else
{
	if(typeof window.onload=='function')
	{
		var existing=onload;
		window.onload=function(){
			existing();
			clicktrack_init_j();
		};
	}else{
		window.onload=clicktrack_init_j;
	}
}

function pm_addEventListener_j(target,type,callback,captures) {
	if (target.addEventListener) {
		// EOMB
		target.addEventListener(type,callback,captures);
	} else if (target.attachEvent) {
		// IE
		target.attachEvent('on'+type,callback,captures);
	} else {
		// IE 5 Mac and some others
		target['on'+type] = callback;
	}
}

var _pmal = new Array();
function pm_get_adlist() {
	var ad = document.getElementsByTagName("div");
	var counter = 0;
	for (i=0; i<ad.length; i++) {
		if (typeof ad[i].id!='undefined'){
			if(ad[i].id.indexOf('k_adsbeacon')>-1){
				var attrlen = ad[i].attributes.length;
				var lw = 0;
				var lh = 0;
				var lfname="";
				for (var j = 0; j < attrlen; j++) {
					if (ad[i].attributes[j].name.toString() == "kadwidth") {
						lw = ad[i].attributes[j].value;
					}
					if (ad[i].attributes[j].name.toString() == "kadheight") {
						lh = ad[i].attributes[j].value;
					}
					if (ad[i].attributes[j].name.toString() == "pid") {
						lpid = ad[i].attributes[j].value;
					}
					if (ad[i].attributes[j].name.toString() == "rec") {
						lfname = ad[i].attributes[j].value;
					}
				}
				var adinfo = new Array();
				var click_div = document.getElementsByTagName("div");

				// search for clickData attribute of a Div with same frame name 
				for (var k=0; k<click_div.length; k++) {
					if (typeof click_div[k].id!='undefined'){
						if(click_div[k].id.indexOf(lfname)>-1){
						var urldivattrlen = click_div[k].attributes.length;
						for (var l = 0; l < urldivattrlen; l++) {
								if (click_div[k].attributes[l].name.toString() == "clickdata") {
									adinfo["clickdata"] = click_div[k].attributes[l].value;
									break;
								}
							}
						}
					}
				}
				
				adinfo["fname"] = lfname;
				adinfo["pid"] = lpid;
				adinfo["height"] = lh;
				adinfo["width"] = lw;
				adinfo["left"] = findX_j(ad[i]);
				adinfo["top"] = findY_j(ad[i]);
				adinfo["div"] = ad[i];
				_pmal[counter] = adinfo;
				counter=counter+1;
			}
		}
	}
}

function clicktrack_init_j() {

	BrowserDetect_j.init();

	
	if(pubId != 'undefined') {
		if(pubId == 8597) {
			return;
		}
	}
	pm_get_adlist();
	if (BrowserDetect_j.browser.toString() == "Explorer") {
		pm_addEventListener_j(window, 'beforeunload', doPageExit_j, false);
		//pm_addEventListener_j(window, 'blur', doPageExit_j, true);
		pm_addEventListener_j(document.body, 'mousemove', getCoordinates_j, false);
	} else {
		pm_addEventListener_j(window, 'unload', doPageExit_j, false);
		//pm_addEventListener_j(window, 'blur', doPageExit_j, true);
		pm_addEventListener_j(window, 'mousemove', getCoordinates_j, true);
	}
	//addPubMaticNoteToAllAds();


}

var px_t;
var py_t;
function getCoordinates_j(e){
	if (!e) var e = window.event;
	var ieflag = 0;
	try {
		if (BrowserDetect_j.browser.toString() != "Explorer") {
//		if (typeof window.event.offsetX=='undefined') {
			ieflag = 0;
		} else {
			ieflag = 1;
		}
	} catch(err) {
		ieflag = 0;
	}
	if (ieflag == 0) {
		px_t = e.pageX;
		py_t = e.pageY;
	} else {
		px_t = window.event.offsetX;
		py_t = window.event.offsetY;
	}
}

function findY_j(obj){var y=0;
	while(obj){
		y+=obj.offsetTop;
		obj=obj.offsetParent;
	}
	return(y);
}
function findX_j(obj){var x=0;
	while(obj){x+=obj.offsetLeft;
		obj=obj.offsetParent;
	}
	return(x);
}
var counter = 0;
function doPageExit_j(){
	for (var i=0; i<_pmal.length;i++) {
		var adinfo = _pmal[i];
		var lw = adinfo["width"];
		var lh = adinfo["height"];
		var lfname=adinfo["fname"];
		var clickData = adinfo["clickdata"];
		var adLeft="";
		var adTop="";
		if (adinfo["div"]) {
			adLeft=findX_j(adinfo["div"]);
			adTop=findY_j(adinfo["div"]);
		} else {
			adLeft = adinfo["left"];
			adTop = adinfo["top"];
		}
		//alert('px:'+ px_t + ',py: ' + py_t+'left='+adLeft+';top='+adTop+'lw='+lw+';lh='+lh);
		var inFrameX=((px_t>(adLeft-5))&&(px_t<(parseInt(adLeft)+parseInt(lw)+5)));
		var inFrameY=((py_t>(adTop-5))&&(py_t<(parseInt(adTop)+parseInt(lh)+3)));
		
		if(inFrameY&&inFrameX){
			var srclink=komli_base_j+'/AdDisplayTrackerServlet?';
			var frameName="AAA";
			srclink=srclink+'operId=3';
			srclink=srclink+'&frameName='+lfname;
			srclink=srclink+'&clickData='+clickData;

            var newimg=document.createElement("img");
			newimg.setAttribute("height",0);
			newimg.setAttribute("width",0);
			newimg.setAttribute("src",srclink);
			newimg.setAttribute('hspace', '0');
			newimg.setAttribute('vspace', '0');
			var myBody=document.getElementsByTagName("body")[0];
			myBody.appendChild(newimg);

            m_pse_t(900);
		}
	}
}
function m_pse_t(numberMillis){
	var now=new Date();
	var exitTime=now.getTime()+numberMillis;
	while(true){
		now=new Date();
		if(now.getTime()>exitTime){
			return;
		}
	}
}

function addPubMaticNoteToAllAds_j() {
	for (var i=0; i<_pmal.length;i++) {
		var adinfo = _pmal[i];
		addPubMaticNote(adinfo["div"], adinfo["height"], adinfo["width"], adinfo["pid"]);
	}
}

function addPubMaticNote_j(obj, objHeight, objWidth, pubId) {
			// calculate the coordinates of the iframe and then decide to
			// attach the PubMatic note
			var adLeft=findX_j(obj);
			var adTop=findY_j(obj);
			var adRight=parseInt(adLeft)+parseInt(objWidth);
			var adBottom=parseInt(adTop)+parseInt(objHeight);
			showtip_j(adRight - 115, adBottom - 1, pubId);
}

function trackNote_j(pubId) {

	// Generate a random number and tracking URL
	var itrno = Math.random();
	var trackNoteUrl = komliad_base + '/AdDisplayTrackerServlet?operId=2&activityId=1&activityParam='+pubId+'&opString='+itrno;

	// append tracking beacon to the page there by tracking the click on the note
    var newimg = document.createElement('img');
	newimg.setAttribute('id','pmsgbeacon');
	newimg.setAttribute('height', '0');
	newimg.setAttribute('width', '0');
	newimg.setAttribute('hspace', '0');
	newimg.setAttribute('vspace', '0');
	newimg.setAttribute('src', trackNoteUrl);
	document.body.appendChild(newimg);
    
}

function showtip_j(x, y, pubId) {
	var messagePubMatic = "Ads optimized by PubMatic";
	var newdiv = document.createElement('div');
	var divIdName = 'pubmaticMessage'+'Div';
	newdiv.setAttribute('id',divIdName);
	//newdiv.innerHTML = '<font size="0.4"><a href="'+komliad_pubmatic_url_j+'" style="color:#696969" onclick="javascript:trackNote('+pubId+')">' + messagePubMatic +'</a></font>';
	newdiv.innerHTML = '<a href="'+komliad_pubmatic_url_j+'" style="font-weight: normal; text-decoration: underline; font-family: Arial, Helvetica, sans-serif; font-size:9px" onclick="javascript:trackNote_j('+pubId+')">' + messagePubMatic +'</a>';
	newdiv.style.top = y + "px";
	newdiv.style.left = x + "px";
	newdiv.style.display="block";
	newdiv.style.zIndex=0;
	newdiv.style.position="absolute";
	newdiv.style.height ="5px";
	newdiv.style.margin="0px 0px 0px 0px";
	newdiv.style.width="120px";
	//  newdiv.style.FontFamily="Arial, Helvetica, sans-serif";
//	newdiv.style.FontSize="4px";
	//newdiv.style.backgroundColor="#FAF0E6";
	document.body.appendChild(newdiv);
}

function ObjectSourceStr_j(q) {
	if(q.length > 1) this.q = q.substring(1, q.length);
	else this.q = null;
	this.keyValuePairs = new Array();
	if(q) {
		for(var i=0; i < this.q.split("&").length; i++) {
			this.keyValuePairs[i] = this.q.split("&")[i];
		}
	}
	this.getKeyValuePairs = function() { return this.keyValuePairs; }
	this.getValue = function(s) {
		for(var j=0; j < this.keyValuePairs.length; j++) {
			if(this.keyValuePairs[j].split("=")[0] == s)
				return this.keyValuePairs[j].split("=")[1];
		}
		return false;
	}
	this.getParameters = function() {
		var a = new Array(this.getLength());
		for(var j=0; j < this.keyValuePairs.length; j++) {
			a[j] = this.keyValuePairs[j].split("=")[0];
		}
		return a;
	}
	this.getLength = function() { return this.keyValuePairs.length; }
}
function SourceStrParam_j(srcStr, key){
	var page = new ObjectSourceStr_j(srcStr);
	return unescape(page.getValue(key));
}

function isIgnored_j(id) {
	var ignListLen = msg_ignore_list_j.length;
	for (var i = 0; i < ignListLen; i++) {
		if (id == msg_ignore_list_j[i]) {
			return true;
		}
	}
	return false;
}

var msg_ignore_list_j = [
0,3144,4773,5016,5159,5296,5302,533,5669,3324,5987,5785,4891,6917,1508,6883,5568,6846,6539,7580,7312,8257,7372,5211,6508,3820,8992,10267,9938,9011,1765,11204,10777,12106,8855,8984,8597,14878,15023,13071,15685,15900,11491,8717,13082,17790,9549,17452,5354,17410,16437,19953,21864,16237,22120,8654,8682,22933,19451,23583,10937,14358
];
