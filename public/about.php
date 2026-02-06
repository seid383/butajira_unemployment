<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Section</title>

    <style>
        body {
            margin: 0 200px;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }
        body a{
            font-size: 50px;
        }

        .about-section {
            max-width: 1100px;
            margin: 60px auto;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .about-section h2 {
            font-size: 32px;
            color: #0b3c5d;
            margin-bottom: 20px;
            border-collapse: 6px solid #1f7ae0;
            padding-left: 15px;
             text-align: center;
            justify-content: center;
            text-decoration: dodgerblue;
            
        }

        .about-section p {
            font-size: 16.5px;
            line-height: 1.9;
            margin-bottom: 18px;
            text-align: center;
            justify-content: center;
        }

        .highlight {
            color: #1f7ae0;
            font-weight: 600;
        }

        .values {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
             text-align: center;
            justify-content: center;
        }

        .value-box {
            background-color: #f0f5ff;
            color: #0b3c5d;
            padding: 12px 18px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .about-section {
                padding: 30px 20px;
            }

            .about-section h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

    <section class="about-section">
        <h2>ስለ እኛ</h2>

        <p>
            <span class="highlight">ቡታጅራ ኢንተርፕራይዝ ቢሮ</span> በመንግስት ፖሊሲና ስትራቴጂ መሠረት
            ለስራ ፈላጊዎች፣ ለጥቃቅንና አነስተኛ ኢንተርፕራይዞች እና
            ለማህበረሰቡ በአጠቃላይ የስራ ዕድል ፈጠራን
            ለማበረታታት የተቋቋመ መድረክ ነው።
        </p>

        <p>
            ተቋሙ የስራ ፈላጊዎችን ምዝገባ ሂደት በዘመናዊ ቴክኖሎጂ
            በመደገፍ ቀላልና ግልፅ ያደርጋል፤
            እንዲሁም ለኢንተርፕራይዞች የሚያስፈልጉ
            መመሪያዎችንና ድጋፎችን በህጋዊ
            እና ተጠያቂ መንገድ ያቀርባል።
        </p>

        <p>
            ተቋማችን በ<span class="highlight">ታማኝነት</span>፣
            በ<span class="highlight">ግልፅነት</span> እና
            በ<span class="highlight">ተጠያቂነት</span> ላይ ተመስርቶ
            የህብረተሰብ እድገትን የሚያገለግል
            አገልግሎት ይሰጣል።
        </p>

        <div class="values">
            <div class="value-box">✔ ታማኝነት</div>
            <div class="value-box">✔ ግልፅነት</div>
            <div class="value-box">✔ ተጠያቂነት</div>
            <div class="value-box">✔ ዘመናዊነት</div>
        </div>
    </section>
<p> <a href="index.php">ወደ ኋላ</a></p>
</body>
</html>