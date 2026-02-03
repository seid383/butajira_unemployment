<?php
include("auth.php");
include("../database/db.php");

require_once("../phpspreadsheet/src/PhpSpreadsheet/IOFactory.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_FILES['excel_file']['tmp_name'])) {

    $filePath = $_FILES['excel_file']['tmp_name'];
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    $inserted = 0;
    $skipped = 0;

    foreach ($rows as $index => $row) {

        // Skip header row
        if ($index == 0) continue;

        $full_name = mysqli_real_escape_string($conn, trim($row[0] ?? ''));
        $phone = mysqli_real_escape_string($conn, trim($row[1] ?? ''));
        $age_range = mysqli_real_escape_string($conn, trim($row[2] ?? ''));
        $gender = mysqli_real_escape_string($conn, trim($row[3] ?? ''));
        $education_level = mysqli_real_escape_string($conn, trim($row[4] ?? ''));
        $village = mysqli_real_escape_string($conn, trim($row[5] ?? ''));
        $job_interest = mysqli_real_escape_string($conn, trim($row[6] ?? ''));

        if ($full_name == '' || $phone == '') {
            $skipped++;
            continue;
        }

        // Duplicate check (name + phone)
        $check = mysqli_query(
            $conn,
            "SELECT id FROM job_seekers 
             WHERE full_name='$full_name' AND phone='$phone'"
        );

        if (mysqli_num_rows($check) > 0) {
            $skipped++;
            continue;
        }

        mysqli_query(
            $conn,
            "INSERT INTO job_seekers 
            (full_name, phone, age_range, gender, education_level, village, job_interest)
            VALUES
            ('$full_name','$phone','$age_range','$gender','$education_level','$village','$job_interest')"
        );

        $inserted++;
    }

    echo "<h3>✅ Import Finished</h3>";
    echo "<p>Inserted: <b>$inserted</b></p>";
    echo "<p>Skipped (duplicates / empty): <b>$skipped</b></p>";
    echo "<a href='import_excel.php'>Back</a>";
}
?>
