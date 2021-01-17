<?php

// Employee

function find_all_employee() {
    global $db;
    $sql = "select * from employee";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function insert_employee($employee) {

    global $db;

	$sql = "insert into employee ";
	$sql .= "(first_name, last_name, email, mobile_no, salary, dob) ";
	$sql .= "values(";
	$sql .= "'" . db_escape($db, $employee['first_name']) . "', ";
	$sql .= "'" . db_escape($db, $employee['last_name']) . "', ";
	$sql .= "'" . db_escape($db, $employee['email']) . "', ";
	$sql .= "'" . db_escape($db, $employee['mobile_no']) . "', ";
	$sql .= "'" . db_escape($db, $employee['salary']) . "', ";
	$sql .= "'" . db_escape($db, $employee['dob']) . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

function find_employee_by_id($id) {
    global $db;

    $sql = "select * from employee ";
    $sql .= "where id='" . db_escape($db, $id) . "' ";
    $sql .= "limit 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $employee;
}

function update_employee($id, $employee) {

    global $db;
    $sql = "update employee set ";
    $sql .= "first_name='" . $employee['first_name'] . "', ";
    $sql .= "last_name='" . $employee['last_name'] . "', ";
    $sql .= "email='" . $employee['email'] . "', ";
    $sql .= "mobile_no=" . $employee["mobile_no"] . ", ";
    $sql .= "salary=" . $employee["salary"] . ", ";
    $sql .= "dob='" . $employee["dob"] . "' ";
    $sql .= "where id=" . $id;

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return true;
}

function delete_employee($id) {
	global $db;

	$sql = "DELETE FROM employee ";
	$sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);

	if($result) {
		return true;
	} else {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}

?>