<?php
include './config/db.php';

    if(isset($_POST['RETURN_DATE']) && isset($_POST['AC_YEAR']) &&
        isset($_POST['STUDENT_ID']) && isset($_POST['BOOK_ID']) &&
        isset($_POST['REMARKS'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $RETURN_DATE = validate($_POST['RETURN_DATE']);
        $AC_YEAR = validate($_POST['AC_YEAR']);
        $STUDENT_ID = validate($_POST['STUDENT_ID']);
        $BOOK_ID = validate($_POST['BOOK_ID']);
        $REMARKS = validate($_POST['REMARKS']);
        
       

        if(empty($RETURN_DATE)){
            header("Location: book_return.php?error=RETURN DATE is Required");
            exit();
        }else if(empty($AC_YEAR)){
            header("Location: book_return.php?error=AC YEAR is Required");
            exit();
        }else if(empty($STUDENT_ID)){
            header("Location: book_return.php?error=STUDENT ID is Required");
            exit();
        }else if(empty($BOOK_ID)){
            header("Location: book_return.php?error=BOOK ID is Required");
            exit();
        }else if(empty($REMARKS)){
            header("Location: book_return.php?error=REMARKS is Required");
            exit();
        }else{
            $sql = "INSERT Into BOOKS_RETURN(RETURN_DATE,AC_YEAR,STUDENT_ID,BOOK_ID,REMARKS) values('$RETURN_DATE','$AC_YEAR','$STUDENT_ID','$BOOK_ID','$REMARKS')";
            $result =  mysqli_query($conn,  $sql);//res = 1 is 
            if ($result) {
                header("Location: book_return.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:book_return.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: book_return.php");
        exit();
    }
    
?>