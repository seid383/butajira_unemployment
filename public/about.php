<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Section</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
.map-container{
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
h3{
    color: #333;
    bottom: 60px;

}
iframe{
    width: 82%;
    height: 500px;
}

@media (max-width:850px){
    .form{
     grid-template-columns: 1fr;   
    }
    .contactInfo:before{
        bottom: initial;
        top: -75px;
        right: 65px;
        transform: scale(0.95); 
    }


    .contactForm:before{
        top: -13px;
        left: initial;
        right: 70px;

    }
    .square{
        transform: translate(140%, 43%);
        height: 350px; 
    }
    .big-circle{
        bottom: 75%;
        transform: scale(0.9) translate(-40%, 30%);
        right: 50%;
    }
    .text{
        margin: 1rem 0 1.5rem 0;
    }
    .social-media{
        padding: 1.5rem 0 0 0;
    }
}

@media (max-width:480px){
    .container{
        padding: 1.5rem;
    }
    .contactInfo:before{
        display: none;

    }
    .square,
    .big-circle{
        display: none;
        
    }
    form,
    .contactInfo{
        padding: 1.7rem 1.6rem;
    }
    .text,
    .information,
    .social-media p{
        font-size: 0.8rem;
    }
    .title{
        font-size: 1.15rem;
    }
    .social-icon a{
        width: 30px;
        height: 30px;
        line-height: 30px;
    }
    .icon{
        width: 23px;
    }
    .input{
        padding:0.45rem 1.2rem;
    }
    .btn{
        padding:0.45rem 1.3rem;
    }
}

    </style>
   
</head>
<body>
  

    <section style="margin-left: 20px;">
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

        <div style="margin-left: 20px;">
            <div class="value-box">✔ ታማኝነት</div>
            <div class="value-box">✔ ግልፅነት</div>
            <div class="value-box">✔ ተጠያቂነት</div>
            <div class="value-box">✔ ዘመናዊነት</div>
        </div>
    </section>
     <div style="margin-bottom: 10px;" class="map-container">
        <h3>እኛን ማግኘት ከፈለጋቹ በዚህ GPS ማግኘት ትችላላቹ </h3>
        <button type="button" class="btn" id="getLocation">
            use my location
        </button>
        <input type="hidden" name="location" id="location">
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493.7222499585809!2d38.376249182568195!3d8.124071091221712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x17b341bb0a54e68f%3A0x1f6e50c7fd4e8096!2sBUTAJIRA%20CITY%20ADMINISTRATION%20OFFICE!5e0!3m2!1sen!2set!4v1769694354743!5m2!1sen!2set" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
    <script>
        const locationBtn=document.getElementById("getLocation");
const locationInput=document.getElementById("location");
const mapFrame=document.getElementById("mapFrame");

locationBtn.addEventListener("click", ()=>{
    if(!navigator.geolocation){
        alert("GPS is not supported on this device");
        return;
    }
        locationBtn.textContent="Getting Location....";

        navigator.geolocation.getCurrentPosition(
        (position) => {
            const latitude=position.coords.latitude;
            const longtude=position.coords.longitude;

            //save location for email
            locationInput.value = `Latitude: ${latitude}, Longitude: ${longtude}`;

            //update map

            mapFrame.src = `https://www.google.com/maps?q=${latitude},${longtude}&output=embed`;

            alert("✅ ቦታ በትክክል ተጨምሯል");
            locationBtn.textContent="ቦታ ተጨሯል";
        },
        ()=>{
            alert("Location access denied");
            locationBtn.textContent="use my location ";
        }

    );
});

        </script>
</body>
</html>