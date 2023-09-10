<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:35:07 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 18:00:40
 * @Description: Home page.
 */
?>

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1">
    <div class="container mb-5">

        <div class="mb-5">
            <!-- Topic creation form -->
            <?php if (isset($_SESSION['user'])) : ?>
                <h2 class="text-center text-light">Create a topic</h2>
                <form method="post" action="" class="topic_form mx-auto">
                    <div class="form-group d-flex align-items-md-start flex-column flex-md-row">
                        <div class="topic_form_label d-flex align-items-md-center">
                            <label for="title" class="text-light mb-2 mb-md-0 fs-5">Topic name</label>
                        </div>
                        <div class="flex-grow-1 mb-3 mb-md-0 ms-md-2">
                            <input type="text" class="form-control rounded fs-5" name="title" id="title" value="<?= $_POST["topic"] ?? ""; ?>">
                            <small class="text_error"><?= $error['title'] ?? ""; ?></small>
                        </div>
                        <input type="submit" class="btn btn-info px-5 rounded fs-5" value="Create">
                    </div>
                </form>
            <?php else : ?>
                <p class="h2 text-center text-light">Login to create a new topic</p>
            <?php endif; ?>
        </div>

        <!-- Topics listing -->
        <?php foreach ($topics as $topic) : ?>
            <div class="mt-2">
                <a href="<?= BASE . 'topic/chat?id=' . $topic['id']; ?>" class="btn btn-primary rounded text-center text-light p-2 mb-2 w-100">
                    <img src="<?= UPLOAD . $topic['picture_profil']; ?>" alt="Photo de profil" class="rounded-circle profile_picture-75">
                    <h3><?= $topic['title']; ?></h3>
                    <p>by: <?= $topic['nickname']; ?></p>
                    <p><?= date('d/m/Y H:i:s', strtotime($topic['created_at'])); ?></p>
                </a>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] === $topic['id_user']) : ?>
                    <a onclick="return confirm('Are you sure to delete this topic?')" href="<?= BASE . 'topic/delete?id=' . $topic['id']; ?>" class="btn btn-danger rounded">Delete</a>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>