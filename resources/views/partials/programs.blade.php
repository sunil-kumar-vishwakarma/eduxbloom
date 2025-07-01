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
