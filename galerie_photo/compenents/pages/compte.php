<?php
require_once('../comp_base/comp_base.php');
require_once('../../vendor/autoload.php');
require_once('../../data/dbb/data-processing.php');
start_page('Compte','../../utils/css/');
navbar('../../', '');


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
                <img src="
                
                
                <?php
echo "https://avatars.dicebear.com/api/initials/".substr($_SESSION['prenom'], 0, 1). substr($_SESSION['nom'], 0, 1).'.'."svg";
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

  </form>
