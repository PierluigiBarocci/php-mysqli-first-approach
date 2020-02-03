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
                <div class="col-sm-6 my-5">
                    <h1>Modifica la stanza</h1>
                </div>
            </div>
            <div class="row">
                <?php
                if ($result && $result->num_rows > 0) {
                    // No While perchè so già che la riga è una sola,
                    // quella dei dettagli della singola stanza, recuperata tramite
                    // id e $_GET
                    $row = $result->fetch_assoc() ?>
                    <form action="update.php?id_stanza=<?php echo $row['id'] ?>" method="post" class="ml-3">
                        <div class="form-group">
                            <label for="room_number">Numero di Stanza</label>
                            <input type="text" class="form-control" id="room_number" value="<?php echo $row['room_number'] ?> "name="room_number">
                        </div>
                        <div class="form-group">
                            <label for="floor">Piano</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="<?php echo $row['floor'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="beds">Numero di Letti</label>
                            <input type="text" class="form-control" id="beds" name="beds" value="<?php echo $row['beds'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Modifica</button>
                    </form>

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
