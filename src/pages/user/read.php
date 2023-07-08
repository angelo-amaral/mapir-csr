<?php

require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$users = readReqUsuAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../pages/user/read.php"><h1>Requisitos de Usuário</h1></a>
		<a class="btn btn-success text-white" href="./create.php">Novo</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-users">
		<tr>
			<th align="left">ID</th>
			<th align="left">Titulo</th>
		</tr>
		<?php foreach($users as $row): ?>
		<tr>
			<td class="cell"><?=htmlspecialchars($row['ID_Req_Usu'])?></td>
			<td class="cell"><?=htmlspecialchars($row['Titulo'])?></td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['ID_Req_Usu']?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['ID_Req_Usu']?>">Remover</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

