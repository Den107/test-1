<?php

@require 'connect.php';
echo '
<table class="table">
<thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">Value</th>
  </tr>
</thead>
<tbody>
  ';
$sql = "SELECT * FROM crypto";
$res = mysqli_query($conn, $sql);
while ($row = $res->fetch_assoc()) {
  echo '<tr><td>' . $row['id'] . '</td><td> ' . $row['value'] . '</td></tr>';
}
echo '
</tbody>
</table>';
