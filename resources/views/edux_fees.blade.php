@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')

<style>
  /* General Styles */

/* Navbar Styles */
.navbar {
    background-color: #004a8f;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto
   
}

.navbar-logo {
    color: #fff;
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: bold;
}

.navbar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
     font-family:verdana, sans-serif;
    font-weight:bold;
}

.navbar-menu li {
    margin-left: 20px;
}

.navbar-menu a {
    color: #fff;
    text-decoration: none;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.navbar-menu a:hover {
    color: #ffcc00;
}

/* Header Styles */
header {
    background-color: #004a8f;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

/* Main Content Styles */


.main-fre h2,.main-fre h3 {
       color: #004a8f;
    margin-top: 20px;
    font-size: 20px;
    font-weight:bold;

}

.main-fre  p {
    margin: 10px 0;
    max-width:100%;
}

/* FAQ Section Styles */
.faq-item {
    margin-bottom: 20px;
}

.faq-item h3 {
    margin-bottom: 10px;
}


.main-fre {
       padding: 20px;
    max-width: 100%;
    flex-direction: column;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
</style>

<br><br><br><br>
    
    <!-- Header -->
    <header>
        <h1>Edu-X Fees</h1>
    </header>

    <!-- Main Content -->
  
        <section id="fees" class="contents main-fre" style="line-height: 1.6;">
            <h2 style="color: #004a8f;margin-top: 20px;">Understanding Edu-X Fees</h2>
            <p>Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.</p>



            <h3 style="color: #004a8f;margin-top: 20px;">Application Fees</h3>
            <p>Application fees are charged per program applied to. These fees cover the cost of processing your application and vary depending on the institution.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
             Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.</p>
           

            <h3 style="color: #004a8f;margin-top: 20px;">Service Fees</h3>
            <p>Service fees are charged for the support and services provided by Edu-X, including application assistance, visa guidance, and more.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.</p>


            <h3 style="color: #004a8f;margin-top: 20px;">Tuition Deposits</h3>
            <p>Once accepted, you may be required to pay a tuition deposit to secure your spot. This deposit is typically applied toward your first semester's tuition.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.
            Edu-X charges various fees to facilitate the application process for students. Below is a breakdown of the fees you may encounter.</p>

            <h3 style="color: #004a8f;margin-top: 20px;">Refund Policy</h3>
            <p>Refund policies vary by institution. Please review the specific refund policy for your chosen program before making any payments.</p>

            <h3 style="color: #004a8f;margin-top: 20px;">Payment Methods</h3>
            <p>Edu-X accepts various payment methods, including credit cards, bank transfers, and more. Ensure you use a secure payment method.</p>
        </section>

        <section id="faq" class="faq main-fre">
            <h2 style="color: #004a8f;margin-top: 20px;">Frequently Asked Questions</h2>
            <div class="faq-item">
                <h3>What is the application fee?</h3>
                <p>The application fee varies depending on the institution and program. Please check the specific program details for accurate information.</p>
            </div>
            <div class="faq-item">
                <h3 style="color: #004a8f;margin-top: 20px;">Can I get a refund?</h3>
                <p>Refund policies depend on the institution. Review the refund policy for your program before making any payments.</p>
            </div>
            <div class="faq-item">
                <h3 style="color: #004a8f;margin-top: 20px;">How can I pay my fees?</h3>
                <p>You can pay your fees using credit cards, bank transfers, or other accepted payment methods. Ensure you use a secure payment method.</p>
            </div>
        </section>
   



   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
