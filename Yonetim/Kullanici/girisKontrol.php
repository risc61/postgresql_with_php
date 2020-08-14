<?php

session_start();

if($_SESSION['Giris']){
    NULL;
}  
else {
    $_SESSION['mesaj']="Önce Giriş yapmalızınız";
    header ("Location:../Kullanici/giris.php"); 
    
}


