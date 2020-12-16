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
					<h1>Register</h1>
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
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						<form class="row login_form" action="register.php" id="register_form" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                                <span id='message'></span>
                                <script>
                                    $('#password, #confirmPassword').on('keyup', function () {
                                    if ($('#password').val() == $('#confirmPassword').val()) {
                                        $('#message').html('Matching').css('color', 'green');
                                    } else 
                                        $('#message').html('Not Matching').css('color', 'red');
                                    });
                                </script>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Login Box Area =================-->
<?php
$mess = '';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = md5($_POST['password']);
    $sql = "select * from userlist where username='$u'";
    $kq= mysqli_query($conn,$sql);
    if(mysqli_num_rows($kq)>0){
        $mess = "Tên đăng nhập $u đã tồn tại";
    }else{
        $sqli = "INSERT INTO userlist(username,email,password,class) VALUES('$u','$e','$p','0')";
        $ketqua = mysqli_query($conn , $sqli);
        echo 'Bạn đã đăng ký thành công';
    }
}
include('footer.php');
?>
</body>
</html>