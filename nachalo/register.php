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
    <title>Аниме фан клуб</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

   
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
                            <img class="anime" src="https://sun9-east.userapi.com/sun9-59/s/v1/ig2/HV_T5slFlN-uRjRDEWO2U2UT__0xGY8dwGbWDq8a579kwR2o1fXDDR7PYEs_cZXZdrPeKZ09-8eK52IoD8EDHJ-n.jpg?size=1280x1280&quality=95&type=album" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Для входа в бойцовский клуб нужно зарегатся</h2>
                        <p>Добро пожаловать в Бойцовский клуб.</p>
                        <?php echo $msg; ?>
                        <form action="connect.php" method="post">
                            <input type="text" class="name" name="name" placeholder="Твое имя воин" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Твоя почта самурай" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Пароль" required>
                           
                            <button name="submit" class="btn" type="submit">Регистрация</button>
                        </form>
                        <div class="social-icons">
                            <p>Уже имеешь акаунт! <a href="index.php">Вход</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </section>
   


</body>

</html>