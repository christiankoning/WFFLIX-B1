<?php

//'route path' => ['actual path', int below more info]

// 0 = user that is not logged in
// 1 = user that is logged in
// 2 = admin that is logged in

$router->define([
    '' => ['controllers/home.php', 0],
    'contact' => ['controllers/contact.php', 0],
    'faq' => ['controllers/faq.php', 0],
    'courses' =>['controllers/categories.php', 1],
    'courses/start' =>['controllers/courses.php', 1],
    'courses/view' => ['controllers/courseDetails.php', 1],


//    account
    'login' => ['controllers/login.php', 0],
    'register' => ['controllers/register.php', 0],
    'logout' => ['controllers/logout.php', 1],
    'verify/send' => ['controllers/verify/send.php', 0],
    'verify/password' => ['controllers/verify/password.php', 0],
    'verify/activate' => ['controllers/verify/activate.php', 0],
    'forgotpassword' => ['controllers/forgotpassword.php', 0],


//Profile
    'profile' =>  ['controllers/ProfileControllers/profile.php',1],
    'password-reset' =>  ['controllers/ProfileControllers/passwordReset.php',1],
    'profile-update' =>  ['controllers/ProfileControllers/updateProfile.php',1],

//admin routes

//users
    'admin' => ['controllers/admin/admin.php', 2],
    'admin/users' => ['controllers/admin/viewUsers.php', 2],
    'admin/users/create' => ['controllers/admin/createUsers.php', 3],
    'admin/users/update' => ['controllers/admin/updateUsers.php', 3],
    'admin/users/delete' => ['controllers/admin/deleteUsers.php',3],

//videos
    'admin/videos' => ['controllers/admin/viewVideos.php', 2],
    'admin/videos/create' => ['controllers/admin/createVideos.php',2],
    'admin/videos/update' => ['controllers/admin/updateVideos.php', 2],
    'admin/videos/delete' => ['controllers/admin/deleteVideo.php',2],


//categories
    'admin/categories' => ['controllers/admin/viewCategories.php', 2],
    'admin/categories/create' => ['controllers/admin/createCategories.php',2],
    'admin/categories/update' => ['controllers/admin/updateCategories.php', 2],
    'admin/categories/delete' => ['controllers/admin/deleteCategories.php',2]
]);

