<?php
include("auth_staff.php");
include("../database/db.php");

$result = mysqli_query($conn,"SELECT * FROM job_seekers ORDER BY registered_at DESC");
?>
<h3>📄 All Job Seekers</h3>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Gender</th><th>Phone</th></tr>

<?php while($r=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['full_name'] ?></td>
<td><?= $r['gender'] ?></td>
<td><?= $r['phone'] ?></td>
</tr>
<?php } ?>
</table>
<?php
mysqli_close($conn);    
?>
