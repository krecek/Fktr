<?php
use Nette\Utils\Strings as Strings;

class Odberatel extends \Nette\Object
{
    private $id;
    private $nazev;
    private $ulice;
    private $mesto;
    private $psc;
    private $osoba;
    private $telefon;
    private $mail;
    private $web;
    private $ico;
    private $dic;
    
    public function __construct($id = null) {
        if($id)
        {
            $this->id = $id;
        }
    }
    public function getId()
    {
	return $this->id;
    }
    
    public function setNazev($nazev)
    {
        $this->nazev = Strings::firstUpper($nazev);
    }
    
    public function setUlice($ulice)
    {
        $this->ulice = Strings::firstUpper($ulice);
    }
    
    public function setMesto($mesto)
    {
        $this->mesto = Strings::firstUpper($mesto);
    }
    
    public function setPsc($psc)
    {
        $this->psc = Strings::firstUpper($psc);
    }
    
    public function setOsoba($osoba)
    {
        $this->osoba = Strings::firstUpper($osoba);
    }
    
    public function setIco($ico)
    {
	$this->ico = $ico;
    }
    
    public function setDic($dic)
    {
	$this->dic = $dic;
    }
    
    public function setUdaje($udaje)
    {
        if(isset($udaje['nazev'])) $this->setNazev($udaje['nazev']);
        if(isset($udaje['ulice'])) $this->setUlice($udaje['ulice']);
        if(isset($udaje['mesto'])) $this->setMesto($udaje['mesto']);
        if(isset($udaje['psc'])) $this->setPsc($udaje['psc']);
        if(isset($udaje['osoba'])) $this->setOsoba($udaje['osoba']);
        if(isset($udaje['telefon'])) $this->telefon = $udaje['telefon'];
        if(isset($udaje['mail'])) $this->mail = $udaje['mail'];
        if(isset($udaje['web'])) $this->web = $udaje['web'];
	if(isset($udaje['ico'])) $this->setIco($udaje['ico']);
	if(isset($udaje['dic'])) $this->setDic($udaje['dic']);
    }
    
    public function getUdaje()
    {
	$udaje = array();
        if(isset($this->id)) $udaje['id']=$this->id;
        if(isset($this->nazev)) $udaje['nazev']=$this->nazev;
        if(isset($this->ulice)) $udaje['ulice']=$this->ulice;
        if(isset($this->mesto)) $udaje['mesto']=$this->mesto;
        if(isset($this->psc)) $udaje['psc']=$this->psc;
        if(isset($this->osoba)) $udaje['osoba']=$this->osoba;
        if(isset($this->telefon)) $udaje['telefon']=$this->telefon;
        if(isset($this->mail)) $udaje['mail']=$this->mail;
        if(isset($this->web)) $udaje['web']=$this->web;
        if(isset($this->ico)) $udaje['ico']=$this->ico;
        if(isset($this->dic)) $udaje['dic']=$this->dic;
	return $udaje;
    }
            
    
  
}

?>
