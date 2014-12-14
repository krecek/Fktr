<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.60479200 1418103839";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"D:\xampp\htdocs\Faktury2\app\templates\Faktury\pdf.latte";i:2;i:1418103808;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"dc83a21 released on 2013-07-11";}}}?><?php

// source file: D:\xampp\htdocs\Faktury2\app\templates\Faktury\pdf.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'u4vv7h9vlx')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<table style='witdh:660px; border-collapse:collapse; border-bottom:1px solid black;'>
    <tr>
	<td width='660px' style='border-bottom:1px solid black; text-align:left; font-size:17px;'>
	    <b>Faktura - daňový doklad</b>
	</td>
    </tr>
</table>
<table style='border-collapse:collapse; margin-top:15px;' cellspacing='0px' cellpadding='0px'>
       <tr>
           <td style='border:1px solid black; border-left: 1px solid black; width:330px'  >
               <table style='border-collapse:collapse; width:100%' >
                   <tr>
                       <td style='width:330px'>
                           <table style='border-collapse:collapse; width:330'>
                                <tr><td><b>Dodavatel:</b></td></tr>
                                <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($nazev, ENT_NOQUOTES) ?></td></tr>
                                <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($ulice, ENT_NOQUOTES) ?></td></tr>
                               <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($psc, ENT_NOQUOTES) ?>
&nbsp;&nbsp;<?php echo Nette\Templating\Helpers::escapeHtml($mesto, ENT_NOQUOTES) ?></td></tr>
                               <tr><td></td></tr>
                            </table>
                            <table style='margin-top:25px; width:330px'>
                               <tr><td>e-mail:</td><td><?php echo Nette\Templating\Helpers::escapeHtml($email, ENT_NOQUOTES) ?></td></tr>
                               <tr><td>tel:</td><td><?php echo Nette\Templating\Helpers::escapeHtml($telefon, ENT_NOQUOTES) ?></td></tr>
                            </table>
                            <table style='margin-top:15px; width:330px'>
			       <tr><td>konces. listina č. 310003-47851-00<br />
					vydal živnostenský odbor městské<br />
					části Praha 3 dne 13.6.2001 </td></tr>
                            </table>
                       </td>
                    </tr>
               </table>
               <table style='border-top:1px solid black; width:330px; border-collapse:collapse;'>
                   <tr><td><b>IČ:</b></td><td><?php echo Nette\Templating\Helpers::escapeHtml($ic, ENT_NOQUOTES) ?></td></tr>
                   <tr><td><b>DIČ:</b></td><td><?php echo Nette\Templating\Helpers::escapeHtml($dic, ENT_NOQUOTES) ?></td></tr>
                   <tr><td><b>Č. účtu:</b></td><td><?php echo Nette\Templating\Helpers::escapeHtml($cislo_uctu, ENT_NOQUOTES) ?></td></tr>
                   <tr><td><b>Banka:</b></td><td><?php echo Nette\Templating\Helpers::escapeHtml($banka, ENT_NOQUOTES) ?></td></tr>
               </table>
            </td>
            <td style='border:1px solid black; border-left: 1px solid black; width:330px'>
                <table width='330px' style='border-collapse:collapse;'>
                   <tr>
                        <td>
                            <table style='border-bottom:1px solid black; width:330px'>
                                <tr>
				    <td><b>č. faktury (variabilní symbol):</b></td>
				    <td width='80px'><b><?php echo Nette\Templating\Helpers::escapeHtml($faktura['cislo'], ENT_NOQUOTES) ?></b></td>
				</tr>
                            </table> 
<?php if ($faktura->objednavka): ?>
                            <table style='border-bottom:1px solid black; width:330px'>
                                <tr>
				    <td>č. objednávky:</td>
				    <td width='110px'><b><?php echo Nette\Templating\Helpers::escapeHtml($faktura['objednavka'], ENT_NOQUOTES) ?></b></td>
				</tr>
                            </table>  
<?php endif ?>
                            <table  style='border-bottom:1px solid black; width:330px'>
                                <tr><td>Datum splatnosti</td><td width='110px'><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura['splatnost'], 'j.n.Y'), ENT_NOQUOTES) ?></td></tr>
                                <tr><td>Datum vystavení dokladu</td><td width='110px'><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura['vytvoreno'], 'j.n.Y'), ENT_NOQUOTES) ?></td></tr>
                                <tr><td>Datum usku. zdanitel. plnění</td><td width='110px'><?php echo Nette\Templating\Helpers::escapeHtml($template->date($faktura['vytvoreno'], 'j.n.Y'), ENT_NOQUOTES) ?></td></tr>
                            </table>
                            <table style='border-bottom:1px solid black; width:330px'>
                                <tr><td>Forma úhrady:</td><td width='$tretina'><?php echo Nette\Templating\Helpers::escapeHtml($faktura['zpusob_platby'], ENT_NOQUOTES) ?></td></tr>
                                <tr><td>Variabilní symbol:</td><td width='110px'><?php echo Nette\Templating\Helpers::escapeHtml($faktura['cislo'], ENT_NOQUOTES) ?></td></tr>
                               <tr><td>Konstantní symbol:</td><td width='110px'>0308</td></tr>
                            </table>
                            <table style='width:330px'>
                                <tr><td><b>Odběratel:</b></td></tr>
                                <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['nazev'], ENT_NOQUOTES) ?></td></tr>
                               <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['ulice'], ENT_NOQUOTES) ?></td></tr>
                                <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($odberatel['psc'], ENT_NOQUOTES) ?>
