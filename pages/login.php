<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>로그인</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
