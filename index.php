<?php

    include 'functions.php';
    $sql = "SELECT id, room_number, floor FROM stanze";
    $result = query_action($sql);

    include 'layout/header.php';
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 my-5">
                    <h1>Lista Stanze</h1>
                </div>
                <div class="col-sm-6 text-right mt-5">
                    <a class="btn btn-success" href="create.php">Inserisci una nuova stanza</a>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Numero di Stanza</th>
                            <th scope="col">Piano</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // quella che mi interessa è la proprietà num_rows (il numero di righe)
                        if ($result && $result->num_rows > 0) {
                            // dammi il risultato per ogni riga, grazie all'accoppiata ciclo while/funzione fetch_assoc
                            while($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <th><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['room_number']; ?></td>
                                    <td><?php echo $row['floor']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="details.php?id_stanza=<?php echo $row['id']; ?>">Dettagli</a>
                                        <a class="btn btn-danger" href="delete.php?id_stanza=<?php echo $row['id']; ?>">Cancella</a>
                                    </td>
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
        </div>
    </body>
</html>
