<?php
include("auth.php");
include("../database/db.php");

$where = [];

/* ===== ፆታ ===== */
if (!empty($_GET['gender'])) {
    $gender = mysqli_real_escape_string($conn,$_GET['gender']);
    $where[] = "gender='$gender'";
}
/* ===== ትምህርት ===== */
if (!empty($_GET['education'])) {
    $education = mysqli_real_escape_string($conn,$_GET['education']);
    $where[] = "education_level='$education'";
}

/* ===== መንደር ===== */
if (!empty($_GET['village_select'])) {
    $village = mysqli_real_escape_string($conn,$_GET['village_select']);
    $where[] = "village_select LIKE '%$village%'";
}

$sql = "SELECT * FROM job_seekers";

if(count($where)>0){
$sql .= " WHERE ".implode(" AND ",$where);
}

$sql .= " ORDER BY registered_at DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ተመዝጋቢዎች</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
<h2>👥 የተመዝጋቢ ዝርዝር</h2>
<a href="dashboard.php" class="logout">⬅️ ተመለስ</a>
</div>

<div class="container">

<div class="filter-box">
<form method="GET">

<label>ፆታ</label>
<select name="gender">
<option value="">ሁሉም</option>
<option value="ወንድ">ወንድ</option>
<option value="ሴት">ሴት</option>
</select>

<label>ትምህርት</label>
<select name="education">
<option value="">ሁሉም</option>
<option>የለም</option>
<option>1-4</option>
<option>5-8</option>
<option>9-10</option>
<option>11-12</option>
<option>ቲቪቲ</option>
<option>ድግሪ</option>
<option>ማስተር</option>
<option>ከዚያ በላይ</option>
</select>

<label>መንደር</label>
<input type="text" name="village">

<button type="submit">🔎 ፈልግ</button>
<a href="view_users.php">Reset</a>

</form>
</div>

<table class="data-table">

<tr>
<th>መለያ</th>
<th>ሙሉ ስም</th>
<th>ፆታ</th>
<th>ዕድሜ</th>
<th>ስልክ</th>
<th>የትምህርት ደረጃ</th>
<th>ክልል</th>
<th>ዞን</th>
<th>ከተማ</th>
<th>ቀበሌ</th>
<th>መንደር</th>
<th>የመረጠው የስራ መስክ</th>
<th>ልዩ ሁኔታ</th>
<th>አደረጃጀት</th>
<th>በባዮሜትሪክስ</th>
<th>የተመዘገበበት/ችበት ቀን</th>
<th>ስራ የገባበት/ችበት ቀን</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['full_name']; ?></td>
<td><?= $row['gender']; ?></td>
<td><?= $row['age']; ?></td>
<td><?= $row['phone']; ?></td>
<td><?= $row['education_level']; ?></td>
<td><?= $row['region']; ?></td>
<td><?= $row['zone']; ?></td>
<td><?= $row['town']; ?></td>
<td><?= $row['kebele']; ?></td>
<td><?= $row['village_select']; ?></td>
<td><?= $row['job_interest']; ?></td>
<td><?= $row['situation']; ?></td>
<td><?= $row['structure']; ?></td>
<td><?= $row['biometrics']; ?></td>
<td><?= $row['registered_at']; ?></td>
<td><?= $row['created_at']; ?></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>