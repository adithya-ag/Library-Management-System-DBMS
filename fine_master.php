<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style30.css">
    <title>LIBARARY|FINE MASTER RECORDS</title>
</head>
<body>
    <form align='center' action="fine_check.php" method="post">
    <h1>FINE MASTER</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
       <!--<span class='d'>STUDENT ID</span><br>
         <input type="number" placeholder=1VI20CS001 name="STUDENT ID" id="">
        <span><input class='a' type="number" placeholder=1VI20CS001 name="STUDENT ID" id=""></span>-->
        <div class='b'>BOOK ID</div> 
        <div><input type="number" name="BOOK ID"></div>
        <div class='b'>STUDENT ID</div>
        <div><input class='c' type="number" name="STUDENT ID" placeholder='1VI20CS001'></div>
        <div class='b'>FINE AMT</div>
        <div><input type="number" name="FINE AMT" placeholder='200rs'></div>
        <div class='b'>REMARKS</div>
        <div><input class='c' type="text" name="REMARKS" placeholder='Pages torn'></div>
        <div><input type="submit" value="submit"></div>
        <!--<div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>-->
    </form>
</body>
</html>