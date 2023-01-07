<?php
$conn = new mysqli("localhost","root","","gamumu");
if($conn -> connect_error){
    die("Ошибка дурак " - $conn ->connect_error);
}
echo "Vse Ok";
$conn ->close();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аниме фан клуб</title>
    <link rel="stylesheet" href="./css//style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }

    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Верификация аккаунта успешно завершена.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: welcome.php");
            } else {
                $msg = "<div class='alert alert-info'>Сначала подтвердите свою учетную запись и повторите попытку.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Электронная почта или пароль не совпадают.</div>";
        }
    }
?>
      <section class="w3l-mockup-form">
        <div class="container">
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img class="anime" src="https://sun9-east.userapi.com/sun9-57/s/v1/ig2/kyGL9BAxhBmjWyICO8fmojrCVNK5jGu7gSNOfHvpkTQQ39ckZ__HLtHWxnpc2RmGCc0IXr8mjAtT8zplFE71CG5L.jpg?size=1080x1072&quality=95&type=album" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Вход</h2>
                        <p>Добро пожаловать в Бойцовский клуб. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Почта" required>
                            <input type="password" class="password" name="password" placeholder="Пароль" style="margin-bottom: 2px;" required>
                            
                            <button name="submit" name="submit" class="btn" type="submit">Вход в клуб</button>
                        </form>
                        <div class="social-icons">
                            <p>Для присоединения в клуб зарегайся! <a href="register.php">Регистрация</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>