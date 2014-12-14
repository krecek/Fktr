<?php //netteCache[01]000386a:2:{s:4:"time";s:21:"0.50230700 1409668312";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:64:"D:\xampp\htdocs\Faktury2\app\templates\Konfigurace\default.latte";i:2;i:1409668310;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Konfigurace\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '3hv8l2ym90')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lbf8e35bed8e_podsekce')) { function _lbf8e35bed8e_podsekce($_l, $_args) { extract($_args)
?>Přehled nastavení<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb2169f50d2e_content')) { function _lb2169f50d2e_content($_l, $_args) { extract($_args)
;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($polozky) as $polozka): if ($iterator->isFirst()): ?>
	<table id="box-table-a">
	    <tr>
		<th>Popis</th>
		<th>Hodnota</th>
		<th></th>
	    </tr>
<?php endif ?>
   <tr>
       <td><?php echo Nette\Templating\Helpers::escapeHtml($polozka['popis'], ENT_NOQUOTES) ?></td>
       <td><?php echo Nette\Templating\Helpers::escapeHtml($polozka['hodnota'], ENT_NOQUOTES) ?></td>
       <td><a class='edit_icon' title='upravit' alt='upravit' href="<?php echo htmlSpecialChars($_control->link("edit", array($polozka['id']))) ?>
"></a></td>
   </tr>
<?php if ($iterator->isLast()): ?>
	</table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = 'base.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['podsekce']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 