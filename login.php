<?php 
include "includes/head.php";


if(isset($_POST['login'])){
	$field = array(
		'username' => $_POST['username'],
		'password' => md5($_POST['password'])
		);
			if($object->can_login("users", $field)){
				$post_data = $object->can_login("users", $field);
				foreach($post_data as $post){
				
				$_SESSION["username"] = $post["username"];
				$_SESSION["id"] = $post['id'];;
				$_SESSION["access"] = $post['access'];;
				$_SESSION["assign"] = $post['assign'];;
				header("location:index.php");
				}
			}else{
				$message = 'INVALID USERNAME AND PASSWORD';
			}

}

?>
<div class="row ">
<form method="POST">
	<div class="col-md-4 col-md-offset-4 well login">
		<h1 class="page-header text-center">LOGIN</h1>
		<?php if(isset($message)){
						echo '<label class="text-danger text-center"><h3>'.$message.'</h3></label>';
					} ?>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="false" required="true"a autocomplete="off" />
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required="true"  />
		</div>
		<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
	</div>
</form>
	

</div>
<?php 
include "includes/footer.php";
?>