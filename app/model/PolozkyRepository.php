<?php

class PolozkyRepository extends Repository
{
    public function savePolozka($polozka)
    {
	if(!$polozka->id)
	{
	   return $this->getTable()->insert($polozka->getUdaje());
	}
	else return $this->getTable()->where('id', $polozka->id)->update($polozka->getUdaje());
	 
    }
    
    public function delete($id)
    {
	return $this->getTable()->where('id', $id)->delete();
    }
    
    public function deletePolozkyFaktury($id_faktury)
    {
	return $this->getTable()->where('faktura', $id_faktury)->delete();
    }
    
    public function findByFaktura($id_faktury) {
	return parent::findBy(array('faktura' =>$id_faktury));
    }
}

?>
