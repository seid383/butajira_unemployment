<?php
include("auth_staff.php");
include("../database/db.php");

/* ===== Filters ===== */
$where     = [];
$name      = $_GET['name']      ?? '';
$gender    = $_GET['gender']    ?? '';
$education = $_GET['education'] ?? '';
$village   = $_GET['village']   ?? '';
$kebele    = $_GET['kebele']    ?? ''; // Added Kebele filter

if ($name !== '') {
    $n = mysqli_real_escape_string($conn, $name);
    $where[] = "full_name LIKE '%$n%'";
}
if ($gender !== '') {
    $g = mysqli_real_escape_string($conn, $gender);
    $where[] = "gender='$g'";
}
if ($education !== '') {
    $e = mysqli_real_escape_string($conn, $education);
    $where[] = "education_level='$e'";
}
if ($village !== '') {
    $v = mysqli_real_escape_string($conn, $village);
    $where[] = "village_select LIKE '%$v%'";
}
// Added Kebele Filter Logic
if ($kebele !== '') {
    $k = mysqli_real_escape_string($conn, $kebele);
    $where[] = "kebele='$k'";
}

/* ===== Query ===== */
$sql = "SELECT * FROM job_seekers";
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY id ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="am">
<head>
<meta charset="UTF-8">
<title>የተመዘገቡ ስራ ፈላጊዎች</title>

<!-- Admin CSS -->
<link rel="stylesheet" href="../admin/assets/admin.css">
</head>

<body class="view-users">

<div class="admin-container">

    <!-- ===== TOP BAR ===== -->
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h2>የተመዘገቡ ስራ ፈላጊዎች ዝርዝር</h2>
        <a href="staff_dashboard.php" class="btn btn-secondary">⬅️ ዳሽቦርድ</a>
    </div>

    <div class="filter-box">
    <form method="GET" style="display:flex; flex-wrap:wrap; gap:10px;">
        
        <input type="text" name="name" placeholder="በስም ፈልግ" value="<?= htmlspecialchars($name) ?>">

        <select name="gender">
            <option value="">ፆታ (ሁሉም)</option>
            <option value="ወንድ" <?= $gender=='ወንድ'?'selected':'' ?>>ወንድ</option>
            <option value="ሴት" <?= $gender=='ሴት'?'selected':'' ?>>ሴት</option>
        </select>

        <select name="kebele">
            <option value="">ቀበሌ (ሁሉም)</option>
            <option value="እሪንዛፍ" <?= $kebele=='እሪንዛፍ'?'selected':'' ?>>እሪንዛፍ</option>
            <option value="እሬሻ" <?= $kebele=='እሬሻ'?'selected':'' ?>>እሬሻ</option>
            <option value="ዘቢዳር" <?= $kebele=='ዘቢዳር'?'selected':'' ?>>ዘቢዳር</option>
        </select>

        <select name="education">
            <option value="">ትምህርት (ሁሉም)</option>
            <?php
            $levels = ['ያልተማረ','ያልተማረች','1-6','7-8','9-10','11-12','TVT','Degree','Master','ከማስተር በላይ'];
            foreach ($levels as $l) {
                $sel = ($education === $l) ? 'selected' : '';
                echo "<option $sel>$l</option>";
            }
            ?>
        </select>

        <input type="text" name="village" placeholder="መንደር" value="<?= htmlspecialchars($village) ?>">

        <button type="submit" class="btn btn-primary">🔍 ፈልግ</button>
            <a href="staff_view.php" class="btn btn-secondary">Back</a>
    </form>
</div>

    <!-- ===== TABLE ===== -->
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ሙሉ ስም</th>
                    <th>ፆታ</th>
                    <th>ዕድሜ</th>
                    <th>ስልክ</th>
                    <th>ትምህርት</th>
                    <th>ክልል</th>
                    <th>ዞን</th>
                    <th>ከተማ</th>
                    <th>ቀበሌ</th>
                    <th>መንደር</th>
                    <th>የስራ መስክ</th>
                    <th>ሁኔታ</th>
                    <th>አደረጃጀት</th>
                    <th>ባዮሜትሪክ</th>
                    <th>የተመዘገበበት</th>
                    <th>የተፈጠረበት</th>
                </tr>
            </thead>

            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="nowrap"><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td class="nowrap"><?= $row['phone'] ?></td>
                    <td><span class="badge badge-degree"><?= $row['education_level'] ?></span></td>
                    <td><?= $row['region'] ?></td>
                    <td><?= $row['zone'] ?></td>
                    <td><?= $row['town'] ?></td>
                    <td><?= $row['kebele'] ?></td>
                    <td><?= $row['village_select'] ?></td>
                    <td><?= $row['job_interest'] ?></td>
                    <td><?= $row['situation'] ?></td>
                    <td><?= $row['structure'] ?></td>
                    <td><?= $row['biometrics'] ?></td>
                    <td class="nowrap"><?= $row['registered_at'] ?></td>
                    <td class="nowrap"><?= $row['created_at'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
