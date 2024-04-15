-- Create a database
create database test;
use test;

-- Create tables for storing .csv file
create table departments(
department_id INT Primary Key,
department_name VARCHAR(50),
location VARCHAR(50),
manager_id INT);

create table if not exists employees(
emp_id INT Primary Key,
first_name VARCHAR(50),
last_name VARCHAR(50),
salary DECIMAL,
department_id int,
foreign key (department_id) references departments(department_id));


create table projects(
project_id INT Primary Key,
project_name VARCHAR(50),
budget DECIMAL,
start_date DATE,
end_date DATE);

-- Paste the path of .csv files in the apostrophes.
load data infile 'D:\\2201CS84_CS260-main\\tut07\\departments.csv' into table departments
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile 'D:\\2201CS84_CS260-main\\tut07\\employees.csv' into table employees
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile 'D:\\2201CS84_CS260-main\\tut07\\projects.csv' into table projects
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

-- Question 1
DELIMITER //
CREATE PROCEDURE GetAverageSalaryByDept(IN dept_id INT)
BEGIN
  SELECT AVG(salary) AS avg_salary 
  FROM employees
  WHERE department_id = dept_id;
END //
DELIMITER ;

-- CALL GetAverageSalaryByDept(department_id);

-- Question 2
DELIMITER //
CREATE PROCEDURE UpdateSalaryByPercentage(IN employee_id INT, IN percentage DECIMAL(5,2))
BEGIN
	UPDATE employees
    SET salary = salary * (1 + (percentage / 100))
    WHERE emp_id = employee_id;
END //
DELIMITER ;
-- call UpdateSalaryByPercentage(emp_id, percentage);
-- select * from employees;

-- Question 3
DELIMITER //
CREATE PROCEDURE ListEmployeesInDepartment(IN department_name VARCHAR(100))
BEGIN
    SELECT *
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id
    WHERE d.department_name = department_name;
END //
DELIMITER ;
-- call ListEmployeesInDepartment('Engineering');

-- Question 4
DELIMITER //
CREATE PROCEDURE CalculateTotalProjectBudget(IN proj_name VARCHAR(100))
BEGIN
    SELECT SUM(budget) AS total_budget
    FROM projects
    WHERE project_name = proj_name;
END //
DELIMITER ;
-- call CalculateTotalProjectBudget('ProjectA');

-- Question 5
DELIMITER //
CREATE PROCEDURE FindEmployeeWithHighestSalary(IN dept_name VARCHAR(100))
BEGIN
    SELECT MAX(salary) AS highest_salary
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id
    WHERE d.department_name = dept_name;
END //
DELIMITER ;
-- call FindEmployeeWithHighestSalary('Engineering');

-- Question 6
DELIMITER //
CREATE PROCEDURE ListProjectsEndingSoon(IN days INT)
BEGIN
    SELECT *
    FROM projects
    WHERE DATEDIFF(end_date, CURDATE()) <= days;
END //
DELIMITER ;
-- call ListProjectsEndingSoon(0);

-- Question 7
DELIMITER //
CREATE PROCEDURE CalculateTotalSalaryExpenditure(IN dept_name VARCHAR(100))
BEGIN
    SELECT SUM(salary) AS total_salary
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id
    WHERE d.department_name = dept_name;
END //
DELIMITER ;
-- call CalculateTotalSalaryExpenditure('Finance');

-- Question 8
DELIMITER //
CREATE PROCEDURE GenerateEmployeeReport()
BEGIN
    SELECT e.emp_id, e.first_name, e.last_name, e.salary, d.department_name
    FROM employees e
    JOIN departments d ON e.department_id = d.department_id;
END //
DELIMITER ;
-- call GenerateEmployeeReport();

-- Question 9
DELIMITER //
CREATE PROCEDURE FindProjectWithHighestBudget()
BEGIN
    SELECT project_name, budget AS highest_budget
    FROM projects
    ORDER BY budget DESC
    LIMIT 1;
END //
DELIMITER ;
-- drop procedure FindProjectWithHighestBudget;
-- call FindProjectWithHighestBudget();

-- Question 10
DELIMITER //
CREATE PROCEDURE CalculateOverallAverageSalary()
BEGIN
    SELECT AVG(salary) AS avg_salary
    FROM employees;
END //
DELIMITER ;
-- call FindProjectWithHighestBudget();

-- Question 11
DELIMITER //
CREATE PROCEDURE AssignNewManager(IN department_id INT, IN new_manager_id INT)
BEGIN
    UPDATE departments
    SET manager_id = new_manager_id
    WHERE department_id = department_id;
END //
DELIMITER ;

-- Question 12
DELIMITER //
CREATE PROCEDURE AssignNewManager(IN departt_id INT, IN new_manager_id INT)
BEGIN
    UPDATE departments
    SET manager_id = new_manager_id
    WHERE department_id = departt_id;
END //
DELIMITER ;
-- call AssignNewManager(1, 1);

-- question 13
DELIMITER //
CREATE PROCEDURE CalculateRemainingBudget(IN proj_name VARCHAR(100))
BEGIN
    SELECT budget AS remaining_budget
    FROM projects
    WHERE project_name = proj_name;
END //
DELIMITER ;
-- call CalculateRemainingBudget('ProjectA');

-- Question 14
DELIMITER //
CREATE PROCEDURE UpdateProjectEndDate(IN proj_id INT, IN duration INT)
BEGIN
    UPDATE projects
    SET end_date = DATE_ADD(start_date, INTERVAL duration DAY)
    WHERE project_id = proj_id;
END //
DELIMITER ;
-- call UpdateProjectEndDate(1, 2);

-- Question 15
DELIMITER //
CREATE PROCEDURE CalculateTotalEmployeesPerDepartment()
BEGIN
    SELECT d.department_name, COUNT(e.emp_id) AS total_employees
    FROM departments d
    LEFT JOIN employees e ON d.department_id = e.department_id
    GROUP BY d.department_name;
END //
DELIMITER ;
-- call CalculateTotalEmployeesPerDepartment();
