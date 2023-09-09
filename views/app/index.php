<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:35:07 
 * @Last Modified by:   undefined 
 * @Last Modified time: 2023-09-04 19:35:07
 * @Description: Home page.
 */
?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1">
    <div class="container">

        <!-- Topic creation form -->
        <?php if (isset($_SESSION['user'])) : ?>
            <h2 class="text-center text-light">Create a topic</h2>
            <form method="post" action="" class="topic_form mx-auto">
                <div class="form-group d-flex align-items-md-center flex-column flex-md-row">
                    <label for="topic" class="text-light mb-2 mb-md-0 fs-5">Topic name</label>
                    <div class="flex-grow-1 mb-3 mb-md-0 ms-md-2">
                        <input type="text" class="form-control rounded fs-5" name="topic" id="topic" value="<?= $_POST["topic"] ?? ""; ?>">
                        <small class="text_error"><?= $error['topic'] ?? ""; ?></small>
                    </div>
                    <input type="submit" class="btn btn-info px-5 rounded fs-5" value="Create">
                </div>
            </form>
        <?php else : ?>
            <p class="h2 text-center text-light">Login to create a new topic</p>
        <?php endif; ?>

    </div>
</main>



<?php include(VIEWS . '_partials/footer.php'); ?>