<?php 

class DB{
	public $con;

	function __construct(){
		$this->con = new mysqli("localhost", "root", "", "batch4");
	}

	function validation($name, $email, $status){
		$count = 0;
		if($name == ""){
			echo '<span class="alert alert-danger w-100 d-inline-block">Name required!</span>';
			$count++;
		}
		if($email == ""){
			echo '<span class="alert alert-danger w-100 d-inline-block">Email required!</span>';
			$count++;
		}
		if($count>0){
			return false;
		}else{
			return true;
		}
		
	}

	// insert data into database
	function save(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$status = $_POST['status'];

		$result = $this->con->query("INSERT INTO tbl_student (name, email, status) VALUES ('$name', '$email', '$status') ");

		if($result){
			echo '<span class="alert alert-success w-100 d-inline-block">Successful</span>';
		}else{
			echo '<span class="alert alert-danger w-100 d-inline-block">Failed</span>';
		}
	}

	// find all data from database
	function show(){
		$result = $this->con->query("SELECT * FROM tbl_student");

		if($result->num_rows > 0){
			return $result;
		}else{
			echo "No Data Found";
			return $result;
		}
		
	}


	function delete($id){
		
		$this->con->query("DELETE FROM tbl_student WHERE id=$id");

		header("location:index.php");

	}


	function statusActive($id){
		$this->con->query("UPDATE tbl_student SET status='1' WHERE id='$id'");
	}

	function statusInactive($id){
		$this->con->query("UPDATE tbl_student SET status='2' WHERE id='$id'");
	}


	function update($data){
		$name = $data['name'];
		$email = $data['email'];
		$status = $data['status'];
		$id = $data['update'];

		$this->con->query("UPDATE tbl_student SET name='$name', email='$email', status='$status' WHERE id='$id' ");
		header("location:index.php");
	}


	
}



 ?>