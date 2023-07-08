<?php

require_once '../../database/sw_sys.php';

function findRelSwSisAction($conn, $id) {
	return findRelSwSisDb($conn, $id);
}

function readRelSwSisAction($conn) {
	return readRelSwSisDb($conn);
}

function createRelSwSisAction($conn, $id_req_sw, $id_req_sis) {
	$createRelSwSisDb = createRelSwSisDb($conn, $id_req_sw, $id_req_sis);
	$message = $createRelSwSisDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./edit.php?id=$id_req_sw&message=$message");
}

function updateRelSwSisAction($conn, $id_req_sw_chave, $rel_reqs) {

	$deleteRelSwSisDb = deleteRelSwSisDb($conn, $id_req_sw_chave);
	$message = $deleteRelSwSisDb == 1 ? 'success-update' : 'error-update';
	if(!$deleteRelSwSisDb) return header("Location: ./edit.php?id=$id_req_sw_chave&message=$message");
	
	$aRelReqs = explode("|", $rel_reqs);
	$createRelSwSisDb = 1;

	for ($i = 0; $i < count($aRelReqs); $i++) {
 
		$createRelSwSisDb = createRelSwSisDb($conn, $id_req_sw_chave, $aRelReqs[$i]);
		$message = $createRelSwSisDb == 1 ? 'success-update' : 'error-update';
		if(!$createRelSwSisDb) return header("Location: ./edit.php?id=$id_req_sw_chave&message=$message");

	}

	$message = $createRelSwSisDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./edit.php?id=$id_req_sw_chave&message=$message");
}

function deleteRelSwSisAction($conn, $id_req_sw) {
	$deleteRelSwSisDb = deleteRelSwSisDb($conn, $id_req_sw);
	$message = $deleteRelSwSisDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./edit.php?id=$id_req_sw&message=$message");
}
