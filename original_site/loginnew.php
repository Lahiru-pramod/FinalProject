<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email 		= mysqli_real_escape_string($connection, $_POST['email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM user 
						WHERE email = '{$email}' 
						AND password = '{$hashed_password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				// valid user found
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['first_name'] = $user['first_name'];
				// updating last login
				$query = "UPDATE user SET last_login = NOW() ";
				$query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

				// redirect to advertising.php
				header('Location: post.php');
			} else {
				// user name and password invalid
				$errors[] = 'Invalid Username / Password';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee4a922350.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="./loginnew.css?v=<?php echo time(); ?> ">
</head>
<body>
<div class="scroll-button">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <div class="login-full">
    <div class="navbar">
    <h2 class="logo">EventPlaner.lk</h2>
        <nav>
            <ul id="menuList">
            <li><a href="./home.php">Home</a></li>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./cart.php">Cart</a></li>
                <li><a href="./loginnew.php">Login/Register</a></li>
            </ul>
            
        </nav>
        <img src="../images/menu.png" alt="" class="menu-icon" onclick="togglemenu()">
    </div>
    <div class="login-content">
        <div class="login">
            <div class="left-side-login">
            <h1 class="title-login">SignIn <br> <i class="fa fa-sign-in" aria-hidden="true"></i></h1>
            </div>
            <div class="right-side-login">
                <form method="post" action="loginnew.php">
                    <h2>Email</h2>
                    <input type="text" name="email" id="" placeholder="email">
                    <h2>Password</h2>
                    <input type="password" name="password" id="" placeholder="password">
                    <button type="submit" name="submit" class="signin">Sign In</button>
                    <p>or</p>
                    <button class="signup"><a href="./register.php">Sign Up</a></button>
                </form>
            </div>
        </div>
    </div>
    <!----------------------footer----------------------------->

    <footer>
        <div class="footer-container">
            <div class="left-box">
                <h2>About Us</h2>
                <div class="left-content">
                <p>This is a rental items advertising and selling website. this create for
                        HND Group project. our group no -03 , Members - Tilanka , Chiran, Lahiru,
                        Sachin & Heshan.Thank you!
                    </p>
                </div>
            </div>
            <div class="center-box">
                <h2>Address</h2>
                <div class="center-content">
                    <ul>
                        <li>Galle</li>
                        <li>078963521</li>
                        <li>bitloards@gmail.com</li>
                    </ul>
                </div>
                <div class="foot-icons">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </div>
            </div>
            <div class="right-box">
                <h2>Contact Us</h2>
                <div class="right-content">
                    <form>
                        <h3>Email</h3>
                        <input type="text" placeholder="email">
                        <h3>Message</h3>
                        <input type="text" placeholder="message">
                    
                        <button type="submit" class="footer-button">Send</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <h4>copyright@bitLoards</h4>
    </footer>
</div>
<script>
        var menuList = document.getElementById("menuList");

        menuList.style.maxHeight = "0px";

        function togglemenu(){
            if(menuList.style.maxHeight == "0px")
                {
                    menuList.style.maxHeight = "130px";
                }
            else
                {
                    menuList.style.maxHeight = "0px";
                }
        }
        const scrollBtn = document.querySelector('.scroll-button')

        window.addEventListener('scroll', () =>{
            if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
                scrollBtn.style.display = 'block';
            }
            else{
                scrollBtn.style.display = 'none';
            }
        })
        scrollBtn.addEventListener('click' , () => {
            window.scroll({
                top: 0,
                behavior: "smooth"
            })
        })
    </script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
      offset: 100,
      duration: 400
  });
</script>
</body>
</html>