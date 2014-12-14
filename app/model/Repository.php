<?php
abstract class Repository extends Nette\Object
{
    /**
     *
     * @var NConnection 
     */
    public $connection;
    
    public function __construct(Nette\Database\Connection $db) {
        $this->connection = $db;
    }
    
    /**
     * 
     * @return NTableSelection
     */
    public function getTable()
    {
        // název tabulky odvodit z názvu třídy
        preg_match('#(\w+)Repository$#', get_class($this), $m);
        $string = $m[1];
        $string[0] = strtolower($string[0]);
        return $this->connection->table($string);
    }
    /**
     * 
     * @return NTableSelection
     */
    public function findAll()
    {
        return $this->getTable();
    }
    
    /**
     * 
     * @return NTableSelection
     */
    public function findBy(array $by)
    {
        return $this->getTable()->where($by);
    }
    
     public function findById($id)
    {
        return $this->findBy(array('id'=>$id))->fetch();
    }
 }
?>
