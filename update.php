<?php

    include 'functions.php';
    // query che seleziona pe cerare una nuova Stanza
    $id_stanza = $_GET[ 'id_stanza'];
    $room_number = intval($_POST['room_number']);
    $floor = intval($_POST['floor']);
    $beds = intval($_POST['beds']);

    $sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id_stanza";

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
                            <h3>Stanza Modificata con Successo</h3>
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
