<nav class="mb-1 navbar navbar-dark primary-color">
  <a class="navbar-brand" href="#"><?php echo $_ENV['ST_NAME'] ?></a>
    <?php if ($_SESSION['user']): ?>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light px-2" href="/panel">Панель</a>
            </li>
        </ul>
    <?php endif ?>
</nav>