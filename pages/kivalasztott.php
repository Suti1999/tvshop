<link rel="stylesheet" href="./pages/kivalasztott.css"/>


<?php

    $id = filter_input(INPUT_GET, "id");
    $tvAdatok = $db->getKivalasztottTermek($id);

    if ($tvAdatok!=null) {
        
        echo '<h1 id="kivalaszott_tv_cim">'.$tvAdatok['termek_neve'].' '.$tvAdatok['marka'].'</h1>';
        
        
        echo '<div class="container">';
            echo '<div class="row">';
                echo '<div class="col-md-12">';
                    $image = file_exists("./kepek/" . $tvAdatok['termek_neve'] . ".png") ? "./kepek/" . $tvAdatok['termek_neve'] . ".png" : (file_exists("./kepek/" . $tvAdatok['termek_neve'] . ".jpg") ? "./kepek/" . $tvAdatok['termek_neve'] . ".jpg" : (file_exists("./kepek/" . $tvAdatok['termek_neve'] . ".jpeg") ? "./kepek/" . $tvAdatok['termek_neve'] . ".jpeg" : "./kepek/noimage.jpg"));
                    echo '<img class="kivalaszott_tv_kep" src="' . $image . '" alt="' . $tvAdatok['termek_neve'] . ' ' . $tvAdatok['marka'] . ' ' . $tvAdatok['kepernyomeret'] . ' ' . $tvAdatok['felbontas'] . ' ' . $tvAdatok['kijelzo_felbontas'] . ' ' . $tvAdatok['Smart'] . ' ' . $tvAdatok['Hangteljesitmeny'] . ' ' . $tvAdatok['WIFI'] . ' ' . $tvAdatok['Bluetooth'] . ' ' . $tvAdatok['AR'] . ' ' . $tvAdatok['Garancia'] . '" />';
                echo '</div>';
                    echo ' <table>
                            <tr>
                              <th class="tablazat_cimek"><p>Márka</p></th>
                              <th class="tablazat_cimek"><p>Képernyőméret</p></th>
                              <th class="tablazat_cimek"><p>Felbontás</p></th>
                              <th class="tablazat_cimek"><p>Kijelző felbontás</p></th>
                              <th class="tablazat_cimek"><p>Smart</p></th>
                              <th class="tablazat_cimek"><p>Hangteljesítmény</p></th>
                              <th class="tablazat_cimek"><p>WIFI</p></th>
                              <th class="tablazat_cimek"><p>Bluetooth</p></th>
                              <th class="tablazat_cimek"><p>Garancia</p></th>
                            </tr>
                            <tr>
                              <td>'.$tvAdatok['marka'].'</td>
                              <td>'.$tvAdatok['kepernyomeret'].'</td>
                              <td>'.$tvAdatok['felbontas'].'</td>
                              <td>'.$tvAdatok['kijelzo_felbontas'].'</td>
                              <td>'.$tvAdatok['Smart'].'</td>
                              <td>'.$tvAdatok['Hangteljesitmeny'].'</td>
                              <td>'.$tvAdatok['WIFI'].'</td>
                              <td>'.$tvAdatok['Bluetooth'].'</td>
                              <td>'.$tvAdatok['Garancia'].'</td>
                            </tr>
                            
                          </table> ';
                    
                    echo '<div id="vasarlas_div" class="d-flex justify-content-between align-items-center">';
                                echo '<div>';
                                if (isset($_SESSION['login']) && $_SESSION['login']) {
                                    echo '<a href="" class="btn btn-success">Vásárlás</a>';
                                } else {
                                    echo '<a href="index.php?menu=login" class="btn btn-success">Bejelentkezés</a>';
                                }
                                echo '</div>
                                <div id="vasarlas_div_ar" class="tablazat_ar">'.$tvAdatok['AR'].' </div>
                            </div>';
            echo '</div>';
        echo '</div>';
    } else {
        echo 'A kiválasztott tv nem található.';
    }
    
?>


<br>
<br>
<?php 
 require_once './layout/footer.php';




