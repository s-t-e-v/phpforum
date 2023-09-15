<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 17:07:38 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 02:58:41
 * @Description: Chat page
 */
?>

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<div class="text-light">

    <?php

    // echo "YO!!!";
    // echo "<pre>";
    // var_dump($messages);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    ?>
</div>

<main class="flex-grow-1">
    <div class="container mb-5">

        <h2 class="text-light text-center text-md-start"><?= $topic['title']; ?></h2>

        <div class="row mt-3">
            <div class="col-12 col-md-8">
                <!-- Messages -->
                <?php foreach ($messages as $message) : ?>
                    <div class="text-light">

                        <?php

                        // echo "YO!!!";
                        // echo "<pre>";
                        // var_dump($message);
                        // echo "</pre>";
                        // echo "<pre>";
                        // var_dump($_SESSION);
                        // echo "</pre>";
                        ?>
                    </div>
                    <div class="bg-<?= isset($_SESSION['user']) ? ($_SESSION['user']['id'] === $message['id_user'] ? "info" : "secondary") : "secondary"; ?> text-dark rounded mb-3 p-2">
                        <img src="<?= $message['picture_profil'] ? UPLOAD . $message['picture_profil'] : ASSETS . 'img/default_pp.png'; ?>" alt="Profil picture" class="rounded-circle profile_picture-50">
                        <p>par : <?= $message['nickname']; ?></p>
                        <p class="fs-5"><?= $message['content']; ?></p>
                        <small><?= date('d/m/Y H:i:s', strtotime($message['created_at'])); ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-12 col-md-4">
                <!-- Message form -->
                <form method="post">
                    <label for="message" class="form-label text-light">Answer</label>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div class="pb-3">
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control rounded mb-1" placeholder="Type your message here"></textarea>
                            <small class="text_error"><?= $error['message'] ?? ""; ?></small>
                        </div>
                        <button type="submit" class="btn btn-info rounded">Send</button>
                    <?php else : ?>
                        <p class="text-center text-light"><a href="<?= BASE . 'login'; ?>" class="text-light btn btn-primary rounded">Login to answer</a></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include(VIEWS . '_partials/footer.php'); ?>