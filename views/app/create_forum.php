<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-20 20:09:10 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 20:13:06
 * @Description: Forum creation page
 */

?>

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>


<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1 bg-main p-5">

    <div class="form_container container p-5 rounded mx-auto bg-content text-primary ">

        <h2 class="form_title text-center mb-5">Create a forum</h2>

        <!-- Sign Up form -->
        <form method="post">
            <div class="py-2">
                <label for="forum" class="form-label">Forum name</label>
                <input type="text" class="form-control rounded mb-1" name="forum" id="forum" value="<?= $_POST["forum"] ?? ""; ?>" aria-describedby="emailHelp">
                <small class="text_error"><?= $error['forum'] ?? ""; ?></small>
            </div>
            <button type="submit" class="mt-4 btn btn-primary rounded">Create</button>
        </form>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>