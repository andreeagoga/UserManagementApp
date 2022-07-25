<?php
require_once "head.php";
if(isset($_POST['update'])){
    $eroare = 0;
    $username = $_SESSION["username"];
    $target_dir = "poze/";
    $max_file_size = "504500";
    $seFaceUpload = uploadImage($username);
    if($seFaceUpload ==0){
        echo "Fisierul nu a fost incarcat";
    } else {
        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
    }

}else{
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div>
        <label>Imagine
            <input name="fileupload" type="file" required>
<!--            <span class="error">* --><?php //echo $fileer; ?><!--</span>-->
        </label>
    </div>
        <div>
            <input type="submit" name="update" value="Incarca">
        </div>
    </form>
        <?php
}