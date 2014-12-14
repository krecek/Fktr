<?php
use Nette\Application\UI\Form as Form;
class FiltrFakturyForm extends Form
{
    public function __construct($roky,$values=null) {
        parent::__construct();
        $this->addSelect('rok', 'Rok:', $roky)->setPrompt('--Zvolte rok--')->setAttribute('class', "smallInput");
        $this->addText('odberatel', 'Odběratel:', 50)->setAttribute('class', "smallInput");
        $this->addSelect('zaplaceno', 'Zaplaceno:', array('ano'=>'zaplaceno', 'ne'=>'nezaplaceno'))->setPrompt('--Zvolte typ--')->setAttribute('class', "smallInput");
        $this->addSubmit('send', 'Vyhledat');
	
	if($values)
	{
	    $this->setDefaults($values);
	}
    }
}
