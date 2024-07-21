<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");
// Filter by status
$status = mysqli_real_escape_string($mysqli, $_GET['status']);
$hasStatus = $status && is_numeric($status);
if (!$hasStatus) $status = 0;
$where = $hasStatus ? "WHERE s.id = $status" : "";

// Pagination
$extraParams = $hasStatus ? ['status' => $status] : [];
$paginationRoute = '/courses/';
$page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);
$query = "SELECT COUNT(*) as total
FROM courses c JOIN statuses s on c.status_id = s.id
$where";
$r = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
$totalResults = $r['total'];
$totalPages = ceil($totalResults / $perPage);

$result = mysqli_query($mysqli, "SELECT c.id, c.name, c.start_date, c.end_date, s.name as status 
FROM courses c JOIN statuses s on c.status_id = s.id
$where
ORDER BY c.name ASC
LIMIT $startAt, $perPage");
$rowcount = mysqli_num_rows($result);
$statuses = mysqli_query($mysqli, "SELECT * FROM statuses ORDER BY id ASC");

$title = "Courses";
$activePage = "Courses";

require_once("../common/header.php");
require_once("../common/message.php");
?>

    <div class="container-fluid">
    <div class="flex-row mt-3">
        <div class="p-2">Filter by Status</div>
    </div>
    <div class="d-flex ps-0 justify-content-between">
        <div class="d-flex py-2 col-4">
            <select id="statusFilter" class="form-select">
                <option value="0">All</option>
                <?php while ($res = mysqli_fetch_assoc($statuses)) { ?>
                    <option value="<?= $res['id'] ?>"><?= $res['name'] ?></option>
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
//        // Fetch the next row of a result set as an associative array
//        while ($res = mysqli_fetch_assoc($result)) {
//            echo "<tr>";
//            echo "<td>" . $res['name'] . "</td>";
//            echo "<td>" . date_format(date_create($res['start_date']), "d/m/Y H:i") . "</td>";
//            echo "<td>" . date_format(date_create($res['end_date']), "d/m/Y H:i") . "</td>";
//            echo "<td>" . $res['status'] . "</td>";
//            echo "<td class='text-end'>
//            <a href=\"edit.php?id=$res[id]\" class='btn btn-secondary btn-sm' role='button'>Edit</a>
//			<a href=\"delete.php?id=$res[id]\"
//			onClick=\"return confirm('Are you sure you want to delete?')\"
//			class='btn btn-secondary btn-sm' role='button'>Delete</a>
//			</td>";
//        }
//        ?>
        <?php while ($res = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $res['name'] ?></td>
                <td><?= date_format(date_create($res['start_date']), "d/m/Y H:i") ?></td>
                <td><?= date_format(date_create($res['end_date']), "d/m/Y H:i") ?></td>
                <td><?= $res['status'] ?></td>
                <td class='text-end'>
                    <a href="<?= 'edit.php?id=' .$res['id'] ?>" class="btn btn-secondary btn-sm" role="button">Edit</a>
                    <a href="<?= 'delete.php?id=' .$res['id'] ?>"
                    onClick="return confirm('Are you sure you want to delete?')"
                    class="btn btn-secondary btn-sm" role="button">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once("../common/pagination.php");
?>

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
