<?php
session_start();

unset($_SESSION['unique_id']);
session_destroy();
echo header("Location: http://localhost/Re-agency");