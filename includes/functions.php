<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "proj");
if(!$con)
{
	die("Error ". mysqli_error($con));
}

function log_in()
{
	global $con;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["username"]))
		$errormsg["username"] = "<li>Username field is empty</li>";
	if(empty($_POST["password"]))
		$errormsg["password"] = "<li>Password field is empty</li>";

	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		$username = mysqli_escape_string($con, trim($_POST["username"]));
		$password = mysqli_escape_string($con, trim($_POST["password"]));
		$query = "select * from users where username = '$username' and password = '$password'";
		$res = mysqli_query($con, $query);
		$user = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$count = mysqli_num_rows($res);
		if($count == 1)
		{
			$_SESSION["username"] = $username;
			$_SESSION["userid"] = $user["id"];
			$_SESSION["role"] = $user["role"];
		}
		else
		{
			$errormsg["login"] = "<li>Login Failed</li>";
		}
		if (isset($_SESSION["username"]) && $_SESSION["role"] == "user") {
			header("Location: public/");
		}
		else if (isset($_SESSION["username"]) && $_SESSION["role"] == "admin") {
			header("Location: admin/");
		}

	} 	
	if (isset($errormsg)) 
		{
			echo "<div class='alert alert-danger' role='alert'>"; 
			foreach ($errormsg as $value) {echo $value;}
			echo "</div>";
		}
	}
}

function AdmregUser()
{
	global $con;
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
			if(empty($_POST["name"]))
				$errormsg["name"] = "<li>Name field is empty</li>";
			if(empty($_POST["email"]))
				$errormsg["email"] = "<li>E-mail field is empty</li>";
			if(empty($_POST["username"]))
				$errormsg["username"] = "<li>Username field is empty</li>";
			if(empty($_POST["password"]))
				$errormsg["password"] = "<li>Password field is empty</li>";
			if(empty($_POST["confirm"]))
				$errormsg["confirm"] = "<li>Confirm password field is empty</li>";
			if ($_POST["password"] != $_POST["confirm"]) 		
				$errormsg["nomatch"] = "<li>Passwords dont Match</li>";

			if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["confirm"]))
			{
				//escape values and assign to variables
				$name = mysqli_real_escape_string($con,trim($_POST["name"]));
				$email = mysqli_real_escape_string($con,trim($_POST["email"]));
				$username = mysqli_real_escape_string($con,trim($_POST["username"]));
				$password = mysqli_real_escape_string($con,trim($_POST["password"]));
				$confirm = mysqli_real_escape_string($con,trim($_POST["confirm"]));
				$today = date("Y-m-d");;

				//check if password matches
				if($password == $confirm) 
				{
					//if pasword matches insert into database
					$query = "select * from users where username = '$username'";
					$res = mysqli_query($con, $query);
					if($res && mysqli_num_rows($res) > 0)
					{
						$errormsg["nametaken"] = "<li>Username already taken</li>";
					}
					else
					{
						$sql = "insert into users(name, email, username, password, date_registered) ";
						$sql .="values('$name', '$email', '$username', '$password', '$today')";
						$ins =mysqli_query($con, $sql);
							if($ins)
							{
								echo "You've been registered"; 
								header("Location:users.php");
							}
							else
							{
								die ("Insert Failed");
							}
					}
				}
			}
			if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
	}
}

function AdmUpdateUser($input, $userid)
{
	global $con;
	if(isset($_POST["update"]))
	{	
		    if(isset($input["username"])) 
		     $username = $input["username"];
		    if(isset($input["password"])) 
		     $password = $input["password"];
		    if(isset($input["role"]))
		     $role =$input["role"];
		    
		    $sql = "UPDATE users SET username = '$username', password = '$password', "; 
		    $sql .= "role = '$role' where id='$userid'";
		    $res = mysqli_query($con, $sql);
		    $count = mysqli_affected_rows($con);
		    if($count>0){
		    	$errormsg["post_success"]="<li>Successfull</li>";
		    	return true;
		    }
		    else {
		    	$errormsg["post_failed"]="<li>failed</li>";
		    	return false;
		    }
		    	
	}
	else
	{
		//$errormsg["post_err"] = "<li>only Post Request is allowed in this form</li>";
		
	}
	if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
}


