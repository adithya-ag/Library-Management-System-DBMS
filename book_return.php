<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylei.css">
    <title>LIBARARY|BOOK RETURN RECORDS</title>
</head>
<body>
    <form align='center' action="book_return_check.php" method="post">
    <h1>BOOK RETURN RECORDS</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
        <div class='b'>RETURN DATE</div> 
        <div><input type="date" name="RETURN DATE" placeholder=date()></div>
        <div class='b'>AC YEAR</div>
        <div><input class='c' type="text" name="AC YEAR" placeholder='2023'></div>
        <div class='b'>STUDENT ID</div>
        <div><input type="number" name="STUDENT ID" placeholder='1'></div>
        <div class='b'>BOOK ID</div>
        <div><input class='c' type="number" name="BOOK ID" placeholder='a'></div>
        <span class='d'>REMARKS</span><br>
        <span><input class='b' type="text" placeholder='water dammage/page 8 dammaged' name="REMARKS" id=""></span>
        <div><input type="submit" value="submit"></div>
        <!--<div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>-->
    </form>
</body>
</html>