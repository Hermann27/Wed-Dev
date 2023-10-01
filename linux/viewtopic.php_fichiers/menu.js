function switchMenuVisible() {
	if (menu_hidden) {
		menu_hidden=0;
		if (document.getElementById("punwrap")) // Forum
		{
			document.getElementById("brdmenu").style.display = "block";
			if (document.getElementById("searchlinks")) {
				document.getElementById("searchlinks").style.display = "block";
			}
			document.getElementById("punwrap").style.marginLeft = "205px";
			document.getElementById("hidemenu").getElementsByTagName("a")[0].style.backgroundImage = "url(style/"+site_name+"/bouton-menu-hide.png)"
		}
		else if (document.getElementById("navigation")) // Wiki
		{
			document.getElementById('navigation').style.display = "inline";
			document.getElementById('main').style.marginLeft = '205px';
			document.getElementById("hidemenu").getElementsByTagName("a")[0].style.backgroundImage = "url("+static_url+"style/ubuntu/bouton-wiki-menu-hide.png)"
		}
		document.getElementById("hidemenu").getElementsByTagName("a")[0].style.left = "210px";
		setCookie('menuForum', 'visible');
	}
	else {
		menu_hidden=1;
		if (document.getElementById("punwrap")) // Forum
		{
			document.getElementById("brdmenu").style.display = "none";
			if (document.getElementById("searchlinks")) {
				document.getElementById("searchlinks").style.display = "none";
			}
			document.getElementById("punwrap").style.marginLeft = "10px";
			document.getElementById("hidemenu").getElementsByTagName("a")[0].style.backgroundImage = "url(style/"+site_name+"/bouton-menu-show.png)"
		}
		else if (document.getElementById("navigation")) // Wiki
		{
			document.getElementById('navigation').style.display = "none";
			document.getElementById('main').style.marginLeft = '10px';
			document.getElementById("hidemenu").getElementsByTagName("a")[0].style.backgroundImage = "url("+static_url+"style/ubuntu/bouton-wiki-menu-show.png)"
		}
		document.getElementById("hidemenu").getElementsByTagName("a")[0].style.left = "15px";
		setCookie('menuForum', 'hidden');
	}
}

/*function addLoadEvent(func)
{
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	}
	else {
		window.onload = function()
		{
			oldonload();
			func();
		}
	}
}

addLoadEvent(function() {
	if(getCookie('menuForum') == 'hidden')	{
		switchMenuVisible();
	}
});
*/
