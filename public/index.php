<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <title>Butajira Unemployment Registration</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #198754, #20c997);
            min-height: 100vh;
        }
        .hero {
            color: white;
            padding-top: 100px;
            padding-bottom: 100px;
        }
        .hero-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
        }
    </style>
</head>

<body>

<div class="container hero text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- MAIN SLOGAN -->
            <h1 class="fw-bold mb-4">
                ለተሻለ ነገ ዛሬውኑ ይመዝገቡ!
            </h1>

            <!-- DESCRIPTION CARD -->
            <div class="hero-card shadow-lg text-dark">

                <p class="fs-5 mb-4">
                    የቡታጅራ ኢንተርፕራይዝ ቢሮ የስራ አጥ ወጣቶች መረጃ በመሰብሰብ፣
                    ስልጠናዎችን በማመቻቸት እና ወደ ስራ ገበታ እንዲመለሱ
                    ድጋፍ ያደርጋል።
                </p>

                <!-- BUTTONS -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">

                    <a href="register.php" class="btn btn-success btn-lg px-4">
                        አሁኑኑ ይመዝገቡ
                    </a>

                    <a href="#info" class="btn btn-outline-success btn-lg px-4">
                        ተጨማሪ መረጃ
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- INFO SECTION -->
<div id="info" class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>ተጨማሪ መረጃ</h4>
                </div>

                <div class="card-body fs-5">
                    <ul>
                        <li>መመዝገብ ነፃ ነው</li>
                        <li>መረጃዎ በጥንቃቄ ይጠበቃል</li>
                        <li>ስልጠናና የስራ እድል መረጃ ይሰጣል</li>
                        <li>ለ18–64 ዕድሜ ክልል</li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
