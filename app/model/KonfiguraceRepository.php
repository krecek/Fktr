<?php

class KonfiguraceRepository extends Repository
{

    public $pocetPolozek;
    public $dph;
    public $cislo_faktury;
    public $banka;
    public $cislo_uctu;
    public $ic;
    public $dic;
    public $nazev;
    public $ulice;
    public $mesto;
    public $psc;
    public $telefon;
    public $email;

    public function __construct(\Nette\Database\Connection $db) {
	parent::__construct($db);
	foreach ($this->findAll() as $row) {
	    if ($row->nazev == 'pocet_polozek') {
		$this->pocetPolozek = $row->hodnota;
	    }
	    if ($row->nazev == 'dph') {
		$this->dph = $row->hodnota;
	    }
	    if ($row->nazev == 'cislo_faktury') {
		$this->cislo_faktury = $row->hodnota;
	    }
	    if ($row->nazev == 'banka') {
		$this->banka = $row->hodnota;
	    }
	    if ($row->nazev == 'cislo_uctu') {
		$this->cislo_uctu = $row->hodnota;
	    }
	    if ($row->nazev == 'ic') {
		$this->ic = $row->hodnota;
	    }
	    if ($row->nazev == 'dic') {
		$this->dic = $row->hodnota;
	    }
	    if ($row->nazev == 'nazev') {
		$this->nazev = $row->hodnota;
	    }
	    if ($row->nazev == 'ulice') {
		$this->ulice = $row->hodnota;
	    }
	    if ($row->nazev == 'mesto') {
		$this->mesto = $row->hodnota;
	    }
	    if ($row->nazev == 'psc') {
		$this->psc = $row->hodnota;
	    }
	    if ($row->nazev == 'telefon') {
		$this->telefon = $row->hodnota;
	    }
	    if ($row->nazev == 'email') {
		$this->email = $row->hodnota;
	    }
	}
    }
    
    public function ulozitHodnotu($id,$hodnota)
    {
	return $this->getTable()->where('id', $id)->update(array('hodnota'=>$hodnota));
    }

}
