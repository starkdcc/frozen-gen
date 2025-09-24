<?php

include "inc/header.php";

if ($_SESSION['rank'] < "5") {
	header('Location: index.php?error=no-admin');
	exit();
}

if (isset($_GET['read'])){
	$id = sec_tag($con, $_GET['read']);
	mysqli_query($con, "UPDATE `support` SET `read` = '1' WHERE `id` = '$id'") or die(mysqli_error($con));
	echo '
		<script>
			window.history.replaceState("object or string", "Title", "/admin-support.php");
		</script>
	';
}

if (isset($_GET['delete'])){
	$id = sec_tag($con, $_GET['delete']);
	mysqli_query($con, "DELETE FROM `support` WHERE `id` = '$id'") or die(mysqli_error($con));
	echo '
		<script>
			window.history.replaceState("object or string", "Title", "/admin-support.php");
		</script>
	';
}

if (isset($_POST['reply']) & isset($_POST['id']) & isset($_POST['to']) & isset($_POST['subject'])){
	$reply = sec_tag($con, $_POST['reply']);
	$id = sec_tag($con, $_POST['id']);
	$to = sec_tag($con, $_POST['to']);
	$subject = sec_tag($con, $_POST['subject']);
	mysqli_query($con, "INSERT INTO `support` (`from`, `to`, `subject`, `message`, `date`) VALUES ('Admin', '$to', '$subject', '$reply', DATE('$date'))") or die(mysqli_error($con));
	mysqli_query($con, "UPDATE `support` SET `read` = '1' WHERE `id` = '$id'") or die(mysqli_error($con));
}


$result = mysqli_query($con, "SELECT * FROM `support`") or die(mysqli_error($con));
$totaltickets = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `support` WHERE `to` = 'Admin'") or die(mysqli_error($con));
$receivedtickets = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `support` WHERE `from` = 'Admin'") or die(mysqli_error($con));
$senttickets = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `support` WHERE `read` = '0'") or die(mysqli_error($con));
$unansweredtickets = mysqli_num_rows($result);

if($receivedtickets == 0){
	$replystatus = 0;
}else{
	$replystatus = $senttickets / $receivedtickets * 100;
}


if($receivedapplications == 0){
	$replystatus = 0;
}else{
	$replystatus = $sentapplications / $receivedapplications * 100;
}

if (isset($_POST['adduser']) && isset($_POST['password']) && isset($_POST['rank'])){
	$username = sec_tag($con, $_POST['adduser']);
	$password = sec_tag($con, md5($_POST['password']));
	$email = sec_tag($con, $_POST['email']);
	$rank = sec_tag($con, $_POST['rank']);
	mysqli_query($con, "INSERT INTO `users` (`username`, `password`, `email`, `rank`, `date`) VALUES ('$username', '$password', '$email', '$rank', DATE('$date'))") or die(mysqli_error($con));
}

if (isset($_GET['read'])){
	$id = sec_tag($con, $_GET['read']);
	mysqli_query($con, "UPDATE `apply` SET `read` = '1' WHERE `id` = '$id'") or die(mysqli_error($con));
	echo '
		<script>
			window.history.replaceState("object or string", "Title", "manage-support.php");
		</script>
	';
}

if (isset($_GET['delete'])){
	$id = sec_tag($con, $_GET['delete']);
	mysqli_query($con, "DELETE FROM `support` WHERE `id` = '$id'") or die(mysqli_error($con));
	echo '
		<script>
			window.history.replaceState("object or string", "Title", "/admin-support.php");
		</script>
	';
}

