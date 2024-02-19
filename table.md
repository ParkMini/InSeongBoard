# 기능 명세서

- **게시글 기능**

  - 게시글을 작성할 수 있어야 함.
  - 탐색 페이지에서 최근 10개의 게시글을 볼 수 있어야 함.
  - 탐색 페이지에서 게시글 제목으로 검색할 수 있어야 함.
  - 관리자 페이지에서는 모든 게시글이 출력되어야 하고, 게시글을 강제 삭제할 수 있어야 함.

- **회원가입 정보**

  - 아이디
  - 비밀번호
  - 전화번호
  - 이메일
  - 생년월일
  - 성별

- **로그인 정보**
  - 아이디
  - 비밀번호

## Database Name : InSeong

## User Table : users

| Column Name   | Type                 | Description              |
| ------------- | -------------------- | ------------------------ |
| user_idx (PK) | int                  | A.I.로 ID 값을 자동 생성 |
| username      | varchar(255)         | 사용자 아이디            |
| password      | varchar(255)         | 사용자 비밀번호          |
| email         | varchar(255)         | 사용자 이메일            |
| phone_number  | char(11)             | 사용자 전화번호          |
| gender        | enum("man", "woman") | 성별                     |
| is_admin      | boolean              | 관리자인가?              |
| registed_date | timestamp            | 가입일                   |

## Post Table : posts

| Column Name   | Type      | Description              |
| ------------- | --------- | ------------------------ |
| post_idx (PK) | int       | A.I.로 ID 값을 자동 생성 |
| user_idx (FK) | int       | 작성한 유저 ID 정보      |
| title         | varchar   | 게시글 제목              |
| content       | text      | 게시글 내용              |
| write_date    | timestamp | 게시글 작성 시간         |
| is_deleted    | boolean   | 게시글 삭제 여부         |
