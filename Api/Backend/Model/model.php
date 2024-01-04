<?php
class model{
    public $connection = "";
    function __construct()
    {
        $this->connection = new mysqli("localhost","root","","masterdatabase");
        // if ( $this->connection) {
        //     echo "suuccess";
        // }
        //     else{
        //         echo "failed";
        //     }
        // }
    }
    //select query
    function select($tbl,$where=""){
         $SQL= "select * from $tbl";
         if ($where!="") {
            $SQL.=" where ";
            foreach ($where as $key => $value) {
                $SQL.= " $key='$value' AND";
            }
            $SQL= rtrim($SQL,"AND");
         }
        //  echo $SQL;
        $SQLEx = $this->connection->query($SQL);
        // print_r($SQLEx);
        if ($SQLEx->num_rows>0) {
            while ($row= $SQLEx->fetch_object() ) {
                $data[]=$row;
             }
             $Res['Code'] = 1;
            $Res['Data'] = $data;
            $Res['Msg'] = "Success";
        }
        else{
            $Res['Code'] = 0;
            $Res['Data'] = 0;
            $Res['Msg'] = "try again";
        }
        return  $Res;
     
    }

    // insert query
    function insert($tbl, $data)
            {

                $clm = implode(",", array_keys($data));
                $vals = implode("','", $data);

                $SQL = "INSERT INTO $tbl ($clm) VALUES ('$vals')";
                // echo $SQL;
                $SQLEx = $this->connection->query($SQL);
                // echo "<pre>";
                if ($SQLEx > 0) {
                    $Res['Code'] = 1;
                    $Res['Data'] = 1;
                    $Res['Msg'] = "Success";
                } else {
                    $Res['Code'] = 0;
                    $Res['Data'] = 0;
                    $Res['Msg'] = "Try again";
                }
                return $Res;
            }

    // update quyery        
            function update( $tbl,$data,$where){

                
                $SQL = "update $tbl set ";
              

                foreach ($data as $key => $value) {
                    $SQL .= "$key = '$value' ,";
                    }

                    $SQL = rtrim($SQL, ",");
                   $SQL .= " WHERE";
                foreach ($where as $key => $value) {
                    $SQL .= " $key = '$value ' AND";
                }

                $SQL = rtrim($SQL, "AND");
                
                $sqlex = $this->connection->query($SQL);
                // print_r($sqlex);
                // exit;
                    if ($sqlex > 0) {
                        $ResponceData['Data'] = "1";
                        $ResponceData['Msg'] = "Success";
                        $ResponceData['Code'] = "1";
                    } else {
                        $ResponceData['Data'] = "0";
                        $ResponceData['Msg'] = "Try Again";
                        $ResponceData['Code'] = "0";
                    }
                return $ResponceData;
                
            }
            function delete($tbl, $where)
            {
                $SQL = " DELETE FROM $tbl WHERE";
                foreach ($where as $key => $value) {
                    $SQL .= " $key = '$value' AND";
                }
                $SQL = rtrim($SQL, "AND");
                // echo $SQL;
                $SQLEx = $this->connection->query($SQL);
                // print_r($SQLEx);
                if ($SQLEx > 0) {
                    $ResponceData['Data'] = "1";
                    $ResponceData['Msg'] = "Success";

                    $ResponceData['Code'] = "1";
                } else {
                    $ResponceData['Data'] = "0";
                    $ResponceData['Msg'] = "Try Agian";
                    $ResponceData['Code'] = "0";
                }
                return $ResponceData;
                // print_r($ResponceData['Data'] );
                // exit;
            }

            // function q($s){
            //     $this->connection->query($s);
            // }
}
