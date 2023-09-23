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
                SELECT `jmeno`, `prijmeni`, `vek`, `telefon`
                FROM `evidence`
                ');
                    return $vysledek -> fetchAll();
        }
        
        /**
         * Vypise seznam pojistencu
         * @return string
         */
            
        public function vypisSeznam(): void
        {
        $seznam = $this->vyberPojistence(); 
        if ($seznam) {
            echo('<table>');
            foreach ($seznam as $pojistenec) {
                echo('<tr><td>');
                echo(htmlspecialchars($pojistenec['jmeno']));
                echo('</td>');
                echo('<td>');
                echo(htmlspecialchars($pojistenec['prijmeni']));
                echo('</td>');
                echo('<td>');
                echo(htmlspecialchars($pojistenec['vek']));
                echo('</td>');
                echo('<td>');
                echo(htmlspecialchars($pojistenec['telefon']));
                echo('</td></tr>');
        }
            echo('<table>');
        }


	
        }
        // Vypise seznam pojistenych
        public function vypis(): void
{
	$this->vypisSeznam(); 
}
        
}