<?php
    $page = $_GET['page'];
?>
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-graduation'></i></i>
        <span class="text">Tatib</span>
    </a>
    <ul class="side-menu top">
        <li class="<?= $page === 'dashboard' ? 'active' : '' ?>">
            <a href="index.php?page=dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        

        <li class="<?= $page === 'attendance' ? 'active' : '' ?>">
            <a href="index.php?page=attendance">
                <i class='bx bx-calendar' ></i>
                <span class="text">Attendance</span>
            </a>
        </li>    


        <li class="<?= $page === 'violation' ? 'active' : '' ?>">
            <a href="index.php?page=violation">
            <i class='bx bx-error-alt'></i>
                <span class="text">Violation</span>
            </a>
        </li>


        <li class="<?= $page === 'rules' ? 'active' : '' ?>">
            <a href="index.php?page=rules">
            <i class='bx bx-food-menu'></i>
                <span class="text">Rules</span>
            </a>
        </li>


        <li class="<?= $page === 'services' ? 'active' : '' ?>">
            <a href="index.php?page=services">
                <i class='bx bxs-group' ></i>
                <span class="text">Services</span>
            </a>
        </li>
    </ul>


    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bx-chevron-left'></i></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
    <div class="ads">
        <div class="wrapper">
            <a href="#" class="btn-upgrade">Save</a>
            <p>Save your <span>DATA</span> safely and enjoy <span>All Features</span></p>
        </div>
    </div>
</section>