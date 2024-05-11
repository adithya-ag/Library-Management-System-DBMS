<?php
include './config/db.php';

    if(isset($_POST['BOOK_ID']) && isset($_POST['STUDENT_ID']) &&
        isset($_POST['FINE_AMT']) && isset($_POST['REMARKS'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $BOOK_ID = validate($_POST['BOOK_ID']);
        $STUDENT_ID = validate($_POST['STUDENT_ID']);
        $FINE_AMT = validate($_POST['FINE_AMT']);
        $REMARKS = validate($_POST['REMARKS']);
        
       

        if(empty($BOOK_ID)){
            header("Location: fine_master.php?error=BOOK ID is Required");
            exit();
        }else if(empty($STUDENT_ID)){
            header("Location: fine_master.php?error=STUDENT ID is Required");
            exit();
        }else if(empty($FINE_AMT)){
            header("Location: fine_master.php?error=FINE AMT is Required");
            exit();
        }else if(empty($REMARKS)){
            header("Location: fine_master.php?error=REMARKS is Required");
            exit();
        }else{
            $sql = "INSERT Into FINE(BOOK_ID,STUDENT_ID,FINE_AMT,REMARKS) values('$BOOK_ID','$STUDENT_ID','$FINE_AMT','$REMARKS','$SECTION')";
            $result =  mysqli_query($conn,  $sql);
            if ($result) {
                header("Location: fine_master.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:fine_master.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: fine_master.php");
        exit();
    }
    
?>