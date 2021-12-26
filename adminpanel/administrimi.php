<?php 
$admini = 'active'; 
include 'include/header.php';
include 'db.php';

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  


      <?php 
      if(isset($_SESSION['mezashi']) && isset($_SESSION['code']) !="")
{ 
?>
<script>

swal({
  title: " <?php echo $_SESSION ['mezashi']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['code']; ?>",
  button: "Done", 
})

</script>
<?php
unset($_SESSION['mezashi']); 

} 


?>




<html>




  

<body>


<div id="container">

<
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href='stili/tabela.css' rel='stylesheet' type='text/css'> 
<script src="js/tabela.js"></script>
<link href='stili/footer.css' rel='stylesheet' type='text/css'>




</head>
<body>
<div class="container-xl">


					
                 
    

<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
                
                
                
                					
					<div class="col-sm-6">
                    
                    
						<h2>Lista e <b>Adminave</b></h2>
					</div>
					<div class="col-sm-6">
                    <a href="#shtoModal" class="btn btn-success button"  data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Shto Admini e ri</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>			              
						<th>ID</th>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th>Username</th>
						<th>Veprimet</th>
					</tr>
				</thead>
				<tbody> 
                 <?php 

$query = "SELECT * FROM admin";
$test = mysqli_query($connection, $query);



                while($rows = mysqli_fetch_assoc($test)) { 
 
    
         $id = $rows['id'];         
      $emri = $rows['emri'];
      $mbiemri = $rows['mbiemri'];
      $username = $rows['username'];
      $email = $rows['email'];

                
       ?>
					<tr>
						<td><?php echo $id ?></td>
                        <td><?php echo $emri ?></td>
                        <td><?php echo $mbiemri ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $username ?></td>
						<td>
                            <a href="#editEmployeeModal" class="edit get_id" data-id="<?php echo $id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
<?php } ?> 
                     
                    
				</tbody>
			</table>
			
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="shtoModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="procesi.php">
				<div class="modal-header">						
					<h4 class="modal-title">Shto nje Admin te ri</h4>

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
              
                <div class="form-group">
                <label for="formGroupExampleemri">Emri</label>
                <input type="text" name="emri" class="form-control" id="formGroupExampleInput" placeholder="Emri">
                 </div>
                 <div class="form-group">
                  <label for="formGroupExamplembiemri">Mbiemri</label>
                 <input type="text" name="mbiemri" class="form-control" id="formGroupExampleInput2" placeholder="Mbiemri">
                  </div>
                   <div class="form-group">
                  <label for="formGroupExamplembiemri">Email</label>
                 <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                  </div>
                  <div class="form-group">
                  <label for="formGroupExamplembiemri">Username</label>
                 <input type="text" name="username" class="form-control" id="formGroupExampleInput2" placeholder="Username">
                  </div>
                   <div class="form-group">
                  <label for="formGroupExamplembiemri">Password</label>
                 <input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                  </div>
                  
                 
					
				</div>
                
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="submit" name="shtoadmin" class="btn btn-success">Add Admin</button>
				</div>
                
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="procesi.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edito Adminin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div id="load_data" class="modal-body">	 

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					 <button type="submit" name="ruajadmin" class="btn btn-info">Ruaje</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Fshij Adminin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>A jeni te sigurt se doni ta fshini ? </p>
					<p class="text-warning"><small>Ky veprim nuk mund te kthehet. </small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<a href="#" class="btn btn-danger"  id="modalDelete">Delete</a>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
               
   </div>
   
   
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=2">
<style>

</style>
</head>
<body>
<div class="footer">
  <p>Egzon Admin Panel CMS </p>
</div>

</body>
</html> 
</div>
</body>
</body>
</html>


<script> 

$(document).ready(function() {
  $('#deleteEmployeeModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $('#modalDelete').attr('href', 'procesi.php?deleteadmin=' + id);
  });
});
</script> 

      <script>
	  
	  $(document).ready(function(){
		  $(".get_id").click(function(){
			  var ids = $(this).data('id');
			   $.ajax({
				   url:"editadmin.php",
				   method:'POST',
				   data:{id:ids},
				   success:function(data){
					   
					   $('#load_data').html(data);
				   
				   }
				   
			   })
		  })
		  
	  })
	  
	  
	  
	  
	  
	  
	  </script>
