<?php

$text_domain = 'es_ES';
$lang = 'es_ES';   
putenv('LC_ALL='.$lang);
setlocale(LC_ALL, $lang);
bindtextdomain($text_domain, './locale' );
bind_textdomain_codeset($text_domain, 'UTF-8');
textdomain($text_domain);
echo _("Hello World");

?>