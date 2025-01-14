<?php
$failMessage = "Revoke Unsuccessful as Privilege / Role may be invalid";
$successMessage = "Privilege Successfully Revoked";
$notOwnerFail = "Access Denied. Incorrect Owner ID or Table ";
include("../html/heading.php");
?>
<title> Revoke Privilege</title>
<div class="row">
    <h4>Revoke Privilege for a User on A Table</h4>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">User Settings</p>
        </div>
        <div class="card-body">
            <form method="POST" action="../php/revoke-mysql.php">
                <div class="row">
                    <div class="form-group"><label for="phone"><strong>As Owner With ID</strong></label><input required class="form-control" type="number" placeholder=" " name="ownerID" /></div>
                </div>
                <div class="row">
                    <div class="form-group"><label for="username"><strong>of Table</strong></label><input required class="form-control" type="text" placeholder=" " name="tableName" /></div>
                </div>
                <div class="row">
                    <div class="form-group"><label for="username"><strong>Revoke Privilege with ID</strong></label><input required class="form-control" type="number" placeholder=" " name="pid" /></div>
                </div>
                <div class="row">
                    <div class="form-group"><label for="username"><strong>To Role</strong></label><input required class="form-control" type="text" placeholder=" " name="roleName" /></div>
                </div>
                <button class="btn btn-primary btn-sm d-none d-sm-inline-block" type ="submit" name="submit" ><i class="fas fa-download fa-sm text-white-50">
                    </i>&nbsp;Execute Query</button>
            </form>
        </div>
    </div>
    <div class="col">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Existing Privileges on Table</p>
        </div>
        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0 table-light table-striped  " id="dataTable">
                <thead class="thead-dark">
                <tr>
                    <th>Grantor ID</th>
                    <th>Table Name</th>
                    <th>Privilege ID </th>
                    <th>Role Name</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM has_access";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0)
                {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "
                                 <tr>
                                     <td>". $row['grantorID']."</td>
                                     <td>". $row['tableName']."</td>
                                     <td>". $row['pid']."</td>
                                     <td>". $row['roleName']."</td>
                                </tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php include("../html/footer.php"); ?>


