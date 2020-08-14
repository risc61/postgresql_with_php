  <?php
    // put your code here
  include("..//kullanici/girisKontrol.php");
include("..//baglan.php");
         $query_Kategoriler = "SELECT * FROM kategoriler";
         $rsKategoriler = pg_query($query_Kategoriler);
         $row_rsKategoriler = pg_fetch_object($rsKategoriler);
         $num_row_rsKategoriler = pg_num_rows($rsKategoriler);
       //  $_GET["id"]=20;
if(isset($_GET["id"])){
    $_id=$_GET["id"]; 
    $sorgu=pg_query("select * from makaleler where makale_id='$_id'");
    $kayit=pg_fetch_array($sorgu);
 
}




if(isset($_POST['makaleDuzenleSubmit'])){
     
  /*   echo "<pre>";
       print_r($_POST);
       print_r($_FILES);
       
       echo "</pre>";*/
       
    
     $kategoriRefID = pg_escape_string($_POST['KategoriRefID']);
     $makaleAdi = pg_escape_string($_POST['Adi']);
     $makaleDetay = pg_escape_string($_POST['Detay']);     
     $makaleResim= pg_escape_string($_FILES['Resim']['name']);
     $makaleYayinlayanKisi=1;
    if($makaleResim==null){
     
         $makaleResim= pg_escape_string($_POST['makaleResim']);
      
     }else{
        
         echo 'file varrrr';
           $makaleResimTmp=$_FILES['Resim']['tmp_name'];
           $destination="../_upload/resimler/makaleResimler/".$makaleResim;
            move_uploaded_file($makaleResimTmp,$destination);
       
     }
     
     
     
     $makaleID = pg_escape_string($_POST['ID']);
    $makaleDurum=1;
     $makaleYayinlanmaTarihi=date('Y-m-d');
     $sorgu=pg_query("UPDATE makaleler SET makale_baslik='$makaleAdi',kategori_ref_id='$kategoriRefID',makale_icerik='$makaleDetay',created_on='$makaleYayinlanmaTarihi',makale_resim='$makaleResim',ref_kullanici_id='$makaleYayinlayanKisi'"
             . ",makale_durum='$makaleDurum'   where makale_id='$makaleID'");
   
      if($sorgu){   
         
           header ("Location:index.php");
               
              
           }
              
          
       
          
        }



   ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
      <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
    <script type="application/x-javascript">
tinymce.init({selector:'#Detay'});

    </script>
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   <div class="ortala">
    
    
    <div class="yasla solSide">
<?php include ('../solSide.php');?>
 
    
    </div>
    <div class="yasla icerik">     
       
       <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">    
        <input type="hidden" name="ID" id="ID" value="<?=$kayit['makale_id'] ?>" />
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->kategori_id;?>" <?php
                     if($row_rsKategoriler->kategori_id==$kayit['kategori_ref_id'])
                         {  echo 'selected="selected"';
                                  }?>> <?= $row_rsKategoriler->kategori_adi;?>
                                     
                </option>
                <?php }while($row_rsKategoriler=  pg_fetch_object($rsKategoriler));?>
 
            </select> <br/>           
          
            <label for="Adi">Makale Adı</label> 
           <input type="text" name="Adi" id="Adi" value="<?=$kayit['makale_baslik'] ?>" />     
   <br/>
           <label for="Detay">Detay :</label> 
           <textarea name="Detay" id="Detay"><?=$kayit['makale_icerik'] ?></textarea>
           <br/>
          <label for="Resim">Resim Seç:</label> 
          <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $kayit['makale_resim']; ?>"/>
          <input type="file" name="Resim" id="Resim" />
            <input type="hidden" name="makaleResim" id="makaleResim" value="<?=$kayit['makale_resim'] ?>" />     
        
         
        </fieldset>
        <input type="submit" name="makaleDuzenleSubmit" value="Kaydet" />
           
    </form>
       
         
          
   
          
  </div> 
              
              
          </div>
      

</html>
