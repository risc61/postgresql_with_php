<?php



echo '<div>'.$_SESSION['Email'].'</div>';
echo '<div><a class="myButon"href="../Kategori/index.php">Kategori Listele</a></div> ';
echo '<div><a class="myButon" href="../Kategori/ekle.php">Kategori ekle</a></div> ';
echo '<div><a  class="myButon"href="../Makale/index.php">Makale Listele</a></div>';
echo '<div><a  class="myButon"href="../Makale/ekle.php">Makale ekle</a></div>';
echo '<div><a  class="myButon"href="../Kullanici/listele.php">Kullanici Listele</a></div>';
echo '<div><a  class="myButon"href="../../anasayfa.php">Siteyi Görüntüle </a></div>';

  if(isset($_SESSION['Giris']))
         {
     echo '<div><a class="myButon" href="../../Yonetim/Kullanici/cikis.php">Çıkış</a></div>';
    
     }
