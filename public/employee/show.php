<?php

require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1';

$employee = find_employee_by_id($id);

?>

<?php $page_title = 'Show employee'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

	<a class="btn btn-info" href="<?= url_for('/index.php'); ?>">&laquo;Back to List</a>
	<div class="employee show">
		<h1>Email: <?php echo $employee['email']; ?></h1>

		<div class="attributes">
			<dl>
				<dt>First Name</dt>
				<dd><?php echo $employee['first_name']; ?></dd>
			</dl>
			<dl>
				<dt>Last Name</dt>
				<dd><?php echo $employee['last_name']; ?></dd>
			</dl>
			<dl>
				<dt>Email</dt>
				<dd><?php echo $employee['email']; ?></dd>
			</dl>
			<dl>
				<dt>Mobile No</dt>
				<dd><?php echo $employee['mobile_no']; ?></dd>
			</dl>
			<dl>
				<dt>Salary</dt>
				<dd><?php echo $employee['salary']; ?></dd>
			</dl>
			<dl>
				<dt>Date of Birth</dt>
				<dd><?php echo $employee['dob']; ?></dd>
			</dl>
		</div>
	</div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
