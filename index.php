<?php

//ARRRAY ASSOCIATIVO
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

//PER GLI ARRAY ASSOCIATIVI SI USA IL CICLO FOREACH
//Stampo in pagina senza stile
foreach ($hotels as $cur_hotel) {
    echo "Nome: " . $cur_hotel['name'] . "<br>";
    echo "Descrizione: " . $cur_hotel['description'] . "<br>";
    //OPEATORE TERNARIO : condizione ? valore_se_vero : valore_se_falso; 
    // se è true = 'si' se è false ='no'
    echo "Parcheggio: " . ($cur_hotel['parking'] ? 'Sì' : 'No') . "<br>";
    echo "Voto: " . $cur_hotel['vote'] . "<br>";
    echo "Distanza dal centro: " . $cur_hotel['distance_to_center'] . " km<br><br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
</head>
<body>
    
</body>
</html>