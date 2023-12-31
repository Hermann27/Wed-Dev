// tracker.js
// ----------------------
// (c) jfg://networks SAS

var _oobreferrerkw = null;
var _oob = {};
var _oobacct="";			// set up the oob Account
var _oobsite="";			// set up the oob Site
_oob.gifpath = "/_oobimg.php"; // set the web path to the __oobt.gif file
_oob.host = 'http://ads.over-blog.com';
_oob.plog = "hitv2js";
_oob.pcru = 0;

//-- Auto/Organic Sources and Keywords
_oob.sr = new Array();			_oob.kw = new Array();
_oob.sr[0]  = "google";			_oob.kw[0]  = "q";
_oob.sr[1]  = "yahoo";			_oob.kw[1]  = "p";
_oob.sr[2]  = "msn";			_oob.kw[2]  = "q";
_oob.sr[3]  = "aol";			_oob.kw[3]  = "query";
_oob.sr[4]  = "aol";			_oob.kw[4]  = "encquery";
_oob.sr[5]  = "lycos";			_oob.kw[5]  = "query";
_oob.sr[6]  = "ask";			_oob.kw[6]  = "q";
_oob.sr[7]  = "altavista";		_oob.kw[7]  = "q";
_oob.sr[8]  = "netscape";		_oob.kw[8]  = "query";
_oob.sr[9]  = "cnn";			_oob.kw[9]  = "query";
_oob.sr[10] = "looksmart";		_oob.kw[10] = "qt";
_oob.sr[11] = "about";			_oob.kw[11] = "terms";
_oob.sr[12] = "mamma";			_oob.kw[12] = "query";
_oob.sr[13] = "alltheweb";		_oob.kw[13] = "q";
_oob.sr[14] = "gigablast";		_oob.kw[14] = "q";
_oob.sr[15] = "voila";			_oob.kw[15] = "rdata";
_oob.sr[16] = "virgilio";		_oob.kw[16] = "qs";
_oob.sr[17] = "live";			_oob.kw[17] = "q";
_oob.sr[18] = "baidu";			_oob.kw[18] = "wd";
_oob.sr[19] = "alice";			_oob.kw[19] = "qs";
_oob.sr[20] = "yandex";			_oob.kw[20] = "text";
_oob.sr[21] = "najdi";			_oob.kw[21] = "q";
_oob.sr[22] = "aol";			_oob.kw[22] = "q";
_oob.sr[23] = "club-internet";	_oob.kw[23] = "query";
_oob.sr[24] = "mama";			_oob.kw[24] = "query";
_oob.sr[25] = "seznam";			_oob.kw[25] = "q";
_oob.sr[26] = "search";			_oob.kw[26] = "q";
_oob.sr[27] = "wp";				_oob.kw[27] = "szukaj";
_oob.sr[28] = "onet";			_oob.kw[28] = "qt";
_oob.sr[29] = "netsprint";		_oob.kw[29] = "q";
_oob.sr[30] = "szukacz";		_oob.kw[30] = "q";
_oob.sr[31] = "yam";			_oob.kw[31] = "k";
_oob.sr[32] = "pchome";			_oob.kw[32] = "q";
_oob.sr[33] = "kvasir";			_oob.kw[33] = "searchExpr";
_oob.sr[34] = "sesam";			_oob.kw[34] = "q";
_oob.sr[35] = "ozu"; 			_oob.kw[35] = "q";
_oob.sr[36] = "terra"; 			_oob.kw[36] = "query";
_oob.sr[37] = "nostrum";		_oob.kw[37] = "query";
_oob.sr[38] = "mynet";			_oob.kw[38] = "q";
_oob.sr[39] = "ekolay";			_oob.kw[39] = "q";
_oob.sr[40] = "delicious";		_oob.kw[40] = "p";
_oob.sr[41] = "msn";			_oob.kw[41] = "text";
_oob.sr[42] = "over-blog";		_oob.kw[42] = "query";
_oob.sr[43] = "erog";			_oob.kw[43] = "query";
_oob.sr[44] = "aliceadsl";		_oob.kw[44] = "qs";
_oob.sr[45] = "google";			_oob.kw[45] = "as_q";
_oob.sr[46] = "bing";			_oob.kw[46] = "q";

