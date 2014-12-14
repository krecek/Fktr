<?php

class FakturyRepository extends Repository {

    /** @var PolozkyRepository */
    public $polozkyRepository;
   
    /** @var KonfiguraceRepository */
    public $konfigurace;

    public function __construct(\Nette\Database\Connection $db, PolozkyRepository $polozkyRepository, KonfiguraceRepository $konfigurace) {
        parent::__construct($db);
        $this->polozkyRepository = $polozkyRepository;
    }

    public function vyhledatFaktury($filtr) {
        $query_filtr = "1=1 ";
        if (isset($fitr['rok']))
            $query_filtr.=" AND vytvoreno>='$filtr[rok]-01-01' AND vytvoreno<='$filtr[rok]'-12-31";
        if (isset($filtr['odberatel']))
            $query_filtr.=" AND (o.nazev LIKE '%$filtr[odberatel]%' OR o.id='$filtr[odberatel]' OR o.ulice='%filtr[odberatel]%' OR o.ulice='%filtr[mesto]%' OR o.ulice='%filtr[osoba]%')";
        if (isset($filtr['zaplaceno'])) {
            if ($filtr['zaplaceno'] == 'ano')
                $query_filtr.=' AND platba IS NOT NULL';
            if ($filtr['zaplaceno'] == 'ne')
                $query_filtr.=' AND platba IS NULL';
        }
        $query = "SELECT f.*, o.nazev, o.ulice, o.mesto FROM faktury f LEFT JOIN odberatele o ON o.id=f.odberatel WHERE $query_filtr ORDER BY vytvoreno DESC";
        return $this->connection->query($query)->fetchAll();
    }

    public function saveFaktura(Faktura $faktura) {
        if (!$faktura->id) {
            $zaznam = $this->getTable()->insert($faktura->getUdaje());
            $cislo_faktury = \Nette\Utils\Strings::substring($faktura->cislo, 0, \Nette\Utils\Strings::length($faktura->cislo)-2);
	    $this->connection->query('UPDATE konfigurace SET hodnota="'.$cislo_faktury.'" WHERE nazev="cislo_faktury"');
	    
        } else {
	    $faktura->edited = date('Y-m-d H:i:s');
	    $this->getTable()->where('id', $faktura->id)->update($faktura->getUdaje());
	    $zaznam = $this->vyhledatFakturu($faktura->id);
        }
        return $zaznam;
    }

    public function delete($id) {
        $this->polozkyRepository->deletePolozkyFaktury($id);
        return $this->getTable()->where('id', $id)->delete();
    }

    public function vyhledatFakturu($id) {
        $faktura = $this->findById($id);
        $faktura['polozky'] = $this->polozkyRepository->findByFaktura($id);
        return $faktura;
    }

    public function ulozitPolozky(Faktura $faktura) {
        $polozky = $faktura->polozky;
        $stare_polozky = $this->polozkyRepository->findByFaktura($faktura->id)->fetchPairs('id', 'id');
        foreach ($polozky as $polozka) {
            if ($polozka->popis) {
                $this->polozkyRepository->savePolozka($polozka);
                if (isset($stare_polozky[$polozka->id])) unset($stare_polozky[$polozka->id]);
            }
        }
        if (count($stare_polozky)) 
        {
            foreach ($stare_polozky as $id)
            {
                $this->polozkyRepository->delete($id);
            }
        }
	$this->saveFaktura($faktura);
    }
    
    public function vytisknout($id_faktury)
    {
	$this->getTable()->where('id', $id_faktury)->update(array('tisk'=>date('Y-m-d H:i:s')));
    }
    
    public function getRoky()
    {
	foreach ($this->getTable()->select('id, YEAR(vytvoreno) AS rok')->group('YEAR(vytvoreno)')->order('rok DESC') as $rok)
	{
	    $return[$rok->rok]=$rok->rok;
	}
	return $return;
    }

}

?>
