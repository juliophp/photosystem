<?php
    include '../includes/functions.php';
    include '../includes/header.php';


?>
<?php
	if(isset($_GET["user"]))
	{
		$userrid = $_GET["user"];
	}
	$user = ReadUserDetails($userrid); 
	if(AdmUpdateUser($_POST, $userrid))
		header("location:users.php");
?>

<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center" style="background-color: #d3d3d3;">
					<form class="form-horizontal" method="post" action="">
						


						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" value="<?php echo "$user[username]";?>" id="username" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="password" value="<?php echo "$user[password]";?>" id="password" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="role" class="cols-sm-2 control-label">Role</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <select class="form-control" name="role" id="role"  placeholder="Select Role" />
                                    <option <?php if($user["role"]=="user") echo "selected='selected'"; else {} ?>>user</option>
                                    <option <?php if($user["role"]=="admin") echo "selected='selected'"; else {} ?>>admin</option>
                                    </select>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" name="update" class="btn btn-success btn-md btn-block login-button">Edit User</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>