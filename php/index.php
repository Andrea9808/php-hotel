
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hotel</title>
</head>
<body>
    <div class="container-fluid">

        <h3 class="my-3">HOTEL</h3>
        <strong>Seleziona in base alle tue necessità</strong>
        <form class="my-4">
            
            <label for="parcheggio">PARCHEGGIO HOTEL:</label>
            <select name="parcheggio" id="parcheggio">
                <option value="tutti">Tutti</option>
                <option value="con_parcheggio">Con Parcheggio</option>
                <option value="senza_parcheggio">Senza Parcheggio</option>
            </select>
            <input type="submit" value="INVIA"><br>

            <label for="vote">VOTO:</label>
            <input type="number" name="voto" id="vote" min="1" max="5">
            <input type="submit" value="INVIA">
            

        </form>
        
        <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>description</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>

                <!-- IMPLEMENTAZIONE PHP -->
                <?php

                    //PARCHEGGIO
                    // Creo una variabile chiamata "filtro_parcheggio". Verifico se il parametro 'parcheggio' è presente nella richiesta GET.
                    // Se è presente, assegno il suo valore a $filtro_parcheggio, altrimenti assegno il valore predefinito 'tutti'.
                    if (isset($_GET['parcheggio'])) {

                        $filtro_parcheggio = $_GET['parcheggio'];

                    } else {

                        $filtro_parcheggio = 'tutti';
                    }

                    //VOTO
                    // Creo una variabile chiamata "filtro_voto". Verifico se il parametro 'voto' è presente nella richiesta GET.
                    // Se è presente, assegno il suo valore a $filtro_voto, altrimenti assegno il valore stringa vuota.
                    if(isset($_GET['voto'])){

                        $filtro_voto = $_GET['voto'];

                    } else {

                        $filtro_voto = "";

                    }
                    

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


                    foreach($hotels as $hotel){

                        // PARCHEGGIO
                        // Se il filtro è impostato su "Con Parcheggio" && (parametro) $hotel['parking'] e quindi l'hotel non ha un parcheggio, salta l'hotel
                        if ($filtro_parcheggio === 'con_parcheggio' && !$hotel['parking']) {

                            continue;

                        // Se il filtro è impostato su "Senza Parcheggio" && (parametro) $hotel['parking'] e quindi l'hotel ha un parcheggio, salta l'hotel
                        } elseif ($filtro_parcheggio === 'senza_parcheggio' && $hotel['parking']) {

                            continue;
                        }

                        // VOTO
                        // se il filtro voto è diverso da stringa vuota && (parametro) $hotel['vote'] è più piccolo di filtro voto, salta l' hotel
                        if ($filtro_voto !== '' && $hotel['vote'] < $filtro_voto) {

                            continue;
                        }

                        echo "<tr>";
                            echo "<td>" . $hotel["name"] . "</td>";
                            echo "<td>" . $hotel["description"] . "</td>";
                            echo "<td>" . $hotel["vote"] . "</td>";
                            echo "<td>" .$hotel["distance_to_center"] . " m" . "</td>";
                        echo "</tr>";

                    }

                ?>
            </tbody>
        </table>
        </div>

        
    </div>
    
</body>
</html>

<!-- *continue= simile a break ma non stoppa il ciclo, salta il resto del codice all'interno del blocco del ciclo e passa alla prossima iterazione del ciclo -->