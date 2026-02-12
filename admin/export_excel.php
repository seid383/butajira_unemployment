<?php
session_start();
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    exit("Access denied");
}

include("../database/db.php");

// Set headers for Excel compatibility
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=job_seekers_report.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Start HTML output for Excel
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
echo '<head><meta http-equiv="Content-type" content="text/html;charset=utf-8" /></head>';
echo '<body>';

// Add inline CSS for the table
echo '<table border="1" style="border-collapse:collapse; font-family: Segoe UI, Arial, sans-serif;">';

/* ===== STYLED HEADER ROW ===== */
echo '
<tr style="background-color: #1e3c72; color: #ffffff; font-weight: bold; height: 35px;">
    <th style="padding: 5px; width: 50px;">ID</th>
    <th style="padding: 5px; width: 200px;">Name</th>
    <th style="padding: 5px; width: 80px;">Gender</th>
    <th style="padding: 5px; width: 50px;">Age</th>
    <th style="padding: 5px; width: 120px;">Phone</th>
    <th style="padding: 5px; width: 120px;">Education</th>
    <th style="padding: 5px; width: 120px;">Region</th>
    <th style="padding: 5px; width: 120px;">Zone</th>
    <th style="padding: 5px; width: 120px;">Town</th>
    <th style="padding: 5px; width: 120px;">Kebele</th>
    <th style="padding: 5px; width: 120px;">Village</th>
    <th style="padding: 5px; width: 150px;">Job Interest</th>
    <th style="padding: 5px; width: 100px;">Situation</th>
    <th style="padding: 5px; width: 100px;">Structure</th>
    <th style="padding: 5px; width: 120px;">Biometrics</th>
    <th style="padding: 5px; width: 150px;">Created At</th>
</tr>';

/* ===== DATA ROWS ===== */
$result = mysqli_query($conn, "SELECT * FROM job_seekers");
$rowCount = 0;

while($r = mysqli_fetch_assoc($result)){
    // Alternating row colors for readability
    $bgColor = ($rowCount % 2 == 0) ? "#ffffff" : "#f2f5f9";
    
    // Excel trick: Use style="mso-number-format:\'\@\'" to force phone numbers as text
    $phoneStyle = 'style="mso-number-format:\'\@\'"';

    echo '<tr style="background-color: '.$bgColor.'; height: 30px;">';
    echo '<td style="text-align: center;">'.$r['id'].'</td>';
    echo '<td style="padding: 0 5px;">'.htmlspecialchars($r['full_name']).'</td>';
    echo '<td style="padding: 0 5px; text-align: center;">'.$r['gender'].'</td>';
    echo '<td style="text-align: center;">'.$r['age'].'</td>';
    echo '<td '.$phoneStyle.'>'.$r['phone'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['education_level'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['region'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['zone'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['town'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['kebele'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['village_select'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['job_interest'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['situation'].'</td>';
    echo '<td style="padding: 0 5px;">'.$r['structure'].'</td>';
    echo '<td style="padding: 0 5px;">'.($r['biometrics'] ?? 'N/A').'</td>';
    echo '<td style="padding: 0 5px;">'.($r['created_at'] ?? '').'</td>';
    echo '</tr>';
    
    $rowCount++;
}

echo '</table>';
echo '</body></html>';

mysqli_close($conn);
exit;