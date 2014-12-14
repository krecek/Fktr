<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.54996600 1409664775";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"D:\xampp\htdocs\Faktury2\app\templates\Odberatele\default.latte";i:2;i:1409664770;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Odberatele\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4ac7dpsdbv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lb02d307ecd1_podsekce')) { function _lb02d307ecd1_podsekce($_l, $_args) { extract($_args)
?>Seznam odběratelů<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbda4577f101_content')) { function _lbda4577f101_content($_l, $_args) { extract($_args)
?>&nbsp;
<?php $_ctrl = $_control->getComponent("odberateleFiltrform"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
<div class="portlet">
        <div class="portlet-header fixed">Seznam odběratelů</div>
	<div class="portlet-content nopadding">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($odberatele) as $odberatel): if ($iterator->isFirst()): ?>
        <table width='100%' cellpadding="0" cellspacing="0" id="box-table-a">
            <tr>
                <th>Id</th>
                <th>Název</th>
                <th>Adresa</th>
                <th>Kontaktní osoba</th>
                <th>Telefon</th>
                <th>Mail</th>
                <th>Akce</th>
            </tr>

<?php endif ?>
        <tr>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['id'], ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['nazev'], ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['ulice'], ENT_NOQUOTES) ?>
, <?php echo Nette\Templating\Helpers::escapeHtml($odberatel['mesto'], ENT_NOQUOTES) ?>
, <?php echo Nette\Templating\Helpers::escapeHtml($odberatel['psc'], ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['osoba'], ENT_NOQUOTES) ?></td>
            <td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['telefon'], ENT_NOQUOTES) ?></td>
            <td><?php if ($odberatel['mail']): ?><a href='mailto:<?php echo htmlSpecialChars($odberatel["mail"], ENT_QUOTES) ?>
'><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['mail'], ENT_NOQUOTES) ?>
</a><?php endif ?></td>
            <td><a href="<?php echo htmlSpecialChars($_control->link("Faktury:prehled", array($odberatel->id))) ?>
">Faktury</a>
		<a class="edit_icon" href="<?php echo htmlSpecialChars($_control->link("edit", array($odberatel['id']))) ?>
"></a>&nbsp;
		<a class="delete_icon" onclick="if(!confirm('Opravdu odstranit odběratele?')) return false;" href="<?php echo htmlSpecialChars($_control->link("delete", array($odberatel['id']))) ?>
"></a></td>
        </tr>   
<?php if ($iterator->isLast()): ?>
        </table>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</div>
    </div>
    <div class="clear"> </div>
<?php if (!$odberatele): ?>
    <div class='error'>
    Nebyli nalezeni žádní odběratelé odpovídající požadavkům.
    </div>
<?php endif ?>

    <a class="button" href="<?php echo htmlSpecialChars($_control->link("add")) ?>
"><span>Nový odběratel</span></a><?php
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