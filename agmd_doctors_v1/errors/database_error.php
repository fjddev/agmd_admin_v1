<?php include '../view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the AGMD database.</p>
    <p>Check if MYSQL Is running</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</main>
<?php include '../view/footer.php'; ?>