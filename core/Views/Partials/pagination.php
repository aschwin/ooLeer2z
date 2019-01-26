<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $response['pages']; ++$i) { ?>
            <li>
                <a href="/invoices/?offset=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
