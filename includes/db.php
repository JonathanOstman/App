<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'appdb');

if (!$connection) {
  die("Database connection failed." . mysqli_error($connection));
}