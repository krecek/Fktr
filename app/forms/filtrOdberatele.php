<?php
use Nette\Application\UI\Form as Form;
class FiltrOdberateleForm extends Form
{
    public function __construct($values=null) {
        parent::__construct();
        $this->addText('nazev', 'Název:')->setAttribute('class', "smallInput");
        $this->addText('mesto', 'Město:')->setAttribute('class', "smallInput");
        $this->addText('mail', 'Mail:')->setAttribute('class', "smallInput");
        $this->addText('telefon', 'Telefon:')->setAttribute('class', "smallInput");
        $this->addSubmit('send', 'Vyhledat')->setAttribute('class', "smallInput");
	
	if($values)
	{
	    $this->setDefaults($values);
	}
    }
}


?>
