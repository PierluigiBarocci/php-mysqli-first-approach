<?php

    include 'functions.php';

    $result = recupera_dettagli_ospite($_GET['id_ospite']);

    include 'layout/header.php';
?>

        <div class="container">
            <div class="col-sm-12 my-5">
                <?php
                if ($result && $result->num_rows > 0) {
                    // No While perchè so già che la riga è una sola,
                    // quella dei dettagli della singola stanza, recuperata tramite
                    // id e $_GET
                    $row = $result->fetch_assoc() ?>
                    <h1 class="mb-5">Dettagli Ospite: <?php echo $row['name']; ?> <?php echo $row['lastname']; ?></h1>
                    <ul>
                        <li>ID: <?php echo $row['id']; ?></li>
                        <li>Nome: <?php echo $row['name']; ?></li>
                        <li>Cognome: <?php echo $row['lastname']; ?></li>
                        <li>Data di Nascita: <?php echo $row['date_of_birth']; ?></li>
                        <li>Tipo di Documento: <?php echo $row['document_type']; ?></li>
                        <li>Numero Documento: <?php echo $row['document_number']; ?></li>
                    </ul>
                     <?php
                } elseif ($result) {
                    // se risultato esiste, ma la proprietà num_row non è maggiore di 0,
                    // vuol dire che il risultato della mia ricerca è uguale a 0
                    echo "Nessun risultato trovato";
                } else {
                    echo "Errore";
                };  ?>
            </div>
        </div>
    </body>
</html>
