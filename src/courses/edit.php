<?php
require_once("../auth/Auth.php");
$auth->checkSession();

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
                <form id="editForm" name="edit" method="post" action="editAction.php" autocomplete="off">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" value="<?= $name ?>" class="form-control">
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-3 col-lg-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input id="start_date"
                                   type="datetime-local"
                                   name="start_date"
                                   value="<?= $startDate ?>"
                                   class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input id="end_date"
                                   type="datetime-local"
                                   name="end_date"
                                   value="<?= $endDate ?>"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value=""></option>
                            <?php  while ($res = mysqli_fetch_assoc($statuses)) { ?>
                                <option value="<?= $res['id'] ?>"
                                    <?= ($res['id'] == $status) ? "selected" : "" ?>>
                                    <?= $res['name'] ?>
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
    <script>
        $(function () {
            $("#editForm").validate({
                rules: {
                    name: {
                        required: true
                    },
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                },
                messages: {
                    name: "Please enter Course Name",
                    start_date: "Please choose the Start Date",
                    end_date: " Please choose the End Date",
                    status: " Please choose one Status",
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
<?php
require_once("../common/footer.php");
?>