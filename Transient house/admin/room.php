<!DOCTYPE html>
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
?>
<html lang = "en">
	<head>
		<title>Casa's Transient House</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel="stylesheet"  type="text/css" href="../css/css_footer.css">
       
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Casa's Transient House Online Reservation</a>		
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></i> <?php echo $name;?></a>
				</li>
				<li><a href = "index.php">Logout</a></li>	
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
		<li><a href = "home.php">Home</a></li>
			<li class = ""><a href = "registered_user.php">Registered Accounts</a></li>
			<li><a href = "account.php">Accounts</a></li>
			<li class = ""><a href = "reserve.php">Reservation</a></li>
			<li class = "active"><a href = "room.php">Room</a></li>				
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Transaction / Room</div>
				<a class = "btn btn-success" href = "add_room.php"><i class = "glyphicon glyphicon-plus"></i> Add Room</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Room Type</th>
							<th>Price</th>
							<th>Description</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `room`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['room_type']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><?php echo $fetch['descr']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
							<td><center><a class = "btn btn-warning" href = "edit_room.php?room_id=<?php echo $fetch['room_id']?>"></i> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../admin_query/delete_room.php?room_id=<?php echo $fetch['room_id']?>"> Delete</a></center></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />
	<footer class = "footer">
            <div class = "footer-container">
                <div>
                    <h2>About Us </h2>
					<p>This web-based reservation system that makes it easier for customers to pair up with Casa's Transient House.
						They will capable of choosing rooms that fit within their budget.They will aslo discover wether there are any more rooms available or not.
					</p>
                    <ul class = "social-icons">
                        <li class = "flex">
                            <i class = "fa fa-twitter fa-2x"></i>
                        </li>
                        <li class = "flex">
                            <i class = "fa fa-facebook fa-2x"></i>
                        </li>
                        <li class = "flex">
                            <i class = "fa fa-instagram fa-2x"></i>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2>Useful Links</h2>
                    <a href = "#">Blog</a>
                    <a href = "#">Rooms</a>
                    <a href = "#">Subscription</a>
                    <a href = "#">Gift Card</a>
                </div>

                <div>
                    <h2>Privacy</h2>
                    <a href = "#">Career</a>
                    <a href = "#">About Us</a>
                    <a href = "#">Contact Us</a>
                    <a href = "#">Services</a>
                </div>

                <div>
                    <h2>Have A Question</h2>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-map-marker-alt"></i>
                        </span>
                        <span>
                             Maricaban, Tingloy, Batagas
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span>
                            +1234 567 89
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span>
                            casastransienthouse@gmail.com
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of footer -->
    

</body>

<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>