<?php
@require 'connect.php';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/global/');
$result = curl_exec($ch);
curl_close($ch);
$obj = json_decode($result);

foreach ($obj->data->market_cap_percentage as $key => $value) {
  $sql = "INSERT INTO crypto (id, value) VALUES ('$key', '$value')";

  if (mysqli_query($conn, $sql)) {
    header('Location: /');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
