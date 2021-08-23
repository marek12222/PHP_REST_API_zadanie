<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">
    <title>REST</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <?php
    if (isset($_POST['datum'])) {
        echo "<script>
        $.ajax({
                    type: 'GET',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=getName&date=" . $_POST['datum'] . "',
                    success: function (msg) {
                        $(\"#myDiv\").html(msg);
                    }
                });
</script>";

    }

    if ((isset($_POST['name'])) && ($_POST['name'] != "")) {
        echo "<script>
        $.ajax({
                    type: 'GET',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=getDate&name=" . $_POST['name'] . "&country=".$_POST['countries']."',
                    success: function (msg) {
                        $(\"#myDiv2\").html(msg);
                    }
                });
</script>";
    }


    if (isset($_POST['sviatkySK'])) {
        echo "<script>
        $.ajax({
                    type: 'GET',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=getSkSviatky',
                    success: function (msg) {
                        $(\"#myDiv3\").html(msg);
                    }
                });
</script>";
    }

    if (isset($_POST['sviatkyCZ'])) {
        echo "<script>
        $.ajax({
                    type: 'GET',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=getCzSviatky',
                    success: function (msg) {
                        $(\"#myDiv3\").html(msg);
                    }
                });
</script>";
    }

    if (isset($_POST['dniSK'])) {
        echo "<script>
        $.ajax({
                    type: 'GET',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=getSkDni',
                    success: function (msg) {
                        $(\"#myDiv3\").html(msg);
                    }
                });
</script>";
    }

    if (isset($_POST['vlozitMeno'])) {

        echo "<script>
        $.ajax({
                    type: 'POST',
                    url: 'http://147.175.121.210:8039/cv6/restApi.php/osoby?action=postName&name=" . $_POST['meno'] . "&date=".$_POST['datumik']."',
                    success: function (msg) {
                        $(\"#myDiv3\").html(msg);
                    }
                });
</script>";
    }

    ?>
</head>
<body>
<h1>REST</h1>
<hr>
<form id="date" method="post" action="index.php">

    <label>Zadajte deň a mesiac<input placeholder="dd.mm." type="text" name="datum"></label>
    <input type="submit" value="Získať mena ľudí, ktori maju meniny na Slovensku a v Českej republike">
</form>

<div id="myDiv"></div>
<hr>


<form id="textWithState" method="post" action="index.php">

    <label>Zadajte meno<input placeholder="Sem zadajte meno" type="text" name="name"></label>
    <label>Vyberte krajinu
        <select name="countries">
            <option value="SK">Slovenská republika</option>
            <option value="CZ">Česká republika</option>
            <option value="HU">Maďarsko</option>
            <option value="PL">Poľsko</option>
            <option value="AT">Rakúsko</option>
        </select>
    </label>
    <input type="submit" value="Ziskat datum kedy oslavuje clovek so zadanym menom v danej krajine">
</form>

<div id="myDiv2"></div>
<hr>
<form id="sviatkySK" method="post" action="index.php">
    <input type="submit" name="sviatkySK" value="Zobraziť slovenské sviatky" />
</form>
<form id="dniSK" method="post" action="index.php">
    <input type="submit" name="dniSK" value="Zobraziť pamätné dni na Slovensku" />
</form>
<form id="sviatkyCZ" method="post" action="index.php">
    <input type="submit" name="sviatkyCZ" value="Zobraziť české sviatky" />
</form>

<form id="vlozitMeno" method="post" action="index.php">
    <label>Zadajte meno<input placeholder="Sem zadajte meno" type="text" name="meno"></label>
    <label>Zadajte deň a mesiac<input placeholder="dd.mm." type="text" name="datumik"></label>
    <input type="submit" name="vlozitMeno" value="vlozit nove meno pre zadany datum" />
</form>

<div id="myDiv3"></div>

<hr>
<h3>Popis API</h3>
<div>Vytvorná RESTful API poskytuje GET a POST metódu na získavanie dát z xml súboru.</div>
<div>Akcia getName nám vypíše meno k zadanému datumu .</div>
<div>Akcia getDate vrati datum k zadanemu menu a statu.</div>
<div>Akcia getSkSviatky nam vrati zoznam slovenských sviatkov.</div>
<div>Akcia getCzSviatky nam vráti zoznam českých sviatkov.</div>
<div>Akcia getSkDni nam vráti zoznam pamätných dní na Slovensku. </div>
<hr>
</body>
</html>