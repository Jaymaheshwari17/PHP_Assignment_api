<!-- main content start -->
<div class="main-content">

	<!-- content -->
	<div class="container-fluid content-top-gap">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb my-breadcrumb">
				<li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Users</li>
			</ol>
		</nav>
		<div class="welcome-msg pt-3 pb-4">
			<h1>Hi <span class="text-primary">
					<?php echo $_SESSION['UserData']->username; ?>
				</span>, Welcome back</h1>
			<p>Very detailed & featured admin.</p>
		</div>


		<?php
		// echo "<pre>";
		// print_r("$_SESSION");
		// echo "</pre>";  
		?>



		<div class="container">
			<div class="row">
				<br>
				<div class="col-md-4"></div>
				<div class="col-md-4">

					<div class="card">
						<div class="card-header text-center"> Edit User </div>
						<div class="card-body">

							<?php
							// echo "<pre>";
							// print_r($adituserbyid['Data']);
							// print_r($adituserbyid['Data'][0]->username);
							
							// echo "</pre>";
							
							$fullnamearray = explode(" ", $adituserbyid['Data'][0]->fullname);
							$firname = $fullnamearray[0];
							$lastname = $fullnamearray[1] ?? "";

							?>
							<form method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col">
										<input type="text" placeholder="Enter User Name" class="form-control"
											name="username" value="<?php echo $adituserbyid['Data'][0]->username; ?>"
											id="">
									</div>
								</div>

								<div class="row mt-3">
									<div class="col">
										<input type="text" placeholder="Enter First Name" class="form-control"
											name="fname" value="<?php echo $firname; ?>" id="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<input type="text" placeholder="Enter Last Name" class="form-control"
											name="lname" value="<?php echo $lastname; ?>" id="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<input type="text" placeholder="Enter Date Of Birth" class="form-control"
											name="dob" value="<?php echo $adituserbyid['Data'][0]->dob; ?>" id="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<input type="text" placeholder="Enter Mobile" class="form-control" name="mobile"
											value="<?php echo $adituserbyid['Data'][0]->mobile; ?>" id="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<input type="email" placeholder="Enter Email" class="form-control" name="email"
											value="<?php echo $adituserbyid['Data'][0]->email; ?>" id="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<input type="radio" <?php
										if ($adituserbyid['Data'][0]->gender == "Male") {
											echo "checked";
										}
										?> value="Male" name="gender" id="Male"> <label
											for="Male">Male</label>
										<input type="radio" <?php
										if ($adituserbyid['Data'][0]->gender == "Female") {
											echo "checked";
										} ?> value="Female" name="gender" id="Female"> <label
											for="Female">Female</label>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">

										<?php
										// echo $adituserbyid['Data'][0]->hobby;
										$hobbyarray = explode(",", $adituserbyid['Data'][0]->hobby);
										//   echo "<pre>";
										//   print_r($hobbyarray);
										// in_array("Cricket", $hobbyarray);
										?>
										<label for="Cricket">Hobby :</label>

										<input type="checkbox" <?php if (in_array("Cricekt", $hobbyarray)) {
											echo "checked";
										} ?> name="chk[]" id="Cricket" value="Cricket">
										<label for="Cricket">Cricket</label>
										<input type="checkbox" name="chk[]" id="Music" <?php if (in_array("Music", $hobbyarray)) {
											echo "checked";
										} ?>value="Music"> <label
											for="Music">Music</label>
										<input type="checkbox" name="chk[]" id="Reading" <?php if (in_array("Reading", $hobbyarray)) {
											echo "checked";
										} ?> value="Reading">
										<label for="Reading">Reading</label>
										<input type="checkbox" name="chk[]" <?php if (in_array("Travelling", $hobbyarray)) {
											echo "checked";
										} ?> id="Travelling" value="Travelling">
										<label for="Travelling">Travelling</label>

									</div>
								</div>
								<br>
								
								<div class="row mt-3">
									<div class="col text-center">
										<select name="city" class="form-control" id="city">
											<option value="">--Select City--</option>
											<?php
											foreach ($allcity['Data'] as $c) ?>

												<option value="<?php echo $c->c_id; ?>">
													<?php echo $c->ctiy_name; ?>
													<?php
											{}
											?>
												<!-- <option value="Ahmedabad">Ahmedabad</option>
											<option value="Surat">Surat</option>
											<option value="Baroda">Baroda</option> -->
										</select>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<label for="address">Address</label>
										<textarea name="address" id="address" class="form-control" cols="30"
											rows="3"><?php echo $adituserbyid['Data'][0]->address; ?></textarea>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col">
										<label for="profile_pic">Profile Pic</label>
										<img src="<?php echo $this->baseurl . "/uploads/".$adituserbyid['Data'][0]->profile_pic?>" alt="Prof">
										<input type="file" class="form-control" name="profile_pic" accept="image/*"
											id="profile_pic">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col text-center">
										<input type="submit" class="btn btn-primary" value="Update" name="btn-update"
											id="">
										<input type="reset" class="btn btn-danger" name="" id="">
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>