<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-08 16:37:13 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-08 16:39:40
 * @Description: Login page
 */
?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1 bg-main p-5">

    <div class="form_container container p-5 rounded mx-auto bg-content text-primary ">

        <h2 class="form_title text-center mb-5">Login</h2>

        <!-- Sign Up form -->
        <form method="post">
            <div class="py-2">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control rounded mb-1" name="email" id="email" value="<?= $_POST["email"] ?? ""; ?>" aria-describedby="emailHelp">
                <small class="text_error"><?= $error['email'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded mb-1" name="password" id="password">
                <small class="text_error"><?= $error['password'] ?? ""; ?></small>
            </div>
            <button type="submit" class="mt-4 btn btn-primary rounded">Login</button>
        </form>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>