Schema Name:          LIBRARY_2

----------------------------------------------------------------- CREATING DATABASE USER (SCHEMA)
sqlplus / as sysdba

--drop user LIBRARY_2 cascade;

CREATE USER LIBRARY_2 IDENTIFIED BY LIBRARY_2 DEFAULT TABLESPACE USERS;
GRANT CONNECT,RESOURCE TO LIBRARY_2;
grant create view to LIBRARY_2;

GRANT CREATE SYNONYM TO LIBRARY_2;
GRANT READ, WRITE ON DIRECTORY SYS.DUMP_DIR TO LIBRARY_2;
GRANT CREATE MATERIALIZED VIEW TO LIBRARY_2;

quit;

----------------------------------------------------------------  CREATING TABLES AND INSERTING SAMPLE DATA

sqlplus LIBRARY_2/LIBRARY_2


---------------------------------------------------

CREATE TABLE  USERS_MASTER 
   (USER_ID 			NUMBER PRIMARY KEY, 
	USER_NAME 			VARCHAR2(50) NOT NULL UNIQUE , 
	USER_PW 			VARCHAR2(50), 
	MOBILE_NO 			VARCHAR2(25), 
	EMAIL_ID 			VARCHAR2(50), 
	CREATED_ON 			DATE DEFAULT SYSDATE, 
	LAST_MODIFIED_ON 	DATE
   ) ;

CREATE OR REPLACE TRIGGER  BIU_USERS_MASTER 
before insert or update on USERS_MASTER for each row  
DECLARE
begin   
  IF INSERTING THEN 
	IF :NEW.USER_ID IS NULL THEN
		SELECT NVL(MAX(USER_ID),0) + 1
		INTO   :NEW.USER_ID
		FROM   USERS_MASTER;
	END IF;
  END IF;
  IF UPDATING THEN
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO USERS_MASTER (USER_NAME, USER_PW, MOBILE_NO, EMAIL_ID) VALUES ('ADMIN','ADMIN','6549873215','admin@gmail.com');
INSERT INTO USERS_MASTER (USER_NAME, USER_PW, MOBILE_NO, EMAIL_ID) VALUES ('RAVI','RAVI123','3579873215','ravi@gmail.com');
INSERT INTO USERS_MASTER (USER_NAME, USER_PW, MOBILE_NO, EMAIL_ID) VALUES ('ARJUN','ARJUN123','9879873215','arjun@gmail.com');
COMMIT;

SELECT * FROM USERS_MASTER;





---------------------------------------------------


CREATE TABLE STUDENTS(
	STUDENT_ID			NUMBER PRIMARY KEY,
	STUDENT_NAME		VARCHAR2(50) NOT NULL,
	ROLL_NO				VARCHAR2(10) NOT NULL,
	STANDARD			VARCHAR2(10),
	SECTION 			CHAR(1) NOT NULL,
	CREATED_ON			DATE DEFAULT SYSDATE,
	CREATED_BY			NUMBER CONSTRAINT STUDENT_CRB_FK REFERENCES USERS_MASTER,
	LAST_MODIFIED_ON	DATE,
	LAST_MODIFIED_BY	NUMBER CONSTRAINT STUDENT_LMB_FK REFERENCES USERS_MASTER
);

CREATE OR REPLACE TRIGGER  BIU_STUDENTS
before insert or update on STUDENTS for each row  
begin   
  IF INSERTING THEN
	IF :NEW.STUDENT_ID IS NULL THEN
		SELECT NVL(MAX(STUDENT_ID),0) + 1
		INTO   :NEW.STUDENT_ID
		FROM   STUDENTS;
	END IF;
  END IF;
  IF UPDATING THEN 
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO STUDENTS (STUDENT_NAME, ROLL_NO, STANDARD, SECTION, CREATED_BY) VALUES ('GIRISH','CS001','ICEMCS','A',1);
INSERT INTO STUDENTS (STUDENT_NAME, ROLL_NO, STANDARD, SECTION, CREATED_BY) VALUES ('RAJU','CS002','ICEMCS','A',1);
INSERT INTO STUDENTS (STUDENT_NAME, ROLL_NO, STANDARD, SECTION, CREATED_BY) VALUES ('CHETAN','CS003','ICEMCS','A',1);
INSERT INTO STUDENTS (STUDENT_NAME, ROLL_NO, STANDARD, SECTION, CREATED_BY) VALUES ('NAVEEN','ME001','ICEMME','A',1);
COMMIT;

