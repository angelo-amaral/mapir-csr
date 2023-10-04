<?php

require_once '../../../config.php';
require_once '../../actions/software.php';
require_once '../partials/header.php';

if (isset($_POST["ID_Req_Sw_Original"]) && isset($_POST["ID_Req_Sw"]) && isset($_POST["Titulo"]) && isset($_POST["Story_Points"]))
    updateReqSwAction($conn, $_POST["ID_Req_Sw_Original"], $_POST["ID_Req_Sw"], $_POST["Titulo"], $_POST["Story_Points"]);

$req = findReqSwAction($conn, $_GET['id']);
$reqRel = findReqSwRelAction($conn, $_GET['id']);
$reqImpacto = findImpactoReqSwAction($conn, $_GET['id']);
?>
<div class="container">
	<div class="row">
        <a href="../../pages/software/read.php"><h1>Requisitos de Software</h1></a>
        <a class="btn btn-success text-white" href="../../pages/software/read.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/software/edit.php" method="POST">
				<input type="hidden" name="ID_Req_Sw_Original" value="<?=htmlspecialchars($req['ID_Req_Sw'])?>">
                <label>ID</label>
                <input type="text" name="ID_Req_Sw" value="<?=htmlspecialchars($req['ID_Req_Sw'])?>" size="6" maxlength="6" required/>
                <label>Titulo</label>
                <textarea name="Titulo" rows="3" cols="50" maxlength="255"  required><?=htmlspecialchars($req['Titulo'])?></textarea>
                <label>Story Points</label>
                <input type="number" name="Story Points" value="<?=htmlspecialchars($req['story_points'])?>" size="2" min="1" max="21" required/><br>
                <button class="btn btn-success text-white" type="submit">Gravar</button>
            </form>
        </div>
		<table class="table-users" <?php if(count($reqRel)==0) echo "hidden";?>>
			<tr>
				<td class="cell" colspan="2">
					<small><b>Impacto Potencial de <?=htmlspecialchars($req['ID_Req_Sw'])?>: <?=htmlspecialchars($reqImpacto['impacto_potencial'])?></b></small>
				</td>
			</tr>
			<tr>
				<?php 
				if($reqImpacto['impacto_potencial'] > 8) { 
					$cor='text-error'; 
					$estrategia='Recusar'; 
				} else if($reqImpacto['impacto_potencial'] < 3) { 
					$cor='text-success'; 
					$estrategia='Aceitar'; 
				}else{ 
					$cor='cell'; 
					$estrategia='Analisar Impacto'; 				
				}?>
				<td class="<?=$cor?>" colspan="2">		
					<small><b>Estratégia para aceitação de mudanças: <?=$estrategia?></b></small>
				</td>
			</tr>
			<tr>
				<td class="cell" colspan="2">
					<small><b>Requisitos de Software Potencialmente Impactados por <?=htmlspecialchars($req['ID_Req_Sw'])?></b></small>
				</td>
			</tr>
			<tr>
				<th align="left"><small>ID</small></th>
				<th align="left"><small>Titulo</small></th>
			</tr>
			<?php foreach($reqRel as $rowRel): ?>
			<tr>
				<td class="cell"><small><?=htmlspecialchars($rowRel['ID_Req_Sw'])?></small></td>
				<td class="cell"><small><?=htmlspecialchars($rowRel['Titulo'])?></small></td>
			</tr>
			<?php endforeach; ?>
		</table>
		
		
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>

