<?php

/**
 * Description of OdberatelePresenter
 *
 * @author Jana
 */
class OdberatelePresenter extends BasePresenter
{
  
    protected $id;
    protected $filtr;
    public $referer;
    public $mainItem = 'odberatele';

    public function startup() {
        parent::startup();
        
    }

    public function actionDefault($nazev=null, $mesto=null,$mail=null, $telefon=null) {
	$this->filtr['nazev']=$nazev;
	$this->filtr['mesto']=$mesto;
	$this->filtr['mail']=$mail;
	$this->filtr['telefon']=$telefon;
        $this->template->odberatele = $this->odberateleRepository->aktivniOdberatele($this->filtr);
    }

//    public function renderDefault() {
//        $this->template->odberatele = $this->odberateleRepository->findAll();
//    }
    
    public function actionPrehled($id)
    {
        $this->id = $id;
        $this->template->odberatel = $this->odberateleRepository->findById($id);
    }
    
    protected function createComponentOdberateleFiltrform() {
	$form = new FiltrOdberateleForm($this->filtr);
	$form->onSuccess[]= callback($this, 'odberateleFiltrFormSubmitted');
	return $form;
    }
    
    public function odberateleFiltrFormSubmitted($form)
    {
	$values = $form->getValues();
	$this->redirect('default', array(
	    'nazev'=>$values['nazev'],
	    'mesto'=>$values['mesto'],
	    'mail'=>$values['mail'],
	    'telefon'=>$values['telefon'],
		));
    }

    public function actionAdd($referer=null) {
        if(!$referer) $this->referer='default';
    }
    
    protected function createComponentAddOdberatelForm() {
        $form = new upravitOdberateleForm();
        $form->onSuccess[]=callback($this, 'addOdberatelFormSubmitted');
        return $form;
    }
    
    public function addOdberatelFormSubmitted(upravitOdberateleForm $form)
    {
        $values = $form->getValues();
	$odberatel = new Odberatel;
	$odberatel->setUdaje($values);
	$zaznam = $this->odberateleRepository->save($odberatel);
	$this->logg('Přidán odběratel id: '.$zaznam['id'].' nazev: '.$zaznam['nazev']);
	 $this->flashMessage('Byl vložen nový odběratel');
	 $this->redirect($this->referer);
    }

    public function actionRemove() {
        
    }

    public function actionEdit($id) {
        $this->id = $id;
    }
    
    protected function createComponentEditOdberatelForm()
    {
        $values = $this->odberateleRepository->findById($this->id);
	if(!$values['ico']) unset($values['ico']);
	if(!$values['dic']) unset($values['dic']);
	dd($values, 'values');
        $form = new upravitOdberateleForm($values);
        $form->onSuccess[]=callback($this, 'editOdberatelFormSubmitted');
        return $form;
    }
    
    public function editOdberatelFormSubmitted(upravitOdberateleForm $form)
    {
        $values = $form->getValues();
	$odberatel = new Odberatel($this->id);
	$odberatel->setUdaje($values);
	$zaznam = $this->odberateleRepository->save($odberatel);
	$this->logg("Odběratel $zaznam[id] byl upraven");
	$this->flashMessage('Odběratel byl upraven');
	$this->redirect('default');
    }
    
    public function actionDelete($id)
    {
        $this->odberateleRepository->remove($id);
	$this->logg('Odběratel '.$id.' smazán');
        $this->flashMessage('Odběratel byl smazán');
        $this->redirect('default');
    }
    
    public function actionPotvrzeni()
    {
	$this->template->podobni_odberatele = '';
    }

}