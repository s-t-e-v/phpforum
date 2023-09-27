<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-27 17:37:18 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 17:55:56
 * @Description: User profile page
 */
?>

<?php !isset($_SESSION['error']) ?: $error = $_SESSION['error']; ?>

<?php include(VIEWS . '_partials/header.php'); ?>

<main class="flex-grow-1 bg-main p-3">

    <!-- User profile -->
    <div class="container pt-3 pb-5 rounded mx-auto bg-content text-primary">
        <!-- Title -->
        <div class="w-100 position-relative">
            <a class="btn btn-info btn-sm rounded position-absolute end-0" href="<?= BASE . "user/profile/edit"; ?>">Edit</a>
            <h2 class="text-center form_title pt-5">Profile</h2>
        </div>

        <!-- User primary information -->
        <div class="text-center pt-3 form-label">
            <img src="<?= $user['picture_profil'] ? UPLOAD . $user['picture_profil'] : ASSETS . 'img/default_pp.png'; ?>" alt="Profil picture" class="rounded-circle profile_picture-75">
            <div class="fs-5"><?= $user["nickname"]; ?></div>
            <div><span class="fw-bold">e-mail: </span><?= $user["email"]; ?></div>
        </div>

        <!-- User default forum -->
        <div class="py-3">
            <h3 class="form-label pb-3">Default forum</h3>
            <ul class="list-group">
                <li class="list-group-item">A second item</li>
            </ul>
        </div>

        <!-- User forums list -->
        <div class="py-3">
            <h3 class="form-label pb-3">Forums</h3>
            <ul class="list-group">
                <li class="list-group-item">An item</li>
                <li class="list-group-item position-relative">A second item <span class="badge bg-secondary position-absolute end-0 me-3">Default</span></li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And fifth one</li>
            </ul>
        </div>

        <!-- User topics list -->
        <div class="py-3">
            <h3 class="form-label pb-3">Topics</h3>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h4 class="accordion-header">
                        <button class="accordion-button position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Topic #1
                            <span class="badge bg-secondary position-absolute me-5 end-0">5</span>
                        </button>
                    </h4>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item">And fifth one</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                            Topic #2
                            <span class="badge bg-secondary position-absolute me-5 end-0">2</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                            Topic #3
                            <span class="badge bg-secondary position-absolute me-5 end-0">3</span>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit page button -->
        <div class="pt-3 text-center">
            <a class="btn btn-info rounded" href="<?= BASE . "user/profile/edit"; ?>">Edit page</a>
        </div>
    </div>

</main>

<?php include(VIEWS . '_partials/footer.php'); ?>