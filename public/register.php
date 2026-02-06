<!DOCTYPE html>
<html>
<head>
    <title>የስራ አጥ ምዝገባ - ቡታጅራ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<p style="font-size: 20px;"> <a href="index.php">⬅️ወደ ኋላ</a></p>
<div class="container mt-5"></div> 
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-success text-white">
                    <h4>የስራ አጦች መመዝገብያ ፎርም</h4>
                    <small>ቡታጅራ ከተማ</small>
                </div>

                <div class="card-body">
                    <form action="save.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">ሙሉ ስም</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ፆታ</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- ይምረጡ --</option>
                                <option>ወንድ</option>
                                <option>ሴት</option>
                            </select>
                        </div>

                        

                        <div class="mb-3">
                            <label class="form-label">ዕድሜ</label>
                            <input type="number" name="age" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ስልክ ቁጥር</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                           <div class="mb-3">
    <label class="form-label">የትምህርት ደረጃ</label>
    <select name="education" class="form-select" required>
        <option value="">-- ይምረጡ --</option>
        <option value="ያልተያልተማረ/ች">የለም</option>
        <option value="1-6">1–6</option>
        <option value="7-8">7–8</option>
        <option value="9-10">9–10</option>
        <option value="11-12">11–12</option>
        <option value="TVET">ቲቪቲ</option>
        <option value="Degree">ድግሪ</option>
        <option value="Master">ማስተር</option>
        <option value="ከዚያ በላይ">ከዚያ በላይ</option>
    </select>
</div>
                              <div class="mb-3">
                            <label class="form-label">ክልል</label>
                            <input type="text" name="region" class="form-control" value="ማእከላዊ ኢትዮጵያ" readonly>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">ዞን</label>
                            <input type="text" name="zone" class="form-control" value="ምስራቅ ጉራጌ" readonly>
                        </div>
                         <div class="mb-3">
                            <label class="form-label">ከተማ</label>
                            <input type="text" name="town" class="form-control" value="ቡታጅራ " readonly>
                        </div>

                        <!-- ቀበሌ -->
                        <div class="mb-3">
                            <label class="form-label">ቀበሌ</label>
                            <select name="kebele" id="kebele" class="form-select" onchange="loadVillages()" required>
                                <option value="">-- ቀበሌ ይምረጡ --</option>
                                <option value="እሪንዛፍ">እሪንዛፍ</option>
                                <option value="እሬሻ">እሬሻ</option>
                                <option value="ዘቢዳር">ዘቢዳር</option>
                            </select>
                        </div>

                        <!-- መንደር -->
                        <div class="mb-3">
                            <label class="form-label">መንደር</label>
                            <select name="village_select" id="village_select" class="form-select" onchange="checkOtherVillage()" required>
                                <option value="">-- መንደር ይምረጡ --</option>
                            </select>
                        </div>

                        <!-- ሌላ መንደር -->
                        <div class="mb-3" id="otherVillageDiv" style="display:none;">
                            <label class="form-label">መንደር ስም ይፃፉ</label>
                            <input type="text" name="village_other" class="form-control">
                        </div>
                           <div class="mb-3">
                            <div class="mb-3">
                            <label class="form-label">የስራ ፍላጎት</label>
                            <select name="job_select" id="job_select" class="form-control" onchange="checkOtherJob()" required>
                                <option value="">-- የስራ ፍላጎት --</option>
                            </select>
                        </div>

                        <!-- ሌላ መንደር -->
                         <div class="mb-3" id="otherJobDiv" style="display:none;">
                            <label class="form-label">የስራ ፍላጎት ይጻፉ</label>
                            <input type="text" name="job_other" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ልዩ ሁኔታ</label>
                            <select name="special" id="special" class="form-select" required>
                                <option value="">-- ይምረጡ --</option>
                                <option value="መደበኛ">መደበኛ</option>
                                <option value="አካል ጉዳተኛ">አካል ጉዳተኛ</option>
                                <option value="ስደተኛ">ስደተኛ</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">አደረጃጀት</label>
                            <select name="structure" class="form-select" >
                                <option value="">-- ይምረጡ --</option>
                                <option>በግል</option>
                                <option>በማህበር</option>
                            </select>
                        </div>


                        <div class="d-grid">
                            <button class="btn btn-success">መዝግብ</button>
                        </div>

                    </form>
                </div>

                <div class="card-footer text-center text-muted">
                    © ቡታጅራ ከተማ
                </div>
            </div>

        </div>
    </div>
