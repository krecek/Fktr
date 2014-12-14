<?php
class KonfiguracePresenter extends BasePresenter
{
    private $id;
    public $mainItem = 'konfigurace';
    public function actionDefault()
    {
	$this->template->polozky = $this->konfigurace->findAll();
    }
    
    public function actionEdit($id)
    {
	$this->id = $id;
	$this->template->polozka = $this->konfigurace->findById($this->id);
    }
    
    protected function createComponentUpravitPolozkuForm()
    {
	$value = $this->konfigurace->findById($this->id)->hodnota;
	$form = new UpravitKonfiguraciForm($value);
	$form->onSuccess[]=callback($this, 'upravitPolozkuFormSubmitted');
	return $form;
    }
    
    public function upravitPolozkuFormSubmitted(UpravitKonfiguraciForm $form)
    {
	$values = $form->getValues();
	$this->konfigurace->ulozitHodnotu($this->id, $values->hodnota);
	$this->flashMessage('Hodnota byla upravena');
	$this->redirect('default');
    }
}

