<style>
    .logo-border {
        border: 5px solid #0056b3;
        border-radius: 50% !important;
        padding: 6px;
        background-color: white;

    }

    #navbarNav {
        /* margin-top: 8.5px; */
        margin-top: -2px;
    }

    .nav-link i {
        font-size: medium;
    }

    .d-flex {
        gap: 5px;
    }

    .nav-link.active,
    .dropdown-item.active,
    .lang-option.active,
    #loginn.active {
        color: #ad0039;
        font-weight: bold;
        border-bottom: 3px solid #ad0039;
    }

    .lang-option.active {
        padding: 5px;
    }

    .language-option {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 0.95rem;
        margin-left: 60px;
    }

    .language-switcher {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .lang-option {
        color: #bb0e45;
        text-decoration: none;
        padding: 4px 8px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .lang-option:hover {
        background-color: #f2f2f2;
        color: #111;
    }

    .lang-option.active {
        background: linear-gradient(to right, #bb0e45, #ad0039);
        color: #fff;
        font-weight: 700;
    }

    .lang-divider {
        color: #aaa;
        /* color: #bb0e45; */
    }

    @media (max-width: 768px) {
        #navbarNav {
            flex-direction: column;
        }

        .language-option {
            margin-left: 0;
            margin-top: 0;
        }

        .dropdown-menu {
            right: -60px;
        }
    }

    @media (max-width: 1024px) {
        .language-option {
            margin-left: 0px;
        }
    }
</style>

<style>
    .auth-section {
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
        font-family: 'Segoe UI', sans-serif;
    }

    .profile-dropdown {
        position: relative;
    }

    .profile-toggle {
        margin-top: -5px;
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 8px 12px;
        background-color: #f9f9f9;
        border-radius: 25px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        transition: background 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .profile-toggle:hover {
        background-color: #f0f0f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-icon {
        font-size: 24px;
        color: #b92151;
    }

    .profile-name {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        white-space: nowrap;
    }

    .dropdown-arrow {
        font-size: 12px;
        color: #777;
        transition: transform 0.3s ease;
    }

    /* Optional: rotate arrow when dropdown is open */
    .profile-toggle.open .dropdown-arrow {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        min-width: 150px;
        z-index: 1000;
    }

    .dropdown-menu li {
        list-style: none;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #333;
        transition: background 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    .auth-buttons {
        margin-top: -10px;
        display: flex;
        gap: 10px;
    }

    .login-link {
        background-color: white !important;
        border-radius: 6px;
        padding: 7px 15px;
        border: 0.5px solid #292E3E;
        color: #b92151 !important;
        font-weight: bold;
        margin-top: 10px;
        display: inline-block;
        color: black;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .login-link:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .register-button {
        background: linear-gradient(135deg, #bb0e45, #ad0039);
        border-radius: 6px;
        padding: 7px 15px;
        border: 2px solid #b92151;
        margin-top: 10px;
        display: inline-block;
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .register-button:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    body {
        top: 0px !important;
        margin-top: 0px !important;
        position: relative !important;
    }

    /* Translate Widget Styling */
    #google_translate_element {
        /* margin-left: 20px; */
        font-family: "Open Sans", Sans-serif;
        background: #ffffff;
        border-radius: 6px;
        padding: 7px 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        transition: background 0.3s ease;
    }


    /* Remove unwanted branding and images */
    .goog-te-gadget img,
    .VIpgJd-ZVi9od-ORHb-OEVmcd,
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }


    .goog-te-gadget-simple .VIpgJd-ZVi9od-xl07Ob-lTBxed span {
        border: none !important;
        margin: 0 1px;
        font-size: 16px;
        color: #333;
        font-weight: 600;
    }

    .indicator {
        display: none !important;
    }

    /* Dropdown styling */
    .goog-te-gadget .goog-te-combo {
        background-color: white;
        color: #222;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 6px 10px;
        border: 1px solid #bbb;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .goog-te-gadget .goog-te-combo:hover {
        border-color: #ad0039;
    }

    .goog-te-gadget-simple {
        background-color: #FFF;
        border: none;
        font-size: 10pt;
        display: inline-block;
        padding-top: 1px;
        cursor: pointer
    }
</style>

<style>
    .language-switcher {
        display: flex;
        align-items: center;
        margin: 10px 0;
    }

    .lang-option {
        font-weight: bold;
        color: #007BFF;
        text-decoration: none;
        margin: 0 5px;
        cursor: pointer;
    }

    .lang-option:hover {
        text-decoration: underline;
    }

    .lang-divider {
        margin: 0 5px;
    }

    .floating-logo {
        position: relative;
        height: 70px;
        width: 70px;
        z-index: 2;
    }

    @media (max-width: 768px) {
        .floating-logo {
            position: absolute;
            top: 90%;
            left: 0px;
            transform: translateY(-50%);
            background: white;
            padding: 5px;
            /* border-radius: 10px 50px 50px 50px !important; */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: opacity 0.3s ease;
        }

        .floating-logo {
            /* border-radius: 0px 50px 50px 50px !important; */
            border-radius: 50%;
            /* top-left, top-right, bottom-right, bottom-left */
            border: 8px solid #0d2e5a;
            /* dark blue border */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* Hidden when navbar is collapsed open */
        .navbar-collapse.show~.floating-logo {
            display: none !important;
        }
        .navbar-brand div{
            display: none;
        }
    }



    /* MOBILE STYLES */
    @media (max-width: 991.98px) {
        #dropdownMenu {
            right: -60px;
        }
    }
</style>


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="{{ '/' }}">
            <img src="{{ asset('images/edu-x white.png') }}" alt="Edu-X Logo" class="logo-border floating-logo">
            <div>Edu-X Services</div>
        </a>




        <!-- Toggle button for mobile screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links and buttons -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('student') ? 'active' : '' }}"
                        href="{{ route('student') }}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('institutions') ? 'active' : '' }}"
                        href="{{ route('institutions') }}">Parents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('search') ? 'active' : '' }}" href="{{ route('search') }}">Program &
                        Pathways</a>
                </li>

                <!-- Hover Dropdown -->
                <li class="nav-item dropdown-hover">
                    <a class="nav-link {{ request()->is('blogs-pages') || request()->is('youngleaders') || request()->is('events') || request()->is('contactus') ? 'active' : '' }}"
                        href="#">
                        Resource Center <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('blogs-pages') ? 'active' : '' }}"
                                href="/blogs-pages">Edu-X Blog</a></li>
                        <li><a class="dropdown-item {{ request()->is('youngleaders') ? 'active' : '' }}"
                                href="/youngleaders">Edu-X
                                Young Leaders</a></li>
                        <li><a class="dropdown-item {{ request()->is('events') ? 'active' : '' }}"
                                href="/events">Parent Resources</a></li>
                        <li><a class="dropdown-item {{ request()->is('contactus') ? 'active' : '' }}"
                                href="/contactus">Contact us</a></li>
                    </ul>
                </li>


                <div class="language-option">
                    <!-- <div class="language-switcher">
                        <a href="{{ route('change.lang', 'en') }}"
                            class="lang-option {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                        <span class="lang-divider">|</span>
                        <a href="{{ route('change.lang', 'fr') }}"
                            class="lang-option {{ app()->getLocale() === 'fr' ? 'active' : '' }}">FR</a>
                    </div> -->

                    {{-- <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <div id="google_translate_element"></div>
                        </li>
                    </ul> --}}

                    <!-- <div class="language-switcher">
                        <a href="javascript:void(0)" onclick="doGTranslate('en|en')" class="lang-option">EN</a>
                        <span class="lang-divider">|</span>
                        <a href="javascript:void(0)" onclick="doGTranslate('en|fr')" class="lang-option">FR</a>
                    </div> -->
                    <!-- <div class="language-switcher">
                        <a href="javascript:void(0)" onclick="translatePage('en', 'en')" class="lang-option">EN</a>
                        <span class="lang-divider">|</span>
                        <a href="javascript:void(0)" onclick="translatePage('en', 'fr')" class="lang-option">FR</a>
                    </div> -->

                    <div class="language-switcher">
                        <a href="javascript:void(0)" onclick="translatePage('en', 'en')" class="lang-option">EN</a>
                        <span class="lang-divider">|</span>
                        <a href="javascript:void(0)" onclick="translatePage('en', 'fr')" class="lang-option">FR</a>
                    </div>

                    <div id="google_translate_element" style="display:none;"></div>


                </div>
            </ul>



            {{-- <div class="d-flex">
                <a href="{{ route('login') }}" id="loginn"
                    class="{{ Route::is('login') ? 'active' : '' }}">Login</a>
                <a href="{{ route('student-register') }}"
                    class="btn-custom {{ Route::is('student-register') ? 'active' : '' }}">Register</a>
            </div> --}}

            <div class="auth-section">
                @if (Auth::check())
                    {{-- Show user profile dropdown --}}
                    <div class="profile-dropdown">
                        <a href="#" class="profile-toggle" onclick="toggleDropdown(event)">
                            {{-- <img src="{{ asset('images/profile-icon.png') }}" class="profile-img" /> --}}
                            <i class="fa-solid fa-user-circle profile-icon"></i>
                            <span class="profile-name">{{ Auth::user()->name }}</span>
                            <i class="fa fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li><a href="{{ route('userdashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('logout_user') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    {{-- Show Login & Register buttons --}}
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="login-link">Login</a>
                        <a href="{{ route('student-register') }}" class="register-button">Register</a>
                    </div>
                @endif
            </div>

        </div>



    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // const translateBtn = document.createElement('button');
        // translateBtn.innerText = 'Translate to French';
        // translateBtn.style = 'position:fixed;top:20px;right:20px;z-index:9999;padding:10px;background:#008CBA;color:#fff;border:none;border-radius:5px;';
        document.body.appendChild(translateBtn);

        translateBtn.addEventListener('click', async () => {
            const elements = document.querySelectorAll(
                'body *:not(script):not(style):not(noscript)');
            let textMap = [];

            // Step 1: collect only text nodes (not html tags)
            elements.forEach((el) => {
                if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                    const text = el.innerText.trim();
                    if (text.length > 0) {
                        textMap.push({
                            el,
                            text
                        });
                    }
                }
            });

            const joinedText = textMap.map(item => item.text).join(' ||| ');

            // Step 2: send to Laravel backend
            const response = await fetch('/translate-api', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    text: joinedText
                }),
            });

            const data = await response.json();
            const translatedTexts = data.translated.split(' ||| ');

            // Step 3: replace original text with translated text
            translatedTexts.forEach((fr, i) => {
                textMap[i].el.innerText = fr.trim();
            });
        });
    });
