<?php
namespace WEBS2;

require __DIR__ . DIRECTORY_SEPARATOR . 'i18n_setup.php';

echo '<h1>' . setlocale(5, '0') . '</h1>';

echo _('Welcome');
echo '<br>' . strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978));