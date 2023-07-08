<?php

require_once '../../../config.php';
require_once '../../actions/system.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteReqSisAction($conn, $_POST['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/system/read.php"><h1>Requisitos de Sistema</h1></a>
        <a class="btn btn-success text-white" href="../../pages/system/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/system/delete.php" method="POST">
                <label>Você realmente deseja excluir o requisito <?=$_GET['id']?>?</label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">

                <button class="btn btn-success text-white" type="submit">Sim</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>
