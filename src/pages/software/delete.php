<?php

require_once '../../../config.php';
require_once '../../actions/software.php';
require_once '../partials/header.php';

if(isset($_POST['id']))
    deleteReqSwAction($conn, $_POST['id']);

?>
<div class="container">
	<div class="row">
        <a href="../../pages/software/read.php"><h1>Requisitos de Software</h1></a>
        <a class="btn btn-success text-white" href="../../pages/software/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/software/delete.php" method="POST">
                <label>Você realmente deseja excluir o requisito <?=$_GET['id']?>?</label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>">

                <button class="btn btn-success text-white" type="submit">Sim</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>
