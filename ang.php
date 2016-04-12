<?php

const FILE_NAME = 'ang.txt';

$action = isset($_REQUEST['action']) && $_REQUEST['action'];
$textData = file_get_contents(FILE_NAME);

if ($action == 'save') {
    $rawData = file_get_contents("php://input");;
    $aRawData = json_decode($rawData, true);
    $aTextData = json_decode($textData, true);

    if (isset($aTextData[$aRawData['id']])) {
        $aTextData[$aRawData['id']] = $aRawData;

        file_put_contents(FILE_NAME, json_encode($aTextData));

        echo json_encode($aRawData);
        die();
    }
}

echo $textData;
