<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KolpakovVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Login In!</h1>
                <?php
                if (!isset($_COOKIE['User'])) {   
                ?>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/registration.php" class="btn btn-primary">Registartion</a>
                    <a href="/login.php" class="btn btn-primary">Login</a>
                </div>
                <?php
                } else {
                    $link = mysqli_connect('127.0.0.1', 'root', 'password', 'db_name');
                    $sql = "SELECT * FROM posts";
                    $res = mysqli_query($link, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($post = mysqli_fetch_array($res)) {
                            echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post["title"] . "</a><br>";
                        }
                    } else {
                        echo("No posts yet");
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<html>