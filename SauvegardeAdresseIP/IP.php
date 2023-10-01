<?php



header('Content-Type: text/html; charset=ISO-8859-1');//fonction définnissant le charset
header('X-UA-Compatible: IE=edge');//fonction supprimant le mode compatibilité d'internet explorer 10
setcookie('traceur', 'espion', (time() + 43200));//fonction cookie permettant de ne sauvegarde que une seul fois l'adresse pendant une ppériode définie
function get_ip()//fonction détectant de la meilleur façon possible la vraie adresse ip pour autant que le proxy soit transparent
{
    global $REMOTE_ADDR;
    global $HTTP_X_FORWARDED_FOR, $HTTP_X_FORWARDED, $HTTP_FORWARDED_FOR, $HTTP_FORWARDED;
    global $HTTP_VIA, $HTTP_X_COMING_FROM, $HTTP_COMING_FROM;
    if (empty($REMOTE_ADDR) && PMA_getenv('REMOTE_ADDR')) {
        $REMOTE_ADDR = PMA_getenv('REMOTE_ADDR');
    }
    if (empty($HTTP_X_FORWARDED_FOR) && PMA_getenv('HTTP_X_FORWARDED_FOR')) {
        $HTTP_X_FORWARDED_FOR = PMA_getenv('HTTP_X_FORWARDED_FOR');
    }
    if (empty($HTTP_X_FORWARDED) && PMA_getenv('HTTP_X_FORWARDED')) {
        $HTTP_X_FORWARDED = PMA_getenv('HTTP_X_FORWARDED');
    }
    if (empty($HTTP_FORWARDED_FOR) && PMA_getenv('HTTP_FORWARDED_FOR')) {
        $HTTP_FORWARDED_FOR = PMA_getenv('HTTP_FORWARDED_FOR');
    }
    if (empty($HTTP_FORWARDED) && PMA_getenv('HTTP_FORWARDED')) {
        $HTTP_FORWARDED = PMA_getenv('HTTP_FORWARDED');
    }
    if (empty($HTTP_VIA) && PMA_getenv('HTTP_VIA')) {
        $HTTP_VIA = PMA_getenv('HTTP_VIA');
    }
    if (empty($HTTP_X_COMING_FROM) && PMA_getenv('HTTP_X_COMING_FROM')) {
        $HTTP_X_COMING_FROM = PMA_getenv('HTTP_X_COMING_FROM');
    }
    if (empty($HTTP_COMING_FROM) && PMA_getenv('HTTP_COMING_FROM')) {
        $HTTP_COMING_FROM = PMA_getenv('HTTP_COMING_FROM');
    }
    if (!empty($REMOTE_ADDR)) {
        $direct_ip = $REMOTE_ADDR;
    }
    $proxy_ip     = '';
    if (!empty($HTTP_X_FORWARDED_FOR)) {
        $proxy_ip = $HTTP_X_FORWARDED_FOR;
    } elseif (!empty($HTTP_X_FORWARDED)) {
        $proxy_ip = $HTTP_X_FORWARDED;
    } elseif (!empty($HTTP_FORWARDED_FOR)) {
        $proxy_ip = $HTTP_FORWARDED_FOR;
    } elseif (!empty($HTTP_FORWARDED)) {
        $proxy_ip = $HTTP_FORWARDED;
    } elseif (!empty($HTTP_VIA)) {
        $proxy_ip = $HTTP_VIA;
    } elseif (!empty($HTTP_X_COMING_FROM)) {
        $proxy_ip = $HTTP_X_COMING_FROM;
    } elseif (!empty($HTTP_COMING_FROM)) {
        $proxy_ip = $HTTP_COMING_FROM;
    }
    if (empty($proxy_ip)) {
        return $direct_ip;
    } else {
        $is_ip = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxy_ip, $regs);
        if ($is_ip && (count($regs) > 0)) {
            return $regs[0];
        } else {
          return FALSE;
        }
    } 
}
function PMA_getenv($var_name) {
    if (isset($_SERVER[$var_name])) {
        return $_SERVER[$var_name];
    } elseif (isset($_ENV[$var_name])) {
        return $_ENV[$var_name];
    } elseif (getenv($var_name)) {
        return getenv($var_name);
    } elseif (function_exists('apache_getenv')
     && apache_getenv($var_name, true)) {
        return apache_getenv($var_name, true);
    }

    return '';
}
$ip = get_ip();//fonction ip client
$fournisseur = gethostbyaddr($_SERVER['REMOTE_ADDR']);//fonction détectant fournisseur d'accès
$calendrier = date ("d-m-y");//fonction date calendrier
$horaire = date ("H:i:s");//fonction horaire 
$langage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];//fonction langage client
$port_client = $_SERVER['REMOTE_PORT'];//fonction port de connection client
$ip_client = get_ip();//fonction ip client
$connection = $_SERVER['HTTP_CONNECTION'];//fonction détectant le type de connection
$protocol = $_SERVER['SERVER_PROTOCOL'];//fonction détectant le protocol
$agent = $_SERVER['HTTP_USER_AGENT'];//fonction détectant l'user agent
$provenance = $_SERVER['HTTP_REFERER'];//fonction détectant la provenance du visiteur
$v6 = preg_match("/^[0-9a-f]{1,4}:([0-9a-f]{0,4}:){1,6}[0-9a-f]{1,4}$/", $ip);//fonction permettant de filtré les adresses ipv6
$v4 = preg_match("/^([0-9]{1,3}\.){3}[0-9]{1,3}$/", $ip);//fonction permettant de filtré les adresses ipv4
if ( $v6 != 0 )
$format = "adresse IP_v6";
elseif ( $v4 != 0 )
$format = "adresse IP_v4";
else
$format = "non identifier";

