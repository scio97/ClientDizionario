<?php
//////////LOGIN//////////
function login(){
    $user = $_GET["user"];
    $password = $_GET["password"];
    $url = "https://apidizionario.herokuapp.com?mod=login&user=$user&password=$password";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato=="ok"){
        $_SESSION["user"]=strtoupper($user);
        $_SESSION["tipo"]=$risposta->tipo;
        return 0;
    }else{
        if($risposta->risultato=="passworderr"){
            return 1;
        }else{
            return 2;
        }
    }
}
//////////MENU//////////
function menu(){
    echo"<ul class='menu'>";
    echo"<li><a href='index.php' class='collegamento_menu'>HOME</a></li>";
    echo"<li>".menu_accesso()."</li>";
    echo"<li><a href='logout.php' class='utente_menu'>LOGOUT</a></li>";
    echo"</ul>";
}
//////////MENU_ACCESSO//////////
function menu_accesso(){
    if(isset($_SESSION["user"])){
        return "<a href='accesso.php' class='utente_menu'>".$_SESSION["user"]."<a>";
    }else{
        return "<a href='accesso.php' class='utente_menu'>ACCEDI</a>";
    }
}
//////////CERCA//////////
function cerca(){
    $termine = $_GET["termine"];
    $url = "https://apidizionario.herokuapp.com?mod=cerca&termine=$termine";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    echo"<h3>Risultato ricerca:</h3>";     
    echo"<p>Termine ricercato: ". $termine ."</p>";
    if($risposta->significato!=null){
        echo"<p>Risultato ricerca: ".$risposta->significato."</p>";
    }else{
        echo"<p>Nessun risultato</p>";
    }
}
//////////AGGIUNGI//////////
function aggiungi(){
    $termine = $_GET["termine"];
    $significato = $_GET["significato"];
    $url = "https://apidizionario.herokuapp.com?mod=aggiungi&termine=$termine&significato=$significato";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato){
        echo"<p>Termine inserito</p>";
    }else{
        echo"<p>Termine già presente</p>";
    }
}
//////////MODIFICA//////////
function modifica(){
    $termine = $_GET["termine"];
    $significato = $_GET["significato"];
    $url = "https://apidizionario.herokuapp.com?mod=modifica&termine=$termine&significato=$significato";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato){
        echo"<p>Termine modificato</p>";
    }else{
        echo"<p>Termine non presente</p>";
    }
}
//////////ELIMINA//////////
function elimina(){
    $termine = $_GET["termine"];
    $url = "https://apidizionario.herokuapp.com?mod=elimina&termine=$termine";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    if($risposta->risultato){
        echo"<p>Termine eliminato</p>";
    }else{
        echo"<p>Termine non presente</p>";
    }
}
//////////COOKIES//////////
function cookies(){
    if(!isset($_COOKIE["n_accessi"])) {
        setcookie("n_accessi", "1");
    }
    if(!isset($_COOKIE["n_accessi"])) {
        echo "<h6>Hai effettuato: 1 richiesta a questo sito</h6>";
    } else {
        $_COOKIE["n_accessi"]=$_COOKIE["n_accessi"]+1;
        setcookie("n_accessi", $_COOKIE["n_accessi"]);
        echo "<h6>Hai effettuato: ".$_COOKIE["n_accessi"]." richieste a questo sito</h6>";
    }
}
?>

<script>
function select(){
    var x = document.getElementById("mod").value;
    if(x=="cerca"){
        document.getElementById("form").innerHTML = '<p>Termine da cercare:</p><input type="text" name="termine" required><br><br><input type="submit">'
    }
    if(x=="elimina"){
        document.getElementById("form").innerHTML = '<p>Termine da eliminare:</p><input type="text" name="termine" required><br><br><input type="submit">'
    }
    if(x=="aggiungi"){
        document.getElementById("form").innerHTML = '<p>Termine da aggiungere:</p><input type="text" name="termine" required><p>Inserisci significato: </p><input type="text" name="significato" required><br><br><input type="submit">'
    }
    if(x=="modifica"){
        document.getElementById("form").innerHTML = '<p>Termine da modificare:</p><input type="text" name="termine" required><p>Inserisci significato: </p><input type="text" name="significato" required><br><br><input type="submit">'
    }
    <?php
    if(!isset($_SESSION["tipo"])){
        echo 'document.getElementById("aggiungi").disabled="disabled";';
        echo 'document.getElementById("modifica").disabled="disabled";';
        echo 'document.getElementById("elimina").disabled="disabled";';
    }
    if($_SESSION["tipo"]=="ospite"){
        echo 'document.getElementById("modifica").disabled="disabled";';
        echo 'document.getElementById("elimina").disabled="disabled";'; 
    }
    ?>
}
function accesso_negato(get){
    if(get["err"]=="unr"){
        document.getElementById("user").innerHTML ="utente non registrato";
    }
    if(get["err"]=="pe"){
        document.getElementById("password").innerHTML ="password errata";
    }
}
function get(){
    var args = new Array();
    var query = window.location.search.substring(1);
    if (query){
        var strList = query.split('&');
        for(str in strList){
        var parts = strList[str].split('=');
        args[unescape(parts[0])] = unescape(parts[1]);
        }
    }
    return args;
}
</script>