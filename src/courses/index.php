<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

$status = mysqli_real_escape_string($mysqli, $_GET['status']);
$hasStatus = $status && is_numeric($status);
if (!$hasStatus) $status = 0;
$where = $hasStatus ? "WHERE s.id = $status" : "";

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT c.id, c.name, c.start_date, c.end_date, s.name as status 
FROM courses c JOIN statuses s on c.status_id = s.id
$where
ORDER BY c.id DESC");
$statuses = mysqli_query($mysqli, "SELECT * FROM statuses ORDER BY id ASC");

$title = "Courses";
$activePage = "Courses";

require_once("../common/header.php");
require_once("../common/message.php");
?>

<div class="container-fluid">
    <div class="d-flex mt-3 ps-0 justify-content-between">
        <div class="d-flex py-2 col-4">
            <select id="statusFilter" class="form-select">
                <option value="0">All</option>
                <?php while ($res = mysqli_fetch_assoc($statuses)) { ?>
                    <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="d-flex py-2 col-4 justify-content-end">
            <a href="add.php" class='btn btn-primary me-md-2' role='button'>Add Course</a>
        </div>
    </div>

    <table class="table table-hover mb-5 mt-5">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Status</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . date_format(date_create($res['start_date']),"d/m/Y H:i") . "</td>";
            echo "<td>" . date_format(date_create($res['end_date']),"d/m/Y H:i") . "</td>";
            echo "<td>" . $res['status'] . "</td>";
            echo "<td class='text-end'>
            <a href=\"edit.php?id=$res[id]\" class='btn btn-secondary btn-sm' role='button'>Edit</a>
			<a href=\"delete.php?id=$res[id]\" 
			onClick=\"return confirm('Are you sure you want to delete?')\" 
			class='btn btn-secondary btn-sm' role='button'>Delete</a>
			</td>";
        }
        ?>
        </tbody>
    </table>

<!--    <nav aria-label="...">-->
<!--        <ul class="pagination">-->
<!--            <li class="page-item disabled">-->
<!--                <span class="page-link">Previous</span>-->
<!--            </li>-->
<!--            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--            <li class="page-item active" aria-current="page">-->
<!--                <span class="page-link">2</span>-->
<!--            </li>-->
<!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--            <li class="page-item">-->
<!--                <a class="page-link" href="#">Next</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
</div>
<script>
    $(function () {
        const statusFilter = $('#statusFilter');
        statusFilter.val("<?= $status ?>");
        statusFilter.on('change', function () {
            const id = statusFilter.val();
            if (id !== '0') {
                window.location.href = "/courses/?status=" + id;
            } else {
                window.location.href = "/courses/";
            }
        });
    });
</script>
<?php
require_once("../common/footer.php");
?>
