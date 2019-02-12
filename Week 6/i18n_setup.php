<?php
namespace WEBS2;

/**
 * Hack method for Windows systems, LANG environment variable is ignored during the remainder of this script.
 * In subprocesses it actually DOES work also calling the script from the commandline works.
 * @param $str
 * @return string
 */
function _($str) {
    if (stripos(php_uname('s'), 'windows') !== false) {
        return exec('php _.php ' . escapeshellarg($str));
    }
    return \_($str);
}

$locales = ['nl' => 'nl_NL.UTF8', 'en' => 'en_US.UTF8'];

$negotiatedLocale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$lang = \Locale::lookup(array_keys($locales), $negotiatedLocale, true, 'nl');
if ($lang === '') {
    trigger_error('Can not lookup ' . $negotiatedLocale . ' in array ' . join(',', $locales), E_USER_WARNING);
}
$locale = $locales[$lang];
if (defined('LC_MESSAGES')) { // linux
    setlocale(LC_ALL, $locale);
} else { // windows
    putenv("LC_ALL=$locale");
    putenv("LANG=$locale");
    setlocale(LC_ALL, $locale);
}

// this will make Gettext look for ../locales/<lang>/LC_MESSAGES/main.mo
bindtextdomain('main', __DIR__  .  DIRECTORY_SEPARATOR . 'locales');

// indicates in what encoding the file should be read
bind_textdomain_codeset('main', 'UTF-8');

// here we indicate the default domain the gettext() calls will respond to
textdomain('main');
