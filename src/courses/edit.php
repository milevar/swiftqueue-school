<?php
// Include the database connection file
require_once("../common/dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM courses WHERE id = $id");
$statuses = mysqli_query($mysqli, "SELECT * FROM statuses ORDER BY id ASC");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$startDate = $resultData['start_date'];
$endDate = $resultData['end_date'];
$status = $resultData['status_id'];

$title = "Edit Course";
$activePage = "Courses";
require_once("../common/header.php");
?>
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">
                <form name="edit" method="post" action="editAction.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="nameField" class="form-label">Name</label>
                        <input id="nameField" type="text" name="name" value="<?php echo $name; ?>" class="form-control">
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-6">
                            <label for="starDateField" class="form-label">Start Date</label>
                            <input id="starDateField"
                                   type="datetime-local"
                                   name="start_date"
                                   value="<?php echo $startDate; ?>"
                                   class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="endDateField" class="form-label">End Date</label>
                            <input id="endDateField"
                                   type="datetime-local"
                                   name="end_date"
                                   value="<?php echo $endDate; ?>"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statusField" class="form-label">Status</label>
                        <select name="status" id="statusField" class="form-select">
                            <?php  while ($res = mysqli_fetch_assoc($statuses)) { ?>
                                <option value="<?php echo $res['id']; ?>"
                                    <?php echo ($res['id'] == $status) ? "selected" : ""; ?>
                                >
                                    <?php echo $res['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="mt-4 col-lg-3">
                            <input type="submit" name="update" value="Edit Course" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require_once("../common/footer.php");
?>