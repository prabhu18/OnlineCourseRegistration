CREATE DEFINER=`yuruk`@`%` FUNCTION `verify_my_cart`( cartID VARCHAR(11)) RETURNS int(11)
BEGIN


-- 0 : everything is ok
-- 1 : cart contains more than 3 value
-- 2 : duplicate courses in same semester
-- 4 : cart contains past semester courses
-- 5 : one or many courses has been filled



	DECLARE finished INTEGER DEFAULT 0;
	DECLARE var_course_id,var_instructor_id,var_semester_id varchar(10) DEFAULT 0;

	DECLARE inflag INT DEFAULT 0;

	DECLARE cursor_verify CURSOR FOR 
	SELECT course_id,instructor_id,semester FROM cr_cart
	WHERE cart_id = cartID;


	DECLARE CONTINUE HANDLER 
	FOR NOT FOUND SET finished = 1;


	select count(*)>3 INTO inflag from cr_cart where cart_id = cartID;

	if inflag = 0 then 
    
		OPEN cursor_verify;
	
		cart_verification: LOOP
        
			FETCH cursor_verify INTO var_course_id,var_instructor_id,var_semester_id;

			IF finished = 1 THEN 
			
				LEAVE cart_verification;
			
            END IF;
            
            select count(*)>0 into inflag from cr_course_student_instructor
            where student_id=cartID and course_id=var_course_id
            and semester=var_semester_id;
            
            if inflag = 1 THEN
            
				return 2 ;
			
            else
            
				select count(*)>0 into inflag from cr_course_enrollment
                where course_id=var_course_id and instructor_id=var_instructor_id
                and semester=var_semester_id and curr_Sem =0;
                
                if inflag=1 then
                
					return 4;
				
                else 
						select count(*)>0 into inflag from cr_course_enrollment
						where course_id=var_course_id and instructor_id=var_instructor_id
						and semester=var_semester_id and remaining_seats =0;
                        
                        if  inflag = 1 then
                        
							return 5;
                            
						end if;
                
                end if;
                
            end if;
            

		END LOOP cart_verification;

		CLOSE cursor_verify;

		return 0;
	else
		return 1;

	end if;


END