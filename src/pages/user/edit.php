<?php

require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if (isset($_POST["ID_Req_Usu_Original"]) && isset($_POST["ID_Req_Usu"]) && isset($_POST["Titulo"]))
    updateReqUsuAction($conn, $_POST["ID_Req_Usu_Original"], $_POST["ID_Req_Usu"], $_POST["Titulo"]);

$user = findReqUsuAction($conn, $_GET['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/user/read.php"><h1>Requisitos de Usuário</h1></a>
        <a class="btn btn-success text-white" href="../../pages/user/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/edit.php" method="POST">
				<input type="hidden" name="ID_Req_Usu_Original" value="<?=htmlspecialchars($user['ID_Req_Usu'])?>">
                <label>ID</label>
                <input type="text" name="ID_Req_Usu" value="<?=htmlspecialchars($user['ID_Req_Usu'])?>" size="6" maxlength="6" required/>
                <label>Titulo</label>
                <textarea name="Titulo" rows="3" cols="50" maxlength="255"  required><?=htmlspecialchars($user['Titulo'])?></textarea><br>
                <button class="btn btn-success text-white" type="submit">Gravar</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

