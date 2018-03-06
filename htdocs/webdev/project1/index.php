<?php 
require 'classes/Database.php';

$database = new Database;



$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_POST['submit'])) {
	$title = $_POST['title'];
	$body = $_POST['body'];

	$database->query('INSERT INTO post (title, body) VALUE (:title, :body)');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->execute();
	if($database->lastInsertId()){
		echo "<p>Post Added</p>";
	}
}

$database->query("Select * From post");
$row = $database->resultset();
?>




<h1>Add Posts</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<label>Post ID</label><br>
	<input type="text" name="id" placeholder="Specify ID ..."><br>
	<label>Post Title</label><br>
	<input type="text" name="title" placeholder="Insert your name ..."><br>
	<label>Post Body</label><br>
	<textarea name="body"></textarea>
	<input type="submit" name="submit" value="Submit">
</form>

<h1>Posts</h1>
<div>
<?php 

foreach ($row as $row) : ?>
	
		<h3><?php echo $row['title'] ?></h3>
		<p><?php echo $row['body'] ?></p>
	</div>

<?php endforeach ?>