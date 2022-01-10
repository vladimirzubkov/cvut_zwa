<?php
if(isset($errors_messages)){
    echo $errors_messages;
}
?>

<h2>Přístup do systému</h2>
<p class="red">* Požadované pole</p>
    <form action="?page=login" method="POST">
        <fieldset>
            <legend>Uživatelské údaje:</legend>
            <label for="username">Uživatelské jméno:</label>
            <input type="text" id="username" name="username" value="<?php form_value('username'); ?>" />&nbsp;<strong><abbr title="Požadované pole" class="red">*</abbr></strong><br>
            <label for="password1">Uživatelské heslo:</label>
            <input type="password" id="password" name="password" />&nbsp;<strong><abbr title="Požadované pole" class="red">*</abbr></strong><br>
        </fieldset>
        <input name="submit" id="myButton" type="submit" value="Odeslat" />
    </form>