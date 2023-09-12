<!-- fonction pour gerer le menu -->
<?php 
if(!function_exists('nav_item')){
    function nav_item(string $lien, string $title ): string {
        $classe = 'nav-item';
        if($_SERVER['SCRIPT_NAME'] === $lien){
            $classe .=' active';
        }
        // la systaxe array_doc permet d'eviter l'utilisation de trop de point pour la concatenation reduire le travail
        return $html = <<<HTML
        <li class ="$classe">
            <a href="$lien" class="nav-link">$title</a>
        </li>
HTML;
    }
}

?>

<?= nav_item('/index.php', 'Home');?>
<?= nav_item('/contact.php', 'Contact');?>