# Web Technology Assignment: Resume & Bio-Data Website

A multi-page responsive website constructed using **HTML5**, **CSS3**, **JavaScript**, and **jQuery**, hosted on the cloud.

---

## 🌐 Live Cloud Hosted URL
- **Website URL:** [https://vishweshu.github.io/resume-biodata-portfolio/](https://vishweshu.github.io/resume-biodata-portfolio/)
- **Repository:** [https://github.com/vishweshu/resume-biodata-portfolio](https://github.com/vishweshu/resume-biodata-portfolio)

---

## 📂 Project Structure
```text
websaaignment/
├── index.html        # Home / Welcome landing page
├── resume.html       # Professional Resume with Objective, Education, Skills & Projects
├── biodata.html      # Comprehensive Bio-data with Personal details, Qualifications table & Declaration
├── contact.html      # Interactive contact form with jQuery validation
├── css/
│   └── style.css     # Clean CSS styling, layout styling, and print rules
├── js/
│   ├── jquery.min.js # Local jQuery 3.7.1 library
│   └── main.js       # Navigation highlighting, form validation, dynamic date & print trigger
└── .nojekyll         # GitHub Pages static asset bypass configuration
```

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
