<?php

    include 'functions.php';
    // query che seleziona i dettagli delle stanze
    include 'layout/header.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 my-5">
                    <h1>Crea una nuova stanza</h1>
                </div>
            </div>
            <div class="row">
                <form action="insert.php" method="post" class="ml-3">
                    <div class="form-group">
                        <label for="room_number">Numero di Stanza</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" placeholder="Inserire numero di stanza">
                    </div>
                    <div class="form-group">
                        <label for="floor">Piano</label>
                        <input type="text" class="form-control" id="floor" name="floor" placeholder="Inserire il piano">
                    </div>
                    <div class="form-group">
                        <label for="beds">Numero di Letti</label>
                        <input type="text" class="form-control" id="beds" name="beds" placeholder="Inserire numero di Letti">
                    </div>
                    <button type="submit" class="btn btn-success">Crea</button>
                </form>
            </div>
        </div>
    </body>
</html>
