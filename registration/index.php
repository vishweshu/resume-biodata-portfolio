<?php
// ==========================================================================
// ONLINE APPLICATION PORTAL - INDEX.PHP
// Displays the registration form on initial GET request.
// If submitted via POST, renders the formatted confirmation receipt.
// ==========================================================================

$isSubmitted = ($_SERVER["REQUEST_METHOD"] === "POST");

if ($isSubmitted) {
    // Sanitize POST data
    $fullName = htmlspecialchars(trim($_POST["fullName"] ?? ""));
    $email    = htmlspecialchars(trim($_POST["email"] ?? ""));
    $phone    = htmlspecialchars(trim($_POST["phone"] ?? ""));
    $dob      = htmlspecialchars(trim($_POST["dob"] ?? ""));
    $gender   = htmlspecialchars(trim($_POST["gender"] ?? ""));
    $course   = htmlspecialchars(trim($_POST["course"] ?? ""));
    $semester = htmlspecialchars(trim($_POST["semester"] ?? ""));
    $address  = nl2br(htmlspecialchars(trim($_POST["address"] ?? "")));

    $skillsDisplay = "None specified";
    if (isset($_POST["skills"]) && is_array($_POST["skills"])) {
        $cleanSkills = array_map("htmlspecialchars", $_POST["skills"]);
        $skillsDisplay = implode(", ", $cleanSkills);
    }

    $applicationId = "REG-2026-" . rand(1000, 9999);
    $submissionDate = date("d M Y, h:i A");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isSubmitted ? "Registration Receipt - $applicationId" : "Online Student Registration Portal"; ?></title>
    <link rel="icon" type="image/svg+xml" href="../favicon.svg">
    <link rel="alternate icon" href="../favicon.ico">
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

        <?php if ($isSubmitted): ?>
        
        <!-- FORMATTED SUCCESS RECEIPT (RENDERED BY PHP) -->
        <div class="receipt-card">
            
            <div class="success-banner">
                <span class="success-banner-icon">✅</span>
                <div class="success-banner-text">
                    <h3>Registration Submitted Successfully!</h3>
                    <p>Your online application has been processed by PHP and formatted below.</p>
                </div>
            </div>

            <div class="receipt-header">
                <div>
                    <h2>Online Application Receipt</h2>
                    <p style="color: #64748b; font-size: 13.5px;">Student Enrollment & Academic Record</p>
                </div>
                <div class="receipt-badge">
                    Application ID: <strong><?php echo $applicationId; ?></strong>
                </div>
            </div>

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

            <div class="btn-row">
                <button type="button" class="btn btn-primary btn-print-action" onclick="window.print();">🖨️ Print Application / Save PDF</button>
                <a href="index.php" class="btn btn-secondary">&larr; Register Another Student</a>
            </div>

        </div>

        <?php else: ?>

        <!-- Output Container (Populated with formatted receipt upon client-side submission) -->
        <div id="outputContainer"></div>

        <!-- Registration Form Card -->
        <div class="card" id="formCard">
            
            <div class="card-header">
                <h2>Application & Registration Form</h2>
                <p>Please enter your information accurately. Upon submission, your formatted application summary will be displayed and ready for printing.</p>
            </div>

            <form id="registrationForm" method="POST" action="index.php">
                
                <!-- Section 1: Personal Details -->
                <div class="section-title">1. Personal Information</div>
                
                <div class="form-grid">
                    
                    <!-- Full Name -->
                    <div class="form-group full-width">
                        <label for="fullName">Full Name <span class="required-star">*</span></label>
                        <input type="text" id="fullName" name="fullName" class="form-input" placeholder="e.g. Vishwesh U" required>
                        <div id="nameError" class="error-message">Please enter a valid full name (minimum 3 characters).</div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Email Address <span class="required-star">*</span></label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="name@example.com" required>
                        <div id="emailError" class="error-message">Please enter a valid email address.</div>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone">Phone / Mobile Number <span class="required-star">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="10-digit mobile number" maxlength="10" required>
                        <div id="phoneError" class="error-message">Please enter a valid 10-digit mobile number.</div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="dob">Date of Birth <span class="required-star">*</span></label>
                        <input type="date" id="dob" name="dob" class="form-input" required>
                        <div id="dobError" class="error-message">Please select your date of birth.</div>
                    </div>

                    <!-- Gender Radio -->
                    <div class="form-group">
                        <label>Gender <span class="required-star">*</span></label>
                        <div class="radio-group">
                            <label class="radio-item">
                                <input type="radio" name="gender" value="Male"> Male
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="gender" value="Female"> Female
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="gender" value="Other"> Other
                            </label>
                        </div>
                        <div id="genderError" class="error-message">Please select your gender.</div>
                    </div>

                </div>

                <!-- Section 2: Academic Program Details -->
                <div class="section-title">2. Academic Program Details</div>

                <div class="form-grid">
                    
                    <!-- Course / Branch -->
                    <div class="form-group">
                        <label for="course">Degree & Branch <span class="required-star">*</span></label>
                        <select id="course" name="course" class="form-select" required>
                            <option value="">-- Select Program / Branch --</option>
                            <option value="B.E. Computer Science & Engineering">B.E. Computer Science & Engineering</option>
                            <option value="B.E. Information Science & Engineering">B.E. Information Science & Engineering</option>
                            <option value="B.E. Artificial Intelligence & Data Science">B.E. Artificial Intelligence & Data Science</option>
                            <option value="B.E. Electronics & Communication Engineering">B.E. Electronics & Communication Engineering</option>
                            <option value="B.E. Mechanical Engineering">B.E. Mechanical Engineering</option>
                        </select>
                        <div id="courseError" class="error-message">Please select your program.</div>
                    </div>

                    <!-- Semester -->
                    <div class="form-group">
                        <label for="semester">Current Semester <span class="required-star">*</span></label>
                        <select id="semester" name="semester" class="form-select" required>
                            <option value="">-- Select Semester --</option>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                            <option value="3rd Semester">3rd Semester</option>
                            <option value="4th Semester">4th Semester</option>
                            <option value="5th Semester">5th Semester</option>
                            <option value="6th Semester">6th Semester</option>
                            <option value="7th Semester">7th Semester</option>
                            <option value="8th Semester">8th Semester</option>
                        </select>
                        <div id="semError" class="error-message">Please select your semester.</div>
                    </div>

                    <!-- Skills & Technical Interests (Checkboxes) -->
                    <div class="form-group full-width">
                        <label>Technical Interests & Skills (Select all that apply)</label>
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="C / C++"> C / C++
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="Python"> Python
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="Web Development (HTML/CSS/JS)"> Web Development
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="Database (MySQL/SQL)"> Database (MySQL)
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="Machine Learning"> Machine Learning
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="skills[]" value="Cloud Computing"> Cloud Computing
                            </label>
                        </div>
                    </div>

                    <!-- Residential Address -->
                    <div class="form-group full-width">
                        <label for="address">Residential Address <span class="required-star">*</span></label>
                        <textarea id="address" name="address" rows="3" class="form-textarea" placeholder="Enter door number, street, city, state, pin code" maxlength="200" required></textarea>
                        <div class="char-counter" id="addressCharCount">0 / 200 characters</div>
                        <div id="addressError" class="error-message">Please enter a valid residential address (minimum 5 characters).</div>
                    </div>

                </div>

                <!-- Section 3: Declaration -->
                <div class="declaration-box">
                    <label class="checkbox-item">
                        <input type="checkbox" id="declaration" name="declaration" required>
                        <span>I hereby declare that all the information provided in this online registration form is true, accurate, and complete to the best of my knowledge.</span>
                    </label>
                </div>

                <!-- Submit & Reset Buttons -->
                <div class="btn-row">
                    <button type="submit" id="submitBtn" class="btn btn-primary">Submit Application &rarr;</button>
                    <button type="reset" id="resetBtn" class="btn btn-secondary">Reset Form</button>
                </div>

            </form>

        </div>

        <?php endif; ?>

    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Vishwesh U • Online Application System</p>
    </footer>

</body>
</html>
