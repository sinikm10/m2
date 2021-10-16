<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/pacijenti.php";

$id=$_GET['id'];

$pacijent=Pacijent::vratiSve($mysqli," where p.id_pacijenta=".$id);
$vrsta=Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $jmbg = $_POST['jmbg'];
    $datum_rodjenja = $_POST['datum_rodjenja'];
    $vrsta = $_POST['vrsta'];       

    $mysqli->query("UPDATE pacijenti SET ime='$ime', prezime='$prezime', jmbg='$jmbg', datum_rodjenja='$datum_rodjenja',id_vrste='$vrsta' WHERE id_pacijenta=$id");
    header('location: listapacijenata.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena pacijenta</title>

</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="ime">Ime pacijenta:</label>
                    <input type="text" class="form-control" name="ime" id="ime"
                        value="<?php echo $pacijent[0]->ime; ?>">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime pacijenta:</label>
                    <input type="text" class="form-control" name="prezime" id="prezime"
                        value="<?php echo $pacijent[0]->prezime; ?>">
                </div>
                <div class="form-group">
                    <label for="jmbg">JMBG pacijenta:</label>
                    <input type="text" class="form-control" name="jmbg" id="jmbg"
                        value="<?php echo $pacijent[0]->jmbg; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_rodjenja">Datum rođenja pacijenta:</label>
                    <input type="text" class="form-control" name="datum_rodjenja" id="datum_rodjenja"
                        value="<?php echo $pacijent[0]->datum_rodjenja; ?>">
                </div>
                <div class="form-group">
                    <label for="vrsta">Vrsta pacijenta:</label>
                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach($vrsta as $v): ?>
                        <option value="<?php echo $v->id_vrste;?>">
                            <?php echo $v->naziv_vrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>