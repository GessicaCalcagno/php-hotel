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

// var_dump($hotels);

//PER GLI ARRAY ASSOCIATIVI SI USA IL CICLO FOREACH
//Stampo in pagina senza stile
// foreach ($hotels as $cur_hotel) {
//     echo "Nome: " . $cur_hotel['name'] . "<br>";
//     echo "Descrizione: " . $cur_hotel['description'] . "<br>";
//     //OPEATORE TERNARIO : condizione ? valore_se_vero : valore_se_falso; 
//     // se è true = 'si' se è false ='no'
//     echo "Parcheggio: " . ($cur_hotel['parking'] ? 'Sì' : 'No') . "<br>";
//     echo "Voto: " . $cur_hotel['vote'] . "<br>";
//     echo "Distanza dal centro: " . $cur_hotel['distance_to_center'] . " km<br><br>";
// }

$filtered_hotels = $hotels; //questa è la copia dell'array --> è una DEEP COPY o COPY BY VALUE; (shallow copy in JS).


//Controlla il valore della chiave solo se c'è la chiave
if (isset($_GET["parking"]) && $_GET["parking"] === "1") {
    $tmp_hotels = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["parking"]) {
            $tmp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $tmp_hotels; //Devo rimancare la copia dell'array
} else if ($_GET["parking"] === "0") {
    $tmp_hotels = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["parking"] === false) {
            $tmp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $tmp_hotels;
};

if (isset($_GET["vote"])) {
    $selected_vote = intval($_GET["vote"]);
    $tmp_hotels = []; // Array di appoggio per salvare i valori temporanei
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["vote"] >= $selected_vote) {
            $tmp_hotels[] = $hotel;
        }
    }
    $filtered_hotels = $tmp_hotels;
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- LINK BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <h1 class="mt-4 mb-4">Lista degli Hotel</h1>

        <!-- FORM -->
        <form action="index.php" method="GET" class="mb-4">
            <div class="form-row">
                <div>
                    <label for="parking">Parcheggio</label>
                    <select name="parking" id="parking" class="form-control" aria-label="Filtra per il parcheggio">
                        <option value="">Tutti</option>
                        <option value="1">Sì</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div>
                    <label for="vote">Voto</label>
                    <select name="vote" id="vote" class="form-control" aria-label="Filtra per voto">
                        <option value="">Tutti</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class=" pt-2">
                    <button type="submit" class="btn btn-primary">Filtra</button>
                </div>
            </div>
        </form>


        <!-- TABLE -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filtered_hotels as $cur_hotel) { ?>
                    <tr>
                        <!-- Invece di ?php echo posso scrivere ?= -->
                        <td><?= $cur_hotel['name']; ?></td>
                        <td><?php echo $cur_hotel['description']; ?></td>
                        <td><?php echo $cur_hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $cur_hotel['vote']; ?></td>
                        <td><?php echo $cur_hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>