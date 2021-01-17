<?php 

require_once('../../private/initialize.php');

$id = $_GET['id'];

if (is_post_request()) {

	$employee = [];
	$employee['first_name'] = $_POST['first_name'] ?? '';
	$employee['last_name'] = $_POST['last_name'] ?? '';
	$employee['email'] = $_POST['email'] ?? '';
	$employee['mobile_no'] = $_POST['mobile_no'] ?? '';
	$employee['salary'] = $_POST['salary'];
	$employee['dob'] = $_POST['dob'] ?? '';

	$result = update_employee($id, $employee);


	if($result === true) {
		// $new_id = mysqli_insert_id($db);
		redirect_to(url_for('/employee/show.php?id=' . $id));
	} else {
		$errors = $result;
	}


} else {

    $employee = find_employee_by_id($id);
    
}

?>

<?php $page_title = 'Edit Employee'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

	<a class="btn btn-info" href="<?= url_for('/index.php'); ?>">&laquo; Back to Employee List</a>

	<div class="Edit employee">
		<h1>Add Employee</h1>

		<form class="container" action="<?php echo url_for('/employee/edit.php?id=' . $employee['id']); ?>" method="post">
            <div class="row">
                <div class="col">
                    <label class="form-control-label" for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $employee['first_name']; ?>">
                </div>
                <div class="col">
                    <label class="form-control-label" for="last_name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $employee['last_name']; ?>">
                </div>
            </div>
        <div class="row">
            <div class="col">
                <label class="form-control-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $employee['email']; ?>">
            </div>
            <div class="col">
                <label class="form-control-label" for="mobile_no">Mobile No</label>
                <input class="form-control" type="text" name="mobile_no" id="mobile_no" value="<?php echo $employee['mobile_no']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-control-label" for="salary">Salary</label>
                <input class="form-control" type="number" name="salary" id="salary" value="<?php echo $employee['salary']; ?>">
            </div>
            <div class="col">
                <label class="form-control-label" for="dob">Date of Birth</label>
                <input class="form-control" type="date" name="dob" id="dob" value="<?php echo $employee['dob']; ?>">
            </div>
        </div>
        <div class="row">
            <input class="btn btn-info" type="submit" value="Save"> 
        </div>
			
		</form>
	</div>
	
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>