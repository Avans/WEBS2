<?php
/**
 * Simple function retrieve systems configured timezone
 * @return string
 */
function system_timezone() {
    if (stripos(php_uname('s'), 'windows') !== false) {
        return exec('tzutil /g');
    }
    return exec('date +%Z');
}

ini_set('date.timezone', 'Europe/Amsterdam');
echo 'System timezone: ' . system_timezone();
echo '<br>PHP timezone: ' . ini_get('date.timezone');
$requestedOn = DateTimeImmutable::createFromFormat('U', $_SERVER['REQUEST_TIME']);
echo '<br>Server request time ' . $requestedOn->format(DateTime::RFC850);
if (array_key_exists('TZ', $_COOKIE)) {
    $offset = ($_COOKIE['TZ'] < 0 ? '-' : '+') . str_pad((int)abs($_COOKIE['TZ']/60), 2, '0', STR_PAD_LEFT) . str_pad((int)abs($_COOKIE['TZ']%60), 2, '0', STR_PAD_LEFT);
    echo '<br>Client request time: ' . $requestedOn->setTimezone(new DateTimeZone($offset))->format(DateTime::RFC850);
} else {
    echo '<br>Please refresh your browser';
    ?><script type="text/javascript">document.cookie = 'TZ=' + (new Date()).getTimezoneOffset();</script><?php
}