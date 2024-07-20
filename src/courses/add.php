<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

$result = mysqli_query($mysqli, "SELECT * FROM statuses ORDER BY id ASC");

$title = "Add Course";
$activePage = "Courses";
require_once("../common/header.php");
?>
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <form action="addAction.php" method="post" name="add">
                    <div class="mb-3">
                        <label for="nameField" class="form-label">Name</label>
                        <input id="nameField" type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-6">
                            <label for="starDateField" class="form-label">Start Date</label>
                            <input id="starDateField" type="datetime-local" name="start_date" class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="endDateField" class="form-label">End Date</label>
                            <input id="endDateField" type="datetime-local" name="end_date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-6">
                            <label for="statusField" class="form-label">Status</label>
                            <select name="status" id="statusField" class="form-select">
                                <option value="null"></option>
                                <?php  while ($res = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="mt-4 col-lg-3">
                            <input type="submit" name="submit" value="Add Course" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../common/footer.php");
?>
