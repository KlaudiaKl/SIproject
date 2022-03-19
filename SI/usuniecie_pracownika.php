<p>Usuwanie pracowników</p>

<table>
<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Naz.pan</th><th>Email</th><th>Kod</th><th>Usuwanie</th></tr>            
<?php
include 'db_connection.php';

if (isset($_POST['row_id']) && $_POST['delete'] == 'Tak') {
    $row_id = $_POST['row_id'];
    $sql = "DELETE FROM pracownicy WHERE ID=$row_id";
    $result = $conn->query($sql);
}

$sql = "SELECT * FROM pracownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["ID"]."</td><td>".$row["Imie"]."</td><td>".$row["Nazwisko"]."</td><td>".$row["Plec"]."</td><td>".$row["Nazwisko_panienskie"]."</td><td>".$row["Email"]."</td><td>".$row["Kod"].'</td><td><a href="index.php?subpage=usun_rekord&row_id='.$row["ID"].'">Usuń</a></td></tr>';
    }
}
 else {
    echo "Brak pracownikow";
}
?>

</table>

