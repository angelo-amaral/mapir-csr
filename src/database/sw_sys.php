<?php

function findRelSwSisDb($conn, $id) {

    $id = mysqli_real_escape_string($conn, $id);

    $RelSwSiss = [];

	$sql = "select sis.ID_Req_Sis as ID, sis.Titulo, CASE WHEN rel.ID_Req_Sw is null THEN 0 ELSE 1 END as Relacionado FROM m_requisito_sistema as sis Left JOIN m_requisito_software_sistema as rel on rel.ID_Req_Sis = sis.ID_Req_Sis and rel.ID_Req_Sw = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 's', $id);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	$result_check = mysqli_num_rows($result);
	
	if($result_check > 0)
		$RelSwSiss = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_close($conn);
	return $RelSwSiss;

}

function createRelSwSisDb($conn, $id_Req_Sw, $id_Req_Sis) {
	$id_Req_Sis = mysqli_real_escape_string($conn, $id_Req_Sis);
	$id_Req_Sw = mysqli_real_escape_string($conn,  $id_Req_Sw);

	if($id_Req_Sis && $id_Req_Sw) {
		$sql = "INSERT INTO m_requisito_software_sistema (ID_Req_Sw, ID_Req_Sis) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)) 
			exit('SQL error');
		
		mysqli_stmt_bind_param($stmt, 'ss', $id_Req_Sw, $id_Req_Sis);
		mysqli_stmt_execute($stmt);
//		mysqli_close($conn);
		return true;
	}
	return true;
}

function deleteRelSwSisDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

	if($id) {
		$sql = "DELETE FROM m_requisito_software_sistema WHERE ID_Req_Sw = ?";
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
