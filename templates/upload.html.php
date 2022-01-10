<?php
if(isset($errors_messages)){
    echo $errors_messages;
}
?>

<h2>Nahrávání obrázku</h2>
<form action="?page=upload" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Uživatelské údaje:</legend>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
    </fieldset>
    <input name="submit" id="myButton" type="submit" value="Odeslat">
</form>