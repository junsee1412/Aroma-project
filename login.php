<html>
<?php
include('conf.php');
?>
<body>
<?php
include('menu.php');
?>
<!-- ================ start banner area ================= -->	
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Login / Register</h1>
                </div>
            </div>
        </div>
    </section>
	<!-- ================ end banner area ================= -->

    <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="register.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="login.php" id="contactForm" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Login Box Area =================-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    $p = md5($_POST["password"]) ;
    $sql = "SELECT * FROM userlist WHERE username ='$u' and password = '$p'";
    $ketqua = mysqli_query($conn, $sql);
    if(mysqli_num_rows($ketqua)>0){
        echo "dang nhap thanh cong";
		$row = mysqli_fetch_assoc($ketqua);
		$_SESSION['iduser'] = $row['id'];
        $_SESSION['name'] = $row['username'];
		$_SESSION['imguser'] = $row['img'];
        echo $_SESSION['name'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }else{
        $error = 'Nhap lai';
    }
}    
include('footer.php');
?>
</body>