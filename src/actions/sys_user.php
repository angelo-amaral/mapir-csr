<?php

require_once '../../database/sys_user.php';

function findRelSisUsuAction($conn, $id) {
	return findRelSisUsuDb($conn, $id);
}

function readRelSisUsuAction($conn) {
	return readRelSisUsuDb($conn);
}

function createRelSisUsuAction($conn, $id_req_sis, $id_req_usu) {
	$createRelSisUsuDb = createRelSisUsuDb($conn, $id_req_sis, $id_req_usu);
	$message = $createRelSisUsuDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./edit.php?id=$id_req_sw&message=$message");
}

function updateRelSisUsuAction($conn, $id_req_sis_chave, $rel_reqs) {

	$deleteRelSisUsuDb = deleteRelSisUsuDb($conn, $id_req_sis_chave);
	$message = $deleteRelSisUsuDb == 1 ? 'success-update' : 'error-update';
	if(!$deleteRelSisUsuDb) return header("Location: ./edit.php?id=$id_req_sis_chave&message=$message");
	
	$aRelReqs = explode("|", $rel_reqs);
	$createRelSisUsuDb = 1;

	for ($i = 0; $i < count($aRelReqs); $i++) {
 
		$createRelSisUsuDb = createRelSisUsuDb($conn, $id_req_sis_chave, $aRelReqs[$i]);
		$message = $createRelSisUsuDb == 1 ? 'success-update' : 'error-update';
		if(!$createRelSisUsuDb) return header("Location: ./edit.php?id=$id_req_sis_chave&message=$message");

	}

	$message = $createRelSisUsuDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./edit.php?id=$id_req_sis_chave&message=$message");
}

function deleteRelSisUsuAction($conn, $id_req_sis) {
	$deleteRelSisUsuDb = deleteRelSisUsuDb($conn, $id_req_sis);
	$message = $deleteRelSisUsuDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./edit.php?id=$id_req_sw&message=$message");
}
