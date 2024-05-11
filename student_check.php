<?php
include './config/db.php';

    if(isset($_POST['STUDENT_ID']) && isset($_POST['STUDENT_NAME']) &&
        isset($_POST['ROLL_NO']) && isset($_POST['STANDARD']) &&
        isset($_POST['SECTION'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
        $STUDENT_ID = validate($_POST['STUDENT_ID']);
        $STUDENT_NAME = validate($_POST['STUDENT_NAME']);
        $ROLL_NO = validate($_POST['ROLL_NO']);
        $STANDARD = validate($_POST['STANDARD']);
        $SECTION = validate($_POST['SECTION']);
        
       

        if(empty($STUDENT_ID)){
            header("Location: students_master.php?error=student ID is Required");
            exit();
        }else if(empty($STUDENT_NAME)){
            header("Location: students_master.php?error=student name is Required");
            exit();
        }else if(empty($ROLL_NO)){
            header("Location: students_master.php?error=roll Number is Required");
            exit();
        }else if(empty($STANDARD)){
            header("Location: students_master.php?error=standard is Required");
            exit();
        }else if(empty($SECTION)){
            header("Location: students_master.php?error=section is Required");
            exit();
        }else{
            $sql = "INSERT Into STUDENTS(STUDENT_ID,STUDENT_NAME,ROLL_NO,STANDARD,SECTION) values('$STUDENT_ID','$STUDENT_NAME','$ROLL_NO','$STANDARD','$SECTION')";
            $result =  mysqli_query($conn,  $sql);
            if ($result) {
                header("Location: students_master.php?success=Your account is created Successfully");
                exit();
            }else{
                header("Location:students_master.php?error=Unknown error occured");
                exit();
            }

        }
    }else{
        header("Location: students_master.php");
        exit();
    }
    
?>