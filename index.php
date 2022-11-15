<?php

include 'bootstrapper.php';

if (isset($_SESSION['USER_ID'])) {
header('location:' .URLROOT. '/index.php');
}

	$todo = new Todo($db_connect);
	$todoData = $todo->all_data();

	

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class=""> 
	<div class="container">
		<div class="d-flex justify-content-between">
		<?php echo $_SESSION['fullname'];?>
		<a href="logout.php">Logout</a>
		</div>
		<h3 class="text-center">Todo List App</h3>	
		<?php foreach ($todoData as $key => $td): ?>
		<div class="card">
			<div class="card-header">Todos</div>
			<div class="card-body">
				<?php echo $td->todo ?>
			</div>
		</div>
		</div>
<?php endforeach ?>
	</body>
			<button class="btn btn-success mt-2 w-100"data-bs-target="#addtodo" data-bs-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button> 
		</div> 
	</div>
	
		<div class="modal fade" tabindex="-1" id="addtodo">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title">Add Todo Form</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<input type="text" class="form-control form-control-lg rounded-0">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="addButton">Add</button>
			  </div>
			</div>
		  </div>
		</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
  </body>
</html>
