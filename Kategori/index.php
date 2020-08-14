  <?php
    // put your code here
include("..//baglan.php");
   $query_Kategoriler = "SELECT * FROM kategoriler";
   $rsKategoriler = mysql_query($query_Kategoriler);
   $row_rsKategoriler = mysql_fetch_object($rsKategoriler);
   $num_row_rsKategoriler = mysql_num_rows($rsKategoriler);

   
   
   function getirAnaKategori($_id) {   
    $_Sorgu_Ana_KatagoriAdi="SELECT Adi FROM kategoriler Where ID=$_id limit 1";
   $_Ana_Kategori_Adi = mysql_query($_Sorgu_Ana_KatagoriAdi);
   while($sutun= mysql_fetch_array($_Ana_Kategori_Adi))
   {
     echo $sutun['Adi'];
    }
}
   
   
   
    ?>
<html>
    <head>
          <style>
            table tr,th,td {
                border: 1px solid;
            }
        </style>
                <script type="text/javascript">
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>
        <meta charset="UTF-8">
    <title>Kategoriler</title>
    <link href="../stil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="anasayfa">
    <div class="content">
    <a href="ekle.php">Kategori ekle</a>
    <table> <tr>
                <th>Kategori Adı</th>
                <th>Ana Kategori</th>
                <th>Ayarlar</th>
            </tr>
            <?php do { ?>
           
            
            <tr>
                <td> <?= $row_rsKategoriler->Adi; ?></td>
                <td><?= getirAnaKategori($row_rsKategoriler->kategoriReferansID) ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsKategoriler->ID;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsKategoriler->ID;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
          <?php }while($row_rsKategoriler= mysql_fetch_object($rsKategoriler));?>
        
            
            
            
            
        </table>
      </div>   
    </div>
</body>
</html>
