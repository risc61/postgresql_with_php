    <?php // mysql sunucu bağlantısı bağlantısı
 
include("..//baglan.php");
  
    
    $query_Kategoriler = "SELECT * FROM kategoriler";
    $rsKategoriler = mysql_query($query_Kategoriler);
    $row_rsKategoriler = mysql_fetch_object($rsKategoriler);
    $num_row_rsKategoriler = mysql_num_rows($rsKategoriler);
    

    //Kategori ekleme kodları
    if(isset($_POST['kategoriEkleSubmit'])){
        
     /* echo "form gönderildi";
       
       echo "<pre>";
       print_r($_POST);
       
       echo "</pre>"; */
        
       $kategoriRefID = mysql_real_escape_string($_POST['KategoriRefID']);
       $kategoriAdi = mysql_real_escape_string($_POST['Adi']);
    
       $query_KategoriEkle="insert into Kategoriler(Adi,kategoriReferansID) values('$kategoriAdi','$kategoriRefID')";
       
        $sonuc = mysql_query($query_KategoriEkle);
       
        if($sonuc){
            header ("Location:index.php"); 
           
        }
    }
    
    ?>
<html>
    <head>
        <meta charset="UTF-8">
          <style>
        label {
            
            display: block;
            font-size:1em;
            font-family: verdana;
            font-weight: bold;
            margin:10px 0;
            
        }
    </style>
    <title>Kategori Ekle</title>
    <link href="../stil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="anasayfa">
    <div class="content">
     <a href="index.php">Kategoriler</a>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Kategoriler</legend>    
            <label for="KategoriRefID">Ana Kategorisi</label>
            <select name="KategoriRefID" id="KategoriRefID">
                 <?php do { ?>
                <option value="<?= $row_rsKategoriler->ID;?>" >
                    <?= $row_rsKategoriler->Adi;?>
                </option>
                <?php }while($row_rsKategoriler=  mysql_fetch_object($rsKategoriler));?>
 
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
