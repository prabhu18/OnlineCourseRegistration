CREATE DEFINER=`yuruk`@`%` PROCEDURE `enroll_my_class`(
IN cartID varchar(10)
)
BEGIN

	DECLARE finished INTEGER DEFAULT 0;
	DECLARE var_course_id,var_instructor_id,var_semester_id varchar(10) DEFAULT 0;


	DECLARE cursor_register CURSOR FOR 
	SELECT course_id,instructor_id,semester FROM cr_cart
	WHERE cart_id = cartID;


	DECLARE CONTINUE HANDLER 
	FOR NOT FOUND SET finished = 1;


	DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		ROLLBACK;
	END;
	
	
	START TRANSACTION;
	
	OPEN cursor_register;
	
		cart_items: LOOP

			FETCH cursor_register INTO var_course_id,var_instructor_id,var_semester_id;

			IF finished = 1 THEN 
				LEAVE cart_items;
			END IF;
            
            select var_course_id,cartID ,var_instructor_id,var_semester_id;
			insert into  cr_course_student_instructor(course_id,student_id,instructor_id,semester)
			values(var_course_id,cartID,var_instructor_id,var_semester_id);
			
		
		END LOOP cart_items;

    CLOSE cursor_register;
	
	DELETE a.* FROM cr_cart a WHERE cart_id=cartID;
    
    SELECT 'Registration Complete' as result;


	COMMIT;
    
    
END
