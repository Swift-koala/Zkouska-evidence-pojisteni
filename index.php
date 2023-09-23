<?php
header("Pragma: no-cache");
session_start();
mb_internal_encoding("UTF-8");

require_once('Databaze-pojistenci.php');
require_once('Evidence.php');

databaze::pripoj('localhost', 'root', '', 'db_evidence');

$evidence = new evidence();
if(isset($_POST['jmeno'])) {
$ulozPojistence = $evidence->pridejPojisteneho($_POST['jmeno'], $_POST['prijmeni'], $_POST['vek'], $_POST['telefon']);
unset($_POST);}
?>
<!DOCTYPE html>
<html lang="cs-cz">
    <head>
        <meta charset="UTF-8">
        <title>Pojištěnci</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <nav>
                  <div class="nav-wrapper">
                    <ul class="container">
                    <li class="no-bullet-points"><span class="app-name">Pojištění app</span></li>                      
                    <li class="no-bullet-points links"><a href="OAplikaci.html">O aplikaci</a></li>   
                  </div>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                 <h2 class="novy-pojistenec">Nový pojištěnec</h2>
                <table>
                    <tr>
                        <th>Jméno</th>
                        <th class="prijmeni">Příjmení</th>
                        <th class="vek">Věk</th>
                        <th class="telefon">Telefon</th>
                    </tr>
                     <h2 class="pojistenci">Pojištěnci</h2>
                <?php
                    $evidence->vypisSeznam();
                ?>
                 </table>
            </section>    
            <section>
                <h2 class="novyPojistenec">Nový pojištěnec</h2>
                <form action="index.php" method="POST">
                    <fieldset>
                        <legend>Identifikace nového pojištěnce</legend>
                        <label for="jmeno">Jméno</label>
                        <input name="jmeno" placeholder="Jan" id="jmeno" class="form-item">
                        <br>
                        <label for="prijmeni">Příjmení</label>
                        <input name="prijmeni" placeholder="Jan" id="prijmeni" class="form-item">
                        <br>
                        <label for="vek">Věk</label>
                        <input type="number" name="vek" placeholder="31" id="vek" class="form-item">
                    </fieldset>
                    <fieldset>
                        <legend>Kontaktní údaje</legend>
                        <label for="telefon">Telefon</label>
                        <br>
                        <input type="number" name="telefon" placeholder="731 584 972" id="telefon" class="form-item-phone">
                    </fieldset>
                    <button type="submit">Uložit</button>
                </form>
            </section>
        </main>
         <footer>
              <p>Autor: David Šalda</p>
         </footer>
        <?php
                    
    ?>
</body>
</html>
