<?php
if (isset($_GET['key'])) {
  $user_keyword = $_GET['key'];
  $keywords = ["mangochi","likoma","likoma island","livingstonia","mulanje","3 days adventure","7 days hiking expedition"];
  $is_available = false;
  //looping through the keywords
  foreach($keywords as $keyword){
    if($user_keyword=== $keyword){
      $is_available = true;
    }
  }
  if($is_available){
    echo $user_keyword;
  }else{
    echo 'no results found matching "'.$user_keyword.'"';
  }
}