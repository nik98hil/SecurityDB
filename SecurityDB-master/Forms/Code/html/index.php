<?php
    include("connection.php");
    // echo "hello";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fa fa-user-plus"></i><span>Create New User</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i>Create New Role</a></li>
                    <li class="nav-item"><a class="nav-link" href="table.html"><i class="fas fa-table"></i>Create New&nbsp;<span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i>Insert New Privilege</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i>Relate User Account to Role</a></li>
                    <li class="nav-item"><a class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i><span>Relate Acc Priv to Role</span></a><a class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i><span>Relate Relation Priv to Role and Table</span></a>
                        <a
                            class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i>Retrieve Role Privileges</a><a class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i>&nbsp;Retrieve User Privileges</a><a class="nav-link" href="blank.html"><i class="fas fa-window-maximize"></i><span>Check Privilege for User</span></a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h2 class="text-dark mb-0">Security Sub System</h2>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Create New User</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Submit Query</a></div>
                    <div class="row">
                        <div class="col"><label>User Name:&nbsp; &nbsp;&nbsp;</label><input type="text"></div>
                    </div>
                    <div class="row">
                        <div class="col"><label>Phone:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label><input type="text"></div>
                    </div>
                    <div class="row">
                        <div class="col"><label>User Role:&nbsp; &nbsp; &nbsp;&nbsp;</label><input type="text"></div>
                    </div>
                    <div class="row"><div class="container-fluid">
    <h3 class="text-dark mb-4">User Details</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
            </div>

            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>User ID </th>
                            <th>Phone</th>
                            <th>User Name</th>
                            <!-- <th>Role</th> -->
                        </tr>                    
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT `userID`, `phone`,`userName` FROM user_accounts;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "
                                <tr>
                                <td>". $row['userID']."</td>
                                <td>". $row['phone']."</td>
                                <td>". $row['userName']."</td>
                                </tr>";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <h3 class="text-dark mb-0"></h3>
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>
