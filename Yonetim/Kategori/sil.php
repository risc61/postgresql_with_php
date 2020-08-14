  <?php
    // put your code here
include("..//baglan.php");
include("..//kullanici/girisKontrol.php");
//silme işlem, tamamlanacak
$id=$_GET['id'];
$sorgu_Sil="DELETE FROM kategoriler
WHERE kategori_id=$id;";
        $_sonuc=pg_query($sorgu_Sil);
        if ($_sonuc) {
            echo 'Silindi';
             header ("Location:index.php"); 
            
    
}
 else {
    echo 'Silme işlemi başarısız';}
        

?>
