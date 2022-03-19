<?php 

$email;
$imie;
$nazwisko;
$nazwisko_panienskie;
$kod;
$plec;
$imieERR="";
$nazwiskoERR="";
$nazwiskoPanERR="";
$emailERR="";
$kodERR="";
$OK=true;
$validationERR="";

if (isset($_POST["Imie"])) {
    $imie = $_POST["Imie"];
    if (strlen($imie)<2) {
        $imieERR="Za krótkie imie";
        $OK=false;
    }
} else {
    $imieERR="Pole Imie musi byc wypelnione";
    echo $imieERR;
    $OK = false;
}

if (isset($_POST["Nazwisko"])) {
    $nazwisko = $_POST["Nazwisko"];
    if (strlen($nazwisko)<2) {
        $nazwiskoERR="Za krótkie nazwisko";
        $OK=false;
    }
} else {
    $nazwiskoERR="Pole Nazwisko Imie musi byc wypelnione";
    echo $nazwiskoERR;
    $OK = false;
}

if (isset($_POST["Nazwisko_panienskie"])) {
    $nazwisko_panienskie = $_POST["Nazwisko_panienskie"];
    if (strlen($nazwisko_panienskie)<2) {
        $nazwiskoPanERR="Za krótkie nazwisko p";
        $OK=false;
    }
} else {
    $nazwiskoPanERR="Pole nazwisko p musi byc wypelnione";
    echo $nazwiskoPanERR;
    $OK = false;
}
    
if (isset($_POST["Kod"])) { 
    $kod = $_POST["Kod"];
    //var_dump($_POST);

    if(strlen($kod)< 5) {
        $kodERR="Zły kod pocztowy";
        echo"$kodERR";
        $OK=false;
    }
} else {
    $kodERR="Pole Kod musi byc wypelnione";
    echo $kodERR;
    $OK = false;
}

if(isset($_POST["Email"])){
    $email = $_POST["Email"];
    
    if(strlen($email) < 5) {
        $emailERR="Za krotki email";
        echo"$emailERR";
        $OK=false;
    }
} else {
    $emailERR="Pole Email musi byc wypelnione";
    echo $emailERR;
    $OK = false;
}

if(isset($_POST["Plec"])){
    $plec = $_POST["Plec"];}
    ?>
