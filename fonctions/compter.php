<?php
    // fucution pour l'ajout des viws
    function add_viw(){
        // la definiton des fichiers journalier et fichier
        $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur';
        $fichier_journalier = $fichier.'-'.date('Y-m-d');
        incremeter_compteur($fichier);
        incremeter_compteur($fichier_journalier);
    }

    // la fuction pour l'incrementation du nombre de vues
    function incremeter_compteur(string $fichier):void{
        $compter = 1;
        if(file_exists($fichier)){
            $compter = (int)file_get_contents($fichier);
            $compter++;
        }
        // le chemin vers le fichier et les données
        file_put_contents($fichier, $compter);  
    }
    // la foction pour recuper le nombre de vues
    function nomber_viws():string {
        $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur';
        return file_get_contents($fichier);
    }
    // le nombre de vue par mois
    function nombre_vue_mois(int $year, int $mois) : int {
        $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
        $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur-'.$year.'-'.$mois.'-'.'*';
        $fichiers = glob($fichier);
        $total = 0;
        foreach($fichiers as $fichier){
            $total += (int)file_get_contents($fichier);
        }
        return $total;
    }
    // pour la recuperation du table de explicatif
    function nombre_vue_detail(int $annee, int $mois): array {
        $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
        $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
        $fichiers = glob($fichier);
        $visites = [];
        foreach ($fichiers as $fichier) {
            $parties = explode('-', basename($fichier));
            $visites[] = [
                'annee' => $parties[1],
                'mois' => $parties[2],
                'jour' => $parties[3],
                'visites' => file_get_contents($fichier)
            ];
        }
        return $visites;
    }

?>