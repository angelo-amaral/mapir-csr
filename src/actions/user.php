<?php

require_once '../../database/user.php';

function findReqUsuAction($conn, $id) {
	return findReqUsuDb($conn, $id);
}

function readReqUsuAction($conn) {
	return readReqUsuDb($conn);
}

function createReqUsuAction($conn, $id_req_usu, $titulo) {
	$createReqUsuDb = createReqUsuDb($conn, $id_req_usu, $titulo);
	$message = $createReqUsuDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateReqUsuAction($conn, $id_req_usu_chave, $id_req_usu, $titulo) {
	$updateReqUsuDb = updateReqUsuDb($conn, $id_req_usu_chave, $id_req_usu, $titulo);
	$message = $updateReqUsuDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteReqUsuAction($conn, $id_req_usu) {
	$deleteReqUsuDb = deleteReqUsuDb($conn, $id_req_usu);
	$message = $deleteReqUsuDb == 1 ? 'success-remove' : 'error-remove';
	return header("Location: ./read.php?message=$message");
}
