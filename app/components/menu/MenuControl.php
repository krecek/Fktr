<?php

class MenuControl extends Nette\Application\UI\Control
{
    public $mainItem;
    public function __construct($mainItem)
    {
	parent::__construct();
	$this->mainItem = $mainItem;
	$this->template = 'Menu.latte';
        dd('');
    }
    
}
