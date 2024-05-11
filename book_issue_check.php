<?php
include './config/db.php';

    if(isset($_POST['ISSUE_DATE']) && isset($_POST['AC_YEAR']) &&
        isset($_POST['STUDENT_ID']) && isset($_POST['BOOK_ID']) &&
        isset($_POST['REMARKS'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $ISSUE_DATE = validate($_POST['ISSUE_DATE']);
        $AC_YEAR = validate($_POST['AC_YEAR']);
        $STUDENT_ID = validate($_POST['STUDENT_ID']);
        $BOOK_ID = validate($_POST['BOOK_ID']);
        $REMARKS = validate($_POST['REMARKS']);
        
       

        if(empty($ISSUE_DATE)){
            header("Location: book_issue.php?error=ISSUE DATE is Required");
            exit();
        }else if(empty($AC_YEAR)){
            header("Location: book_issue.php?error=AC YEAR is Required");
            exit();
        }else if(empty($STUDENT_ID)){
            header("Location: book_issue.php?error=STUDENT ID is Required");
            exit();
        }else if(empty($BOOK_ID)){
            header("Location: book_issue.php?error=BOOK ID is Required");
            exit();
        }else if(empty($REMARKS)){
            header("Location: book_issue.php?error=REMARKS is Required");
            exit();
        }else{
            $sql = "INSERT Into BOOKS_ISSUE(ISSUE_DATE,AC_YEAR,STUDENT_ID,BOOK_ID,REMARKS) values('$ISSUE_DATE','$AC_YEAR','$STUDENT_ID','$BOOK_ID','$REMARKS')";
            $result =  mysqli_query($conn,  $sql);
            if ($result) {
                header("Location: book_issue.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:book_issue.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: book_issue.php");
        exit();
    }
    
?>