-- modifying existing records
UPDATE STUDENTS SET STUDENT_NAME = 'NAVEEN G.M.' WHERE STUDENT_ID=4;
COMMIT;

---------------------------------------------------


CREATE TABLE BOOKS(
	BOOK_ID				NUMBER PRIMARY KEY,
	BOOK_NAME			VARCHAR2(50) NOT NULL,
	AUTHER				VARCHAR2(50),
	PUBLISHER			VARCHAR2(50),
	CATEGORY			VARCHAR2(50),
	COST				NUMBER,
	CREATED_ON			DATE DEFAULT SYSDATE,
	CREATED_BY			NUMBER CONSTRAINT BOOK_CRB_FK REFERENCES USERS_MASTER,
	LAST_MODIFIED_ON	DATE,
	LAST_MODIFIED_BY	NUMBER CONSTRAINT BOOK_LMB_FK REFERENCES USERS_MASTER
);

CREATE OR REPLACE TRIGGER  BIU_BOOKS
before insert or update on BOOKS for each row  
begin   
  IF INSERTING THEN 
	IF :NEW.BOOK_ID IS NULL THEN
		SELECT NVL(MAX(BOOK_ID),0) + 1
		INTO   :NEW.BOOK_ID
		FROM   BOOKS;
	END IF;
  END IF;
  IF UPDATING THEN 
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('MATHEMATICS','SANKALP','MORNING STAR','ICEMCS',250,1);
INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('C-LANGUAGE','RATNAKAR','MORNING STAR','ICEMCS',350,1);
INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('COMPUTER ORGANIZATION','SHUKLA','WISDOM','ICEMCS',250,1);
INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('MATHEMATICS','SANKALP','MORNING STAR','ICEMME',260,1);
INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('HARRY POTTER','J.K.ROWLING','BLOOMSBURY','NOVEL',450,1);
INSERT INTO BOOKS (BOOK_NAME, AUTHER, PUBLISHER, CATEGORY, COST, CREATED_BY) VALUES ('RAINY DAYS','J.K.ROWLING','BLOOMSBURY','NOVEL',450,1);
COMMIT;

-- deleting a record (as long as when no child record exists)
DELETE FROM BOOKS WHERE BOOK_NAME = 'RAINY DAYS';
COMMIT;




--------------------------------------------------


CREATE TABLE BOOKS_PURCHASE(
	PUR_SEQ_ID			NUMBER PRIMARY KEY,
	PURCHASE_DATE		DATE DEFAULT SYSDATE NOT NULL,
	BOOK_ID				NUMBER NOT NULL CONSTRAINT BK_PUR_BK_ID_FK REFERENCES BOOKS,
	QUANTITY			NUMBER NOT NULL,
	CREATED_ON			DATE DEFAULT SYSDATE,
	CREATED_BY			NUMBER CONSTRAINT BK_PUR_CRB_FK REFERENCES USERS_MASTER,
	LAST_MODIFIED_ON	DATE,
	LAST_MODIFIED_BY	NUMBER CONSTRAINT BK_PUR_LMB_FK REFERENCES USERS_MASTER
);

CREATE OR REPLACE TRIGGER  BIU_BOOKS_PURCHASE
before insert or update on BOOKS_PURCHASE for each row  
begin   
  IF INSERTING THEN 
	IF :NEW.PUR_SEQ_ID IS NULL THEN
		SELECT NVL(MAX(PUR_SEQ_ID),0) + 1
		INTO   :NEW.PUR_SEQ_ID
		FROM   BOOKS_PURCHASE;
	END IF;
  END IF;
  IF UPDATING THEN 
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO BOOKS_PURCHASE (PURCHASE_DATE, BOOK_ID, QUANTITY) VALUES (TO_DATE('01-06-2022','DD-MM-YYYY'), 1, 100);
INSERT INTO BOOKS_PURCHASE (PURCHASE_DATE, BOOK_ID, QUANTITY) VALUES (TO_DATE('02-06-2022','DD-MM-YYYY'), 2, 100);
INSERT INTO BOOKS_PURCHASE (PURCHASE_DATE, BOOK_ID, QUANTITY) VALUES (TO_DATE('02-06-2022','DD-MM-YYYY'), 3, 75);
INSERT INTO BOOKS_PURCHASE (PURCHASE_DATE, BOOK_ID, QUANTITY) VALUES (TO_DATE('05-06-2022','DD-MM-YYYY'), 4, 100);
INSERT INTO BOOKS_PURCHASE (PURCHASE_DATE, BOOK_ID, QUANTITY) VALUES (TO_DATE('05-06-2022','DD-MM-YYYY'), 5, 50);
COMMIT;






