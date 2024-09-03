<?php
session_start();
include_once "../scripts/backend/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../styles/fontawesome-free-5.8.1-web/css/all.css">
    <link rel="stylesheet" href="../styles/home.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Z-agency | home</title>
  </head>
  <body>
    <header class="nav">
      <div class="logo"><a href="#"><img src="../images/z-travel.png" alt=""></a></div>
      <div class="menu">
        <ul>
          <li>Home</li>
          <li><a href="#services">Services</a></li>          
          <li class="uname"><i class="fas fa-user"></i><?php echo $_SESSION['username']?>
            <ul>
              <li><i class="fas fa-atlas"></i> view Reservations</li>
              <li><i class="fas fa-user-cog"></i> Settings</li>
              <a href="../scripts/backend/logout.php"><li>Logout</li></a>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <section id="hero">
      <div id="main">
        <p>DISCOVER</p>
        <p>A WORLD YOU HAVE NEVER SEEN</p>
        <form class="search-container">
          <input
            class="js-search-input"
            type="text"
            placeholder="Destinations|Tour packages|Offers ..."
          />
          <input type="submit" class="js-search-button" value="Search" />
          <div class="result"></div>
        </form>
      </div>
    </section>
    <div class="overlay hidden"></div>
    <div class="card hidden">
    </div>
    <div class="best-offer-container">
      <div class="title">Best Offers</div>
      <div class="offers-grid">
      </div>
    </div>
    <div class="destinations">
      <div class="title popu">Popular Destinations</div>
      <div class="destination-grid">
        <div class="destination big">
          <img src="../images/dest-1.jpg" alt="" />
        </div>
        <div class="destination">
          <img src="../images/dest-2.jpg" alt="" />
        </div>
        <div class="destination">
          <img src="../images/dest-3.jpg" alt="" />
        </div>
        <div class="destination">
          <img src="../images/dest-4.jpg" alt="" />
        </div>
        <div class="destination">
          <img src="../images/dest-5.jpg" alt="" />
        </div>
      </div>
    </div>
    <div id="services" class="services">
    </div>
    <footer>
      <div class="find">
        <div class="title">FIND US</div>
        <div class="details">
          <p>opposite simama hotel</p>
          <p>Lilongwe, Malawi</p>
        </div>
      </div>
      <div class="call">
        <div class="title">CALL US</div>
        <div class="details">
          <p>+265 (0) 991 234 5678</p>
          <p>+265 (0) 881 234 5678</p>
      </div></div>
      <div class="email">
        <div class="title">EMAIL US</div>
        <div class="details">
          <p>z-travel@agency.com</p>
          <p>support@z-group.com</p>
      </div></div>
      <div class="follow">
        <div class="title">FOLLOW US</div>
        <div class="details">
          <div class="social">
            <i class="fab fa-facebook fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-linkedin fa-2x"></i>
          </div>
          <p>z-travel</p>
      </div></div>
      </div>
    </footer>
    <script src="../scripts/js/data.js"></script>
    <script src="../scripts/js/search.js"></script>
  </body>
</html>
