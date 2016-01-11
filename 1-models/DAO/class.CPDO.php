<?php

/**
 * Description of CPDO
 * classe de connesion à PDO (singleton)
 * CPDO::get() renvoi l'instance de pdo en cour et la crée si non disponible
 * @author alala
 */

class CPDO{
 
  private static $instance = null;

  const DEFAULT_SQL_USER = 'root';
 
  const DEFAULT_SQL_HOST = '127.0.0.1';
 
  const DEFAULT_SQL_PASS = 'le_titi_mysql@76000';
 
  const DEFAULT_SQL_DTB = 'tppjdb';
 
  private function __construct()
  {
    self::$instance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS); 
    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    self::$instance->exec("SET CHARACTER SET utf8");
  }
 
  public static function get()
  {  
    if(is_null(self::$instance))
    {
      new CPDO();
    }
    return self::$instance;
  }
}
?>
