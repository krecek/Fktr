<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.51522200 1409721519";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"D:\xampp\htdocs\Faktury2\app\templates\Faktury\prehled.latte";i:2;i:1409667767;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Faktury\prehled.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ynma74au4z')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lbcd6c5a6927_podsekce')) { function _lbcd6c5a6927_podsekce($_l, $_args) { extract($_args)
?>Seznam faktur<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe8a61da8bc_content')) { function _lbe8a61da8bc_content($_l, $_args) { extract($_args)
?><div>
    <table class="normal">
<?php if ($odberatel->nazev): ?>
            <tr>
		<td>Název:</td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->nazev, ENT_NOQUOTES) ?></td>
            </tr>
<?php endif ?>
        <tr>
	    <td>Adresa:</td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->ulice, ENT_NOQUOTES) ?>
, <?php echo Nette\Templating\Helpers::escapeHtml($odberatel->psc, ENT_NOQUOTES) ?>
&nbsp;&nbsp;&nbsp;<?php echo Nette\Templating\Helpers::escapeHtml($odberatel->mesto, ENT_NOQUOTES) ?></td>
        </tr>
<?php if ($odberatel->telefon): ?>
            <tr>
		<td>Telefon:</td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->telefon, ENT_NOQUOTES) ?></td>
            </tr>
<?php endif ;if ($odberatel->mail): ?>
            <tr>
		<td>Mail:</td>
                <td><a href='mailto:<?php echo htmlSpecialChars($odberatel->mail, ENT_QUOTES) ?>
'><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->mail, ENT_NOQUOTES) ?></a></td>
            </tr>
<?php endif ;if ($odberatel->osoba): ?>
            <tr>
		<td>Kontaktní osoba:&nbsp;</td>
                <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->osoba, ENT_NOQUOTES) ?></td>
            </tr>
<?php endif ?>
    </table>
</div>

</table>
<?php if ($faktury): ?>
    <div class="portlet">
        <div class="portlet-header fixed">Seznam faktur</div>
	<div class="portlet-content nopadding">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($faktury) as $faktura): if ($iterator->isFirst()): ?>
		    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a">
			<tr>
			    <th>Číslo</th>
			    <th>Odběratel</th>
			    <th>Datum vystavenní</th>
			    <th>Splatnost</th>
			    <th>Zaplaceno</th>
			    <th>&nbsp;</th>
			</tr>
<?php endif ?>
		    <tr>
			<td><a href="<?php echo htmlSpecialChars($_control->link("detail", array($faktura->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($faktura->cislo, ENT_NOQUOTES) ?></a></td>
			<td title='<?php echo htmlSpecialChars($faktura->ulice, ENT_QUOTES) ?>, <?php echo htmlSpecialChars($faktura->mesto, ENT_QUOTES) ?>
'><a href="<?php echo htmlSpecialChars($_control->link("Faktury:prehled", array('odberatel'=>$faktura->odberatel))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($faktura->nazev, ENT_NOQUOTES) ?></a></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->vytvoreno, 'j.n.Y'), ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->splatnost, 'j.n.Y'), ENT_NOQUOTES) ?></td>
			<td><?php if ($faktura->platba): ?><span class="ok"></span><?php endif ;if (!$faktura->platba && $faktura->splatnost<$dnes): ?>
<span class="warning"></no><?php endif ;echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->platba, 'j.n.Y'), ENT_NOQUOTES) ?></td>
			<td>
			    <a class="edit_icon" href="<?php echo htmlSpecialChars($_control->link("edit", array($faktura->id))) ?>
"></a>&nbsp;
			    <a class="delete_icon" onclick="if(!confirm('Opravdu smazat tuto fakturu? Tento krok je nevratný.'))return false;" href="<?php echo htmlSpecialChars($_control->link("delete", array($faktura->id))) ?>
"></a>
			</td>

		    </tr>
<?php if ($iterator->isLast()): ?>
		    </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</div>
    </div>
    <div class="clear"> </div>
<?php else: ?>
    Nebyly nalezeny žádné faktury odpovídající požadavkům;
<?php endif ?>
<a class="button" href="<?php echo htmlSpecialChars($_control->link("new", array($odberatel->id))) ?>
"><span>Vytvořit novou fakturu</span></a><?php
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