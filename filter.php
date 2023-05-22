<?php


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

    // Filtra gli hotel in base alle selezioni del form
    $showParkingOnly = isset($_GET['show_parking']);
    //$showParkingOnly = isset($_GET['show_parking']) && $_GET['show_parking'] === 'on';
    $ratingFilter = $_GET['rating'] ?? null;


    if ($showParkingOnly) {
        $filteredHotels = [];
        foreach ($hotels as $hotel) {
            if ($hotel['parking']) {
                $filteredHotels[] = $hotel;
            }
        }
        $hotels = $filteredHotels;
    }


    if ($ratingFilter) {
        $filteredHotels = [];
        foreach ($hotels as $hotel) {
            if ($hotel['vote'] >= $ratingFilter) {
                $filteredHotels[] = $hotel;
            }
        }
        $hotels = $filteredHotels;
    }


    // risoluzione con funzioni
    // if ($ratingFilter) {
    //     $hotels = array_filter($hotels, function ($hotel) use ($ratingFilter) {
    //         return $hotel['vote'] >= $ratingFilter;
    //     });
    // }

    // if ($showParkingOnly) {
    //     $hotels = array_filter($hotels, function ($hotel) {
    //         return $hotel['parking'] == true;
    //     });
    // }

?>




<!doctype html>
<html lang="en">
    <head>

        <title>PHP HOTEL FILTER</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- Style CSS -->
        <link rel="stylesheet" href="./asset/css/reset.css">
        <link rel="stylesheet" href="./asset/css/style.css">
        <!-- <link rel="stylesheet" href="./asset/css/media-queries.css"> -->

        <!-- Font style -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

        <!-- Icon style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Favicon -->
        <!-- <link rel="icon" type="image/x-icon" href="./asset/img/favicon.ico"> -->

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous" defer></script>

    </head>


    <body>

    <main class="col-8 m-auto p-4">

            <h1>Elenco Hotel</h1>

            <table class="table">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
                <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <td scope="row"><?php echo $hotel['name']; ?></td>
                        <td scope="row"><?php echo $hotel['description']; ?></td>
                        <td scope="row"><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td scope="row"><?php echo $hotel['vote']; ?></td>
                        <td scope="row"><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </main>

    </body>
    </html>