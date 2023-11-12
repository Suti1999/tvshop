

<div class="row col-md-6 mx-auto">
    <?php
    foreach ($db->osszesTermek() as $row) {
        $image = null;
        if (file_exists("./kepek/" . $row['termek_neve'] . ".jpg")) {
            $image = "./kepek/" . $row['termek_neve'] . ".jpg";
        } else if (file_exists("./kepek/" . $row['termek_neve'] . ".jpeg")) {
            $image = "./kepek/" . $row['termek_neve'] . ".jpeg";
        } else if (file_exists("./kepek/" . $row['termek_neve'] . ".png")) {
            $image = "./kepek/" . $row['termek_neve'] . ".png";
        } else {
            $image = "./kepek/noimage.jpg";
        }
        
        $card = '<div class="card" style="width: 18rem;">
                    <img src="'.$image.'" class="card-img-top" alt="...">
                        <hr>
                    <div class="card-body">
                        <h1>' . $row['marka'] . '</h1> 
                        <h4 class="card-title">' . $row['termek_neve'] . '</h4>                       
                        <p>' . $row['felbontas'] . '</p> 
                        <p>' . $row['AR'] . '</p> 
                        <a href="index.php?menu=kivalasztott&id=' . $row['termekid'] . '" class="btn btn-primary">Részletek</a>
                    </div>
                </div>                
            ';
        echo $card;
    }
   
    
    ?>
</div>
<br>
<?php 
 require_once './layout/footer.php';
?>



