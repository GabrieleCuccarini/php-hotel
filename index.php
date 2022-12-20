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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./style/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Hotel</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Rating</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotels as $onehotel) {
                    $parkpres = $onehotel['parking'] ? 'Yes' : 'No';
                ?>
                <tr>
                    <td><b><?php echo $onehotel["name"] ?></b></td>
                    <td><?php echo $onehotel["description"] ?></td>
                    <td><?php echo $parkpres ?></td>
                    <td><?php echo $onehotel["vote"] . "/5" ?></td>
                    <td><?php echo $onehotel["distance_to_center"] . " km" ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>


    </div>
</body>

</html>