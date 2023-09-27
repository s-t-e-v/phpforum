<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-27 17:37:18 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 17:55:56
 * @Description: User profile page
 */
?>

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1">

    <div class="container bg-secondary rounded">
        <form method="post" enctype="multipart/form-data">
            <h2 class="text-center form_title">Profile</h2>

        </form>
    </div>

</main>

<?php include(VIEWS . '_partials/footer.php'); ?>