<footer class="custom-footer">
    <div class="custom-footer-container">

        <div class="custom-footer-row">
            <!-- ICEF-->
            <div class="custom-footer-col" id="icef">
                <span id='iasBadge' data-account-id='5510'></span>
                <script async defer crossorigin="anonymous" src="https://www-cdn.icef.com/scripts/iasbadgeid.js"></script>
            </div>
            <!-- Column 1 -->
            <div class="custom-footer-col">
                {{-- <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/edu-x white.png') }}" alt="Edu-X Logo" height="70">
                </a> --}}
                <p>US Address: 3337 Salem Cove Drive SE,N2H 6R3</p>
                <p>Africa Office Addresses: </p>
                <p>Senegal: Cite de l'emergence, Immeuble 10,<br> unit 21, Dakar Plateau </p>
                <p>Mali: <a
                        href="https://www.google.com/maps/place/Edu-x+Service/@12.580429,-7.9587039,17z/data=!3m1!4b1!4m6!3m5!1s0xe51d139af16a1a7:0xa381dbde3d4c0c97!8m2!3d12.580429!4d-7.956129!16s%2Fg%2F11nn1ydv23?coh=209933&entry=tts"
                        target="_blank">
                        Rue du Governeurr, Bamako, Mali
                    </a>
                </p>
                <ul class="edu-footer-social">
                    <li><a href="https://www.facebook.com/eduxservices/" target="_blank" aria-label="Facebook"><img
                                src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg"
                                alt="Facebook"></a></li>
                    <li><a href="https://twitter.com" target="_blank" aria-label="Twitter"><img
                                src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg"
                                alt="Twitter"></a></li>
                    <li><a href="https://www.instagram.com/edux_services/" target="_blank" aria-label="Instagram"><img
                                src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg"
                                alt="Instagram"></a></li>
                    <li><a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><img
                                src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/linkedin.svg"
                                alt="LinkedIn"></a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div class="custom-footer-col">
                <h3>About</h3>
                <ul>
                    <li><a href="{{ route('student') }}">Services</a></li>
                    {{-- <li><a href="{{ route('partner') }}">Partners</a></li> --}}
                    <li><a href="{{ route('search') }}">Resources</a></li>
                    {{-- <li><a href="{{ route('home') }}">FAQ</a></li> --}}
                    <li><a href="/contactus">Contact</a></li>
                    <li><a href="{{ route('blogs-pages') }}">Blogs</a></li>
                </ul>
            </div>

            <!-- Column 2 -->
            <div class="custom-footer-col">
                <h3>Discover</h3>
                <ul>
                    <li><a href="{{ route('search') }}"> Programs</a></li>
                    <li><a href="{{ route('institutions') }}"> Schools</a></li>
                    <li><a href="{{ route('student-register') }}">Register</a></li>
                    <li><a href="/webinar">Careers</a></li>
                </ul>
            </div>



            <!-- Column 4 -->
            <div class="custom-footer-col" id="county-flags">
                <h3>Study In:</h3>
                <ul>
                    <li>
                        United States<img class="flag" src="https://flagcdn.com/us.svg" alt="USA Flag">

                    </li>
                    <li>
                        Canada <img class="flag" src="https://flagcdn.com/ca.svg" alt="Canada Flag">

                    </li>
                </ul>
            </div>



        </div>

        <div class="custom-footer-copy">
            <p>© 2020–2025 Edu-X. All rights reserved. Developed by
                <a href="https://softwarehousetechnology.com/" target="_blank">SHT</a>
            </p>
        </div>

    </div>
</footer>

<style>
    #icef {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-right: 2px solid #d1d1d1;
        /* Right border */
        padding-right: 70px;
        margin: 20px 0;
    }

    #county-flags ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #county-flags ul li {
        display: flex;
        align-items: center;
        gap: 10px;
        /* Space between flag and name */
        font-size: 16px;
        color: #ddd;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    #county-flags ul li .flag {
        width: 20px !important;
        height: auto !important;
        border-radius: 2px !important;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
    }

    .custom-footer {
        /*background-color:#1652b4;*/
        background: linear-gradient(90deg, #0644a6, #2764c5);
        color: #fff;
        /*padding: 60px 20px 30px;*/
        padding-top: 40px;
        padding-bottom: 15px;
        font-family: Arial, sans-serif;
    }

    .custom-footer-container {
        max-width: 1200px;
        margin: auto;
    }

    .custom-footer-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 30px;
    }


    /* .custom-footer-col img {
        max-height: 70px;
        margin: auto;
        margin-bottom: 20px;
    } */

    .custom-footer-copy p {
        color: white;
        text-align: center;
        font-weight: bold;
        opacity: .7;
        max-width: 500px;
    }

    .custom-footer-copy a {
        text-decoration: underline;
    }

    .custom-footer-col h3 {
        font-size: 17px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #fff;
    }

    .custom-footer-col p,
    .custom-footer-col a,
    .custom-footer-col li {
        font-size: 15px;
        color: white !important;
        text-decoration: none;
        line-height: 1.8;
    }

    .custom-footer-col a:hover {
        color: #fff !important;
        text-decoration: underline !important;
    }

    .custom-footer-col ul {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .custom-footer-copy {
        border-top: 1px solid #fff;
        margin-top: 40px;
        padding-top: 20px;
        color: #fffbfb;
        font-size: 14px;
        width: 100%;
        text-align: center;
        display: flex;
        justify-content: center;
    }

    .edu-footer-social {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .edu-footer-social img {
        width: 24px;
        height: 24px;
        filter: invert(1);
        transition: transform 0.3s;
    }

    .edu-footer-social img:hover {
        transform: scale(1.1);
    }

    @media (max-width: 600px) {
        #icef {
            justify-content: center;
            border-right: none;
            padding-right: 0;
        }

        .#county-flags ul li {
            justify-content: center;

        }

        .edu-footer-social {
            justify-content: center;

        }

        .footer-social-icons {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            flex-wrap: wrap;
            /* Allows icons to wrap on smaller screens */
            gap: 12px;
            /* Spacing between icons */
            justify-content: center;
            /* Centers icons */
            align-items: center;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        #county-flags ul li {
            justify-content: center;

        }

        .custom-footer-row {
            flex-direction: column;
            gap: 30px;
        }

        .custom-footer-col {
            flex: 1 1 100%;
            text-align: center;
        }

        /*.custom-footer-col p{*/
        /*    text-align:right;*/
        /*}*/

        .custom-footer-container {
            padding: 0 10px;
            text-align: center;
        }
    }

    .footer-language-switcher {
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 14px;
    }

    .footer-language-switcher .lang-option {
        color: #ffffff;
        text-decoration: none;
        padding: 4px 8px;
        border-radius: 4px;
        transition: background-color 0.2s ease;
    }

    .footer-language-switcher .lang-option:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .footer-language-switcher .lang-option.active {
        font-weight: bold;
        text-decoration: underline;
    }

    .footer-language-switcher .divider {
        color: #ffffff;
    }
    @media(max-width: 1024px){
          #icef {
            justify-content: center;
            border-right: none;
            padding-right: 0;
        }
          .edu-footer-social {
            justify-content: center;

        }
          #county-flags ul li {
            justify-content: center;

        }

        .custom-footer-row {
            flex-direction: column;
            gap: 30px;
        }

        .custom-footer-col {
            flex: 1 1 100%;
            text-align: center;
        }

        /*.custom-footer-col p{*/
        /*    text-align:right;*/
        /*}*/

        .custom-footer-container {
            padding: 0 10px;
            text-align: center;
        }
    }
</style>
