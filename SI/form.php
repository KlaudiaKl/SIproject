<?php 

include 'db_connection.php';
include 'waliduj_pracownika.php';
if ($OK) {
    $sql = "INSERT INTO pracownicy (Imie, Nazwisko, Plec, Nazwisko_panienskie, Email, Kod) VALUES('$imie','$nazwisko','$plec','$nazwisko_panienskie','$email', '$kod')";
    if ($result = $conn->query($sql)) {
        echo "SQL QUERY SUCCESS";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "okkkkk";
} else {
    echo "NOT OK";
}                                                                
?>

<p>Formularz dodawania pracowników</p>


                <form method = POST action = "index.php?subpage=form">
                    
                    <div class="row">

                        <label class="column c1" for="Imie">Imię:</label>
                        <input class="column c2" type="text" name="Imie" > </div>
                        <?php echo $imieERR ?>


                    <div class="row">
                        <label class="column c1" for="Nazwisko">Nazwisko:</label>
                        <input class="column c2" type="text" name="Nazwisko"> </div>
                        <?php echo $nazwiskoERR ?>

                    <div class="row">

                        <input type="radio" name="Plec" value="male"> Mężczyzna <br>
                        <label class="column c1" for="Plec">Płeć:</label>
                        <input type="radio" name="Plec" value="female" checked> Kobieta </div>


                    <div class="row"> <label class="column c1" for="Nazwisko_panienskie">Nazwisko panieńskie:</label>
                        <input class="column c2" type="text" name="Nazwisko_panienskie"> </div>
                        <?php echo $nazwiskoPanERR ?>
                    <div class="row">
                        <label class="column c1" for="Email">Email:</label>
                        <input class="column c2" type="text" name="Email"> </div>
                        <?php echo $emailERR ?>



                    <div class="row"> <label class="column c1" for="Kod">Kod pocztowy:</label>
                        <input class="column c2" type="text" name="Kod"> </div>
                        <?php echo $kodERR ?>




                    <div class="row"><input type="submit" name = "send" value="Wyślij"> </form>
                </div>


                </form>

<table>
<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Naz.pan</th><th>Email</th><th>Kod</th></tr>            
<?php
$sql = "SELECT * FROM pracownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["Imie"]."</td><td>".$row["Nazwisko"]."</td><td>".$row["Plec"]."</td><td>".$row["Nazwisko_panienskie"]."</td><td>".$row["Email"]."</td><td>".$row["Kod"]."</td></tr>";
    }
} else {
    echo "Brak pracownikow";
}
?>
</table>


            