</div>

<script>
/* ================== መንደር ================== */
const villages = {
    "እሪንዛፍ": [
        "ነፃ ሰፈር","እምነት","ቆቶ","ሀያት","ባፋፋን","ጉሊት",
        "ልማት","መሀል አራዳ","ሁለገብ","አብነት","ሶርሴ",
        "ባንክ","ነፀብራቅ","ሰላም","ታቦር"
    ],
    "እሬሻ": [
        "ወሌንሹ","ኮንዶሚኒየም","ሚሊንየም","ሰፈረ ሰላም","አዲስ",
        "ኢንዱራንስ","መቂቾ ስላሴ","እንዳለ ገነሞ","ዋርካ",
        "አለም ጤና","መምህራን","ላንባ","አክስዮን"
    ],
    "ዘቢዳር": [
        "መነሀሪያ","ካምፕ 1","ካምፕ 2","እስታድየም","መድረሳ",
        "ሸባብ","ገሊላ","ቢላል","አቱ ብሎክ 1","አቱ ብሎክ 2",
        "አቱ ብሎክ 3","አቱ ብሎክ 4","ታይዋን","ዶቦ",
        "ሬድ አሽ","ዋርካ"
    ]
};

function loadVillages() {
    const kebele = document.getElementById("kebele").value;
    const villageSelect = document.getElementById("village_select");

    villageSelect.innerHTML = `<option value="">-- መንደር ይምረጡ --</option>`;

    if (villages[kebele]) {
        villages[kebele].forEach(v => {
            villageSelect.innerHTML += `<option value="${v}">${v}</option>`;
        });
    }

    villageSelect.innerHTML += `<option value="ሌላ">ሌላ</option>`;
}

function checkOtherVillage() {
    const val = document.getElementById("village_select").value;
    document.getElementById("otherVillageDiv").style.display =
        (val === "ሌላ") ? "block" : "none";
}

/* ================== የስራ ፍላጎት ================== */
const jobs = [
    "እህል ንግድ","አትክልት እና ፍራፍሬ","ባልትና ስራ","ዶሮ እርባታ",
    "ኮስሞቶክስ","ጂኦሎጂስት","ኮምፒውተር","ሶፍትዌር ኢንጂነሪንግ",
    "ፈርኒቸር","መብራት ዝርጋታ","ቢዝነስ ማናጅመንት","ጤና ነክ ስራ",
    "ኮንስትራክሽን","ህግ","አይሲቲ","ኢንስታሌሽን","አውቶ","ግንባታ",
    "ከብት እርባታ","ሸቀጣ ሸቀጥ","ሻይ ቡና","ፅዳትና ውበት",
    "ከተማ ግብርና","በግ እርባታ","ኤችአርኤም","የወተት ከብት",
    "የውበት ሳሎን","አገልግሎት","ልብስ ስፌት",
    "ዳቦ መጋገር","ፀጉር ቤት","ስጋ ቤት"
];

window.onload = function () {
    const jobSelect = document.getElementById("job_select");
    jobSelect.innerHTML = `<option value="">-- የስራ ፍላጎት --</option>`;

    jobs.forEach(j => {
        jobSelect.innerHTML += `<option value="${j}">${j}</option>`;
    });

    jobSelect.innerHTML += `<option value="ሌላ">ሌላ</option>`;
};

function checkOtherJob() {
    const val = document.getElementById("job_select").value;
    document.getElementById("otherJobDiv").style.display =
        (val === "ሌላ") ? "block" : "none";
}
</script>
