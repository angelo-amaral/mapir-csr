<?php

require_once '../../../config.php';
require_once '../../actions/system.php';
require_once '../partials/header.php';

if (isset($_POST["ID_Req_Sis_Original"]) && isset($_POST["ID_Req_Sis"]) && isset($_POST["Titulo"]))
    updateReqSisAction($conn, $_POST["ID_Req_Sis_Original"], $_POST["ID_Req_Sis"], $_POST["Titulo"]);

$reqSis = findReqSisAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/system/read.php"><h1>Requisitos de Sistema</h1></a>
        <a class="btn btn-success text-white" href="../../pages/system/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/system/edit.php" method="POST">
				<input type="hidden" name="ID_Req_Sis_Original" value="<?=htmlspecialchars($reqSis['ID_Req_Sis'])?>">
                <label>ID</label>
                <input type="text" name="ID_Req_Sis" value="<?=htmlspecialchars($reqSis['ID_Req_Sis'])?>" size="6" maxlength="6" required/>
                <label>Titulo</label>
                <textarea name="Titulo" rows="3" cols="50" maxlength="255"  required><?=htmlspecialchars($reqSis['Titulo'])?></textarea><br>
                <button class="btn btn-success text-white" type="submit">Gravar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

