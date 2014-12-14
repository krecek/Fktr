<?php
use Nette\Application\UI\Form;
class upravitOdberateleForm extends Form
{
    public function __construct($values=null) {
        parent::__construct();
        $this->addText('nazev', 'Název:', 50)->setAttribute('class', "smallInput");
        $this->addText('ulice', 'Ulice a číslo domu:')->setRequired('Vyplňte ulici a číslo domu')->setAttribute('class', "smallInput");
        $this->addText('mesto', 'Město:')->setRequired('Vyplňte město')->setAttribute('class', "smallInput");
        $this->addText('psc', 'PSČ:')->setAttribute('class', "smallInput");
        $this->addText('ico', 'IČO:')->setAttribute('class', "smallInput")->addCOndition(Nette\Forms\Form::FILLED)->addRule(Nette\Forms\Form::LENGTH, 'IČO musí obsahovat přesně %d znaků', 8);
        $this->addText('dic', 'DIČ:')->setAttribute('class', "smallInput")->addCondition(Nette\Forms\Form::FILLED)->addRUle(Nette\Forms\Form::MAX_LENGTH, 'DIČ musí obsahovat maximálně %d znaků', 10);
        $this->addText('osoba', 'Kontaktní osoba')->setAttribute('class', "smallInput");
        $this->addText('telefon', 'Telefon:')->setAttribute('class', "smallInput");
        $this->addText('mail', 'Mail:')->setAttribute('class', "smallInput")->addCondition(\Nette\Forms\Form::FILLED)->addRule(\Nette\Forms\Form::EMAIL, 'Neplatný e-mail');
        $this->addText('www', 'Web')->setAttribute('class', "smallInput")->addCondition(\Nette\Forms\Form::FILLED)->addRule(\Nette\Forms\Form::URL, 'Neplatná adresa');
        $this->addSubmit('send', 'Uložit')->setAttribute('class', 'btn btn-primary');
        
        if($values)
        {
            $this->setDefaults($values);
	    if($this['ico']->getValue()==0) {
		$this['ico']->setValue('');
	    }
        }
    }
    
 
    
    
}

?>
