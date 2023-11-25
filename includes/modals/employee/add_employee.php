<?php $set = '1234567890';
$employee_id = substr(str_shuffle($set), 0, 6); ?>

<div id="add_employee" class="modal custom-modal fade " role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="surname">Surname <span class="text-danger">*</span></label>
							<input name="surname" class="form-control" type="text" placeholder="Surname">
						</div>
						<div class="form-group col-md-3">
							<label for="given-name">Given name</label>
							<input name="given-name" class="form-control" type="text" placeholder="Given Name">
						</div>
						<div class="form-group col-md-3">
							<label for="middle-name">Middle Name</label>
							<input type="text" class="form-control" name="middle-name" placeholder="Middle Name" placeholder="Middle Name">
						</div>
						<div class="form-group col-md-3">
							<label for="suffix">Suffix <span class="text-danger">*</span></label>
							<select class="form-control select" name="suffix">
								<option disabled selected>Select Suffix</option>
								<option>Mr.</option>
								<option>Mrs.</option>
								<option>Ms.</option>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="gender">Gender</label>
							<select class="form-control select" name="gender">
								<option disabled selected>Select Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Others</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="age">Age</label>
							<input type="number" class="form-control" name="age" placeholder="Age">
						</div>
						<div class="form-group col-md-3">
							<label for="contact-number">Contact Number</label>
							<input type="tel" class="form-control" name="contact-number" placeholder="Contact Number">
						</div>
						<div class="form-group col-md-3">
							<label for="department">Department <span class="text-danger">*</span></label>
							<select class="form-control select" name="department">
								<option disabled selected>Select Department</option>
								<option>Human Resource</option>
								<option>Equipment Inventory</option>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-sm-3">
							<label for="employee-id">Employee ID <span class="text-danger">*</span></label>
							<input name="employee-id" type="text" value="<?php echo 'EMP-' . $employee_id; ?>" class="form-control" readonly>
						</div>
						<div class="form-group col-md-3">
							<label for="joining-date">Joining Date</label>
							<input type="date" class="form-control" name="joining-date">
						</div>
						<div class="form-group col-md-3">
							<label for="schedule-in">Schedule-In Time</label>
							<input type="time" class="form-control" name="schedule-in">
						</div>
						<div class="form-group col-md-3">
							<label for="schedule-out">Schedule-Out Time</label>
							<input type="time" class="form-control" name="schedule-out">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="email">Email <span class="text-danger">*</span></label>
							<input name="email" class="form-control" type="email">
						</div>
						<div class="form-group col-md-4">
							<label for="password">Password</label>
							<input class="form-control" name="password" type="password">
						</div>
						<div class="form-group col-md-4">
							<label for="confirm-password">Confirm Password</label>
							<input class="form-control" name="confirm-password" type="password">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label class="col-form-label">Employee Picture</label>
							<input class="form-control" name="picture" type="file">
						</div>
					</div>

					<div class="submit-section">
						<button type="submit" name="add_employee" class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>