function getOS( $ua = '' )//fonction détectant le système d'exploitation
{
if(!$ua) $ua = $_SERVER['HTTP_USER_AGENT'];
$os = 'Système d\'exploitation non detecte';
$os_arr = Array('/Windows NT 6.2/'       => 'windows 8',
                '/Windows NT 6.1/'       => 'Windows Seven',
                '/Windows NT 6.0/'       => 'Windows Vista',
                '/Windows NT 5.2/'       => 'Windows Server 2003',
                '/Windows NT 5.1/'       => 'Windows XP',
                '/Windows NT 5.0/'       => 'Windows 2000',
                '/Windows NT/'           => 'Windows NT',
                '/Windows CE/'           => 'Windows Mobile',
                '/Win 9x 4.90/'          => 'Windows Millenium',
                '/Windows 98/'           => 'Windows 98',
                '/Windows 95/'           => 'Windows 95',
                '/Win95/'                => 'Windows 95',
                '/Ubuntu/'               => 'Linux Ubuntu',
                '/Fedora/'               => 'Linux Fedora',
                '/Linux/'                => 'Linux',
                '/Unix/'                 => 'Unix',
                '/Macintosh/'            => 'Mac',
                '/Mac OS X/'             => 'Mac OS X',
                '/FreeBSD/'              => 'FreeBSD',
                '/Unix/'                 => 'Unix',
                '/Playstation portable/' => 'PSP',
                '/OpenSolaris/'          => 'SunOS',
                '/SunOS/'                => 'SunOS',
                '/Nintendo Wii/'         => 'Nintendo Wii',
                '/Mac/'                  => 'Mac',
				'/AIX/'                  => 'AIX',
				'/IRIX/'                 => 'IRIX',
				'/BEOS/'                 => 'Beos',
				'/Android/'              => 'Android',
				'/BlackBerry/'           => 'Blackberry'
                );
$ua = strtolower($ua);
foreach( $os_arr as $k => $v )
{
if(preg_match(strtolower($k), $ua))
{
$os = $v;
break;
}
}
return $os;
}
$systeme = getOS( $_SERVER['HTTP_USER_AGENT'] );

