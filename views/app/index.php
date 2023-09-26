<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 19:35:07 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-26 20:36:00
 * @Description: Home page.
 */
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<?php
// echo "<pre>";
// var_dump($forum);
// echo "<br>";
// var_dump($forum['name']);
// echo "</pre>";
// $forums = null;
?>

<main class="flex-grow-1">

    <!-- Other forums -->
    <div class="mb-5 bg-dark">
        <div class="container py-3">
            <!-- Forum title -->

            <h2 class="text-light mb-5"><?= $current_forum["name"] ?? "PHP forum"; ?></h2>
            <div class="d-flex justify-content-between">
                <h3 class="text-light h4">Other forums</h3>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <a href="<?= BASE . 'login'; ?>" class="btn btn-primary mx-2 rounded">Login to create</a>
                <?php else : ?>
                    <a href="<?= BASE . "add"; ?>" class="btn btn-secondary px-5 rounded">Create</a>
                <?php endif; ?>
            </div>
            <!-- Forums listing -->
            <div class="py-3 mx-3">

                <?php if (isset($forums)) : ?>
                    <div class="row justify-content-center pt-3">
                        <?php $i = 0; ?>
                        <?php foreach ($forums as $forum) : ?>
                            <?php if ($i == 6) break; ?>
                            <div class="col-md-6 col-lg-4 bg-light p-3">
                                <a class="btn btn-primary rounded h-100 w-100 d-flex align-items-center justify-content-center" href="<?= BASE . "f/" . $forum['url_name']; ?>">
                                    <?= $forum['name']; ?>
                                </a>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="d-flex justify-content-center">
                        <img class="logo-50" src="<?= ASSETS . "img/forum.svg"; ?>" alt="Forum logo">
                    </div>
                    <p class="text-center text-light">No forums yet</p>
                <?php endif; ?>
            </div>

            <p class="text-center">
                <button class="btn btn-info rounded more" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    More
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
    </div>

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
                <a href="<?= BASE . $forum_url . 'topic/chat?id=' . $topic['id']; ?>" class="btn btn-primary rounded text-center text-light p-2 mb-2 w-100">
                    <img src="<?= $topic['picture_profil'] ? UPLOAD . $topic['picture_profil'] : ASSETS . 'img/default_pp.png'; ?>" alt="Profil picture" class="rounded-circle profile_picture-75">
                    <h3><?= $topic['title']; ?></h3>
                    <p>by: <?= $topic['nickname']; ?></p>
                    <p><?= date('d/m/Y H:i:s', strtotime($topic['created_at'])); ?></p>
                </a>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] === $topic['id_user']) : ?>
                    <a onclick="return confirm('Are you sure to delete this topic?')" href="<?= BASE . $forum_url . 'topic/delete?id=' . $topic['id']; ?>" class="btn btn-danger rounded">Delete</a>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include(VIEWS . '_partials/footer.php'); ?>