<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>The Perfect WebGallery</title>
  <meta name="description" content="A simple webgallery">
  <meta name="author" content="zubkovla">

  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" media="print" href="css/print.css">
    <?php

    if($page_file == 'registration'){
        echo '<script src="js/registration.js"></script>';
    }
    
    if($page_file == 'login'){
        echo '<script src="js/login.js"></script>';
    }
    
    ?>

</head>

<body>
    <header>
        <a href="index.php"><img src="logo.png" alt="logo" width="62" height="55" id="logo">
            <h1>Perfektní webová galerie obrázků z celého světa</h1></a>
        <ul class="menu" id="menu">
        <?php echo '<li>Stránka: "'. $page_file .'" | </li>'?>
        <?php
        if(is_loggedin()){
            echo '<li>Přihlášen jako "'. $_SESSION["logged-in"] .'"&nbsp;</li>';
        }else{
            echo '<li>Uživatel nepřihlášen &nbsp;</li>';
        }
        ?>
            <li><a href = "?page=documentation">Dokumentace</a></li>
            <?php

            if(is_loggedin()){               
                echo '<li class="align-right"><a href="?page=logoff">Odhlášení</a></li>
                      <li class="align-right"><a href="?page=upload">Upload</a></li>';
            }else{
                echo '<li class="align-right"><a href="?page=login">Login</a></li>
                <li class="align-right"><a href="?page=registration">Registrace</a></li>';
            }

            ?>
        </ul>
    </header>
    <main>