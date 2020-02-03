<?php

    include 'functions.php';
    // query che seleziona i dettagli delle stanze
    $id_stanza = $_GET['id_stanza'];
    $sql = "SELECT * FROM stanze WHERE id = " . $id_stanza;
    $result = query_action($sql);

    include 'layout/header.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-5">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        // No While perchè so già che la riga è una sola,
                        // quella dei dettagli della singola stanza, recuperata tramite
                        // id e $_GET
                        $row = $result->fetch_assoc() ?>
                        <div class="card">
                            <div class="card-header">
                                <h3>Dettagli Stanza <?php echo $row['room_number']; ?></h3>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">ID: <?php echo $row['id']; ?></li>
                                <li class="list-group-item">Numero Stanza: <?php echo $row['room_number']; ?></li>
                                <li class="list-group-item">Piano: <?php echo $row['floor']; ?></li>
                                <li class="list-group-item">Numero di letti: <?php echo $row['beds']; ?></li>
                                <li class="list-group-item">Creata in data: <?php echo $row['created_at']; ?></li>
                                <li class="list-group-item">Modificata in data: <?php echo $row['updated_at']; ?></li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-6">
                        <h4>Sei sicuro di voler cancellare questa stanza?</h4>
                    </div>
                    <div class="col-sm-6">
                        <a href="index.php" class="btn btn-primary">Torna alla Home</a>
                        <a href="erased.php?id_stanza=<?php echo $row['id']; ?>" class="btn btn-danger">Elimina</a>
                    </div>
                </div>
            </div>
                        <?php
                    } elseif ($result) {
                        // se risultato esiste, ma la proprietà num_row non è maggiore di 0,
                        // vuol dire che il risultato della mia ricerca è uguale a 0
                        echo "Nessun risultato trovato";
                    } else {
                        echo "Errore";
                    };  ?>
    </body>
</html>
