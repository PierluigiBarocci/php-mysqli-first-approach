<?php

function connection_db() {
    // includi le variabili di configurazione da db_config
    include 'db_config.php';

    // Restituisci un oggetto che rappresenti la connessione
    return new mysqli($servername, $username, $password, $dbname);
};

function recupera_ospiti() {
    // Connettiti
    $conn = connection_db();

    // Controlla Connessione
    if (!$conn || ($conn && $conn->connect_error)) {
        if ($conn && $conn->connect_error) {
            echo ("Connessione fallita:" . $conn->connect_error);
            // chiudi lo script se c'è un errore,
            // non c'è bisogno di andare avanti
            return;
        }
    };

    // Crea la query
    $sql = "SELECT id, name, lastname FROM ospiti";

    // Leggi la query e assegna l'oggetto a $result
    $result = $conn->query($sql);

    // Chiudi la Connessione
    $conn->close();

    // Restituisci il risultato
    return $result;
};

function recupera_dettagli_ospite($id_ospite) {
    // Connettiti
    $conn = connection_db();

    // Controlla Connessione
    if (!$conn || ($conn && $conn->connect_error)) {
        if ($conn && $conn->connect_error) {
            echo ("Connessione fallita:" . $conn->connect_error);
            // chiudi lo script se c'è un errore,
            // non c'è bisogno di andare avanti
            return;
        }
    };
    // Crea la query
    $sql = "SELECT * FROM ospiti WHERE id = " . $id_ospite;

    // Leggi la query e assegna l'oggetto a $result
    $result = $conn->query($sql);

    // Chiudi la Connessione
    $conn->close();

    // Restituisci il risultato
    return $result;
};
?>
