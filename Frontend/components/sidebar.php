<?php
    $page = $_GET['page'];
?>
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-graduation'></i></i>
        <span class="text">TatibSystem</span>
    </a>
    <ul class="side-menu top">
        <li class="<?= $page === 'dashboard' ? 'active' : '' ?>">
            <a href="index.php?page=dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Home</span>
            </a>

        </li>

        <li class="<?= $page === 'attendance' ? 'active' : '' ?>">
            <a href="index.php?page=attendance">
                <i class='bx bx-calendar' ></i>
                <span class="text">Attendance</span>
            </a>
           
        </li>    
        <li class="<?= $page === 'archive' ? 'active' : '' ?>">
            <a href="index.php?page=archive">
                <i class='bx bx-bookmark'></i></i>
                <span class="text">Archive</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Compentation</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li>
            <a href="#">
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