<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="logo">
                        <img src="../images/logo2.jpg" alt="Butajira Logo">

                <span class="logo-text">ቡታጅራ</span><span class="logo-accent"> ኢንትርፕራዝ ቢሮ</span>
            </div>
            
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <nav class="nav-container">
                <ul class="nav-links" id="nav-list">
                    <li><a href="../public/index.php">መነሻ</a></li>
                    <li><a href="../public/about.php">ስለ እኛ</a></li> 
                     <li><a href="#requirements">መስፈርቶች</a></li>
                    <li><a href="annoucement.php">ማስታወቅያ</a></li> 
                    <li><a href="../public/register.php">መመዝገብ</a></li>
                </ul>
            </nav>
        </div>
    </header>

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