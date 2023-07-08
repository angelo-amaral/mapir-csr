<?php

function findReqUsuDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$requsu;

	$sql = "SELECT ID_Req_Usu, Titulo FROM m_requisito_usuario WHERE ID_Req_Usu = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);
	
	$requsu = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $requsu;
}

function createReqUsuDb($conn, $id_req_usu, $titulo) {
	$id_req_usu = mysqli_real_escape_string($conn, $id_req_usu);
	$titulo = mysqli_real_escape_string($conn,  $titulo);

	if($id_req_usu && $titulo) {
		$sql = "INSERT INTO m_requisito_usuario (ID_Req_Usu, Titulo) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ss', $id_req_usu, $titulo);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readReqUsuDb($conn) {
    $requsus = [];

	$sql = "SELECT * FROM m_requisito_usuario";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$requsus = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $requsus;
}

function updateReqUsuDb($conn, $id_req_usu_chave, $id_req_usu, $titulo) {
    if($id_req_usu_chave && $id_req_usu && $titulo) {
		$sql = "UPDATE m_requisito_usuario SET ID_Req_Usu = ?, Titulo = ? WHERE ID_Req_Usu = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sss', $id_req_usu, $titulo, $id_req_usu_chave);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteReqUsuDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM m_requisito_usuario WHERE ID_Req_Usu = ?";
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
