<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="/images/logohack.jpeg" alt="logo site" class="me-2">
                <span class="text-light">History</span>
            </a>
            <?php if (isset($_COOKIE['User'])): ?>
                <form action="/logout.php" method="POST" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php endif; ?>    
        </div>
    </nav>
    <div class="container mt-5">
        <div class="story-container">
            <div class="story-text">
                <p>Very match more text about all Very match more text about all Very match more text about all</p>
            </div>            
            <img src="/images/logohack2.jpeg" alt="foto on top" class="hacker-img">
        </div>
        <div class="text-center mt-4">
            <button id="toggleButton" class="btn btn-primary">Open</button>
        </div>    
        <div id="extraImage" class="mt-3 text-center" style="display: none;">
            <img class="hacker-img" src="/images/logohack3.jpeg" alt="Opened foto">
        </div>
        <div class="mt-5">
            <h2 class="text-center mb-4">Add New Post </h2>
            <form action="/profile.php" id="postForm" class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label" for="postTitle">Post Title</label>
                    <input type="text" name="postTitle" class="form-control-hacker-input" id="postTitle" placeholder="Enter Post Title" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="postContent">Post Content</label>
                    <textarea name="postContent" class="form-control-hacker-input" id="postContent" placeholder="Enter Post Content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="file">Upload File</label>
                    <input type="file" name="file" class="form-control-hacker-input" id="file">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save Post</button>
            </form>
        </div>
    </div>
    <script src="/js/script.js"></script>
</body>
<html>

<?php
if (isset($_COOKIE['User'])){
    header("Location: /login.php");
exit();
}

require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'password', 'db_name');

if (isset($_POST['submit'])) {
    $title = $_POST['postTitle'];
    $main_text = $_POST['postContent'];

    if (!$title || !$main_text) die ("No data post");

    if (!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg") 
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"] );
        echo "Load in: " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "Upload Failed!";
        }
    }
   
}
?>