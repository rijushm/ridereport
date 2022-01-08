<?php
require '../vendor/autoload.php';
$beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
  "instanceId" => "364c75e4-9a2b-482b-8b76-536214580f4a",
  "secretKey" => "A7D54456E878B33DCEA770D37317C3F82B7ECBBB280512000B9151A414EDBFB9",
));

$body = "Your request from ".$pickup." to ".$destination." is rejected by authority.";

$publishResponse = $beamsClient->publishToInterests(
  array($email),
  array("web" => array("notification" => array(
    "title" => "New Request from Riju",
    "body" => $body,
    "deep_link" => "https://www.pusher.com",
  )),
));

?>