<?php

require_once '../../../config.php';
require_once '../../../src/actions/system.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$users = readReqSisAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../pages/system/read.php"><h1>Requisitos de Sistema</h1></a>
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
			<td class="cell"><?=htmlspecialchars($row['ID_Req_Sis'])?></td>
			<td class="cell"><?=htmlspecialchars($row['Titulo'])?></td>
			<td>
				<a class="btn btn-primary text-white" href="../../pages/sys_user/edit.php?id=<?=$row['ID_Req_Sis']?>">Relacionar</a>
			</td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['ID_Req_Sis']?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['ID_Req_Sis']?>">Remover</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

