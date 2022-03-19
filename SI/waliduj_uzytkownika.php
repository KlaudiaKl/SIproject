<?php
$imie="";
$nazwisko="";
$haslo="";
$login="";

if (isset($_POST["imie"])) {
    $imie = $_POST["imie"];
    if (strlen($imie)<2) {
        $imieERR="Za krótkie imie";
        $OK=false;
    }
} else {
    $imieERR="Pole Imie musi byc wypelnione";
    echo $imieERR;
    $OK = false;
}

if (isset($_POST["nazwisko"])) {
    $nazwisko = $_POST["nazwisko"];
    if (strlen($nazwisko)<2) {
        $nazwiskoERR="Za krótkie nazwisko";
        $OK=false;
    }
} else {
    $nazwiskoERR="Pole Nazwisko Imie musi byc wypelnione";
    echo $nazwiskoERR;
    $OK = false;
}

?>