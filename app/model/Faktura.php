<?php

class Faktura extends \Nette\Object
{

    private $odberatel;
    public $polozky = array();
    private $vytvoreno;
    private $zaplaceno;
    private $splatnost;
    private $cislo;
    public $id;
    public $edited;
    public $created;
    public $zpusob_platby;
    public $razitko;
    public $objednavka;

    public function __construct($id = null)
    {
	if ($id)
	{
	    $this->id = $id;
	}
    }

    public function getOdberatel()
    {
	return $this->odberatel;
    }

    public function getSplatnost()
    {
	return $this->splatnost;
    }

    public function getCislo()
    {
	return $this->cislo;
    }

//    public function getPolozky() {
//	return $this->polozky;
//    }

    public function getVytvoreno()
    {
	return $this->vytvoreno;
    }

    public function getZaplaceno()
    {
	return $this->zaplaceno;
    }

    public function setOdberatel($odberatel)
    {
	$this->odberatel = $odberatel;
    }

    public function setVytvoreno($vytvoreno)
    {
	$this->vytvoreno = PrevodnikDatumu::prevestCeskeDatumNaAnglicke($vytvoreno);
    }

    public function setZaplaceno($zaplaceno)
    {
	$this->zaplaceno = PrevodnikDatumu::prevestCeskeDatumNaAnglicke($zaplaceno);
    }

    public function setRazitko($razitko)
    {
	if ($razitko)
	    $this->razitko = 'A';
	else
	    $this->razitko = 'N';
    }
    
    public function setObjednavka($objednavka)
    {
	$this->objednavka = $objednavka;
    }

    public function setPolozky($polozky)
    {
	foreach ($polozky as $polozka)
	{
	    if (isset($polozka['id']))
	    {
		$polozka_n = new Polozka($polozka['id']);
	    }
	    else
	    {
		$polozka_n = new Polozka;
	    }

	    $udaje = array(
		'popis' => $polozka['text'],
		'cena' => $polozka['cena'],
		'dph' => $polozka['dph'],
		'faktura' => $polozka['faktura'],
		'mnozstvi' => $polozka['mnozstvi'],
	    );

	    $polozka_n->setUdaje($udaje);
	    $this->polozky[] = $polozka_n;
	}
    }

    public function setSplatnost($datum)
    {
	$this->splatnost = PrevodnikDatumu::prevestCeskeDatumNaAnglicke($datum);
    }

    public function setCislo($cislo)
    {
	$this->cislo = $cislo;
    }

    public function setUdaje($udaje)
    {
	if (isset($udaje['odberatel']))
	    $this->setOdberatel($udaje['odberatel']);
	if (isset($udaje['datum']) && $udaje['datum'])
	    $this->setVytvoreno($udaje['datum']);
	if (isset($udaje['splatnost']))
	    $this->setSplatnost($udaje['splatnost']);
	if (isset($udaje['cislo']))
	    $this->setCislo($udaje['cislo']);
	if (isset($udaje['zpusob_platby']))
	    $this->zpusob_platby = $udaje['zpusob_platby'];
	if (isset($udaje['zaplaceno']) && $udaje['zaplaceno'])	    
	$this->setZaplaceno($udaje['zaplaceno']);
	if (isset($udaje['razitko']))
	    $this->setRazitko($udaje['razitko']);
	if(isset($udaje['objednavka']))
	$this->setObjednavka ($udaje['objednavka']);
    }

    public function getUdaje()
    {
	$return = array();
	if (isset($this->odberatel))
	    $return['odberatel'] = $this->odberatel;
	if (isset($this->vytvoreno))
	    $return['vytvoreno'] = $this->vytvoreno;
	if (isset($this->zaplaceno))
	    $return['platba'] = $this->zaplaceno;
	if (isset($this->cislo))
	    $return['cislo'] = $this->cislo;
	if (isset($this->splatnost))
	    $return['splatnost'] = $this->splatnost;
	if (isset($this->edited))
	    $return['edited'] = $this->edited;
	if (isset($this->created))
	    $return['created'] = $this->created;
	if (isset($this->zpusob_platby))
	    $return['zpusob_platby'] = $this->zpusob_platby;
	if (isset($this->razitko))
	    $return['razitko'] = $this->razitko;
	if(isset($this->objednavka))
	    $return['objednavka'] = $this->objednavka;
	return $return;
    }

}

?>
