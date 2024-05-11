<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Stylei.css">
    <title>LIBARARY|STUDENTS RECORDS</title>
    <style>
        body{
            background-image: url('5623630.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        
        
    </style>
</head>
<body>
    <form class="bo" align='center' action="student_check.php" method="post">
    <div class = 'header'><b>WELCOM TO LIBRARY MANAGEMENT SYSTEM</b></div><br>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET[ 'error' ]; ?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
        <p class="error"><?php echo $_GET[ 'success' ]; ?></p>
    <?php } ?>
       <!--<span class='d'>STUDENT ID</span><br>
         <input type="number" placeholder=1VI20CS001 name="STUDENT ID" id="">
        <span><input class='a' type="number" placeholder=1VI20CS001 name="STUDENT ID" id=""></span>-->
        <div class='b'>STUDENT NAME</div> 
        <div><input type="text" name="STUDENT NAME" placeholder='gaurav'></div>
        <div class='b'>ROLL NO</div>
        <div><input class='c' type="text" name="ROLL NO" placeholder='1VI20CS001'></div>
        <div class='b'>STANDARD</div>
        <div><input type="text" name="STANDARD" placeholder='5 sem'></div>
        <div class='b'>SECTION</div>
        <div><input class='c' type="text" name="SECTION" placeholder='a'></div>
        <div><input type="submit" value="add student"></div>
        <!--<div class='z'>Already Signed-up?</div>
        <div class='y'><a href="login.php">LogIN</a>-->
    </form>
</body>
</html>