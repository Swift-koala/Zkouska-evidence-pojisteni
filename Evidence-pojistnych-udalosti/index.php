<?php
header("Pragma: no-cache");
session_start();
mb_internal_encoding("UTF-8");

require_once('Databaze-pojistenci.php');
require_once('Evidence.php');

databaze::pripoj('localhost', 'root', '', 'db_evidence');

$evidence = new evidence();
//$ulozPojistence = $evidence->pridejPojisteneho();
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
                <ul class="container">
                    <li class="NoBulletPoints"><span class="AppName">Pojištění app</span></li>                      
                    <li class="NoBulletPoints links"><a href="index.php">Pojištěnci</a></li>
                    <li class="NoBulletPoints links"><a href="OAplikaci.html">O aplikaci</a></li>   
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <h2>Pojištěnci</h2>
                <table>
                    <tr>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Věk</th>
                        <th>Telefon</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            </section>
                </table>    
            <section>
                <h2>Nový pojištěnec</h2>
                <form>
                    <fieldset>
                        <legend>Identifikace nového pojištěnce</legend>
                        <label for="jmeno">Jméno</label>
                        <input name="jmeno" placeholder="Jan" id="jmeno" class="form-item">
                        <label for="prijmeni">Příjmení</label>
                        <input name="prijmeni" placeholder="Jan" id="prijmeni" class="form-item">
                        <label for="vek">Věk</label>
                        <input type="number" name="vek" placeholder="31" id="vek" class="form-item">
                    </fieldset>
                    <fieldset>
                        <legend>Kontaktní údaje</legend>
                        <label for="telefon">Telefon</label>
                        <input type="number" name="telefon" placeholder="731 584 972" id="telefon" class="form-item">
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
