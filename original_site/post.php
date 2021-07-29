<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
$errors=array();
$title = '';
$cate = '';
$img = '';
$cont = '';
$add = '';
$price = '';
$descrip = '';
$special = '';




if (isset($_POST['submit'])){

  $errors=array();
  $title = $_POST['title'];
  $cate =$_POST['cate'] ;
  $img =$_FILES['img']['name'];
  $cont = $_POST['cont'];
  $add =$_POST['add'] ;
  $price = $_POST['price'];
  $descrip =$_POST['descrip'] ;
  $special = $_POST['special'];





  if(empty(trim($_POST['title']))){

    $errors[]='Title is required';
  } 
  if(empty($_POST['cate'])){

    $errors[]='please Select category';
  }
  if(empty($_FILES['img']['name'])){

    $errors[]='please upload images';
  }
  if(empty($_POST['cont'])){

    $errors[]='Contact is required';
  }
  if(empty(trim($_POST['price']))){

    $errors[]=' Price is required';
  } 
  if(empty($_POST['descrip'])){

    $errors[]='Description is required';
  }
  if(empty($_POST['add'])){

    $errors[]='Address is required';
  }
  
if (empty($errors)){
// if no any errors adding data to database
$title = mysqli_real_escape_string($connection, $_POST['title']);
$cate = mysqli_real_escape_string($connection, $_POST['cate']);
$img = mysqli_real_escape_string($connection, $_FILES['img']['name']);
$cont = mysqli_real_escape_string($connection, $_POST['cont']);
$price = mysqli_real_escape_string($connection, $_POST['price']);
$descrip = mysqli_real_escape_string($connection, $_POST['descrip']);
$add = mysqli_real_escape_string($connection, $_POST['add']);
$cont = mysqli_real_escape_string($connection, $_POST['cont']);

$query = "INSERT INTO product (";
$query .= "title, category, image , contact, address, description, price , special";
$query .= ") VALUES (";
$query .= "'{$title}','{$cate}','{$img}','{$cont}','{$add}','{$descrip}','{$price}','{$special}'";
$query .=")";

$result = mysqli_query($connection, $query);
 if ($result){
// if successful
header('Location: successful.php?user_added=true');
 }else {

  $errors[]='failed add post';
 }

}

}
//image upload part
if(isset($_POST['submit'])){

//button clicked
$file_name = $_FILES['img']['name'];
$file_type = $_FILES['img']['type'];
$file_size = $_FILES['img']['size'];
$temp_name = $_FILES['img']['tmp_name'];

$upload_to = 'postimages/';
move_uploaded_file($temp_name, $upload_to . $file_name);
}

?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./post.css?v=<?php echo time(); ?> ">
    <script src="https://kit.fontawesome.com/ee4a922350.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="scroll-button">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <div class="post-full">
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
    <div class="post-content">
        <div class="add-post">
           <!---- <div class="left-side-post">
                <h1 class="title-post">SignIn</h1>
            </div>-->
            <h1>Create Add</h1>
            <p>If you want to rent your Item fill the details and press post.</p>
            <div class="right-side-post">
                <form method="post" action="post.php" class="Post" enctype="multipart/form-data">
                        <h2>Title</h2>
                        <input  type="text" required placeholder="Title" name="title" <?php echo 'value="' .$title . '"';?>>
                        <h2>Select Category</h2>
                        <select id="inputState"  name="cate"<?php echo 'value="' .$cate . '"';?>>
                            <option selected="">select..</option>
                            <option>wedding clothes</option>
                            <option>Cars</option>
                            <option>Wedding items</option>
                            <option>Lighting</option>
                        </select>
                        <h2>Upload Image</h2>
                        <input type="file" id=" " name="img" <?php echo 'value="' .$img . '"';?> >
                        <h2>contact</h2>
                        <input class="contact" required placeholder="contact" type="text" name="cont"<?php echo 'value="' .$cont . '"';?>>
                        <h2>Address</h2>
                        <input type="text" required placeholder="address"name="add"<?php echo 'value="' .$add . '"';?>>
                        <h2>Description</h2>
                        <textarea class="description" id="post-desc" rows="10" cols="50" name=descrip></textarea>
                        <h2>Price (per day)</h2>
                        <input class="contact" required placeholder="price per day" type="text" name="price"<?php echo 'value="' .$price . '"';?>>
                        <h2>Special</h2>
                        <textarea class="special" id="post-special" rows="10" cols="50" name=special <?php echo 'value="' .$special . '"';?>></textarea>
                    
                    <p>please put correct details and quality image for create successfull add.if you put wrost one we remove it.</p>
                    <button type="submit" name="submit" class="post-btn">Post</button>
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
</body>
</html>