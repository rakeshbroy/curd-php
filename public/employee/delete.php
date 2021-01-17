<?php 

require_once('../../private/initialize.php'); 

$id = $_GET['id'];


if(is_post_request()) {

	$result = delete_employee($id);
	redirect_to(url_for('/index.php'));
	
} else {
	
	$employee = find_employee_by_id($id);

}

?>


<?php $page_title = "Delete Employee"; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


<div id="content">
	<a class="btn btn-info" href="<?php echo url_for('/index.php'); ?>" class="back-link">&laquo;Back to List</a>

	<div class="employee delete">
		<h1>Delete Employee</h1>
		<p>Are you sure you want to delete this employee?</p>
		<p class="item"><?php echo $employee['email']; ?></p>

		<form action="<?php echo url_for('/employee/delete.php?id=' . $employee['id']); ?>" method="post">

			<div id="operations">
				<input class="btn btn-info" type="submit" name="commit" value="Delete Employee">
			</div>
		</form>
	</div>

</div>


<?php require_once(SHARED_PATH . '/public_footer.php'); ?>