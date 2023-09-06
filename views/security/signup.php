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

<div class="form_container container p-5 rounded mx-auto bg-secondary mt-5 text-primary ">

    <h2 class="text-center">Sign Up</h2>

    <form class="mt-5">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Password confirmation</label>
            <input type="password" class="form-control" id="confirmPassword">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp">
        </div>
        <div class="mb-3">
            <label for="pp" class="form-label">Profil picture</label>
            <input type="file" class="form-control" id="pp" aria-describedby="fileHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php include(VIEWS . '_partials/footer.php'); ?>