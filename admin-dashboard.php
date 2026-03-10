<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    display:flex;
    background:#eef5ff;
}

.sidebar{
    width:60px;
    height:100vh;
    background:#000428;
    color:white;
    position:fixed;
    transition:0.3s;
    overflow:hidden;
}

.sidebar.active{
    width:220px;
}

.sidebar ul li span{
    display:none;
}

.sidebar.active ul li span{
    display:inline;
}

.sidebar ul{
    list-style:none;
    padding:20px 10px;
}

.sidebar ul li{
    margin:25px 0;
}

.sidebar ul li a{
    text-decoration:none;
    color:white;
    display:flex;
    align-items:center;
    gap:15px;
    padding:10px;
    border-radius:8px;
    transition:0.3s;
}

.sidebar ul li a:hover{
    background:rgba(255,255,255,0.2);
}

.toggle{
    font-size:22px;
    padding:20px;
    cursor:pointer;
    color:white;
}

.main{
    margin-left:60px;
    width:100%;
    padding:40px;
    transition:0.3s;
}

.main.active{
    margin-left:220px;
}

.welcome-box{
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    text-align:center;
    margin-top:60px;
}

.welcome-box h1{
    color:#000428;
    margin-bottom:15px;
}
</style>
</head>

<body>

<div class="sidebar" id="sidebar">
    <div class="toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    <ul>

<li>
<a href="admin-dashboard.php">
<i class="fas fa-home"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<a href="manage-students.php">
<i class="fas fa-users"></i>
<span>Manage Students</span>
</a>
</li>

<li>
<a href="manage-teachers.php">
<i class="fas fa-chalkboard-teacher"></i>
<span>Manage Teachers</span>
</a>
</li>

<li>
<a href="manage-exams.php">
<i class="fas fa-book"></i>
<span>Manage Exams</span>
</a>
</li>

<li>
<a href="admin-view-results.php">
<i class="fas fa-chart-bar"></i>
<span>View Results</span>
</a>
</li>

<li>
<a href="admin-change-password.php">
<i class="fas fa-key"></i>
<span>Change Password</span>
</a>
</li>

<li>
<a href="admin-profile.php">
<i class="fas fa-user-circle"></i>
<span>Profile</span>
</a>
</li>

<li>
<a href="admin-logout.php">
<i class="fas fa-sign-out-alt"></i>
<span>Logout</span>
</a>
</li>

</ul>
</div>

<div class="main" id="main">

    <div class="welcome-box">
        <h1>Welcome Admin 👑</h1>
        <p>
            You have full control over the system.  
            Manage users, exams, and monitor performance.
        </p>
    </div>

</div>

<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("main").classList.toggle("active");
}
</script>

</body>
</html>
