<?php //session_start();?>
<?php 

include "dbconnection.php" ;
//include "../user_js/reg.js" ;
abstract class FunctionDefinitions
{
	abstract public function ListFromCountryTable($SQL,$value,$text,$controlName,$title);
	abstract public function ListFromStateTable($SQL,$value,$text,$controlName,$title);
	abstract public function InsertDetails($SQL);
	abstract public function ListFromRegView($SQL);
}

class CommonModel extends FunctionDefinitions
{
	public $varDBConnection,$varAcntConnection;
	var $result;
	var $flag=0;
	

	function __construct()
	{
		$DBConn = new DBConnection();
		$this->varDBConnection = $DBConn->ConnectToMYSQL();
		
	}

	public function ListFromCountryTable($SQL,$value,$text,$controlName,$title)
	{
		//echo $SQL;
		$str = " <label for='sel1'>Country:</label><select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$str."<option value='".$row[$value]."'>".$row[$text]."</option>";
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
	}
	public function ListFromStateTable($SQL,$value,$text,$controlName,$title)
	{
		//echo $SQL;
		$str = " <label for='sel2'>State:</label><select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$str."<option value='".$row[$value]."'>".$row[$text]."</option>";
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
	}
	public function InsertDetails($SQL)
	{
		echo $SQL;
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		
        $this->flag=1;
        //$temp="Success";
		//return json_encode($temp);
		return $SQL;
    }
    public function ListFromRegView($SQL)
	{
		//echo $SQL;
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
		}
        $this->flag=1;
      
		return json_encode($temp);
    }
    
	function __destruct() {
		// if($this->flag==1)
		// {
		// 	mysqli_free_result($this->result);
		// }
		
		mysqli_close($this->varDBConnection);
		//mysqli_close($this->varAcntConnection);
		//print "Destroying " . __CLASS__ . "\n";
		
    }
	
	

}

?>