var _callTracker = function ()
{
	if (_oobacct.match(/^OOB/))
	{
		_oob.gifpath = _oob.host + _oob.gifpath;
	}

	var sedata = '';
	var engine = '';
	var keywords = '';
	if (document.referrer)
	{
		sedata = _oob.getKeywords(document.referrer);
		if (sedata == '')
		{
			sedata = _oob.getKeywords(
				decodeURIComponent(document.referrer)
			);
		}
	}
	if (sedata != '')
	{
		var searray = sedata.split(',', 2);
		engine = searray[0];
		keywords = searray[1];  
		_oobreferrerkw = searray[1];
	}

	var qstr = 'ref='		+ encodeURIComponent(document.referrer) +
		'&nav='			+ encodeURIComponent(navigator.appName) + 
		'&navv='		+ encodeURIComponent(navigator.appVersion) +
		'&acct='		+ _oobacct +
		'&site='		+ _oobsite +
		'&nlc='			+ Math.random(0xFFFF) +
		'&title='		+ encodeURIComponent(document.title.substr(0,500)) +
		'&loc='			+ encodeURIComponent(document.location.href) +
		'&kw='			+ encodeURIComponent(keywords) +
		'&en='			+ encodeURIComponent(engine) +
		'&os='			+ encodeURIComponent(_oob.getOS()) +
		'&brws='		+ encodeURIComponent(_oob.getBrowser()) +
		'&log='			+ encodeURIComponent(_oob.plog);
	
	var i = new Image(1,1);
	i.src = _oob.gifpath+"?"+qstr;
	i.onload=function() { _oob.Void(); };
};

var oobtracker = function ()
{
	return oobTracker();
};

var oobTracker = function (plog, pcru)
{
	_oob.plog = plog;
	_oob.pcru = pcru;
	setTimeout('_callTracker();', 1000);  
};

_oob.Void = function()
{ 
	if (_oob.pcru == 1) return;
	_callTracker = null;
	_oob = null;
	return;
};

_oob.getKeywords = function(url)
{
	var h = url.match(
		/^http[s]?:\/\/(.*?)\//
	);
	if (!h || !h[1])
	{
		return '';
	}
	h = h[1];
	var hp = h.split('.');
	for (var i = hp.length - 1; i > hp.length - 4; i--)
	{
		for (var j = 0; _oob.sr[j]; j++)
		{
			if (_oob.sr[j] == hp[i])
			{
				var kw = url.match(
					new RegExp(
						'[/?&]' + _oob.kw[j] + '=(.*?)(&|$)'
					)
				);
				if (kw && kw[1])
				{
					return j + ',' + kw[1];
				}
			}
		}
	}
	return '';
};

_oob.getOS = function()
{
	var p = navigator.platform.toLowerCase();
	if (p.indexOf('win') != -1)				return 1;
	if (p.indexOf('mac') != -1)				return 2;
	if (p.indexOf('linux') != -1)			return 3;
	return 0;
};

_oob.getBrowser = function()
{
	var u = navigator.userAgent.toLowerCase();
	// IE 1
	if (u.indexOf('msie 7') != -1)			return 17;
	if (u.indexOf('msie 6') != -1)			return 16;
	if (u.indexOf('msie 5') != -1)			return 15;
	// Firefox 2
	if (u.indexOf('firefox/3') != -1)		return 23;
	if (u.indexOf('firefox/2') != -1)		return 22;
	if (u.indexOf('firefox/1') != -1)		return 21;
	// Safari 3
	if (u.indexOf('safari') != -1)
	{
		if (u.indexOf('version/3') != -1)
		{
			if (u.indexOf('mobile') != -1)	return 331;
			return 33;
		}
		var vers = u.match(
			/safari\/([0-9]+)/
		);
		if (vers[1])
		{
			if (vers[1] > 312) return 32;
			else return 31;
		}
		return 30;
	}
	// Opera 4
	if (u.indexOf('opera/9') != -1)			return 49;
	if (u.indexOf('opera/8') != -1)			return 48;
	if (u.indexOf('opera/7') != -1)			return 47;
	// Konqueror 5
	if (u.indexOf('khtml/4') != -1)			return 54;
	if (u.indexOf('khtml/3') != -1)			return 53;
	if (u.indexOf('khtml/2') != -1)			return 52;
	return 0;
};

_oob.getDefinition = function()
{
	return screen.width + 'x' + screen.height;
};
