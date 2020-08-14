  <?php
    // put your code here
include("..//baglan.php");
         $query_Kategoriler = "SELECT * FROM kategoriler";
         $rsKategoriler = mysql_query($query_Kategoriler);
         $row_rsKategoriler = mysql_fetch_object($rsKategoriler);
         $num_row_rsKategoriler = mysql_num_rows($rsKategoriler);
if(isset($_GET["id"])){
    $_id=$_GET["id"];
    $sorgu=mysql_query("select * from kategoriler where id='$_id'");
$kayit=mysql_fetch_array($sorgu);
echo 'boş değil';
}    if(isset($_POST['kategoriDuzenleSubmit'])){
    
     $kategoriRefID = mysql_real_escape_string($_POST['KategoriRefID']);
     $kategoriAdi = mysql_real_escape_string($_POST['Adi']);
        $kategoriID = mysql_real_escape_string($_POST['ID']);
     $sorgu=mysql_query("UPDATE kategoriler
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
                <option value="<?= $row_rsKategoriler->ID;?>" <?php
                     if($row_rsKategoriler->ID==$kayit['kategoriReferansID'])
                         {  echo 'selected="selected"';
                                  }?>> <?= $row_rsKategoriler->Adi;?>
                  
                    
                </option>
                <?php }while($row_rsKategoriler=  mysql_fetch_object($rsKategoriler));?>
 
            </select>
            
          
            <label for="Adi">Kategori Adı</label> 
         <input type="text" name="Adi" id="Adi" value="<?=$kayit['Adi'] ?>" />
         <input type="text" name="ID" id="ID" value="<?=$kayit['ID'] ?>" />
        
            
        </fieldset>
        <input type="submit" name="kategoriDuzenleSubmit" value="Kaydet" />
    </form>
    </div></div>
</body>
</html>
