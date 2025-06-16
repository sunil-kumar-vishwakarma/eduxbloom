            @if ($programs->count())
                <div class="programs-container">
                    @foreach ($programs as $value)
                        <div class="program-card">
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
                        </div>
                    @endforeach
                </div>
            @else
                <p>No programs found.</p>
            @endif
            </div>

            <!-- Success Prediction Modal -->
            <div id="successModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <h3>Success Prediction by Intake</h3>
                    <p class="note">
                        Estimated based on ApplyBoard's historical data. We make no representations, warranties, or
                        guarantees as to the
                        information's accuracy.
                    </p>

                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2025</button>
                            <div class="accordion-panel">
                                <p><strong>Seat Availability:</strong> Very High</p>
                                <p><strong>Turn Around Time:</strong> Very Fast</p>
                                <p><strong>Conversion:</strong> Very High</p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2026</button>
                            <div class="accordion-panel">
                                <p><strong>Seat Availability:</strong> Very High</p>
                                <p><strong>Turn Around Time:</strong> Very Fast</p>
                                <p><strong>Conversion:</strong> Very High</p>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <button class="accordion-btn" onclick="toggleAccordion(this)">Sep 2027</button>
                            <div class="accordion-panel">
                                <p><strong>Seat Availability:</strong> Very High</p>
                                <p><strong>Turn Around Time:</strong> Slow</p>
                                <p><strong>Conversion:</strong> Very High</p>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="info-note">
                        <p><strong>Conversion:</strong> Historical ratio of accepted to submitted applications.</p>
                        <p><strong>Turn Around Time:</strong> Expected time to receive a letter of acceptance.</p>
                        <p><strong>Seat Availability:</strong> Predicted likelihood of a seat being available.</p>
                    </div>
                </div>
            </div>

            <div class="pagination">
                {{ $programs->withQueryString()->links() }}
                <!-- {{ $programs->appends(request()->input())->links() }} -->
            </div>
