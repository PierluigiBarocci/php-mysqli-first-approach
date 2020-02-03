<?php

    include 'functions.php';
    // query che seleziona pe cerare una nuova Stanza
    $room_number = intval($_POST['room_number']);
    $floor = intval($_POST['floor']);
    $beds = intval($_POST['beds']);

    $sql = "INSERT INTO stanze (id, room_number, floor, beds, created_at, updated_at) VALUES (NULL, $room_number, $floor, $beds, NOW(), NOW())";

    $result = query_action($sql);
    include 'layout/header.php';
?>
        <div class="container">
            <div class="col-sm-12 my-5">
                <?php
                if ($result) {
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>Stanza Creata:</h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Numero Stanza: <?php echo $room_number ?></li>
                            <li class="list-group-item">Piano: <?php echo $floor ?></li>
                            <li class="list-group-item">Numero di letti: <?php echo $beds ?></li>
                        </ul>
                    </div>
                     <?php
                } elseif ($result) {
                    echo "Nessun risultato trovato";
                } else {
                    echo "Errore";
                };  ?>
            </div>
        </div>
    </body>
</html>
