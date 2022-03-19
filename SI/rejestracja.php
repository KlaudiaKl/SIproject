<p>Rejestracja</p>
<?php
include 'waliduj_uzytkownika.php';
include 'db_connection.php';
$sql = "INSERT INTO uzytkownicy (Imie, Nazwisko, Login, Haslo) VALUES('$imie','$nazwisko','$login','$haslo')";
    if ($result = $conn->query($sql)) {
        echo "SQL QUERY SUCCESS";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    ?>
<form>
<div class="row">

<label class="column c1" for="imie">Imie:</label>
<input class="column c2" type="text" name="imie" > </div>



<div class="row">
<label class="column c1" for="nazwisko">Nazwisko:</label>
<input class="column c2" type="text" name="Haslo"> </div>

<div class="row">

<label class="column c1" for="login">Login:</label>
<input class="column c2" type="text" name="login" > </div>

<div class="row">

<label class="column c1" for="haslo1">Hasło:</label>
<input class="column c2" type="text" name="haslo1" > </div>

<div class="row">

<label class="column c1" for="haslo2">Powtórz hasło:</label>
<input class="column c2" type="text" name="haslo2" > </div>

<div class="row"><input type="submit" name = "zarejestruj" value="Zarejestruj"> </div>

</form>
