<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.99202500 1409670310";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"D:\xampp\htdocs\Faktury2\app\templates\Faktury\detail.latte";i:2;i:1409670309;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Faktury\detail.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'npfkyz6sjg')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lb5c39180122_podsekce')) { function _lb5c39180122_podsekce($_l, $_args) { extract($_args)
;echo Nette\Templating\Helpers::escapeHtml($faktura->cislo, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9b5317007d_content')) { function _lb9b5317007d_content($_l, $_args) { extract($_args)
?><div id="portlets">
    <div class="column" id="left">
        <div class="portlet">
            <div class="portlet-header">Informace o faktuře</div>
            <div class="portlet-content">
		<table>
                    <tr>
                        <td>Číslo faktury: </td>
                        <td><?php echo Nette\Templating\Helpers::escapeHtml($faktura->cislo, ENT_NOQUOTES) ?></td>
                    </tr>
                    <tr>
                        <td>Číslo objednávky: </td>
                        <td><?php echo Nette\Templating\Helpers::escapeHtml($faktura->objednavka, ENT_NOQUOTES) ?></td>
                    </tr>
                    <tr>
                        <td>Vytvořeno: </td>
                        <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->vytvoreno, 'j.n.Y'), ENT_NOQUOTES) ?></td>
                    </tr>
                    <tr>
                        <td>Splatnost: </td>
                        <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->splatnost, 'j.n.Y'), ENT_NOQUOTES) ?></td>
                    </tr>
<?php if ($faktura->platba): ?>
                        <tr>
                            <td>Zaplaceno</td>
                            <td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura->platba, 'j.n.Y'), ENT_NOQUOTES) ?></td>
                        </tr>
<?php endif ?>
		    <tr>
			<td>Razítko</td>
			<td><?php if ($faktura->razitko=='A'): ?><span class='ok' title='ano'></span><?php else: ?>
<span class='no' title='ne'></span><?php endif ?></td>
		    </tr>
			
                </table>
            </div>
        </div>
    </div>
    <div class="column" >
        <div class="portlet">
            <div class="portlet-header">Odběratel</div>
            <div class="portlet-content">
		<table>
<?php if ($odberatel->nazev): ?>
			<tr>
			    <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->nazev, ENT_NOQUOTES) ?></td>
			</tr>
<?php endif ?>
                    <tr>
                        <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel->ulice, ENT_NOQUOTES) ?>
, <?php echo Nette\Templating\Helpers::escapeHtml($odberatel->psc, ENT_NOQUOTES) ?>
&nbsp;&nbsp;&nbsp;<?php echo Nette\Templating\Helpers::escapeHtml($odberatel->mesto, ENT_NOQUOTES) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="portlet">
        <div class="portlet-header fixed">Položky</div>
	<div class="portlet-content nopadding">
	    <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a">
		<thead>
		    <tr>
			<th>popis</th>
			<th>množství</th>
			<th>cena/kus</th>
			<th>dph (%)</th>
			<th>cena bez dph</th>
			<th>cena s dph</th>
		    </tr>
		</thead>
<?php $iterations = 0; foreach ($polozky as $polozka): ?>
		    <tr>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->popis, ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->mnozstvi, ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->cena, ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->dph, ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->cenabezdph, ENT_NOQUOTES) ?></td>
			<td><?php echo Nette\Templating\Helpers::escapeHtml($polozka->cenasdph, ENT_NOQUOTES) ?></td>
		    </tr>
<?php $iterations++; endforeach ?>
	    </table>
	    <br />
	    <div>
		Vytištěna aktuální verze 
		<?php if ($vytisteno): ?><span class="ok"><?php else: ?><span class="no"><?php endif ?></span>
		&nbsp;&nbsp;&nbsp;<a class="print" title="tisk" alt="tisk" href="<?php echo htmlSpecialChars($_control->link("pdf", array($faktura->id))) ?>
"></a>&nbsp;<a class="edit_icon" title='upravit' alt='upravit' href="<?php echo htmlSpecialChars($_control->link("edit", array($faktura->id))) ?>
"></a>
	    </div>
	</div>
    </div>
</div>
<div class="clear"> </div><?php
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