function regUser()
{
	global $con;
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
			if(empty($_POST["name"]))
				$errormsg["name"] = "<li>Name field is empty</li>";
			if(empty($_POST["email"]))
				$errormsg["email"] = "<li>E-mail field is empty</li>";
			if(empty($_POST["username"]))
				$errormsg["username"] = "<li>Username field is empty</li>";
			if(empty($_POST["password"]))
				$errormsg["password"] = "<li>Password field is empty</li>";
			if(empty($_POST["confirm"]))
				$errormsg["confirm"] = "<li>Confirm password field is empty</li>";
			if ($_POST["password"] != $_POST["confirm"]) 		
				$errormsg["nomatch"] = "<li>Passwords dont Match</li>";

			if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["confirm"]))
			{
				//escape values and assign to variables
				$name = mysqli_real_escape_string($con,trim($_POST["name"]));
				$email = mysqli_real_escape_string($con,trim($_POST["email"]));
				$username = mysqli_real_escape_string($con,trim($_POST["username"]));
				$password = mysqli_real_escape_string($con,trim($_POST["password"]));
				$confirm = mysqli_real_escape_string($con,trim($_POST["confirm"]));
				$today = date("Y-m-d");;

				//check if password matches
				if($password == $confirm) 
				{
					//if pasword matches insert into database
					$query = "select * from users where username = '$username'";
					$res = mysqli_query($con, $query);
					if($res && mysqli_num_rows($res) > 0)
					{
						$errormsg["nametaken"] = "<li>Username already taken</li>";
					}
					else
					{
						$sql = "insert into users(name, email, username, password, date_registered) ";
						$sql .="values('$name', '$email', '$username', '$password', '$today')";
						$ins = mysqli_query($con, $sql);
							if($ins)
							{
								echo "You've been registered"; 
								header("Location: login.php");
							}
							else
							{
								die ("Insert Failed");
							}
					}
				}
			}
			if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
	}
}

function ReadUserDetails($id)
{
	global $con;
	$sql = "select * from users where id='$id'";
	$res = mysqli_query($con, $sql);
	$user = mysqli_fetch_array($res, MYSQLI_ASSOC);
	if($user["sex"]== 0) $user["sex"]="Female"; else $user["sex"] = "Male";
	if(!isset($user["dob"])) $user["dob"] = "NULL";
	if(!isset($user["bio"])) $user["bio"] = "NULL";

	return $user;
}

function UpdateUserDetails($img, $input, $userid)
{
	global $con;
	global $userid;
	$user = ReadUserDetails($userid);
	if(isset($_POST["update"]))
	{	
			if(isset($input["name"]))
			 $name = $input["name"]; 
		    if(isset($input["email"]))
		     $email = $input["email"];
		    if(isset($input["username"]))
		     $username = $input["username"];
		 	if(isset($img["avatar"]["name"]))
		 	{
		 		$ImgPath = "../img/";
                $ImgName = $img["avatar"]["name"];
                $ImgTemp = $img["avatar"]["tmp_name"];
                $ImgErr = $img["avatar"]["error"];
                $mv = move_uploaded_file($ImgTemp, $ImgPath.$ImgName);
                if($ImgName !="" && $ImgErr == 0 && $mv)
                {
                	$imgurl = $ImgPath.$ImgName; 
                }
                else
                {
                	//$errormsg["imgerr"]="Error there is a problem";
                	$imgurl=$user["photo"];
                }
		 	}


		    if(isset($input["gender"]))
		    {
		    	if($input["gender"]=="Female")
		    		$gender = 0;
		    	else if($input["gender"]=="Male")
		    		$gender=1;

		    }
		    if(isset($input["password"])) 
		     $password = $input["password"];
		    if(isset($input["dob"]))
		     $dob =$input["dob"];
		    if(isset($input["bio"]))
		     $bio= $input["bio"];
		    
		    //echo $dob;
		    $sql = "UPDATE users SET name = '$name', email = '$email', "; 
		    $sql .= "sex = '$gender', dob = '$dob', bio = '$bio', photo = '$imgurl' where id='$userid'";
		    $res = mysqli_query($con, $sql);
		    $count = mysqli_affected_rows($con);
		    if($count>0){
		    	$errormsg["post_success"]="<li>Successfull</li>";
		    	return true;
		    }
		    else {
		    	$errormsg["post_failed"]="<li>failed</li>";
		    	return false;
		    }
		    	
	}
	else
	{
		$errormsg["post_err"] = "<li>only Post Request is allowed in this form</li>";
		
	}
	if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
}

