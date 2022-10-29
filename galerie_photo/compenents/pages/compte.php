<?php
require_once('../comp_base/comp_base.php');
require_once('../../data/dbb/data-processing.php');
start_page('Compte','../../utils/css/');
navbar('../../', '');
var_dump($_SESSION);

  foreach ($tab_users as $key => $value) {
    if($value['email'] == $_SESSION['email'])
    {
    $pic = $value['picture'];
    }
  }
?>

  <div class="container py-5 h-auto">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-9 col-xl-7">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="<?php

                if (isset($pic)){
                  echo "../../data/images/profil_picture/".$pic;
                }
                else{
                  echo "https://avatars.dicebear.com/api/initials/".substr($_SESSION['prenom'], 0, 1). substr($_SESSION['nom'], 0, 1)."svg";
                }
                ?>"
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;"> 
              </div>
              <div class="flex-grow-1 ms-3">
                <h2 class="mb-1" style="color: #2b2a2a;"><?= $_SESSION['prenom'].' '.$_SESSION['nom']?></h2>
                <p class="mb-2 pb-1 text-uppercase" style="color: #2b2a2a;"><?= $_SESSION['rank'] ?></p>
                <p style="color: #2b2a2a;"><?= $_SESSION['email'] ?></p>
                <a class="px-5 py-2 border border-primary" href="../../index.php?disconnect=1">Se deconnecter</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form action="compte.php" method="post"  enctype='multipart/form-data'>
    <input type="file" name="image" accept="image/jpeg, image/png" id="image">
  <button type="submit">Envoyer</button>
  </form>

<?php
if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']))
{
 $origine = $_FILES['image']['tmp_name'];
 $destination = '../../data/images/profil_picture/'.$_FILES['image']['name'];
 move_uploaded_file($origine,$destination);
//type of picture
 switch ($_FILES['image']['type']) {
    case "image/jpeg":
        $type = 'jpg';
        break;
    case "image/png":
        $type = 'png';
        break;

}
$picture = 'picture_'. time();
 rename('../../data/images/profil_picture/'.$_FILES['image']['name'], '../../data/images/profil_picture/'.$picture.'.'. $type);
     $req = "UPDATE users SET picture ='{$picture}.{$type}' WHERE email ='{$_SESSION['email']}'";
    $req_picture = $dbLink->prepare($req); 
 $req_picture->execute();
}
else {
    echo "image mal upload sasa<br>";
}