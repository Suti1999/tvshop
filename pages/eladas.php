<?php
    if (filter_input(INPUT_POST, "eladasMegerosites", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
        $error = false;
        $errormessage = "";
        $termekid = filter_input(INPUT_POST, "termekid");
        $userid = filter_input(INPUT_POST, "userd");
        $termek_neve = filter_input(INPUT_POST, "termek_neve");
        $marka = filter_input(INPUT_POST, "marka");
        $kepernyomeret = filter_input(INPUT_POST, "kepernyomeret");
        $felbontas = filter_input(INPUT_POST, "felbontas");
        $kijelzo_felbontas = filter_input(INPUT_POST, "kijelzo_felbontas");
        $Smart = filter_input(INPUT_POST, "Smart");
        $Hangteljesitmeny = filter_input(INPUT_POST, "Hangteljesitmeny");
        $WIFI = filter_input(INPUT_POST, "WIFI");
        $Bluetooth = filter_input(INPUT_POST, "Bluetooth");
        $AR = filter_input(INPUT_POST, "AR");
        $Garancia = filter_input(INPUT_POST, "Garancia");
        
        $db->hirdetesKeszitese($termek_neve, $marka, $kepernyomeret, $felbontas, $kijelzo_felbontas, $Smart, $Hangteljesitmeny, $WIFI, $Bluetooth, $AR, $Garancia, $userid, $termekid);
        header("Location:index.php");
    }

?>


<h1 style="text-align: center">Hirdetés közzététel</h1>
<div class="container">
    <div class="row">
        <form action="#" method="post" novalidate onsubmit="return teljesKitoltes()">
            <div class="from-group row">
                <div>
                    <label for="Termék_neve"><b>Termék neve:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Termék neve" id="termek_neve" name="termek_neve" minlength="3" maxlength="40" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Márka"><b>Márka:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Márka" id="marka" name="marka" minlength="3" maxlength="40" autofocus required>
                    </div>
                </div>
            </div>
            <div class="from-group row">
                <div class="">
                    <label for="Képernyőméret"><b>Képernyőméret:</b></label>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Képernyőméret" id="kepernyomeret" name="kepernyomeret" maxlength="4" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Felbontás"><b>Felbontás:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Felbontás" id="felbontas" name="felbontas" minlength="2" maxlength="40" autofocus required>
                    </div>
                </div>
            </div>
            <div class="from-group row">
                <div
                    <label for="Kijelző felbontás"><b>Kijelző felbontás:</b></label>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Kijelző felbontás" id="kijelzo_felbontas" name="kijelzo_felbontas" minlength="1" maxlength="5" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Smart"><b>Smart:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Smart ( igen / nem )" id="smart" name="smart" minlength="1" maxlength="15" autofocus required>
                    </div>
                </div>
            </div>
            <div class="from-group row">
                <div>
                    <label for="WIFI"><b>WIFI:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="WIFI ( igen / nem )" id="wifi" name="wifi" minlength="1" maxlength="15" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Bluetooth"><b>Bluetooth:</b></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Bluetooth ( igen / nem )" id="bluetooth" name="bluetooth" minlength="1" maxlength="15" autofocus required>
                    </div>
                </div>
            </div>
            <div class="from-group row">
                <div>
                    <label for="Hangteljesítmény"><b>Hangteljesítmény:</b></label>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Hangteljesítmény (Watt)" id="Watt" name="Watt" minlength="1" maxlength="4" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Ár"><b>Ár:</b></label>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Termék ára" id="ar" name="ar" minlength="1" maxlength="8" autofocus required>
                    </div>
                </div>
                <div>
                    <label for="Garancia"><b>Garancia:</b></label>
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="Garanciás ( évben megadva )" id="garancia" name="garancia" minlength="1" maxlength="8" autofocus required>
                    </div>
                </div>
            </div>
            <div class="row col-12">
            <button style="display: inline-block; padding: 10px; margin: 10px;" type="submit" class="btn btn-warning" name="eladasMegerosites" id="eladasMegerosites" value="true">Hirdetés feladása</button>
            <a style="display: inline-block; padding: 10px; margin: 10px;" href="index.php?menu=login" class="btn btn-success">Bejelentkezés</a>
            </div>
        </form>
    </div>
</div>