function DeleteUser($userid)
{
	global $con;
	$sql = "DELETE from users where id = '$userid'";
	$query = mysqli_query($con,$sql);
	$res = mysqli_affected_rows($con);
	if ($res > 0) 
	{
		$errormsg["success"] = "Row Deleted";
		return true;		
	}
	else
	{
		$errormsg["del_failed"] = "Row Failed to Delete";
		return false;
	}
}

function InsertPictures()
{
	global $con;
	global $userid;
	$user = ReadUserDetails($userid);
            if(isset($_POST["submit"]))
            {
                $ImgPath = "../img/";
                $ImgName = time().urlencode($_FILES["img"]["name"]);
                $ImgTemp = $_FILES["img"]["tmp_name"];
                $ImgErr =$_FILES["img"]["error"];
                $title = $_POST["title"];
                $caption = $_POST["caption"];
                //$today = date("Y-F-d");
                $uid = $user["id"];
                if($ImgName !="" && $ImgErr == 0)
                {
                    $mv = move_uploaded_file($ImgTemp, $ImgPath.$ImgName);
                    if ($mv)
                    {
                        //echo "<img src=\"$ImgPath$ImgName\" alt=\"An Image is here\"/>";
                        $sql = "INSERT into pictures(user_id, img_title, img_path, caption) ";
                        $sql .= "values('$uid','$title', '$ImgPath$ImgName', '$caption')";
                        $query = mysqli_query($con, $sql);
                        if($query)
                        {
                             $errmsg["success"]= "Photo Uploaded";
                        }
                        else
                        {
                            die("Error ". mysqli_error($con));
                        }
                    }

                }
           }
           else
           {
                //$errmsg["msg"]= "Click Submit to post images";
           }
           if(isset($errmsg)) 
               { 
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errmsg as $value) { echo $value; }
				echo "</div>";
               } 
}

function DisplayAllPictures()
{
	global $con;
	global $userid;
	$sql = "SELECT u.username, p.id, p.user_id, p.img_path, p.img_title, ";
	$sql .= "p.time_created, p.caption from pictures p, users u "; 
	$sql .= "where u.id = p.user_id order by id desc";
	$query = mysqli_query($con,$sql);
	while ($res = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		echo "<div class=\"row\">";
         echo "<div class=\"col-md-1 text-center\">";
             echo "<p><i class=\"fa fa-camera fa-4x\"></i></p>";
                echo "<p>$res[time_created]</p>";
            echo "</div>";
            echo "<div class=\"col-md-5\">";
                echo "<a href=\"full_img.php?user=$res[user_id]&pic=$res[id]\">";
                  echo "<img class=\"img-responsive img-hover\" src=\"$res[img_path]\" width=\"600\" height=\"300\">";
                echo "</a>";
            echo "</div>";
            echo "<div class=\"col-md-6\">";
                echo "<h3>";
                    echo "<a href=\"full_img.php?user=$res[user_id]&pic=$res[id]\">$res[img_title]</a>";
                echo "</h3>";
                echo "<p>by <a href=\"profile.php?user=$res[user_id]\">$res[username]</a></p>";
                echo "<p>$res[caption]</p>";
                echo "<a class=\"btn btn-primary\" href=\"full_img.php?user=$res[user_id]&pic=$res[id]\"> <i class=\"fa fa-eye\"> View Full Pic</i></a>   ";
                if ($userid==$res["user_id"]) {
                	echo "<a class=\"btn btn-success\" href=\"edit_pic.php?user=$res[user_id]&pic=$res[id]\"><i class=\"fa fa-edit\"></i> Edit Pic</a>    ";
                	echo "<a class=\"btn btn-danger\" href=\"delete_pic.php?user=$res[user_id]&pic=$res[id]\"><i class=\"fa fa-remove\"></i> Delete Pic</a>    ";
                }
                //echo "<a class=\"btn btn-warning\" href=\"edit_pic.php?user=$res[user_id]&pic=$res[id]\">Edit Pic <i class=\"fa fa-angle-right\"></i></a>    ";
            echo "</div>";
        echo "</div>";
        //<!-- /.row -->

        echo "<hr>";
	}
}

