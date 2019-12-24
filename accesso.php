<html>
    <head>
        <title>PHP - Dizionario</title>        
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            include("connessione.php");
            include("funzioni.php");
            session_start();
            menu();
        ?>
    </head>
    <body onload="accesso_negato(get())">
            <br><h1>Dizionario sinonimi&contrari</h1>
            <form action="login.php" method="GET">
                <span>Utente:</span>
                <input type="text" name="user" required><span id="user"></span>
                <br><br><span>Password:</span>
                <input type="text" name="password" required><span id="password"></span>
                <br><br>
                <input type="submit">
            </form>
    </body>
</html>