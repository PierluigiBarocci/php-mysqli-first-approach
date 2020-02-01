<?php

    include 'functions.php';

    $result = recupera_dettagli_stanza($_GET['id_stanza']);

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
                    <h1 class="mb-5">Dettagli Stanza <?php echo $row['room_number']; ?></h1>
                    <ul>
                        <li>ID: <?php echo $row['id']; ?></li>
                        <li>Numero Stanza: <?php echo $row['room_number']; ?></li>
                        <li>Piano: <?php echo $row['floor']; ?></li>
                        <li>Numero di Letti: <?php echo $row['beds']; ?></li>
                        <li>Creata: <?php echo $row['created_at']; ?></li>
                        <li>Aggiornata: <?php echo $row['updated_at']; ?></li>
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
