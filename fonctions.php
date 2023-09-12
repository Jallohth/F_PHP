<?php
// pour la gestion du menu
function nav_item(string $lien, string $title,string $linkClass = '' ): string {
    $classe = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $lien){
        $classe .=' active';
    }
    // la systaxe array_doc permet d'eviter l'utilisation de trop de point pour la concatenation reduire le travail
    return $html = <<<HTML
    <li class ="$classe">
        <a href="$lien" class="$linkClass">$title</a>
    </li>
HTML;
}
//  l'inclusion des items 
function nav_menu(string $linkClass = ''):string {
    return 
        nav_item('/index.php', 'Home',$linkClass).
        nav_item('/experience.php', 'Experiences',$linkClass).
        nav_item('/contact.php', 'Contact',$linkClass).
        nav_item('/Jeu.php', 'Jeus',$linkClass).
        nav_item('/loisirs.php', 'Recreations',$linkClass).
        nav_item('/dashboard.php', 'Dashboard',$linkClass);
        nav_item('/login.php', 'Login',$linkClass);
}

// la fonction pour les checkbox sur la page jeu.php
function checkbox(string $name,string $value, array $data ):string{
    $attributes='' ;
    if(isset($data[$name]) && in_array($value,$data[$name])){
        $attributes .='checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
} 

// la fonction pour les radiobox
function radio(string $name,string $value, array $data ):string{
    $attributes='' ;
    if(isset($data[$name]) && $value===$data[$name]){
        $attributes .='checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
} 

function dump($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

// crenaux
function creneaux_html(array $creneaux){
    if(empty($creneaux)){
        return'Fermé';
    }
    $phrases = [];
    foreach($creneaux as $creneau){
        $phrases[] = " de <strong>{$creneau[0]}h</strong> - <strong>{$creneau[1]}h</strong>";
    }
    return 'Ouvert' .implode(' et ', $phrases);
}

// fonction pour la gestion de heures
function in_creneaux(int $heure, array $creneaux): bool
{
    foreach($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if($heure >= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}

// function pour selectionner le jour
function select (string $name, $value, array $options) : string{
    $html_options = [];
    foreach($options as $k => $option){
        $attributes = $k == $value ? 'selected ':'';
        $html_options[] = "<option value='$k' $attributes> $option </option>";
    }
    return "<select class= 'form-control' name='$name'>".implode($html_options).'</select>';
}