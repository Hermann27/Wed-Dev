YAHOO.util.Event.onDOMReady( function(e) { if (!OB.Bar) { return; }  var removeBar = function() { YAHOO.util.Dom.batch( document.getElementsByTagName('a'), function(el) { YAHOO.util.Event.on( el, 'click', function(e) { window.parent.location = this.href; } ) } ); }; try { if (window.parent != window && window.parent && window.parent.OB) {  removeBar(); return; } } catch (e) { if (window.parent.referrer.match( /http:\/\/[^\/]+(erog\.fr|over\-blog\.es|over\-blog\.com|over\-blog\.net|over\-blog\.org|over\-blog\.it|over\-blog\.com|over\-blog\.net|over\-blog\.org|over\-blog\.com|over\-blog\.net|over\-blog\.org|over\-blog\.de|over\-blog\.com|over\-blog\.net|over\-blog\.fr|over\-blog\.org)/ )) { removeBar(); } else { window.parent.location = window.location; } return; }  var s = document.createElement('style'); s.type = 'text/css'; var css = '  html.ie6 body { padding-top: 33px ! important;} html body .obbar' + OB.Bar.classSuffix + ' * { line-height: auto ! important; width: auto ! important; font-family: arial, sans-serif ! important; font-size: 11px ! important; font-weight: bold ! important; padding: 0 ! important; outline: none ! important; visibility: visible ! important; background: none ! important; float: none ! important; text-indent: auto ! important;}   html body .obbar' + OB.Bar.classSuffix + ' { position: fixed ! important; top: 0 ! important; bottom: 0 ! important; height: 43px ! important; width: 100% ! important; z-index: 2147483646 ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' { position: absolute ! important;} html body .obbar' + OB.Bar.classSuffix + ' a { text-decoration: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' a:hover { text-decoration: underline ! important;} html body .obbar' + OB.Bar.classSuffix + ' .expand { -webkit-box-shadow: 0 3px 15px rgba(0, 0, 0, 0.8) ! important; -moz-box-shadow: 0 3px 15px rgba(0, 0, 0, 0.8) ! important; display: block ! important; margin: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons { height: 33px ! important; overflow: hidden ! important; margin: 0 ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li { float: left ! important; height: 29px ! important; overflow: hidden ! important; margin: 1px 0 0 0 ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li li { background: none ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li img { vertical-align: middle ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a img { vertical-align: middle ! important; text-decoration: none ! important; border: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a { display: -moz-inline-box ! important; display: inline-block ! important; height: 28px ! important; line-height: 28px ! important; padding: 0 15px ! important; cursor: pointer ! important; font-size: 11px ! important; margin: 2px 0 0 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.right { float: right ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.noborder { background: none ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.facebook, html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.twitter, html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.shortener { width: 18px ! important; background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.png") no-repeat center 5px ! important; background-position: 0 -54px ! important; padding: 0 0 0 15px ! important; text-decoration: none ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.facebook, html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.twitter, html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.shortener { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.twitter { padding: 0 2px 0 2px ! important; background-position: -44px -54px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.shortener { padding: 0 15px 0 0px ! important; background-position: -76px -54px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.menu { padding-left: 25px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.menu { padding-left: 15px ! important; background-position: 0 5px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.menu a { padding-left: 0 ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu * { line-height: auto ! important; width: auto ! important; font-family: arial, sans-serif ! important; font-size: 11px ! important; font-weight: bold ! important; outline: none ! important; visibility: visible ! important; background: none ! important; float: none ! important; text-indent: auto ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu { position: fixed ! important; overflow: hidden ! important; -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6) ! important; -moz-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6) ! important; font-weight: bold ! important; opacity: 0.9 ! important; -moz-opacity: 0.9 ! important; list-style: none ! important; -moz-border-radius-bottomleft: 5px ! important; -moz-border-radius-bottomright: 5px ! important; -webkit-border-bottom-left-radius: 5px ! important; -webkit-border-bottom-right-radius: 5px ! important; z-index: 999 ! important; margin: 0 ! important; padding: 0 ! important; z-index: 2147483647 ! important;} html.ie6 body ul.obbar' + OB.Bar.classSuffix + 'submenu { position: absolute ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li { float: none ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html.ie6 body ul.obbar' + OB.Bar.classSuffix + 'submenu li { margin: 0 ! important; padding: 0 ! important; height: 30px ! important; width: 200px ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu.search li { list-style: none ! important; margin: 0.5em 2em ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu.search li * { font-size: 13px ! important; cursor: pointer ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li a { padding: 1em 3em 1em ! important; list-style: disc ! important; font-size: 11px ! important; margin: 0 ! important; line-height: 11px; ! important; font-weight: bold ! important; font-size: 11px ! important; text-decoration: none ! important;   height: auto ! important; text-indent: 0 ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li:last-child a { -moz-border-radius-bottomleft: 5px ! important; -moz-border-radius-bottomright: 5px ! important; -webkit-border-bottom-left-radius: 5px ! important; -webkit-border-bottom-right-radius: 5px ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li a:hover { text-decoration: underline ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.logoob { text-decoration: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.logoob span { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.png") no-repeat 0 -31px ! important; width: 80px ! important; display: block ! important; opacity: 1 ! important; -moz-opacity: 1 ! important; visibility: visible ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.logoob span { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.top a { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.png") no-repeat 0 -102px ! important; padding-left: 25px ! important;} html.ie6 .obbar' + OB.Bar.classSuffix + ' .buttons li.top a { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.gif") ! important; padding-left: 30px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.silver a { background-position: 0 -124px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.gold a { background-position: 0 -145px ! important;} html.ie6 .obbar' + OB.Bar.classSuffix + ' .buttons li.none a, html body .obbar' + OB.Bar.classSuffix + ' .buttons li.none a { background: none ! important; padding-left: 1em ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.admin { width: 17px ! important; text-decoration: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.close { width: 10px ! important; text-decoration: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.goback { color: gray ! important; padding-right: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.gobackhost { padding-left: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form { padding: 0 0 0 20px ! important; margin: 0 5px ! important; background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.png") no-repeat 0 -77px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li form { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p { border: none ! important; line-height: 28px ! important; position: relative ! important; margin: 0 ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li form p { margin-top: 5px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p * { vertical-align: middle ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p span.input { display: -moz-inline-block ! important; display: inline-block ! important; *display: inline ! important; -moz-border-radius: 4px ! important; -webkit-border-radius: 4px ! important; line-height: 18px ! important; height: 20px ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p input.query { -moz-border-radius: 4px ! important; -webkit-border-radius: 4px ! important; line-height: 18px ! important; height: 18px ! important; width: 150px ! important; padding: 0 20px 0 0 ! important; font-size: 12px ! important; outline: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p input.submit { border: none ! important; background: none ! important; position: absolute ! important; top: 0 ! important; right: 5px ! important; cursor: pointer ! important; height: 28px ! important; line-height: 28px ! important; margin: 0 ! important;} li.rsslink { list-style: none ! important; background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.png") no-repeat 0 -170px ! important; padding-left: 15px ! important;} html.ie6 body li.rsslink { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/../common/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .panel { height: 0;   overflow: hidden ! important;} html body .obbar' + OB.Bar.classSuffix + ' .handler { height: 10px ! important; width: 100% ! important; cursor: pointer ! important; position: relative ! important;} html body .obbar' + OB.Bar.classSuffix + ' .handler span { height: 25px ! important; width: 34px ! important; position: absolute ! important; top: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .handler .left { left: 0 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .handler .right { right: 0 ! important;}   #jforms_annexe_newsletter .jforms-label.full { float: none ! important;} html body  .obbar' + OB.Bar.classSuffix + ' .expand { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") repeat-x 0 0 ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .expand { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat right -340px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.last { background: none ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a { color: white ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu { background: black ! important; color: white ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li { color: #D77608 ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li a, html body ul.obbar' + OB.Bar.classSuffix + 'submenu li label { color: white ! important;} html body ul.obbar' + OB.Bar.classSuffix + 'submenu li a:hover { background: #191919 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li.menu { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat 0 -368px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li.menu { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.menu { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat 0 -372px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.menu { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.admin { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat 0 -407px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.admin { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li a.close { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat 0 -435px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li a.close { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p span.input { border: 1px solid #191919 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p input.query { background: transparent url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") repeat-x 0 -320px ! important; border: 1px solid #464646 ! important; color: #b1b1b1 ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .buttons li form p input.query { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .buttons li form p input.submit { color: #b1b1b1 ! important;} html body .obbar' + OB.Bar.classSuffix + ' .panel { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") repeat-x 0 -40px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .panel { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} html body .obbar' + OB.Bar.classSuffix + ' .handler span { background: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.png") no-repeat 0 -467px ! important;} html.ie6 body .obbar' + OB.Bar.classSuffix + ' .handler span { background-image: url("http://fdata.over-blog.net/99/00/00/01/style/obbar/black/img/sprite.gif") ! important;} '; try { s.appendChild( document.createTextNode( css ) ); } catch (e) {  s.styleSheet.cssText = css; } document.body.appendChild(s);  var bar = document.createElement('div'); bar.className = 'obbar' + OB.Bar.classSuffix; bar.innerHTML = '<div class=\"expand\"> <ul class=\"buttons useless\"> <li class=\"first\"> <a class=\"menu logoob\"><span>&nbsp;</span></a> <ul class=\"submenu useless\"> <li> <a href=\"http://www.over-blog.com/signup\"> Créer un blog </a> </li> <li> <a href=\"http://www.over-blog.com/\"> Aller sur OverBlog </a> </li> <li> <a href=\"http://www.over-blog.com/blogs.html\"> Annuaire des blogs </a> </li> <li> <a href=\"http://www.over-blog.com/signup-oob\"> Ajouter son blog sur OverBlog </a> </li> </ul> </li> <li class=\"magazineLink\"> </li> <li class=\"magazineLinks\"> <a class=\"menu\"> + services __MAGAZINE__ </a> <ul class=\"submenu clearfix\"> </ul> </li> <li class=\"top\"> <a href=\"#\"> </a> </li> <li class=\"related\"> <a href=\"#\" rel=\"nofollow\"> Vous aimerez aussi… </a> </li> <li class=\"noborder\"> <a class=\"menu\">J\'aime ce blog</a> <ul class=\"submenu useless\"> <li class=\"recommand\"> <a href=\"#\" class=\"linkRecommend\" rel=\"dontpop\"> Recommander ce blog </a> </li> <li class=\"profil\"> <a href=\"#\"> Voir le profil du blogueur </a> </li> <li class=\"rss\"> <a href=\"#\"> S\'abonner aux flux RSS </a> </li> <li class=\"newsletter\"> <a href=\"#\"> S\'abonner à la newsletter </a> </li> <li class=\"contact\"> <a href=\"#\"> Contacter le blogueur </a> </li> </ul> </li> <li class=\"noborder\"> <a href=\"http://www.facebook.com/share.php?u=__LINK__\" class=\"facebook\" title=\"Publier sur Facebook\">&nbsp;</a> </li> <li class=\"noborder\"> <a href=\"http://twitter.com/?status=__LINK__\" class=\"twitter\" title=\"Publier sur Twitter\">&nbsp;</a> </li> <li class=\"noborder\"> <a href=\"#\" class=\"shortener\" title=\"Adresse simplifiée\">&nbsp;</a> </li> <li class=\"right last\"> <a class=\"close\">&nbsp;</a> </li> <li class=\"right search\"> <form action=\"http://www.over-blog.com/recherche/\" method=\"get\" accept-charset=\"utf-8\" target=\"_blank\"> <p> <span class=\"input\"> <input type=\"text\" name=\"query\" value=\"\" class=\"query\" placeholder=\"Rechercher\" /> </span> <input type=\"submit\" value=\"ok\" class=\"submit\" /> <input type=\"hidden\" name=\"module\" value=\"portal\" /> <input type=\"hidden\" name=\"action\" value=\"search:userSearch\" /> <input type=\"hidden\" name=\"ref\" value=\"\" /> </p> </form> <ul class=\"submenu dontautoclose search\"> <li> <label> <input type=\"radio\" name=\"searchLocation\" value=\"blog\" checked=\"checked\" /> sur ce blog </label> </li> <li> <label> <input type=\"radio\" name=\"searchLocation\" value=\"site\" /> sur OverBlog </label> </li> </ul> </li> <li class=\"right\"> <a class=\"admin\">&nbsp;</a> <ul class=\"submenu\"> <li> <a href=\"http://admin.over-blog.com/gate?ref_site=1&amp;action=blog:index\"> Administration </a> </li> <li> <a href=\"http://admin.over-blog.com/gate?ref_site=1&amp;action=publicationArticles:editPublication\"> Publier un article </a> </li> <li> <a href=\"http://admin.over-blog.com/gate?ref_site=1&amp;action=comments:index\"> Répondre à mes commentaires </a> </li> <li> <a href=\"http://admin.over-blog.com/gate?ref_site=1&amp;action=statistics:index\"> Consulter mes statistiques </a> </li> <li> <a href=\"http://admin.over-blog.com/gate?ref_site=1&amp;action=documents:index\"> Gérer mes documents </a> </li> </ul> </li> <li class=\"right pool\"> <a href=\"#\"> </a> </li> </ul> </div> <div class=\"handler\"><!--span class=\"left\"></span--><span class=\"right\"></span></div> '; bar.opened = false;  if (YAHOO.env.ua.ie) { if (YAHOO.env.ua.ie < 7) {  YAHOO.util.Dom.addClass( document.getElementsByTagName('html')[0], 'ie6' ); YAHOO.util.Event.on( window, 'scroll', function(e) { YAHOO.util.Dom.setStyle( bar, 'display', 'none' ); YAHOO.util.Dom.setStyle( bar, 'display', 'block' ); YAHOO.util.Dom.setStyle( bar, 'margin-top', (document.documentElement.scrollTop + document.body.scrollTop) + 'px' ); } ); } else if (YAHOO.env.ua.ie < 8) {  YAHOO.util.Dom.addClass( document.body, 'ie7' );   YAHOO.util.Event.on( window, 'load', function(e) { YAHOO.util.Dom.setStyle( document.getElementsByTagName('html')[0], 'display', 'none' ); YAHOO.util.Dom.setStyle( document.getElementsByTagName('html')[0], 'display', 'block' ); } ); setTimeout( function() { YAHOO.util.Dom.setStyle( document.getElementsByTagName('html')[0], 'display', 'none' ); YAHOO.util.Dom.setStyle( document.getElementsByTagName('html')[0], 'display', 'block' ); }, 500 ); } }  if (OB.Bar.nologo == 1) { var logo = YAHOO.util.Selector.query( '.logoob', bar, true ).parentNode; logo.parentNode.removeChild(logo); YAHOO.util.Dom.addClass( bar.getElementsByTagName('li')[0], 'first' ); }  for (var i in a = ['recommand', 'contact', 'profil', 'newsletter', 'related']) { if (typeof a[i] === 'string') { var link = YAHOO.util.Dom.getElementsByClassName( a[i], 'li', bar )[0].getElementsByTagName('a')[0]; link.href = OB.Bar.urls[a[i]]; } }  if (OB.Bar.norltd == 1) { var rltd = YAHOO.util.Selector.query( '.related', bar, true ); rltd.parentNode.removeChild(rltd); YAHOO.util.Dom.addClass( bar.getElementsByTagName('li')[0], 'first' ); } YAHOO.util.Dom.setStyle( bar, 'margin-top', '-100px' );  var links = bar.getElementsByTagName('a'); for (i in links) { if (links[i].rel !== 'dontpop' && links[i].href != '' && links[i].href != '#') { YAHOO.util.Event.on( links[i], 'click', function(e) { YAHOO.util.Event.preventDefault(e); if (!this.href.match( window.location.href.replace('/', '\\\/').replace('?','\\\?').replace('.', '\\\.') )) { window.open(this); } } ); } }  var top = YAHOO.util.Dom.getElementsByClassName( 'top', 'li', bar )[0]; if (OB.Bar.top) { top.getElementsByTagName('a')[0].href = OB.Bar.top.url; top.getElementsByTagName('a')[0].innerHTML = OB.Bar.top.title; if (OB.Bar.top.position < 11) { YAHOO.util.Dom.addClass( top, 'gold' ); } else if (OB.Bar.top.position < 51) { YAHOO.util.Dom.addClass( top, 'silver' ); } } else if (OB.Bar.magazine.name) { top.getElementsByTagName('a')[0].href = OB.Bar.magazine.link; top.getElementsByTagName('a')[0].innerHTML = OB.Bar.magazine.name; YAHOO.util.Dom.addClass( top, 'none' ); } else { top.parentNode.removeChild(top); }  if (window.location.hash == '#fromadmin') { YAHOO.util.Cookie.set( 'mightBeAdmin', 1 ); window.location.hash = ''; } var admin = YAHOO.util.Selector.query( '.admin', bar, true ); if (admin) { if (YAHOO.util.Cookie.get( 'mightBeAdmin' ) != 1) { admin.parentNode.parentNode.removeChild( admin.parentNode ); } }   bar.open = function(slow) { var speed = slow ? 1 : 0.2; this.opened = true;  (new YAHOO.util.Anim( YAHOO.util.Selector.query( '.handler span', this ), { 'opacity': { to: 0 } }, speed, YAHOO.util.Easing.easeOut )).animate();  (new YAHOO.util.Anim( this, { 'margin-top': { to: 0 } }, speed, YAHOO.util.Easing.easeOut )).animate();  (new YAHOO.util.Anim( document.getElementsByTagName('html')[0], { 'margin-top': { to: parseInt( YAHOO.util.Dom.getStyle( this, 'height' ) ) - 10 } }, speed, YAHOO.util.Easing.easeOut )).animate();  YAHOO.util.Cookie.remove( 'hideobbar' ); };  bar.close = function(misc) { var speed = misc ? 1 : 0.2; this.opened = false;  (new YAHOO.util.Anim( YAHOO.util.Selector.query( '.handler span', this ), { 'opacity': { to: 1 } }, speed, YAHOO.util.Easing.easeOut )).animate();  var submenus = YAHOO.util.Selector.query('.obbar' + OB.Bar.classSuffix + 'submenu'); for (var i in submenus) { try { submenus[i].close(misc);  (new YAHOO.util.Anim( submenus[i], { 'top': { to: 0 } }, speed, YAHOO.util.Easing.easeOut )).animate(); } catch (e) {} }  var expands = YAHOO.util.Selector.query( '.panel', bar ); for (i in expands) { try { expands[i].close(misc); } catch (e) {} }  (new YAHOO.util.Anim( this, { 'margin-top': { to: 10 - parseInt( YAHOO.util.Dom.getStyle( this, 'height' ) ) } }, speed, YAHOO.util.Easing.easeOut )).animate();  (new YAHOO.util.Anim( document.getElementsByTagName('html')[0], { 'margin-top': { to: 0 } }, speed, YAHOO.util.Easing.easeOut )).animate();  YAHOO.util.Cookie.set( 'hideobbar', '1', { expires: new Date((new Date()).getFullYear(), (new Date()).getMonth(), (new Date()).getDate() + 15) } ); };  var magLink = YAHOO.util.Selector.query( '.magazineLink', bar, true ); var magLinks = YAHOO.util.Selector.query( '.magazineLinks', bar, true ); if (OB.Bar.magazine.links && OB.Bar.magazine.links.length > 1) { var title = magLinks.getElementsByTagName('a')[0]; title.innerHTML = title.innerHTML.replace( /__MAGAZINE__/, (OB.Bar.magazine.name ? OB.Bar.magazine.name.toLowerCase() : '') ); for (var i = 0; OB.Bar.magazine.links[i]; i++) { var newL = document.createElement('li'); newL.a = document.createElement('a'); newL.a.innerHTML = OB.Bar.magazine.links[i].label; newL.a.href = OB.Bar.magazine.links[i].href; newL.appendChild(newL.a); magLinks.getElementsByTagName('ul')[0].appendChild( newL ); } var winner = magLinks.getElementsByTagName('li')[ Math.min( parseInt( Math.random() * magLinks.getElementsByTagName('li').length ), magLinks.getElementsByTagName('li').length ) ]; magLink.appendChild( winner.getElementsByTagName('a')[0] ); winner.parentNode.removeChild(winner); } else { magLink.parentNode.removeChild(magLink); magLinks.parentNode.removeChild(magLinks); }  YAHOO.util.Dom.batch( YAHOO.util.Selector.query( 'input[name=searchLocation]', bar ), function(el) { el.parentForm = el.parentNode.parentNode.parentNode.parentNode.getElementsByTagName('form')[0]; el._onclick = function() { this.parentForm.attributes.action.value = OB.Bar.search[this.value].link; this.parentForm.action.value = OB.Bar.search[this.value].action; this.parentForm.ref.value = OB.Bar.search[this.value].ref; }; YAHOO.util.Event.on( el, 'click', function() { this._onclick(); this.parentForm.query.focus(); } ); if (el.checked) { el._onclick(); } } );  var pool = YAHOO.util.Selector.query( '.pool', bar, true ); if (OB.Bar.pool) { var a = pool.getElementsByTagName('a')[0]; a.className = 'logo'; if (OB.Bar.pool.links) {  var ul = document.createElement('ul'); ul.className = 'submenu'; for (i = 0; OB.Bar.pool.links[i]; i++) { var li = document.createElement('li'); li.a = document.createElement('a'); li.a.href = OB.Bar.pool.links[i].href; li.a.innerHTML = OB.Bar.pool.links[i].label; li.appendChild(li.a); ul.appendChild(li); } a.parentNode.appendChild(ul); YAHOO.util.Dom.addClass( a.parentNode, 'menu' ); } else {  a.href = OB.Bar.pool.link; } var img = new Image(); img.src = OB.Bar.pool.logo; YAHOO.util.Event.on( img, 'load', function(e, link) { s = document.createElement('style'); s.type = 'text/css'; css = '.obbar' + OB.Bar.classSuffix + ' li.pool a.logo { background: url(' + OB.Bar.pool.logo + ') no-repeat center center ! important; width: ' + this.width + 'px ! important' + '}'; try { s.appendChild( document.createTextNode( css ) ); } catch (e) {  s.styleSheet.cssText = css; } document.body.appendChild(s); }, a ); } else { pool.parentNode.removeChild(pool); }  var rss = YAHOO.util.Selector.query( '.rss a', bar, true ); if (rss) { YAHOO.util.Event.on( rss, 'click', function(e) { YAHOO.util.Event.preventDefault(e); var dial = new OB.Diablog(); dial.setTitle( 'S\'abonner aux flux RSS' ); var ctn = document.createElement('ul'); if (OB.Bar.rss) { for (var i in OB.Bar.rss) { if (OB.Bar.rss[i].label) { var li = document.createElement('li'); li.a = document.createElement('a'); li.a.href = OB.Bar.rss[i].link; li.className = 'rsslink'; YAHOO.util.Event.on( li.a, 'click', function(e) { YAHOO.util.Event.preventDefault(e); window.open(this); } ); li.a.appendChild( document.createTextNode( OB.Bar.rss[i].label ) ); li.span = document.createElement('span'); li.span.innerHTML = '<a href="http://fusion.google.com/add?source=atgs&feedurl=' + OB.Bar.rss[i].link + '" onclick="return !window.open(this);"><img src="http://gmodules.com/ig/images/plus_google.gif" border="0" alt="Add to Google"></a>'; li.appendChild(li.a); li.appendChild(document.createElement('br')); li.appendChild(li.span); ctn.appendChild(li); } } } dial.setContent( ctn ); } ); }      var newsletter = YAHOO.util.Selector.query( '.newsletter a', bar, true ); if (newsletter) { newsletter._href = newsletter.href; newsletter.href = '#'; YAHOO.util.Event.on( newsletter, 'click', function(e) { YAHOO.util.Event.preventDefault(e); var dial = new OB.Diablog( { width: 600 } ); dial.setTitle('');  document.write = function(){return false}; dial.setContentFromAjax( this._href, function() { var f = YAHOO.util.Selector.query( '.content form.ob_form', this.getEl(), true ); f.removeChild( YAHOO.util.Selector.query( 'fieldset.buttons', f, true ) ); var legend = YAHOO.util.Selector.query( 'fieldset legend', f, true ); this.setTitle( legend.innerHTML ); legend.innerHTML = ''; this.flushContent(); this.setContent(f); f.dialog = this; f._submit = function() { var ok = true; YAHOO.util.Dom.removeClass( this.email, 'error' ); if (!this.email.value.match( /^((([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+(\.([a-z]|[0-9]|!|#|$|%|&|'|\*|\+|\-|\/|=|\?|\^|_|`|\{|\||\}|~)+)*)@((((([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.))*([a-z]|[0-9])([a-z]|[0-9]|\-){0,61}([a-z]|[0-9])\.)[\w]{2,4}|(((([0-9]){1,3}\.){3}([0-9]){1,3}))|(\[((([0-9]){1,3}\.){3}([0-9]){1,3})\])))$/ )) { YAHOO.util.Dom.addClass( this.email, 'error' ); ok = false; } if (ok) { YAHOO.util.Connect.setForm(this); YAHOO.util.Connect.asyncRequest( 'get', document.forms[1].attributes.action.value + '&text=1', { success: function(o) { eval('var output = ' + o.responseText); if (output.errors) { this.dialog.displayMessage( 'Une erreur s\'est produite. Veuillez rééssayer plus tard.', { type: OB.Diablog.TYPE_ERROR } ); } else { this.dialog.close( 'Votre inscription a bien été prise en compte. Un mail vient de vous être envoyé afin de la confirmer.', { type: OB.Diablog.TYPE_OK } ); } }, scope: this } ); } }; YAHOO.util.Event.on( f, 'submit', function(e) { YAHOO.util.Event.preventDefault(e); this._submit(); } ); } ); dial.addButton( 'OK', { className: 'orange', click: function() { var f = this.dialog.getEl().getElementsByTagName('form')[0]; f._submit(); } } ) } ); }  var facebook = YAHOO.util.Selector.query( '.facebook', bar, true ); if (facebook) { YAHOO.util.Event.purgeElement( facebook ); YAHOO.util.Event.on( facebook, 'click', function(e) { YAHOO.util.Event.preventDefault(e); var newL = this.href.replace( '__LINK__', encodeURIComponent( window.location ) ); if (!window.open( newL )) { window.location = newL; } } ); }  var twitter = YAHOO.util.Selector.query( '.twitter', bar, true ); if (twitter) { YAHOO.util.Event.purgeElement( twitter ); YAHOO.util.Event.on( twitter, 'click', function(e) { YAHOO.util.Event.preventDefault(e); var popup = window.open( '', 'twitter' ); OB.Utils.Shortener.get( window.location.href, function(e, shorten, popup) { var newL = this.href.replace( '__LINK__', document.title.substr(0,100) + ' : ' + shorten ); popup.location = newL; }, popup, this ); } ); }  var shortener = YAHOO.util.Selector.query( '.shortener', bar, true ); if (shortener) { YAHOO.util.Event.purgeElement( shortener ); YAHOO.util.Event.on( shortener, 'click', function(e) { YAHOO.util.Event.preventDefault(e); OB.Utils.Shortener.get( window.location.href, function(e, shrtL) { var dial = new OB.Diablog(); dial.setTitle('Adresse simplifiée de la page'); dial.setContent( '<p><input type="text" value="' + shrtL + '" onfocus="this.select();" style="width: 100%; font-size: 2em;" /></p>' ); YAHOO.util.Selector.query( 'input', dial.getEl(), true ).focus(); }, this, true ); } ); }  YAHOO.util.Dom.batch( YAHOO.util.Selector.query( '.panel', bar ), function(el) { var className = el.className.match(/([a-zA-Z0-9]+)Panel/); if (!className) { return; } var button = YAHOO.util.Selector.query( '.' + className[1], bar, true ); if (!button) { return false; } button.panel = el; button.panel.open = function(misc) { this.style.overflow = 'visible'; (new YAHOO.util.Anim( this, { height: { to: this.originalHeight } }, misc ? 2 : 0.4, YAHOO.util.Easing.elasticOut )).animate(); YAHOO.util.Dom.addClass( this, 'selected' ); }; button.panel.close = function(misc) { (new YAHOO.util.Anim( this, { height: { to: 0 } }, misc ? 2 : 0.4, YAHOO.util.Easing.elasticOut )).animate(); YAHOO.util.Dom.removeClass( this, 'selected' ); }; YAHOO.util.Event.on( button, 'click', function(e, bar) { console.debug(this); if (!this.panel.originalHeight) { this.panel.originalHeight = YAHOO.util.Region.getRegion( YAHOO.util.Dom.getFirstChild( this.panel ) ).height; } if (parseInt(this.panel.style.height) === 0 || isNaN(parseInt(this.panel.style.height))) {  this.panel.open(e.shiftKey); } else {  this.panel.close(e.shiftKey); } }, this ); } );  YAHOO.util.Event.on( YAHOO.util.Dom.getElementsByClassName( 'close', 'a', bar )[0], 'click', function(e, bar) { bar.close(e.shiftKey); }, bar );  YAHOO.util.Event.on( YAHOO.util.Dom.getElementsByClassName( 'handler', 'div', bar )[0], 'click', function(e, bar) { if (!bar.opened) { bar.open(e.shiftKey); } }, bar );  YAHOO.util.Event.on( YAHOO.util.Dom.getElementsByClassName( 'query', 'input', bar )[0], 'keyup', function(e) { if (e.keyCode === e.DOM_VK_ESCAPE || e.keyCode === 27) { this.value = ''; } }, bar );  if (typeof _oobreferrerkw !== 'undefined' && _oobreferrerkw) { YAHOO.util.Dom.getElementsByClassName( 'query', 'input', bar )[0].value = decodeURIComponent(_oobreferrerkw).replace(/\+/gim, ' ');  var radio = YAHOO.util.Selector.query( 'input[name=searchLocation]', bar )[1]; radio.checked = 'checked'; radio._onclick(); }  YAHOO.util.Event.on( bar.getElementsByTagName( 'form' )[0], 'click', function(e) { this.getElementsByTagName('input')[0].focus(); } );  YAHOO.util.Dom.batch( YAHOO.util.Selector.query( '.submenu', bar ), function(el) { YAHOO.util.Dom.removeClass( el, 'submenu' ); YAHOO.util.Dom.addClass( el, 'obbar' + OB.Bar.classSuffix + 'submenu' ); el.opened = false; el.parentNode.submenu = el; el.pn = el.parentNode; document.body.appendChild(el); el._height = YAHOO.util.Region.getRegion(el).height; el.style.bottom = 0; el.style.height = 0;  if (YAHOO.env.ua.ie) { YAHOO.util.Dom.setStyle( el, 'opacity', '0.9' ); } el.open = function(slow) { var speed = slow ? 1 : 0.4;  var pnReg = YAHOO.util.Region.getRegion( this.pn ); YAHOO.util.Dom.setStyle( this, 'min-width', pnReg.width + 'px' );  var submenus = YAHOO.util.Selector.query('ul.obbar' + OB.Bar.classSuffix + 'submenu'); for (var i in submenus) { if (submenus[i] != this) { try { submenus[i].close(); } catch (e) {} } } this.opened = true; this.style.display = 'block'; YAHOO.util.Dom.setStyle( this, 'top', (YAHOO.util.Region.getRegion( this.pn.parentNode ).height - 1 + (YAHOO.env.ua.ie == 6 ? document.documentElement.scrollTop+document.body.scrollTop : 0) ) +'px' ); YAHOO.util.Dom.setStyle( this, 'left', YAHOO.util.Region.getRegion( this.pn ).left + 'px' ); (new YAHOO.util.Anim( this, { height: { to: this._height } }, speed, YAHOO.util.Easing.elasticOut )).animate(); }; el.close = function(slow) { var speed = slow ? 1 : 0.1; this.opened = false; var a = new YAHOO.util.Anim( this, { height: { to: 0 } }, speed, YAHOO.util.Easing.easeOut ); a.onComplete.subscribe( function() { this.getEl().style.display = 'none'; } ); a.animate(); }; YAHOO.util.Event.on( el.pn, 'click', function(e, submenu) { var t; if (e.target) t = e.target; else if (e.srcElement) t = e.srcElement; if (t && t.nodeName.toLowerCase() !== 'input') { YAHOO.util.Event.preventDefault(e); } if (submenu.opened) { if (t && t.nodeName.toLowerCase() !== 'input') { submenu.close(e.shiftKey); } } else { submenu.open(e.shiftKey); } }, el ); if (!YAHOO.util.Dom.hasClass( el, 'dontautoclose' )) { YAHOO.util.Event.on( el, 'click', function(e, submenu) { submenu.close(e.shiftKey); }, el ); } YAHOO.util.Event.on( window, 'click', function(e, submenus) { if (YAHOO.util.Dom.hasClass( e.target, 'obbar' + OB.Bar.classSuffix + 'submenu' ) || YAHOO.util.Dom.hasClass( e.target, 'obbar' + OB.Bar.classSuffix ) || YAHOO.util.Dom.getAncestorBy( e.target, function(el) { return (YAHOO.util.Dom.hasClass(el, 'obbar' + OB.Bar.classSuffix + 'submenu') || YAHOO.util.Dom.hasClass(el, 'obbar' + OB.Bar.classSuffix)); } )) { return; } for (var i in submenus) { try { submenus[i].close(e.shiftKey); } catch (e) {} } }, YAHOO.util.Selector.query('.obbar' + OB.Bar.classSuffix + 'submenu') ); el.close(); } );  YAHOO.util.Dom.batch( YAHOO.util.Selector.query( '.panel', bar ), function(el) { var className = el.className.match(/([a-zA-Z0-9]+)Panel/); if (!className) { return; } var button = YAHOO.util.Selector.query( 'a.' + className[1], bar, true ); if (!button) { return; } button.panel = el; button.panel.open = function(misc) { this.style.overflow = 'visible'; (new YAHOO.util.Anim( this, { height: { to: this.originalHeight } }, misc ? 2 : 0.4, YAHOO.util.Easing.elasticOut )).animate(); YAHOO.util.Dom.addClass( this, 'selected' ); }; button.panel.close = function(misc) { (new YAHOO.util.Anim( this, { height: { to: 0 } }, misc ? 2 : 0.4, YAHOO.util.Easing.elasticOut )).animate(); YAHOO.util.Dom.removeClass( this, 'selected' ); }; YAHOO.util.Event.on( button, 'click', function(e, bar) { if (!this.panel.originalHeight) { this.panel.originalHeight = YAHOO.util.Region.getRegion( YAHOO.util.Dom.getFirstChild( this.panel ) ).height; } if (parseInt(this.panel.style.height) === 0 || isNaN(parseInt(this.panel.style.height))) {  this.panel.open(e.shiftKey); } else {  this.panel.close(e.shiftKey); } }, this ); } ); document.body.appendChild(bar); YAHOO.util.Dom.setStyle( bar, 'margin-top', (10 - parseInt( YAHOO.util.Dom.getStyle( bar, 'height' ) )) + 'px' );  if (YAHOO.util.Cookie.get( 'hideobbar' ) != 1) { bar.open(); } bar.id = ''; } ); 

