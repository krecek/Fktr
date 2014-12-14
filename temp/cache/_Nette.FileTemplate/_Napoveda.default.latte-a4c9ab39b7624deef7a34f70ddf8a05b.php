<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.40774800 1412783648";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"D:\xampp\htdocs\Faktury2\app\templates\Napoveda\default.latte";i:2;i:1409854940;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Napoveda\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'lwdt8cj47x')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb48870181e_content')) { function _lbb48870181e_content($_l, $_args) { extract($_args)
?><h2>Jak vyhledat odběratele?</h2>
<p>
<ul>
    <li>
	V hlavním menu kliknetě na tlačítko <span class='odkaz'>Odběratelé</span>.
    </li>
    <li>Zobazí se vyhledávací formulář a seznam všech odběratelů.</li>
    <li>Vyplntě hledané údaje do formuláře. Lze zadat i části slov (např. do pole <span class='odkaz'>Mail</span> zadáte 'aaa' a vyhledají se odběratelé, jejichž mail obsahuje 'aaa'. Jednotlivá pole formuláře jsou ve vztahu 'a zároveň'. Pokud tedy do pole <span class='odkaz'>Název</span> vyplníte 'F' a do pole <span class='odkaz'>Město</span> 'Praha', výsledkem vyhledávání budou firmy jejichž název obsahuje 'F' a jsou v Praze.</li>
    <li>Klikněte na tlačítko vyhledat.</li>
    <li>Zobrazí se seznam odběratelů odpovídajících zadaným údajům.</li>
    <li>Kliknutím na mailovou adresu se otevře Outlook s předvyplněnou adresou a lze takto odeslat email.</li>
    <li>Kliknutím na odkaz <span class='odkaz'>Faktury</span> se zobrazí seznam faktur odběratele a lze vytvořit novou fakturu.</li>
    <li>Kliknutím na ikonku <span class='odkaz edit_icon'>Upravit</span> lze upravit údaje o odběrateli. Kliknutím na ikonku <span class='odkaz delete_icon'>Smazat</span> můžete odběratele odstranit. Jeho faktury zůstanou zachovány, pouze se nebuse zobrazovat v seznamu odběratelů.</li>
</ul>
</p>
<h2>Jak přidat odběratele?</h2>
<p>
<ul>
    <li>
	
    </li>
</ul>
</p>
<h2>Jak vyhledat fakturu?</h2>
<p>
<ul>
    <li>V hlavním menu kliknout na <span class='odkaz'>Faktury</span>.</li>
    <li>Do vyhledávacího formuláře můžete zadat název, ulici, emai, či telefon odběratele, můžete vybrat rok vystavení fakury a zvolit, zda faktura je, nebo není zaplacená. Pomocí tohoto formuláře tak lze například zobrazit všechny nezaplacené faktury z roku 2013, které patří uživatelům, kteří sídlí v Praze.
    </li>
    <li>Klikněte na tlačítko <span class='odkaz'>Vyhledat</span>.</li>
    <li>Zobrazí se seznam faktur, které odpovídají požadovaným údajům.</li>
    <li>Kliknutím na ikonku <span class='odkaz edit_icon'>Upravit</span> lze fakturu editovat, na ikonku <span class='odkaz delete_icon'>Smazat</span> fakturu smažete. Tento krok je nevratný.</li>
    <li>Kliknutím na číslo faktury (v levém sloupci) zobrazíte její detail a můžete ji vytisknout či upravit.</li>
    <li>Kliknutím na odběratele zobrazíte detail odběratele a seznam jeho faktur.</li>
</ul>
</p>
<h2>Jak vytvořit fakturu?</h2>
<p>
<ul>
    <li>
	V hlavním menu klinkout na <a class='odkaz' href="<?php echo htmlSpecialChars($_control->link("Odberatele")) ?>
">Odběratelé</a>.
    </li>
    <li>Pomocí vyhledávacího formuláře vyhledat oběratele, pro kterého chcete vytvořit fakturu. Pokud odběratel ještě není v systému, vytvořte jej.</li>
    <li>V seznamu obděratelů klikněte na odkaz <span class='odkaz'>Faktury</span>. </li>
    <li>Klikněte na tlačítko <span class='odkaz'>Vytvořit novou fakturu</span>.</li>
    <li>Do formuláře vyplňte požadované údaje. 
	Číslo faktury se vyplňuje automaticky (číslo poslední faktury + 1).
	Pokud jej změníte, ovlivníte tak i čísla následně vytvořených faktur 
	(číslo následující faktury se bude opět vypočítávat jako číslo této faktury + 1. Číslo objednávky je nepovinné. Pokud jej nevyplníte, neobjeví se příslušná kolonka ani ve vytištěné faktuře. Datum zaplacení je také nepovinné. Můžete jej vyplnit až při editaci faktury ve chvíli, kdy je faktura zaplacena. Volbou <span class='odkaz'>Přidat razítko</span> určujete, zda se na faktuře objeví obrázek razítka. Po vyplnění údajů klikněte na tlačítko <span class='odkaz'>Uložit</span>.</li>
    <li>Do formuláře vyplňte jednotlivé položky faktury a klikněte na tlačítko <span class='odkaz'>Uložit</span>.</li>
    <li>Vytvořenou fakturu můžete upravit nebo vytisknout.</li>
</ul>
</p>
<h2>Jak vytisknout fakturu?</h2>
<p>
<ul>
    <li>Po vyhledání faktury klikněte na její číslo (v levém sloupci tabulky).</li>
    <li>V dolní části stránky vidíte, zda je aktuální verze faktury již vytištěná, nebo zatím ne.</li>
    <li>Kliknutím na ikonku <span class='odkaz print'>Tisk</span> zobrazíte fakturu jako soubor pdf. Tento soubor můžete vytisknout nebo uložit na pevný disk. Postup při tisku a ukládání závisí na Vámi používaném programu pro práci se soubory pdf.</li>
</ul>
</p>
<h2>Jak upravit fakturu?</h2>
<p>
<ul>
    <li>a) <ul>
	    <li>Po vyhledání faktury klikněte na její číslo (v levém sloupci tabulky).</li>
	    <li>V dolní části stránky klikněte na ikonku <span class='odkaz'>Upravit</span>.</li>
	</ul>
	b) <ul><li>Klikněte na ikonku <span class='odkaz edit_icon'>Upravit</span>.</li></ul> 
    </li>
    <li>Upravte údaje v horním <b>nebo</b> spodním formuláři a klikněte na tlačítko <span class='odkaz'>Uložit</span>.</li>
    <li>Při každé úpravě se faktura automatick označí jako nevytištěná.</li>
</ul>
</p><?php
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 