---------------------------------------------------


CREATE TABLE BOOKS_ISSUE(
	ISSUE_SEQ_ID		NUMBER PRIMARY KEY,
	ISSUE_DATE			DATE DEFAULT SYSDATE NOT NULL ,
	AC_YEAR				VARCHAR2(6),
	STUDENT_ID			NUMBER NOT NULL CONSTRAINT BK_ISSUE_STU_ID_FK REFERENCES STUDENTS,
	BOOK_ID				NUMBER NOT NULL CONSTRAINT BK_ISSUE_BK_ID_FK REFERENCES BOOKS,
	REMARKS				VARCHAR2(200),
	CREATED_ON			DATE DEFAULT SYSDATE,
	CREATED_BY			NUMBER CONSTRAINT BK_ISSUE_CRB_FK REFERENCES USERS_MASTER,
	LAST_MODIFIED_ON	DATE,
	LAST_MODIFIED_BY	NUMBER CONSTRAINT BK_ISSUE_LMB_FK REFERENCES USERS_MASTER
);


CREATE OR REPLACE TRIGGER  BIU_BOOKS_ISSUE
before insert or update on BOOKS_ISSUE for each row  
DECLARE
begin   
  IF INSERTING THEN 
	IF :NEW.ISSUE_SEQ_ID IS NULL THEN
		SELECT NVL(MAX(ISSUE_SEQ_ID),0) + 1
		INTO   :NEW.ISSUE_SEQ_ID
		FROM   BOOKS_ISSUE;
	END IF;
  END IF;
  IF UPDATING THEN 
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO BOOKS_ISSUE (ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('01-07-2022','DD-MM-YYYY'), '202223', 1, 1);
INSERT INTO BOOKS_ISSUE (ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('01-08-2022','DD-MM-YYYY'), '202223', 1, 2);
INSERT INTO BOOKS_ISSUE (ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('06-07-2022','DD-MM-YYYY'), '202223', 2, 2);
INSERT INTO BOOKS_ISSUE (ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('05-08-2022','DD-MM-YYYY'), '202223', 2, 1);
INSERT INTO BOOKS_ISSUE (ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('08-07-2022','DD-MM-YYYY'), '202223', 3, 3);
COMMIT;




---------------------------------------------------

CREATE TABLE BOOKS_RETURN (
	RETURN_SEQ_ID		NUMBER PRIMARY KEY,
	RETURN_DATE			DATE DEFAULT SYSDATE NOT NULL,
	AC_YEAR				VARCHAR2(6),
	STUDENT_ID			NUMBER NOT NULL CONSTRAINT BK_RETURN_STU_ID_FK REFERENCES STUDENTS,
	BOOK_ID				NUMBER NOT NULL CONSTRAINT BK_RETURN_BK_ID_FK REFERENCES BOOKS,
	REMARKS				VARCHAR2(200),
	CREATED_ON			DATE DEFAULT SYSDATE,
	CREATED_BY			NUMBER CONSTRAINT BK_RETURN_MAST_CRB_FK REFERENCES USERS_MASTER,
	LAST_MODIFIED_ON	DATE,
	LAST_MODIFIED_BY	NUMBER CONSTRAINT BK_RETURN_MAST_LMB_FK REFERENCES USERS_MASTER
);

CREATE OR REPLACE TRIGGER  BIU_BOOKS_RETURN
before insert or update on BOOKS_RETURN for each row
begin   
  IF INSERTING THEN 
	IF :NEW.RETURN_SEQ_ID IS NULL THEN
		SELECT NVL(MAX(RETURN_SEQ_ID),0) + 1
		INTO   :NEW.RETURN_SEQ_ID
		FROM   BOOKS_RETURN;
	END IF;
  END IF;
  IF UPDATING THEN 
    :NEW.LAST_MODIFIED_ON    := SYSDATE; 
  END IF; 
end;
/

INSERT INTO BOOKS_RETURN (RETURN_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('20-07-2022','DD-MM-YYYY'), '202223', 1, 1);
INSERT INTO BOOKS_RETURN (RETURN_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('08-08-2022','DD-MM-YYYY'), '202223', 1, 2);
INSERT INTO BOOKS_RETURN (RETURN_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('26-07-2022','DD-MM-YYYY'), '202223', 2, 2);
INSERT INTO BOOKS_RETURN (RETURN_DATE, AC_YEAR, STUDENT_ID, BOOK_ID) VALUES (TO_DATE('15-08-2022','DD-MM-YYYY'), '202223', 2, 1);
COMMIT;

