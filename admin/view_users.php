<?php
include("auth.php");
include("../database/db.php");

/* ===== Pagination Logic ===== */
$limit = 10; // Number of records per page
$page  = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

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
$query_parts = !empty($where) ? " WHERE " . implode(" AND ", $where) : "";

/* Get total records for pagination calculation */
$total_res = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM job_seekers $query_parts");
$total_rows = mysqli_fetch_assoc($total_res)['cnt'];
$total_pages = ceil($total_rows / $limit);

/* Final Query with Search, Pagination, and Sort */
$sql = "SELECT * FROM job_seekers $query_parts ORDER BY id ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>የተመዘገቡ ስራ ፈላጊዎች</title>
    <link rel="stylesheet" href="assets/admin.css">
</head>
<body class="view-users">

<div class="admin-container">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h2>የተመዘገቡ ስራ ፈላጊዎች ዝርዝር</h2>
        <a href="dashboard.php" class="btn btn-secondary">⬅️ ዳሽቦርድ</a>
    </div>

    <?php if(isset($_GET['msg'])): ?>
        <div style="padding:15px; background:#dcfce7; color:#166534; border-radius:8px; margin-bottom:20px; border:1px solid #bbf7d0;">
            ✅ ተግባሩ በተሳካ ሁኔታ ተከናውኗል! (Action Completed Successfully)
        </div>
    <?php endif; ?>

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
        <a href="view_users.php" class="btn btn-secondary">back</a>
    </form>
</div>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ሙሉ ስም</th>
                    <th>ፆታ</th>
                    <th>ዕድሜ</th>
                    <th>ስልክ</th>
                    <th>የት/ት ደረጃ</th>
                    <th>ክልል</th>
                    <th>ዞን</th>
                    <th>ከተማ</th>
                    <th>ቀበሌ</th>
                    <th>መንደር</th>
                    <th>የስራ መስክ</th>
                    <th>ልዩ ሁኔታ</th>
                    <th>አደረጃጀት</th>
                    <th>ባዮሜትሪክ</th>
                    <th>የተመዘገበበት/ችበት ቀን</th>
                    <th>ስራ የገባበት/ችበት ቀን</th>
                    
                    <?php if($_SESSION['role'] === 'admin'): ?>
                        <th style="text-align:center;">ተግባር (Actions)</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><strong><?= htmlspecialchars($row['full_name']) ?></strong></td>
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
                    <td><?= $row['registered_at'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    
                    <?php if($_SESSION['role'] === 'admin'): ?>
                    <td class="nowrap" style="text-align:center;">
                        <a href="edit_user.php?id=<?= $row['id'] ?>" class="btn btn-success" style="padding:5px 8px;">Edit</a>
                        <a href="delete_user.php?id=<?= $row['id'] ?>" class="btn btn-danger" style="padding:5px 8px;" onclick="return confirm('እርግጠኛ ነዎት መሰረዝ ይፈልጋሉ?');">delete</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px; display:flex; justify-content:center; gap:5px; flex-wrap:wrap;">
        <?php for($i=1; $i<=$total_pages; $i++): ?>
            <a href="?page=<?= $i ?>&name=<?= $name ?>&gender=<?= $gender ?>&education=<?= $education ?>&village=<?= $village ?>" 
               class="btn <?= ($page == $i) ? 'btn-primary' : 'btn-secondary' ?>" style="padding:6px 12px;">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>

</div>
</body>
</html>