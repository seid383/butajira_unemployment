<!DOCTYPE html>
<html>
<head>
    <title>Unemployment Registration - Butajira</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-success text-white">
                    <h4>Unemployment Registration</h4>
                    <small>Butajira Town</small>
                </div>

                <div class="card-body">
                    <form action="save.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Age Range</label>
                            <select name="age_range" class="form-select" required>
                                <option value="">Select</option>
                                <option>18-20</option>
                                <option>21-24</option>
                                <option>25-28</option>
                                <option>28-32</option>
                                <option>32-36</option>
                                <option>37-43</option>
                                <option>44-64</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Education Level</label>
                            <select name="education_level" class="form-select" required>
                                <option value="">Select</option>
                                <option value="0">No Education</option>
                                <option value="1-4">1–4</option>
                                <option value="5-8">5–8</option>
                                <option value="9-10">9–10</option>
                                <option value="11-12">11–12</option>
                                <option value="12+">12+</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Village / Kebele</label>
                            <input type="text" name="village" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Job Interest</label>
                            <input type="text" name="job_interest" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success">Register</button>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-center text-muted">
                    © Butajira Town Administration
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
