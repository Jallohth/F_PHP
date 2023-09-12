<?php 
// partie traitement
$error = null;
/**
 * pour hasher les mots de passe on utilise :
 * echo password_hash('thd',PASSWORD_DEFAULT,['cost' =>20]); et 
 * qui prend 3 parms :
 * "le mot de passe"
 * "le mot de passe par default";
 * "le tableau d'option pour que si l'utiliser veut verifier le mot de passe que ça lui prend du temps
 * var_dump(password_verify('thd','$2y$20$ExbjjKoJl8V5tN2Wh5B0wuSv4T3DjsEaQQwQESV/VBXJ9KQJrteni')); 
 * qui comporte 2 parametres:
 * "le mot de passe à verifier"
 * "le mot de passe hasher"
 */
// la variable qui contient le mot de passe hasher
$password = '$2y$12$l.Ik3VYmqneHFcbL1BlAduA56ooehH4jZuLdynxm1eDSWSSVEup/a';
if(!empty($_POST['username']) && !empty($_POST['password'])){
    if($_POST['username'] === 'thd' && password_verify( $_POST['password'], $password)){
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
        exit();
    }else{
        $error = "Username ou password incorrect !!  ";
    }
}

// rediriger l'utilisateur qui est déjà connecter
require_once 'fonctions/auth.php';
if(est_connecter()){
    header('Location: /dashboard.php');
    exit();
}

require_once 'element/header.php';
?>
<!-- formulaire d'authentification -->

<div class="container">

    <div>
        <h1>Veuillez vous authentifier pour pouvoir accéder à cette page</h1>
    </div>
    <div class="merci">
        <h2>Merci ! pour la bonne compréhension</h2>
    </div>
    <!-- message d'erreur -->
    <?php if($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif;?>
    <form action="" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Your username...">
        </div>
        <div class="form-group">
            <input  class="form-control" type="password" name="password" placeholder="Your password...">
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</div>

<?php require_once 'element/footer.php';?>