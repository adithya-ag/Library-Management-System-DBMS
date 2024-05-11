<?php
include './config/db.php';

    if(isset($_POST['BOOK_ID']) && isset($_POST['BOOK_NAME']) &&
        isset($_POST['AUTHER']) && isset($_POST['PUBLISHER']) &&
        isset($_POST['CATEGORY']) && isset($_POST['COST'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $BOOK_ID = validate($_POST['BOOK_ID']);
        $BOOK_NAME = validate($_POST['BOOK_NAME']);
        $AUTHER = validate($_POST['AUTHER']);
        $PUBLISHER = validate($_POST['PUBLISHER']);
        $CATEGORY = validate($_POST['CATEGORY']);
        $COST = validate($_POST['COST']);
       

        if(empty($BOOK_ID)){
            header("Location: books_master.php?error=BOOK ID is Required");
            exit();
        }else if(empty($BOOK_NAME)){
            header("Location: books_master.php?error=BOOK NAME is Required");
            exit();
        }else if(empty($AUTHER)){
            header("Location: books_master.php?error=AUTHER is Required");
            exit();
        }else if(empty($PUBLISHER)){
            header("Location: books_master.php?error=PUBLISHER is Required");
            exit();
        }else if(empty($CATEGORY)){
            header("Location: books_master.php?error=CATEGORY is Required");
            exit();
        }else if(empty($COST)){
            header("Location: books_master.php?error=COST is Required");
            exit();
        }else{
            $sql = "INSERT Into BOOKS(BOOK_ID,BOOK_NAME,AUTHER,PUBLISHER,CATEGORY,COST) values('$BOOK_ID','$BOOK_NAME','$AUTHER','$PUBLISHER','$CATEGORY','$COST')";
            $result =  mysqli_query($conn,  $sql);
            if ($result) {
                header("Location: books_master.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:books_master.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: books_master.php");
        exit();
    }
    
?>