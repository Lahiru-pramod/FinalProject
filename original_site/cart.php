<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php

if (isset($_GET['id'])){

    $id =$_GET['id'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee4a922350.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  href="./cart.css?v=<?php echo time(); ?> ">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>cart</title>
</head>
<body>
    <div class="scroll-button">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <div class="full">
        
    <div class="container">
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
    <!-----------------------------cart------------------------------------------>
    <div class="cart">
        <div class="cart-table" id="print">
            <table>
                <caption>Your Collections</caption>
                <tr>
                    
                    <th>image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>contact Number</th>
                    <th>delete</th>
                </tr>
                <?php

                 $connection = mysqli_connect('localhost', 'root', '', 'userdb');
                 if (isset($_GET['id'])){
                    $id = $_GET['id'];
                $sql = "SELECT * FROM product where id='$id'";
                $result = mysqli_query($connection , $sql);
                while($line = mysqli_fetch_array($result)){

                echo"<tr>";
                echo"<td><img src='../images/car.jpg' alt='' /></td>";
                echo" <td>Car</td>";
                    echo"<td>".$line['price'].".00 (per day)</td>";
                    echo"<td>0767877820</td>";
                    echo"<td><button class='cart-del'>delete</button></td>";
                echo"</tr>";
                }
            }
                ?>
               
            </table>
        </div>
        <div class="button-print">
           
           <button class="download" id="download">Download Details PDF</button>

        </div>
    </div>
    <!-----------------------------foter----------------------------------------->
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

  window.onload = function(){

      document.getElementById("download")
      .addEventListener("click",()=> {

        const print = this.document.getElementById("print");
        console.log(print);
        console.log(window);
        html2pdf().from(print).save();
        


      })


  };


</script>
</body>
</html>