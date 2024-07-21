<?php
require_once("../auth/Auth.php");
$auth->checkSession();

require_once("../common/dbConnection.php");

$extraParams = [];
$paginationRoute = '/users/';
$page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);
$query = "SELECT COUNT(*) as total FROM users";
$r = mysqli_fetch_assoc(mysqli_query($mysqli, $query));
$totalResults = $r['total'];
$totalPages = ceil($totalResults / $perPage);

$result = mysqli_query($mysqli, "SELECT *
FROM users
ORDER BY name ASC
LIMIT $startAt, $perPage");
$rowcount = mysqli_num_rows($result);
$title = "Users";
$activePage = "Users";

require_once("../common/header.php");
require_once("../common/message.php");
?>

<div class="container-fluid">
    <div class="d-grid mt-3 ps-0 justify-content-md-end">
        <a href="add.php" class='btn btn-primary me-md-2' role='button'>Add User</a>
    </div>
</div>

<table class="table table-hover mb-5 mt-5">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">&nbsp;</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    <?php while ($res = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $res['name'] ?></td>
            <td><?= $res['email'] ?></td>
            <td class="text-end">
                <a href="<?= 'edit.php?id=' .$res['id'] ?>" class="btn btn-secondary btn-sm" role="button">Edit</a>
                <a href="<?= 'delete.php?id=' .$res['id'] ?>"
                   onClick="return confirm('Are you sure you want to delete?')"
                   class="btn btn-secondary btn-sm" role="button">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
require_once("../common/pagination.php");
require_once("../common/footer.php");
?>
