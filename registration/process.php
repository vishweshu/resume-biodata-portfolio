<?php
// ==========================================================================
// ONLINE APPLICATION PORTAL - PHP BACKEND PROCESSOR
// Receives POST data, sanitizes inputs, and formats/displays the application
// receipt on the browser.
// ==========================================================================

// Check if request is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Sanitize inputs
$fullName = htmlspecialchars(trim($_POST["fullName"] ?? ""));
$email    = htmlspecialchars(trim($_POST["email"] ?? ""));
$phone    = htmlspecialchars(trim($_POST["phone"] ?? ""));
$dob      = htmlspecialchars(trim($_POST["dob"] ?? ""));
$gender   = htmlspecialchars(trim($_POST["gender"] ?? ""));
$course   = htmlspecialchars(trim($_POST["course"] ?? ""));
$semester = htmlspecialchars(trim($_POST["semester"] ?? ""));
$address  = nl2br(htmlspecialchars(trim($_POST["address"] ?? "")));

// Handle skills array
$skillsDisplay = "None specified";
if (isset($_POST["skills"]) && is_array($_POST["skills"])) {
    $cleanSkills = array_map("htmlspecialchars", $_POST["skills"]);
    $skillsDisplay = implode(", ", $cleanSkills);
}

// Generate Unique Application ID & Formatted Date
$applicationId = "REG-2026-" . rand(1000, 9999);
$submissionDate = date("d M Y, h:i A");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation - <?php echo $applicationId; ?></title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="alternate icon" href="favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <!-- Include jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js" defer></script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="brand-title">
                <div class="brand-badge">🎓</div>
                <h1>Online Student Registration Portal</h1>
            </div>
            <div class="header-links">
                <a href="../index.html">&larr; Back to Portfolio</a>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="container">

        <div class="receipt-card">
            
            <!-- Success Alert Banner -->
            <div class="success-banner">
                <span class="success-banner-icon">✅</span>
                <div class="success-banner-text">
                    <h3>Registration Submitted Successfully!</h3>
                    <p>Your online application has been processed by the PHP server and formatted below.</p>
                </div>
            </div>

            <!-- Receipt Header -->
            <div class="receipt-header">
                <div>
                    <h2>Online Application Receipt</h2>
                    <p style="color: #64748b; font-size: 13.5px;">Student Enrollment & Academic Record</p>
                </div>
                <div class="receipt-badge">
                    Application ID: <strong><?php echo $applicationId; ?></strong>
                </div>
            </div>

            <!-- Formatted Application Data Table -->
            <table class="receipt-table">
                <tr>
                    <td class="label-col">Full Name:</td>
                    <td class="value-col"><?php echo $fullName; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Email Address:</td>
                    <td class="value-col"><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Phone Number:</td>
                    <td class="value-col">+91 <?php echo $phone; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Date of Birth:</td>
                    <td class="value-col"><?php echo $dob; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Gender:</td>
                    <td class="value-col"><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Course / Department:</td>
                    <td class="value-col" style="color: #2563eb;"><?php echo $course; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Semester / Year:</td>
                    <td class="value-col"><?php echo $semester; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Skills & Interests:</td>
                    <td class="value-col"><?php echo $skillsDisplay; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Residential Address:</td>
                    <td class="value-col"><?php echo $address; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Submission Timestamp:</td>
                    <td class="value-col" style="color: #059669;"><?php echo $submissionDate; ?></td>
                </tr>
                <tr>
                    <td class="label-col">Application Status:</td>
                    <td class="value-col"><span style="color: #16a34a; font-weight: 800;">CONFIRMED</span></td>
                </tr>
            </table>

            <!-- Action Buttons -->
            <div class="btn-row">
                <button type="button" class="btn btn-primary btn-print-action" onclick="window.print();">🖨️ Print Application / Save PDF</button>
                <a href="index.php" class="btn btn-secondary">&larr; Register Another Student</a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Vishwesh U • Online Application System</p>
    </footer>

</body>
</html>
