<html>
    <head>
        <title>Dizionario</title>        
        <link rel="stylesheet" type="text/css" href="style.css">
        <?php
            session_start();
            include("funzioni.php");
            $controllo=registra();
            menu();
        ?>
    </head>
    <body>
        <div class="pagina">
            <br><br><h1>Dizionario PHP con API e MySQL</h1>
            <?php
                if($controllo==0){
                    echo "Utente registrato";
                }
                if($controllo==1){
                    header("location: /registra.php?err=ugr");
                }
            ?>
        </div>
    </body>
</html>