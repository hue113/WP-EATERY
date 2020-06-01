<?php
include "header.php";
require_once 'Dao.php';

$conn = new Dao();
$sql = "SELECT * FROM `mailinglist` where `deletedCustomerNames` = 'No'";
$result = $conn->getData($sql);

if(isset($_GET['action']) && $_GET['action'] == "delete"){
    $id = $_GET['id'];
    $sql = "UPDATE `mailinglist` SET `deletedCustomerNames`='Yes' WHERE `_id`=" . $id;
    if($conn->runSql($sql)){
        header('Location: mailing_list.php');
        exit;
    }
}
?>


    <div id="content" class="clearfix">

    <table>
        <tr>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>How did you hear about us?</th>
            <th>Delete</th>
        </tr>

        <?php 
            foreach ($result as $key => $row) {
               ?>
                    <tr>
                         <td><?php echo $row['customerName']; ?></td>
                         <td><?php echo $row['phoneNumber']; ?></td>
                         <td><?php echo $row['emailAddress']; ?></td>
                         <td><?php echo $row['referrer']; ?></td>
                         <td>
                             <button name = "btnDelete" ><a href="?id=<?php echo $row['_id'] ?>&action=delete"><font color="black">Delete</font></a></button>
                         </td>
                     </tr>
               <?php
            }
        ?>      
         
     </table>

 </div>







