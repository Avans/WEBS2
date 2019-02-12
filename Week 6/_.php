<?php
bindtextdomain('main', __DIR__  .  DIRECTORY_SEPARATOR . 'locales');
bind_textdomain_codeset('main', 'UTF-8');
textdomain('main');
print _($_SERVER['argv'][1]);
