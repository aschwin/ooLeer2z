<?php require(__DIR__.'/../../../core/Views/partials/header.php'); ?>
<?php require(__DIR__.'/../../../core/Views/partials/navigation.php'); ?>

<div class="container">
    <!-- Content here -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-right">ID</th>
                    <th class="text-left">Client</th>
                    <th class="text-right">Amount</th>
                    <th class="text-right">Amount + VAT</th>
                    <th class="text-right">VAT Rate</th>
                    <th class="text-right">Status</th>
                    <th class="text-right">Date</th>
                    <th class="text-right">Created At</th>
                    <th class="col-status">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($response['invoices'] as $invoice) : ?>
                <tr>
                    <td class="text-right cell"><?php echo $invoice->getId(); ?></td>
                    <td class="text-left cell"><?php echo $invoice->getClient(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getInvoiceAmount(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getInvoiceAmountPlusVat(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getVatRate(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getInvoiceStatus(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getInvoiceDate(); ?></td>
                    <td class="text-right cell"><?php echo $invoice->getCreatedAt(); ?></td>
                    <td class="col-status">
                        <?php if ($invoice->getInvoiceStatus() === 'paid') { ?>
                            <a class="btn btn-danger" type="button" href="/invoices/toggle-status?invoice_id=<?php echo $invoice->getId(); ?>&status=unpaid">Mark as Unpaid</></a>
                        <?php } else { ?>
                            <a class="btn btn-success" type="button" href="/invoices/toggle-status?invoice_id=<?php echo $invoice->getId(); ?>&status=paid">Mark as Paid</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require(__DIR__.'/../../../core/Views/partials/pagination.php'); ?>
<?php require(__DIR__.'/../../../core/Views/partials/footer.php'); ?>
