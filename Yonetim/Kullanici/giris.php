    <?php // pg sunucu bağlantısı bağlantısı
 
include("..//baglan.php");
include_once 'dbMySql.php';
session_start();

if(isset($_SESSION['mesaj'])){
    echo $_SESSION['mesaj'];
    unset($_SESSION['mesaj']);
}

  if(isset($_POST['girisSubmit'])){
 $kullaniciEmail = pg_escape_string($_POST['Email']);
 $kullaniciSifre = pg_escape_string($_POST['Sifre']);
   
        
 $kullaniciSorgu = pg_fetch_array(pg_query("SELECT * FROM kullanicilar Where email='$kullaniciEmail' and sifre='$kullaniciSifre' Limit 1")); 
 //echo $kullaniciEmail;
 $kul_ID = $kullaniciSorgu['kullanici_id']; 
 $kul_Adi=$kullaniciSorgu['kullanici_adi'];
 /*$md5_Sifre=  md5($kullaniciSifre);
 $md5_Sifre=  md5($md5_Sifre);
 $md5_Sifre=  md5($md5_Sifre);*/
  //$md5_Sifre= $kullaniciSifre;

 
 
// pg_query("SELECT * FROM kullaniciparola where id= 1");
 //pg_query("SELECT * FROM kullaniciparola Where kullanicirefid = '$kul_ID' and sifre = '$md5_Sifre'");
// $sonuc=pg_query("SELECT * FROM kullaniciparola Where kullanicirefid = '$kul_ID' && sifre = '$md5_Sifre'");      
 //$sonuc = pg_fetch_array($sonuc,0, PGSQL_NUM); 

if($kullaniciSorgu){

$con = new DB_con();
$res=$con->getirKullaniciRol("$kul_ID");

/*echo $kul_ID;
echo$res;*/
echo $res;
$_SESSION['Rol']=$res;
$_SESSION['KullaniciAdi']=$kul_Adi;
$_SESSION['KullaniciID']=$kul_ID;
$_SESSION['Email']=$kullaniciEmail;
$_SESSION['Giris']=true;

header ("Location:../../anasayfa.php");    

}
 else{
    echo 'Giriş Başarısız';
    $_SESSION['Giris']=false;

    
 }
    
        
        
    }
    
    
    ?>

<html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../giris.css" rel="stylesheet" type="text/css"/>
    
</head>
<body>
    <div class="genel" >  

<div class="baslik" > Üye Paneli</div>
 <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
     <fieldset>
            <legend>Giriş</legend>    
            <label for="Email">Email </label>
             <input type="text" name="Email" id="Email" />
           <br/>
          
            <label for="Sifre">Şifre</label> 
           <input type="text" name="Sifre" id="Sifre" />
           <br/>  <br/>
            
           <input type="submit" name="girisSubmit"  class="buton"value="Giriş" />
        
     </fieldset>
      <a href="ekle.php"   >Kayıt Sayfasına Git </a>
 </form>
    </div>

</body>
</html>
