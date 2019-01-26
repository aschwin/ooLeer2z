<?php require(__DIR__.'/../../../core/Views/partials/header.php'); ?>
<?php require(__DIR__.'/../../../core/Views/partials/navigation.php'); ?>

<div class="container">
    <h2><?php echo $response['message']; ?></h2>
    <a href="/invoices">Return to overview</a>
</div>

<?php require(__DIR__.'/../../../core/Views/partials/footer.php'); ?>
