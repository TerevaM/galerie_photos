<?php
require_once('../../data/dbb/data-processing.php');
if(!empty($_FILES['image'])) {
    foreach ($_FILES['image'] as $key => $value) {

        echo $key . ' = '. $value . '<br>';
    }
}
else {
    echo "pas d'image upload";
}

//Download the picture on folder fichier.
if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']))
{
 $origine = $_FILES['image']['tmp_name'];
 $destination = '../../data/images/'.$_FILES['image']['name'];
 move_uploaded_file($origine,$destination);
}
else {
    echo "image mal upload <br>";
}

foreach ($tab_users as $key => $value) {
    echo $value['rank'];
}