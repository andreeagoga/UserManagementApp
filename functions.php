<?php
/*
getData = preia dintr-o variabila superglobala de tipul $_POST["nume"] valoarea daca exista
*/
function getData($method,$key){
    $value="";
    if(isset($method["$key"]))
        $value=htmlentities($method["$key"]);
        $value=sanitizare($method["$key"]);
    return $value;
}

function sanitizare($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function uploadImage($fisier,$numeInput="fotografie"){

    $seFaceUpload=1;
    $extensie=strtolower(pathinfo($fisier,PATHINFO_EXTENSION));
    if($extensie!='png' && $extensie!="jpg" && $extensie!="jpeg") {
        $seFaceUpload=0;
        echo "<div class='alert alert-danger'>Fisierul nu are extensia png, jpeg sau jpg.</div>";
    }
    $verificareImagine=getimagesize($_FILES[$numeInput]["tmp_name"]);
    if($verificareImagine==false){
        $seFaceUpload=0;
        echo "<div class='alert alert-danger'>Fisierul nu este o imagine.</div>";
    }
    if(file_exists($fisier)){
        $seFaceUpload=0;
        echo "<div class='alert alert-danger'>Fisierul exista deja.</div>";
    }
    if($_FILES[$numeInput]["size"]>10000000000){
        $seFaceUpload=0;
        echo "<div class='alert alert-danger'>Fisierul este prea mare. Dimensiunea maxima permisa este 100000b</div>";
    }
    return $seFaceUpload;
}

