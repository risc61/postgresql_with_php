  <?php
    // put your code here
  include("..//kullanici/girisKontrol.php");

  
include("..//baglan.php");
   $query_Kategoriler = "SELECT * FROM kategoriler";
   $rsKategoriler = pg_query($query_Kategoriler);
   $row_rsKategoriler = pg_fetch_object($rsKategoriler);
   $num_row_rsKategoriler = pg_num_rows($rsKategoriler);

   
   function getirAnaKategori($_id) {   
    $_Sorgu_Ana_KatagoriAdi="SELECT kategori_adi FROM kategoriler Where kategori_id=$_id limit 1";
   $_Ana_Kategori_Adi = pg_query($_Sorgu_Ana_KatagoriAdi);
   while($sutun= pg_fetch_array($_Ana_Kategori_Adi))
   {
     echo $sutun['kategori_adi'];
    }
}
   
   
   
    ?>
<html>
    <head>
        
                <script type="text/javascript">
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>
        <meta charset="UTF-8">
    <title>Kategoriler</title>

    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div>
    <div class="ortala">
    
    
    <div class="yasla solSide">
       
 <?php include ('../solSide.php');?>
    
    </div>
    <div class="yasla icerik">
    <table id="tablom"> <tr>
                <th>Kategori Adı</th>
                <th>Ana Kategori</th>
                <th>Ayarlar</th>
            </tr>
            <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr class="alt1">
                <td> <?= $row_rsKategoriler->kategori_adi; ?></td>
                <td><?= getirAnaKategori($row_rsKategoriler->kategori_ref_id) ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->kategori_id;?>>Düzenle</a>    <a href=sil.php?id=<?=$row_rsKategoriler->kategori_id;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
              <?php ;}    else{?>
            <tr class="alt2">
                <td> <?= $row_rsKategoriler->kategori_adi; ?></td>
                <td><?= getirAnaKategori($row_rsKategoriler->kategori_ref_id) ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->kategori_id;?>>Düzenle</a>     <a href=sil.php?id=<?=$row_rsKategoriler->kategori_id;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
            
             <?php } ?>
          <?php }while($row_rsKategoriler= pg_fetch_object($rsKategoriler));?>
        
            
            
            
            
        </table>
    </div>
      </div>   
    </div>


</body>
</html>
