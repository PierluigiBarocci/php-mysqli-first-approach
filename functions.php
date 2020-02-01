<?php

function connection_db() {
    // includi le variabili di configurazione da db_config
    // perchè mi servono qui
    include 'db_config.php';
    // connessione
    // $conn è un nuovo oggetto che rappresenta la mia connessione
    // come si crea? invocando il costruttore mysqli tramite new
    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
};

function recupera_prenotazioni() {
    $conn = connection_db();

    // controllo connessione
    // se conn è stato creato E ci sono errori di connessione
    if (!$conn || ($conn && $conn->connect_error)) {
        if ($conn && $conn->connect_error) {
            echo ("Connessione fallita:" . $conn->connect_error);
            // chiudi lo script se c'è un errore,
            // non c'è bisogno di andare avanti
            return;
        }
    };

    // creo la query
    $sql = "SELECT prenotazioni_has_ospiti.id,prenotazioni.created_at, stanze.room_number, ospiti.name, ospiti.lastname, ospiti.date_of_birth, ospiti.document_type, ospiti.document_number FROM prenotazioni_has_ospiti JOIN prenotazioni ON prenotazioni_has_ospiti.id = prenotazioni.id JOIN stanze ON prenotazioni.stanza_id = stanze.id JOIN ospiti ON prenotazioni_has_ospiti.ospite_id = ospiti.id ORDER BY prenotazioni_has_ospiti.id ASC";

    // applico la query $sql al mio oggetto connessione, tramite la funzione ->query
    // mi restituisce un oggetto che dovrò manipolare

    $result = $conn->query($sql);

    // chiudi la Connessione
    $conn->close();

    return $result;
}
?>
