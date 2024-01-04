<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>

<body>

    <div class="container mt-3 p-3 mb-2 bg-blue text-black">
        <div class="text-center">
            <h2><b>Registration Form</b></h2>
        </div>
        <form method="post" class="row g-2" id="formdata">
            <div class="col-md-6 offset-3">
                <label for="fullname" class="form-label">Full name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" minlength="10" maxlength="10" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="col-md-6 offset-3">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="radio" id="Male" name="gender" value="Male"><label for="Male">Male</label>
                <input type="radio" id="Female" name="gender" value="Female"><label for="Female">female</label>
            </div>
            <div class="col-md-6 offset-3">
                <label for="">Hobby</label><br>
                <input type="checkbox" name="Hobby[]" id="cricket" value="cricket"><label for="cricket">Cricket</label>
                <input type="checkbox" name="Hobby[]" id="music" value="music"><label for="music">Music</label>
                <input type="checkbox" name="Hobby[]" id="reading" value="reading"><label for="reading">Reading</label>

            </div>
            <div class="row mt-3">

            </div>
            <div class="row mt-3">
                <div class="col-md-6 offset-3">
                    <label for="Country">Country</label>
                    <select name="Country" id="Country" onchange="statebycountry(this)" class="form-control">
                        <option value="">--Select--</option>

                    </select>
                </div>
                <div class="col-md-6 offset-3">
                    <label for="State">State</label>
                    <select name="State" id="State" onchange="citybystateid(this)" class="form-control">
                        <option value="">--Select--</option>

                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 offset-3">
                    <label for="City">City</label>
                    <select name="City" id="City" class="form-control">
                        <option value="">--Select--</option>

                    </select>
                </div>
            </div>
            <div class="col-md-6 offset-4">

                <button type="Submit" name="btn-regist" class="btn btn-success">register</button>
                <button type="Reset" value="Cancel" class="btn btn-danger">Cancel</button>

            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $("#formdata").on("submit", function(e) {
            e.preventDefault();
            
            console.log(result);var result = {};
            $.each($('#formdata').serializeArray(), function() {
                result[this.name] = this.value;
            });
            var hobbylist = "";
            $('input[type=checkbox]').each(function() {
                if (this.checked) {
                    hobbylist += $(this).val() + ",";
                }

            });
            hobbylist = hobbylist.substring(0, (hobbylist.length - 1));
            // console.log(hobbylist);
            result['hobby'] = hobbylist
            delete result['Hobby[]']
            delete result['Country']
            delete result['State']
            fetch(`http://localhost/laravel/API_Task/Backend/registerfetch`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify(result)
            }).then((res) => res.json()).then((Response) => {
                // console.log(Response);
                window.location.href = 'login.php';
            })
        })




        // Country Fetch Start
        fetch(`http://localhost/Laravel/API_Task/Backend/allcountries`).then((res) => res.json()).then(Response => {
            // console.log(Response.Data);
            let htmlres = "<option value=''>select country</option>";
            Response.Data.map((data) => {
                // console.log(data);
                htmlres += `<option value='${data.country_id}'>${data.country_name}</option>`
            })
            document.getElementById("Country").innerHTML = htmlres


        })
        // Country Fetch End
        // States Fetch Start
        function statebycountry(e) {
            fetch(`http://localhost/laravel/API_Task/Backend/allstate?country_id=${e.value}`).then((res) => res.json()).then((Response) => {
                // console.log(Response.Data);
                let htmlres = "<option value=''>select state</option>";
                Response.Data.map((data) => {
                    // console.log(data);
                    htmlres += `<option value='${data.sid }'>${data.name}</option>`
                })
                document.getElementById("State").innerHTML = htmlres

            })
        }
        // States Fetch End

        // Cities Fetch Start

        function citybystateid(e) {
            // console.log(e)
            fetch(`http://localhost/Laravel/API_Task/Backend/allcity?state_id=${e.value}`).then((res) => res.json()).then((Response) => {
                // console.log(Response.Data);
                let htmlres = "<option value=''>select state</option>";
                Response.Data.map((data) => {
                    // console.log(data);
                    htmlres += `<option value='${data.cid }'>${data.name}</option>`
                })
                document.getElementById("City").innerHTML = htmlres

            })
        }
        // Cities Fetch End
    </script>
</body>

</html>