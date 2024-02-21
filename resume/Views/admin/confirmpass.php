<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>confirmpassword</title>


</head>
<script>
    var validate = function () {

        if (document.getElementById("pass").value != document.getElementById("confirmpass").value) {
            window.alert("Passwords does not match");
        }

        return false;
    }
</script>

<body>
    <div class="row pt-5">
        <div class="col-lg-4 offset-lg-4 mt-5">
            <div class="card border-primary mb-3">
                <div class="card-header text-center">Reset password</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col p-3">
                                <input type="password" placeholder="Enter Your Password" class="form-control"
                                    name="pass" id="pass">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col p-3">
                                <input type="password" placeholder="Enter Your Confirm password" class="form-control"
                                    name="confirmpass" id="confirmpass">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col text-center">
                                <input type="submit" onclick="validate()" class="btn btn-primary" name="btn-reset" id=""
                                    value="Set Password">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>