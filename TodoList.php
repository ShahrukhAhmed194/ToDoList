
<?php 
   $error =  "";
   $db=mysqli_connect('localhost','root','','todolist' );

   if(isset($_POST['submit'])){

   	   $task = $_POST['task'];
   	   if (empty($task)) {
   	   	$error = "You must set a task.";
   	   }
   	   else{
   	   	 mysqli_query($db, "INSERT INTO tasks(task) VALUES ('$task')");
   	   }


   }
   if (isset($_GET['id'])) {
       $id = $_GET['id'];

      mysqli_query($db, "DELETE FROM tasks WHERE id='$id'");
      
   }

   
   	   

  $tasks = mysqli_query($db,"SELECT * FROM tasks");
    $i=1;
   

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="heading">
		<h2>Todo List application with php and MySQL</h2>
     </div>
     <form method="post" action="">
     	<?php if (isset($error)) {?>

     		<p> <?php echo $error; ?> </p>
        <?php } ?>
     	<input type="text" name="task" class="task_input" placeholder="What would you like to add?">
     	<button type ="submit" class="add_btn" name="submit">add task</button>
     </form>
      
     <table> 

     	<thead>
      <div class="image"> <img src="task.jpg" alt="Myself" height="150" width="125"></div>
      <div>
     	 <tr>
     		<th>No</th>
     		<th>Task</th>
     		<th style="text-align: center;">Action</th>
     	</tr>
     	</thead>
     	<tbody>
     		<?php while ($row = mysqli_fetch_array($tasks)) {?>

     			<tr>
     			<td style="text-align: center;"><?php echo $i++;  ?></td>
     			<td class="task"><?php echo $row['task']; ?></td>
     			<td class="delete" style="text-align: center;">
     				<a href="TodoList.php?id=<?php echo $row['id']; ?>">x</a>
     			</td>

     		
     		</tr>
     		<?php } ?>
     	</tbody>
     </table>
     </div>
     <div class="shadow_box"><h6>Adding Regular Tasks.<br>Deleting Unwanted or Completed Tasks.</h6></div>

     
</body>

</html>