<?php

require_once '../../../config.php';
require_once '../../../src/actions/software.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$reqs = readReqSwAction($conn);

?>
<div class="container">
	<div class="row">
		<a href="../../pages/software/read.php"><h1>Requisitos de Software</h1></a>
		<a class="btn btn-success text-white" href="./create.php">Novo</a>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-users">
		<tr>
			<th align="left">ID</th>
			<th align="left">Titulo</th>
			<th align="left">Story Points</th>
		</tr>
		<?php foreach($reqs as $row): ?>
		<tr>
			<td class="cell"><?=htmlspecialchars($row['ID_Req_Sw'])?></td>
			<td class="cell"><?=htmlspecialchars($row['Titulo'])?></td>
			<td class="cell"><?=htmlspecialchars($row['story_points'])?></td>
			<td>
				<a class="btn btn-primary text-white" href="../../pages/sw_sys/edit.php?id=<?=$row['ID_Req_Sw']?>">Relacionar</a>
			</td>
			<td>
				<a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['ID_Req_Sw']?>">Editar</a>
			</td>
			<td>
				<a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['ID_Req_Sw']?>">Remover</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php require_once '../partials/footer.php'; ?>

