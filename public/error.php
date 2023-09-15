<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-14 13:08:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 02:45:29
 * @Description: Displays a user friendly error message.
 */
?>


<?php if ($e instanceof Err && $e->getErrorType() === 'fatal') : ?>


    <?php include(VIEWS . '_partials/header.php'); ?>


    <main class="flex-grow-1">
        <div class="container py-5">
            <p class="text-light fs-5">If the issue persists, please contact the <a href="mailto:" class="text-secondary">admin staff</a>.</p>
        </div>
    </main>

    <?php include(VIEWS . '_partials/footer.php'); ?>

<?php else : ?>

    <?php
    // var_dump($foundMethod);
    // die;
    ?>

    <?php header('location:' . $currentUrl);
    exit(); ?>


<?php endif; ?>