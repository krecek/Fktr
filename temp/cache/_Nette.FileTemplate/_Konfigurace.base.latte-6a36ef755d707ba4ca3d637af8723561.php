<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.31649800 1409665822";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"D:\xampp\htdocs\Faktury2\app\templates\Konfigurace\base.latte";i:2;i:1409664435;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Konfigurace\base.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'b58xomjior')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block ikona
//
if (!function_exists($_l->blocks['ikona'][] = '_lb918d2a61aa_ikona')) { function _lb918d2a61aa_ikona($_l, $_args) { extract($_args)
?>content_edit<?php
}}

//
// block sekce
//
if (!function_exists($_l->blocks['sekce'][] = '_lb188c6a27d2_sekce')) { function _lb188c6a27d2_sekce($_l, $_args) { extract($_args)
?>Konfigurace<?php
}}

//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lb9d696ce715_podsekce')) { function _lb9d696ce715_podsekce($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '../@layout.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['ikona']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['sekce']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['podsekce']), $_l, get_defined_vars())  ?>

	