 <?php
include "../header/header.php";
?>
 <!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የስራ አጥ ምዝገባ - ቡታጅራ</title>
    <link rel="stylesheet" href="styleR.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

   
    <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div id="success-alert" class="alert-success-custom">
        ✅ ምዝገባዎ በተሳካ ሁኔታ ተጠናቋል! እናመሰግናለን።
    </div>

    <script>
        // ገጹ እንደተከፈተ ቆጠራ ይጀምራል
        setTimeout(function() {
            var alertElement = document.getElementById('success-alert');
            if (alertElement) {
                // መጀመሪያ መልእክቱ እንዲደበዝዝ እናደርጋለን
                alertElement.style.transition = "opacity 1s ease";
                alertElement.style.opacity = "0";
                
                // ሙሉ ለሙሉ ከገጹ ላይ ለማጥፋት (ከ 1 ሰከንድ ድብዘዛ በኋላ)
                setTimeout(function() {
                    alertElement.remove();
                }, 1000);
            }
        }, 5000); // 5000 ማለት 5 ሰከንድ ማለት ነው
    </script>
<?php endif; ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>የስራ አጦች መመዝገብያ ፎርም</h4>
                <p>ቡታጅራ ከተማ አስተዳደር</p>
            </div>

            <div class="card-body">
                <form action="save.php" method="POST" id="registrationForm"   enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">ሙሉ ስም</label>
                        <input type="text" name="full_name" class="form-control" placeholder="ሙሉ ስም ያስገቡ" required>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">ፆታ</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- ይምረጡ --</option>
                                <option value="ወንድ">ወንድ</option>
                                <option value="ሴት">ሴት</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ዕድሜ (18 - 64)</label>
                            <input type="number" name="age" id="age" class="form-control" min="18" max="64" placeholder="እድሜ..." required>
                            <small id="ageMsg" class="msg-text"></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ስልክ ቁጥር</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="09XXXXXXXX" required>
                        <small id="phoneMsg" class="msg-text"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">የትምህርት ደረጃ</label>
                        <select name="education" class="form-select" required>
                            <option value="">-- ይምረጡ --</option>
                            <option value="ያልተማረ">ያልተማረ</option>
                            <option value="ያልተማረች">ያልተማረች</option>
                            <option value="1">1ኛ ክፍል</option>
                            <option value="2">2ኛ ክፍል</option>
                            <option value="3">3ኛ ክፍል</option>
                            <option value="4">4ኛ ክፍል</option>
                            <option value="5">5ኛ ክፍል</option>
                            <option value="6">6ኛ ክፍል</option>
                            <option value="7">7ኛ ክፍል</option>
                            <option value="8">8ኛ ክፍል</option>
                            <option value="9">9ኛ ክፍል</option>
                            <option value="10">10ኛ ክፍል</option>
                            <option value="11">11ኛ ክፍል</option>
                            <option value="12">12ኛ ክፍል</option>
                            <option value="TVT">TVT (ቴክኒክና ሙያ)</option>
                            <option value="Degree">Degree (መጀመሪያ ድግሪ)</option>
                            <option value="Master">Master (ሁለተኛ ድግሪ)</option>                            
                            <option value="ከማሰተር በላይ">ከማስተር በላይ</option>                            

                        </select>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">ክልል</label>
                            <input type="text" name="region" class="form-control bg-light" value="ማእከላዊ ኢትዮጵያ" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ዞን</label>
                            <input type="text" name="zone" class="form-control bg-light" value="ምስራቅ ጉራጌ" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">ከተማ</label>
                            <input type="text" name="town" class="form-control bg-light" value="ቡታጅራ" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ቀበሌ</label>
                            <select name="kebele" id="kebele" class="form-select" onchange="loadVillages()" required>
                                <option value="">-- ቀበሌ ይምረጡ --</option>
                                <option value="እሪንዛፍ">እሪንዛፍ</option>
                                <option value="እሬሻ">እሬሻ</option>
                                <option value="ዘቢዳር">ዘቢዳር</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">መንደር</label>
                        <select name="village_select" id="village_select" class="form-select" onchange="checkOtherVillage()" required>
                            <option value="">-- መጀመሪያ ቀበሌ ይምረጡ --</option>
                        </select>
                    </div>

                    <div class="mb-3" id="otherVillageDiv" style="display:none;">
                        <label class="form-label">የመንደሩን ስም ይፃፉ</label>
                        <input type="text" name="village_other" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">የስራ ፍላጎት</label>
                        <select name="job_select" id="job_select" class="form-select" onchange="checkOtherJob()" required>
                            <option value="">-- የስራ ፍላጎት ይምረጡ --</option>
                        </select>
                    </div>

                    <div class="mb-3" id="otherJobDiv" style="display:none;">
                        <label class="form-label">የስራ ፍላጎቱን እዚህ ይፃፉ</label>
                        <input type="text" name="job_other" class="form-control">
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">ልዩ ሁኔታ</label>
                            <select name="special" class="form-select" required>
                                <option value="መደበኛ">መደበኛ</option>
                                <option value="አካል ጉዳተኛ">አካል ጉዳተኛ</option>
                                <option value="ስደተኛ">ስደተኛ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">አደረጃጀት</label>
                            <select name="structure" class="form-select">
                                <option value="">-- ይምረጡ --</option>
                                <option value="በግል">በግል</option>
                                <option value="በማህበር">በማህበር</option>
                            </select>
                        </div>
                    </div>
                     <div class="mb-3">
                       <label class="form-label">የትምህርት ማስረጃ (PDF ወይም ምስል)</label>
                         <input type="file" name="document" class="form-control" accept=".pdf,.doc,.jpg,.png" required>
                         </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">መረጃውን መዝግብ</button>
                    </div>

                </form>
            </div>

            <div class="card-footer text-center">
                © ቡታጅራ ከተማ አስተዳደር
            </div>
        </div>
    </div>