function DisplayFullPictures($user_id,$picid)
{
	global $con;

	//$sql = "SELECT * from pictures where id = '$picid' and user_id = '$user_id'";
	$sql = "select u.username, p.user_id, p.img_title, p.caption, p.img_path, ";
	$sql .= "p.time_created from pictures p, users u where p.user_id=u.id and p.id=$picid";

	$query = mysqli_query($con,$sql);

	$res = mysqli_fetch_array($query, MYSQLI_ASSOC);

	if ($res > 0) 
	{
			 //<!-- Page Content -->
	 echo "<div class='container'>";   
	        //<!-- Page Heading/Breadcrumbs -->
	      echo "<div class='row'>";  
		  echo "<div class='col-md-1'>";      
	                
	      echo "</div>";      
	      echo "<div class='col-lg-9'>";
	            echo "<h1 class='page-header'>$res[img_title] ";
	                 echo "<small>by <a href='profile.php?user=$res[user_id]'>$res[username]</a>";
	                    echo "</small>";
	                echo "</h1>";
	                echo "<ol class='breadcrumb'>";
	                    echo "<li><a href='index.php'>Home</a>";
	                    echo "</li>";
	                    echo "<li class='active'>Photos</li>";
	                echo "</ol>";
	           echo "</div>";
	        echo "</div>";
	        //<!-- /.row -->
      echo "<div class='row'>";
      echo "<div class='col-md-1'>";
                
       echo "</div>";

            //<!-- Blog Post Content Column -->
        echo "<div class='col-lg-9'>";

                //<!-- Blog Post -->


                //<!-- Date/Time -->
                echo "<p><i class=\"fa fa-clock-o\"></i> Posted on $res[time_created]</p>";


                //<!-- Preview Image -->
                echo "<img class=\"img-responsive\" src=\"$res[img_path]\" alt=\"\">";


                //<!-- Post Content -->
                echo "<br/>";
                echo "<p class=\"lead\">$res[caption]</p>";
                





		
	}
}

function EditPictures($user_id, $picid)
{
	global $con;
     $sql = "SELECT * from pictures where id = '$picid' and user_id = '$user_id'";
	 $query = mysqli_query($con,$sql);
	 $res = mysqli_fetch_array($query, MYSQLI_ASSOC);
	 if ($res > 0) 
	{
		return $res;
	}
}

function UpdatePictures($user_id, $picid)
{
	global $con;
	$pic = EditPictures($user_id, $picid);
           if(isset($_POST["submit"]))
            {
                $ImgPath = "img/";
                $ImgName = urlencode($_FILES["img"]["name"]);
                $ImgTemp = $_FILES["img"]["tmp_name"];
                $ImgErr =$_FILES["img"]["error"];
                $title = $_POST["title"];
                $caption = $_POST["caption"];
               
                $mv = move_uploaded_file($ImgTemp, $ImgPath.time().$ImgName);
                if($ImgName !="" && $ImgErr == 0 && $mv)
                    {
                        //echo "<img src=\"$ImgPath$ImgName\" alt=\"An Image is here\"/>";
                        $ImgUrl = $ImgPath.time().$ImgName;
                    }
	                  else 
	                 {
	                   	 $ImgUrl = $pic["img_path"];
	                 }


                $sql = "UPDATE pictures SET img_title = '$title', ";
                        $sql .= "img_path = '$ImgUrl', caption = '$caption' ";
                        $sql .= "WHERE id='$picid' and user_id='$user_id'";
                        $query = mysqli_query($con, $sql);
                        if($query)
                        {
                             return true;
                        }
                        else
                        {
                            die("Error ". mysqli_error($con));
                        }

           }
           else
           {
                //$errmsg["msg"]= "Click Submit to post images";
           }
           if(isset($errmsg)) 
               { 
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errmsg as $value) { echo $value; }
				echo "</div>";
               } 
}

function DeletePicture($userid, $picid)
{
	global $con;
	$sql = "DELETE from pictures where id='$picid' and user_id = '$userid'";
	$query = mysqli_query($con,$sql);
	$res = mysqli_affected_rows($con);
	if ($res > 0) 
	{
		$errormsg["success"] = "Row Deleted";
		return true;		
	}
	else
	{
		$errormsg["del_failed"] = "Row Failed to Delete";
		return false;
	}
}

