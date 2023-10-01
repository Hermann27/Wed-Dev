

var p682146_FlashMode8=0;
var p682146_FlashNN=(navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
if ( p682146_FlashNN ) {
 p682146_FlashMode8=parseInt(p682146_FlashNN.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split(".")[0]) >= 8;
}
else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0) {
 if (navigator.userAgent.indexOf("Win")>=0) {
 document.write('<SCR'+'IPT LANGUAGE=VBScript\> \n');
 document.write('on error resume next \n');
 document.write('p682146_FlashMode8=(IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.8")))\n');
 document.write('</SCR'+'IPT\> \n');
 }
 else {
 p682146_FlashMode8=(navigator.userAgent.indexOf("Mac")>=0);
 }
}

if (p682146_FlashMode8) {
 document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ');
 document.write('  codebase="' + document.location.protocol + '//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" ');
 document.write(' id="pub_Flash3225424" width="300" height="250"> ');
 document.write(' <param name="allowScriptAccess" value="always" />');
 document.write(' <param name="movie" value="http://akamai.smartadserver.com/diff/301/682146/300x250_csl_2010.swf"> ');
 document.write(' <param name="flashvars" value="target=_blank&clicktag=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars=&clickTag=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars=&clickTAG=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars="> ');
 document.write(' <param name="quality" value="high"> ');
 document.write(' <param name="wmode" value="Opaque"> ');
 document.write(' <embed name="pub_Flash3225424" id="pub_Flash3225424" src="http://akamai.smartadserver.com/diff/301/682146/300x250_csl_2010.swf" flashvars="target=_blank&clicktag=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars=&clickTag=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars=&clickTAG=http://www3.smartadserver.com/diff/301/682146/go19.asp%3F682146;81929;8867356429324048641;7100594546;S;3225424;clickvars=" ');
 document.write(' swLiveConnect="true" width="300" height="250" ');
 document.write(' quality="high" wmode="Opaque" ');
 document.write(' allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"> ');
 document.write('</embed> ');
 document.write('</object> ');
}
else
{
 document.write('<a href="http://www3.smartadserver.com/diff/301/682146/go18.asp?682146;81929;8867356429324048641;7100594546;S;3225424;clickvars="  target="_blank"><img src="http://www3.smartadserver.com/diff/301/682146/300x250_csl.gif" alt="" width=300 height=250 border="0"></a>');


}



document.write('\r\n');