<script>
/* ================== ዳይናሚክ መንደር (Villages) ================== */
const villagesByKebele = {
    "እሪንዛፍ": ["ነፃ ሰፈር","እምነት","ቆቶ","ሀያት","ባፋፋን","ጉሊት","ልማት","መሀል አራዳ","ሁለገብ","አብነት","ሶርሴ","ባንክ","ነፀብራቅ","ሰላም","ታቦር"],
    "እሬሻ": ["ወሌንሹ","ኮንዶሚኒየም","ሚሊንየም","ሰፈረ ሰላም","አዲስ","ኢንዱራንስ","መቂቾ ስላሴ","እንዳለ ገነሞ","ዋርካ","አለም ጤና","መምህራን","ላንባ","አክስዮን"],
    "ዘቢዳር": ["መነሀሪያ","ካምፕ 1","ካምፕ 2","እስታድየም","መድረሳ","ሸባብ","ገሊላ","ቢላል","አቱ ብሎክ 1","አቱ ብሎክ 2","አቱ ብሎክ 3","አቱ ብሎክ 4","ታይዋን","ዶቦ","ሬድ አሽ","ዋርካ"]
};

function loadVillages() {
    const kebele = document.getElementById("kebele").value;
    const villageSelect = document.getElementById("village_select");
    villageSelect.innerHTML = `<option value="">-- መንደር ይምረጡ --</option>`;

    if (villagesByKebele[kebele]) {
        villagesByKebele[kebele].forEach(v => {
            villageSelect.innerHTML += `<option value="${v}">${v}</option>`;
        });
        villageSelect.innerHTML += `<option value="ሌላ">ሌላ (ዝርዝር ይፃፉ)</option>`;
    }
}

function checkOtherVillage() {
    const val = document.getElementById("village_select").value;
    document.getElementById("otherVillageDiv").style.display = (val === "ሌላ") ? "block" : "none";
}

/* ================== የስራ ፍላጎት (Job Interests) ================== */
const jobsList = [
    "እህል ንግድ","አትክልት እና ፍራፍሬ","ባልትና ስራ","ዶሮ እርባታ","ኮስሞቶክስ","ጂኦሎጂስት","ኮምፒውተር","ሶፍትዌር ኢንጂነሪንግ",
    "ፈርኒቸር","መብራት ዝርጋታ","ቢዝነስ ማናጅመንት","ጤና ነክ ስራ","ኮንስትራክሽን","ህግ","አይሲቲ","ኢንስታሌሽን","አውቶ","ግንባታ",
    "ከብት እርባታ","ሸቀጣ ሸቀጥ","ሻይ ቡና","ፅዳትና ውበት","ከተማ ግብርና","በግ እርባታ","ኤችአርኤም","የወተት ከብት","የውበት ሳሎን",
    "አገልግሎት","ልብስ ስፌት","ዳቦ መጋገር","ፀጉር ቤት","ስጋ ቤት"
];

window.onload = function () {
    const jobSelect = document.getElementById("job_select");
    jobsList.sort().forEach(j => {
        jobSelect.innerHTML += `<option value="${j}">${j}</option>`;
    });
    jobSelect.innerHTML += `<option value="ሌላ">ሌላ (ዝርዝር ይፃፉ)</option>`;
};

function checkOtherJob() {
    const val = document.getElementById("job_select").value;
    document.getElementById("otherJobDiv").style.display = (val === "ሌላ") ? "block" : "none";
}

/* ================== ስልክ ቁጥር ማረጋገጫ (Phone Validation) ================== */
const phoneInput = document.getElementById("phone");
const phoneMsg = document.getElementById("phoneMsg");

phoneInput.addEventListener("input", () => {
    let phone = phoneInput.value.trim().replace(/\s+/g,'');
    const regex = /^(09|07)\d{8}$|^(?:\+251|251)(9|7)\d{8}$/;

    if(regex.test(phone)){
        phoneMsg.innerHTML = "✅ ትክክለኛ ቁጥር";
        phoneMsg.style.color = "green";
        phoneInput.style.borderColor = "#2ECC71";
    } else {
        phoneMsg.innerHTML = "❌ ትክክለኛ የኢትዮጵያ ስልክ ቁጥር ያስገቡ";
        phoneMsg.style.color = "red";
        phoneInput.style.borderColor = "red";
    }
});

/* ================== የእድሜ ማረጋገጫ (Age Validation) ================== */
const ageInput = document.getElementById("age");
const ageMsg = document.getElementById("ageMsg");

ageInput.addEventListener("input", () => {
    const age = parseInt(ageInput.value);
    if (age < 18 || age > 64) {
        ageMsg.innerHTML = "❌ እድሜ ከ18 እስከ 64 መሆን አለበት";
        ageMsg.style.color = "red";
        ageInput.style.borderColor = "red";
    } else {
        ageMsg.innerHTML = "✅ ተቀባይነት አለው";
        ageMsg.style.color = "green";
        ageInput.style.borderColor = "#2ECC71";
    }
});


</script>

</body>
</html>
 <?php
include "footer.php";
?>