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


$ParkInp = isset($_GET['parcheggio']) ? ($_GET['parcheggio']) : '';
$RateInp = isset($_GET['voto']) ? ($_GET['voto']) : '';
$FiltersActive = (!empty($ParkInp) || !empty($RateInp));

foreach ($hotels as $hotel) {
    // Primo check: se almeno uno dei due input non è vuoto, entro nel ciclo con push settato true
    if ($FiltersActive) {
        $Push = true;
    // Secondo check: se input parcheggio non è vuoto entro nel ciclo. Poi hotelparking può essere true o false, 
    //  quando è false push viene settato false.
        if (!empty($ParkInp)) {
            if ($hotel['parking'] === false ) {
                $Push = false;
            }
        }
    // Terzo check: se input voto (alias il voto minimo richiesto) non è vuoto ed è maggiore del voto dell'hotel, 
    // il push diventa false. Extra check: se l'input voto è maggiore di 5(che è il massimo) viene settato a 5.
        if (!empty($RateInp)) {
            if ($_GET['voto'] > 5) {
                $_GET['voto'] = 5;
            }
            if ($RateInp > $hotel['vote']) {
                $Push = false;
            }
        }
    // Se dopo aver fatto tutti i filtri, $Push è rimasto a true, vuol dire che corrisponde alla ricerca fatta
    // e aggiungo l'$hotel corrente all'array dei dati filtrati
         if ($Push) {
             $datiFiltrati[] = $hotel;
        }
     }
    // Se il primo check non parte, perché entrambi i cambi sono vuoti, l'array datiFiltrati sarà = hotels
    // Alla fine della fiera, se ci sono degli input di qualche tipo partono i check conseguenti che modificano
    // push e quindi gli elementi che comporranno l'array datifiltrati, altrimenti l'array di riferimento resta hotels.
    else {
        $datiFiltrati = $hotels;
    }
}

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
    <link href="./style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center red">PHP Hotel</h2>
        <form action="" method="GET" class="d-flex mb-3">
            <input name="parcheggio" type="text" class="form-control mx-2 wide"
                placeholder='Invia qualcosa per filtrare'>
            <input name="voto" type="text" class="form-control mx-2 wide"
                placeholder='Inserisci il voto minimo desiderato(max 5)'>
            <input type="submit">
        </form>
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
                foreach ($datiFiltrati as $onehotel) {
                    $parkpres = $onehotel['parking'] ? 'Presente' : 'Assente';
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