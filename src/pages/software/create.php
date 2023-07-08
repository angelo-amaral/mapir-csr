<?php

require_once '../../../config.php';
require_once '../../actions/software.php';
require_once '../partials/header.php';

if (isset($_POST["ID_Req_Sw"]) && isset($_POST["Titulo"]) && isset($_POST["Story_Points"]) )
    createReqSwAction($conn, $_POST["ID_Req_Sw"], $_POST["Titulo"], $_POST["Story_Points"]);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/software/read.php"><h1>Requisitos de Software</h1></a>
        <a class="btn btn-success text-white" href="../../pages/software/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/software/create.php" method="POST">
                <label>ID</label>
                <input type="text" name="ID_Req_Sw" size="6" maxlength="6" required/>
                <label>Titulo</label>
                <textarea name="Titulo" rows="3" cols="50" maxlength="255"  required></textarea>
                <label>Story Points</label>
                <input type="number" name="Story_Points" size="2" min="1" max="21" required/><br>
                <button class="btn btn-success text-white" type="submit">Gravar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

