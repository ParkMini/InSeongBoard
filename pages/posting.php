<?php
// 로그인 했는지 검증
if (!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용 가능합니다.');
    location.href = './login';
    </script>
    ";
}

// 게시글 제출 처리
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_idx = $_SESSION['user_idx']; // 로그인된 사용자 ID

    // 게시글 데이터를 데이터베이스에 저장
    $query = "INSERT INTO posts (user_idx, title, content) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([$user_idx, $title, $content])) {
        echo "<script>alert('게시글이 성공적으로 등록되었습니다.');</script>";
        header("Location: /"); // 게시글 목록 페이지로 리디렉션
    } else {
        echo "<script>alert('게시글 등록에 실패했습니다.');</script>";
    }
}
?>

<div class="container mt-5">
    <h1>게시글 작성</h1>
    <form action="posting" method="post">
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">내용</label>
            <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">게시글 등록</button>
    </form>
</div>