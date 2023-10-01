var komliad_base="http://showads.pubmatic.com/AdServer";
var komliad_js_base="http://ads.pubmatic.com/AdServer";

var pm_sync_msg_ignore_list = [ 22245,19677,370,20553 ];
var pm_nydcpub_list = [ 19677 ];
var pm_nydcsite_list = [ 0 ];

var komliad_init=new function() {
	if (typeof window.komliad_init_done=='undefined') {
		window.komliad_init_done=0;
	}

	if (typeof(pubId) !='undefined' && is_nydcpub(pubId)) {
		komliad_base="http://showads1000.pubmatic.com/AdServer";
	}
	if (typeof(siteId) !='undefined' && is_nydcsite(siteId)) {
		komliad_base="http://showads1000.pubmatic.com/AdServer";
	}
}

function getCustomizedParams(){

	var _customizedParams = "";
	var gender=0;
//put publisher id if
	if (typeof(kadgender)!=='undefined' && kadgender!="") {
		//if gender is either m/f then set its as 1/2 otherwise assume it to be numeric 
		if (kadgender == "m" || kadgender == "M"){
			gender=1;
		}
		else if(kadgender == "f" || kadgender == "F"){
			gender=2;
		}
		else {
            		//assume kadgender to be numeric 1/2 , pass as it is
            		gender=kadgender;
        	}

		_customizedParams = _customizedParams+"&kadgdr="+gender;	
	}
	if (typeof(kadage)!=='undefined' && kadage!="") {
		_customizedParams = _customizedParams+"&kadage="+kadage;
	}
	if (typeof(kadhints)!=='undefined' && kadhints!="") {
		_customizedParams = _customizedParams+"&kadhints="+kadhints;
	}
	if (typeof(kadkw)!=='undefined' && kadkw!="") {
		_customizedParams = _customizedParams+"&kadkw="+kadkw;
	}
	if (typeof(kadupostalcode)!=='undefined' && kadupostalcode!="") {
		_customizedParams = _customizedParams+"&kadupcode="+kadupostalcode;
	}
	if (typeof(kadufirstname)!=='undefined' && kadufirstname!="") {
		_customizedParams = _customizedParams+"&kadufname="+kadufirstname;
	}
	if (typeof(kaducity)!== 'undefined' && kaducity!="") {
		_customizedParams = _customizedParams+"&kaducty="+kaducity;
	}
	return _customizedParams;
//end that if		 
}

function getTimeStamp() {
	var _currentTime = new Date();
	var _strTime = _currentTime.getFullYear() +"-"+ _currentTime.getMonth() +"-"+ _currentTime.getDate();
	_strTime = _strTime + " " + _currentTime.getHours() + ":" + _currentTime.getMinutes() +":"+ _currentTime.getSeconds();
	return escape(_strTime);
}

function getScreenHeight() {
	return screen.height;
}

function getScreenWidth() {
	return screen.width;
}

function getTimezone() {
	return ( (new Date().getTimezoneOffset()/60)*(-1) );
}

