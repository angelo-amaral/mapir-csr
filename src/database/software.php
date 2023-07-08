<?php

function findImpactoReqSwDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$ImpactoReqSw;

	$sql = "SELECT Round((a.story_points + (Select sum(e.story_points) From m_requisito_software_sistema b INNER JOIN m_requisito_sistema c on c.ID_Req_Sis = b.ID_Req_Sis INNER JOIN m_requisito_software_sistema d on d.ID_Req_Sis = c.ID_Req_Sis INNER JOIN m_requisito_software e ON e.ID_Req_Sw = d.ID_Req_Sw and e.ID_Req_Sw <> a.ID_Req_Sw where b.ID_Req_Sw = a.ID_Req_Sw)) / (select COUNT(ID_Req_Sw) from m_requisito_software), 1) as impacto_potencial FROM m_requisito_software a where a.ID_Req_Sw = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);
	
	$ImpactoReqSw = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

//	mysqli_close($conn);
	return $ImpactoReqSw;
}


function findReqSwDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$ReqSw;

	$sql = "SELECT * FROM m_requisito_software WHERE ID_Req_Sw = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);
	
	$ReqSw = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

//	mysqli_close($conn);
	return $ReqSw;
}

function createReqSwDb($conn, $id_Req_Sw, $titulo, $story_points) {
	$id_Req_Sw = mysqli_real_escape_string($conn, $id_Req_Sw);
	$titulo = mysqli_real_escape_string($conn,  $titulo);

	if($id_Req_Sw && $titulo) {
		$sql = "INSERT INTO m_requisito_software (ID_Req_Sw, Titulo, story_points) VALUES (?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ssi', $id_Req_Sw, $titulo, $story_points);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readReqSwDb($conn) {
    $ReqSws = [];

	$sql = "SELECT * FROM m_requisito_software";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$ReqSws = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $ReqSws;
}

function findReqSwRelDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    $ReqSwRel = [];

	$sql = "SELECT DISTINCT d.ID_Req_Sw, d.Titulo FROM m_requisito_software as a INNER JOIN m_requisito_software_sistema as b ON b.ID_Req_Sw = a.ID_Req_Sw INNER JOIN m_requisito_software_sistema as c	ON c.ID_Req_Sis = b.ID_Req_Sis INNER JOIN m_requisito_software as d	ON d.ID_Req_Sw = c.ID_Req_Sw WHERE a.ID_Req_Sw = ? ORDER BY d.ID_Req_Sw";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$ReqSwRel = mysqli_fetch_all($result, MYSQLI_ASSOC);

//	mysqli_close($conn);
	return $ReqSwRel;
}

function updateReqSwDb($conn, $id_Req_Sw_chave, $id_Req_Sw, $titulo, $story_points) {
    if($id_Req_Sw_chave && $id_Req_Sw && $titulo) {
		$sql = "UPDATE m_requisito_software SET ID_Req_Sw = ?, Titulo = ?, story_points = ? WHERE ID_Req_Sw = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'ssis', $id_Req_Sw, $titulo, $story_points, $id_Req_Sw_chave);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteReqSwDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM m_requisito_software WHERE ID_Req_Sw = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 's', $id);
		try{
			mysqli_stmt_execute($stmt);
		} catch(Exception $e) {
				return false;
		}
		return true;
	}
}
