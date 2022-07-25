<?php
require_once 'head.php';

if (isset($_POST['login'])) {
    $username = getData($_POST, "username");
    $parola = md5(getData($_POST, "parola"));
    $ordine = getData($_POST, "ordine");

    $sql = "SELECT username, parola, ordine FROM $table_name";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            if ($username == $row["username"] and $parola == $row["parola"]) {
                $_SESSION["username"]= $username;
                echo "<div class='alert alert-success'>Autentificare reusita </div>";
                echo "</br>" . "User: ";
                echo $_SESSION["username"];
                echo "</br>" . "Ordine aleasa: " . $row["ordine"];
                echo "</br>" . "Astazi este: " . date("Y-m-d") . "</br>";
            }
        }
    }
} else {
    if(isset($_SESSION["username"])){
        header("Location:index.php");

    } else {
    echo "<div class='alert alert-danger'>Nu ati trecut prin formularul de login </div>";
?>
<h2>Log in</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div>
        <label>Username:
            <input type="text" name="username" value="<?php echo $username1; ?>">
            <span class="error">* <?php echo $usernameer ?></span>
        </label>
    </div>
    <div>
        <label>Parola:
            <input type="password" name="parola" value="<?php echo $parola1; ?>">
            <span class="error">* <?php echo $parolaer ?></span>
        </label>
    </div>
    <div>
        <label>ORDER BY NAME
            <input type="radio" name="ordine" value="ordonat" checked>Ordonat
            <input type="radio" name="ordine" value="neordonat">Neordonat
        </label>
    </div>
    <div>
        <input type="submit" name="login" value="Log in">
    </div>
</form>
<?php }
}?>

