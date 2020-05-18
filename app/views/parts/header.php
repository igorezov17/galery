<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">-->
    <!--<link rel="stylesheet" href="../css/bulma.css">-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <nav class="navbar is-transparent">
          <div class="navbar-brand">
            <a class="navbar-item" href="/">
              <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="/">
                Главная
              </a>
              <a class="navbar-item" href="/news">
                Новости
              </a>
              <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="category.html">
                  Категории
                </a>
                <div class="navbar-dropdown is-boxed">
                  <a class="navbar-item" href="category.html">
                    Природа
                  </a>
                  <a class="navbar-item" href="category.html">
                    Машины
                  </a>
                  <a class="navbar-item" href="category.html">
                    Дизайн и Интерьер
                  </a>
                  <a class="navbar-item" href="category.html">
                    Животные
                  </a>
                </div>

              </div>
            </div>

            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <p class="control">
                    <a class="button is-link" href="/login">
                      <span class="icon">
                        <i class="fas fa-user"></i>
                      </span>
                      <span>Войти</span>
                    </a>
                  </p>
                  <p class="control">
                    <a class="button is-primary" href="/register">
                      <span class="icon">
                        <i class="fas fa-address-book"></i>
                      </span>
                      <span>Зарегистрироваться</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
     