if (isset($_POST['reply']) & isset($_POST['id']) & isset($_POST['to']) & isset($_POST['subject'])){
	$reply = sec_tag($con, $_POST['reply']);
	$id = sec_tag($con, $_POST['id']);
	$to = sec_tag($con, $_POST['to']);
	$subject = sec_tag($con, $_POST['subject']);
	mysqli_query($con, "INSERT INTO `support` (`from`, `to`, `subject`, `message`, `date`) VALUES ('Admin', '$to', '$subject', '$reply', DATE('$date'))") or die(mysqli_error($con));
	mysqli_query($con, "UPDATE `support` SET `read` = '1' WHERE `id` = '$id'") or die(mysqli_error($con));
}
	
$totalalts = 0;
$result = mysqli_query($con, "SELECT * FROM `generators`") or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)) {
	$result2 = mysqli_query($con, "SELECT * FROM `generator$row[id]` WHERE `status` != '0'") or die(mysqli_error($con));
	$totalalts = $totalalts + mysqli_num_rows($result2);
}
$result = mysqli_query($con, "SELECT * FROM `freegenerators`") or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)) {
    $result2 = mysqli_query($con, "SELECT * FROM `freegenerator$row[id]` WHERE `status` != '0'") or die(mysqli_error($con));
    $totalfree = $totalfree + mysqli_num_rows($result2);
}

$totalfreenpaid = $totalalts + $totalfree + $privtotalalts;
$result = mysqli_query($con, "SELECT * FROM `users`") or die(mysqli_error($con));
$totalusers = mysqli_num_rows($result);

if (isset($_GET['delete'])){
	$id = mysqli_real_escape_string($con, $_GET['delete']);
	mysqli_query($con, "DELETE FROM `news` WHERE `id` = '$id'") or die(mysqli_error($con));

	echo '
		<script>
			window.history.replaceState("object or string", "Title", "index.php");
		</script>
	';
}
if (isset($_POST['addnews'])){
    $title = sec_tag($con, $_POST['addtitle']);
	$message = sec_tag($con, $_POST['addnews']);
    $colourp = sec_tag($con, $_POST['coloured']);
	mysqli_query($con, "INSERT INTO `news` (`title`, `message`, `writer`, `date`, `colour`) VALUES ('$title', '$message', '$_SESSION[username]', '$datetime', '$colourp')") or die(mysqli_error($con));
}

if (isset($_POST['newsid']) && isset($_POST['editmessage'])){
	$id = sec_tag($con, $_POST['newsid']);
	$title = sec_tag($con, $_POST['edittitle']);
	$message = sec_tag($con, $_POST['editmessage']);
	mysqli_query($con, "UPDATE `news` SET `message` = '$message' WHERE `id` = '$id'") or die(mysqli_error($con));
	mysqli_query($con, "UPDATE `news` SET `title` = '$title' WHERE `id` = '$id'") or die(mysqli_error($con));

}
$result = mysqli_query($con, "SELECT * FROM `news`") or die(mysqli_error($con));
$totalnews = mysqli_num_rows($result);
$result = mysqli_query($con, "SELECT * FROM `news` WHERE DATE(date) = '$date'") or die(mysqli_error($con));
$todaysnews = mysqli_num_rows($result);
$generatestotal = 0;
$result = mysqli_query($con, "SELECT * FROM `statistics` WHERE `username` = '$username'") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)) {
	$generatestotal = $generatestotal + $row['generated'];
}
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `date` = '$date'") or die(mysqli_error($con));

$todaysusers = mysqli_num_rows($result);
$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `active` = '1' AND `expires` >= '$date'") or die(mysqli_error($con));
$activesubscriptions = mysqli_num_rows($result);
$privtotalalts = 0;
$result = mysqli_query($con, "SELECT * FROM `privgenerators`") or die(mysqli_error($con));

while($row = mysqli_fetch_assoc($result)) {
	$result2 = mysqli_query($con, "SELECT * FROM `privgenerator$row[id]` WHERE `status` != '0'") or die(mysqli_error($con));
	$privtotalalts = $privtotalalts + mysqli_num_rows($result2);
}
$privgeneratestotal = 0;
$result = mysqli_query($con, "SELECT * FROM `privstatistics` WHERE `username` = '$username'") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)) {
	$privgeneratestotal = $privgeneratestotal + $row['generated'];
}

