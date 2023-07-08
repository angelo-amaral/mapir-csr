<?php

require_once '../../database/software.php';
require_once '../../database/sw_sys.php';

function findReqSwAction($conn, $id) {
	return findReqSwDb($conn, $id);
}

function findImpactoReqSwAction($conn, $id) {
	return findImpactoReqSwDb($conn, $id);
}

function readReqSwAction($conn) {
	return readReqSwDb($conn);
}

function findReqSwRelAction($conn, $id) {
	return findReqSwRelDb($conn, $id);
}

function createReqSwAction($conn, $id_req_sw, $titulo, $story_points) {
	$createReqSwDb = createReqSwDb($conn, $id_req_sw, $titulo, $story_points);
	$message = $createReqSwDb == 1 ? 'success-create' : 'error-create';
	return header("Location: ./read.php?message=$message");
}

function updateReqSwAction($conn, $id_req_sw_chave, $id_req_sw, $titulo, $story_points) {
	$updateReqSwDb = updateReqSwDb($conn, $id_req_sw_chave, $id_req_sw, $titulo, $story_points);
	$message = $updateReqSwDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteReqSwAction($conn, $id_req_sw) {
	try{
		$deleteRelSwSisDb = deleteRelSwSisDb($conn, $id_req_sw);
		$deleteReqSwDb = deleteReqSwDb($conn, $id_req_sw);
		
		$message = ($deleteReqSwDb == 1 && $deleteRelSwSisDb == 1) ? 'success-remove' : 'error-remove';
		return header("Location: ./read.php?message=$message");
	}catch(Exception $e){
		return header("Location: ./read.php?message=error-remove");		
	}
}
