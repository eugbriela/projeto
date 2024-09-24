<?php
    $idioma = $_GET["idioma"];

    if($idioma == "excluir"){
        setcookie("idioma");
    }
    else{
        setcookie("idioma", "$idioma", time() + (3 * 24 * 60 * 60));
    }

    header("Location: index.php");
?>