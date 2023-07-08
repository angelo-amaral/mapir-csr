<?php

require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteReqUsuAction($conn, $_POST['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/user/read.php"><h1>Requisitos de Usuário</h1></a>
        <a class="btn btn-success text-white" href="../../pages/user/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/delete.php" method="POST">
                <label>Você realmente deseja excluir o requisito <?=$_GET['id']?>?</label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">

                <button class="btn btn-success text-white" type="submit">Sim</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>
