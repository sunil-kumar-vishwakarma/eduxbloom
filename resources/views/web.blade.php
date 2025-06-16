@extends('frontent.layouts.app')
@section('title', 'EduX | Student')
@section('content')
<br><br><br>
<link rel="stylesheet" href="{{asset('css/events.css')}}">


<style>
 
    small{
        gap: 50px;
        padding-right: 20px;
        font-size: 18px;
        font-weight: bold;
    }

.container
{
    text-align: center;
    font-family: sans-serif;

}

.back{
    background-color: blue;
    height: 208px;
    width: 800px;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    margin-top: 58px;
    margin-left: 22%;
    font-family: sans-serif;
    color: white;
    font-size: xx-large;
    font-weight: bold;
}

.back{
    padding: 20px 30px;
    text-align: center;
    justify-content: center;
    
}

.back h1{
    margin-top: 40px;
}

.back p{
    font-size: 20px;
    color: white;
    margin-left: inherit;
}

.form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

    

      .registrationForm  button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

      .registrationForm  button:hover {
            background-color: #0056b3;
        }

        .info-text {
            font-size: 15px;
            color: #555;
            margin-top: 10px;
        }

        .info-text a {
            color: #007bff;
            text-decoration: none;
        }

        .info-text a:hover {
            text-decoration: underline;
        }

        .support{
            transform: translateY(20px);
        }

       .support{
        /* padding-right: 50px; */
        
       }


       .supp{
        display: flex;
       
       }
       .supp a{
        margin-top: 21px;
        text-decoration: none;
       }

       #language{
        margin-top: 12px;
       }

       footer{
        background-color: #666;;
        color: white;
        font-family: sans-serif;
        text-align: center;
        align-items: center;
       }

      #top{
        transform: translateY(10px);
      }

      #language{
        border: none;
        color: #007bff;
        font-weight: bold;
        font-family: sans-serif;
      }

      small{
        color: #007bff;
      }

      .support {
        font-size: 14px;
        margin-top: -25px;
        
      }
      
      
      
      
      /* Default styles are already set, now we add media queries */

@media screen and (max-width: 1024px) {
    .back {
        width: 90%;
        margin: 0 auto;
    }
    .form-container {
        max-width: 90%;
    }
}

/* For mobile devices */
@media screen and (max-width: 768px) {
      .support{
            margin-top: -31px;
        }

         .logo{
             margin-top: 9px;
         }

    .supp {
        flex-direction: column;
        align-items: center;
    }
    .back {
        width: 95%;
        margin: 0 auto;
        height: auto;
        padding: 20px;
    }
    .back h1 {
        font-size: 24px;
    }
    .back p {
        font-size: 16px;
    }
    .destination h2 {
        font-size: 20px;
        text-align: center;
    }
    .form-container {
        max-width: 95%;
        padding: 15px;
    }
    footer {
        font-size: 12px;
    }
}

/* For smaller mobile devices */
@media screen and (max-width: 480px) {
    .back h1 {
        font-size: 20px;
    }
    .back p {
        font-size: 14px;
    }
    .destination h2 {
        font-size: 18px;
    }
    .form-container {
        padding: 10px;
    }
    input, select, textarea {
        font-size: 12px;
    }
    button {
        font-size: 14px;
        padding: 8px;
    }
    footer {
        padding: 10px;
    }
}



</style>


