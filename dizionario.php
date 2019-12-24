<html>
    <head>
        <title>PHP - Dizionario</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            include("funzioni.php");
            menu();
        ?>
    </head>
    <body>
        <center>
        <br><h1>Dizionario PHP con API e MySQL</h1>
        <?php  
            if($_GET["mod"]=="cerca"){
                cerca();
            }
            if($_GET["mod"]=="aggiungi"){
                aggiungi();
            }
            if($_GET["mod"]=="modifica"){
                modifica();
            }
            if($_GET["mod"]=="elimina"){
                elimina();
            }
            echo"<a href='/'>link home</a>";
        ?>
        </center>
    </body>
</html>