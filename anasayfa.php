<?php include("yonetim/baglan.php");
   $query_makaleler = "SELECT * FROM makaleler limit 5";
   $rsMakaleler = pg_query($query_makaleler);
   $row_rsMakaleler = pg_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = pg_num_rows($rsMakaleler);
   
   
    $query_Kategoriler = "SELECT * FROM kategoriler limit 6";
    $rsKategoriler = pg_query($query_Kategoriler);
    $row_rsKategoriler = pg_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = pg_num_rows($rsKategoriler);
    
    
    ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Anasayfa</title>
 
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

   <link href="styles.css" rel="stylesheet" type="text/css"/>
    <link href="stil.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="AnaSayfa">

     <div class="menuler">
     <div class="elemanMenu">Anasayfa</div>
     <div class="elemanMenu">Hakkımızda</div>
     <div class="elemanMenu">Refaranslar</div>
     <div class="elemanMenu">Misyonumuz </div>
     <div class="elemanMenu">Vizyonumuz</div>
     <div class="elemanMenu" style="width: 215px;"><?php 
      session_start();
      
      if(!empty($_SESSION["Rol"])){
          
     if($_SESSION["Rol"]=="Admin") {
         echo "<a style='color:red' href='Yonetim/Kategori'>Yonetim Giriş</a>";
      }}
     
     ?></div>
     <div class="elemanMenu" style="width: 215px;"> 
         <?php 
     
     if(!empty($_SESSION['Giris']))
         {
     echo $_SESSION["Email"]."<a href='Yonetim/Kullanici/cikis.php'>Çıkış</a>";
    
    
     }
     else{
    echo "<a href='Yonetim/kullanici/giris.php'>Giriş</a>";
 
     }
     
     ?> 
     </div>
     </div>
     
   
  <div class="content">

  
      <div class="OrtaKutuAlani">
          <div class="sideBar solaYasla" id='cssmenu'><b style="color:#FFF">KATEGORİLER</b> 
              <ul>
               <?php do { ?>
                  <li class='active'><a href='#'><span><?= $row_rsKategoriler->kategori_adi;?></span></a></li>
              <?php }while($row_rsKategoriler= pg_fetch_object($rsKategoriler));?></ul>
          </div>
  <div class="resimKutusu solaYasla">      
      <img height="300px" width="600px" src="yonetim/_upload/resimler/makaleResimler/bayrak.jpg"/>
      
  </div>
          <div class="sideBar solaYasla" id='cssmenu' style="border: solid 1px;">
              
              
              
              <iframe border="0" src="http://www.ensonhaber.com/sondakika/index1.php"
width="240" height="300" scrolling="no"></iframe>
              
              
              
          </div>
      </div>
      
      
  
<div class="Kutular">
<?php do { ?>
  <div class="makaleKutusu solaYasla"> 
      <div class="makaleKutusuBaslik">   <p> <?= $row_rsMakaleler->makale_baslik;  ?></p></div>
      
      <div class="makaleKutusuicerik">
         
          <div class="solaYasla"> <img height="100px" width="75px" src="yonetim/_upload/resimler/makaleResimler/<?= $row_rsMakaleler->makale_resim; ?>"/> </div>
          <div class="makaleKutusuDetay"><p> <?= substr($row_rsMakaleler->makale_icerik, 0,450);?>
           <a href="makaleDetay.php?id=<?=$row_rsMakaleler->makale_id;?>" style="color:orange;">yazının devamı</a></p></div>
      </div>
      
      
  </div>
 
 

<?php }while($row_rsMakaleler= pg_fetch_object($rsMakaleler));?>   
     
      
</div>
      
      
      
      
      
  </div>
</div>
     

      


</body>
</html>
