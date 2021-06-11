-- the first table will cover the employee information

CREATE TABLE public.employee (
	employee_id		    SERIAL NOT NULL PRIMARY KEY UNIQUE,							-- id for the employee
	employee_name		varchar(50) NOT NULL UNIQUE,								-- name for the employee
	employee_password	varchar(50) NOT NULL,							         	-- employee password
);



-- the next table will contain the time information

CREATE TABLE public.timeclock (
	t_emp_id			tinyint REFERENCES public.employee(employee_id),			-- id of the employee clocking in/out
	clock_in_day		date (0) NOT NULL,											-- date the employee clocks in
	clock_in			time (0) NOT NULL,								    		-- time the employee clocks in
	clock_out_day		date (0) NOT NULL,											-- date the employee clocks out
	clock_out			time (0) NOT NULL,											-- time the employee clocks out
);



-- the third table will contain the manager information

CREATE TABLE public.manager (
	manager_id			SERIAL NOT NULL PRIMARY KEY UNIQUE,							-- id for the manager
	manager_name		varchar(50) NOT NULL UNIQUE,								-- name for the manager
	manager_password	varchar(50) NOT NULL,							         	-- manager password
	m_emp_id			tinyint REFERENCES public.timeclock(t_emp_id),		    	-- id of the employee being summarized
	m_emp_in			time REFERENCES public.timeclock(clock_in),   				-- clock in time of the employee
	m_emp_out			time REFERENCES public.timeclock(clock_out),				-- clock out time of the employee
);



