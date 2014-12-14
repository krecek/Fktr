<?php

use Nette\Application\UI\Form;

class upravitFakturuForm extends Form
{
    public function __construct($dph,$cislo_faktury,$values = null) {
	parent::__construct();
        dd($values, 'values');
//	$this->addHidden('odberatel',null);
        $this->addText('cislo', 'Číslo faktury:')->setValue(($cislo_faktury+1).date('y'))->setRequired('Vyplňte číslo faktury')->addRule(Form::INTEGER, 'Číslo faktury musí být číslo')->setAttribute('class', "smallInput");
        $this->addText('objednavka', 'Číslo objednávky:')->setAttribute('class', "smallInput");
	$this->addText('datum', 'Datum vytvoření:')->setValue(date('j.n.Y'))->setRequired('Zadejte datum vytvoření')->setHtmlId('datepicker')->setAttribute('class', "smallInput");
	$this->addText('splatnost', 'Datum splatnosti:')->setValue(date('j.n.Y', strtotime('+ 10 days')))->setRequired('Zadejte datum splatnosti')->setAttribute('class', "smallInput");
	$this->addText('zpusob_platby', 'Způsob platby:')->setValue('Převodem')->setAttribute('class', "smallInput");
	$this->addText('zaplaceno', 'Datum zaplacení:')->setAttribute('class', "smallInput");
	$this->addCheckbox('razitko', 'Přidat razítko');
	$this->addSubmit('send', 'Uložit')->setAttribute('class', 'btn btn-primary')->setAttribute('class', "smallInput");
	if($values)
	{
	    $this['cislo']->setValue($values['cislo']);
	    $this['objednavka']->setValue($values['objednavka']);
	    $this['datum']->setValue($values['vytvoreno']->format('j.n.Y'));
	    $this['splatnost']->setValue($values['splatnost']->format('j.n.Y'));
	    $this['zaplaceno']->setValue($values['platba']);
	    if($values['razitko']=='A') $this['razitko']->setValue(1);
 	}
    }

}
