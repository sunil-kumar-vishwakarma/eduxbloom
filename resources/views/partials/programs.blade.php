            <meta name="csrf-token" content="{{ csrf_token() }}">
            @if ($programs->count())
                <div class="programs-container">
                    @foreach ($programs as $value)
                        {{-- <div class="program-card">
                            <div class="program-header">
                              <!-- <img src="{{ asset('images/edu-x white.png') }}" alt="University Logo" class="program-logo" /> -->

                                 <img src="{{ asset('/public/storage/' . $value->image) }}?v={{ $value->updated_at->timestamp }}"
                                    alt="University Logo" class="program-logo" />
                                <a href="#">
                                    <h3>{{ $value->university_name }}</h3>
                                </a>
                            </div>

                            <div class="program-badges">
                                <span class="badge">{{ $value->success_prediction }} Demand</span>
                                <span class="badge">Popular</span>
                            </div>

                            <div class="program-details">
                                <small>{{ $value->certificate }}</small>
                                <a href="#">
                                    <p>{{ $value->college_name }}</p>
                                </a>
                                <hr />
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Course</td>
                                            <td>{{ $value->college_course }}</td>
                                        </tr>
                                        <tr>
                                            <td>Program Level</td>
                                            <td>{{ $value->program_level }}</td>
                                        </tr>
                                        <tr>
                                            <td>Program language</td>
                                            <td>{{ $value->language }}</td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td>{{ $value->location }}</td>
                                        </tr>
                                        <tr>
                                            <td>Campus Country</td>
                                            <td>{{ $value->campus_country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Campus city</td>
                                            <td>{{ $value->location }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tuition (1st year)</td>
                                            <td> ${{ $value->tuition }}CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Application fee</td>
                                            <td>${{ $value->application_fee }}CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td> {{ $value->duration }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="program-footer">
                                <p>Success prediction <button class="success-btn" onclick="openModal()">Details</button>
                                </p>

                                <button class="apply-btn"><a href="{{ route('details', $value->id) }}">Create Application</a></button>
                            </div>
                        </div> --}}

                        <div class="program-card">
                            <div class="program-header">
                                <img src="{{ asset('/public/storage/' . $value->image) }}?v={{ $value->updated_at->timestamp }}"
                                    alt="University Logo" class="program-logo" />

                                <div class="header-content">
                                    <h3>{{ $value->university_name }}</h3>

                                    
                                @if(in_array($value->id, $favouriteProgram))
                                    <button class="favorite-btn" 
                                            title="Remove from favourite"
                                            onclick="addToFavourite(this)" 
                                            data-program-id="{{ $value->id }}">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                @else
                                    <button class="favorite-btn" 
                                            title="Add to favourite"
                                            onclick="addToFavourite(this)" 
                                            data-program-id="{{ $value->id }}">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                @endif


                                </div>
                            </div>

                            <div class="program-details">
                                <table>
                                    <tbody>
                                        {{-- <tr>
                                            <td>School</td>
                                            <td>{{ $value->college_name }}</td>
                                        </tr> --}}
                                        <tr>
                                            <td>Tuition</td>
                                            <td>${{ $value->tuition }} CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Application Fee</td>
                                            <td>${{ $value->application_fee }} CAD</td>
                                        </tr>
                                        <tr>
                                            <td>Language</td>
                                            <td>{{ $value->language }}</td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td>{{ $value->location }}, {{ $value->campus_country }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="program-footer">
                                <a href="{{ route('details', $value->id) }}" class="btn learn-btn">
                                    <i class="fas fa-book-open"></i> Learn More
                                </a>

                                <button class="btn apply-btn" onclick="openApplyModal('{{ $value->id }}')">
                                    <i class="fas fa-paper-plane"></i> Apply Now
                                </button>
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <p>No programs found.</p>
            @endif
            </div>
            <div id="js-alert-container"></div>

            <!-- Apply Now Modal -->
            <div id="applyModal" class="modal-overlay" style="display: none;">
                <div class="modal-content">
                    <button class="close-modal" onclick="closeApplyModal()">&times;</button>
                    <h2>Apply to this School</h2>
                    <p class="apply-note">
                        Note: You can apply to this school directly for free using our app EduBloom
                        or complete this form and an advisor will contact you.
                    </p>
                    <div id="applyNowFormSuccess">

                    </div>
                    
                         <form id="mentorApplicationForm" class="apply-form">
                           
                        <input type="text" placeholder="Full Name" name="full_name" id="full_name" required>
                        <input type="date" placeholder="Birthdate" name="dob" id="dob" required>
                        <input type="text" placeholder="Location"  name="location" id="location" required>
                        <input type="number" placeholder="WhatsApp Number" name="whats_app_number" id="whats_app_number" required>
                        <input type="email" placeholder="Email Address" name="email" id="email" required>
                        <select required name="studies_level" id="studies_level">
                            <option value="">Level of Studies</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Postgraduate">Postgraduate</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                        <input type="hidden" name="program_id" id="program_id">
                        <button type="submit" class="submit-btn">Submit Application</button>
                    </form>
                </div>
            </div>

            <div class="pagination">
                {{ $programs->withQueryString()->links() }}
                <!-- {{ $programs->appends(request()->input())->links() }} -->
            </div>
            
            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
             <script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date();
        const year = today.getFullYear() - 5;
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const maxDate = `${year}-${month}-${day}`;

        const dobInput = document.getElementById("dob");
        dobInput.setAttribute("max", maxDate);
        dobInput.onkeydown = () => false; // optional: disable typing
    });
</script>
            <script>
                function openApplyModal(schoolId) {
                    const modal = document.getElementById('applyModal');
                    const programInput = document.getElementById('program_id');
                if (programInput) {
                    programInput.value = schoolId;
                }
                
                    modal.style.display = 'flex';

                    // Attach one-time event to detect click outside modal content
                    setTimeout(() => {
                        window.addEventListener('click', outsideClickHandler);
                    }, 0);
                }

                function closeApplyModal() {
                    const modal = document.getElementById('applyModal');
                    modal.style.display = 'none';

                    // Remove event listener when closed
                    window.removeEventListener('click', outsideClickHandler);
                }

                function outsideClickHandler(event) {
                    const modalContent = document.querySelector('.modal-content');
                    const modal = document.getElementById('applyModal');

                    // If clicked outside modal content
                    if (!modalContent.contains(event.target)) {
                        closeApplyModal();
                    }
                }
            </script>
               

                
    <!-- Custom JS Alert -->
    <script>
        function showJsAlert(type, message) {
            const container = document.getElementById('js-alert-container');
            if (!container) return;

            container.innerHTML = ''; // Clear previous alert

            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'error' ? 'danger' : 'success'}`;
            alertDiv.innerHTML = `
            <i class="fas ${type === 'error' ? 'fa-times-circle' : 'fa-check-circle'}"></i>
            ${message}
        `;

            // Inline styling
            Object.assign(alertDiv.style, {
                position: 'fixed',
                top: '20px',
                left: '40%',
                transform: 'translateX(-50%)',
                padding: '12px 25px',
                fontSize: '16px',
                fontFamily: "'Roboto', sans-serif",
                borderRadius: '6px',
                boxShadow: '0 10px 20px rgba(0, 0, 0, 0.1)',
                zIndex: '1000',
                backgroundColor: type === 'error' ? '#b92151' : '#28a745',
                color: 'white',
                transition: 'opacity 0.6s ease',
                opacity: 1,
            });

            container.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.style.opacity = 0;
                setTimeout(() => alertDiv.remove(), 600);
            }, 3000);
        }
    </script>

    <!-- Form Submission -->
    <script>
        document.getElementById('mentorApplicationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = {
                full_name: document.getElementById('full_name').value,
                dob: document.getElementById('dob').value,
                location: document.getElementById('location').value,
                whats_app_number: document.getElementById('whats_app_number').value,
                email: document.getElementById('email').value,
                studies_level: document.getElementById('studies_level').value,
                program_id: document.getElementById('program_id').value,
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showJsAlert('error', 'CSRF token missing.');
                return;
            }

            fetch("/apply/now", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken.getAttribute("content")
                    },
                    body: JSON.stringify(formData)
                })
                .then(async (response) => {
                    const contentType = response.headers.get("content-type");
                    if (!response.ok) {
                        if (contentType && contentType.includes("application/json")) {
                            const errorData = await response.json();
                            throw new Error(errorData.message || "Validation failed.");
                        } else {
                            throw new Error("Unexpected response format.");
                        }
                    }

                    const data = await response.json();
                    showJsAlert('success', data.message || 'Application submitted!');
                    document.getElementById("mentorApplicationForm").reset();
                    closeMentorForm();
                })
                .catch(error => {
                    showJsAlert('error', error.message || 'There was an error submitting the form.');
                    console.error(error);
                });
        });
    </script>
     <script>
        function openMentorForm() {
            document.getElementById("applyModal").style.display = "flex";
        }

        function closeMentorForm() {
            document.getElementById("applyModal").style.display = "none";
        }

        // Optional: Click outside to close
        window.onclick = function(event) {
            const popup = document.getElementById("applyModal");
            if (event.target === popup) {
                closeMentorForm();
            }
        }
    </script>

  <script>
    function addToFavourite(button) {
    const programId = button.getAttribute('data-program-id');

    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        showJsAlert('error', 'CSRF token missing.');
        return;
    }

    fetch("/favourite/program/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken.getAttribute("content")
        },
        body: JSON.stringify({ program_id: programId })
    })
    .then(async (response) => {


           if (response.status === 401) {
            alert(response);
            window.location.href = "/student-login"; // redirect to your login page
            return;
        }


        const contentType = response.headers.get("content-type");
        if (!response.ok) {
            if (contentType && contentType.includes("application/json")) {
                const errorData = await response.json();
                throw new Error(errorData.message || "Validation failed.");
            } else {
                throw new Error("Unexpected response format.");
            }
        }

        const data = await response.json();
        showJsAlert('success', data.message || 'Added to favourites!');

        // Toggle heart icon on success
        const icon = button.querySelector('i');
        icon.classList.toggle('fa-solid');
        icon.classList.toggle('fa-regular');
    })
   .catch(error => {
    // Create container if needed
    const container = document.body;
    const type = 'error';
    const message = 'Something went wrong. Please login again.';

    const alertDivData = document.createElement('div');
    alertDivData.className = `alert alert-${type === 'error' ? 'danger' : 'success'}`;
    alertDivData.innerHTML = `
        <i class="fas ${type === 'error' ? 'fa-times-circle' : 'fa-check-circle'}"></i>
        ${message}
    `;

    // Styling
    Object.assign(alertDivData.style, {
        position: 'fixed',
        top: '20px',
        left: '50%',
        transform: 'translateX(-50%)',
        padding: '12px 25px',
        fontSize: '16px',
        fontFamily: "'Roboto', sans-serif",
        borderRadius: '6px',
        boxShadow: '0 10px 20px rgba(0, 0, 0, 0.1)',
        zIndex: '1000',
        backgroundColor: type === 'error' ? '#b92151' : '#28a745',
        color: 'white',
        transition: 'opacity 0.6s ease',
        opacity: 1,
    });

    container.appendChild(alertDivData);

    // Fade out after 3 seconds, then redirect
    setTimeout(() => {
        alertDivData.style.opacity = 0;
        setTimeout(() => {
            alertDivData.remove();
            window.location.href = "/student-login";
        }, 600);
    }, 3000);
});

}

  </script>
