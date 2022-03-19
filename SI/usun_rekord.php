<p>Czy na pewno chcesz usunąć rekord?</p>

<form method = POST action="./index.php?subpage=usuniecie_pracownika">
    <div class ="row">
<?php
if (isset($_GET['row_id'])) {
    echo '<input type="hidden" name="row_id" value="'.$_GET['row_id'].'"/>';
}
?>
<input type="submit" name="delete" value="Tak">
<input type="submit" name="delete" value="Nie"></div>

</form>

<?php
include 'db_connection.php';

?>