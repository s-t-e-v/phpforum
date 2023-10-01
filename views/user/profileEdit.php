<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-27 17:37:18 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 17:55:56
 * @Description: User profile edition page
 */
?>

<?php include(VIEWS . '_partials/header.php'); ?>
<?php $only_primary_info = !$topicsByForum && !$forums; ?>

<main class="flex-grow-1 bg-main p-3">

    <!-- User profile -->
    <div class="container pt-3 pb-5 rounded mx-auto bg-content text-primary">
        <form method="post" enctype="multipart/form-data">
            <div class="row">


                <?php if ($only_primary_info) : ?>
                    <div class="col-lg-12 px-4 mx-auto primary_info">
                    <?php else : ?>
                        <div class="col-lg-6 px-4 px-lg-5">
                        <?php endif; ?>
                        <!-- Title -->
                        <h2 class="text-center form_title pt-5">Edit profile</h2>

                        <!-- User primary information -->
                        <div class="text-center pt-3 form-label">
                            <img src="<?= $user['picture_profil'] ? UPLOAD . $user['picture_profil'] : ASSETS . 'img/default_pp.png'; ?>" alt="Profil picture" class="rounded-circle s-200">
                            <div class="fs-5"><?= $user["nickname"]; ?></div>
                            <div><span class="fw-bold">e-mail: </span><?= $user["email"]; ?></div>
                        </div>

                        <!-- User default forum -->
                        <div class="py-3">
                            <h3 class="form-label pb-3">Default forum</h3>
                            <ul class="list-group">
                                <li class="list-group-item"><?= $default_forum['name'] ?? "<span class='fst-italic'>No default forum</span>"; ?></li>
                            </ul>
                        </div>

                        <!-- User forums list -->
                        <?php if ($forums && $topicsByForum) : ?>
                            <div class="py-3">
                                <h3 class="form-label pb-3">Forums</h3>
                                <ul class="list-group">
                                    <?php foreach ($forums as $forum) : ?>
                                        <?php if ($default_forum && $forum['id'] === $default_forum['id_forum']) : ?>
                                            <li class="list-group-item position-relative"><?= $forum["name"]; ?><span class="badge bg-secondary position-absolute end-0 me-3">Default</span></li>
                                        <?php else : ?>
                                            <li class="list-group-item"><?= $forum["name"]; ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        </div>
                        <?php if (!$only_primary_info) : ?>
                            <div class="col-lg-6 px-4 px-lg-5">
                                <!-- User forums list -->
                                <?php if ($forums && !$topicsByForum) : ?>
                                    <div class="py-3">
                                        <h3 class="form-label pb-3">Forums</h3>
                                        <ul class="list-group">
                                            <?php foreach ($forums as $forum) : ?>
                                                <?php if ($default_forum && $forum['id'] === $default_forum['id_forum']) : ?>
                                                    <li class="list-group-item position-relative"><?= $forum["name"]; ?><span class="badge bg-secondary position-absolute end-0 me-3">Default</span></li>
                                                <?php else : ?>
                                                    <li class="list-group-item"><?= $forum["name"]; ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <!-- User topics list -->
                                <?php if ($topicsByForum) : ?>
                                    <div class="py-3">
                                        <h3 class="form-label pb-3">Topics</h3>
                                        <div class="accordion">
                                            <?php $i = 1; ?>
                                            <?php foreach ($topicsByForum as $forumName => $topics) : ?>
                                                <div class="accordion-item">
                                                    <h4 class="accordion-header">
                                                        <button class="accordion-button position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#panel<?= $i; ?>" aria-expanded="true" aria-controls="panel<?= $i; ?>">
                                                            Forum #<?= $i; ?>:<span class="<?= $topics[0]['id_forum'] !== 1 ?: "text-warning"; ?> ms-1 fw-bold"> <?= $forumName; ?></span>
                                                            <span class="badge bg-secondary position-absolute me-5 end-0"><?= count($topics); ?></span>
                                                        </button>
                                                    </h4>
                                                    <div id="panel<?= $i; ?>" class="accordion-collapse collapse show">
                                                        <div class="accordion-body">
                                                            <ul class="list-group">
                                                                <?php foreach ($topics as $topic) : ?>
                                                                    <li class="list-group-item"><?= $topic['title']; ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Apply changes button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-info rounded">Apply changes</a>
                    </div>

            </div>
        </form>

</main>

<?php include(VIEWS . '_partials/footer.php'); ?>