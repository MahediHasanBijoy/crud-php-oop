<?php 
	include "db.php";







 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

	
</head>
<body>
	
	
	<div class="row my-5">
		<div class="col-md-6 offset-md-3">
			<?php 

				// Object of DB Class
				$db = new DB();

				// Insert data
				if(isset($_POST['save'])){
					$validate = $db->validation($_POST['name'], $_POST['email'], $_POST['status']);

					if($validate){
						$db->save();
					}
				
				}

				// Delete data
				if(isset($_GET['delete'])){
					$db->delete($_GET['delete']);
				}

				// Change status
				if(isset($_GET['active'])){
					$db->statusInactive($_GET['active']);
				}
				if(isset($_GET['inactive'])){
					$db->statusActive($_GET['inactive']);
				}


				// Update
				if(isset($_POST['update'])){
					$db->update($_POST);
				}
			 ?>
				

			<!-- Input Form  -->
			<form method="POST" class="my-5">
				<div class="form-group mb-3">
					<label for="">Your Name:</label>
					<input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
				</div>
				<div class="form-group mb-3">
					<label for="">Your Email:</label>
					<input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
				</div>
				<div class="form-group mb-3">
					<select name="status" id="" class="form-select">
						<option selected>--Select Status--</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary w-100 " type="submit" name="save">Save</button>
				</div>
			</form>


			<!-- Show data  -->

			 <table class="table mt-3" id="myTable">
			 	<thead>
				 	<tr>
				 		<th>#sl No</th>
				 		<th>Name</th>
				 		<th>Email</th>
				 		<th>Action</th>
				 		<th>Status</th>
				 	</tr>
			 	</thead>
			 	<tbody>
			 	<?php 

					$result = $db->show();

					$sl = 1;

					/*--- start while loop ---*/
					while($data = $result->fetch_assoc()){
						
						
					 	echo '<tr>
					 		<td>'.$sl.'</td>
					 		<td>'.$data['name'].'</td>
					 		<td>'.$data['email'].'</td>
					 		<td>
					 			<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#update'.$data['id'].'"><i class="fa-solid fa-pen-to-square"></i></button>

								<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#item'.$data['id'].'"><i class="fa-solid fa-trash"></i></button>
					 		</td>
					 		';

					 	// change status
					 	if($data['status'] == 1){
					 		echo '<td><form method="get"><button class="btn btn-info w-100" type="submit" name="active" value="'.$data['id'].'">Active</button></form></td></tr>';
					 	}else{
					 		echo '<td><form method="get"><button class="btn btn-secondary w-100" type="submit" name="inactive" value="'.$data['id'].'">Inactive</button></form></td></tr>';
					 	}

					 	$sl++;

					 	?>






					<!-- Modal for Delete Button -->
					<div class="modal fade" id="item<?php echo $data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					       	Are you sure to delete this item!
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
					        <form method="GET"><button type="submit" name="delete" class="btn btn-danger" value="<?php echo $data['id']; ?>" >Delete</button></form>
					        
					      </div>
					    </div>
					  </div>
					</div>
					<!-- Modal end -->



					<!-- Modal for Update Button -->
					<div class="modal fade" id="update<?php echo $data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <form method="POST">
						      <div class="modal-body">
						       	<div class="form-group">
									<label for="">Your Name:</label>
									<input type="text" class="form-control" name="name" value="<?php echo $data['name'];?>">
								</div>
								<div class="form-group">
									<label for="">Your Email:</label>
									<input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>">
								</div>
								<div class="form-group">
									<select name="status" id="" class="form-control mt-3">
										<option value="1">--Select Status--</option>
										<option value="1">Active</option>
										<option value="2">Inactive</option>
									</select>
								</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
						        <button type="submit" name="update" class="btn btn-danger" value="<?php echo $data['id']; ?>" >Update</button>
						      </div>
					      </form>
					    </div>
					  </div>
					</div>
					<!-- Update Modal End -->


				<?php

					/*--- end while loop ---*/
			 		}

			 	?>
			 	</tbody>
			 </table>

		</div>
	</div>



			





	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js" integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#myTable').DataTable();
		} );
	</script>
	
</body>
</html>