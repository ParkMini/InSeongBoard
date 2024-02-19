<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>회원가입</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <h2 class="mt-5">회원가입</h2>
      <form action="/signup" method="post">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
