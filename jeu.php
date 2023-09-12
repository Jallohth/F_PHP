<?php
require_once 'fonctions.php';
// l'utilisation de la logique
$aDeviner=100;
$erreur=null;
$succes=null;
$value=null;

// ========================En utilisant la methode $_GET
if(isset($_GET['chiffre'])){
    if($_GET['chiffre'] > $aDeviner) {
        $erreur="Votre  chiffre  est  trop  grand";
    }elseif($_GET['chiffre']<$aDeviner){
        $erreur="Votre  chiffre  est  trop  petit";
    }else{
        $succes="Bravo !! vous avez deviner le chiffre  est  : <strong>$aDeviner</strong>";    
    }
    $value=(int)$_GET['chiffre'];
}
/*
 * ======================En utilisant la methode $_POST

if(isset($_POST['chiffre'])){
    $value=(int)$_POST['chiffre'];
    if( $value > $aDeviner) {
        $erreur="Votre  chiffre  est  trop  grand";
    }elseif( $value < $aDeviner){
        $erreur="Votre  chiffre  est  trop  petit";
    }else{
        $succes="Bravo !! vous avez deviner le chiffre  est  : <strong>$aDeviner</strong>";    
    }
}
*/
$title="Ma page jeu";
require 'element/header.php';
?>
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <!-- l'utilisation de la logique -->
        <div class="message">

        </div>
        <?php if($erreur):?> 
        <div class="alert alert-danger">
            <?=$erreur?>
        </div>
        <?php elseif($succes):?> 
        <div class="alert alert-success">
            <?=$succes?>
        </div>
        <?php endif?>

        <form action="jeu.php" method="GET">
            <div class="form-group">
                <input type="number" class="form-control " name="chiffre" placeholder="Deviner un chiffre de 0 à 1000" value="<?=$value?>"  >
            </div>
            <div class="jeu-bouton">
                 <button type="submit" class="btn btn-primary"> Deviner</button>
            </div>
        </form>
    </div>
</main>

<!-- le tableau de configuration -->
<!-- checkbox -->
<?php
 $parfums =[
     'Fraise'=>4,
     'Chocolat' =>5,
     'Vanille' =>6
 ];
//  radio 
 $cornets =[
    'Pot'=>2,
    'Cornet' =>1,
];
//  checkbox
$supplements =[
    'Pépites de chocolat'=>40,
    'Chantilly' =>10,
];

$ingredients=[] ;
$total=0;
// VERSION OPTIMISEE
foreach(['parfum','supplement'] as $name)  {
    if(isset($_GET[$name])){
        $liste = $name. 's';
        $choix = $_GET[$name] ;
        if(is_array($choix)){
            foreach($choix as $value)  {
               if(isset($$liste[$value])){
                   $ingredients[] = $value;
                   $total += $$liste[$value];
               }
            }
        }else{
            if(isset($$liste[$choix])){
                $ingredients[] = $choix;
                $total += $$liste[$choix];
            }
        }
    }
}

/*
VERSION DETAILLER

if(isset($_GET['parfum'])){
    foreach($_GET['parfum'] as $parfum)  {
        if(isset($parfums[$parfum])){
            $   s[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}
if(isset($_GET['supplement'])){
    foreach($_GET['supplement'] as $supplement)  {
        if(isset($supplements[$supplement])){
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}
if(isset($_GET['cornet'])){
    $cornet=$_GET['cornet'];
    if(isset($cornets[$cornet])){
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}

*/
?>
<div class="row container ">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Votre glace</h4>
                <ul>
                    <?php foreach($ingredients as $ingredient):?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach?>
                </ul>
                <p>
                    <strong> Prix : <?=$total?> €</strong>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">    
        <h1>Composer votre glace</h1>
        <form action="jeu.php" method="GET">  
            <h2>Choississez vos parfums</h2> 
            <?php foreach($parfums as $parfum => $prix):?>
            <div class="checkbox">
                <label>
                    <?= checkbox('parfum ',$parfum,$_GET)?>
                    <?=$parfum?> - <?=$prix?> €
                </label>
            </div>
            <?php endforeach?>
            <h2>Choississez votre cornet</h2> 
            <?php foreach($cornets as $cornet => $prix):?>
            <div class="checkbox">
                <label>
                    <?= radio('cornet ',$cornet,$_GET)?>
                    <?=$cornet?> - <?=$prix?> €
                </label>
            </div>
            <?php endforeach?>
            <h2>Choississez vos suppliments</h2> 
            <?php foreach($supplements as $supplement => $prix):?>
            <div class="checkbox">
                <label>
                    <?= checkbox('supplement ',$supplement,$_GET)?>
                    <?=$supplement?> - <?=$prix?> €
                </label>
            </div>
            <?php endforeach?>
            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>



<!-- exercices -->



<?php     require 'element/footer.php';?>