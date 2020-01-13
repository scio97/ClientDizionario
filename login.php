<?php
    session_start();
    include("funzioni.php");
    $controllo=login();
    if($controllo==0){
        header("location: /index.php");
    }
    if($controllo==1){
        header("location: /accesso.php?err=pe");
    }
    if($controllo==2){
        header("location: /accesso.php?err=unr");
    }
?>