?>
<?php include("noob/header.php"); ?>
 
  <div class="row">
         <div class="col-md-8 grid-margin">
              <div class="card">
                <div class="card-body">
                  <center><h4 class="card-title">News & Updates</h4></center>
                  
                  
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-2" class="table table-striped">
		<?php
								$supportquery = mysqli_query($con, "SELECT * FROM `support` WHERE `to` = 'Admin' ORDER BY `date` DESC") or die(mysqli_error());
								while ($row = mysqli_fetch_assoc($supportquery)) {
									echo '
										<a href="#" style="margin-top: 5px;" class="list-group-item ';
									if($row['read'] != "1"){
									echo 'active';
									}
									echo '" data-toggle="collapse" data-target="#message'.$row[id].'" data-parent="#menu">
											<span class="name" style="min-width: 120px;display: inline-block;">'.$row["from"].'</span> <span class="">'.$row["subject"].'</span>
												<span class="badge">'.$row["date"].'</span> 
												<span class="badge"><i class="fa fa-plus"></i></span>
											</span>
										</a>
										<div id="message'.$row[id].'" class="sublinks collapse" style="background:#F1F2F7;">
											<textarea class="form-control" rows="8" disabled>'.$row[message].'</textarea></br>
											<form method="POST" action="manage-support.php" id="reply" name="reply">
												<textarea name="reply" class="form-control" rows="4"></textarea></br>
												<input type="hidden" name="id" value="'.$row[id].'"/>
												<input type="hidden" name="to" value="'.$row[from].'"/>
												<input type="hidden" name="subject" value="'.$row[subject].'"/>
												<button type="submit" style="margin-left: 5px;width:495px;" class="btn btn-info btn-large">Send Reply</button>
												<div class="btn-group">
													<a style="width:150px;" href="manage-support.php?read='.$row[id].'" class="btn btn-primary btn-large">Set Read</a>
													<a style="width:150px;" href="manage-support.php?delete='.$row[id].'" class="btn btn-default btn-large">Delete</a>
												</div></br></br>
											</form>
											
				

				
											
										</div>
									';
								}
								?>
						
			  </tbody></thead>
                  </table>
                </div>
              </div>	</div>	</div>

  <div class="col-md-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Todo</h4>
									<div class="add-items d-flex">
										<input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
										<button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
									</div>
									<div class="list-wrapper">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
						          <li><a href="#"> <strong><i class="fa fa-envelope"></i></strong>&nbsp; Total Tickets<span class="label label-primary pull-right r-activity"><?php echo $totaltickets;?></span></a></li>
                                  <li><a href="#"> <strong><i class="fa fa-download"></i></strong>&nbsp; Received Tickets<span class="label label-warning pull-right r-activity"><?php echo $receivedtickets;?></span></a></li>
								  <li><a href="#"> <strong><i class="fa fa-upload"></i></strong>&nbsp; Sent Tickets<span class="label label-success pull-right r-activity"><?php echo $senttickets;?></span></a></li>
								  <li><a href="#"> <strong><i class="fa fa-remove"></i></strong>&nbsp; Unanswered Tickets<span class="label label-info pull-right r-activity"><?php echo $unansweredtickets;?></span></a></li>
								</ul></br>
								<legend></legend>
								<center><font size="3"><strong><i class="fa fa-upload"></i></strong>&nbsp; Reply Status</font></center></br>
								<div class="progress progress-striped active progress-sm">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $replystatus;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $replystatus;?>%">
                                      <span class="sr-only"><?php echo $replystatus;?>% Complete</span>
		</tbody></thead>
                  </table>
                </div>
              </div>	</div></div>	</div>
                </div> <!-- content -->



     <?php include("noob/footer.php"); ?>

    </body>

</html>