  <?php
    // put your code here
  include("..//kullanici/girisKontrol.php");
include("..//baglan.php");
//silme işlem, tamamlanacak
$id=$_GET['id'];
$sorgu_Sil="DELETE FROM makaleler WHERE makale_id='$id'";
        $_sonuc=pg_query($sorgu_Sil);
        if ($_sonuc) {
            echo 'Silindi';
             header ("Location:index.php"); 
            
    
}
 else {
    echo 'Silme işlemi başarısız';}
        

?>
