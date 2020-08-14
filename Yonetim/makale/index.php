  <?php
    // put your code here
  include("..//kullanici/girisKontrol.php");
   include("..//baglan.php");
   
   
   
   
   
   
    $makaleDurum=1;
   $query_Makaleler = "SELECT * FROM makaleler Where makale_durum='$makaleDurum' ORDER BY
	makale_id DESC;";
   $rsMakaleler = pg_query($query_Makaleler);
   $row_rsMakaleler = pg_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = pg_num_rows($rsMakaleler);

   
   
   function getirAnaKategori($_id) {   
    $_Sorgu_Ana_KatagoriAdi="SELECT kategori_adi FROM kategoriler Where kategori_id=$_id limit 1";
   $_Ana_Kategori_Adi = pg_query($_Sorgu_Ana_KatagoriAdi);
   while($sutun= pg_fetch_array($_Ana_Kategori_Adi))
   {
     echo $sutun['kategori_adi'];
    }
}

   //Kategori ekleme kodları
    if(isset($_POST['makaleAra'])){  

   $makaleDurum=1;
   $makaleAdi=pg_escape_string($_POST['makale_adi']);
   $query_Makaleler = "SELECT * FROM makaleler Where makale_durum='$makaleDurum' and makale_baslik like '%$makaleAdi%' ORDER BY makale_id DESC;";
   $rsMakaleler = pg_query($query_Makaleler);
   $row_rsMakaleler = pg_fetch_object($rsMakaleler);
   $num_row_rsMakaleler = pg_num_rows($rsMakaleler);
       
    
    }
   
   
   
    ?>
<html>
    <head></div>
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
    <title></title>
  
    <link href="../yonetimPanelStil.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   <div>
    <div class="ortala">
    
    
    <div class="yasla solSide">
       
 <?php include ('../solSide.php');?>
     <div class="yasla icerik">
   
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Makale Ara</legend>     
            <label for="makale_adi">Makale Adı</label> 
         <input type="text" name="makale_adi" id="makale_adi" />    
            
        </fieldset>
        <input type="submit" name="makaleAra" value="Makale Ara" />
    </form>
   
    </div>
    </div>
    <div class="yasla icerik">
    <table id="tablom"> <tr>
                <th>Makale Resim</th>
                <th>Makale Adı</th>
                <th>Kategori Adı</th>
                <th>Yayınlanma Tarihi Adı</th>
                <th>Ayarlar</th>
            </tr>
             <?php $sayac=0; do { ?>
           
             <?php  $sayac=$sayac+1; if($sayac%2==0){?>
            <tr class="alt1">
                <td> <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $row_rsMakaleler->makale_resim; ?>"/></td>
                <td> <?= $row_rsMakaleler->makale_baslik; ?></td>
                <td><?= getirAnaKategori($row_rsMakaleler->kategori_ref_id) ?></td>
                <td><?= $row_rsMakaleler->created_on; ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsMakaleler->makale_id;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsMakaleler->makale_id;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
            
            
            <?php ;}    else{?>
            <tr class="alt2">
                <td> <img height="75px" width="50px" src="../_upload/resimler/makaleResimler/<?= $row_rsMakaleler->makale_resim; ?>"/></td>
                <td> <?= $row_rsMakaleler->makale_baslik; ?></td>
                <td><?= getirAnaKategori($row_rsMakaleler->kategori_ref_id) ?></td>
                <td><?= $row_rsMakaleler->created_on; ?></td>
                <td><a href=duzenle.php?id=<?=$row_rsMakaleler->makale_id;?>>Düzenle</a>   ||  <a href=sil.php?id=<?=$row_rsMakaleler->makale_id;?> onclick="return silOnayla();">Sil</a></td>
            </tr>
             <?php } ?>
          <?php }while($row_rsMakaleler= pg_fetch_object($rsMakaleler));?>            
                                    
        </table>
    </div>   
    </div>
   </div>
</body>
</html>
