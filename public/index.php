<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butajira Enterprise -  Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ከላይ መሆን ያለበት */
    </style>
</head>
<body>

    
    <main>
        <section class="hero">
            <div class="container hero-flex">
                <div class="hero-content">
                    <h1>ለተሻለ ነገ ዛሬውኑ ይመዝገቡ!</h1>
                    <p>የቡታጅራ ኢንተርፕራይዝ ቢሮ የስራ አጥ ወጣቶች መረጃ በመሰብሰብ፣ ስልጠናዎችን በማመቻቸት <br> እና ወደ ስራ ገበታ እንዲመለሱ ድጋፍ ያደርጋል።</p>
                    <div class="hero-btns">
                        <a href="register.php" class="btn-primary">አሁኑኑ ይመዝገቡ</a>
                        <a href="#" class="btn-secondary">ተጨማሪ መረጃ</a>
                    </div>
                </div>
                
            </div>
        </section>
    </main>
 
 <section id="requirements" class="requirements-section">
    <div class="container">
        <div class="section-title">
            <h2>ተገልጋዮች ማሟላት የሚገባቸው ቅድመ ሁኔታዎችና ማስረጃዎች</h2>
            <div class="underline"></div>
        </div>

        <div class="requirements-grid">
            <div class="req-card">
                <h3><i class="icon">💼</i> 1. የሥራ ዕድል ፈጠራ ዘርፍ</h3>
                <div class="req-sub-content">
                    <h4>ለስልጠና እና ለቦታ ሽያጭ ጥያቄ፦</h4>
                    <ul>
                        <li>የስልጠና ፍላጎት ማመልከቻ እና የንግድ ሥራ ዕቅድ (Business plan)</li>
                        <li>ሕጋዊ ሰውነት (ዕውቅና) እና የውስጥ ደንብ</li>
                        <li>ከማዕከል የድጋፍ ደብዳቤ</li>
                    </ul>
                    <h4>የቁጠባ ገንዘብ ወጪ ለማድረግ፦</h4>
                    <ul>
                        <li>የቁጠባ ባንክ ደብተር</li>
                        <li>ሥራ ላይ ያለ ፕሮጀክት ከሆነ የክፍያ ግምገማ ከከተማ ፋይናንስ</li>
                    </ul>
                </div>
            </div>

            <div class="req-card">
                <h3><i class="icon"></i> 2. አነስተኛና መካከለኛ ማኑፋክቸሪንግ</h3>
                <ul>
                    <li>የቦታ ጥያቄ ማመልከቻ እና የታደሰ መታወቂያ ኮፒ</li>
                    <li>የግብር ከፋይ መለያ ቁጥር (TIN) እና የታደሰ የንግድ ሥራ ፈቃድ</li>
                    <li>የንግድ ሥራ ዕቅድ (Business plan) እና ሕጋዊ ሰውነት</li>
                    <li>በኦዲት የተረጋገጠ የደረጃ ሽግግር መረጃ</li>
                </ul>
            </div>

            <div class="req-card highlight">
                <h3><i class="icon"></i> 3. የማሽን ሊዝ (Leasing)</h3>
                <ul>
                    <li>ከአበዳሪ ተቋማት ከዕዳ ነፃ መሆኑን የሚገልጽ ማስረጃ</li>
                    <li>የኪራይ ተረካቢ ውል እና የተሟላ መሠረተ ልማት ማስረጃ</li>
                    <li>ከ 15-20% የቅድመ ክፍያ ቁጠባ</li>
                    <li>የማሽኑ ዝርዝር መግለጫ (Specification)</li>
                </ul>
            </div>
        </div>

        <div class="important-note">
            <p><strong>⚠️ ጠቃሚ ማሳሰቢያ፦</strong> ተገልጋዮች ወደ ጽሕፈት ቤቱ ሲመጡ እነዚህን ሰነዶች ዋናውንና ፎቶ ኮፒውን መያዝ ይኖርባቸዋል።</p>
        </div>
    </div>
</section>
<footer>
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>አድራሻ</h3>
                <p>
                    📍 ቡታጅራ፣ ምስራቅ ጉራጌ<br>
                    📞 ስልክ: +251 46 115 XXXX<br>
                    📧 ኢሜይል: info@butajira.gov.et<br>
                    🕒 የስራ ሰዓት: ሰኞ - አርብ (2:30 - 11:30)
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 የቡታጅራ ከተማ አስተዳደር። መብቱ በህግ የተጠበቀ ነው።</p>
        </div>
    </div>
</footer>

  <script>
       // ኤለመንቶቹን መምረጥ
const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('#nav-list');
const navItems = document.querySelectorAll('.nav-links a');

// 1. የሀምበርገር ምልክቱ ሲነካ ሜኑውን ለመክፈት/ለመዝጋት
menu.addEventListener('click', function() {
    menuLinks.classList.toggle('active');
    menu.classList.toggle('is-active');
});

// 2. ማንኛውም የሜኑ ሊንክ ሲነካ ሜኑው እንዲጠፋ ለማድረግ
navItems.forEach(link => {
    link.addEventListener('click', () => {
        // ሜኑው ክፍት ከሆነ ይዘጋዋል
        menuLinks.classList.remove('active');
        menu.classList.remove('is-active');
    });
});
       
    </script>
</body>
</html>