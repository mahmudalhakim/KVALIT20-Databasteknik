<?php

require_once 'header.php';

?>

<div class="col-md-6 offset-md-3 mt-2 alert alert-danger text-center">

    <h2>DANGER ZONE</h2>
    <h3>Du håller på att ÅTERSTÄLLA en hel databas!</h3>
    <h4>Vill du verkligen gå vidare? <br>
        Skirv ditt lösenord här nedan och klicka på knappen
    </h4>

    <form action="#" method="post">
        <input type="password" name="confirm" class="form-control" required  autofocus>
        <input type="submit" class="form-control mt-2 btn btn-outline-danger" value="Ja, återställ databasen nu!">
    </form>

</div>

<div class='col-md-6 offset-md-3 mt-2 text-danger text-center'>

    <?php

    require_once '../database/restore-database.php';
    
    ?>

</div>

<?php

require_once 'footer.php';

?>