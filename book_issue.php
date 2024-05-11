<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylei.css">
    <title>LIBARARY|BOOK ISSUE RECORDS</title>
</head>
<body>
    <form align='center' action="book_issue_check.php" method="post">
    <h1>BOOK ISSUE RECORDS</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
        <div class='b'>ISSUE DATE</div> 
        <div><input type="date" name="ISSUE DATE" placeholder=date()></div>
        <div class='b'>AC YEAR</div>
        <div><input class='c' type="text" name="AC YEAR" placeholder='2023'></div>
        <div class='b'>STUDENT ID</div>
        <div><input type="number" name="STUDENT ID" placeholder='1'></div>
        <div class='b'>BOOK ID</div>
        <div><input class='c' type="number" name="BOOK ID" placeholder='001'></div>
        <span class='d'>REMARKS</span><br>
        <span><input class='a' type="text" placeholder='new book/page 8 dammaged' name="REMARKS" id=""></span>
        <div><input type="submit" value="submit"></div>
        <!--<div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>-->
    </form>
</body>
</html>