</script>

<script>
    async function translatePage(fromLang, toLang) {
        const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
            acceptNode: function(node) {
                const parent = node.parentNode;
                return (
                    node.textContent.trim() !== '' &&
                    !parent.closest('.language-switcher') && // skip language switcher
                    !['SCRIPT', 'STYLE', 'NOSCRIPT', 'IFRAME'].includes(parent
                        .nodeName) // ignore code/script
                ) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT;
            }
        });

        const nodes = [];
        let node;
        while ((node = walker.nextNode())) {
            nodes.push(node);
        }

        const originalTexts = nodes.map(n => n.textContent.trim());
        const joinedText = originalTexts.join(' ||| ');

        try {
            const response = await fetch('/translate-api', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    text: joinedText,
                    from: fromLang,
                    to: toLang
                })
            });

            const data = await response.json();
            const translatedParts = data.translated.split(' ||| ');

            nodes.forEach((n, i) => {
                if (translatedParts[i]) {
                    n.textContent = translatedParts[i];
                }
            });
        } catch (error) {
            console.error("Translation failed:", error);
            alert("Translation failed. Check OpenAI API quota or server.");
        }
    }
</script>





<!-- Google Translate Init Script -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            // pageLanguage: 'en',
            includedLanguages: 'en,fr',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    function doGTranslate(langPair) {
        if (langPair.value) langPair = langPair.value;
        var lang = langPair.split('|')[1];
        var select = document.querySelector("select.goog-te-combo");

        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event('change'));
        } else {
            setTimeout(function() {
                doGTranslate(langPair);
            }, 500);
        }
    }
</script>

<!-- Google Translate API Script -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
    rel="stylesheet">




<script>
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        const navbarCollapse = document.querySelector('.navbar-collapse');
        const logo = document.querySelector('.floating-logo');

        const isExpanded = navbarCollapse.style.display === 'flex';

        // Toggle navbar display
        navbarCollapse.style.display = isExpanded ? 'none' : 'flex';

        // Toggle logo visibility
        if (!isExpanded) {
            logo.style.display = 'none'; // hide when opening
        } else {
            logo.style.display = 'block'; // show when closing
        }
    });
</script>


<script>
    function toggleDropdown(event) {
        event.preventDefault();
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Optional: Close dropdown if clicking outside
    window.addEventListener('click', function(e) {
        const toggle = document.querySelector('.profile-toggle');
        const dropdown = document.getElementById('dropdownMenu');
        if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>
