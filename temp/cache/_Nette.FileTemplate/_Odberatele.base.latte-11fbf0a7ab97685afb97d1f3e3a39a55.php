<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.41454300 1409664448";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"D:\xampp\htdocs\Faktury2\app\templates\Odberatele\base.latte";i:2;i:1409664378;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Odberatele\base.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ei3lvdz1ui')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block ikona
//
if (!function_exists($_l->blocks['ikona'][] = '_lb21006cafe7_ikona')) { function _lb21006cafe7_ikona($_l, $_args) { extract($_args)
?>content_user<?php
}}

//
// block sekce
//
if (!function_exists($_l->blocks['sekce'][] = '_lbf9667e85b5_sekce')) { function _lbf9667e85b5_sekce($_l, $_args) { extract($_args)
?>Odběratelé<?php
}}

//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lb3346f70236_podsekce')) { function _lb3346f70236_podsekce($_l, $_args) { extract($_args)
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

	