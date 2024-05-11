<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style30.css">
    <title>LIBARARY|BOOKS PURCHASE RECORDS</title>
</head>
<body>
    <form align='center' action="bool_purchase_check.php" method="post">
    <h1>BOOKS PURCHASE</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
        <span class='d'>PUR_SEQ_ID</span><span class='e'>Last Name</span><br>
        <span><input class='a' type="number" placeholder='001' name="PUR_SEQ_ID" ></span><span><input class='a' type="text" placeholder='Singh'  name='lname'></span>
        <div class='b'>PURCHASE DATE</div> 
        <div><input type="date" name="PURCHASE DATE" placeholder='01-jan-2023'></div>
        <div class='b'>BOOK ID</div>
        <div><input class='c' type="text" name="mob" placeholder='6265382141'></div>
        <div class='b'>Password</div>
        <div><input type="password" name="password"></div>
        <div class='b'>Confirm Password</div>
        <div><input type="password" name="re_password"></div>
        <div><input type="submit" value="Sign up"></div>
        <div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>
    </form>
</body>
</html>