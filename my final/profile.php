<?php
session_start();
require_once("header.php");

// Assuming there's a function to fetch user posts
$posts = $user->my_posts($user->id);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة الملف الشخصي</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }
        .profile-cover {
            height: 400px;
            background-image: url('https://www.bootdey.com/image/1352x300/00FFFF/000000');
            background-size: cover;
            background-position: center;
            position: relative;
            margin-bottom: 50px;
        }
        .profile-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-image {
            position: absolute;
            bottom: -50px;
            left: 30px;
            border: 4px solid #fff;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            overflow: hidden;
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.5);
        }
        .profile-image img {
            width: 100%;
            height: 100%;
        }
        .edit-profile-btn {
            position: absolute;
            bottom: 10px;
            right: 20px;
        }
        .profile-info {
            text-align: left;
            padding-left: 200px;
        }
        .profile-info h2 {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .profile-info p {
            margin: 0;
        }
        .nav-pills .nav-link {
            border-radius: 0;
            font-size: 16px;
            padding: 10px 20px;
        }
        .nav-pills .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        .tab-content {
            margin-top: 20px;
        }
        .tab-pane {
            padding: 20px;
        }
        .profile-stats .card {
            margin-bottom: 10px;
        }
        .card-body {
            padding: 1rem;
        }
        .stats-card {
            margin-top: 20px;
        }
        .stats-card .card-body {
            padding: 10px;
            font-size: 14px;
        }
        .stats-card .card-title {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cover Photo and Profile Photo Section -->
        <div class="profile-cover">
            <img src="cover_photo.jpg" alt="صورة الغلاف" class="img-fluid">
            <div class="profile-image">
                <img src="profile_photo.jpg" alt="صورة الملف الشخصي">
                <div class="edit-profile-btn">
                    <button class="btn btn-primary">تعديل الملف الشخصي</button>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="profile-info">
            <div class="row">
                <div class="col-md-8">
                    <!-- User Name and Bio -->
                    <h2>اسم المستخدم</h2>
                    <p>السيرة الذاتية: نص تمهيدي.</p>

                    <!-- Tabs for Posts, About, Friends, Photos, Videos, and More -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="posts-tab" data-toggle="pill" href="#posts" role="tab" aria-controls="posts" aria-selected="true">المنشورات</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="about-tab" data-toggle="pill" href="#about" role="tab" aria-controls="about" aria-selected="false">حول</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="friends-tab" data-toggle="pill" href="#friends" role="tab" aria-controls="friends" aria-selected="false">الأصدقاء</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="photos-tab" data-toggle="pill" href="#photos" role="tab" aria-controls="photos" aria-selected="false">الصور</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="videos-tab" data-toggle="pill" href="#videos" role="tab" aria-controls="videos" aria-selected="false">مقاطع الفيديو</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="more-tab" data-toggle="pill" href="#more" role="tab" aria-controls="more" aria-selected="false">المزيد</a>
                        </li>
                    </ul>

                    <!-- User Posts -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <?php foreach ($posts as $post): ?>
                            <div class="card post-card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                    <p class="card-text"><?php echo $post['content']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <p>محتوى حول...</p>
                        </div>
                        <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                            <p>محتوى الأصدقاء...</p>
                        </div>
                        <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                            <p>محتوى الصور...</p>
                        </div>
                        <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                            <p>محتوى مقاطع الفيديو...</p>
                        </div>
                        <div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
                            <p>محتوى المزيد...</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Statistics -->
                <div class="col-md-4">
                    <div class="profile-stats">
                        <div class="card text-center stats-card">
                            <div class="card-body">
                                <h5 class="card-title">المنشورات</h5>
                                <p class="card-text">11</p>
                            </div>
                        </div>
                        <div class="card text-center stats-card">
                            <div class="card-body">
                                <h5 class="card-title">المتابعين</h5>
                                <p class="card-text">2020</p>
                            </div>
                        </div>
                        <div class="card text-center stats-card">
                            <div class="card-body">
                                <h5 class="card-title">المتابعة</h5>
                                <p class="card-text">903</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-I6jcjK1Fj8KfKwweAkErMbjlV+gA1RYkbhmqUl7ixup1a2HtPFL1xC0U5ysw2U2o" crossorigin="anonymous"></script>
</body>
</html>
