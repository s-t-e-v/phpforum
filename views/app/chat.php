<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 17:07:38 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 18:09:57
 * @Description: Chat page
 */
?>

<?php include(VIEWS . '_partials/header.php'); ?>


<main class="flex-grow-1">
    <div class="container mb-5">

        <h2 class="text-light text-center text-md-start"><?= $topic['title']; ?></h2>

        <div class="row mt-3">
            <div class="col-12 col-md-8">
                <span class="text-light">messages...</span>
            </div>
            <div class="col-12 col-md-4">
                <!-- Message form -->
                <form method="post">
                    <label for="message" class="form-label text-light">Answer</label>
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control rounded mb-1" placeholder="Type your message here"></textarea>
                        <small class="text_error"><?= $error['message'] ?? ""; ?></small>
                        <button type="submit" class="mt-4 btn btn-info rounded">Send</button>
                    <?php else : ?>
                        <p class="text-center text-light">Login to answer</p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>