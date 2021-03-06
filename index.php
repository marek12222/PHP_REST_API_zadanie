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

    <label>Zadajte de?? a mesiac<input placeholder="dd.mm." type="text" name="datum"></label>
    <input type="submit" value="Z??ska?? mena ??ud??, ktori maju meniny na Slovensku a v ??eskej republike">
</form>

<div id="myDiv"></div>
<hr>


<form id="textWithState" method="post" action="index.php">

    <label>Zadajte meno<input placeholder="Sem zadajte meno" type="text" name="name"></label>
    <label>Vyberte krajinu
        <select name="countries">
            <option value="SK">Slovensk?? republika</option>
            <option value="CZ">??esk?? republika</option>
            <option value="HU">Ma??arsko</option>
            <option value="PL">Po??sko</option>
            <option value="AT">Rak??sko</option>
        </select>
    </label>
    <input type="submit" value="Ziskat datum kedy oslavuje clovek so zadanym menom v danej krajine">
</form>

<div id="myDiv2"></div>
<hr>
<form id="sviatkySK" method="post" action="index.php">
    <input type="submit" name="sviatkySK" value="Zobrazi?? slovensk?? sviatky" />
</form>
<form id="dniSK" method="post" action="index.php">
    <input type="submit" name="dniSK" value="Zobrazi?? pam??tn?? dni na Slovensku" />
</form>
<form id="sviatkyCZ" method="post" action="index.php">
    <input type="submit" name="sviatkyCZ" value="Zobrazi?? ??esk?? sviatky" />
</form>

<form id="vlozitMeno" method="post" action="index.php">
    <label>Zadajte meno<input placeholder="Sem zadajte meno" type="text" name="meno"></label>
    <label>Zadajte de?? a mesiac<input placeholder="dd.mm." type="text" name="datumik"></label>
    <input type="submit" name="vlozitMeno" value="vlozit nove meno pre zadany datum" />
</form>

<div id="myDiv3"></div>

<hr>
<h3>Popis API</h3>
<div>Vytvorn?? RESTful API poskytuje GET a POST met??du na z??skavanie d??t z xml s??boru.</div>
<div>Akcia getName n??m vyp????e meno k zadan??mu datumu .</div>
<div>Akcia getDate vrati datum k zadanemu menu a statu.</div>
<div>Akcia getSkSviatky nam vrati zoznam slovensk??ch sviatkov.</div>
<div>Akcia getCzSviatky nam vr??ti zoznam ??esk??ch sviatkov.</div>
<div>Akcia getSkDni nam vr??ti zoznam pam??tn??ch dn?? na Slovensku. </div>
<hr>
</body>
</html>