<html>
    <head>
        <title>Dizionario</title>        
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            session_start();
            include("funzioni.php");
            menu();
        ?>
    </head>
    <body onload="accesso_negato(get())">
            <br><br><h1>Dizionario sinonimi&contrari</h1>
            <form action="login.php" method="GET">
                <span>Utente:</span>
                <input type="text" name="user" required><span id="user"></span>
                <br><br><span>Password:</span>
                <input type="password" name="password" required><span id="password"></span>
                <br><br>
                <input type="submit">
            </form>
    </body>
</html>