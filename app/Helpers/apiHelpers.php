<?php

function api_success($message, $data) {
    $data = array('status' => true, 'response' => array('message' => $message, 'detail' => $data));
    return response()->json($data);
}

function api_success1($message) {
    $data = array('status' => true, 'response' => array('message' => $message));
    return response()->json($data);
}

function api_error($message, $httpcode = 422) {
    $data = array('status' => false, 'error' => array('message' => $message));
    return response()->json($data, $httpcode);
}