&nbsp;&nbsp;<?php echo Nette\Templating\Helpers::escapeHtml($odberatel['mesto'], ENT_NOQUOTES) ?></td></tr>
                            </table>
                           <table style='margin-top:0px; width:330px'>
                                <tr><td><?php if ($odberatel['ico']): ?>IČO: <?php echo Nette\Templating\Helpers::escapeHtml($odberatel['ico'], ENT_NOQUOTES) ;endif ?></td></tr>
                                <tr><td><?php if ($odberatel['dic']): ?>DIČ: <?php echo Nette\Templating\Helpers::escapeHtml($odberatel['dic'], ENT_NOQUOTES) ;endif ?></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
<table style='width:660px; margin-top:25px; border-collapse:collapse;'> 
        <tr>
            <td style='width: 330px; border-bottom:1.5px solid black;' valign='top' align='left'><b>Označení dodávky</b></td>
            <td style='width: 330px; border-bottom:1.5px solid black;' valign='top' align='left'><b>množství</b></td>
            <td style='width: 82.5px; border-bottom:1.5px solid black;' valign='top' align='center'><b>Cena v Kč<br />bez DPH</b></td>
            <td style='width: 82.5px; border-bottom:1.5px solid black;' valign='top' align='center'><b>Sazba DPH<br />v %</b></td>
            <td style='width: 82.5px; border-bottom:1.5px solid black;' valign='top' align='center'><b>DPH<br />v Kč</b></td>
            <td style='width: 82.5px; border-bottom:1.5px solid black;' valign='top' align='center'><b>Kč celkem<br />včetně DPH</b></td>
        </tr>
<?php if (count($faktura['polozky'])): $sum_bez = 0 ;$sum_s = 0 ;$iterations = 0; foreach ($faktura['polozky'] as $polozka): $polozka_dph=($polozka['cena']*0.01*$polozka['dph']) ;$polozka_dph_celkem +=($polozka_dph*$polozka['mnozstvi']) ;$celkem = ($polozka['cena'] + $polozka['cena']*0.01*$polozka['dph'])*$polozka['mnozstvi'] ;echo Nette\Templating\Helpers::escapeHtml($sum_bez +=$polozka['cena']*$polozka['mnozstvi'], ENT_NOQUOTES) ?>

<?php echo Nette\Templating\Helpers::escapeHtml($sum_s +=$celkem, ENT_NOQUOTES) ?>

         <tr>
           <td><?php echo Nette\Templating\Helpers::escapeHtml($polozka['popis'], ENT_NOQUOTES) ?></td>
           <td><?php echo Nette\Templating\Helpers::escapeHtml($polozka['mnozstvi'], ENT_NOQUOTES) ?></td>
            <td align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number($polozka['cena'], 2, ',', ' '), ENT_NOQUOTES) ?></td>
            <td align='center'><?php echo Nette\Templating\Helpers::escapeHtml($polozka['dph'], ENT_NOQUOTES) ?></td>
            <td align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number($polozka_dph, 2, ',', ' '), ENT_NOQUOTES) ?></td>
            <td align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number($celkem, 2, ',', ' '), ENT_NOQUOTES) ?></td>
        </tr>
<?php $iterations++; endforeach ;endif ?>
    <tr>
        <td style='border-top:1.5px solid black;'><b>Celkem</b></td>
	<td style='border-top:1.5px solid black;' align='right'></td>
	<td style='border-top:1.5px solid black;' align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number($sum_bez, 2, ',', ' '), ENT_NOQUOTES) ?></td>
	<td style='border-top:1.5px solid black;' align='right'></td>
	<td style='border-top:1.5px solid black;' align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number(round($polozka_dph_celkem), 2, ',', ' '), ENT_NOQUOTES) ?></td>
	<td style='border-top:1.5px solid black;' align='right'><?php echo Nette\Templating\Helpers::escapeHtml($template->number(round($sum_s), 2, ',', ' '), ENT_NOQUOTES) ?></td>
    </tr>
    </table>
<?php if ($faktura->razitko=='N'): ?>
    <table width='200px' style='margin-top:50px; margin-left:50px;'>
        <tr><td style='width:200px;' align='center'></td></tr>
        <tr><td style='width:200px' align='center'><b>razítko a podpis</b></td></tr>
    </table>
<?php else: ?>
	<table width='200px' style='margin-top:50px; margin-left:50px;'>
        <tr><td style='width:200px;' align='center'><img src='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/images/razitko.png' width='250px' /></td></tr>
        <tr><td style='width:200px' align='center'><b>razítko a podpis</b></td></tr>
    </table>
<?php endif ;