<?php
session_start();
include('./config/dbconnect.php');

$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);
echo "<script>console.log('path[0] = " . $path[0] . "');</script>";
echo "<script>console.log('path[1] = " . $path[1] . "');</script>";
// echo isset($_SESSION["user_idx"]) ? "<h1>로그인 되었습니다 : " . $_SESSION["user_idx"] : "<h1>로그인되지 않았습니다.";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Router</title>
    <link rel="stylesheet" href="./css/global.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    $page = "";
    include('./components/header.php');
    switch ($resource[1]) {
        case '':
            $page = "./pages/main.php";
            break;
        case 'login':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'register':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'logout':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'posting':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'posts':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        case 'admin':
            $page = "./pages/" . $resource[1] . ".php";
            break;
        default:
            $page = "./pages/404.php";
            break;
    }
    include($page);
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>