<style>
       

        /* Header Styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
        }

        /* Zoom Logo */
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        /* Support & Language Section */
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Support Link */
        .support a {
            text-decoration: none;
            font-size: 14px;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .support a:hover {
            color: #0056b3;
        }

        /* Language Dropdown */
        .language-select {
            position: relative;
        }

        .language-select select {
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            appearance: none;
            cursor: pointer;
            /* Custom arrow */
            background: url('data:image/svg+xml;utf8,<svg fill="gray" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 10px center;
            background-size: 14px;
        }
    </style>

<div class="header">
        <div class="logo">Zoom</div>
        <div class="header-right">
            <div class="support">
                <a href="https://support.zoom.com/hc/en"><strong>Support </strong></a>
            </div>
            <div class="language-select">
                <select name="language" id="language">
                    <option value="en" selected>English</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="zh">Chinese</option>
                    <option value="ja">Japanese</option>
                    <option value="ar">Arabic</option>
                    <option value="ru">Russian</option>
                    <option value="hi">Hindi</option>
                    <option value="pt">Portuguese</option>
                    <option value="it">Italian</option>
                    <option value="ko">Korean</option>
                    <option value="tr">Turkish</option>
                    <option value="vi">Vietnamese</option>
                    <option value="nl">Dutch</option>
                    <option value="sv">Swedish</option>
                    <option value="pl">Polish</option>
                    <option value="th">Thai</option>
                    <option value="id">Indonesian</option>
                    <option value="he">Hebrew</option>
                </select>
            </div>
        </div>
    </div>

   


        <div class="back">
           <h1>WEBINARS</h1>
           <p>Brought to you by Edu-X</p>
        </div><br>

        <div class="destination" style="font-size: x-large;font-weight: 600;">
            <h2>Destination UK: What Can We Expect in 2025?</h2>
        </div>

        <div class="registration">
            
            <div class="form-container">
                <h2 style="font-size: x-large;
    font-weight: 600;">Webinar Registration</h2>
    <br>
                <form id="registrationForm">
                    <label for="firstName">First Name*</label>
                    <input type="text" id="firstName" name="firstName" required>
                    <div class="error" id="firstNameError"></div>
        
                    <label for="lastName">Last Name*</label>
                    <input type="text" id="lastName" name="lastName" required>
                    <div class="error" id="lastNameError"></div>
        
                    <label for="email">Email Address*</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error" id="emailError"></div>
        
                    <label for="country">Country/Region*</label>
                    <select id="country-dropdown" style="width: 100%;">
                        <!-- Options will be dynamically populated -->
                      </select>
                      
                    <div class="error" id="countryError"></div>
        
                    <label for="rpId">What is your RP ID?*</label>
                    <input type="text" id="rpId" name="rpId" required>
                    <div class="error" id="rpIdError"></div>
        
                    <label for="comments">Questions & Comments</label>
                    <textarea id="comments" name="comments" rows="4"></textarea>
        
                    <button type="submit">Register</button>
        
                    <p class="info-text">
                        Information you provide when registering will be shared with the <a href="#">account owner</a> and host and can be used and shared by them in accordance with their Terms and Privacy Policy.
                    </p>

                   
                </form>

                <div id="successMessage" style="display: none; text-align: center; padding: 20px; background: #d4edda; color: #155724; border-radius: 8px; margin-top: 20px;">
                  <h2>Registration Successful!</h2>
                  <p>Thank you for registering. stay tuned!</p>
              </div>
            </div>

        </div>
    


    <!-- <footer>
        <p id="top">Copyright ©2025 Zoom Video Communications, Inc. All rights reserved.</p>
        <p>Privacy & Legal Policies</p>
    </footer> -->

<script>
  document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error').forEach(el => el.textContent = '');

    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const country = document.getElementById('country-dropdown');
    const rpId = document.getElementById('rpId');
    const successMessage = document.getElementById('successMessage');

    if (!firstName.value.trim()) {
        document.getElementById('firstNameError').textContent = 'This field is required.';
        isValid = false;
    }

    if (!lastName.value.trim()) {
        document.getElementById('lastNameError').textContent = 'This field is required.';
        isValid = false;
    }

    if (!email.value.trim()) {
        document.getElementById('emailError').textContent = 'This field is required.';
        isValid = false;
    } else if (!email.value.includes('@')) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    if (!country.value.trim()) {
        document.getElementById('countryError').textContent = 'This field is required.';
        isValid = false;
    }

    if (!rpId.value.trim()) {
        document.getElementById('rpIdError').textContent = 'This field is required.';
        isValid = false;
    }

    if (isValid) {
        // Hide the form
        document.getElementById('registrationForm').style.display = 'none';

        // Show success message
        successMessage.style.display = 'block';
    }
});




 
  $(document).ready(function() {
    const countryDropdown = $('#country-dropdown');

    // Fetch country list from REST Countries API
    $.ajax({
      url: "https://restcountries.com/v3.1/all",
      method: "GET",
      success: function(data) {
        // Populate dropdown with countries
        data.forEach(country => {
          const countryName = country.name.common;
          const countryCode = country.cca2; // Two-letter country code
          countryDropdown.append(new Option(countryName, countryCode));
        });

        // Initialize Select2 after options are added
        countryDropdown.select2({
          placeholder: "Select a country",
          allowClear: true
        });
      },
      error: function() {
        console.error("Failed to fetch countries.");
      }
    });
  });

</script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
