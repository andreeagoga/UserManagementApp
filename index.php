<?php
require_once 'head.php';


if (isset($_SESSION['username'])) {
    $username = getData($_POST, "username");
    $dir_path = "poze/";
    $files = scandir($dir_path);
    $sql = "SELECT username FROM $table_name";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            for ($i = 0; $i < count($files); $i++) {
                if ($files[$i] != '.' && $files[$i] != '..') {
                    $file = pathinfo($files[$i]);
                    $extension = $file['extension'];
                        if ($file['filename'] == $row["username"]) {
                            echo  "<img src='$dir_path$files[$i]'>";
                    }
                }
            }
            echo  "user: " . $row["username"] . "<br><br>";
        }
    }


}
//else
//{
//    ?>
    <!--    <form action="inscriere.php">-->
    <!--        <input type="submit" value="Inscriere" name="inscriere" />-->
    <!--    </form>-->
    <!--    <form action="login.php">-->
    <!--        <input type="submit" value="Log in" name="login"/>-->
    <!--    </form>-->
    <!--    --><?php
//}
?>