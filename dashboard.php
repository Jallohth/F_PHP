<?php
$nomMois = null;
require_once 'fonctions/auth.php';
utilisateur_connecte();
require_once 'fonctions/compter.php';
// recuper l'année en cours
$annee = (int)date('Y');
// recuperation de l'annee selectionner s'il exite sinon afficher l'année par defaut qui se trouve dans le condition ci bas
// on met les valeurs par defaut a null au niveau de l'annee et mois
$annee_selec = empty($_GET['annee']) ? null : (int)$_GET['annee'];
// pour recuper l'année sectionner
$mois_selec = (int)empty($_GET['mois']) ? null : $_GET['mois'];
// le total des viws
if ($annee_selec && $mois_selec) {
    $total = nombre_vue_mois($annee_selec, $mois_selec);
    $detail = nombre_vue_detail($annee_selec, $mois_selec);
} else {
    $total = nomber_viws();
}

// afficher l'ensemble des moins
$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];


require_once 'element/header.php';
?>
<div class="container text-center">
    <div class="row ">
        <div class="col-md-12 cols-ms-6 ">
            <?php
                $time1 = new DateTime('2001-06-03 00:00:00');
                $time2 = new DateTime(date('Y-m-d h:i:s'));
                $diff = $time1->diff($time2, true);
                $y = $diff->y; $m = $diff->m; $d = $diff->d; $h = $diff->h;$i = $diff->i; $s = $diff->s;
                echo $y > 1 ?  "<strong>{$y}</strong> ans " : "<strong>{$y}</strong> an ";
                echo $m > 1 ?  "<strong>{$m}</strong> mois " : "<strong>{$m}</strong> moi ";
                echo $d > 1 ?  "<strong>{$d}</strong> jours " : "<strong>{$d}</strong> jour ";
                echo $h > 1 ?  "<strong>{$h}</strong> heures " : "<strong>{$h}</strong> heure ";
                echo $i > 1 ?  "<strong>{$i}</strong> minuites " : "<strong>{$i}</strong> minuite ";
                echo $s > 1 ?  "<strong>{$s}</strong> secondes depuis la création de votre site" : "<strong>{$s}</strong> seconde depuis la création de votre site";  
            ?>
        </div>
    </div>
</div>
<div class="container row m-auto" id="annee">
    <div class="col-md-4">
        <h4 class="my-4 text-dark fw-bold">Les 5 dernières années</h4>
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <!-- pour afficher les années, et verifier l'annee active et puis on la selection -->
                <a class="list-group-item <?= $annee - $i === $annee_selec ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
                <?php if ($annee - $i === $annee_selec) : ?>
                    <div class="list-group" id='mois'>
                        <?php foreach ($mois as $numero => $moi) : ?>
                            <a class="list-group-item p-2 <?= $numero == $mois_selec ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee_selec ?>&mois=<?= $numero ?>"><?= $moi ?></a>
                            <?php $numero == $mois_selec ?  $nomMois = $moi : '' ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <!-- verifier si la variable detail est definies -->
        <?php if (isset($detail)) : ?>
            <h4 class="my-4 ms-0 text-dark fw-bold">Les détails de visites mensuelles sont ci-après: </h4>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Jours</th>
                        <th>Mois</th>
                        <th>Années</th>
                        <th>Nombre de visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $ligne) : ?>
                        <tr>
                            <td><?= $ligne['jour'] ?></td>
                            <td><?= $ligne['mois'] ?></td>
                            <td><?= $ligne['annee'] ?></td>
                            <td>Il y a <?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?= $mois_selec ? "<h4 class='my-4 ms-0 text-dark fw-bold'>Le nombres de visites au mois de <strong class='text-primary'>{$nomMois}</strong> est : </h4>" : '' ?>
        <?= $mois_selec ? "" : "<h4 class='my-4 ms-0 text-dark fw-bold'>Le nombres de visites total est : </h4>" ?>
        <div class="card">
            <div class="card-body">
                <!-- pour afficher le nombre de visitaires tout en utilisant la ternair -->
                <strong><?= $total  ?></strong> Visite<?= $total > 1 ? 's' : '' ?>
            </div>
        </div>
    </div>
</div>



<?php require_once 'element/footer.php'; ?>