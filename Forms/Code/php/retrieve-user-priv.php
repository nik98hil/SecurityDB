<?php
include ("connection.php");

$userID = isset($_POST["userID"]) ? $_POST["userID"] : '';

$sql = "SELECT user_accounts.userID, user_accounts.userName,
       user_role.roleName, role_priv.privType
FROM user_accounts, user_role, role_priv
WHERE user_accounts.userID = user_role.userID
      AND user_accounts.userID = '$userID'
      AND user_role.roleName = role_priv.roleName";

$result = mysqli_query($conn, $sql);

//$url = "../html/retrieve-role-priv";
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>

<?php
$failMessage = "User Exists";
$successMessage = "User Added!";
include("../html/heading.php");
?>
                <FORM method="POST" action="retrieve-user-priv.php">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Role and Privilege</h3>
                        <!-- <button class="btn btn-primary btn-sm d-none d-sm-inline-block" type ="submit" name="submit" ><i class="fas fa-download fa-sm text-white-50">
                        </i>&nbsp;Execute Query</button> -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>User ID:&nbsp; &nbsp;&nbsp;</label>
                            <input type="text" name="userID" required>
                        </div>
                    </div>
                    <br/>
                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block" type ="submit" name="submit" ><i class="fas fa-download fa-sm text-white-50">
                        </i>&nbsp;Execute Query</button>
                </FORM>
                <br/><br/>
                <div class="row"><div class="container-fluid">
                        <h3 class="text-dark mb-4">User Privileges</h3>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Name</th>
                                            <th>Privilege</th>
                                        </tr>
                                        </thead>
                                        <body>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<td>" . $row['userID'] . "</td>";
                                            echo "<td>" . $row['userName'] . "</td>";
                                            echo "<td>" . $row['privType'] . "</td>";
                                            echo "</tr>";
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
