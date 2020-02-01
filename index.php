<?php

    // variabili di configurazione
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "db_hotel";

    // connessione
    // $conn è un nuovo oggetto che rappresenta la mia connessione
    // come si crea? invocando il costruttore mysqli tramite new
    $conn = new mysqli($servername, $username, $password, $dbname);

    // controllo connessione
    // se conn è stato creato E ci sono errori di connessione
    if ($conn && $conn->connect_error) {
        echo ("Connessione fallita:" . $conn->connect_error);
        // chiudi lo script se c'è un errore,
        // non c'è bisogno di andare avanti
        exit();
    };

    // creo la query
    $sql = "SELECT prenotazioni_has_ospiti.id,prenotazioni.created_at, stanze.room_number, ospiti.name, ospiti.lastname, ospiti.date_of_birth, ospiti.document_type, ospiti.document_number FROM prenotazioni_has_ospiti JOIN prenotazioni ON prenotazioni_has_ospiti.id = prenotazioni.id JOIN stanze ON prenotazioni.stanza_id = stanze.id JOIN ospiti ON prenotazioni_has_ospiti.ospite_id = ospiti.id ORDER BY prenotazioni_has_ospiti.id ASC";

    // applico la query $sql al mio oggetto connessione, tramite la funzione ->query
    // mi restituisce un oggetto che dovrò manipolare

    $result = $conn->query($sql);

    // chiudi la Connessione
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <title>Test</title>
    </head>
    <body>
        <div class="container">
            <div class="col-sm-12 text-center my-5">
                <h1>Prenotazioni</h1>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Data Creazione</th>
                      <th scope="col">Num Stanza</th>
                      <th scope="col">Nome Ospite</th>
                      <th scope="col">Cognome Ospite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // quella che mi interessa è la proprietà num_rows (il numero di righe)
                    if ($result && $result->num_rows > 0) {
                        // dammi il risultato per ogni riga, graize all'accoppiata ciclo while/funzione fetch_assoc
                        while($row = $result->fetch_assoc()) {?>
                            <tr>
                                <th><?php echo $row['id']; ?></th>
                                <th><?php echo $row['created_at']; ?></th>
                                <th><?php echo $row['room_number']; ?></th>
                                <th><?php echo $row['name']; ?></th>
                                <th><?php echo $row['lastname']; ?></th>
                            </tr> <?php
                        }
                    } elseif ($result) {
                        // se risultato esiste, ma la proprietà num_row non è maggiore di 0,
                        // vuol dire che il risultato della mia ricerca è uguale a 0
                        echo "Nessun risultato trovato";
                    } else {
                        echo "Errore";
                    };  ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
