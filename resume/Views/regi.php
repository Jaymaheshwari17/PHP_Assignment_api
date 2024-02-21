<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
	<title>Document</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<br>
			<div class="col-md-4"></div>
			<div class="col-md-4">

				<div class="card">
					<div class="card-header text-center"> registrsaion </div>
					<div class="card-body">
						<form method="post" id="registration" onsubmit="savedata()" enctype="multipart/form-data">
							<div class="row">
								<div class="col">
									<input type="text" placeholder="Enter User Name" class="form-control"
										name="username" id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="password" placeholder="Enter Password" class="form-control"
										name="password" id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="text" placeholder="Enter First Name" class="form-control" name="fname"
										id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="text" placeholder="Enter Last Name" class="form-control" name="lname"
										id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="text" placeholder="Enter Date Of Birth" class="form-control" name="dob"
										id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="text" placeholder="Enter Mobile" class="form-control" name="mobile"
										id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="email" placeholder="Enter Email" class="form-control" name="email"
										id="">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="radio" value="Male" name="gender" id="Male"> <label
										for="Male">Male</label>
									<input type="radio" value="Female" name="gender" id="Female"> <label
										for="Female">Female</label>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<input type="checkbox" name="chk[]" id="Cricekt" value="Cricekt"> <label
										for="Cricekt">Cricekt</label>
									<input type="checkbox" name="chk[]" id="Music" value="Music"> <label
										for="Music">Music</label>
									<input type="checkbox" name="chk[]" id="Reading" value="Reading"> <label
										for="Reading">Reading</label>
									<input type="checkbox" name="chk[]" id="Travelling" value="Travelling"> <label
										for="Travelling">Travelling</label>

								</div>
							</div>
							<br>
							<div class="row mt-3">
								<div class="col text-center">
									<?php
									// echo "<pre>";
									// print_r($allcity['Data']);
									// echo "</pre>";
									
									?>
									<select name="country" class="form-control mt" id="country"
										onchange="fetchstate(this.value)">
										<option hidden>Select Country</option>
									</select>
									<br>
									<select name="state" class="form-control" id="state"
										onchange="fetchcity(this.value)">
										<option value="">--Select state--</option>
									</select>
									<br>
									<select name="city" class="form-control" id="city">
										<option hidden>Select City</option>

									</select>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<label for="address">Address</label>
									<textarea name="address" id="address" class="form-control" cols="30"
										rows="3"></textarea>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col">
									<label for="profile_pic">Profile Pic</label>
									<input type="file" class="form-control" name="profile_pic" accept="image/*"
										id="profile_pic">
								</div>
							</div>
							<div class="row mt-3">
								<div class="col text-center">
									<input type="submit" class="btn btn-primary" value="Registration" name="btn-regist"
										id="">
									<input type="reset" class="btn btn-danger" name="" id="">
								</div>
							</div>
						</form>
					</div>
				</div>
				<script>
					$().ready(function () {
						// validate the comment form when it is submitted
						// $("#registration").validate();

						fetchCountries()
					})

					function fetchCountries() {
						fetch("http://localhost/resume/allconutrydata").then((res) => res.json()).then((result) => {
							console.log(result);
							let CountryOption = '<option value="">--Select Country--</option>'
							result.forEach(element => {
								console.log(element.country_name);
								// CountryOption +='<option value="">--Select Country--</option>'
								CountryOption += `<option value="${element.country_id}">${element.country_name}</option>`
							});
							console.log(CountryOption);
							$("#country").html(CountryOption);
						})
					}

					function fetchstate(id) {
						fetch(`http://localhost/resume/allstatedata?country_id=${id}`).then((res) => res.json()).then((result) => {
							console.log(result);
							let stateOption = '<option value="">--Select state--</option>'
							result.forEach(element => {
								console.log(element.state_name);
								// CountryOption +='<option value="">--Select Country--</option>'
								stateOption += `<option value="${element.state_id}">${element.state_name}</option>`
							});
							console.log(stateOption);
							$("#state").html(stateOption);
						})
					}


					function fetchcity(id) {
						fetch(`http://localhost/resume/allcitydata?state_id=${id}`).then((res) => res.json()).then((result) => {
							console.log(result);
							let cityOption = '<option value="">--Select city--</option>'
							result.forEach(element => {
								console.log(element.city_name);
								// CountryOption +='<option value="">--Select Country--</option>'
								cityOption += `<option value="${element.city_id}">${element.city_name}</option>`
							});
							console.log(cityOption);
							$("#city").html(cityOption);
						})
					}


					function savedata() {
						event.preventDefault()
						console.log($('form').serializeArray());
						var result = {};
						$.each($('form').serializeArray(), function () {
							result[this.name] = this.value;
							
						});

						let hobStr = ""
                        $('input[name="chk[]"]:checked').each(function () {
                            console.log(this.value);
                            hobStr+=this.value+","
                        });
                        hobStr = hobStr.substring(0, hobStr.length - 1); // Remove the last character
                        console.log(hobStr);
                        delete(result['chk[]'])
                        result["hobby"]=hobStr

                        console.log(result);

						
						fetch(`http://localhost/resume/ress`, {
							headers: {
								'Accept': 'application/json',
								'Content-Type': 'application/json'
							},
							method: "POST",
							body: JSON.stringify(result)
						}).then((res) => res.json()).then((result) => {
							console.log(result['Data']);



						})
					}

				</script>

			</div>
		</div>
	</div>

</body>

</html>