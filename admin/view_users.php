<?php
include("auth.php");
include("../database/db.php");

$where = [];

if (!empty($_GET['gender'])) {
    $gender = mysqli_real_escape_string($conn, $_GET['gender']);
    $where[] = "gender='$gender'";
}

if (!empty($_GET['education_level'])) {
    $education = mysqli_real_escape_string($conn, $_GET['education_level']);
    $where[] = "education_level='$education'";
}

if (!empty($_GET['village'])) {
    $village = mysqli_real_escape_string($conn, $_GET['village']);
    $where[] = "village LIKE '%$village%'";
}

$sql = "SELECT * FROM job_seekers";

if (count($where) > 0) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$sql .= " ORDER BY registered_at DESC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Filter Job Seekers</title>
</head>
<body>

<h2>Registered Job Seekers</h2>

<!-- FILTER FORM -->
<form method="GET">
    Gender:
    <select name="gender">
        <option value="">All</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    Education:
    <select name="education_level">
        <option value="">All</option>
        <option value="0">No Education</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="diploma">diploma</option>
        <option value="degree">degree</option>
        <option value="master">master</option>
    </select>
    Age range:
    <select name="age_range">
    <option value="">All </option>
    <option value="18-20">18-20 </option>
    <option value="21-24">21-24 </option>
    <option value="25-28">25-28 </option>
    <option value="28-32">28-32 </option>
    <option value="32-36">32-36 </option>
    <option value="37-43">37-43 </option>
    <option value="44-64">44-64 </option>
    Village:
    <input type="text" name="village" placeholder="Village name">

    <button type="submit">Filter</button>
    <a href="view_users.php">Reset</a>
</form>

<br>
<table class="table table-bordered table-striped table-hover">
    <div class="container mt-4">
<tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Phone</th>
    <th>Age Range</th>
    <th>Gender</th>
    <th>Education</th>
    <th>Village</th>
    <th>Job Interest</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['full_name']; ?></td>
    <td><?= $row['phone']; ?></td>
    <td><?= $row['age_range']; ?></td>
    <td><?= $row['gender']; ?></td>
    <td><?= $row['education_level']; ?></td>
    <td><?= $row['village']; ?></td>
    <td><?= $row['job_interest']; ?></td>
</tr>
<?php } ?>
</div>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
