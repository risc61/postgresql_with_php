  <?php
    // put your code here
include("..//baglan.php");
//silme işlem, tamamlanacak
$id=$_GET['id'];
$sorgu_Sil="DELETE FROM kategoriler
WHERE ID=$id;";
        $_sonuc=mysql_query($sorgu_Sil);
        if ($_sonuc) {
            echo 'Silindi';
             header ("Location:index.php"); 
            
    
}
 else {
    echo 'Silme işlemi başarısız';}
        

?>
