<?php
session_start();
if(!isset($_SESSION['teacher_id'])){
    header("Location: teacher-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Dashboard</title>
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
    background:#f2f9ff;
}

/* Sidebar */
.sidebar{
    width:60px;
    height:100vh;
    background:#1e3c72;
    color:white;
    position:fixed;
    transition:0.3s;
    overflow:hidden;
}

.sidebar.active{
    width:200px;
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

/* Main */
.main{
    margin-left:60px;
    width:100%;
    padding:40px;
    transition:0.3s;
}

.main.active{
    margin-left:200px;
}

/* Welcome Rectangle */
.welcome-box{
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    text-align:center;
    margin-top:40px;
}

.welcome-box h1{
    color:#1e3c72;
    font-size:34px;
    margin-bottom:15px;
}

.welcome-box p{
    font-size:18px;
    color:#555;
}

/* Inspirational Section */
.inspire{
    margin-top:60px;
    text-align:center;
}

.inspire h2{
    font-size:28px;
    color:#1e3c72;
    margin-bottom:15px;
}

.inspire p{
    font-size:18px;
    color:#444;
    max-width:700px;
    margin:auto;
    line-height:1.6;
}

.quote-icon{
    font-size:40px;
    color:#1e3c72;
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
<a href="teacher-dashboard.php">
<i class="fas fa-home"></i>
<span>Dashboard</span>
</a>
</li>

<li>
<a href="view-exams.php">
<i class="fas fa-book"></i>
<span>View Exams</span>
</a>
</li>

<li>
<a href="add-question.php">
<i class="fas fa-plus-circle"></i>
<span>Add Questions</span>
</a>
</li>

<li>
<a href="teacher-view-results.php">
<i class="fas fa-chart-bar"></i>
<span>View Results</span>
</a>
</li>
<li>
<a href="evaluate-answers.php">
<i class="fas fa-check-circle"></i>
<span>Evaluate Answers</span>
</a>
</li>
<li>
<a href="publish-results.php">
<i class="fas fa-upload"></i>
<span>Publish Results</span>
</a>
</li>
<li>
<a href="teacher-profile.php">
<i class="fas fa-user"></i>
<span>Profile</span>
</a>
</li>

<li>
<a href="teacher-change-password.php">
<i class="fas fa-key"></i>
<span>Change Password</span>
</a>
</li>

<li>
<a href="teacher-logout.php">
<i class="fas fa-sign-out-alt"></i>
<span>Logout</span>
</a>
</li>

</ul>

</div>

<div class="main" id="main">

    <!-- Welcome Rectangle -->
    <div class="welcome-box">
        <h1>Welcome <?php echo $_SESSION['teacher_name']; ?> 👋</h1>
        <p>“Teaching is the profession that creates all other professions.”</p>
    </div>

    <!-- Attractive Inspirational Section -->
    <div class="inspire">
        <div class="quote-icon">
            <i class="fas fa-quote-left"></i>
        </div>
        <h2>Shape Minds. Build Futures.</h2>
        <p>
            Every lesson you teach plants a seed of knowledge.  
            Every student you guide carries your influence into the future.  
            Your dedication today builds tomorrow’s leaders.
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
