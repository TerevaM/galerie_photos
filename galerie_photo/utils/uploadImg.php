<?php

// lien src
if (!empty($pic)){
echo "../../data/images/profil_picture/".$pic;
}
else{
echo "https://avatars.dicebear.com/api/initials/".substr($_SESSION['prenom'], 0, 1). substr($_SESSION['nom'], 0, 1).'.'."svg";
}

//button upload

?>

  <form action="compte.php" method="post"  enctype='multipart/form-data'>
    <input type="file" name="image" accept="image/jpeg, image/png" id="image">
  <button type="submit">Envoyer</button>

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
      // header('Location: compte.php');
}
else {
    echo "image mal upload sasa<br>";
}
