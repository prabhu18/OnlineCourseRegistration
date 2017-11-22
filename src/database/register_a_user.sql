CREATE DEFINER=`yuruk`@`%` PROCEDURE `register_a_user`(
IN netID VARCHAR(45),
IN name varchar(45),
IN userPassword varchar(300),
IN degree varchar(45),
IN major varchar(45),
IN phone varchar(45),
IN email varchar(45),
IN gender varchar(1)
)
BEGIN
	
    declare net_id_flag int default 0;
    declare user_id_flag int default 0;
    
    select count(*)>0 into net_id_flag from cr_university
    where net_id= netID;
    
    select count(*)>0 into user_id_flag from cr_student
    where user_id= netID;
    
    
    
    if net_id_flag = 1  and user_id_flag =0 then
    
		insert into cr_student(user_id,password,name,degree,major,registration_time,phone,email,gender)
        values(netID,userPassword,name,degree,major,current_timestamp(),phone,email,gender);
        select 'registration complete' as result;
        
    else
    
		if user_id_flag = 1 then
			select 'net id already present' as result;
		else
			select 'net id not present in university system' as result;
            
		end if;
    
    end if;

END