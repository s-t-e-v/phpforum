<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 00:07:32 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 01:19:04
 * @Description: Signup page
 */
?>

<?php include(VIEWS . '_partials/header.php'); ?>

<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<br>";
echo "<pre>";
var_dump($error);
echo "</pre>";
?>

<main class="flex-grow-1 bg-main p-5">

    <div class="form_container container p-5 rounded mx-auto bg-content text-primary ">

        <h2 class="form_title text-center mb-5">Sign Up</h2>

        <!-- Sign Up form -->
        <form method="post" enctype="multipart/form-data">
            <div class="form_legend">
                <small><span class="required_symb">*</span> indicates a required field.</small>
            </div>
            <div class="py-2">
                <label for="email" class="form-label required">Email address</label>
                <input type="text" class="form-control rounded mb-1" name="email" id="email" aria-describedby="emailHelp">
                <small class="text_error"><?= $error['email'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="password" class="form-label required">Password</label>
                <input type="password" class="form-control rounded mb-1" name="password" id="password">
                <small class="text_error"><?= $error['password'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="confirmPassword" class="form-label required">Password confirmation</label>
                <input type="password" class="form-control rounded mb-1" name="confirmPassword" id="confirmPassword">
                <small class="text_error"><?= $error['confirmPassword'] ?? ""; ?></small>
            </div>
            <div class="py-2">
                <label for="pseudo" class="form-label required">Pseudo</label>
                <input type="text" class="form-control rounded mb-1" name="pseudo" id="pseudo" aria-describedby="pseudoHelp">
                <small class="text_error"><?= $error['pseudo'] ?? ""; ?></small>
            </div>
            <div class="py-2 pp_input">
                <label for="pp" class="form-label">Profil picture</label>
                <input type="file" class="form-control rounded" name="pp" id="pp" aria-describedby="fileHelp">
            </div>
            <button type="submit" class="mt-4 btn btn-primary rounded">Submit</button>
        </form>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>