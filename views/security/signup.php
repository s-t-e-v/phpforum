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

<main class="flex-grow-1 bg-main p-5">

    <div class="form_container container p-5 rounded mx-auto bg-content text-primary ">

        <h2 class="text-center">Sign Up</h2>

        <form class="mt-5">
            <div class="my-4 py-2">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control rounded" id="email" aria-describedby="emailHelp">
            </div>
            <div class="my-4 py-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded" id="password">
            </div>
            <div class="my-4 py-2">
                <label for="confirmPassword" class="form-label">Password confirmation</label>
                <input type="password" class="form-control rounded" id="confirmPassword">
            </div>
            <div class="my-4 py-2">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control rounded" id="pseudo" aria-describedby="pseudoHelp">
            </div>
            <div class="my-4 py-2 w-75">
                <label for="pp" class="form-label">Profil picture</label>
                <input type="file" class="form-control rounded" id="pp" aria-describedby="fileHelp">
            </div>
            <button type="submit" class="mt-4 btn btn-primary rounded">Submit</button>
        </form>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>