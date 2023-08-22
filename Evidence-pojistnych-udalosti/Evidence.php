<?php

class evidence
{
        /**
         * Prida pojistence do DB
         * @param string $jmeno jmeno
         * @param string $prijmeni prijmeni
         * @param int $vek vek
         * @param int $telefon telefon
         * @return void
         */
        public function pridejPojisteneho(string $jmeno, string $prijmeni, int $vek, int $telefon): void
        {
            databaze::dotaz('
            INSERT INTO `evidence`
            (`jmeno`, `prijmeni`, `vek`, `telefon`)
            VALUES (?,?,?,?)',
          array($jmeno, $prijmeni, $vek, $telefon)); 
        }
            
            
        /**
         * @Vybere pojistence z DB
         * @return array Pojistenci
         */
        private function vyberPojistence(): array
        {
                $vysledek = Databaze::dotaz('
                SELECT `jmeno`, `prijmeni`, `vek`, `telefon`)
                FROM `evidence`
                LIMIT 10
                ');
                    return $vysledek -> fetchAll();
        }
        
        /**
         * Vypise seznam pojistencu
         * @return string
         */
            
        private function vypisSeznam(): void
        {
        $seznam = $this->vyberPojistence(); // call the correct function and add a semicolon
        if ($seznam) {
            echo('<table border="1">');
            foreach ($seznam as $pojistenec) {
                echo('<tr><td>');
                echo(htmlspecialchars($pojistenec['jmeno']));
                echo(htmlspecialchars($pojistenec['prijmeni']));
                echo(htmlspecialchars($pojistenec['vek']));
                echo(htmlspecialchars($pojistenec['telefon']));
                echo('</td></tr>');
        }
            echo('<table>');
        }


	
        }
        // Vypise seznam pojistenych
        public function vypis(): void
{
	$this->vypisSeznam(); // change the function name to match the definition
}
        
}