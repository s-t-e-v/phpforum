<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-28 23:47:58 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-29 01:34:32
 * @Description: User security management
 */
?>


<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1 bg-main p-5">

    <div class="form_container container p-5 rounded mx-auto bg-content text-primary">

        <h2 class="form_title text-center mb-5">Security</h2>

        <!-- Sign Up form -->
        <form method="post" enctype="multipart/form-data">
            <h3 class="mt-3">Password</h3>
            <div class="py-2">
                <label for="old_pswd" class="form-label">Old password</label>
                <input type="password" class="form-control rounded mb-1" name="old_pswd" id="old_pswd" value="<?= $_POST["old_pswd"] ?? ""; ?>">
                <small class="text_error"><?= $error['old_pswd'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="new_pswd" class="form-label">New password</label>
                <input type="password" class="form-control rounded mb-1" name="new_pswd" id="new_pswd">
                <small class="text_error"><?= $error['new_pswd'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="confirm_new_pswd" class="form-label">New password confirmation</label>
                <input type="password" class="form-control rounded mb-1" name="confirm_new_pswd" id="confirm_new_pswd">
                <small class="text_error"><?= $error['confirm_new_pswd'] ?? ""; ?></small>
            </div>
            <button type="submit" class="mt-4 btn btn-primary rounded">Submit</button>
        </form>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>