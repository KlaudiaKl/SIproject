<p>Edytowanie pracowników</p>

<table>
<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Naz.pan</th><th>Email</th><th>Kod</th><th>Usuwanie</th></tr>            
<?php
include 'db_connection.php';

$sql = "SELECT * FROM pracownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["Imie"]."</td><td>".$row["Nazwisko"]."</td><td>".$row["Plec"]."</td><td>".$row["Nazwisko_panienskie"]."</td><td>".$row["Email"]."</td><td>".$row["Kod"].'</td><td><a href="index.php?subpage=edytuj_pracownika&row_id='.$row["ID"].'">Edytuj</a></td></tr>';
    }
}
 else {
    echo "Brak pracownikow";
}
?>

</table>
