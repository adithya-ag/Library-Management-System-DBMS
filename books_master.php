<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylei.css">
    <title>LIBARARY|BOOKS RECORDS</title>
    <style>
        body{
            background-image: url('5623630.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        
        
    </style>
</head>
<body>
    <form align='center' action="books_check.php" method="post">
    <h1>BOOKS</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
        <span class='d'>BOOK ID</span><br>
        <span><input class='a' type="number" placeholder='1' name="BOOK_ID" ></span>
        <div class='b'>BOOK_NAME</div> 
        <div><input type="text" name="BOOK NAME" placeholder='hobbits'></div>
        <div class='b'>AUTHER</div>
        <div><input class='c' type="text" name="AUTHER" placeholder='p.k. tokin'></div>
        <div class='b'>PUBLISHER</div>
        <div><input type="text" name="PUBLISHER"></div>
        <div class='b'>CATEGORY</div>
        <div><input type="text" name="CATEGORY"></div>
        <div class='b'>COST</div>
        <div><input type="number" name="COST"></div>
        <div><input type="submit" value="Add Book"></div>
        <!--<div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>-->
    </form>
</body>
</html>