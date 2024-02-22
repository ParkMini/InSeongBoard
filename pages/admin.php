<?php
if (!isset($_SESSION["user_idx"])) {
    echo "
    <script>
    alert('로그인 후 이용하시기 바랍니다.');
    location.href = '/';
    </script>
    ";
} else {
    if ($_SESSION["is_admin"] == 0) {
        echo "
        <script>
        alert('관리자만 이용하실 수 있습니다.');
        location.href = '/';
        </script>
        ";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE posts SET is_deleted = 1 WHERE post_idx = :post_idx";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_idx', $_POST["post_idx"]);
    $stmt->execute();
}
?>

<?php
$sql = "SELECT * FROM posts WHERE is_deleted = 0 ORDER BY write_date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="../css/posts.css">

<div class="container mt-5">
    <h1>관리자 페이지</h1>
    <?php
    if ($posts) {
        foreach ($posts as $post) {
            $sql = "SELECT * FROM users WHERE user_idx = :user_idx";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_idx', $post["user_idx"]);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $divinnertext = "";
            $divinnertext .= "<div class='post'>";
            $divinnertext .= "<h2>" . $post["title"] . "</h2>";
            $divinnertext .= "<p>작성자 : " . $user["username"] . "</p>";
            $divinnertext .= "<p>게시글 ID : " . $post["post_idx"] . "</p>";
            $divinnertext .= "<p>작성일 : " . $post["write_date"] . "</p>";
            $divinnertext .= "<p>" . $post["content"] . "</p>";
            $divinnertext .= "<button id='" . $post["post_idx"] . "' onclick='postDelete(this);'>게시글 삭제</button>";
            $divinnertext .= "</div>";
            echo $divinnertext;
        }
    }
    ?>
</div>

<script>
    function postDelete(elem) {
        const post_idx = elem.id;
        const isConfirm = confirm(`정말로 ${post_idx}번 게시글을 삭제하시겠습니까?`);
        if (isConfirm) {
            $.ajax({
                url: './admin',
                type: 'POST',
                data: {"post_idx": post_idx},
                success: function () {
                    alert("정상적으로 게시글이 삭제되었습니다.");
                    location.href = './admin';
                },
                error: function() {
                    alert("게시글 삭제 중 문제가 발생하였습니다.");
                }
            })
        } else {
            alert("게시글 삭제가 취소되었습니다.");
        }
        return console.log(elem);
    }
</script>