# Vishwesh U - Personal Website: Resume & Bio-Data Portal

A multi-page responsive website constructed using **HTML5**, **CSS3**, **JavaScript**, and **jQuery**, hosted on the cloud.

---

## 🌐 Live Cloud Hosted URL
- **Website URL:** [https://vishweshu.github.io/resume-biodata-portfolio/](https://vishweshu.github.io/resume-biodata-portfolio/)
- **Repository:** [https://github.com/vishweshu/resume-biodata-portfolio](https://github.com/vishweshu/resume-biodata-portfolio)

---

## 📂 Project Structure
```text
websaaignment/
├── index.html            # Home / Welcome landing page
├── resume.html           # Professional Resume with Objective, Education, Skills & Projects
├── biodata.html          # Comprehensive Bio-data with Personal details, Qualifications table & Declaration
├── contact.html          # Interactive contact form with jQuery validation
├── css/
│   └── style.css         # Clean presentation styling and print rules
├── js/
│   ├── jquery.min.js     # Local jQuery 3.7.1 library
│   └── main.js           # Navigation highlighting, form validation, dynamic date & print trigger
│
├── registration/         # [NEW] Online Application & Registration Form Application
│   ├── index.html        # Interactive registration form with client-side jQuery receipt generator
│   ├── index.php         # Standalone PHP application (Form on GET, Formatted Receipt on POST)
│   ├── process.php       # PHP backend processor for sanitization & formatted receipt output
│   ├── css/
│   │   └── style.css     # Clean, beautiful form and receipt styling with print rules
│   └── js/
│       ├── jquery.min.js # Local jQuery library
│       └── main.js       # Live client-side validation, character counter & formatted receipt builder
│
└── .nojekyll             # GitHub Pages static asset bypass configuration
```

---

## 🚀 Applications Overview

### 1. Personal Resume & Bio-Data Portal
- **Resume Page:** Objective, education table, technical skills, projects, and print export.
- **Bio-Data Page:** Structured personal details, qualification matrix, family background, and signed declaration.
- **Contact Page:** Interactive contact form with jQuery validation.

### 2. Online Application / Registration System (`registration/`)
- **Technologies:** HTML5, CSS3, JavaScript, jQuery, and PHP.
- **Form Fields:** Full Name, Email, Phone, Date of Birth, Gender, Degree/Branch, Semester, Skills/Interests, Address, Declaration.
- **Validation:** Live jQuery validation (required fields, 10-digit phone number, email regex, character counter).
- **Formatted Display on Success:** On button click, the system processes and displays a beautifully formatted application receipt on the browser with unique Application ID, timestamp, and a "Print Application / Save as PDF" button.
- **Dual Support:**
  - **Cloud Hosting:** Hosted live on GitHub Pages with interactive client-side receipt generator.
  - **PHP Server (XAMPP / Apache / Cloud):** Fully supports `index.php` and `process.php` for server-side processing.

---

## 🚀 Key Features

1. **Multiple Pages (HTML5):**
   - Clean semantic elements: `<header>`, `<nav>`, `<main>`, `<section>`, `<table>`, `<thead>`, `<tbody>`, `<tr>`, `<th>`, `<td>`, `<form>`, `<input>`, `<select>`, `<textarea>`, `<button>`, `<footer>`.
2. **Appropriate Presentation Styling (CSS3):**
   - Clean modern typography, blue header with responsive navigation.
   - Distinct card containers with subtle box shadows.
   - Clean zebra-striped tables for educational qualifications.
   - Print-friendly media query (`@media print`) so pages can be printed or saved directly as PDF.
3. **Interactivity (jQuery / JavaScript):**
   - Automatic active navigation link highlighting.
   - Client-side form validation checking required fields and email regex.
   - Dynamic system date calculation on the Bio-data declaration.
   - Native one-click print button (`window.print()`).
4. **Cloud Platform Hosting:**
   - Hosted on **GitHub Pages** with continuous cloud availability and SSL/HTTPS.

---

## 💻 How to Run Locally

1. Simply double-click on `index.html` in your file explorer to open it in any web browser (Chrome, Edge, Firefox).
2. Or use any local HTTP server:
   ```bash
   npx serve .
   # or
   python -m http.server 8000
   ```
