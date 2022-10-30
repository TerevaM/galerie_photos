<?php
require_once('../comp_base/comp_base.php');
require_once('../../data/dbb/data-processing.php');
start_page('Connexion / Inscription','../../utils/css/');
navbar('../../', '');
?>
<div class="container-fluid row">
  <!-- Inscription  -->
    <form action="user.php" method="POST" class="container border p-5 col-xs-12 col-md-12 col-lg-5 mx-auto  my-5">
        <h3>Inscription</h3>
        <div class="form-group">
            <label for="prenom">Prenom </label>
            <input type="text" name="prenom" class="form-control" id="prenom" autocomplete="off" value="<?php if(!empty($_POST['prenom'])): echo $_POST['prenom']; endif; ?>">
</div>
        <div class="form-group">
        <label for="nom">Nom </label>
        <input type="text" name="nom" class="form-control" id="nom" autocomplete="off" value="<?php if(!empty($_POST['nom'])): echo $_POST['nom']; endif; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email </label>
        <input type="email" name="email" class="form-control" id="email" autocomplete="off" value="<?php if(!empty($_POST['email'])): echo $_POST['email']; endif; ?>">
      <?php
      if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) ):
          foreach ($tab_users as $value) :
            var_dump($value);
              if($_POST['email'] == $value['email']):
                ?>
                <span>adresse email déjà associé à un compte</span>
                <?php
                
                break;
              else:
                echo 'salutation';
                $_SESSION['prenom'] = $_POST['prenom'];
                $_SESSION['nom'] = $_POST['nom'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['rank'] = 'visiteur';
                header('Location: ../../data/dbb/formuser.php');
              endif;
          endforeach;
      endif;
      ?>
      </div>
      <div class="form-group">
        <label for="password">Password </label>
        <input type="password" name="password" class="form-control" id="password" autocomplete="new-password" value="<?php if(!empty($_POST['password'])): echo $_POST['password']; endif; ?>">
      </div>
      <button type="submit" class="btn btn-secondary my-3">Continuer</button>
    </form>
  <!-- Connexion  -->
    <form action="../../data/dbb/connect_user.php" method="POST" class="container border p-5 col-xs-12 col-md-12 col-lg-5 mx-auto my-5">
        <h3>Connexion</h3>
      <div class="form-group">
        <label for="email2">Email </label>
        <input type="email" name="email2" class="form-control" id="email2" autocomplete="on">
    
      </div>
      <div class="form-group">
        <label for="password2">Password </label>
        <input type="password" name="password2" class="form-control" id="password2" autocomplete="on">
      </div>
      <button type="submit" class="btn btn-secondary my-3">Continuer</button>
      <?php 
    
      if(isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <p class="text-danger">email ou mot de passe incorrect</p>
        <?php endif; ?>
    </form>
</div>
<script type="text/javascript" src="../../utils/js/main.js"></script>
<?php
end_page();