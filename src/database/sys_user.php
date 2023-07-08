<?php

function findRelSisUsuDb($conn, $id) {

    $id = mysqli_real_escape_string($conn, $id);

    $RelSisUsus = [];

	$sql = "select usu.ID_Req_Usu as ID, usu.Titulo, CASE WHEN rel.ID_Req_Sis is null THEN 0 ELSE 1 END as Relacionado FROM m_requisito_usuario as usu Left JOIN m_requisito_sistema_usuario as rel on rel.ID_Req_Usu = usu.ID_Req_Usu and rel.ID_Req_Sis = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$RelSisUsus = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $RelSisUsus;

}

function createRelSisUsuDb($conn, $id_Req_Sis, $id_Req_Usu) {
	$id_Req_Sis = mysqli_real_escape_string($conn, $id_Req_Sis);
	$id_Req_Usu = mysqli_real_escape_string($conn,  $id_Req_Usu);

	if($id_Req_Sis && $id_Req_Usu) {
		$sql = "INSERT INTO m_requisito_sistema_usuario (ID_Req_Sis, ID_Req_Usu) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ss', $id_Req_Sis, $id_Req_Usu);
		mysqli_stmt_execute($stmt);
//		mysqli_close($conn);
		return true;
	}
	return true;
}

function deleteRelSisUsuDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM m_requisito_sistema_usuario WHERE ID_Req_Sis = ?";
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
