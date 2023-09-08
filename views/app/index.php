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
            <form method="post" action="">
                <div class="form-group">
                    <div class="input-group">
                        <label for="topic" class="input-group-text px-5 fs-5 form-label">Topic name</label>
                        <input type="text" class="form-control rounded w-50 fs-5" name="topic" id="topic" value="<?= $_POST["topic"] ?? ""; ?>" aria-describedby="emailHelp">
                        <input type="submit" class="mt-4 btn btn-info px-5 rounded fs-5" value="Create">
                    </div>
                    <small class="text_error"><?= $error['topic'] ?? ""; ?></small>
                </div>
            </form>
        <?php else : ?>
            <p class="h2 text-center text-light">Login to create a new topic</p>
        <?php endif; ?>

    </div>
</main>



<?php include(VIEWS . '_partials/footer.php'); ?>