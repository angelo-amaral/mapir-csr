<?php

require_once 'config.php';
require_once 'src/modules/messages.php';
require_once 'src/pages/partials/header.php';

?>
<div class="container">
	<div class="row">
		<h1>MAPIR-CSR</h1>
		<br>
	</div>
	<div class="row flex-center">
		<?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
	</div>

	<table class="table-users">
		<tr>
			<td class="req_usu_id"><a href="src/pages/user/read.php">Requisitos de Usuário</a></td>
		</tr>
		<tr>
			<td class="req_usu_id"><a href="src/pages/system/read.php">Requisitos de Sistema</a></td>
		</tr>
		<tr>
			<td class="req_usu_id"><a href="src/pages/software/read.php">Requisitos de Software</a></td>
		</tr>
	</table>
</div>
<footer class="footer">		
	<br>&nbsp;<br>&nbsp;<small><small>
	<b>MAPIR-CSR</b> (Method to Assess the Potential Impact Rate of Changes in Software Requirements), <i>desenvolvido por Ângelo Amaral</i>
	</small></small>
</footer>
