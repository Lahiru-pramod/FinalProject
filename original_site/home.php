<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee4a922350.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"href="./home.css?v=<?php echo time(); ?> ">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--------slider------------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Home</title>
</head>

<body>
    <div class="scroll-button">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <div class="full">
        
    <div class="container">
        <div class="navbar">
            <!--<img src="./images/logo.png" alt="" class="logo">-->
            <h2 class="logo">EventPlaner.lk</h2>
            <nav>
                <ul id="menuList">
                <li><a href="./home.php">Home</a></li>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./cart.php">Cart</a></li>
                <li><a href="./loginnew.php">Login/Register</a></li>
                </ul>
                
            </nav>
            <img src="./images/menu.png" alt="" class="menu-icon" onclick="togglemenu()">
        </div>
      <div class="content">
          <div class="content-details">
            <h1>Event Planer</h1>
            <p>Our Website has to sell Different kind of items for rental basis.<br>
               You can plan your wedding ,Dj party, Birth day Party & etc with out waste of money. <br>
               Welcome to the our website and find items Contact them Easily.</p>
            <div>
            <a href="./products.php"><button type="button"><span></span>Watch Items</button></a>
            </div> 
          </div>
            <!--<img src="./images/item.png" alt="">-->
            <img src="./images/backg.gif" alt="">                              
        </div>
    </div>

    <!------------------features items----------------------->
    <!--<div class="features">
        <div class="features-container">
            <div class="features-row">
                <div class="features-col" >
                    <img src="./images/photo.jpg" alt="">
                </div>
                <div class="features-col" >
                    <img src="./images/dj.jpg" alt="">
                </div>
                <div class="features-col">
                    <img src="./images/car.jpg" alt="">
                </div>
            </div>
        </div>
    </div>-->
    <!------------------slider-------------------------------->
    <div class="post-container">
        <div class="post">
            <div class="post-image">
                <img src="./images/sli1.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Birth day event</a>
                <p></p>
                
            </div>
        </div>
        <div class="post">
            <div class="post-image">
                <img src="./images/sli2.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Funny Party Event</a>
                <p></p>
                
            </div>
        </div>
        <div class="post">
            <div class="post-image">
                <img src="./images/sli3.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Meeting Events</a>
                <p></p>
                
            </div>
        </div>
        <div class="post">
            <div class="post-image">
                <img src="./images/sli4.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Wedding Event</a>
                <p></p>
                
            </div>
        </div>
        <div class="post">
            <div class="post-image">
                <img src="./images/sli2.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Dj Party</a>
                <p></p>
                
            </div>
        </div>
        <div class="post">
            <div class="post-image">
                <img src="./images/sli1.png" alt="">
            </div>
            <div class="post-content">
                <a href="#" class="post-title">Annivesery Event</a>
                <p></p>
                
            </div>
        </div>
    </div>

    <!-------------------most choosen---------------------------->
    <div class="most-choose">
        <div class="most-choose-container">
            <h1>Top Rated</h1>
            <div class="most-choose-row" data-aos="fade-up">
                <div class="most-choose-col">
                    <img src="./images/photo.jpg" alt="">
                </div>
                <div class="most-choose-col">
                    <img src="./images/dj.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!------------------------plan event---------------------------------->
    <div class="plan-event">
        <div class="plan-event-container">
            <div class="plan-event-row">
                <div class="plan-event-col" data-aos="fade-up">
                    <h1>Plan Your Event</h1>
                    <p><h2>Coming Soon..</h2></p>

                    <button class="plan" type="button">See more</button>
                </div>
                <div class="plan-event-col" data-aos="fade-up">
                    <img src="./images/event.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!------------------------Top Rates---------------------->
    <div class="top-rated-container">
        <h1 data-aos="fade-up">Top Rated</h1>
    <div class="top-rated">
        <?php
            $connection = mysqli_connect('localhost', 'root', '', 'userdb');
            $sql = "SELECT * FROM product";
            $result = mysqli_query($connection , $sql);
            while($row = mysqli_fetch_array($result)){

               echo "<div class='top-rated-card' data-aos='fade-up'>";
                  echo  "<img src='postimages/".$row['image']."'alt=''>";
                   echo "<div class='box'>";
                   echo "<h3>".$row['title']."</h3>";
                     echo"<p>".$row['description']."</p>";
                       echo"<h4>".$row['price'].".00(per day)</h4>";
                        echo"<button>watch</button>";
            echo"</div>";
               echo"</div>";


            }


        ?>
        
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

<!----------slider-------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.post-container').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    </script>

</body>

</html>