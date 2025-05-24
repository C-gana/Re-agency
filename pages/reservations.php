<?php
global $conn;
session_start();
include_once "../scripts/backend/auth.php";
include_once ("../scripts/backend/conn.php");
$unique_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM bookings WHERE unique_id = '$unique_id'";
$available = $conn->query($sql);
if ($available) {
  $i = 1;
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="../styles/fontawesome-free-5.8.1-web/css/all.css"
    />
    <link rel="stylesheet" href="../styles/reservations.css" />
    <link rel="shortcut icon" href="../images/z.png" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservations</title>
    <style></style>
  </head>
  <body>
    <header class="nav">
      <div class="logo">
        <a href="#"><img src="../images/z-travel.png" alt="" /></a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="home.php?#services">Services</a></li>
          <li class="uname">
            <i class="fas fa-user"></i><?php echo $_SESSION['username']?>
            <ul>
              <li><i class="fas fa-atlas"></i> view Reservations</li>
              <li><i class="fas fa-user-cog"></i> Settings</li>
              <a href="../scripts/backend/logout.php"><li>Logout</li></a>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <div class="container">
      <div class="reservations">
        <div class="title">
          <p><i class="fas fa-atlas"></i> Reservations</p>
        </div>
        <table>
          <thead>
            <th>No</th>
            <th id="ref">Ref no</th>
            <th>Destination</th>
            <th>From</th>
            <th>To</th>
            <th>No. of people</th>
            <th>Fee/person ($)</th>
            <th>Total Fee ($)</th>
            <th>Additional info</th>
            <th>Actions</th>
          </thead>
          <tbody>
            <?php foreach ($available as $place):?>
            <tr>
              <td><?php echo $i;
              $i++;?></td>
              <td><?php echo $place["ref_no"]?></td>
              <td><?php echo $place['site']?></td>
              <td><?php echo $place['from_date']?></td>
              <td><?php echo $place['to_date']?></td>
              <td class="center"><?php echo $place['number_of_people']?></td>
              <td class="center">$<?php echo $place['fee']?></td>
              <td class="center">$<?php echo ($place['fee']*$place['number_of_people'])?></td>
              <td><?php echo $place['add_info']?></td>
              <td class="btns">
                <button class="edit">Edit</button>
                <button class="cancel">Delete</button>
              </td>
            </tr>
            <?php endforeach?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="overlay hidden"></div>
    <div class="card edit hidden">
      <p class="close"><i class="fas fa-times"></i></p>
      <div class="title">
        <p>Edit Your trip to</p>
        <span>Mulanje Mountain</span>
      </div>
      <div class="msg"></div>
      <div class="error"></div>
      <form class="update-form">
        <input type="text" name="ref" value="" hidden>
        <div class="detail-grid">
          <p>Trip Duration</p>
          <div class="fee">
            <p>Daily Fee</p>
            <input
              name="fee"
              type="text"
              disabled
              value="$20/person"
              required
            />
            <input name="fee" type="text" hidden value="$20" required />
            <input name="dest" type="text" hidden value="Mulanje" required />
          </div>
          <div class="date from">
            <label>From</label>
            <input type="date" name="from" value="2024-09-05" required />
          </div>
          <div class="ppl">
            <label>No. of people</label>
            <input type="number" name="number_of_ppl" id="" required />
          </div>
          <div class="date to">
            <label>To</label>
            <input type="date" name="to" value="2024-09-23" />
          </div>
          <input
            type="text"
            name="additional_info"
            placeholder="Enter additional information"
          />
        </div>
        <input type="submit" value="Update Trip Details" />
      </form>
    </div>
    <div class="card cancel hidden">
      <div class="title">
        <p>Are you sure you want to cancel Your trip to</p>
        <span>Mulanje Mountain  ?</span>
      </div>
      <div class="msg">Trip canceled successfully</div>
      <div class="error"></div>
      <form class="del-form">
        <input type="text" name="ref" value="" hidden>
        <!-- <input type="submit" value="Yes" /> -->
        <button class="yes">Yes</button>
        <button class="no">No</button>
      </form>
      <div>
        <a href="">Terms and conditions apply</a>
      </div>
    </div>
    <script src="../scripts/js/update.js"></script>
  </body>
</html>
<?php }?>