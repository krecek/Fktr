<?php //netteCache[01]000374a:2:{s:4:"time";s:21:"0.55397200 1413483955";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:52:"D:\xampp\htdocs\Faktury2\app\templates\@layout.latte";i:2;i:1412887499;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ag8zifv8xa')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb5c94196a48_title')) { function _lb5c94196a48_title($_l, $_args) { extract($_args)
?>Seňko DDD - Faktury<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbd32497d80a_head')) { function _lbd32497d80a_head($_l, $_args) { extract($_args)
;
}}

//
// block ikona
//
if (!function_exists($_l->blocks['ikona'][] = '_lb4188100d27_ikona')) { function _lb4188100d27_ikona($_l, $_args) { extract($_args)
?>content_edit<?php
}}

//
// block sekce
//
if (!function_exists($_l->blocks['sekce'][] = '_lbdb29042dec_sekce')) { function _lbdb29042dec_sekce($_l, $_args) { extract($_args)
;
}}

//
// block podsekce
//
if (!function_exists($_l->blocks['podsekce'][] = '_lb11fe3e09b9_podsekce')) { function _lb11fe3e09b9_podsekce($_l, $_args) { extract($_args)
;
}}

//
// block tip
//
if (!function_exists($_l->blocks['tip'][] = '_lb6c64826858_tip')) { function _lb6c64826858_tip($_l, $_args) { extract($_args)
?>Nápověda<?php
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb8b5bc7134b_scripts')) { function _lb8b5bc7134b_scripts($_l, $_args) { extract($_args)
?>		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
		<script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>

<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/960.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/green.css" />
 
        <link type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/smoothness/ui.css" rel="stylesheet" />  
	<link  type="text/css" href="<?php echo htmlSpecialChars($basePath) ?>/css/jquery-ui.css" rel="stylesheet" />

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui.js"></script>


	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

    </head>

    <body>
	<script> document.documentElement.className += ' js'</script>
	<div class="container_16" id="wrapper">	
	    <div class="grid_8" id="logo">Seňko DDD</div>
	    <div class="grid_16" id="header">
		<!-- MENU START -->
		<div id="menu">
		    <ul class="group" id="menu_group_main">
			<li class="item first" id="one"><a class="main<?php if (($mainItem=='odberatele')): ?>
 current<?php endif ?>" href="<?php echo htmlSpecialChars($_control->link("odberatele:")) ?>
"><span class="outer"><span class="inner users">Odběratelé</span></span></a></li>
			<li class="item middle" id="two"><a class="main<?php if (($mainItem=='faktury')): ?>
 current<?php endif ?>" href="<?php echo htmlSpecialChars($_control->link("faktury:")) ?>
"><span class="outer"><span class="inner content">Faktury</span></span></a></li>
			<li class="item last" id="eight"><a class="main<?php if (($mainItem=='konfigurace')): ?>
 current<?php endif ?>" href="<?php echo htmlSpecialChars($_control->link("konfigurace:")) ?>
"><span class="outer"><span class="inner settings">Konfigurace</span></span></a></li>        
		    </ul>
		</div><?php Nette\Diagnostics\Debugger::barDump(array('$mainItem' => $mainItem), "Template " . str_replace(dirname(dirname($template->getFile())), "\xE2\x80\xA6", $template->getFile())) ?>

		<!-- MENU END -->
	    </div>
	    <div class="grid_16">
		<!-- TABS START -->
		<div id="tabs">
		    <div class="container">
<?php $iterations = 0; foreach ($flashes as $flash): ?>			<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>
		    </div>
		</div>
		<!-- TABS END -->    
	    </div>
	    <div class="grid_16" id="content">
		<div class="grid_9">
		    <h1 class="<?php call_user_func(reset($_l->blocks['ikona']), $_l, get_defined_vars())  ?>
"><?php call_user_func(reset($_l->blocks['sekce']), $_l, get_defined_vars())  ?>
 - <?php call_user_func(reset($_l->blocks['podsekce']), $_l, get_defined_vars())  ?></h1>
		</div>
		<div class="grid_6" id="eventbox"><a class="inline_tip" href="<?php echo htmlSpecialChars($_control->link("Napoveda:")) ?>
"><?php call_user_func(reset($_l->blocks['tip']), $_l, get_defined_vars())  ?></a></div>
		<div class="clear">
		</div>
		<div class="grid_15" id="textcontent">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
		</div>
		<div class="clear">
		</div>
<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
	    </div>
	    <div class="clear">
	    </div>
	</div>
	<div class="clear">
        </div>
	<div class="container_16" id="footer">
	    Designed by Bobulka</div>
    </body>
</html>
