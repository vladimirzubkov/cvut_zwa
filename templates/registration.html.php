<?php

if(isset($errors_messages)){
    echo $errors_messages;
}

?>
<h2>Registrace nového uživatele</h2>
<p class="red">* Požadované pole</p>
        <form action="?page=registration" method="POST">
            <fieldset>
                <legend>Uživatelské údaje:</legend>
                <label for="username">Uživatelské jméno:</label>
                <input type="text" id="username" name="username" required value="<?php form_value('username'); ?>" />&nbsp;<strong><abbr title="Požadované pole" class="red">*</abbr></strong><br>
                <label for="name">Jméno:</label>
                <input type="text" id="name" name="name" value="<?php form_value('name'); ?>" /><br>
                <label for="surname">Příjmení:</label>
                <input type="text" id="surname" name="surname" value="<?php form_value('surname'); ?>" /><br>
                <label for="birthday">Datum narození:</label>
                <input type="date" id="birthday" name="birthday" value="<?php form_value('birthday'); ?>" /><br>
            </fieldset>
            <fieldset>
                <legend>Heslo:</legend>
                <label for="password1">Heslo:</label>
                <input type="password" id="password1" name="password1" required />&nbsp;<strong><abbr title="Požadované pole" class="red">*</abbr></strong><br>
                <label for="password2">Opakování hesla:</label>
                <input type="password" id="password2" name="password2" required />&nbsp;<strong><abbr title="Požadované pole" class="red">*</abbr></strong><br>
            </fieldset>
            <fieldset>
                <legend>Kontaktní údaje:</legend>
                <label for="email">Email:</label>
                <input type=email id="email" name="email" value="<?php form_value('email'); ?>" /><br>
                <label for="phone">Telefonní číslo:</label>
                <input type="text" id="phone" name="phone" value="<?php form_value('phone'); ?>" /><br>
            </fieldset>
            <fieldset>
                <legend>Preference publikování:</legend>
                <input type="checkbox" id="magazine" name="magazine" value="<?php form_value('magazine'); ?>" />
                <label for="magazine">Časopis</label><br>
                <input type="checkbox" id="newspaper" name="newspaper" value="<?php form_value('newspaper'); ?>" />
                <label for="newspaper">Noviny</label><br>
                <input type="checkbox" id="internet" name="internet" value="<?php form_value('internet'); ?>" checked />
                <label for="internet">Internet</label><br>
            </fieldset>
            <fieldset>
                <legend>Používaná technika:</legend>
                <label for="camera">Preferovaný fotoaparat:</label>
                <input list="cameras" name="camera" id="camera" value="<?php form_value('camera'); ?>" />
                    <datalist id="cameras">
                    <option value="Canon">
                    <option value="Minolta">
                    <option value="Nikon">
                    <option value="Ricoh">
                    <option value="Sony">
                    </datalist>
            </fieldset>
            <fieldset>
                <legend>Jak jste se o nás dozvěděl(a):</legend>
                <input type="radio" id="rmagazine" name="feedback" value="<?php form_value('feedback'); ?>" />
                <label for="rmagazine">Časopis</label><br>
                <input type="radio" id="rnewspaper" name="feedback" value="<?php form_value('feedback'); ?>" />
                <label for="rnewspaper">Noviny</label><br>
                <input type="radio" id="rinternet" name="feedback" value="<?php form_value('feedback'); ?>" />
                <label for="rinternet">Internet</label><br>
            </fieldset>
            <input name="submit" id="myButton" type="submit" value="Odeslat formulář" />
        </form>