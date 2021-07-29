<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	//if (!isset($_SESSION['user_id'])) {
		//header('Location: index.php');
	//}

	$errors = array();
	$first_name = '';
	$last_name = '';
	$email = '';
	$password = '';

	if (isset($_POST['submit'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// checking required fields
		$req_fields = array('first_name', 'last_name', 'email', 'password');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' => 50, 'last_name' =>100, 'email' => 100, 'password' => 40);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		if (empty($errors)) {
			// no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			// email address is already sanitized
			$hashed_password = sha1($password);

			$query = "INSERT INTO user ( ";
			$query .= "first_name, last_name, email, password, is_deleted";
			$query .= ") VALUES (";
			$query .= "'{$first_name}', '{$last_name}', '{$email}', '{$hashed_password}', 0";
			$query .= ")";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: loginnew.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}


		}



	}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/ee4a922350.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./register.css?v=<?php echo time(); ?> ">
</head>
<body>
<div class="scroll-button">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <div class="register-full">
    <div class="navbar">
        <img src="../images/logo.png" alt="" class="logo">
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
    <div class="register-content">
        <div class="register">
            <div class="left-side">
            <h1 class="title-register">SignUP <br> <i class="fa fa-user-plus" aria-hidden="true"></i></h1>
            </div>
            <div class="right-side">
                
                <form method="post" action="register.php">
                    <h2>First Name</h2>
                    <input type="text" name="first_name" required placeholder="first name" <?php echo 'value="' . $first_name . '"'; ?>>
                    <h2>Last Name</h2>
                    <input type="text" name="last_name" required placeholder="last name"<?php echo 'value="' . $last_name . '"'; ?>>
                    <h2>Email</h2>
                    <input type="text" name="email" required placeholder="email"<?php echo 'value="' . $email . '"'; ?>>
                    <h2>Password</h2>
                    <input type="password" name="password" required placeholder="password">
                    <button type="submit" name="submit" class="signup">Sign Up</button>
                    <p>or</p>
                    <button class="signin"><a href="./loginnew.php">Sign In</a></button>
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