--------------------------------------------------------------------------------------------------------









=======================
REPORTS
=======================


-- SHOW LIST OF STUDENTS
SET LINESIZE 1000
COLUMN STUDENT_NAME FORMAT A15
SELECT * FROM STUDENTS;

-- SHOW LIST OF BOOKS
SET LINESIZE 1000
COLUMN BOOK_NAME FORMAT A15
COLUMN AUTHER FORMAT A15
COLUMN PUBLISHER FORMAT A15
COLUMN CATEGORY FORMAT A15
SELECT * FROM BOOKS;

-- SHOW LIST OF BOOKS PURCHASED
SET LINESIZE 1000
SELECT * FROM BOOKS_PURCHASE;

-- SHOW LIST OF BOOKS ISSUED
SELECT ISSUE_SEQ_ID,ISSUE_DATE, AC_YEAR, STUDENT_ID, BOOK_ID FROM BOOKS_ISSUE;

-- SHOW LIST OF BOOKS RETURNED
SELECT RETURN_SEQ_ID, RETURN_DATE, AC_YEAR, STUDENT_ID, BOOK_ID FROM BOOKS_RETURN;


-- BOOKS STOCK STATEMENT
SELECT B.BOOK_ID, B.BOOK_NAME, B.AUTHER, B.CATEGORY, BP.PUR_QTY, BI.ISSUE_QTY, BR.RETURN_QTY,
	   (NVL(BP.PUR_QTY,0) - NVL(BI.ISSUE_QTY,0) + NVL(BR.RETURN_QTY,0)) AS STOCK_QTY
FROM   BOOKS B
LEFT   JOIN (SELECT BOOK_ID, SUM(QUANTITY)  AS PUR_QTY FROM BOOKS_PURCHASE GROUP BY BOOK_ID) BP ON (B.BOOK_ID = BP.BOOK_ID)
LEFT   JOIN (SELECT BOOK_ID, COUNT(BOOK_ID) AS ISSUE_QTY FROM BOOKS_ISSUE GROUP BY BOOK_ID) BI ON (B.BOOK_ID = BI.BOOK_ID)
LEFT   JOIN (SELECT BOOK_ID, COUNT(BOOK_ID) AS RETURN_QTY FROM BOOKS_RETURN GROUP BY BOOK_ID) BR ON (B.BOOK_ID = BR.BOOK_ID);



SET LINESIZE 1000
COLUMN BOOK_NAME FORMAT A15
COLUMN AUTHER FORMAT A15
COLUMN CATEGORY FORMAT A15
COLUMN STUDENT_NAME FORMAT A15
COLUMN SECTION FORMAT A3




-- LIST OF STUDENTS HOLDING BOOKS FOR MORE THAN 15 DAYS
SELECT BI.BOOK_ID, B.BOOK_NAME, B.AUTHER, B.CATEGORY, BI.STUDENT_ID, ST.STUDENT_NAME, ST.ROLL_NO, ST.STANDARD, ST.SECTION, BI.ISSUE_DATE, FLOOR(SYSDATE - BI.ISSUE_DATE) AS HOLD_DURATION
FROM   BOOKS_ISSUE BI
JOIN   BOOKS B ON BI.BOOK_ID = B.BOOK_ID
JOIN   STUDENTS ST ON BI.STUDENT_ID = ST.STUDENT_ID
WHERE  ISSUE_SEQ_ID = (SELECT MAX(ISSUE_SEQ_ID) FROM BOOKS_ISSUE WHERE BOOK_ID = BI.BOOK_ID)
	   AND (BI.BOOK_ID, BI.STUDENT_ID) IN (
			SELECT A.BOOK_ID, A.STUDENT_ID
			FROM   (SELECT BOOK_ID, STUDENT_ID, COUNT(BOOK_ID) AS ISSUE_QTY FROM BOOKS_ISSUE GROUP BY BOOK_ID,STUDENT_ID) A
			LEFT   JOIN (SELECT BOOK_ID, STUDENT_ID, COUNT(BOOK_ID) AS RETURN_QTY FROM BOOKS_RETURN GROUP BY BOOK_ID,STUDENT_ID) BR ON (A.BOOK_ID = BR.BOOK_ID AND A.STUDENT_ID = BR.STUDENT_ID)
			WHERE  A.ISSUE_QTY - NVL(BR.RETURN_QTY,0) > 0
		)
		AND FLOOR(SYSDATE - BI.ISSUE_DATE) > 15
;







