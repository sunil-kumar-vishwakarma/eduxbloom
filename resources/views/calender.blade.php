@extends('frontent.layouts.app')
@section('title', 'EduX | Home ')
@section('content')
    <!-- Google Fonts & FullCalendar CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />

    <style>
        :root {
            --gradient: linear-gradient(135deg, #078900, #027600);
            --glass-bg: rgba(0, 0, 0, 0.87);
            --glass-border: rgba(255, 255, 255, 0.3);
            --dark: #111;
            --light: #f0f4ff;
        }

        .calender-container {
            font-family: 'Inter', sans-serif;
            /* background: var(--light); */
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 30px 15px;
            margin-top: 10%;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            background: linear-gradient(to right, #bb0e45, #ad0039);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        #calendar {
            background: #fff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.534);
            max-width: 1000px;
            width: 100%;
            overflow: hidden;
        }

        .fc .fc-daygrid-day-frame {
            padding: 2px !important;
            min-height: 45px !important;
        }

        .fc .fc-daygrid-day-number {
            font-size: 12px;
            padding: 4px;
        }

        .fc .fc-event {
            font-size: 11px;
            border-radius: 4px;
        }

      .modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.548);
    backdrop-filter: blur(5px);
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: #ffffff; /* white background */
    border: 1px solid var(--glass-border);
    border-radius: 16px;
    padding: 30px;
    width: 90%;
    max-width: 400px;
    color: #111; /* dark text */
    box-shadow: 0 15px 60px rgba(0, 0, 0, 0.3);
    animation: scaleIn 0.4s ease forwards;
}

@keyframes scaleIn {
    0% {
        opacity: 0;
        transform: scale(0.95);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.modal-content h3 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
    color: #111;
}

form label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    font-weight: 600;
    color: #222;
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #b7b7b7;
    border-radius: 10px;
    background: #f9f9f9;
    color: #333;
    font-size: 14px;
}

form input::placeholder {
    color: #aaa;
}

.btn-group {
    text-align: center;
}

.btn-group button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 30px;
    font-weight: bold;
    font-size: 14px;
    cursor: pointer;
    color: #fff;
    transition: 0.3s ease;
}

#confirmBtn {
    background: var(--gradient); /* original blue-purple gradient */
}

#cancelBtn {
    background: linear-gradient(135deg, #ff4e50, #c41425); /* red gradient */
}

.btn-group button:hover {
    transform: scale(1.05);
}

        @media (max-width: 600px) {
            h1 {
                font-size: 24px;
            }

            .modal-content {
                padding: 20px;
            }

            .fc .fc-daygrid-day-frame {
                min-height: 35px !important;
            }
        }

        .fc .fc-scrollgrid {
            overflow: hidden !important;
        }

        .fc .fc-daygrid-day-top {
            padding: 2px;
        }

        .fc .fc-daygrid-day {
            padding: 0;
            margin: 0;
        }
    </style>

    <div class="calender-container">
        <h1>Book Your Free Consultation</h1>
        <div id="calendar"></div>

        <!-- Modal -->
        <div id="bookingModal" class="modal">
            <div class="modal-content">
                <h3>Confirm Booking</h3>
                <form id="bookingForm">
                    @csrf
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" required />

                    <label for="email">Email Address</label>
                    <input type="email" id="email" required />

                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" required />

                    <label>Date</label>
                    <input type="text" id="selectedDate" readonly />

                    <div class="btn-group">
                        <button type="submit" id="confirmBtn">Confirm</button>
                        <button type="button" id="cancelBtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const modal = document.getElementById('bookingModal');
            const selectedDateField = document.getElementById('selectedDate');
            const cancelBtn = document.getElementById('cancelBtn');
            const bookingForm = document.getElementById('bookingForm');
            let selectedRange;

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                select: function(info) {
                    selectedRange = info;
                    selectedDateField.value = info.startStr;
                    modal.style.display = 'flex';
                }
            });

            calendar.render();

            cancelBtn.addEventListener('click', () => {
                modal.style.display = 'none';
                bookingForm.reset();
            });

            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    bookingForm.reset();
                }
            });

            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('fullName').value.trim();
                const email = document.getElementById('email').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const book_date = document.getElementById('selectedDate').value.trim();

                if (!name || !email) {
                    alert('Please fill all required fields');
                    return;
                }

            fetch("{{ route('consultation.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ fullName: name, email: email, phone: phone, book_date: book_date })
                })

                calendar.addEvent({
                    title: `Consultation: ${name}`,
                    start: selectedRange.start,
                    end: selectedRange.end,
                    allDay: true
                });

                alert(`Thank you ${name}, your booking on ${selectedRange.startStr} is confirmed!`);
                modal.style.display = 'none';
                bookingForm.reset();
            });
        });
    </script> -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const modal = document.getElementById('bookingModal');
        const selectedDateField = document.getElementById('selectedDate');
        const cancelBtn = document.getElementById('cancelBtn');
        const bookingForm = document.getElementById('bookingForm');
        let selectedRange;

         const today = new Date().toISOString().split('T')[0];

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            selectAllow: function (selectInfo) {
                // Disable click on past dates
                return selectInfo.startStr >= today;
            },
            select: function (info) {
                if (info.startStr < today) {
                    return; // just a safeguard
                }
                selectedRange = info;
                selectedDateField.value = info.startStr;
                modal.style.display = 'flex';
            }
        });

        calendar.render();

        cancelBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            bookingForm.reset();
        });

        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                bookingForm.reset();
            }
        });

        bookingForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const book_date = document.getElementById('selectedDate').value.trim();

            if (!name || !email) {
                alert('Please fill all required fields');
                return;
            }

            fetch("{{ route('consultation.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    fullName: name,
                    email: email,
                    phone: phone,
                    book_date: book_date
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    calendar.addEvent({
                        title: `Consultation: ${name}`,
                        start: selectedRange.start,
                        end: selectedRange.end,
                        allDay: true
                    });

                    // alert(`Thank you ${name}, your booking on ${selectedRange.startStr} is confirmed!`);
                    modal.style.display = 'none';
                    bookingForm.reset();
                } else {
                    alert('Booking failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong. Please try again later.');
            });
        });
    });
</script>



@endsection
