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

	<!-- Sweetalert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
</body>

</html>


<?php

include_once("includes/config.php");

// ADD EMPLOYEES
if (isset($_POST['add_employee'])) {
	$surname = htmlspecialchars($_POST['surname']);
	$given_name = htmlspecialchars($_POST['given-name']);
	$middle_name = htmlspecialchars($_POST['middle-name']);
	$suffix = htmlspecialchars($_POST['suffix']);
	$gender = htmlspecialchars($_POST['gender']);
	$age = htmlspecialchars($_POST['age']);
	$contact_number = htmlspecialchars($_POST['contact-number']);
	$department = htmlspecialchars($_POST['department']);
	$employee_id = htmlspecialchars($_POST['employee-id']);
	$joining_date = htmlspecialchars($_POST['joining-date']);
	$schedule_in = htmlspecialchars($_POST['schedule-in']);
	$schedule_out = htmlspecialchars($_POST['schedule-out']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm-password']);

	// GRAB PICTURES
	$file = $_FILES['picture']['name'];
	$file_loc = $_FILES['picture']['tmp_name'];
	$folder = "employees/";
	$new_file_name = strtolower($file);
	$final_file = str_replace(' ', '-', $new_file_name);

	if (move_uploaded_file($file_loc, $folder . $final_file) && ($password == $confirm_password)) {
		$image = $final_file;
		$password = password_hash($password, PASSWORD_DEFAULT);
	}

	$sql = "INSERT INTO `employees` (`id`, `surname`, `given_name`, `middle_name`, `suffix`, `gender`, `age`, `contact_number`, `department`, `employee_id`, `email`, `password`, `joining_date`, `schedule_in`, `schedule_out`, `pics`, `date_created`) 
		VALUES (NULL, :surname, :given_name, :middle_name, :suffix, :gender, :age, :contact_number, :department, :employee_id, :email, :password, :joining_date, :schedule_in, :schedule_out, :pics, current_timestamp())";

	$query = $dbh->prepare($sql);
	$query->bindParam(':surname', $surname, PDO::PARAM_STR);
	$query->bindParam(':given_name', $given_name, PDO::PARAM_STR);
	$query->bindParam(':middle_name', $middle_name, PDO::PARAM_STR);
	$query->bindParam(':suffix', $suffix, PDO::PARAM_STR);
	$query->bindParam(':gender', $gender, PDO::PARAM_STR);
	$query->bindParam(':age', $age, PDO::PARAM_STR);
	$query->bindParam(':contact_number', $contact_number, PDO::PARAM_STR);
	$query->bindParam(':department', $department, PDO::PARAM_STR);
	$query->bindParam(':employee_id', $employee_id, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->bindParam(':joining_date', $joining_date, PDO::PARAM_STR);
	$query->bindParam(':schedule_in', $schedule_in, PDO::PARAM_STR);
	$query->bindParam(':schedule_out', $schedule_out, PDO::PARAM_STR);
	$query->bindParam(':pics', $image, PDO::PARAM_STR);
	$query->execute();

	$lastInsert = $dbh->lastInsertId();
	if ($lastInsert > 0) {
		echo '<script>
		setTimeout(function(){
			Swal.fire({
				title: "Registration Successful!",
				text: "Please proceed to biometrics registration to complete your account registration.",
				icon: "success",
				confirmButtonText: "OK"
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = "employees-list.php";
				}
			});
		}, 500);
	</script>';
	} else {
		echo '<script>
            Swal.fire({
                title: "Error!",
                text: "Operation failed. Please try again.",
                icon: "error",
                confirmButtonText: "OK"
            });
        </script>';
	}
}
