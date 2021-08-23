<?php
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
//var_dump($method); echo("<br>");
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);   // php://input - read raw data from the request body
$key = array_shift($request) + 0;

switch ($method) {
    case 'GET':
        $result = "GET" . $key;
        break;
    case 'PUT':
        $result = "PUT" . $key;
        break;
    case 'POST':
        $result = "POST" . $key;
        break;
    case 'DELETE':
        $result = "DELETE" . $key;
        break;
}



$xmlFile= "meniny.xml";

$xml = simplexml_load_file($xmlFile) or die("feed not loading");
if ($method == 'GET') {

    switch ($_GET["action"]) {
        case "getName":


            $entries = explode('.', $_GET["date"]);
            $date = $entries[1] . $entries[0];


            foreach ($xml->zaznam as $zaznam) {
                if ((string)$zaznam->den == (string)$date) {
                    echo "<h3>" . $_GET["date"] . "</h3>";
                    echo 'Na Slovensku má meniny ' . $zaznam->SK;
                }
            }

            break;
        case "getDate":

            foreach ($xml->zaznam as $zaznam) {
                if ($_GET["country"] == "SK") {

                    $entries = explode(',', (string)$zaznam->SK);

                    foreach ($entries as $entry) {
                        if ($entry == (string)$_GET["name"]) {
                            echo "<br>";
                            $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                            echo 'V krajine ' . $_GET["country"] . " má " . $_GET["name"] . " meniny " . $date;
                        }
                    }
                } else if ($_GET["country"] == "CZ") {

                    $entries = explode(',', (string)$zaznam->CZ);

                    foreach ($entries as $entry) {
                        if ($entry == (string)$_GET["name"]) {
                            echo "<br>";
                            $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                            echo 'V krajine ' . $_GET["country"] . " má " . $_GET["name"] . " meniny " . $date;
                        }
                    }
                } else if ($_GET["country"] == "HU") {

                    $entries = explode(',', (string)$zaznam->HU);

                    foreach ($entries as $entry) {
                        if ($entry == (string)$_GET["name"]) {
                            echo "<br>";
                            $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                            echo 'V krajine ' . $_GET["country"] . " má " . $_GET["name"] . " meniny " . $date;
                        }
                    }
                } else if ($_GET["country"] == "PL") {

                    $entries = explode(',', (string)$zaznam->PL);

                    foreach ($entries as $entry) {
                        if ($entry == (string)$_GET["name"]) {
                            echo "<br>";
                            $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                            echo 'V krajine ' . $_GET["country"] . " má " . $_GET["name"] . " meniny " . $date;
                        }
                    }
                } else if ($_GET["country"] == "AT") {

                    $entries = explode(',', (string)$zaznam->AT);

                    foreach ($entries as $entry) {
                        if ($entry == (string)$_GET["name"]) {
                            echo "<br>";
                            $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                            echo 'V krajine :' . $_GET["country"] . " má :" . $_GET["name"] . " meniny dňa :" . $date;
                        }
                    }
                }
            }

            break;

        case "getSkSviatky":
            echo "<h3>Slovenské sviatky</h3>";
            foreach ($xml->zaznam as $zaznam) {
                if((string)$zaznam->SKsviatky!=""){
                    $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                    echo $date . " - " . $zaznam->SKsviatky . "<br>";

                }
            }
            break;

        case "getCzSviatky":
            echo "<h3>České sviatky</h3>";
            foreach ($xml->zaznam as $zaznam) {
                if((string)$zaznam->CZsviatky!=""){
                    $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                    echo $date . " - " . $zaznam->CZsviatky . "<br>";
                }
            }
            break;

        case "getSkDni":
            echo "<h3>Pamätné dni na Slovensku</h3>";
            foreach ($xml->zaznam as $zaznam) {
                if((string)$zaznam->SKdni!=""){
                    $date = substr($zaznam->den, 2, 2) . "." . substr($zaznam->den, 0, 2) . ".";
                    echo $date . " - " . $zaznam->SKdni . "<br>" ;
                }
            }
            break;
    }
} elseif ($method == 'POST') {

    if ($_GET["action"]=="postName"){
        $entries = explode('.', $_GET["date"]);
        $date = $entries[1] . $entries[0];
        $name = $_GET["name"];
        foreach ($xml->zaznam as $zaznam)
        {
            if((string)$zaznam->den==(string)$date){
                if(isset($zaznam->SKd)){
                    $nodeValue = $zaznam->SKd;
                    $finalString = $nodeValue . ", " . $name;
                    $zaznam->SKd = $finalString;
//                    echo $zaznam->SKd;
//                    echo "<br>";
                    echo "uspesne updatnute";
                }else{
                    $zaznam->SKd = $name;
                }
                $xml->asXML($xmlFile);
            }
        }
    }
//    echo json_encode($result);

} else {
    echo json_encode($result);

}