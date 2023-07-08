<?php

function findReqSisDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$ReqSis;

	$sql = "SELECT ID_Req_Sis, Titulo FROM m_requisito_sistema WHERE ID_Req_Sis = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);
	
	$ReqSis = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $ReqSis;
}

function createReqSisDb($conn, $id_Req_Sis, $titulo) {
	$id_Req_Sis = mysqli_real_escape_string($conn, $id_Req_Sis);
	$titulo = mysqli_real_escape_string($conn,  $titulo);

	if($id_Req_Sis && $titulo) {
		$sql = "INSERT INTO m_requisito_sistema (ID_Req_Sis, Titulo) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ss', $id_Req_Sis, $titulo);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function readReqSisDb($conn) {
    $ReqSiss = [];

	$sql = "SELECT * FROM m_requisito_sistema";
	$result = mysqli_query($conn, $sql);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$ReqSiss = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $ReqSiss;
}

function updateReqSisDb($conn, $id_Req_Sis_chave, $id_Req_Sis, $titulo) {
    if($id_Req_Sis_chave && $id_Req_Sis && $titulo) {
		$sql = "UPDATE m_requisito_sistema SET ID_Req_Sis = ?, Titulo = ? WHERE ID_Req_Sis = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'sss', $id_Req_Sis, $titulo, $id_Req_Sis_chave);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteReqSisDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM m_requisito_sistema WHERE ID_Req_Sis = ?";
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
