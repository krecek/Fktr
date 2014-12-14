<?php

class OdberateleRepository extends Repository
{
    public function remove($id_odberatele)
    {
        $this->getTable()->where('id', $id_odberatele)->update(array('aktivni'=>'N'));
    }
    
    public function save(Odberatel $odberatel)
    {
	if(!$id=$odberatel->getId())
	{
	    return $this->getTable()->insert($odberatel->getUdaje());
	}
	else{
	    return $this->getTable()->where('id', $id)->update($odberatel->getUdaje());
	}
    }
    
    public function findById($id)
    {
        return $this->findBy(array('id'=>$id))->fetch();
    }
    
    public function aktivniOdberatele($filtr=null)
    {
	$query_filtr ='';
        if($filtr)
        {
            if(isset($filtr['nazev'])) $query_filtr.= "AND nazev LIKE '%$filtr[nazev]%'";  
            if(isset($filtr['mesto'])) $query_filtr.= "AND mesto LIKE '%$filtr[mesto]%'";  
            if(isset($filtr['mail'])) $query_filtr.= "AND mail LIKE '%$filtr[mail]%'";  
            if(isset($filtr['telefon'])) $query_filtr.= "AND telefon LIKE '%$filtr[telefon]%'";  
        }
	$query = "SELECT * FROM odberatele WHERE aktivni='A' $query_filtr";
	$return = $this->connection->query($query)->fetchAll();
        return $return;
    }
    
    public function jeShodnyOdberatel(Odberatel $odberatel)
    {
	$where = array();
	$hodnoty = $odberatel->getUdaje();
	//shodná adresa nebo shodný název nebo shodný mail nebo shodný telefon
	if($hodnoty['nazev'])$where[]=" nazev='$hodnoty[nazev]'";
	if($hodnoty['mail'])$where[]="  mail='$hodnoty[mail]'";
	if($hodnoty['telefon'])$where[]=" telefon='$hodnoty[telefon]'";
	if($hodnoty['mesto']&& $hodnoty['ulice'])$where[]=" (mesto='$hodnoty[mesto]' AND ulice='$hodnoty[ulice]')";
	$query_where = join(' OR ', $where);
	
	$query = "SELECT COUNT(*) as pocet FROM odberatele WHERE $query_where";
	$pocet= $this->connection->query($query)->fetch();
	return ($pocet['pocet'])?TRUE:FALSE;
	
    }
}

?>
