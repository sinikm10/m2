<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/pacijenti.php";


$vrsta=Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$ime=trim($_POST['ime']);
	$prezime=trim($_POST['prezime']);
    $jmbg=trim($_POST['jmbg']);
    $datum_rodjenja=trim($_POST['datum_rodjenja']);
    $vrsta=$_POST['vrsta'];
    
	
	
	$data = Array (
				"ime" => $ime, 
				"prezime" => $prezime,
				"jmbg" => $jmbg,					
				"datum_rodjenja" => $datum_rodjenja,					
                "id_vrste" => $vrsta,    
        );	
        
	$pacijent=new Pacijent(null,$ime,$prezime,$jmbg,$datum_rodjenja,$vrsta);
		
		$pacijent->ubaciPacijenta($data,$mysqli);
		
        $pacijent = $pacijent->getPoruka();
        header("Location:unosnovogpacijenta.php");
        
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos novog pacijenta</title>
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
        <div id="slika1-img" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosPacijenta" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="ime">Ime pacijenta:</label>
                    <input type="text" class="form-control" name="ime" id="ime" placeholder="Unesite ime pacijenta">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime pacijenta:</label>
                    <input type="text" class="form-control" name="prezime" id="prezime" placeholder="Unesite prezime pacijenta">

                </div>
                <div class="form-group">
                    <label for="jmbg">JMBG pacijenta:</label>
                    <input type="text" class="form-control" name="jmbg" id="jmbg" placeholder="Unesite jmbg pacijenta">

                </div>

                <div class="form-group">
                    <label for="datum_rodjenja">Datum rodjenja pacijenta:</label>
                    <input type="text" class="form-control" name="datum_rodjenja" id="datum_rodjenja" placeholder="Unesite datum rodjenja pacijenta">

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
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>