<?php

function getDataFromSheet($apiId, $parameters = []) {
    $url = "https://sheetdb.io/api/v1/" . $apiId;
    
    if (!empty($parameters)) {
        $url .= '?' . http_build_query($parameters);
    }

    $response = file_get_contents($url);
    return json_decode($response, true);
}


date_default_timezone_set('America/Sao_Paulo');

$currentDate = date('d-m');

$employees = getDataFromSheet("x7msubhu7axc1");

foreach ($employees as $employee) {
   
    if (empty($employee["COLABORADOR"]) || empty($employee["DATA DE NASCIMENTO"]) || empty($employee["DATA DE ENTRADA"]) || !empty($employee["DATA DE SAIDA"])) {
        continue; 
    }


    $specialDate = date_create_from_format('d/m/Y', $employee["DATA DE NASCIMENTO"])->format('d-m');
    $entryDate = date_create_from_format('d/m/Y', $employee["DATA DE ENTRADA"])->format('d-m');

    echo "<tr>";

    echo "<td>" . $employee["COLABORADOR"] . "</td>";
    echo "<td>";


    if ($specialDate == $currentDate) {
        echo $employee["DATA DE NASCIMENTO"];
    } else {
        echo $employee["DATA DE NASCIMENTO"];
    }

    echo "</td>";

    echo "<td>";


    if ($entryDate == $currentDate) {
        echo  $employee["DATA DE ENTRADA"];
    } else {
        echo $employee["DATA DE ENTRADA"];
    }
    echo "</td>"; 

    echo "</tr>";
}
?>
