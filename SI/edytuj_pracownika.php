<form method = POST >
    
<?php
include 'db_connection.php';

if (isset($_POST['edit']) && $_POST['edit'] == 'Odrzuć zmiany') {
    header("Location: ./index.php?subpage=edytowanie_pracownika");
}

if (isset($_GET['row_id'])) {
    if (isset($_POST['edit']) && $_POST['edit'] == 'Potwierdź zmiany') {
        
        include 'waliduj_pracownika.php';

        if ($OK) {
            $sql = 'UPDATE pracownicy SET';
            
            if (isset($_POST["Imie"])) {
                $sql .= " Imie='".$_POST['Imie']."',";
            }
            if (isset($_POST["Nazwisko"])) {
                $sql .= " Nazwisko='".$_POST['Nazwisko']."',";
            }
            if (isset($_POST["Plec"])) {
                $sql .= " Plec='".$_POST['Plec']."',";
            }
            if (isset($_POST["Nazwisko_panienskie"])) {
                $sql .= " Nazwisko_panienskie='".$_POST['Nazwisko_panienskie']."',";
            }
            if (isset($_POST["Email"])) {
                $sql .= " Email='".$_POST['Email']."',";
            }
            if (isset($_POST["Kod"])) {
                $sql .= " Kod='".$_POST['Kod']."',";
            }
            if (substr($sql, -1) == ',') {
                // usun ostatni znak
                $sql = substr($sql, 0, -1);
            }
            $sql .= ' WHERE ID = '.$_GET['row_id'];
            $result = $conn->query($sql);

            header("Location: ./index.php?subpage=edytowanie_pracownika");
        } else {
            $pracownik = $_POST;
        }
    } else {
        echo '<input type="hidden" name="row_id" value="'.$_GET['row_id'].'"/>';
    
        $sql = "SELECT * FROM pracownicy WHERE ID=".$_GET['row_id'];
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $pracownik=$result->fetch_assoc();
        }
    }
}


?>

                    
                    <div class="row">

                        <label class="column c1" for="Imie">Imię:</label>
                        <input class="column c2" type="text" name="Imie" value="<?php echo $pracownik['Imie'];?>"> </div>
                


                    <div class="row">
                        <label class="column c1" for="Nazwisko">Nazwisko:</label>
                        <input class="column c2" type="text" name="Nazwisko" value="<?php echo $pracownik['Nazwisko'];?>">
                        <?php if (isset($nazwiskoERR)) echo $nazwiskoERR; ?> </div>
           

                    <div class="row">

                        <input type="radio" name="Plec" value="male" <?php if ($pracownik['Plec'] == 'male') {echo "checked";}?>> Mężczyzna <br>
                        <label class="column c1" for="Plec">Płeć:</label>
                        <input type="radio" name="Plec" value="female" <?php if ($pracownik['Plec'] != 'male') {echo "checked";}?>> Kobieta </div>


                    <div class="row"> <label class="column c1" for="Nazwisko_panienskie">Nazwisko panieńskie:</label>
                        <input class="column c2" type="text" name="Nazwisko_panienskie" value="<?php echo $pracownik['Nazwisko_panienskie'];?>"> </div>
        
                    <div class="row">
                        <label class="column c1" for="Email">Email:</label>
                        <input class="column c2" type="text" name="Email" value="<?php echo $pracownik['Email'];?>"> </div>
                        



                    <div class="row"> <label class="column c1" for="Kod">Kod pocztowy:</label>
                        <input class="column c2" type="text" name="Kod" value="<?php echo $pracownik['Kod'];?>"> </div>
          




                    <div class="row"><input type="submit" name = "edit" value="Potwierdź zmiany"></div>
                    <div class="row"><input type="submit" name = "edit" value="Odrzuć zmiany">
                
                </div>


               

</form>

<?php
include 'db_connection.php';

?>