<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
</head>
<header><h1>Hello, <?php echo $_SESSION['Firstname']; ?></h1>
    <a href="logout.php">Logout</a>
</header>
<section>
    <div class="outmost">
    <div class="outer">
        <p class="image"><a href=""><img src="OxygenConcentrator.jpg" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Oxygen Concentrator</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="multiparapatientmonitor.webp" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Multi-Para-Patient-Monitor</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="defibrilattor.jpg" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Defibrilattor</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="BiPAP.webp" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>BiPAP</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
</section>
<section>
    <div class="outmost">
    <div class="outer">
        <p class="image"><a href=""><img src="Suctionmachine.png" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Suction Machine</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="ventilator.png" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Ventilator</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="syringe-infusion-pump.webp" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Syringe Infusion Pump</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="ECG.jpeg" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>ECG</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
</section>
<section>
    <div class="outmost">
    <div class="outer">
        <p class="image"><a href=""><img src="Enternal-feeding-pump.webp" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Enternal Feeding Pump</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="BMDMachine.webp" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>BMD Machine</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="wheel.jpg" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>Wheel Chair</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
    <div class="outer">
        <p class="image"><a href=""><img src="cpm.jpg" alt="" align="center"></a></p>
        <p class="name"><a href=""><h1>CPM Machine</h1></a></p>
        <p><a href="" id="button"><h2>BUY/RENT</h2></a></p>
    </div>
</section>


</body>
</html>

<?php
}else{
    header("Location: home.php");
    exit();

}
?>