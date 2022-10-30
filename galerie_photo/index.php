<?php
use App\Globals\Globals;
require_once('./compenents/comp_base/comp_base.php');
start_page("Galerie Photo",'utils/css/');
navbar('', './compenents/pages/');
require_once('./vendor/autoload.php');

$globals = new Globals;

$get = $globals->getGET();
var_dump($get['theme']);
?>


<script src="./utils/js/main.js"></script>
<?php
end_page();