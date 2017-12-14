<?php 
	date_default_timezone_set('Europe/Stockholm');
	
	use Functionality\Controller\Controller;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Comment</title>
		<link rel="stylesheet" type="text/css" href="../css/BasicLayout.css"/>
	</head>
	
	<body>
		
		<?php
		
		function setComments($food){
			echo "<div id='commentform'>
					<input id = 'commentUserID' type = 'hidden' name = 'uid' value = '".$_SESSION['e']."'>
					<input id = 'commentDate' type = 'hidden' name = 'date' value = '".date('Y-m-d H:i:s')."'>
					<input id = 'entryPage' type = 'hidden' name = 'food' value = '$food'>
					<textarea id = 'commentEntry' class = 'textArea' name='message' rows='3' cols='40' placeholder='Write your opinion or ask a question'></textarea>
					<div>
						<button onclick = 'postComment()'>Skicka Kommentar</button>
					</div>
				</div>"; 
		}
			
		function getComments($food){
			
			echo "<label id='userLabel' for='comment'>";
			if(isset($_SESSION['e'])){
					echo $_SESSION['e'];
					echo"</label>";
			}
			else{
				echo"</label>";
			}
			
			echo "<div id = conversation></div>";
			/**json_encode here and the rest in javascript*/
			/** while($row = mysqli_fetch_assoc($result)){
				if($row['dish'] == $food){
					
					if(isset($_SESSION['e']) && $_SESSION['e'] == $row['user_id']){
						echo "<div class = 'commentDiv'><div class = 'deletebox'>
							<div class = 'delete-form'>
								<input id = 'row' type = 'hidden' name = 'c_id' value = '".$row['c_id']."'>
								<input id = 'commentPage' type = 'hidden' name = 'food' value = '$food'>
								<button id = 'delteButton' class = 'commentDeleteButton' name = 'commentDelete'>Delete</button>
							</div></div>";
							
							echo "<div class = 'comment'>";
								echo $row['user_id']. "<br>";
								echo $row['date']. "<br><div class = 'message'>Comment: ";
								echo $row['message']. "</div><br><br>";
							echo "</div></div>"; 
							
					}
					else{
						echo "<div class = 'comment-boxes'>";
							echo $row['user_id']. "<br>";
							echo $row['date']. "<br><div class = 'message'>Comment: ";
							echo $row['message']. "</div><br><br>";
						echo "</div>";
					}
					 
				}
			
		} */
		}
		?>
	</body>
</html>