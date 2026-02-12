<?php
include("auth.php");
include("../database/db.php");

if ($_SESSION['role'] !== 'admin') { exit("Access Denied"); }
if (!isset($_GET['id'])) { exit("No user ID provided"); }

$id = (int)$_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM job_seekers WHERE id = $id");
$user = mysqli_fetch_assoc($res);

if (!$user) { exit("ተጠቃሚው አልተገኘም"); }

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $kebele = mysqli_real_escape_string($conn, $_POST['kebele']);
    
    // --- DATE CONVERSION LOGIC ---
    // Takes DD-MM-YYYY from form and converts to YYYY-MM-DD for MySQL
    $input_date = $_POST['created_at'];
    $formatted_date = date('Y-m-d', strtotime(str_replace('/', '-', $input_date)));
    $created_at = mysqli_real_escape_string($conn, $formatted_date);

    $sql = "UPDATE job_seekers SET 
            full_name='$name', 
            phone='$phone', 
            education_level='$education',
            kebele='$kebele',
            created_at='$created_at' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_users.php?msg=updated");
        exit;
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
}

// Format the date for the input field: Day-Month-Year
$display_date = date('d-m-Y', strtotime($user['created_at']));
?>

<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>መረጃ ማስተካከያ</title>
    <link rel="stylesheet" href="assets/admin.css">
    <style>
        .card { max-width: 500px; margin: 40px auto; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); background: #fff; }
        label { display: block; margin-top: 15px; font-weight: bold; color: #1A374D; }
        input, select { width: 100%; padding: 12px; margin-top: 5px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; margin-top: 25px; background: #2ECC71; color: white; border: none; padding: 14px; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { background: #27ae60; }
        .date-hint { font-size: 12px; color: #666; margin-top: 4px; display: block; }
    </style>
</head>
<body> 
    <div class="card">
        <h3 style="text-align:center;">መረጃ ማስተካከያ (Edit User)</h3>
        <hr>
        <form method="POST">
            <label>ሙሉ ስም</label>
            <input type="text" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>" required>
            
            <label>ስልክ</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>

            <label>የትምህርት ደረጃ</label>
            <select name="education">
                <?php
                $levels = ['ያልተማረ','ያልተማረች','1','2','3','4','5','6','7','8','9','10','11','12','TVT','Degree','Master','ከማስተር በላይ'];
                foreach($levels as $l) {
                    $selected = ($user['education_level'] == $l) ? 'selected' : '';
                    echo "<option value='$l' $selected>$l</option>";
                }
                ?>
            </select>

            <label>ቀበሌ</label>
            <select name="kebele">
                <option value="እሪንዛፍ" <?= ($user['kebele'] == 'እሪንዛፍ') ? 'selected' : '' ?>>እሪንዛፍ</option>
                <option value="እሬሻ" <?= ($user['kebele'] == 'እሬሻ') ? 'selected' : '' ?>>እሬሻ</option>
                <option value="ዘቢዳር" <?= ($user['kebele'] == 'ዘቢዳር') ? 'selected' : '' ?>>ዘቢዳር</option>
            </select>
            
            <label>ስራ የገባበት/ችበት ቀን (ቀን-ወር-ዓመት)</label>
<input 
    type="text" 
    name="created_at" 
    value="<?= $display_date ?>" 
    placeholder="DD-MM-YYYY" 
    pattern="(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[012])-(19|20)\d\d"
    title="እባክዎ በትክክለኛ ፎርማት ያስገቡ: ቀን-ወር-ዓመት (ለምሳሌ 09-12-2025)"
    required
>
            <button type="submit" name="update">መረጃውን አድስ (Update)</button>
            <br><br>
            <a href="view_users.php" style="text-align:center; display:block; text-decoration:none; color: #666;">❌ ተመለስ (Cancel)</a>
        </form>
    </div>
</body>
</html>