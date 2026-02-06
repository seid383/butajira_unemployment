<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butajira Enterprise -  Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="container">
            <div class="logo">
                <span class="logo-text">Butajira</span><span class="logo-accent"> Enterprise</span>
            </div>
            
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <nav class="nav-container">
                <ul class="nav-links" id="nav-list">
                    <li><a href="index.php">መነሻ</a></li>
                    <li><a href="about.php">ስለ እኛ</a></li> 
                     <li><a href="#requirements">መስፈርቶች</a></li>
                    <li><a href="annoucement.php">ማስታወቅያ</a></li> 
                    <li><a href="register.php">መመዝገብ</a></li>
                </ul>
            </nav>
        </div>
    </header>

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
                <h3><i class="icon">🏭</i> 2. አነስተኛና መካከለኛ ማኑፋክቸሪንግ</h3>
                <ul>
                    <li>የቦታ ጥያቄ ማመልከቻ እና የታደሰ መታወቂያ ኮፒ</li>
                    <li>የግብር ከፋይ መለያ ቁጥር (TIN) እና የታደሰ የንግድ ሥራ ፈቃድ</li>
                    <li>የንግድ ሥራ ዕቅድ (Business plan) እና ሕጋዊ ሰውነት</li>
                    <li>በኦዲት የተረጋገጠ የደረጃ ሽግግር መረጃ</li>
                </ul>
            </div>

            <div class="req-card highlight">
                <h3><i class="icon">⚙️</i> 3. የማሽን ሊዝ (Leasing)</h3>
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