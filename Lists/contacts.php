<?php
include('../conect.php');
$sql = "select * from contact";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['tel'] . "</td>
            <td>" . $row['agency_id'] . "</td>
          </tr>";
}
