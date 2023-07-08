<?php

require_once '../../../config.php';
require_once '../../actions/system.php';
require_once '../partials/header.php';

if (isset($_POST["ID_Req_Sis"]) && isset($_POST["Titulo"]) )
    createReqSisAction($conn, $_POST["ID_Req_Sis"], $_POST["Titulo"]);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/system/read.php"><h1>Requisitos de Sistema</h1></a>
        <a class="btn btn-success text-white" href="../../pages/system/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/system/create.php" method="POST">
                <label>ID</label>
                <input type="text" name="ID_Req_Sis" size="6" maxlength="6" required/>
                <label>Titulo</label>
                <textarea name="Titulo" rows="3" cols="50" maxlength="255"  required></textarea><br>
                <button class="btn btn-success text-white" type="submit">Gravar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

