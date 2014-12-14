<?php

class Polozka extends \Nette\Object {

    public $id;
    private $faktura;
    private $popis;
    private $cena;
    private $dph;
    private $mnozstvi;
    public $errors = array();
    public $stav = 'new';

    public function __construct($id = null) {
        if ($id) {
            $this->id = $id;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getFaktura() {
        return $this->faktura;
    }

    public function getPopis() {
        return $this->popis;
    }

    public function getCena() {
        return $this->cena;
    }

    public function getDph() {
        return $this->dph;
    }

    public function getMnozstvi() {
        return $this->mnozstvi;
    }

    public function setFaktura($faktura) {
        $this->faktura = $faktura;
    }

    public function setPopis($popis) {
        $this->popis = $popis;
    }

    public function setCena($cena) {
        $this->cena = $cena;
    }

    public function setDph($dph) {
        $this->dph = $dph;
    }

    public function setMnozstvi($mnozstvi) {
        $this->mnozstvi = $mnozstvi;
    }

    public function jeChyba() {
        if (count($this->errors))
            return TRUE;
        else {
            return FALSE;
        }
    }

    public function setUdaje($udaje) {
	dd($udaje, 'udaje');
        if (isset($udaje['popis']))
            $this->setPopis($udaje['popis']);
        if (isset($udaje['cena']))
            $this->setCena($udaje['cena']);
        if (isset($udaje['dph']))
            $this->setDph($udaje['dph']);
        if (isset($udaje['faktura']))
            $this->setFaktura($udaje['faktura']);
        if (isset($udaje['mnozstvi']))
            $this->setMnozstvi($udaje['mnozstvi']);
    }

    public function getudaje() {
        if (isset($this->id))
            $return['id'] = $this->id;
        if (isset($this->faktura))
            $return['faktura'] = $this->faktura;
        if (isset($this->popis))
            $return['popis'] = $this->popis;
        if (isset($this->cena))
            $return['cena'] = $this->cena;
        if (isset($this->dph))
            $return['dph'] = $this->dph;
        if (isset($this->mnozstvi))
            $return['mnozstvi'] = $this->getMnozstvi();
        return $return;
    }

}

?>
