<?php

require_once '../../database/system.php';
require_once '../../database/sys_user.php';

function findReqSisAction($conn, $id) {
	return findReqSisDb($conn, $id);
}

function readReqSisAction($conn) {
	return readReqSisDb($conn);
}

function createReqSisAction($conn, $id_req_sis, $titulo) {
	$createReqSisDb = createReqSisDb($conn, $id_req_sis, $titulo);
	$message = $createReqSisDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateReqSisAction($conn, $id_req_sis_chave, $id_req_sis, $titulo) {
	$updateReqSisDb = updateReqSisDb($conn, $id_req_sis_chave, $id_req_sis, $titulo);
	$message = $updateReqSisDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteReqSisAction($conn, $id_req_sis) {
/*
	$deleteReqSisDb = deleteReqSisDb($conn, $id_req_sis);
	$message = $deleteReqSisDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
*/	
	try{
		$deleteRelSisUsuDb = deleteRelSisUsuDb($conn, $id_req_sis);
		$deleteReqSisDb = deleteReqSisDb($conn, $id_req_sis);
		
		$message = ($deleteReqSisDb == 1 && $deleteRelSisUsuDb == 1) ? 'success-remove' : 'error-remove';
		return header("Location: ./read.php?message=$message");
	}catch(Exception $e){
		return header("Location: ./read.php?message=error-remove");		
	}
}
