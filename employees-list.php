<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
include_once("includes/functions.php");
if (strlen($_SESSION['userlogin']) == 0) {
	header('location:login.php');
} elseif (isset($_GET['delid'])) {
	$rid = intval($_GET['delid']);
	$sql = "DELETE from employees where id=:rid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':rid', $rid, PDO::PARAM_STR);
	$query->execute();
	echo "<script>alert('Employee Has Been Deleted');</script>";
	echo "<script>window.location.href ='employees-list.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="This is a Philippine Cancer Center HR Management System">
	<meta name="keywords" content="PCC-HRMS, HRMS, Human Resource, Capstone, System, HR">
	<meta name="author" content="Heionim">
	<meta name="robots" content="noindex, nofollow">
	<title>PCC HRMS</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/pcc-logo.svg">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<style>
		body {
			background-color: #D4DEDB;
		}

		.body-container {
			background-color: #FAFAFA;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
		}

		table {
			text-align: center;
		}

		.employee-id-cell {
			/* border: 1px solid #000000; */
			box-shadow: 0px 4px 4px 0px #00000040;
			background: linear-gradient(0deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
				linear-gradient(0deg, #BAF4BD, #BAF4BD);
			padding: 10px 0;
			margin: 0;
		}

		.btn-blue {
			background-color: #0D6EFD;
		}
	</style>
</head>

<body>
	<div class="main-wrapper">

		<?php include_once("includes/header.php"); ?>
		<?php include_once("includes/sidebar.php"); ?>

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="body-container">


					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Manage Employees</h3>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
								<div class="view-icons">
									<a href="employees.php" title="Grid View" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
									<a href="employees-list.php" title="Tabular View" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Employee ID</th>
											<th>Email</th>
											<th>Phone Number</th>
											<th class="text-nowrap">Join Date</th>
											<th>Time Schedule</th>
											<th class="text-right no-sort">Action</th>
										</tr>
									</thead>
									<?php
									$sql = "SELECT * FROM employees";
									$query = $dbh->prepare($sql);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {
									?>
											<tbody>
												<tr>
													<td class="text-left">
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar"><img alt="picture" src="employees/<?php echo htmlentities($row->pics); ?>"></a>
															<a href="profile.php"><?php echo htmlentities($row->surname) . " " . htmlentities($row->middle_name) . " " . htmlentities($row->given_name);; ?><span><?php echo htmlentities($row->department); ?></span></a>
														</h2>
													</td>
													<td>
														<p class="employee-id-cell"><?php echo htmlentities($row->employee_id); ?></p>
													</td>

													<td><?php echo htmlentities($row->email); ?></td>
													<td><?php echo htmlentities($row->contact_number); ?></td>
													<td><?php echo htmlentities($row->joining_date); ?></td>
													<td>
														<?php
														// FORMAT TIME DISPLAY
														$schedule_in = strtotime($row->schedule_in);
														$schedule_out = strtotime($row->schedule_out);

														echo date('h:i A', $schedule_in) . " - " . date('h:i A', $schedule_out);
														?>
													</td>

													<td class="text-right">
														<a href="#" data-toggle="modal" data-target="#edit_employee" title="Edit" class="btn text-xs text-white btn-blue action-icon"><i class="fa fa-pencil"></i></a>
														<a href="#" data-toggle="modal" data-target="#delete_employee" title="Delete" class="btn text-xs text-white btn-danger action-icon"><i class="fa fa-trash-o"></i></a>
													</td>




												</tr>
											</tbody>
									<?php $cnt += 1;
										}
									} ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Add Employee Modal -->
			<?php include_once("includes/modals/employee/add_employee.php"); ?>

			<!-- Edit Employee Modal -->
			<?php include_once("includes/modals/employee/edit_employee.php"); ?>

			<!-- Delete Employee Modal -->
			<?php include_once("includes/modals/employee/delete_employee.php"); ?>

		</div>
	</div>

	<!-- jQuery -->
	<script src=" assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>

	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>