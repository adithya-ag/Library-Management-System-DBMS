<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylei.css">
    <title>LIBARARY|BOOKS PURCHASE RECORDS</title>
</head>
<body>
    <form align='center' action="book_purchase_check.php" method="post">
    <h1>BOOKS PURCHASE</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
        <div class='b'>PURCHASE DATE</div> 
        <div><input type="date" name="PURCHASE DATE"></div>
        <div class='b'>BOOK ID</div>
        <div><input class='c' type="number" name="BOOK ID"></div>
        <div class='b'>QUANTITY</div>
        <div><input type="text" name="QUANTITY"></div>
        <div><input type="submit" value="submit"></div>
    </form>
</body>
</html>