<?php

include 'db_connection.php';

/// ustawianie uprawnienia
if (isset($_POST['zaloguj']) && $_POST['zaloguj'] == 'Zaloguj') {
    $login = $_POST['Login'];
    $passwd = $_POST['Haslo'];
    $sql = "SELECT * FROM uzytkownicy WHERE Login='".$login."' AND Haslo='".$passwd."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $uzytkownik = $result->fetch_assoc();
        $_SESSION['level'] = $uzytkownik['Uprawnienia'];
        $_SESSION['zalogowany'] = 1;
    }
}

/// wylogowanie i usuwanie uprawnienia
if (isset($_GET['wyloguj'])) {
    session_unset();
}



/// sprawdzanie uprawnienia

if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = '0';
}

$level = intval($_SESSION['level']);

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Systemy internetowe</title>
    <meta charset="utf-8">
    <meta name="Description" content="Strona na SI" />


    <link rel="stylesheet" type="text/css" href="strona.css">

</head>

<body>
    <header>
        <h1>LOGO</h1>
    </header>

    <div class="flex-container">

        <div class="odnAll">
            <div class="odn">
                <ul>
                    <li><a href="index.php?subpage=home">Home</a></li>


                </ul>
            </div>
            
            <?php
                if ($level >= 1) {
                    echo '<div class="odn">
                   <ul>

                        <li><a href="index.php?subpage=form">Formularz dodawania</a></li>

                    </ul>
                
            </div>';
        }
        ?>
            <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=sesja">Sesja</a></li>

                </ul>
                </div>

                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=baza_pracownikow">Baza pracowników</a></li>

                </ul>
                </div>

                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=edytowanie_pracownika">Edycja pracowników</a></li>

                </ul>
                </div>

                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=usuniecie_pracownika">Usuwanie pracowników</a></li>

                </ul>
                </div>
                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=zmiana_danych">Zmiana danych</a></li>

                </ul>
                </div>
                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=zmiana_poziomu">Zmiana poziomu dostępu</a></li>

                </ul>
                </div>
                <div class="odn">
                <ul>

                    <li><a href="index.php?subpage=usuwanie_uzytkownika">Usuwanie uzytkownika</a></li>

                </ul>
                </div>
        </div>

        <div class="form-container">
            <div class="form" >
        

        <?php
        if(isset($_GET["subpage"]))
        {//echo $_GET["subpage"];
            switch($_GET["subpage"]){
                
            case "form":
                include "form.php";
                break;

            case "baza_pracownikow":
                        include "baza_pracownikow.php";
                        break;
            case "edycja_pracownika":
                        include "edycja_pracownika.php";
                        break;
            case "usuniecie_pracownika":
                        include "usuniecie_pracownika.php";
                        break;
            case "zmiana_danych":
                        include "zmiana_danych.php";
                        break;
            case "zmiana_poziomu":
                        include "zmiana_poziomu.php";
                        break;
            case "rejestracja":
                        include "rejestracja.php";
                            break;
            case "zaloguj":
                        include "zaloguj.php";
                        break;
            case "usuwanie_uzytkownika":
                        include "usuwanie_uzytkownika.php";
                        break;
            case "usun_rekord":
                include "usun_rekord.php";
                break;

            case "edytuj_pracownika":
                include "edytuj_pracownika.php";
                break;

            case "edytowanie_pracownika":
                include "edytowanie_pracownika.php";
                break;

            default:
                include"home.php";
                break;
            }
        }
        ?>

</div>

</div>



        

        <div class="wyszukiwarka">
            <div class="lista">


            <form method = POST>

                <div class = "row"><label for="Wyszukiwanie">Wyszukaj pracownika:</label>
                <input type="text" name="Wyszukiwanie"></div>
                
               <div class = "row"> <input type="submit" name = "Szukaj" value="Szukaj"></div>

            </form>
            <?php
            if (!isset($_SESSION['zalogowany'])) {
                echo '<br>
                <a href="index.php?subpage=rejestracja">Rejestracja</a>
                <br>
                <br>
                <a href="index.php?subpage=zaloguj">Zaloguj</a>';
            } else {
                echo '
                <br>
                <a href="index.php?wyloguj">Wyloguj</a>';
            }
                ?>

            </div>

           

        </div>


    </div>


    <footer>
        <p>Stopka</p>
    </footer>

</body>

</html>