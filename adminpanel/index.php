<?php 

$indeks = 'active';
include 'include/header.php';
include 'db.php';
?>



<html>

<?php 

$query = "SELECT * FROM filmi ORDER BY film_id DESC";
$test = mysqli_query($connection, $query);



                while($rows = mysqli_fetch_assoc($test)) { 
 
    
         $id = $rows['film_id'];         
      $foto = $rows['film_foto'];
       $title = $rows['film_title'];
 $data_filmit = $rows['film_date'];
 $koha = $rows['film_minute'];
       $rate = $rows['film_rate'];
       $zhan_id = $rows['zhan_id'];
       
                }
       ?>
  

<body>


<div id="container">

<
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      
      <link rel="stylesheet" href="stili/dataTables.bootstrap5.min.css">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
      
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

<script>
$(document).ready(function() {
    $('#search').DataTable();
} );
</script>

      

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
						<h2>Lista e <b>Filmave</b> te publikuar </h2>
					</div>
					<div class="col-sm-6"> 
              				
						<a href="shtofilm.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Shto film te ri</span></a>	
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Fshij</span></a>						
					</div>
				</div>
			</div>
			<table id="search" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th style="width: 50px">Foto</th>                    
						<th>Titulli</th>
                        <th>Zhanri</th>
						<th>Minutazhi</th>
						<th>Data</th> 
						<th>Veprimet</th>
					</tr>
				</thead>
				<tbody> 
                 <?php 

$query = "SELECT * FROM filmi ORDER BY film_id DESC";
$test = mysqli_query($connection, $query);



                while($rows = mysqli_fetch_assoc($test)) { 
 
    
         $id = $rows['film_id'];         
      $foto = $rows['film_foto'];
       $title = $rows['film_title'];
 $data_filmit = $rows['film_date'];
 $koha = $rows['film_minute'];
       $rate = $rows['film_rate'];
        $zhanri = $rows['zhan_id'];
        
                 $esql = "SELECT * FROM zhanre WHERE zhan_id='$zhanri'";
                                     $dsql = mysqli_query($connection, $esql);
         
                                   $rota = mysqli_fetch_assoc($dsql);
         
                                         $zhan_title = $rota['zhan_title']; 
       
               
       ?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="checkbox[]" value="<?php echo $id ?>">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><img class="img-responsive rounded" style="margin:auto"
						src="<?php echo $foto ?>" height="50px"	width="50px" alt="image"></td>
						<td><?php echo $title ?></td>
                        <td><?php echo $zhan_title ?></td>
						<td><?php echo $koha ?> Min</td>
						<td> <?php echo $data_filmit ?></td>
						<td>  
							<a href="#editEmployeeModal" class="edit" data-id="<?php echo $id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            <a href="#showEmployeeModal" class="get_id" data-id="<?php echo $id ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Show">&#xe8b8;</i></a>
                            <a href="/film.php?film=<?php echo $id ?>" class="showing" ><i class="material-icons" data-toggle="tooltip" title="Show Live">&#xE8f4;</i></a>
                            
						</td>
					</tr>  
                <?php } ?>                    
				</tbody>
			</table>
			
		
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Shto nje film te ri</h4>
					<button type="button" href="shtofilm.php" name="xoni" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add" href="shtofilm.php" >
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edito Filmin</h4> <style> .modal-title text-align=center; </style>
					

</body> 
</html> 
								
				</div>

				<div class="modal-body">					
					<p>A deshironi ta editoni filmin? </p>
					
				</div>

				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Anulo">
                    <a href="#" class="btn btn-info"  id="modaledit">Vazhdo</a>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Show Modal HTML -->
<div id="showEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="opa.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Show Filmin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div id="load_data" class="modal-body">	 

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					 <button type="submit" name="rujte" class="btn btn-info">Ruaje</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Fshij Filmin</h4>
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
  $('#editEmployeeModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $('#modaledit').attr('href', 'editofilmin.php?edit=' + id);
  });
});
</script> 
<script> 

$(document).ready(function() { 
  $('#deleteEmployeeModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $('#modalDelete').attr('href', 'process.php?fshirja=' + id);
  });
});
</script> 


<script> 

$(document).ready(function() {
  $('body').on('click', '.show',function(){
    document.getElementById("id").value = $(this).attr('data-id');
    console.log($(this).attr('data-id'));
  });
});
</script> 

      <script>
	  
	  $(document).ready(function(){
		  $(".get_id").click(function(){
			  var ids = $(this).data('id');
			   $.ajax({
				   url:"fetch.php",
				   method:'POST',
				   data:{id:ids},
				   success:function(data){
					   
					   $('#load_data').html(data);
				   
				   }
				   
			   })
		  })
		  
	  })
	  
	  
	  
	  
	  
	  
	  </script>
