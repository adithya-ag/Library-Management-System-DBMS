user(USER_ID,Firstname,Lastname,Email,Mobile_Number,Password)

STUDENTS(STUDENT_ID,STUDENT_NAME,ROLL_NO,STANDARD,SECTION)
--note here the roll on. is of the type VARCHAR.--

BOOKS(BOOK_ID,BOOK_NAME,AUTHER,PUBLISHER,CATEGORY,COST)

BOOKS_ISSUE(ISSUE_SEQ_ID,ISSUE_DATE,AC_YEAR,STUDENT_ID,BOOK_ID,REMARKS)

BOOKS_RETURN(RETURN_SEQ_ID,RETURN_DATE,AC_YEAR,STUDENT_ID,BOOK_ID,REMARKS)

FINE(FINE_ID,BOOK_ID,STUDENT_ID,FINE_AMT,REMARKS)


BAN(BAN_ID,STUDENT_ID)
ABANDONDED(ABANDONDED_SEQ,BOOK_ID,REMARKS)

--SHOULD BE ABLE TO PERFORM DELETE OPERATION 
        <div class='b'>delete</div>
        input type='hidden' value = 'user_id' name =''
        <div><input type="submit" name="delete"></div>

        .<input type="submit" value="">.
--VIEW 
--CSS/html


http://localhost/project/index.php
http://localhost/project/students_master.php
http://localhost/project/book_issue.php