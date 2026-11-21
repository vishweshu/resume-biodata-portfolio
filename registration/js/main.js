// ==========================================================================
// ONLINE REGISTRATION PORTAL - JQUERY CLIENT SCRIPT
// Handles live validation, character counting, dynamic print display,
// and formatted receipt generation.
// ==========================================================================

$(document).ready(function () {
    'use strict';

    // 1. Live Character Counter for Address
    $('#address').on('input', function () {
        var len = $(this).val().length;
        $('#addressCharCount').text(len + ' / 200 characters');
        if (len > 200) {
            $('#addressCharCount').css('color', '#ef4444');
        } else {
            $('#addressCharCount').css('color', '#64748b');
        }
    });

    // 2. Real-time validation helpers
    function isValidEmail(email) {
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }

    function isValidPhone(phone) {
        var cleaned = phone.replace(/[\s\-\(\)\+]/g, '');
        return cleaned.length === 10 && /^\d+$/.test(cleaned);
    }

    // Input blur live feedback
    $('#fullName').on('blur input', function () {
        if ($(this).val().trim().length >= 3) {
            $(this).removeClass('is-invalid');
            $('#nameError').hide();
        }
    });

    $('#email').on('blur input', function () {
        if (isValidEmail($(this).val().trim())) {
            $(this).removeClass('is-invalid');
            $('#emailError').hide();
        }
    });

    $('#phone').on('blur input', function () {
        if (isValidPhone($(this).val().trim())) {
            $(this).removeClass('is-invalid');
            $('#phoneError').hide();
        }
    });

    $('#dob').on('change', function () {
        if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $('#dobError').hide();
        }
    });

    $('input[name="gender"]').on('change', function () {
        $('#genderError').hide();
    });

    $('#course').on('change', function () {
        if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $('#courseError').hide();
        }
    });

    $('#semester').on('change', function () {
        if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $('#semError').hide();
        }
    });

    // 3. Form Validation Function
    function validateForm() {
        var isValid = true;

        // Full Name
        var name = $('#fullName').val().trim();
        if (name.length < 3) {
            $('#fullName').addClass('is-invalid');
            $('#nameError').show();
            isValid = false;
        } else {
            $('#fullName').removeClass('is-invalid');
            $('#nameError').hide();
        }

        // Email
        var email = $('#email').val().trim();
        if (!isValidEmail(email)) {
            $('#email').addClass('is-invalid');
            $('#emailError').show();
            isValid = false;
        } else {
            $('#email').removeClass('is-invalid');
            $('#emailError').hide();
        }

        // Phone
        var phone = $('#phone').val().trim();
        if (!isValidPhone(phone)) {
            $('#phone').addClass('is-invalid');
            $('#phoneError').show();
            isValid = false;
        } else {
            $('#phone').removeClass('is-invalid');
            $('#phoneError').hide();
        }

        // Date of Birth
        var dob = $('#dob').val();
        if (!dob) {
            $('#dob').addClass('is-invalid');
            $('#dobError').show();
            isValid = false;
        } else {
            $('#dob').removeClass('is-invalid');
            $('#dobError').hide();
        }

        // Gender
        if (!$('input[name="gender"]:checked').val()) {
            $('#genderError').show();
            isValid = false;
        } else {
            $('#genderError').hide();
        }

        // Course
        var course = $('#course').val();
        if (!course) {
            $('#course').addClass('is-invalid');
            $('#courseError').show();
            isValid = false;
        } else {
            $('#course').removeClass('is-invalid');
            $('#courseError').hide();
        }

        // Semester
        var semester = $('#semester').val();
        if (!semester) {
            $('#semester').addClass('is-invalid');
            $('#semError').show();
            isValid = false;
        } else {
            $('#semester').removeClass('is-invalid');
            $('#semError').hide();
        }

        // Address
        var address = $('#address').val().trim();
        if (address.length < 5) {
            $('#address').addClass('is-invalid');
            $('#addressError').show();
            isValid = false;
        } else {
            $('#address').removeClass('is-invalid');
            $('#addressError').hide();
        }

        // Declaration Checkbox
        if (!$('#declaration').is(':checked')) {
            alert('⚠️ Please accept the declaration checkbox before submitting.');
            isValid = false;
        }

        return isValid;
    }

    // 4. Form Submit Handler
    $('#registrationForm').on('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault();
            // Scroll to first invalid field
            var $firstError = $('.is-invalid').first();
            if ($firstError.length) {
                $('html, body').animate({
                    scrollTop: $firstError.offset().top - 120
                }, 300);
                $firstError.focus();
            }
            return false;
        }

        // Check if we are running in static HTML mode (e.g., GitHub Pages)
        var isStaticHost = window.location.protocol === 'file:' || 
                           window.location.hostname.indexOf('github.io') !== -1 ||
                           window.location.pathname.endsWith('.html');

        if (isStaticHost) {
            e.preventDefault(); // Process and display client-side formatted receipt

            // Gather inputs
            var fullName = $('#fullName').val().trim();
            var email = $('#email').val().trim();
            var phone = $('#phone').val().trim();
            var dob = $('#dob').val();
            var gender = $('input[name="gender"]:checked').val();
            var course = $('#course').val();
            var semester = $('#semester').val();
            var address = $('#address').val().trim();

            var skills = [];
            $('input[name="skills[]"]:checked').each(function () {
                skills.push($(this).val());
            });
            var skillsDisplay = skills.length > 0 ? skills.join(', ') : 'None specified';

            // Generate Random Registration ID & Current Timestamp
            var randomId = 'REG-2026-' + Math.floor(1000 + Math.random() * 9000);
            var now = new Date();
            var timestamp = now.toLocaleDateString('en-GB', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            }) + ' ' + now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

            // Build Formatted Output HTML
            var receiptHtml = `
                <div class="receipt-card" id="receiptOutput">
                    <div class="success-banner">
                        <span class="success-banner-icon">✅</span>
                        <div class="success-banner-text">
                            <h3>Registration Submitted Successfully!</h3>
                            <p>Your application details have been recorded and formatted below.</p>
                        </div>
                    </div>

                    <div class="receipt-header">
                        <div>
                            <h2>Online Application Receipt</h2>
                            <p style="color: #64748b; font-size: 13.5px;">Student Enrollment & Academic Record</p>
                        </div>
                        <div class="receipt-badge">
                            Application ID: <strong>${randomId}</strong>
                        </div>
                    </div>

                    <table class="receipt-table">
                        <tr>
                            <td class="label-col">Full Name:</td>
                            <td class="value-col">${fullName}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Email Address:</td>
                            <td class="value-col">${email}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Phone Number:</td>
                            <td class="value-col">+91 ${phone}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Date of Birth:</td>
                            <td class="value-col">${dob}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Gender:</td>
                            <td class="value-col">${gender}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Course / Department:</td>
                            <td class="value-col" style="color: #2563eb;">${course}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Semester / Year:</td>
                            <td class="value-col">${semester}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Skills & Interests:</td>
                            <td class="value-col">${skillsDisplay}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Residential Address:</td>
                            <td class="value-col">${address}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Submission Timestamp:</td>
                            <td class="value-col" style="color: #059669;">${timestamp}</td>
                        </tr>
                        <tr>
                            <td class="label-col">Application Status:</td>
                            <td class="value-col"><span style="color: #16a34a; font-weight: 800;">CONFIRMED</span></td>
                        </tr>
                    </table>

                    <div class="btn-row">
                        <button type="button" id="printReceiptBtn" class="btn btn-primary">🖨️ Print Application / Save PDF</button>
                        <button type="button" id="registerAgainBtn" class="btn btn-secondary">← Register Another Student</button>
                    </div>
                </div>
            `;

            // Hide form and display formatted receipt
            $('#formCard').slideUp(300, function () {
                $('#outputContainer').html(receiptHtml).hide().fadeIn(300);
                $('html, body').animate({ scrollTop: $('#outputContainer').offset().top - 40 }, 300);
            });
        }
        // If on PHP server, allow natural form submission to process.php / index.php
    });

    // 5. Handle "Register Another" button
    $(document).on('click', '#registerAgainBtn', function () {
        $('#outputContainer').fadeOut(200, function () {
            $(this).empty();
            $('#registrationForm')[0].reset();
            $('#addressCharCount').text('0 / 200 characters');
            $('#formCard').slideDown(300);
            $('html, body').animate({ scrollTop: $('#formCard').offset().top - 40 }, 300);
        });
    });

    // 6. Handle Print button
    $(document).on('click', '#printReceiptBtn, .btn-print-action', function () {
        window.print();
    });
});
