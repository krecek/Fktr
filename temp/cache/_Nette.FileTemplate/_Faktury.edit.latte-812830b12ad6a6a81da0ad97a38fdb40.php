<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.71073500 1409666120";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:57:"D:\xampp\htdocs\Faktury2\app\templates\Faktury\edit.latte";i:2;i:1409663770;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Faktury\edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'te1i9rkqem')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lbf242537e6d_podsekce')) { function _lbf242537e6d_podsekce($_l, $_args) { extract($_args)
?>editace: <?php echo Nette\Templating\Helpers::escapeHtml($faktura->cislo, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb869709d220_content')) { function _lb869709d220_content($_l, $_args) { extract($_args)
?>&nbsp;

<?php $_ctrl = $_control->getComponent("upravitFakturuForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("upravitPolozkyForm") ? "upravitPolozkyForm" : $_control["upravitPolozkyForm"]), array()) ?>
    <table width="100%">
	<tr>
	    <th width="70%">Text</th>
	    <th width="10%">Množství</th>
	    <th width="10%">Cena bez DPH</th>
	    <th width="10%">DPH (%)</th>
	</tr>
	
<?php for ($i=1; $i<=$form->pocet_polozek; $i++): ?>
	    <tr>
		<td width="70%"><?php $_input = (is_object("polozka_$i") ? "polozka_$i" : $_form["polozka_$i"]); echo $_input->getControl()->addAttributes(array()) ?></td>
		<td width="10%"><?php $_input = (is_object("mnozstvi_$i") ? "mnozstvi_$i" : $_form["mnozstvi_$i"]); echo $_input->getControl()->addAttributes(array()) ?></td>
		<td width="10%"><?php $_input = (is_object("cena_$i") ? "cena_$i" : $_form["cena_$i"]); echo $_input->getControl()->addAttributes(array()) ?></td>
		<td width="10%"><?php $_input = (is_object("dph_$i") ? "dph_$i" : $_form["dph_$i"]); echo $_input->getControl()->addAttributes(array()) ?></td>
	    </tr>
<?php endfor ?>
	<tr><td colspan="4"><?php $_input = (is_object("send") ? "send" : $_form["send"]); echo $_input->getControl()->addAttributes(array()) ?></td></tr>
	
    </table>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
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