// Query to find out the BlendIn color
function getColorsQueryString() {
	var _page_bg_color="";
	var _link_color="";
	var _text_color="";
	var _stybg='transparent';
    if(typeof pmadbgcolor !== 'undefined') {
        // logic to get information on the background Blending color settings
        _page_bg_color=isValidColor(pmadbgcolor)?('#'+pmadbgcolor):"";
    }
    else if(typeof window.padbgcolor !== 'undefined') {
	_page_bg_color=isValidColor(window.padbgcolor)?('#'+window.padbgcolor):"";
    }
    if(typeof pmadlinkcolor !== 'undefined') {
        // logic to get information on the link Blending color settings
        _link_color=isValidColor(pmadlinkcolor)?('#'+pmadlinkcolor):"";
    }
    else if(typeof window.padlinkcolor !== 'undefined') {
	_link_color=isValidColor(window.padlinkcolor)?('#'+window.padlinkcolor):"";
    }
    if(typeof pmadtextcolor !== 'undefined') {
        // logic to get information on the text Blending color settings
        _text_color=isValidColor(pmadtextcolor)?('#'+pmadtextcolor):"";
    }
    else if(typeof window.padtextcolor !== 'undefined') {
	_text_color=isValidColor(window.padtextcolor)?('#'+window.padtextcolor):"";
    }
    else {
        if (typeof window.komliad_custom_color=='undefined') {
            window.komliad_custom_color=0;
        }
        else window.komliad_custom_color+=1;
        var _komliad_custom_color = window.komliad_custom_color;
        try {
                document.write("<div id='PubMatic_AdTags_Loading_22feb83_"+_komliad_custom_color+"' style='height:0;width:0;padding:0;margin:0;display:none;'><a id='PubMatic_AdTags_Loading_22feb83_Anchor_"+_komliad_custom_color+"' href='javascript:void(0);' style='height:0;width:0;padding:0;margin:0;display:none;'></a></div>")
                        
                        var adBoxChild = document.getElementById('PubMatic_AdTags_Loading_22feb83_'+_komliad_custom_color);
                        var adBox = adBoxChild.parentNode;
                        var adBoxChildLink = document.getElementById('PubMatic_AdTags_Loading_22feb83_Anchor_'+_komliad_custom_color);

                        if(!isValidColor(_link_color.replace(/#/,''))) _link_color=getStyle(adBoxChildLink,'color');
                        if(!isValidColor(_text_color.replace(/#/,''))) _text_color=getStyle(adBox,'color');
                        //adBox.removeChild(adBoxChild);

                        var ob = adBox;
                        while (_stybg == 'transparent' || _stybg == 'undefined') {
                                if (_stybg == 'transparent' || _stybg == 'undefined') {
                                        if(ob.tagName=="HTML") {
                                            //reached the top of the page :: ABORT
                                            _stybg=document.bgColor;
                                            break;
                                        }
                                        _stybg=null;
                                        if (navigator.appName.indexOf('Microsoft') != -1) {
                                            _stybg=getStyle(ob,'backgroundColor');
                                        }
                                        else {
                                            _stybg=getStyle(ob, 'background-color');
                                        }
                                }
                                ob = ob.parentNode;
                        }

                        _stybg=fixColorFormat(_stybg);
                        if(!isValidColor(_text_color.replace(/#/,''))) _text_color=fixColorFormat(_text_color);
                        if(!isValidColor(_link_color.replace(/#/,''))) _link_color=fixColorFormat(_link_color);
                        if(!isValidColor(_page_bg_color.replace(/#/,''))) _page_bg_color = _stybg;
        } catch (err) {
                if(!isValidColor(_page_bg_color.replace(/#/,''))) _page_bg_color=document.bgColor;
                if(!isValidColor(_link_color.replace(/#/,''))) _link_color=document.linkColor;
                if(!isValidColor(_text_color.replace(/#/,''))) _text_color=document.fgColor;
        }
    }
    var queryStr="";
    queryStr+="kbgColor="+_page_bg_color.replace(/#/,"");
    queryStr+="&ktextColor="+_text_color.replace(/#/,"");
    queryStr+="&klinkColor="+_link_color.replace(/#/,"");
    return queryStr;
}
/**
 * Helper Function      
 */
function getLeft(elemento) {
	var x=0;
	while(elemento)	{
		x += elemento.offsetLeft;
		elemento=elemento.offsetParent;
	}
	return x;
}

function getTop(elemento) {
	var y=0;
	while(elemento)	{
		y += elemento.offsetTop;
		elemento=elemento.offsetParent;
	}
	return y;
}
function isValidColor(clr) {
        if(clr.match('^([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?$')) return true;
	return false;
}
function getStyle(el,styleProp)
{
        if (typeof el !== 'object') {
                el = document.getElementById(el);
        }
        if (el.currentStyle) {
                var el = el.currentStyle[styleProp];
        }
        else if (window.getComputedStyle) {
                var el = document.defaultView.getComputedStyle(el,null).getPropertyValue(styleProp);
        }
        return el;
}
function fixColorFormat(str) {
	if (str.match('^#?([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?$')) return str;
        var clrSet = str.split(',');
	if(clrSet.length==4) return "#ffffff"; 
        if (parseInt(clrSet[0].split('(')[1])<16) { var redclr = (parseInt(clrSet[0].split('(')[1])).toString(16).toUpperCase(); redclr="0"+redclr; }
        else { var redclr = (parseInt(clrSet[0].split('(')[1])).toString(16).toUpperCase(); }
        if (parseInt(clrSet[1])<16) { var grnclr = (parseInt(clrSet[1])).toString(16).toUpperCase(); grnclr="0"+grnclr; }
        else { var grnclr = (parseInt(clrSet[1])).toString(16).toUpperCase(); }
        if (parseInt(clrSet[2].split(')')[0])<16) { var bluclr = (parseInt(clrSet[2].split(')')[0])).toString(16).toUpperCase(); bluclr="0"+bluclr; }
        else { var bluclr = (parseInt(clrSet[2].split(')')[0])).toString(16).toUpperCase(); }
        clr = "#"+redclr+grnclr+bluclr;
        return clr;
}
function remove_defaulted_div(){
        // NOTE: This is a very very heavy operation, need to do something about this.
        ad=document.getElementsByTagName("div");
        for(i=(ad.length-1); i > 0; i--){
            if(typeof ad[i].id!='undefined'){
			
			    if(ad[i].id.indexOf('k_adsbeacon')>-1){
				    if(typeof ad[i].id!='undefined'){
                        ad[i].parentNode.removeChild(ad[i]);
                        break;
                    }
			    }
		    }
	    }

        for(i=(ad.length-1); i > 0; i--){
                        if(typeof ad[i].id!='undefined'){
                                if(ad[i].id.indexOf('komli_ads_frame')>-1){
                                        if(typeof ad[i].id!='undefined'){
						ad[i].parentNode.removeChild(ad[i]);
						break;
                                        }
                                }
                        }
        }
 }


// script based
function showAdsFunction_Jscript() {
	if (typeof window.kadCounter=='undefined') {
		window.kadCounter=0;
	}
	window.kadCounter+=1;
	var frameName="komli_ads_frame"+window.kadCounter+pubId+siteId;
	var pageUrl=document.URL;
	pageUrl=pageUrl.split("?",1)[0];
	pageUrl=pageUrl.split("#",1)[0];
	var id=pageUrl.toString().replace(/\//g,"");
	id=id.replace(/\./g,"_");
	id=id.replace(/\:/g,"_");
	id=id.replace(/\\/g,"_");
	frameName=id+frameName;
	var srclink=komliad_base+'/AdServerServlet?operId=2&pubId='+pubId;
	var irno = Math.random();
	srclink=srclink+'&siteId='+siteId;
	srclink=srclink+'&adId='+kadId;
	srclink=srclink+'&kadwidth='+kadwidth;
	srclink=srclink+'&kadheight='+kadheight;
	if(typeof(kadNetwork) != 'undefined') {
		if( kadNetwork != 0 ) {
			remove_defaulted_div();
			srclink = srclink+'&kadNetwork='+kadNetwork;
		}
		//reset to zero in case, may be there one more adtag without having kadtype flag ..
		kadNetwork = 'undefined';
	}

	if(typeof(window.prevkadIds) != 'undefined') {
			srclink = srclink+'&prevkadIds='+window.prevkadIds;
	}
	srclink=srclink+'&'+getColorsQueryString();
	srclink=srclink + getCustomizedParams();
	srclink=srclink+'&pageURL='+pageUrl;
	srclink=srclink+'&frameName='+frameName;
	srclink=srclink+'&kltstamp='+getTimeStamp();
	srclink=srclink+'&ranreq='+irno;

	srclink=srclink+'&timezone='+ getTimezone();
	srclink=srclink +'&screenResolution='+ getScreenWidth() + "x" + getScreenHeight();
	srclink=(window.location === window.top.location)?(srclink +'&inIframe=0'):(srclink +'&inIframe=1');
		
	document.write('<span id="pubTestSpan"></span>');
	var spanEle = document.getElementById("pubTestSpan");
	
	if(spanEle)
		srclink = srclink + '&adPosition=' + getTop(spanEle) + "x" + getLeft(spanEle);

	document.write('<div id="k_adsbeacon" pid='+pubId+' style="float: left; margin: 0px 0px 0px 0px; height: 0px; width: 0px;" kadheight='+kadheight+' kadwidth='+kadwidth+' rec="'+frameName+'"></div><script type="text/javascript" src="'+srclink+'"> </script><div id="k_adebeacon" style="float: left; margin: 0px 0px 0px 0px; height: 0px; width: 0px;" kadheight='+kadheight+' kadwidth='+kadwidth+' rec="'+frameName+'"></div>');
}

//iframe based
function showAdsFunction() {
	if (typeof window.kadCounter=='undefined') {
		window.kadCounter=0;
	}
	window.kadCounter+=1;
	var frameName="komli_ads_frame"+window.kadCounter+pubId+siteId;
	var pageUrl=document.URL;
	pageUrl=pageUrl.split("?",1)[0];
	pageUrl=pageUrl.split("#",1)[0];
	pageUrl=pageUrl.toString().replace(/\'/g,"");
	var id=pageUrl.toString().replace(/\//g,"");
	id=id.replace(/\./g,"_");
	id=id.replace(/\:/g,"_");
	id=id.replace(/\\/g,"_");
	id=id.replace(/#/g,"_");
	frameName=id+frameName;
	var srclink=komliad_base+'/AdServerServlet?operId=1&pubId='+pubId;
	var irno = Math.random();
	srclink=srclink+'&siteId='+siteId;
	srclink=srclink+'&adId='+kadId;
	srclink=srclink+'&kadwidth='+kadwidth;
	srclink=srclink+'&kadheight='+kadheight;

	if(typeof(kadNetwork) != 'undefined') {
		if( kadNetwork != 0 ) {
			srclink = srclink+'&kadNetwork='+kadNetwork;
		}
		//reset to zero in case, may be there one more adtag without having kadtype flag ..
		kadNetwork = 'undefined';
	}

	if(typeof(window.prevkadIds) != 'undefined') {
			srclink = srclink+'&prevkadIds='+window.prevkadIds;
	}

	srclink=srclink+'&'+getColorsQueryString();
	srclink=srclink+'&frameName='+frameName;
	srclink=srclink+'&kltstamp='+getTimeStamp();
	srclink=srclink + getCustomizedParams();
	srclink=srclink+'&pageURL='+pageUrl;
	srclink=srclink+'&ranreq='+irno;

    srclink=srclink+'&timezone='+ getTimezone();
    srclink=srclink+'&screenResolution='+getScreenWidth() + "x" + getScreenHeight();
	srclink=(window.location === window.top.location)?(srclink +'&inIframe=0'):(srclink +'&inIframe=1');
	
	document.write('<span id="pubTestSpan"></span>');
	var spanEle = document.getElementById("pubTestSpan");
	if(spanEle)
		srclink = srclink + '&adPosition=' + getTop(spanEle) + "x" + getLeft(spanEle);

	var frameSrc='<iframe name="'+frameName+'"';
	frameSrc+=' frameborder="0" allowtransparency="true" hspace="0" vspace="0"';
	frameSrc+=' marginheight="0" marginwidth="0" scrolling="no"';
	frameSrc+=' width="'+kadwidth+'"';
	frameSrc+=' height="'+kadheight+'"';
	frameSrc+=' src="'+srclink+'"';
	frameSrc+='>';
	frameSrc+='</iframe>';
	document.write(frameSrc);
}

//load iframe based tracking script
function regClickTracker() {
	if (typeof(window.ktrackreg)=='undefined') {
		window.ktrackreg=1;
		document.write('<script type="text/javascript" src="'+komliad_js_base+'/js/adtrack.js"> <\/script>');
	}
}

//load java script based tracking script
function regClickTracker_Jscript() {
	if (typeof(window.ktrackreg_jscript)=='undefined') {
		window.ktrackreg_jscript=1;
		document.write('<script type="text/javascript" src="'+komliad_js_base+'/js/adtrackJ.js"> <\/script>');
	}
}

function insideIframe() {
	try{
	 	if (window.frameElement) { 
			if(typeof(kadNetwork) != 'undefined') {
                               if( kadNetwork != 0 ) {
                                       window.freqflag = 1;
                                       window.syncflag = 1;
                                       window.ktrackreg_jscript =1;
                                       window.ktrackreg=1;
                               }
                       }

		}else {
			var tmp=1;
		}
	} catch(e) {

		if(typeof(kadNetwork) != 'undefined') {
			if( kadNetwork != 0 ) {
				window.freqflag = 1;
                                window.syncflag = 1;
				window.ktrackreg_jscript =1;
				window.ktrackreg=1;
			}
		}

		/* get the window size and check with current size if its maching that means its default adtag inside iframe */
/*
		var viewportwidth;
		var viewportheight;

		if (typeof window.innerWidth != 'undefined') {
			viewportwidth = window.innerWidth;
			viewportheight = window.innerHeight;
 		}
 
		// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

		 else if (typeof(document.documentElement) != 'undefined'
			     && typeof(document.documentElement.clientWidth) !=
			     'undefined' && document.documentElement.clientWidth != 0) {
			viewportwidth = document.documentElement.clientWidth;
			viewportheight = document.documentElement.clientHeight;
 		}
 
		 // older versions of IE
 
		 else {
		       viewportwidth = document.getElementsByTagName('body')[0].clientWidth;
		       viewportheight = document.getElementsByTagName('body')[0].clientHeight;
 		 }
		
		if(viewportwidth == kadwidth && viewportheight == kadheight ) {
			alert('Height and Width is matching '+viewportwidth+ kadwidth+viewportheight+kadheight);
			window.freqflag = 1;
                	window.syncflag = 1;
			window.ktrackreg_jscript =1;
			window.ktrackreg=1;
		}
*/
	}
}

function set_frequency() {
	/* create iframe whoch will set frequency cookie */
	if( typeof(window.freqflag) == 'undefined') {
		var irno = Math.random();
		//var freqsrc = komliad_js_base+'/js/freq.html?x='+irno;
		var freqsrc = komliad_js_base+'/js/freq.html';
		var freqiframe= '<iframe name="freqiframe"';
		freqiframe+=' frameborder="0" allowtransparency="true" hspace="0" vspace="0"';
		freqiframe+=' marginheight="0" marginwidth="0" scrolling="no"';
		freqiframe+=' width="0"';
		freqiframe+=' height="0" style="position:absolute;top:-15000px;"';
		freqiframe+=' src="'+freqsrc+'"';
		freqiframe+='>';
		freqiframe+='</iframe>';
	
		document.writeln(freqiframe);

		/* set the flag */
		window.freqflag = 1;
	}
}

function isIgnored_sync(id) {
    var ignListLen = pm_sync_msg_ignore_list.length;
    for (var i = 0; i < ignListLen; i++) {
        if (id == pm_sync_msg_ignore_list[i]) {
            return true;
        }
    }
    return false;
}

function is_nydcpub(id) {
    var inydcpubListLen = pm_nydcpub_list.length;
    for (var i = 0; i < inydcpubListLen; i++) {
        if (id == pm_nydcpub_list[i]) {
            return true;
        }
    }
    return false;
}

function is_nydcsite(id) {
    var inydcsiteListLen = pm_nydcsite_list.length;
    for (var i = 0; i < inydcsiteListLen; i++) {
        if (id == pm_nydcsite_list[i]) {
            return true;
        }
    }
    return false;
}

function syncup_pixels() {
	
		if(isIgnored_sync(pubId)) {
			return;	
		}		

        /* create iframe whoch will help to set sync up API cookie */
        if( typeof(window.syncflag) == 'undefined') {
                var syncsrc = komliad_js_base+'/js/syncuppixels.html';
                var synciframe= '<iframe name="synciframe"';
                synciframe+=' frameborder="0" allowtransparency="true" hspace="0" vspace="0"';
                synciframe+=' marginheight="0" marginwidth="0" scrolling="no"';
                synciframe+=' width="0"';
                synciframe+=' height="0" style="position:absolute;top:-15000px;"';
                synciframe+=' src="'+syncsrc+'"';
                synciframe+='>';
                synciframe+='</iframe>';

                document.writeln(synciframe);

                /* set the flag */
                window.syncflag = 1;
        }
}

var regShowAdsFunction=new function() {
	if (typeof(pubId)=='undefined') {
		return;
	}
	if (typeof(siteId)=='undefined') {
		return;
	}
	if (typeof(kadId)=='undefined') {
		return;
	}
	if (typeof(kadwidth)=='undefined') {
		return;
	} 
	if (typeof(kadheight)=='undefined') {
		return;
	}

	insideIframe();
	if( typeof(window.freqflag) == 'undefined' ) {
		set_frequency();
		window.freqflag = 1;
	}
        if( typeof(window.syncflag) == 'undefined' ) {
                syncup_pixels();
                window.syncflag = 1;
        }

	//check ad serving type 
	if (typeof(kadtype)=='undefined') {
		// default serving
		showAdsFunction();
		regClickTracker();
	} else {
		if(parseInt(kadtype) == 1) {
			// do script based serving
			showAdsFunction_Jscript();
			regClickTracker_Jscript();
			
			//reset to zero in case, may be there one more adtag without having kadtype flag ..
			kadtype = 0;
		} else {
			// default serving
			showAdsFunction();
			regClickTracker();
		}
	}

        if( typeof(window.prevkadIds) == 'undefined' ) {
                window.prevkadIds = kadId;
        } else {
                window.prevkadIds = window.prevkadIds + '_' + kadId;
        }
}


