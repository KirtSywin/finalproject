<?php
	require_once 'connection/connect.php';
	if(ISSET($_POST['add_guest'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$email = $_POST['email'];
		$checkin = $_POST['date'];
		$days = $_POST['days'];
		$conn->query("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno,email) VALUES('$firstname', '$middlename', '$lastname', '$address', '$contactno', '$email')") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' && `lastname` = '$lastname' && `contactno` = '$contactno' && `email` = '$email'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'") or die(mysqli_error());
		$row = $query2->num_rows;
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin,days) VALUES('$guest_id', '$room_id', 'Pending', '$checkin','$days')") or die(mysqli_error());
							header("location:reply_reserve.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	
?>