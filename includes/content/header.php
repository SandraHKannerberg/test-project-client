<header class="my-header container-fluid">
    <div class="my-header-wrapper row">
        <div class="my-menu-wrapper col">
            <ul class="my-menu">
                <li class="nav-item">
                    <!-- <a class="nav-link" aria-current="page" href="index.php">Home</a> -->
                    <a class="nav-link <?php echo ($page == 'home') ? 'active' : ''; ?>" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" aria-current="page" href="userlist.php">Users</a> -->
                    <a class="nav-link <?php echo ($page == 'user') ? 'active' : ''; ?>" aria-current="page" href="userlist.php">Users</a>
                </li>
            </ul>
        </div>
    </div>
</header>