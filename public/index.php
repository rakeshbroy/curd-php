<?php include_once('../private/initialize.php'); ?>

<?php $page_title = "CURD Operations"; ?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>

<h1>Employees</h1>

<a href="<?= url_for('/employee/create.php'); ?>" class="btn btn-info">Add</a>

<?php $employees = find_all_employee(); ?>
<table class="table">
    <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Mobile No</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php while($employee = mysqli_fetch_assoc($employees)) { ?>
        <tr>
            <td><?= $employee['id'] ?></td>
            <td><?= $employee['first_name'] ?></td>
            <td><?= $employee['last_name'] ?></td>
            <td><?= $employee['mobile_no'] ?></td>
            <td><a class="btn btn-info" href="<?= url_for('/employee/show.php?id=' . $employee['id']); ?>">Show</a></td>
            <td><a class="btn btn-info" href="<?= url_for('/employee/edit.php?id=' . $employee['id']); ?>">Edit</a></td>
            <td><a class="btn btn-info" href="<?= url_for('/employee/delete.php?id=' . $employee['id']); ?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>

<?php include_once(SHARED_PATH . '/public_footer.php'); ?>
