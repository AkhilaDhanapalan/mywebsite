<?php

require ('../model/mymodel.php');

class MyNewController
{
        var $varModelObj,$varDBConnection;
        public $actionevents,$selectedCountry;
       
        
    function __construct()
	{
	    
        
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        
       // date_default_timezone_set('Asia/Bahrain');
        //$this->current_date = date("H:i:s");
        
        
        
        $this->actionevents = $_POST['action'];
        
        
        
    }
    
    
    
    function SQLArray(){ 
        $array =  array();
      
        $array[0] = "select country_id,country_name from tbl_country";
        $array[1] = "select reg_id,reg_fname,reg_lname,reg_address,reg_num,reg_sex,reg_country,country_name,reg_state,state_name,reg_pin,reg_email,reg_date from view_reg_list";


        return $array;
    }
    function SQLArray1(){
        $array =  array();
        
        $array[0]= "select state_id,country_id,state_name from tbl_state where country_id=".$_POST['varselectedCountry']."";
        //$array[1]="insert into tbl_registration(reg_fname,reg_lname,reg_address,reg_num,reg_country,reg_state,reg_email,reg_password) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['address']."',".$_POST['contact'].",'".$_POST['sex']."',".$_POST['country'].",".$_POST['state'].",'".$_POST['pincode']."','".$_POST['email']."','".$_POST['pwd']."')";
        return $array;
    }
    function SQLArray2(){
        $array =  array();
        
        //$array[0]= "select state_id,country_id,state_name from tbl_state where country_id=".$_POST['varselectedCountry']."";
        $array[0]="insert into tbl_registration(reg_fname,reg_lname,reg_address,reg_num,reg_sex,reg_country,reg_state,reg_pin,reg_email,reg_password) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['address']."',".$_POST['contact'].",'".$_POST['sex']."',".$_POST['country'].",".$_POST['state'].",'".$_POST['pincode']."','".$_POST['email']."','".$_POST['pwd']."')";
        return $array;
    }
    function SQLArray3(){
        $array =  array();
        
        //$array[0]= "select state_id,country_id,state_name from tbl_state where country_id=".$_POST['varselectedCountry']."";
        $array[0]="update tbl_registration set reg_fname='".$_POST['editfname']."',reg_lname='".$_POST['editlname']."',reg_address='".$_POST['editaddress']."',reg_num=".$_POST['editcontact'].",reg_sex='".$_POST['editsex']."',reg_country=".$_POST['editcountry'].",reg_state=".$_POST['editstate'].",reg_pin='".$_POST['editpincode']."',reg_email='".$_POST['editemail']."' where reg_id=".$_POST['editregid'];        
        
        return $array;
    }
    function SQLArray4(){
        $array =  array();
        
        $array[0]= "delete from tbl_registration where reg_id=".$_POST['delregid']."";
      
        return $array;
    }
    function SQLArray5(){
        $array =  array();
        
        $array[0]= "select * from tbl_registration where reg_email='".$_POST['login_username']."' and reg_password='".$_POST["login_pwd"]."'";
      
        return $array;
    }
    function RequestAccept($FunctionEvents)
    {
        $var =  $this->SQLArray();
      
        switch ($FunctionEvents)
        {

            
            case 'select_reg_country':

               echo $this->varModelObj->ListFromCountryTable($var[0],'country_id','country_name',$_POST['ctrl_name'],'Select Country');
            break;
            
            
            
            case 'select_reg_state':
                $var1 =  $this->SQLArray1();
                
                echo $this->varModelObj->ListFromStateTable($var1[0],'state_id','state_name',$_POST['ctrl_name_state'],'Select state');
            break;

            case 'insertUserDetails':
                $var2 =  $this->SQLArray2();
                
                echo $this->varModelObj->InsertDetails($var2[0]);
             break;

             case 'regDisplayList':

                echo $this->varModelObj->ListFromRegView($var[1]);
             break;

             
             case 'insertEditUserDetails':
                $var3 =  $this->SQLArray3();
                echo $this->varModelObj->ListFromEditRegView($var3[0]);
             break;
             case 'deleteUserDetails':
                $var4 =  $this->SQLArray4();
                echo $this->varModelObj->deleteRegViewData($var4[0]);
             break;
             case 'loginDetails':
                $var5 =  $this->SQLArray5();
                echo $this->varModelObj->loginEnter($var5[0]);
             break;
             
            default:
             echo 'No Action Found...!';
             break;
            
        }

    }

  
}//end of class

$obj = new MyNewController();
$obj->RequestAccept($obj->actionevents);
?>