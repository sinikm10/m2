<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/pacijenti.php";

$order = '';

$pacijenti=Pacijent::vratiSve($mysqli,$order);

 ?>


<html>
<head>
    <?php
        include('head.php');
    ?>
        <title>Lista pacijenata</title>
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
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

                <div class="table-responsive" id="tabela-pacijenata">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th><a class="column_sort" id="ime" data-order="desc" href="#">Ime</a></th>
                                <th><a class="column_sort" id="prezime" data-order="desc" href="#">Prezime</a></th>
                                <th><a class="column_sort" id="jmbg" data-order="desc" href="#">JMBG</a></th>
                                <th><a class="column_sort" id="datum_rodjenja" data-order="desc" href="#">Datum rođenja</a></th>
                                <th>Vrsta pacijenta</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($pacijenti as $pacijent):	
                            ?>
                                <tr>
                                    <td><?php echo $pacijent->ime;?></td>
                                    <td><?php echo $pacijent->prezime;?></td>
                                    <td><?php echo $pacijent->jmbg;?></td>
                                    <td><?php echo $pacijent->datum_rodjenja;?></td>
                                    <td><?php echo $pacijent->vrsta->naziv_vrste;?></td>
                                    <td><a href="brisanjepacijenta.php?id=<?php echo $pacijent->id_pacijenta;?>">
                                            <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
                                        </a>
                                        <a href="izmenapacijenta.php?id=<?php echo $pacijent->id_pacijenta;?>">
                                            <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
                                        </a>
                                    </td>

                                </tr>
                        
                            <?php endforeach; ?> 
                    
                        </tbody>
                    </table>
                </div>

            <div id="output" >

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>
<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"server/sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#tabela-pacijenata').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  

 </script> 