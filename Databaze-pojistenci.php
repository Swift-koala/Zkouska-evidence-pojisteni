<?php

class Databaze
{

    /**
     * @var PDO spojeni s DB
     */
     private static PDO $spojeni;
     
     /**
      * deklaruje privatni atribut pojmenovany $nastaveni typu array
      * tento atribut obsahuje nastaveni pro pripojeni k databazi
      * PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION znamena, ze PDO vyhodi exceptions
      * v pripade erroru
      * PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" znamena, ze PDO vykona tento SQL
      * prikaz pri pripojovani k MySQL
      * @var array nastaveni DB
      */
      
      private static $nastaveni = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      );
      
      /**
       * Definuje verejnou statickou metodu, ktera na vstupu bere 4 parametry typu string
       * Tato metoda se napojuje na databazi prostrednictvim predanych parametru a vraci PDO objekt
       * Pokud pripojeni jiz existuje, vrati jiz vytvorene spojeni, misto tvorby noveho
       */
      
      /**
       * Pripoji se k DB
       * @param string $host Host
       * @param string $pojistenec Pojistenec
       * $param string $heslo Heslo
       * $param string $databaze Databaze k pripojeni
       * @return PDO spojeni
       */
      
      public static function pripoj(string $host, string $pojistenec, string $heslo, string $databaze): PDO
      {
          /**
           * Kontroluje jestli atribut $spojeni je nastaven nebo zda nikoliv
           */
          
      if (!isset(self::$spojeni)) {
             
             /**
              * pokud nastavene neni vytvori novy PDO objekt prostrednictvim predanych parametru
              *  a nastaveni z atributu $nastaveni
              */
             
             /**
              *  @ symbol potlacuje jakekoliv errory nebo upozorneni, ktere mohou vyvstat
              * behem pripojovani
              */
      
             self::$spojeni = @new PDO(
                     "mysql:host=$host;dbname=$databaze",
                     $pojistenec,
                     $heslo,
                     self::$nastaveni
             );            
      }    
      // Vrati atribut $spojeni, ktery ma v sobe ulozeny PDO objekt
      return self::$spojeni;
      }
      
      /**
       * Definuje verejnou statickou metodu pojmenovanou dotaz, ktera na vstupu
       * bere 2 parametry string a array.
       */
      
      /**
       * Tato metoda spusti SQL dotaz s vyuzitim danych parametru a vrati PDOstatement objekt
       */
      
      /**
       * SQL dotaz
       * @param string $sql SQL dotaz
       * @param array $parametry Parametry dotazu
       * @return PDOstatement SQL odpoved
       */
      
      public static function dotaz(string $sql, array $parametry = array()):PDOStatement
      {
          /**
           * Zavola metodu prepare na atributu $spojeni s parametrem $sql jako s argumentem
           * Tato metoda pripravi SQL staement na spusteni a vraci PDOStaement objekt
           */
          
          $dotaz = self::$spojeni->prepare($sql);
          
          /**
           * Zavola metodu execute na promenne $dotaz s parametry $parametry jako s argumentem
           * Tato metoda vykona pripraveny statement s predanymi parametry a vrati true
           * nebo false v zavisloti na uspechu nebo neuspechu vykonani prikazu
           */
          
          $dotaz->execute($parametry);
          
          /**
           * vraci promenou $dotaz, ktera ma v soba PDOStatement objekt
           */
          return $dotaz;
      }     
}
            