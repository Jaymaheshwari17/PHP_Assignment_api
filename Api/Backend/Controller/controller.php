<?php
require_once("Model/model.php");
class controller extends model
{
  function __construct()
  {
    parent::__construct();
    if (isset($_SERVER['PATH_INFO'])) {
      switch ($_SERVER['PATH_INFO']) {

        case '/data':
          $alldata = $this->select("users");

          echo json_encode($alldata);
          break;
        case '/checkemail':
          $checkdatabyemail = $this->select("users", array("email" => $_REQUEST['email']));
          // echo "<pre>";
          // print_r($checkdatabyemail);
          // echo "</pre>";

          echo json_encode($checkdatabyemail);
          break;
        case '/checkpostmethod':

          // echo "<pre>";
          // print_r($_REQUEST);
          // $data = json_decode(file_get_contents('php://input'));
          // print_r($data->username);
          $data = json_decode(file_get_contents('php://input'), true);
          // print_r($data['username']);
          // $data =file_get_contents('php://input');
          // var_dump($data);
          // echo json_encode(["data"=>"checking"]);
          echo json_encode($data);

          break;
        case '/Todoadd':
          $data = json_decode(file_get_contents('php://input'), true);
          // print_r($data);
          $InsertRes = $this->insert('todo', $data);

          echo json_encode($InsertRes);

          break;
        case '/showall':

          $showall = $this->select('todo');

          echo json_encode($showall);

          break;
        case '/Delete':
          // print_r($_SERVER['REQUEST_METHOD']);
          $data = $this->delete('todo', array("id" => $_REQUEST['id']));
          // print_r($data);

          echo json_encode($data);

          break;
        case '/selecttodo':
          $Selectbyid = $this->select('todo', array("id" => $_GET['id']));
          // print_r(  $Selectbyid);
          echo json_encode($Selectbyid);

          break;
        case '/updatetodo':
          $data = json_decode(file_get_contents('php://input'), true);
          //print_r($data); 
          //exit;
          $updatebyid = $this->update('todo', $data, array("id" => $_GET['id']));
          // print_r( $updatebyid);
          echo json_encode($updatebyid);

          break;
        case '/allcountries':
          
          $allcountrybyid = $this->select('country');

          echo json_encode($allcountrybyid);

          break;
        case '/allstate':
          
          $Allstatesbycountry = $this->Select(" states",array("country_id"=>$_REQUEST['country_id']));
          echo json_encode($Allstatesbycountry);                  
          break;

          
        case '/allcity':
          $Allcities = $this->Select("cities",array("state_id"=>$_REQUEST['state_id']));
          echo json_encode($Allcities);                  
          break;

          case '/registerfetch':
            $data = json_decode(file_get_contents("php://input"),true); 
            $registerbyfetchmethod = $this->insert(" users",$data); 
            echo json_encode($registerbyfetchmethod);        
            break;
          case '/Login':
                  
            break;

        case '/uploadimage':
          // echo "<pre>";
          // print_r($_REQUEST);
          // print_r($_FILES);
          // exit;
          if (isset($_FILES['sample_image'])) {
            $extension = pathinfo($_FILES['sample_image']['name'], PATHINFO_EXTENSION);
            $new_name = time() . '.' . $extension;
            move_uploaded_file($_FILES['sample_image']['tmp_name'], 'Uploads/' . $new_name);
            $data = array('image_source' => 'Uploads/' . $new_name);
            echo json_encode($data);
          }

          break;

        default:
          # code...
          break;
      }
    }
  }
}


$controller =  new controller;
