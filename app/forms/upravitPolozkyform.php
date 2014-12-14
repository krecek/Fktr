<?php

class UpravitPolozkyForm extends \Nette\Application\UI\Form
{

    public $pocet_polozek;

    public function __construct($pocet_polozek, $dph, $values = null)
    {
	parent::__construct();
	$pocet_polozek_i = 0;
	if ($values)
	    $pocet_polozek_i = count($values);
	$pocet_polozek_i > $pocet_polozek ? $pocet_polozek = $pocet_polozek_i + 1 : $pocet_polozek;
	$this->pocet_polozek = $pocet_polozek;
	for ($i = 1; $i <= $pocet_polozek; $i++)
	{
	    $this->addText('polozka_' . $i, 'Položka', 100)->setAttribute('class', "smallInput");
	    $this->addText('mnozstvi_' . $i, 'Množství', 10)->addCondition(Nette\Forms\Form::FILLED)->addRule(Nette\Forms\Form::INTEGER, 'Množství musí být celé číslo');
	    $this['mnozstvi_' . $i]->setAttribute('class', "smallInput");
	    $this->addText('cena_' . $i, 'Cena', 10)->addCondition(Nette\Forms\Form::FILLED)->addRule(Nette\Forms\Form::FLOAT, 'Cena musí být číslo. Desetiná místa oddělte tečkou');
	    $this['cena_' . $i]->setAttribute('class', "smallInput");
	    $this->addText('dph_' . $i, 'Dph', 10)->addCondition(Nette\Forms\Form::FILLED);
	    $this['dph_' . $i]->setValue($dph)->setAttribute('class', "smallInput");
	    $this->addHidden('id_' . $i);
	}
	$this->addText('id_faktury', 'id faktury')->setAttribute('class', "smallInput");
	$this->addSubmit('send', 'Uložit')->setAttribute('class', "button smallInput");

	if ($values)
	{
	    $i = 1;
	    foreach ($values as $polozka)
	    {
		$this['id_' . $i]->setValue($polozka['id']);
		$this['mnozstvi_' . $i]->setValue($polozka['mnozstvi']);
		$this['polozka_' . $i]->setValue($polozka['popis']);
		$this['cena_' . $i]->setValue($polozka['cena']);
		$this['dph_' . $i]->setValue($polozka['dph']);
		$i++;
	    }
	}
    }

}
?>

