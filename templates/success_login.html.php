<?php
if(is_loggedin()){
    echo '<h2>Vítej, '. $_SESSION["logged-in"] .'!</h2>';
    echo '<h2>Přejdi na <a href="?page=upload">stránku pro nahrávání obrázku</a>.</h2>';
}
?>