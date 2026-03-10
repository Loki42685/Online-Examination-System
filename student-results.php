<?php
session_start();
include("config.php");

if(!isset($_SESSION['student_id'])){
    header("Location: student-login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

/* Get published results */

$query = mysqli_query($conn,"
SELECT 
results.exam_id,
exams.exam_name,
results.total_marks AS obtained_marks,
results.percentage,
results.grade
FROM results
JOIN exams ON results.exam_id = exams.id
WHERE results.student_id='$student_id'
AND results.is_published = 1
");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Results</title>

<style>

body{
font-family:'Segoe UI';
background:#eef4ff;
padding:40px;
}

.back-btn{
display:inline-block;
background:#007bff;
color:white;
padding:10px 18px;
border-radius:6px;
text-decoration:none;
margin-bottom:20px;
}

.header-strip{
background:#1a3c7c;
color:white;
padding:15px 20px;
font-size:20px;
border-radius:6px;
margin-bottom:30px;
}

.container{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;
}

.card{
background:white;
border-left:6px solid #1a3c7c;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
text-align:center;
overflow:hidden;
}

.card h3{
background:#1a3c7c;
color:white;
margin:0;
padding:12px;
}

.card p{
margin:12px 0;
font-weight:bold;
}

.grade{
color:#1a3c7c;
font-size:18px;
}

.card a{
display:inline-block;
margin-bottom:15px;
background:#1a3c7c;
color:white;
padding:8px 15px;
border-radius:6px;
text-decoration:none;
}

.no-results{
text-align:center;
font-size:18px;
color:#555;
}

</style>

</head>
<body>

<a href="student-dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

<div class="header-strip">
📊 My Exam Results
</div>

<div class="container">

<?php 
if(mysqli_num_rows($query) > 0){

while($row=mysqli_fetch_assoc($query)){ 
?>

<div class="card">

<h3><?php echo $row['exam_name']; ?></h3>

<p>Marks: <?php echo $row['obtained_marks']; ?></p>

<p>Percentage: <?php echo $row['percentage']; ?>%</p>

<p class="grade">Grade: <?php echo $row['grade']; ?></p>

<a href="student-result-details.php?exam_id=<?php echo $row['exam_id']; ?>">
View Details
</a>

</div>

<?php 
}
}else{
echo "<div class='no-results'>No results published yet.</div>";
}
?>

</div>

</body>
</html>