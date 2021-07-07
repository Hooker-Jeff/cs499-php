-- the first table will cover the employee information

CREATE TABLE naf_employee (
	employee_id		    int NOT NULL PRIMARY KEY UNIQUE,							-- id for the employee
	employee_password	varchar(50) NOT NULL,							         	-- employee password
	employee_name		varchar(50) NOT NULL UNIQUE,								-- name for the employee
);



-- the next table will contain the time information

CREATE TABLE timeclock (
	emp_id		    	int REFERENCES naf_employee(employee_id),						-- id of the employee clocking in/out
	clock_in			timestamp (0) NOT NULL,								    		-- time the employee clocks in
	clock_out			timestamp (0) NOT NULL,											-- time the employee clocks out
);



-- the third table will contain the manager information

CREATE TABLE manager (
	manager_id			SERIAL NOT NULL PRIMARY KEY UNIQUE,							-- id for the manager
	manager_password	varchar(50) NOT NULL,							         	-- manager password
	manager_name		varchar(50) NOT NULL UNIQUE,								-- name for the manager
);



