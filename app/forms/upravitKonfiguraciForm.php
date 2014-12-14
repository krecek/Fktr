<?php
class UpravitKonfiguraciForm extends \Nette\Application\UI\Form
{
    public function __construct($value) {
	parent::__construct();
	$this->addText('hodnota', 'Hodnota')->setValue($value)->setAttribute('class', "smallInput");
	$this->addSubmit('send', 'Uložit')->setAttribute('class', 'btn btn-primary')->setAttribute('class', "smallInput");
    }
}

