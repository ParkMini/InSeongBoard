<?php
// 로그인 처리
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 아이디와 비밀번호를 사용하여 사용자 조회
  $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // 로그인 성공: 사용자 세션 정보 저장
    $_SESSION['user_idx'] = $user['user_idx'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['is_admin'] = $user['is_admin'];

    // 로그인 성공 후 이동할 페이지 지정
    header("Location: /"); // 변경 가능
    exit;
  } else {
    // 로그인 실패: 경고 메시지 출력
    echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.');</script>";
  }
}
?>

<div class="container">
  <h2 class="mt-5">로그인</h2>
  <form action="/login" method="post">
    <div class="form-group">
      <label for="username">아이디</label>
      <input type="text" class="form-control" id="username" name="username" required />
    </div>
    <div class="form-group">
      <label for="password">비밀번호</label>
      <input type="password" class="form-control" id="password" name="password" required />
    </div>
    <button type="submit" class="btn btn-primary">로그인</button>
  </form>
</div>