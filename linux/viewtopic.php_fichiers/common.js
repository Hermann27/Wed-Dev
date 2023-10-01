/*
 * This sets a cookie by JavaScript
 *
 * @see http://www.webreference.com/js/column8/functions.html
 */
function setCookie(name, value, expires, path, domain, secure) {
  var curCookie = name + "=" + escape(value) +
      ((expires) ? "; expires=" + expires.toGMTString() : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
  document.cookie = curCookie;
}

/*
 * This reads a cookie by JavaScript
 *
 * @see http://www.webreference.com/js/column8/functions.html
 */
function getCookie(name) {
  var dc = document.cookie;
  var prefix = name + "=";
  var begin = dc.indexOf("; " + prefix);
  if (begin == -1) {
    begin = dc.indexOf(prefix);
    if (begin != 0) return null;
  } else
    begin += 2;
  var end = document.cookie.indexOf(";", begin);
  if (end == -1)
    end = dc.length;
  return unescape(dc.substring(begin + prefix.length, end));
}

/*
 * This is needed for the cookie functions
 *
 * @see http://www.webreference.com/js/column8/functions.html
 */
function fixDate(date) {
  var base = new Date(0);
  var skew = base.getTime();
    date.setTime(date.getTime() - skew);
}