function CreateComment($userid,$picid, $commuser, $text)
{

	global $con;
	$comment = mysqli_real_escape_string($con, trim($text["comment"]));
	$sql = "INSERT into comments(user_id, photo_id, text, comm_user) ";
	$sql .= "values ('$userid', '$picid', '$comment', '$commuser')";

	$query = mysqli_query($con, $sql);
	if($query)
	{
		return true;
	}
	else
	{
		die("Error ". mysqli_error($con));
		return false;
	}
}

function ReadComment($usersid, $picid, $uid)
{
	global $con;
	global $userid;
	$sql = "select u.photo, c.id, c.user_id, c.photo_id, c.comm_user, u.username, c.text, c.time_created from users u, comments c ";
	$sql .= "where user_id=$usersid and photo_id = $picid and c.comm_user = u.id";

	$query = mysqli_query($con, $sql);

	echo "<div class=\"well\">";
	while($res = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
    echo "<div class=\"media\">";
                    echo "<a class=\"pull-left\" href=\"#\">";
                        echo "<img class=\"media-object\" src=\"$res[photo]\" alt=\"\" height=\"64\" width=\"64\">";
                    echo "</a>";
                    echo "<div class=\"media-body\">";
                    echo   "<h4 class=\"media-heading\">$res[username]
                            <small>$res[time_created]</small>
                        </h4>";
                        echo "$res[text]";
                   echo "</div>";
                   if($userid==$res["comm_user"])
                   {
                   	echo "<a class=\"btn btn-link\" href=\"editcomment.php?user=$res[user_id]&pid=$res[photo_id]&cid=$res[id]\">Edit </a>";
                   	echo "<a class=\"btn btn-link\" href=\"deletecomment.php?user=$res[user_id]&pid=$res[photo_id]&cid=$res[id]\"> Delete</a>";
                   } 
                echo "</div>";
             echo "<hr>";
   
	}
	echo "</div>";

	 mysqli_free_result($query);
}

function SelectSingleComment($picid, $cid)
{
	global $con;
	global $userid;
	$sql = "select * from comments ";
	$sql .= "where id=$cid and photo_id = $picid and comm_user = $userid";

	$query = mysqli_query($con, $sql);
	$res = mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $res;
}

function EditComment($comment,$picid,$cid)
{
	global $con;
	global $userid;
		    $sql = "UPDATE comments SET text = '$comment' "; 
		    $sql .= "where comm_user='$userid' and photo_id='$picid' and id='$cid'";
		    $res = mysqli_query($con, $sql);
		    $count = mysqli_affected_rows($con);
		    if($count>0){
		    	$errormsg["post_success"]="<li>Successfull</li>";
		    	return true;
		    }
		    else {
		    	$errormsg["post_failed"]="<li>failed</li>";
		    	return false;
		    }
		    	
	
	
	if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
}

function DeleteComments($comment_id,$picid)
{
	global $con;
	global $userid;
	$sql = "DELETE from comments where id=$comment_id and photo_id=$picid";
	$query = mysqli_query($con,$sql);
	$res = mysqli_affected_rows($con);
	if ($res > 0) 
	{
		$errormsg["success"] = "Row Deleted";
		return true;		
	}
	else
	{
		$errormsg["del_failed"] = "Row Failed to Delete";
		return true;
	}

	if(isset($errormsg))
			{
				echo "<div class=\"alert alert-danger\" role=\"alert\">";
				foreach ($errormsg as $value) { echo $value; }
				echo "</div>";
			} 
}

function DisplayPicturesFront()
{
	global $con;
	global $userid;
	$sql = "SELECT u.username, p.id, p.user_id, p.img_path, p.img_title, ";
	$sql .= "p.time_created, p.caption from pictures p, users u "; 
	$sql .= "where u.id = p.user_id order by rand()	 desc limit 3";
	$query = mysqli_query($con,$sql);
	while ($res = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		echo "<div class=\"col-sm-4\">";
         echo "<div class=\"thumbnail\">";
             echo "<img src=\"$res[img_path]\" alt=\"$res[caption]\">";
                echo "<p><strong>$res[username]</strong></p>";
                echo "<p>$res[caption]</p>";
            echo "</div>";
            echo "</div>";

    }
}

function DisplayRandomHeader()
{
	global $con;
	global $userid;
	$sql = "SELECT img_path ";
	$sql .= "from pictures order by rand() "; 
	$sql .= "limit 1";
	$query = mysqli_query($con,$sql);
	while ($res = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		return $res["img_path"];
    }
}

?>