<?php

    include 'functions.php';
    // query che seleziona pe cerare una nuova Stanza
    $id_stanza = $_GET['id_stanza'];

    $sql = "DELETE FROM stanze WHERE id=". $id_stanza;

    $result = query_action($sql);
    include 'layout/header.php';
?>
        <div class="container">
            <div class="col-sm-12 my-5 text-center">
                <?php
                if ($result) {
                    ?>
                    <h4>Stanza Eliminata correttamente</h4>
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
