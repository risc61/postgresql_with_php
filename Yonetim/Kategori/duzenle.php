  <?php
    // put your code here
include("..//kullanici/girisKontrol.php");

include("..//baglan.php");
         $query_Kategoriler = "SELECT * FROM kategoriler";
         $rsKategoriler = pg_query($query_Kategoriler);
         $row_rsKategoriler = pg_fetch_object($rsKategoriler);
         $num_row_rsKategoriler = pg_num_rows($rsKategoriler);
if(isset($_GET["id"])){
    $_id=$_GET["id"];
    $sorgu=pg_query("select * from kategoriler where kategori_id='$_id'");
$kayit=pg_fetch_array($sorgu);

}    if(isset($_POST['kategoriDuzenleSubmit'])){
    
     $kategoriRefID = pg_escape_string($_POST['KategoriRefID']);
     $kategoriAdi = pg_escape_string($_POST['Adi']);
        $kategoriID = pg_escape_string($_POST['ID']);
     $sorgu=pg_query("UPDATE kategoriler
    SET Adi='$kategoriAdi',kategoriReferansID='$kategoriRefID'
   where ID='$kategoriID'");
      if($sorgu){
            header ("Location:index.php"); 
           
        }
}


   ?>
<html>
    <head>
        <meta charset="UTF-8">
    <title>Kategori Düzenle</title>

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
                <option value="<?= $row_rsKategoriler->kategori_id;?>" <?php
                     if($row_rsKategoriler->kategori_id==$kayit['kategori_ref_id'])
                         {  echo 'selected="selected"';
                                  }?>> <?= $row_rsKategoriler->kategori_adi;?>
                  
                    
                </option>
                <?php }while($row_rsKategoriler=  pg_fetch_object($rsKategoriler));?>
 
            </select>
            
           
            <label for="Adi">Kategori Adı</label> 
         <input type="text" name="Adi" id="Adi" value="<?=$kayit['kategori_adi'] ?>" />
         
         <input type="text" visible="false" name="ID" id="ID" value="<?=$kayit['kategori_id'] ?>" />
        
            
        </fieldset>
        <input type="submit" name="kategoriDuzenleSubmit" value="Kaydet" />
    </form>
    </div></div>
</body>
</html>
