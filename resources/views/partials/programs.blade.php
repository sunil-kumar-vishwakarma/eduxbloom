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

                                    <button class="favorite-btn" title="Add to favourite"
                                        onclick="this.querySelector('i').classList.toggle('fa-solid'); this.querySelector('i').classList.toggle('fa-regular');">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>


                                </div>
                            </div>

                            <div class="program-details">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>School</td>
                                            <td>{{ $value->college_name }}</td>
                                        </tr>
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


            <!-- Apply Now Modal -->
            <div id="applyModal" class="modal-overlay" style="display: none;">
                <div class="modal-content">
                    <button class="close-modal" onclick="closeApplyModal()">&times;</button>
                    <h2>Apply to this School</h2>
                    <p class="apply-note">
                        Note: You can apply to this school directly for free using our app EduBloom
                        or complete this form and an advisor will contact you.
                    </p>
                    <form class="apply-form">
                        <input type="text" placeholder="Full Name" required>
                        <input type="date" placeholder="Birthdate" required>
                        <input type="text" placeholder="Location" required>
                        <input type="text" placeholder="WhatsApp Number" required>
                        <input type="email" placeholder="Email Address" required>
                        <select required>
                            <option value="">Level of Studies</option>
                            <option value="Undergraduate">Undergraduate</option>
                            <option value="Postgraduate">Postgraduate</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                        <button type="submit" class="submit-btn">Submit Application</button>
                    </form>
                </div>
            </div>

            <div class="pagination">
                {{ $programs->withQueryString()->links() }}
                <!-- {{ $programs->appends(request()->input())->links() }} -->
            </div>
            <style>
                .program-header {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: 16px;
                }


                .header-content {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    width: 100%;
                    margin-left: 12px;
                }


                .favorite-btn {
                    background: transparent;
                    border: none;
                    font-size: 18px;
                    cursor: pointer;
                    transition: color 0.3s;
                }

                .favorite-btn i {
                    color: #0644a6;
                    transition: color 0.3s;
                }

                .favorite-btn:hover i {
                    color: #0b5ada;
                }



                .program-footer {
                    display: flex;
                    justify-content: space-between;
                    gap: 10px;
                    margin-top: auto;
                    padding-top: 20px;
                }

                .btn {
                    padding: 10px 16px;
                    border-radius: 6px;
                    font-weight: 600;
                    text-decoration: none;
                    font-size: 14px;
                    cursor: pointer;
                    width: 100%;
                    text-align: center;
                }

                .learn-btn {
                    background-color: transparent;
                    color: #2764c5;
                    border: 2px solid #2764c5;
                    transition: transform 0.3s ease;
                }

                .learn-btn:hover {
                    transform: translateY(-2px);
                    /* background-color: #60a5fa; */
                    border: 2px solid #2764c5;
                    color: #2764c5;
                }

                .apply-btn {
                    background: linear-gradient(90deg, #0644a6, #2764c5);
                    color: #fff;
                    border: none;
                    transition: transform 0.3s ease;
                }

                .apply-btn:hover {
                    transform: translateY(-3px);
                    color: white !important;
                }

                .modal-overlay {
                    position: fixed;
                    z-index: 9999;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    backdrop-filter: blur(6px);
                }

                .modal-content {
                    background: #fff;
                    padding: 30px;
                    border-radius: 12px;
                    width: 100%;
                    max-width: 500px;
                    position: relative;
                    animation: fadeInUp 0.4s ease-in-out;
                    text-align: left;
                }

                .modal-content h2 {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 10px;
                }

                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(40px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .close-modal {
                    position: absolute;
                    top: 12px;
                    right: 16px;
                    background: transparent;
                    border: none;
                    font-size: 24px;
                    cursor: pointer;
                }

                .apply-note {
                    font-size: 14px;
                    margin-bottom: 20px;
                    line-height: 1.5;
                }

                .apply-form input,
                .apply-form select {
                    width: 100%;
                    margin-bottom: 16px;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 6px;
                    font-family: inherit;
                }

                .apply-form input:focus {
                    border-color: #0b5ada;
                    outline: none;
                    box-shadow: 0 0 0 2px rgba(11, 90, 218, 0.2);
                }


                .submit-btn {
                    width: 100%;
                    background: linear-gradient(90deg, #0644a6, #2764c5);
                    color: #fff;
                    padding: 12px;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: transform 0.3s ease;
                }

                .submit-btn:hover {
                    transform: translateY(-2px);
                }

                .edubloom-link {
                    color: #2563eb;
                    text-decoration: underline;
                }
            </style>
            <script>
                function openApplyModal(schoolId) {
                    const modal = document.getElementById('applyModal');
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
