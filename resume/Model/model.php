<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
date_default_timezone_set('Asia/Kolkata');

class Model
{


    public $db = "";
    // public $db=new mysqli("localhost","root","","resume");

    public function __construct()
    {
        try {
            $this->db = new mysqli("localhost", "root", "", "resume");

        } catch (\Exception $th) {
            // echo "<pre>";
            // echo $th->getMessage();
            // echo "</pre>";

            if (!file_exists("log")) {
                mkdir("log");
            }
            $fileName = "errorLog" . date('d_m_Y') . ".txt";
            // $fileName = "errorLog".date('d_m_Y_H_i_sA');
            $ErrorMsg = PHP_EOL . "Error Time >>> " . date("d-m-Y H:i:s A");
            $ErrorMsg .= PHP_EOL . "Error Msg  >>> " . $th->getMessage() . PHP_EOL;
            file_put_contents("log/" . $fileName, $ErrorMsg, FILE_APPEND);

        }



    }
    function insert($tbl, $dt)
    {
        $clm = implode(",", array_keys($dt));
        $vals = implode("','", $dt);
        $SQL = "INSERT INTO $tbl($clm) VALUES('$vals')";
        echo $SQL;
        // $SQLEx = $this->db->query($SQL);
        
        if ($SQLEx > 0) {
            $ResData['Data'] = 1;
            $ResData['Msg'] = "Success";
            $ResData['Code'] = "1";
        } else {
            $ResData['Data'] = 0;
            $ResData['Msg'] = "Try again";
            $ResData['Code'] = "0";
        }
        return $ResData;
        // return $this->db->query("INSERT INTO `$tbl` VALUES ()");
    }
    public function login($uname, $password)
    {
        $SQL = "SELECT * FROM registration WHERE password='$password' AND(username='$uname' OR email='$uname' OR mobile='$uname')";
        $SQLEx = $this->db->query($SQL);
        if ($SQLEx->num_rows > 0) {
            $fetchData = $SQLEx->fetch_object();
            $ResData['Code'] = 1;
            $ResData['Msg'] = "Success";
            $ResData['Data'] = $fetchData;
        } else {
            $ResData['Code'] = 0;
            $ResData['Msg'] = "Try again";
            $ResData['Data'] = 0;
        }

        return $ResData;
    }

    public function select($tbl, $where = "")
    {
        $SQL = "SELECT * FROM $tbl";
        if ($where != "") {
            $SQL .= " WHERE ";
            foreach ($where as $key => $value) {
                $SQL .= " $key = $value AND";
            }   
            $SQL = rtrim($SQL, "AND");
        }
        $SQLEx = $this->db->query($SQL);
        if ($SQLEx->num_rows > 0) {
            // $fetchData = $SQLEx->fetch_object();
            while ($Data = $SQLEx->fetch_object()) {
                $fetchData[] = $Data;
            }
            $ResData['Code'] = 1;
            $ResData['Msg'] = "Success";
            $ResData['Data'] = $fetchData;
        } else {
            $ResData['Code'] = 0;
            $ResData['Msg'] = "Try again";
            $ResData['Data'] = 0;
        }

        return $ResData;
    }


    public function update($tbl, $data, $where)
    {
        $SQL = "UPDATE $tbl SET";
        foreach ($data as $dkey => $dvalue) {
            $SQL .= " $dkey = '$dvalue' ,";
        }
        // echo $SQL;
        $SQL = rtrim($SQL, ",");
        $SQL .= "WHERE ";
        foreach ($where as $key=>$value) {
            $SQL .= " $key = '$value' AND";
        }
        $SQL = rtrim($SQL, "AND");
        // echo $SQL;
        // echo $SQL;
        // exit;

        $SQLEx = $this->db->query($SQL);
        // echo "<pre>";
        // print_r($SQLEx);
        // echo "</pre>";
        if ($SQLEx > 0) {
            $ResData['Code'] = "1";
            $ResData['Msg'] = "Success";
            $ResData['Data'] = "1";
        } else {
            $ResData['Code'] = 0;
            $ResData['Msg'] = "Try again";
            $ResData['Data  '] = "0";
        }
        return $ResData;
        // $SQLEx = ""
    }



    function delete($tbl, $where)
    {
        $SQL = "DELETE FROM $tbl WHERE";
        foreach ($where as $key => $value) {
            $SQL .= " $key='$value' AND";
        }
        $SQL = rtrim($SQL, 'AND');

        $SQLEx = $this->db->query($SQL);
        if ($SQLEx > 0) {
            $ResData["Code"] = 1;
            $ResData["Msg"] = "Success";
            $ResData["Data"] = 1;
        } else {
            // echo "data na mlya";
            $ResData["Code"] = 0;
            $ResData["Msg"] = "try again";
            $ResData["Data"] = 0;
            # code...
        }
        return $ResData;
    }
}





//$ob=new Model;


?>