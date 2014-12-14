<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var FakturyRepository */
    public $fakturyRepository;
    
    /** @var OdberateleRepository  */
    protected $odberateleRepository;
    
    /** @var KonfiguraceRepository */
    public $konfigurace;
    
    /** @var PolozkyRepository */
     public $polozkyRepository;
     
     public $mainItem;
    
    public function startup() {
	parent::startup();
	$this->odberateleRepository = $this->getService('odberateleRepository');
	$this->fakturyRepository = $this->getService('fakturyRepository');
	$this->konfigurace = $this->getService('konfigurace');
	$this->polozkyRepository = $this->getService('polozkyRepository');
    }
    
    public function beforeRender()
    {
	parent::beforeRender();
	$this->template->mainItem = $this->mainItem;
    }
    
    public function logg($text)
    {
	;
    }
    
 
}
