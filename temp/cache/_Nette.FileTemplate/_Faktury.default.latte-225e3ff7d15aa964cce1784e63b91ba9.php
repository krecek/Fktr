<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.05188500 1409670469";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"D:\xampp\htdocs\Faktury2\app\templates\Faktury\default.latte";i:2;i:1409670467;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Faktury\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4d1yi22pmj')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lba9c62e5b41_podsekce')) { function _lba9c62e5b41_podsekce($_l, $_args) { extract($_args)
?>Seznam faktur<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lba4f6a19b22_content')) { function _lba4f6a19b22_content($_l, $_args) { extract($_args)
?>&nbsp;
<?php $_ctrl = $_control->getComponent("fakturyFiltrForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;if ($faktury): ?>
    <div class="portlet">
        <div class="portlet-header fixed">Seznam faktur</div>
	<div class="portlet-content nopadding">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($faktury) as $faktura): if ($iterator->isFirst()): ?>
		    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" >
			<tr>
			    <th>Číslo</th>
			    <th>Objednávka</th>
			    <th>Odběratel</th>
			    <th>Datum vystavenní</th>
			    <th>Splatnost</th>
			    <th>Zaplaceno</th>
			    <th>Razítko</th>
			    <th>&nbsp;</th>
			</tr>
<?php endif ?>
		    <tr>
			<td><a href="<?php echo htmlSpecialChars($_control->link("detail", array($faktura->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($faktura->cislo, ENT_NOQUOTES) ?></a></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($faktura->objednavka, ENT_NOQUOTES) ?></td>
			<td title='<?php echo htmlSpecialChars($faktura->ulice, ENT_QUOTES) ?>, <?php echo htmlSpecialChars($faktura->mesto, ENT_QUOTES) ?>
'><a href="<?php echo htmlSpecialChars($_control->link("Faktury:prehled", array($faktura->odberatel))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($faktura->nazev, ENT_NOQUOTES) ?></a></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->vytvoreno, 'j.n.Y'), ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->splatnost, 'j.n.Y'), ENT_NOQUOTES) ?></td>
			<td><?php if ($faktura->platba): ?><span class="ok"></span><?php endif ;if (!$faktura->platba && $faktura->splatnost<$dnes): ?>
<span class="warning"></no><?php endif ;echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->platba, 'j.n.Y'), ENT_NOQUOTES) ?></td>
	    <td><?php if ($faktura->razitko=='A'): ?><span class='ok' title='ano'></span><?php else: ?>
<span class='no' title='ne'></span><?php endif ?></td>
			<td><a class="edit_icon" href="<?php echo htmlSpecialChars($_control->link("edit", array($faktura->id))) ?>
"></a>&nbsp;
			    <a class="delete_icon" onclick="if (!confirm('Opravdu smazat tuto fakturu? Tento krok je nevratný.'))
					return false;" href="<?php echo htmlSpecialChars($_control->link("delete", array($faktura->id))) ?>
"></a></td>

		    </tr>
<?php if ($iterator->isLast()): ?>
		    </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</div>
    </div>
    <div class="clear"> </div>
<?php else: ?>
    <p class="info" id="error">
	<span class="info_inner"> Nebyly nalezeny žádné faktury odpovídající požadavkům</span>
    </p>
<?php endif ?>

<?php
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