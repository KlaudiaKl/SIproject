<p>Wyniki wyszukiwania: </p>


<?php 

include 'db_connection.php';
$pracownik="";
if (isset($_POST["Wyszukiwanie"])) {
    $pracownik = $_POST["Wyszukiwanie"];
    }
    ?>


<table>
<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Naz.pan</th><th>Email</th><th>Kod</th></tr>

<?php
    $sql = "SELECT * FROM pracownicy WHERE Nazwisko LIKE '%$pracownik%'";

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


<br>
<br>
<p>Baza wszystkich pracowników </p>
<table>
<tr><th>ID</th><th>Imie</th><th>Nazwisko</th><th>Płeć</th><th>Naz.pan</th><th>Email</th><th>Kod</th></tr>            
<?php


$sql = "SELECT count(*) as cnt FROM pracownicy";
$row_cnt = intval($conn->query($sql)->fetch_assoc()['cnt']);

$rows_per_page = 2;
$total_pages = $row_cnt/$rows_per_page;
$current_page = $_GET['page'];
if (!isset($_GET['page'])) {
    $current_page = 1;
}
$current_page -= 1;
$sql = "SELECT * FROM pracownicy limit " . $current_page * $rows_per_page . "," . $rows_per_page;

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
<?php
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<a href="./index.php?subpage=baza_pracownikow&page='.$i.'">'.$i.'</a> | ';
}
?>
