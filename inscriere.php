<?php
require_once 'head.php';

if (isset($_POST["inscriere"])) {
    $id = getData($_POST, "id");
    $username = getData($_POST, "username");
    $parola = md5(getData($_POST, "parola"));
    $confirmareparola = md5(getData($_POST, "confirmareparola"));
    $sex = getData($_POST, "sex");
    $starecivila = getData($_POST, "starecivila");
    $nume = getData($_POST, "nume");
    $prenume = getData($_POST, "prenume");
    $email = getData($_POST, "email");
    $ordine = getData($_POST, "ordine");
    $dateinregistare = date("Y-m-d");
    $id1 = $username1 = $nume1 = $prenume1 = $email1 = $parola1 = "";
    $ider = $usernameer = $parolaer = $numeer = $prenumeer = $emailer = $fileer = "";
    $eroare = 0;
    $path = "poze/";
    $fisier=$path. $username."-".strtotime(date("Y-m-d H:i:s"))."-".$_FILES["fotografie"]["name"];
    $seFaceUpload = uploadImage($fisier);
    $extensie=strtolower(pathinfo($fisier,PATHINFO_EXTENSION));

    if ($ordine == 'ordonat') {
        $ordine = 0;
    } else {
        $ordine = 1;
    }

    if ($sex == 'feminin') {
        $sex = 0;
    } else {
        $sex = 1;
    }
    if ($starecivila == 'casatorit') {
        $starecivila = 0;
    } else {
        $starecivila = 1;
    }

    $utilizator = new User($id, $username, $parola, $confirmareparola, $sex, $starecivila, $nume, $prenume, $email, $ordine, $dateinregistare);
    echo "<h2>Datele utilizatorului sunt:</h2>";
    echo "<pre>";
    print_r($utilizator);
    echo "</pre>";

    if (empty($_POST["parola"])) {
        $parolaer = "Parola este obligatorie";
        $eroare = 1;
        echo "</br>" . $parolaer;
    } else {
        if (empty($_POST["confirmareparola"])) {
            $parolaer = "Verificare parola este obligatorie";
            $eroare = 1;
        } else {
            if ($_POST["parola"] != $_POST["confirmareparola"]) {
                $parolaer = "Parola nu se potriveste";
                $eroare = 1;
            }
        }
    }


    if (empty($_POST["username"])) {
        $usernameer = "Utilizatorul este obligatoriu";
        $eroare = 1;
    } else {
        $username1 = sanitizare($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username1)) {
            $usernameer = "Username contine doar litere, cifre si spatii sunt acceptate";
            $eroare = 1;
        }
    }

    if (empty($_POST["nume"])) {
        $numeer = "Numele este obligatoriu";
        $eroare = 1;
    } else {
        $nume1 = sanitizare($_POST["nume"]);
        if (!preg_match("/^[A-Z][a-zA-Z]*$/", $nume1)) {
            $numeer = "Numele incepe cu litera mare si sunt acceptate doar litere";
            $eroare = 1;
        }
    }

    if (empty($_POST["prenume"])) {
        $prenumeer = "Prenumele este obligatoriu";
        $eroare = 1;
    } else {
        $prenume1 = sanitizare($_POST["prenume"]);
        if (!preg_match("/^[A-Z][a-zA-Z]*$/", $prenume1)) {
            $prenumeer = "Prenumele incepe cu litera mare si sunt acceptate doar litere";
            $eroare = 1;
        }
    }

    if (empty($_POST["email"])) {
        $emailer = "Adresa de e-mail este obligatorie";
        $eroare = 1;
    } else {
        $email1 = sanitizare($_POST["email"]);
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $emailer = "Format adresa e-mail invalid";
            $eroare = 1;
        }
    }

    if ($eroare == 0) {
        $sql = "INSERT INTO $table_name (username, parola, sex, starecivila, nume, prenume, email, ordine, dateinregistrare) VALUES ('$username','$parola','$sex','$starecivila','$nume','$prenume','$email','$ordine', '$dateinregistare')";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
            $fisier = $path . $username . "." . $extensie;
            move_uploaded_file($_FILES["fotografie"]["tmp_name"], $fisier);
            echo "<pre>";
            echo "New user created successfully!";
//            echo "Data inregistartii: " . $dateinregistare;
            echo "</pre>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<pre>";
            echo "Nu ati trecut prin formularul de inregistrare";
            echo "</pre>";
        }
        exit();
    }
}
?>

    <h2>Inscriere</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div>
            <label>Username:<input type="text" name="username" value="<?php echo $username1; ?> " required>
                <span class="error">* <?php echo $usernameer; ?></span>
            </label>
        </div>
        <div>
            <label>Parola:<input type="password" name="parola" value="<?php echo $parola1; ?>" required>
                <span class="error">* <?php echo $parolaer; ?></span>
            </label>
        </div>
        <div>
            <label>Confirmare parola:<input type="password" name="confirmareparola" value="<?php echo $parola1; ?>" required>
                <span class="error">* <?php echo $parolaer; ?></span>
            </label>
        </div>
        <div>
            <label>Sex:
                <input type="radio" name="sex" value="feminin" checked>Feminin
                <input type="radio" name="sex" value="masculin" >Masculin
            </label>
        </div>
        <div>
            <label>Stare civila:
                <input type="radio" name="starecivila" value="casatorit" checked>Casatorit
                <input type="radio" name="starecivila" value="necasastorit">Necasatorit
            </label>
        </div>
        <div>
            <label>Nume:
                <input type="text" name="nume" value="<?php echo $nume1; ?>" required>
                <span class="error">* <?php echo $numeer; ?></span>
            </label>
        </div>
        <div>
            <label>Prenume:
                <input type="text" name="prenume" value="<?php echo $prenume1; ?>" required>
                <span class="error">* <?php echo $prenumeer; ?></span>
            </label>
        </div>
        <div>
            <label>Email:
                <input type="email" name="email" value="<?php echo $email1; ?>" required>
                <span class="error">* <?php echo $emailer; ?></span>
            </label>
        </div>
        <div>
            <label>ORDER BY NAME
                <input type="radio" name="ordine" value="ordonat" checked>Ordonat
                <input type="radio" name="ordine" value="neordonat">Neordonat
            </label>
        </div>
        <div>
            <label>Imagine
                <input name="fotografie" type="file" required>
                <span class="error">* <?php echo $fileer; ?></span>
            </label>
        </div>
        <div>
            <input type="submit" name="inscriere" value="Inscriere">
        </div>
    </form>
