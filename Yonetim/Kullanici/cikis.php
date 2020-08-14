<?php
session_start();
unset($_SESSION['Rol']);
unset($_SESSION['KullaniciAdi']);
unset($_SESSION['KullaniciID']);
unset($_SESSION['Email']);
unset($_SESSION['Giris']);
session_unset();

header ("Location:../../anasayfa.php");    
