    <?php // pg sunucu bağlantısı bağlantısı

include("..//baglan.php");
include("..//kullanici/girisKontrol.php");

    
    $query_Kategoriler = "SELECT * FROM kategoriler";
    $rsKategoriler = pg_query($query_Kategoriler);
    $row_rsKategoriler = pg_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = pg_num_rows($rsKategoriler);
    

    //Kategori ekleme kodları
    if(isset($_POST['kategoriEkleSubmit'])){
        
     /* echo "form gönderildi";
       
       echo "<pre>";
       print_r($_POST);
       
       echo "</pre>"; */
        
       $kategoriRefID = pg_escape_string($_POST['KategoriRefID']);
       $kategoriAdi = pg_escape_string($_POST['Adi']);    
       $query_KategoriEkle="insert into Kategoriler(kategori_adi,kategori_ref_id) values('$kategoriAdi','$kategoriRefID')";
       $sonuc = pg_query($query_KategoriEkle);
       
        if($sonuc){
            header ("Location:index.php"); 
           
        }
    }
   
    ?>
<html>
    <head>
        <meta charset="UTF-8">
      
    <title>Kategori Ekle</title>
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>

</head>
<body>
      <div class="ortala">
    
    
    <div class="yasla solSide">
         <?php include ('../solSide.php');?>
 
    
    </div>
    <div class="yasla icerik">
   
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->kategori_id;?>" >
                    <?= $row_rsKategoriler->kategori_adi;?>
                </option>
                <?php }while($row_rsKategoriler=  pg_fetch_object($rsKategoriler));?>
 
            </select>
            
          
            <label for="Adi">Kategori Adı</label> 
         <input type="text" name="Adi" id="Adi" />
        
            
        </fieldset>
        <input type="submit" name="kategoriEkleSubmit" value="Kategori Ekle" />
    </form>
   
    </div>
    </div>
</body>
</html>
