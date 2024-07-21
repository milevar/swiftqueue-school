<?php
$params = '';
foreach ($extraParams as $paramKey => $paramValue) {
    $params .= '&' . $paramKey . '=' . $paramValue;
}
?>
<!--
$page
$totalPages
$totalResults
$rowCount
$paginationRoute
$extraParams[]
-->
<div class="d-flex justify-content-sm-between align-items-sm-center">
    <nav>
        <ul class="pagination">
            <li class="page-item <?= $page > 1 ? '' : 'disabled' ?>">
                <a class="page-link"
                   href="<?= $paginationRoute . '?page=' . ($page - 1) . $params ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $paginationRoute . '?page=' . $i . $params ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php } ?>
            <li class="page-item <?= $page < $totalPages ? '' : 'disabled' ?>">
                <a class="page-link" href="<?= $paginationRoute . '?page=' . ($page + 1) . $params ?>">Next</a>
            </li>
        </ul>
    </nav>
    <p class="mb-0 text-sm-end text-body-secondary">
        Showing <?= $rowcount ?> results of <?= $totalResults ?> entries
    </p>
</div>
