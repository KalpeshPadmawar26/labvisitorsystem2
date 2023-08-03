
<?php
class DataBase {
    public $connection;
    private $hostName;
    private $userName;
    private $pasWord;
    private $db;
  
    public function connect($host, $user, $pass, $dtb) {
        $this->hostName = $host;
        $this->userName = $user;
        $this->password = $pass;
        $this->db = $dtb;
 		$ncon='Could Not Connect.';	
        return $this->connection = mysqli_connect($host, $user, $pass, $dtb)
                                    or die("Could not select database");
    }
 

public function dbconnect()
   {
     return $this->connection;
   }

 	/*---    queery for insert----*/
    public function insert($fields, $data, $table) {
        try {
            
			$queryFields = implode(",", $fields);
 
			$queryValues = implode('","', $data);
 
			$insert = 'INSERT INTO '.$table.'('.$queryFields.') VALUES ("'.$queryValues.'")';
			//echo $insert;
            if (mysqli_query($this->connection, $insert)) {
                return true;
            } 
			else {
                die(mysqli_error($this->connection));
            }
        } catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
    	}
		
		/*--- queery for update----*/
		public function update($condition,$id='',$table) {
        try {
            
			$insert = "UPDATE ".$table;
			
			$insert.=" SET ".$condition;
			if($id !='')
			{
				$insert.=" WHERE ".$id;
			}
			echo $insert;
            if (mysqli_query($this->connection, $insert)) {
                return true;
            }
			else {
                die(mysqli_error($this->connection));
            } 
			
        } catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
    	}
		
		
    	public function selectdistinct1($table,$colname,$limit)
		{
			try {
			//$query='SELECT DISTINCT '.$colname.' FROM '.$table ." LIMIT 0,3";
			$query="SELECT DISTINCT ".$colname." FROM ".$table." LIMIT ".$limit; 
			
			if ($result=mysqli_query($this->connection,$query)) {
				
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		/*--------select where-------*/

		/*---    query for delete----*/
	
		


		public function delete($table,$id) {
        try {
            
			$insert = 'DELETE FROM '.$table.' WHERE '.$id;
			
            if (mysqli_query($this->connection, $insert)) {
                return true;
            } 
			else {
                die(mysqli_error($this->connection));
            }
        } catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
    	}
		
		/*-----------Query for select-------------*/
		public function select($table,$condition='')
		{
			try {
			$query='SELECT * FROM '.$table;
			if($condition != '')
			{
				$query.=' WHERE '.$condition;
			}
			$query;
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		/*-----------Query for select distinct-------------*/


		/*-----------Query for deletewhere-------------*/
		public function deletewh($table,$condition='')
		{
			try {
			$query='DELETE FROM '.$table;
			if($condition != '')
			{
				$query.=' WHERE '.$condition;
			}
			$query;
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		/*-----------Query for select distinct-------------*/



		public function selectdistinct($table,$colname)
		{
			try {
			$query='SELECT DISTINCT '.$colname.' FROM '.$table;
			
			if ($result=mysqli_query($this->connection,$query)) {
				
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}


		public function selectdistinctWhere($table,$colname,$condition='')
		{
			try {

			$query='SELECT DISTINCT '.$colname.' FROM '.$table;


				if($condition != '')
			{
				$query.=' WHERE '.$condition;
			}

			
			
			if ($result=mysqli_query($this->connection,$query)) {
				
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}


		/*--------select where-------*/
		public function selectwhere($table,$condition,$colname)
		{
			try {
			$query='SELECT * FROM '.$table.' WHERE '.$colname.'="'.$condition.'" ';
			
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		
		/*-----------Query for select orderby-------------*/
		public function selectsort($table,$condition='',$ob)
		{
			try {
			$query='SELECT * FROM '.$table;
			if($condition != '')
			{
				$query.=' WHERE '.$condition;
			}
			$query.=' Order by '.$ob;
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		/*--------group filter-------*/
		public function groupselect($value)
		{
			try {
			$query='SELECT * FROM member WHERE contact_no NOT IN (SELECT contact_no FROM smsgroup WHERE group_name="'.$value.'")';
			
			
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		
		/*-----------Query for select max-------------*/
		public function selectmax($table,$max)
		{
			try {
			$query='SELECT max('.$max.') as maximum FROM '.$table;
			
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
			
        }
		}
		
		//select order by
		public function selectorderby($table,$condition='',$feildName)
		{
			try {
			$query='SELECT * FROM '.$table;
			if($condition != '')
			{
				$query.=' WHERE '.$condition;
			}
			$query.=' order by '.$feildName;
			//echo $query;
			
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
		
		}
		}
		public function search($table,$scolumn,$val)
		{
			
			try {
				$num=count($scolumn);
				for($i=0;$i<$num;$i++)
				{
					$str=$str.$scolumn[$i].' like "%'.$val.'%" ';
					if($i!=$num-1)
					{
						$str=$str."or ";
					}
				}
			$query='SELECT * FROM '.$table.' where '.$str;
			
			if ($result=mysqli_query($this->connection,$query)) {
				return $result;	
			}
			else {
                die(mysqli_error($this->connection));
            }
			} catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
		}
		
		




		//to get Table Fields
		function get_table_fields($table)
		{
			$fields = array();
			echo $sql="SHOW COLUMNS FROM $table";
			$result = mysqli_query($this->connection,$sql);
	
			return $result;
		}
		
}
?>