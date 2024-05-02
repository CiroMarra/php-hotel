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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- --- BOOTSTRAP --- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Elenco Hotel</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro (km)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel): ?>
                <?php
                if (isset($_GET['parkingFilter']) && $_GET['parkingFilter'] !== '') {
                    if (($hotel['parking'] && $_GET['parkingFilter'] === 'false') ||
                        (!$hotel['parking'] && $_GET['parkingFilter'] === 'true')) {
                        continue;
                    }
                }
                ?>
                <tr>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method="GET">
        <div class="mb-3">
            <label for="parkingFilter" class="form-label">Cerca per parcheggio:</label>
            <select class="form-select" id="parkingFilter" name="parkingFilter">
                <option value="">Mostra tutti</option>
                <option value="true">Con parcheggio</option>
                <option value="false">Senza parcheggio</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cerca</button>
    </form>
</div>
</body>
</html>