    <?php // pg sunucu bağlantısı bağlantısı
 
include("..//baglan.php");
   

    //Kategori ekleme kodları
    if(isset($_POST['kullaniciEkleSubmit'])){
        
      echo "form gönderildi";
       
       echo "<pre>";
       print_r($_POST);
       
       echo "</pre>"; 
        
       $kullaniciAdi = pg_escape_string($_POST['Adi']).' '.pg_escape_string($_POST['Soyadi']);
       //$kullaniciSoyadi = pg_escape_string($_POST['Soyadi']);
       //$kullaniciTelefon = pg_escape_string($_POST['Telefon']);
       $kullaniciEmail = pg_escape_string($_POST['Email']);
       $kullaniciAdres = pg_escape_string($_POST['Adres']).' '.pg_escape_string($_POST['Telefon']);       
       $kullaniciSifre = pg_escape_string($_POST['Sifre']);
       

    
       $query_KullaniciEkle="insert into kullanicilar(kullanici_adi,email,sifre,adres)"
               . " values('$kullaniciAdi','$kullaniciEmail',$kullaniciSifre,'$kullaniciAdres')";
       
        $sonuc = pg_query($query_KullaniciEkle);
        
        /*if($sonuc){
            
$sonid = pg_fetch_array(pg_query("SELECT * FROM kullanicilar ORDER BY id DESC LIMIT 1")); 
$son = $sonid['id']; 
/*$md5_Sifre=  md5($kullaniciSifre);
$md5_Sifre=  md5($md5_Sifre);
$md5_Sifre=  md5($md5_Sifre);
 $md5_Sifre=  $kullaniciSifre;

 

 $query_KullaniciParolaEkle="insert into kullaniciParola(kullanicirefid,sifre) values('$son','$md5_Sifre')";
$sonuc= pg_query($query_KullaniciParolaEkle);
if($sonuc){
      header ("Location:listele.php"); 
}
        }*/
         header ("Location:listele.php"); 
    }
    
    ?>
    <head>
        <meta charset="UTF-8">
    <title></title>
    
    <link href="../giris.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="genel">
    <div class="baslik">Üye Kayıt Formu</div>
   <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Kullanıcı Ekle</legend>    
            <label for="Adi">Kullanıcı Adı</label>
           <input type="text" name="Adi" id="Adi" />
           <br/>
          
         <label for="Soyadi">Kullanıcı Soyadı</label> 
         <input type="text" name="Soyadi" id="Soyadi" />
          <br/>
         
           <label for="Telefon">Telefon No</label> 
         <input type="text" name="Telefon" id="Telefon" />
          <br/>
             
           <label for="Email">Email</label> 
         <input type="text" name="Email" id="Email" />
          <br/>
            <label for="Sifre">Şifre</label> 
         <input type="text" name="Sifre" id="Sifre" />
          <br/>
              
             <label for="Adres">Adres</label> 
             <textarea id="Adres" name="Adres"></textarea>
           <br/> <br/>
             <input type="submit" name="kullaniciEkleSubmit" class="buton" value="Kullanıcı Ekle" />
        </fieldset>
       <a href="giris.php">Giriş Sayfasına Git</a>   
        
    </form>
</div>
</body>
</html>
