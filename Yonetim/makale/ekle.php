    <?php // pg sunucu bağlantısı bağlantısı
 include("..//kullanici/girisKontrol.php");
include("..//baglan.php");

//kategorileri select yüklemek için
    $query_Kategoriler = "SELECT * FROM kategoriler";
    $rsKategoriler = pg_query($query_Kategoriler);
    $row_rsKategoriler = pg_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = pg_num_rows($rsKategoriler);

       //Makale ekleme kodları
    if(isset($_POST['makaleEkleSubmit'])){
        
      echo "form gönderildi";
       
       /*echo "<pre>";
       print_r($_POST);
       print_r($_FILES);
       
       echo "</pre>";*/ 
        
       $kategoriRefID = pg_escape_string($_POST['KategoriRefID']);
       $makaleAdi = pg_escape_string($_POST['Adi']);
       $makaleDetay=  pg_escape_string($_POST['Detay']);
       $makaleOnay=  pg_escape_string($_POST['Onay']);
        echo $makaleOnay;
       $makaleYayinlayanKisi=1;
       $makaleDurum=1;
       $makaleYayinlanmaTarihi=date('Y/m/d');
       
       $makaleResim= pg_escape_string($_FILES['Resim']['name']);
           if($makaleResim==null){
       
           $makaleResim= 'yok.png';}
           
       //echo $makaleResim;
       
       $query_MakaleEkle="insert into makaleler(makale_baslik,makale_icerik,makale_resim,kategori_ref_id,created_on,onay,ref_kullanici_id,makale_durum,total) values('$makaleAdi','$makaleDetay','$makaleResim','$kategoriRefID','$makaleYayinlanmaTarihi','$makaleOnay','$makaleYayinlayanKisi','$makaleDurum',totalRecords())";
       
       $sonuc = pg_query($query_MakaleEkle);
       
        if($sonuc){
           $makaleResimTmp=$_FILES['Resim']['tmp_name'];
           $destination="../_upload/resimler/makaleResimler/".$makaleResim;
            move_uploaded_file($makaleResimTmp,$destination);
            echo 'makale Eklendi';
           
        }
    }
    
    
    
 
  ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Makale Ekle</title>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="../script/tinymce_4.3.11/tinymce/js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
    <script type="application/x-javascript">
tinymce.init({selector:'#TypeHere'});
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
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->kategori_id;?>" >
                    <?= $row_rsKategoriler->kategori_adi;?>
                </option>
                <?php }while($row_rsKategoriler= pg_fetch_object($rsKategoriler));?>
 
            </select>
            <br/>
              <br/>
            
          
            <label for="Adi">Makale Adı:</label> 
           <input type="text" name="Adi" id="Adi" />
              <br/>
              <br/>
           <label for="Detay">Detay :</label> 
           <textarea id="TypeHere" name="Detay"></textarea>
           
          <label for="Onay">Seçiniz</label> 
            <input type="radio" id="onayla" name="Onay" value="true">
            <label for="male">Onay</label><br>
            <input type="radio" id="onaylama" name="Onay" value="false">
            <label for="female">onaylama</label><br>
          <label for="Resim">Resim Seç:</label> 
          <input type="file" name="Resim" id="Resim" />
            
        </fieldset>
        <input type="submit" name="makaleEkleSubmit" value="Makale Ekle" />
    </form>
      

              
              
          </div>
      </div>
    
   
</body>
</html>
