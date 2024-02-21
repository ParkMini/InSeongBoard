<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $gender = $_POST['gender'];

  try {
    $sql = "INSERT INTO users (username, password, email, phone_number, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $email, $phone_number, $gender]);
    echo "회원가입이 성공적으로 완료되었습니다.";
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>
<div class="container">
  <h2 class="mt-5">회원가입</h2>
  <form action="/register" method="post">
    <div class="form-group">
      <label for="username">아이디</label>
      <input type="text" class="form-control" id="username" name="username" required />
    </div>
    <div class="form-group">
      <label for="password">비밀번호</label>
      <input type="password" class="form-control" id="password" name="password" required />
    </div>
    <div class="form-group">
      <label for="email">이메일</label>
      <input type="email" class="form-control" id="email" name="email" required />
    </div>
    <div class="form-group">
      <label for="phone_number">전화번호</label>
      <input type="text" class="form-control" id="phone_number" name="phone_number" />
    </div>
    <div class="form-group">
      <label>성별</label>
      <div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="gender_man" value="man" />
          <label class="form-check-label" for="gender_man">남자</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="gender_woman" value="woman" />
          <label class="form-check-label" for="gender_woman">여자</label>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">회원가입</button>
  </form>
</div>