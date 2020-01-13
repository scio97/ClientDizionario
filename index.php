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
    <body onload="select()">
        <center>
            <br><br><h1>Dizionario PHP con API e MySQL</h1>
            <form action="dizionario.php" method="GET">
                <select name="mod" id="mod" onChange="select()">
                    <option value="cerca">Cerca</option>
                    <option value="aggiungi" id="aggiungi">Aggiungi</option>
                    <option value="modifica" id="modifica">Modifica</option>
                    <option value="elimina" id="elimina">Elimina</option>
                </select>
                <p id="form"></p>
            </form>
        </center>
    </body>
</html>