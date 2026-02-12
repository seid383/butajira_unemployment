<?php
session_start();

// ሴኩሪቲ፦ አድሚን ወይም ስታፍ ካልሆነ አያሳልፍም
if (!in_array($_SESSION['role'] ?? '', ['admin','staff'])) {
    http_response_code(403);
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

// የፋይሉ ስም ከቀኑ ጋር እንዲወጣ ማድረግ (ለምሳሌ፡ report_2026-02-12.xls)
$filename = "education_report_" . date('Y-m-d') . ".xls";

// ብሮውዘሩ ዳታውን እንደ Excel እንዲቆጥረው የሚረዱ Headers


// ዳታውን ከዳታቤዝ ማምጣት
$result = mysqli_query($conn, "
    SELECT education_level, COUNT(*) AS total
    FROM job_seekers
    GROUP BY education_level
");

// Excel ሰንጠረዥ አወቃቀር
echo "<table border='1'>";
echo "<thead>
        <tr style='background-color: #1a5276; color: white;'>
            <th>የትምህርት ደረጃ (Education Level)</th>
            <th>የስራ ፈላጊዎች ብዛት (Total Job Seekers)</th>
        </tr>
      </thead>";
echo "<tbody>";

while ($r = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($r['education_level']) . "</td>";
    echo "<td>" . $r['total'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

mysqli_close($conn);
exit;
?>