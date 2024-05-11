<?php
include './config/db.php';

    if(isset($_POST['PURCHASE_DATE']) &&
        isset($_POST['BOOK_ID']) && isset($_POST['QUANTITY']) ){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        
        $PURCHASE_DATE = validate($_POST['PURCHASE_DATE']);
        $BOOK_ID = validate($_POST['BOOK_ID']);
        $QUANTITY = validate($_POST['QUANTITY']);
        

        if(($PURCHASE_DATE)){
            header("Location: book_purchase.php?error=PURCHASE DATE is Required");
            exit();
        }else if($BOOK_ID){
            header("Location: book_purchase.php?error=BOOK ID is Required");
            exit();
        }else if(empty($QUANTITY)){
            header("Location: book_purchase.php?error= QUANTITYile Number is Required");
            exit();
        }else{
            $sql = "INSERT Into BOOKS_PURCHASE(PUR_SEQ_ID,PURCHASE_DATE,BOOK_ID,QUANTITY) values('$PUR_SEQ_ID','$PURCHASE_DATE','$BOOK_ID','$QUANTITY')";
            $result =  mysqli_query($conn,  $sql);
            if ($result) {
                header("Location: book_purchase.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:book_purchase.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: book_purchase.php");
        exit();
    }
    
?>