<?php

    include 'functions.php';

    $result = recupera_ospiti();

    include 'layout/header.php';
?>
        <div class="container">
            <div class="col-sm-12 text-center my-5">
                <h1>Lista degli Ospiti Registrati</h1>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Cognome</th>
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
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="details.php?id_ospite=<?php echo $row['id']; ?>">Dettagli</a>
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
    </body>
</html>