function generer_num_ip($addr_ip)//transformation adresse ip en numéro ip
{
$decomposition = preg_split( "/[.]+/", $addr_ip);
$numip = (double) (16777216*$decomposition[0] + 65536*$decomposition[1] + 256*$decomposition[2] + $decomposition[3]);
return( $numip );
}
function process_csv($file, $ipnum)
{
$handle = fopen($file, "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
{
if( ($ipnum >= $data[2]) &&
($ipnum <= $data[3]))
{
break;
}
}
fclose($handle);
return $data[5];
}
$ipnum = generer_num_ip($ip);
$country = process_csv ('GeoIPCountryWhois.csv', $ipnum);//geoipcoutrywhois, dossier csv contenant la liste des pays fiable à 90%
$pays = $country;

// formattage de la page
$save = "";
$save = ('<div class="gauche">'.'heure de visite :&nbsp;'.$horaire.'<br />'.'date de visite :&nbsp;'.$calendrier.'<br />'.'langue du visiteur :&nbsp;'.$langage.'<br />'.'port pc client :&nbsp;'.$port_client.'<br />'.'adresse ip client :&nbsp;'.$ip_client.'<br />'.'type d\'adresse :&nbsp;'.$format.'<br />'.'fournisseur client :&nbsp;'.$fournisseur.'<br />'.'connection client :&nbsp;'.$connection.'<br />'.'protocol client :&nbsp;'.$protocol.'<br />'.'système d\'exploitation :&nbsp;'.$systeme.'<br />'.'user-agent :&nbsp;'.$agent.'<br />'.'provenance :&nbsp;'.$provenance.'<br />'.'pays :&nbsp;'.$pays.'<hr style="color:#ff0000;background-color:#ff0000;border-color:#ff0000;width:80%;size:2px">'.'</div>'."\n");
if($_COOKIE['traceur'])
{
}
elseif (preg_match("/msnbot/i", $fournisseur))//exclusion bots msn
{
return false;
}
elseif (preg_match("/crawl/i", $fournisseur))//exclusion bots crawl google
{
return false;
}
elseif (preg_match("/phx.gbl/i", $fournisseur))//exclusion bots phx
{
return false;
}
elseif (preg_match("/zvelo/i", $fournisseur))//exclusion bots zvelo
{
return false;
}
elseif($agent == 'Aboundex/0.2 (http://www.aboundex.com/crawler/)')//exclusion bots aboundex
{
return false;
}
elseif($agent == 'Mozilla/5.0 (compatible; OpenindexSpider; +http://www.openindex.io/en/webmasters/spider.html)')//exclusion bots open index
{
return false;
}
elseif($agent == 'Mozilla/5.0 (compatible; Seznam screenshot-generator 2.0; +http://fulltext.sblog.cz/screenshot/)')//exclusion bots seznam
{
return false;
}
elseif($agent == 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)')//exclusion bots google
{
return false;
}
elseif($agent == ' Mozilla/5.0 (compatible; Yahoo! Slurp/3.0; http://help.yahoo.com/help/us/ysearch/slurp) NOT Firefox/3.5')//exclusion bots yahoo
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2; SLCC1; .NET CLR 1.1.4322; .NET CLR 2.0.40607; .NET CLR 3.0.30729; .NET CLR 3.5.30707)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2; SV1; .NET CLR 1.1.4325; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SLCC1; .NET CLR 1.1.4325; .NET CLR 2.0.40607; .NET CLR 3.0.04506.648)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.40607; .NET CLR 3.0.04506.648)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2; SLCC1; .NET CLR 1.1.4322; .NET CLR 2.0.40607; .NET CLR 3.0.30729)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SLCC1; .NET CLR 1.1.4325; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3.5.30729)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)')//exclusion bots bing
{
return false;
}
elseif($agent == 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534+ (KHTML, like Gecko) BingPreview/1.0b')//exclusion bots msn
{
return false;
}
elseif($agent == 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)')//exclusion bots msn
{
return false;
}
elseif($agent == 'Mozilla/5.0 (Windows; U; Windows NT 5.1; fr; rv:1.8.1) VoilaBot BETA 1.2 (support.voilabot@orange-ftgroup.com)')//exclusion bots voila
{
return false;
}
elseif($agent == 'DoCoMo/2.0 N905i(c100;TB;W24H16) (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)')//exclusion bots google mobile
{
return false;
}
elseif($agent == 'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)')//exclusion bots google mobile
{
return false;
}
else
{
// partie enregistrement de la page
$fp = fopen('ip.html',a);
fwrite($fp,$save);
fclose($fp);
}


?>