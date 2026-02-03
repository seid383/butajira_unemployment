<?php include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>

<h2>Import Job Seekers from Excel</h2>

<form method="POST" action="import_excel_save.php" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".xlsx" required>
    <br><br>
    <button type="submit">Upload & Import</button>
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
