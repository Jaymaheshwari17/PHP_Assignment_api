<?php
session_start();
// echo "hello world";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once("Model/model.php");



class controller extends Model
{
  public $mail = "";

  public $baseurl = "http://localhost/resume/assets";

  public function __construct()
  {
    $this->mail = new PHPMailer(true);
    ob_start();
    parent::__construct();
    if (isset($_SERVER['PATH_INFO'])) {
      switch ($_SERVER['PATH_INFO']) {
        case '/':
        case '/home':
          include_once("Views/header.php");
          include_once("Views/main.php");
          include_once("Views/footer.php");
          break;

        case '/about':
          include_once("Views/header.php");
          include_once("Views/main.php");
          include_once("Views/footer.php");
          break;

        case '/service':
          include_once("Views/header.php");
          include_once("Views/main.php");
          include_once("Views/footer.php");
          break;

        case '/allconutrydata':
          $data = $this->select("country");

          echo json_encode($data['Data']);

          // echo "<pre>";
          // print_r($allcountrydata['Data'][0]);
          // echo "</pre>";


          break;

        case '/allstatedata':
          $data = $this->select("state", array("country_id" => $_REQUEST['country_id']));
          // echo "<pre>";
          // print_r($data['Data'][0]);
          // echo "</pre>";
          echo json_encode($data['Data']);

          break;


        case '/allcitydata':
          $data = $this->select("city", array("state_id" => $_REQUEST['state_id']));
          // echo "<pre>";
          // print_r($data['Data'][0]);
          // echo "</pre>";
          echo json_encode($data['Data']);
          break;

        case '/gallery':
          include_once("Views/header.php");
          include_once("Views/main.php");
          include_once("Views/footer.php");
          break;


        case '/contact':
          include_once("Views/header.php");
          include_once("Views/main.php");
          include_once("Views/footer.php");
          break;

        case '/ress':

          $getdata=file_get_contents('php://input');
          $data=json_decode($getdata,true);

          // echo json_encode($data);
          
          // array_pop($data);
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";

          $res=$this->insert("registration",$data);
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";


          echo json_encode($res);

          


          break;

        case '/regi':
          // $allcity = $this->select("city");


          include_once("Views/header.php");
          include_once("Views/regi.php");
          include_once("Views/footer.php");
          // if (isset($_REQUEST['btn-regist'])) {


          //   $allowed_image_extension = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp");
          //   if ($_FILES['profile_pic']['error'] == 0) {
          //     $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
          //     $fileinfo = @getimagesize($_FILES["profile_pic"]["tmp_name"]);
          //     if (!file_exists($_FILES["profile_pic"]["tmp_name"])) {
          //       $response = array(
          //         "type" => "error",
          //         "message" => "Choose image file to upload."
          //       );
          //     } else if (!in_array($file_extension, $allowed_image_extension)) {
          //       $response = array(
          //         "type" => "error",
          //         "message" => "Upload valid images. Only PNG and JPEG are allowed."
          //       );
          //     } else if (($_FILES["profile_pic"]["size"] > 2000000)) {
          //       $response = array(
          //         "type" => "error",
          //         "message" => "Image size exceeds 2MB"

          //       );
          //     } else {
          //       $target = "assets/uploads/" . basename($_FILES["profile_pic"]["name"]);
          //       if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target)) {
          //         $response = array(
          //           "type" => "success",
          //           "message" => "Image uploaded successfully.",
          //           "name" => $_FILES["profile_pic"]["name"]
          //         );
          //         $ImageName = $_FILES["profile_pic"]["name"];
          //       } else {
          //         $response = array(
          //           "type" => "error",
          //           "message" => "Problem in uploading image files."
          //         );
          //         $ImageName = "default.jpg";

          //       }
          //     }
          //   } else {
          //     $ImageName = "defailt.jpg";
          //   }


          //   $Hobbies = implode(",", $_POST['chk']);
          //   $data = array(
          //     "username" => $_REQUEST['username'],
          //     "fullname" => $_REQUEST['fname'] . " " . $_REQUEST['lname'],
          //     "email" => $_REQUEST['email'],
          //     "password" => $_REQUEST['password'],
          //     "dob" => $_REQUEST['dob'],
          //     "mobile" => $_REQUEST['mobile'],
          //     "gender" => $_REQUEST['gender'],
          //     "hobby" => $Hobbies,
          //     "profile_pic" => $ImageName,
          //     "city" => $_REQUEST['city'],
          //     "address" => $_REQUEST['address'],
          //     "status" => 0,
          //   );
          //   $this->insert("registration", $data);

          //   header("location:login");
          // }

          break;

        case '/login':


          include_once("Views/header.php");
          include_once("Views/login.php");
          include_once("Views/footer.php");

          if (isset($_POST['btn-login'])) {

            $InsertRes = $this->login($_POST['username'], $_POST['password']);
            if ($InsertRes['Code'] == 1) {
              $_SESSION['UserData'] = $InsertRes['Data'];

              // echo "<pre>";
              // echo $_SESSION['UserData']->username;
              // echo "</pre>";  
              if ($InsertRes['Data']->role_id == 1) {
                header("location:admin");
              } else {
                header("location:home");
              }

              echo "<script>alert('login successfully')</script>";
            } else {
              echo "<script>alert('Invalid user')</script>";

            }

          }



          break;

        case '/forgot':

          // include_once("Views/admin/header.php");
          include_once("Views/admin/forgot.php");
          if (isset($_POST['btn-for'])) {
            $maill = $this->select("registration");
            // echo "<pre>";
            // print_r($maill['Code']==1);
            // echo "</pre>";

            // if($maill['Data']){

            // }
            $email = $_POST['email'];
            // // echo "<pre>";
            // print_r($email);
            // // echo "</pre>";

            $OTP = random_int(100000, 999999);
            $msg = "your password otp change is : $OTP .";
            // // $mailto="sumitmaheshwari1705@gmail.com";
            // $msg.="<a href='http://localhost/resume/resetpassword?email=$email'>changes password link</a>";
            $this->update("registration", array("OTP" => $OTP), array("email" => $email));
            $this->mysendmail($email, $msg);


            header("location:resetpassword");
          }
          include_once("Views/admin/footer.php");

          break;

        case '/resetpassword':

          // include_once("Views/admin/header.php");
          include_once("Views/admin/resetpassword.php");
          // include_once("Views/admin/footer.php");



          break;


        case '/confirmpass':

          // include_once("Views/admin/header.php");
          include_once("Views/admin/confirmpass.php");
          // include_once("Views/admin/footer.php");

          break;


        case '/admin':

          include_once("Views/admin/header.php");
          include_once("Views/admin/main.php");
          include_once("Views/admin/footer.php");

          break;


        case '/Alluser':
          $allusers = $this->select('registration');
          // echo "<pre>";
          // print_r($allusers);
          // echo "</pre>";


          include_once("Views/admin/header.php");
          include_once("Views/admin/Alluser.php");
          include_once("Views/admin/footer.php");
          break;


        case '/addnewuser':
          $allcity = $this->select("city");
          $allusers = $this->select('registration');
          include_once("Views/admin/header.php");
          include_once("Views/admin/addnewuser.php");
          include_once("Views/admin/footer.php");
          if (isset($_REQUEST['btn-regist'])) {


            $allowed_image_extension = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp");
            if ($_FILES['profile_pic']['error'] == 0) {
              $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
              $fileinfo = @getimagesize($_FILES["profile_pic"]["tmp_name"]);
              if (!file_exists($_FILES["profile_pic"]["tmp_name"])) {
                $response = array(
                  "type" => "error",
                  "message" => "Choose image file to upload."
                );
              } else if (!in_array($file_extension, $allowed_image_extension)) {
                $response = array(
                  "type" => "error",
                  "message" => "Upload valid images. Only PNG and JPEG are allowed."
                );
              } else if (($_FILES["profile_pic"]["size"] > 2000000)) {
                $response = array(
                  "type" => "error",
                  "message" => "Image size exceeds 2MB"

                );
              } else {
                $target = "assets/uploads/" . basename($_FILES["profile_pic"]["name"]);
                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target)) {
                  $response = array(
                    "type" => "success",
                    "message" => "Image uploaded successfully.",
                    "name" => $_FILES["profile_pic"]["name"]
                  );
                  $ImageName = $_FILES["profile_pic"]["name"];
                } else {
                  $response = array(
                    "type" => "error",
                    "message" => "Problem in uploading image files."
                  );
                  $ImageName = "default.jpg";

                }
              }
            } else {
              $ImageName = "defailt.jpg";
            }


            $Hobbies = implode(",", $_POST['chk']);
            $data = array(
              "username" => $_REQUEST['username'],
              "fullname" => $_REQUEST['fname'] . " " . $_REQUEST['lname'],
              "email" => $_REQUEST['email'],
              "password" => $_REQUEST['password'],
              "dob" => $_REQUEST['dob'],
              "mobile" => $_REQUEST['mobile'],
              "gender" => $_REQUEST['gender'],
              "hobby" => $Hobbies,
              "profile_pic" => $ImageName,
              "city" => $_REQUEST['city'],
              "address" => $_REQUEST['address'],
              "status" => 0,
            );
            $response = $this->insert("registration", $data);
            if ($response['Code'] == 1) {
              header("location:Alluser");

            } else {
              echo "Error While inserting";
            }


          }

          break;

        case '/edituser':
          $allcity = $this->select("city");

          $adituserbyid = $this->select('registration', array("id" => $_GET['userid']));

          // echo "<pre>";
          // print_r($adituserbyid);
          // echo "</pre>";
          // exit;

          // echo "<pre>";
          // print_r($allusers);
          // echo "</pre>";


          include_once("Views/admin/header.php");
          include_once("Views/admin/edituser.php");
          include_once("Views/admin/footer.php");
          if (isset($_POST['btn-update'])) {
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
            $allowed_image_extension = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "webp");
            if ($_FILES['profile_pic']['error'] == 0) {
              $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
              $fileinfo = @getimagesize($_FILES["profile_pic"]["tmp_name"]);
              if (!file_exists($_FILES["profile_pic"]["tmp_name"])) {
                $response = array(
                  "type" => "error",
                  "message" => "Choose image file to upload."
                );
              } else if (!in_array($file_extension, $allowed_image_extension)) {
                $response = array(
                  "type" => "error",
                  "message" => "Upload valid images. Only PNG and JPEG are allowed."
                );
              } else if (($_FILES["profile_pic"]["size"] > 2000000)) {
                $response = array(
                  "type" => "error",
                  "message" => "Image size exceeds 2MB"
                );
              } else {
                $imgname = $_REQUEST['username'] . "." . $file_extension;
                $target = "assets/uploads/" . $imgname;
                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target)) {
                  $response = array(
                    "type" => "success",
                    "message" => "Image uploaded successfully.",
                    "name" => $_FILES["profile_pic"]["name"]
                  );
                  $ImageName = $imgname;
                } else {
                  $response = array(
                    "type" => "error",
                    "message" => "Problem in uploading image files."
                  );
                  $ImageName = "default.jpg";
                }
              }
            } else {
              $ImageName = "defailt.jpg";
            }
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            $Hobbies = implode(",", $_POST['chk']);
            $data = array(
              "username" => $_REQUEST['username'],
              "fullname" => $_REQUEST['fname'] . " " . $_REQUEST['lname'],
              "email" => $_REQUEST['email'],
              // "password" => $_REQUEST['password'],
              "dob" => $_REQUEST['dob'],
              "mobile" => $_REQUEST['mobile'],
              "gender" => $_REQUEST['gender'],
              "hobby" => $Hobbies,
              "profile_pic" => $ImageName,
              "city" => $_REQUEST['city'],
              "address" => $_REQUEST['address'],
              "status" => 0,
            );

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";


            $updates = $this->update("registration", $data, $_REQUEST['userid'], );
            if ($updates['Code'] == 1) {
              header("location:Alluser");
            } else {
              echo "<script> alert('Error while updating') </script>";
            }
          }
          break;

        case '/deleteuser':

          $deleteuserres = $this->delete("registration", array("id" => $_REQUEST['userid']));

          if ($deleteuserres['Code'] == 1) {
            header("location:Alluser");
            echo "<script>alert('User are deleted Successfully..')</script>";
          } else {
            // header("location:Alluser");
            echo "<script>alert('Error while deleting data try after some time')
            window.location.href='Alluser'
            </script>";
          }
          break;
      }
    } else {
      header("location:home");
    }
    ob_flush();
  }

  function mysendmail($email, $msg)
  {
    try {
      //Server settings
      $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $this->mail->isSMTP();                                            //Send using SMTP
      $this->mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $this->mail->SMTPAuth = true;                                   //Enable SMTP authentication
      $this->mail->Username = 'jrmaheshwari1705@gmail.com';                     //SMTP username
      $this->mail->Password = 'bwffulmufyhehlys';                               //SMTP password
      $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $this->mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $this->mail->setFrom('jrmaheshwari1705@gmail.com', 'jaymaheshwari');
      $this->mail->addAddress($email, 'vaja dipak');     //Add a recipient
      // $this->mail->addAddress('vajadipak2110@gmail.com');               //Name is optional
      $this->mail->addReplyTo('jrmaheshwari1705@gmail.com', 'Information');
      // $this->mail->addCC('cc@example.com');
      // $this->mail->addBCC('bcc@example.com');

      //Attachments
      // $this->mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $this->mail->isHTML(true);                                  //Set email format to HTML
      $this->mail->Subject = 'Here is the subject';
      $this->mail->Body = $msg;
      $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $this->mail->send();
      return 'Message has been sent';
    } catch (Exception $e) {
      return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
    }
  }

}

$obj = new controller;