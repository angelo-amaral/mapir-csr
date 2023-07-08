<?php

require_once '../../../config.php';
require_once '../../actions/sys_user.php';
require_once '../../modules/messages.php';
require_once '../partials/header.php';

$RelReqs = "";

if (isset($_POST["ID_Req_Sis_Original"])){
	$reqs = findRelSisUsuAction($conn, $_POST["ID_Req_Sis_Original"]);
	
	foreach($reqs as $row_aux):
		if(isset($_POST[$row_aux['ID']])){
			$RelReqs .= $_POST[$row_aux['ID']];
			$RelReqs .= "|";
		}
	endforeach;

	try {
	  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	} catch (\Throwable $th) {
	  throw $th;
	}

	/* change character set to utf8 */
	if (!$conn->set_charset("utf8")) {
	  printf("Error loading character set utf8: %s\n", $conn->error);
	}
	
    updateRelSisUsuAction($conn, $_POST["ID_Req_Sis_Original"], $RelReqs);

}else{
	$reqs = findRelSisUsuAction($conn, $_GET['id']);
}

?>
<div class="container">
	<div class="row">
        <a href="../../pages/system/read.php"><h1>Requisitos de Usuário relacionados a <?=$_GET['id']?></h1></a>
        <a class="btn btn-success text-white" href="../../pages/system/read.php">Voltar</a>
    </div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>	
	<form action="../../pages/sys_user/edit.php?id=<?=htmlspecialchars($_GET['id'])?>" method="POST">
		<input type="hidden" name="ID_Req_Sis_Original" value="<?=htmlspecialchars($_GET['id'])?>">

		<table class="table-users">
		<tr>
			<th align="left">&nbsp;</th><th align="left">ID</th><th align="left">Titulo</th>
		</tr>
		<?php foreach($reqs as $row): ?>
		<tr>
			<td class="cell">
				<input type="checkbox" id="<?=htmlspecialchars($row['ID'])?>" name="<?=htmlspecialchars($row['ID'])?>" value="<?=htmlspecialchars($row['ID'])?>" <?php if(htmlspecialchars($row['Relacionado'])=='1') printf("CHECKED"); ?> >
			</td>
			<td class="cell"><label><?=htmlspecialchars($row['ID'])?></label></td>
			<td class="cell"><label><?=htmlspecialchars($row['Titulo'])?></label></td>
		</tr>
		<?php endforeach; ?>
		</table>
		<br>
		<button class="btn btn-success text-white" type="submit">Gravar</button>
	</form>
</div>
<?php require_once '../partials/footer.php'; ?>

