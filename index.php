<?php 
    session_start();

    include 'connect.php';
    include 'create.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body class="bg-dark">
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                    </div>
                    <div class="card-body">

                        <?php if(isset($_SESSION['success'])) {?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong>
                                <?php echo $_SESSION['success'];?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            }
                            unset($_SESSION['success'])
                        ?>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Gmail</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $select = "SELECT * from users_data";
                                    $query = mysqli_query($connect, $select);

                                    if(mysqli_num_rows($query) > 0){
                                        while($row = mysqli_fetch_assoc($query)) { ?>

                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td>
                                                <a href="#"><span><i class="bi bi-pencil-square"></i></span></a>
                                                <a href="#"><span><i class="bi bi-trash"></i></span></a>
                                            </td>
                                        </tr>

                                        <?php }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
                                <span class="text-danger"><?php echo $errors['name'] ?? '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                                <span class="text-danger"><?php echo $errors['email'] ?? '' ?></span>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number">
                                <span class="text-danger"><?php echo $errors['phone'] ?? '' ?></span>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>