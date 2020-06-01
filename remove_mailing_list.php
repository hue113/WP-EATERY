<?php
include "header.php";

require_once 'Dao.php';

$conn = new Dao();
$sql = "SELECT * FROM `mailinglist` where `deletedCustomerNames` = 'Yes'";
$result = $conn->getData($sql);

?>

    <div id="content" class="clearfix">

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
        </tr>
        <?php 
            foreach ($result as $key => $row) {
               ?>
                    <tr>
                         <td><?php echo $row['customerName']; ?></td>
                         <td><?php echo $row['phoneNumber']; ?></td>
                         <td><?php echo $row['emailAddress']; ?></td>
                     </tr>
               <?php
            }
        ?> 

    </table>

    </div>