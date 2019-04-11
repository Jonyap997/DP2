<?php
    include("adminStockServer.php");

    //Fetch the data to be updated
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        
        $edit_state = true;
        $reconnect = mysqli_query($connection, "SELECT * FROM inventories WHERE id=$id");
        $record = mysqli_fetch_array($reconnect);
        $id = $record['id'];
        $name = $record['name'];
        $price = $record['price'];
        $amountRemaining = $record['amountRemaining'];
        $description = $record['description'];
    }

?>

<!DOCTYPE html> 
<html lang="en" data-ng-app=""> 
    <head> 
    <title>Sprint 1 Salon</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!--HTML5shiv and Respond -->
        <script src="framework/js/html5shiv.js"></script>
        <script src="framework/js/respond.min.js"></script>
        <link href="framework/css/styles.css" rel="stylesheet" />
        <!--Icons-->
        <link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css">
        <!--Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Monsieur La Doulaise' rel='stylesheet'>
    </head> 
    <body class="adminStockPage"> 
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table class="adminStockTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Amount In Stock</th>
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["amountRemaining"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td>
                                <a class="edit_btn" href="adminStockAndInventories.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="delete_btn" href="adminStockServer.php?delete=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <form method="POST" action="adminStockServer.php" class="adminStockForm">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="input-group">
                        <label>Price</label>
                        <input type="text" name="price" value="<?php echo $price; ?>">
                    </div>
                    <div class="input-group">
                        <label>Amount In Stock</label>
                        <input type="text" name="amountRemaining" value="<?php echo $amountRemaining; ?>">
                    </div>
                    <div class="input-group">
                        <label>Description</label>
                        <input type="text" name="description" value="<?php echo $description; ?>">
                    </div>
                    <div class="input-group">
                    <?php if ($edit_state == false): ?>
                        <button type="submit" name="save" class="adminStockBtn">Save</button>
                    <?php else: ?>
                        <button type="submit" name="update" class="adminStockBtn">Update</button>
                    <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
        
        
        <!--Jquery for bootstraps js plugins-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <!--All bootstraps plugins files-->
        <script src="js/bootstrap.min.js"></script>
        <!--Basic AngularJS-->
        <script src="js/angular.min.js"></script>
    </body>
</html>