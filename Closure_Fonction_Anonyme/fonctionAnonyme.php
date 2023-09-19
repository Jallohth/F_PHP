<?php

$eleves = [
    [
        'nom' => 'THD',
        'age' => 20,
        'moyenne' => 18
    ],
    [
        'nom' => 'Mouhammad Bah',
        'age' => 16,
        'moyenne' => 15
    ],
    [
        'nom' => 'Houlaymatou Diallo',
        'age' => 10,
        'moyenne' => 8
    ],
    [
        'nom' => 'Maimounatou Diallo',
        'age' => 19,
        'moyenne' => 17
    ]
];

class Eleves{
    
    private $eleves = [
            [
                'nom' => 'THD',
                'age' => 20,
                'moyenne' => 18
            ],
            [
                'nom' => 'Mouhammad Bah',
                'age' => 16,
                'moyenne' => 15
            ],
            [
                'nom' => 'Houlaymatou Diallo',
                'age' => 10,
                'moyenne' => 8
            ],
            [
                'nom' => 'Maimounatou Diallo',
                'age' => 19,
                'moyenne' => 17
            ]
        ];

    public function bonEleves(){
        return array_filter($this->eleves, function($eleve) {
            return $eleve["moyenne"] > 10;
        });
    }

    public function sortBy(array $eleves, string $key)
    {
        usort($eleves, function ($a, $b) use ($key) {
            return $a[$key] - $b[$key];
        });
        return $eleves;
    }

}

$elevesSorted = new Eleves();
print_r($elevesSorted->bonEleves());

$elevesMoyennat = new Eleves();
print_r($elevesMoyennat->sortBy($eleves, 'age'));
// $elevesSorted->sortBy($this->eleves, 'age');