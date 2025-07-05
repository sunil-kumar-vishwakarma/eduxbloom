<?php

// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ConsultationBookController;
use App\Http\Controllers\ProgramApplyNowController;
use App\Http\Controllers\api\ApiController;





use Illuminate\Http\Request; 
// use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Client;

Route::post('/translate-api', function (Request $request) {
    $client = OpenAI::client(env('OPENAI_API_KEY'));

    $text = $request->input('text');

    $response = $client->chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'user',
                'content' => "Translate the following English text to French:\n\n{$text}",
            ],
        ],
    ]);

    return response()->json([
        'translated' => $response->choices[0]->message->content,
    ]);
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache cleared successfully!";
});



Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/send-sms', [SMSController::class, 'sendTestSMS']);


// In routes/web.php
Route::get('/send-otp', function () {
    return view('send-otp'); // Display the form
});


Route::post('/send-otp', [SMSController::class, 'sendOTP']);


Route::post('/team/login', [AuthController::class, 'teamLlogin'])->name('team.login');
Route::post('/student/login', [AuthController::class, 'studentLogin'])->name('student.login');

// Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/home', [HomeController::class, 'homePage'])->name('home');
Route::get('/', [HomeController::class, 'homePage']);
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('/student-register', [HomeController::class, 'studentRegister'])->name('student-register');
Route::get('/student-login', [HomeController::class, 'studentLogin'])->name('login');
Route::get('/team-login', [HomeController::class, 'team_login'])->name('team_login');
Route::get('/calender', [HomeController::class, 'calender'])->name('calender');
Route::post('/consultationStore', [ConsultationBookController::class, 'consultationStore'])->name('consultation.store');
// Route::post('/student/login', [LoginController::class, 'login']);
// Route::post('/team/login', [LoginController::class, 'teamLlogin'])->name('team.login');
// Route::get('/dashboard', [LoginController::class, 'userdashboard'])->name('user.dashboard');


Route::post('/student/register', [RegisterController::class, 'register']);


Route::get('/email/verify', function () {
    
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/userdashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// verify email in api user registration
Route::get('/useremail/verify/{id}/{hash}', [ApiController::class, 'verifyEmail'])
    ->middleware('signed')
    ->name('verification.verify');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/userdashboard', [UserDashController::class, 'userdashboard'])->name('userdashboard');

    Route::get('/usersearchProgram', [UserDashController::class, 'usersearchProgram'])->name('usersearchProgram');
    Route::get('/userprofile', [UserDashController::class, 'userprofile'])->name('userprofile');
    Route::put('/profile/update', [ProfileController::class, 'userUpdate'])->name('userprofile.update');
    Route::post('/education-summary', [ProfileController::class, 'educationSummary'])->name('educationSummary');
    // Route::post('/user/school-attended', [ProfileController::class, 'schoolAttended'])->name('school.attended');
    Route::post('/user/schools', [ProfileController::class, 'schoolAttended'])->name('user.schools.store');
    Route::post('/user/schools/store-or-update', [ProfileController::class, 'createOrUpdateSchools'])
    ->name('user.schools.storeOrUpdate');
    Route::post('/user-test_score/save', [ProfileController::class, 'createOrUpdateTestScore'])->name('test-scores.store');
    Route::post('/gre-gmat-score', [ProfileController::class, 'storeOrUpdateGreGmatScore'])->name('gre-gmat.createOrUpdate');

    Route::post('/update-address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');

    Route::get('/user_myapplication', [UserDashController::class, 'user_myapplication'])->name('user_myapplication');
    Route::post('/my-applications', [ProgramController::class, 'myApplicationStore'])->name('my_applications.store');

    Route::get('/userpayments', [UserDashController::class, 'userpayments'])->name('userpayments');
    Route::get('/education_history', [UserDashController::class, 'education_history'])->name('education_history');
    Route::get('/user_testScore', [UserDashController::class, 'user_testScore'])->name('user_testScore');
    Route::get('lang/{locale}', [ProgramController::class, 'changeLanguage'])->name('change.lang');
    Route::get('/logout_user', [AuthController::class, 'userLogout'])->name('logout_user');


    Route::get('/program_details/{id}', [UserDashController::class, 'details'])->name('user.programdetails');
    
    Route::get('/create-stripe-session/{id}', [StripeController::class, 'createSession']);
Route::get('/payment-success/{id}', [StripeController::class, 'paymentSuccess'])->name('payment.success');

});


Route::get('/forgotpassword', [HomeController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword2', [HomeController::class, 'forgotpassword2'])->name('forgotpassword2');
Route::post('/sendResetLink', [HomeController::class, 'sendResetLink'])->name('forgotpassword.send');

Route::get('/reset-password/{token}', [HomeController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [HomeController::class, 'reset'])->name('password.update');

Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::get('/explr/school/programs', [HomeController::class, 'explrSchoolPrograms'])->name('explr_school_Programs');
Route::get('/partner', [HomeController::class, 'partner'])->name('partner');

Route::get('/institutions', [HomeController::class, 'institutions'])->name('institutions');
Route::post('/mentor/apply', [MentorController::class, 'store']);

Route::get('/events', [HomeController::class, 'events'])->name('events');

Route::get('/blogs-pages', [HomeController::class, 'blogs'])->name('blogs-pages');
// Route::get('/blogdetails', [HomeController::class, 'blogdetails'])->name('blogdetails');
// Route::get('/blogdetails/{id}', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blogdetails/{id}', [BlogController::class, 'blogDetail'])->name('blog.detail');




Route::get('/youngleaders', [HomeController::class, 'youngleaders'])->name('youngleaders');
// Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/search', [ProgramController::class, 'search'])->name('search');
Route::get('/program/details/{id}', [ProgramController::class, 'showDetails'])->name('details');
Route::get('/programdetails/{id}', [ProgramController::class, 'showrelatedprograms'])->name('discover_program.show');


Route::get('/web', [HomeController::class, 'web'])->name('web');
// Route::get('/webinar', [HomeController::class, 'webinar'])->name('webinar');
Route::get('/webinar', [WebinarController::class, 'showWebinars']);

Route::get('/webinar/learnmore', [HomeController::class, 'webinarLearnmore'])->name('webinar.learnmore');
Route::get('/webinar/readmore', [HomeController::class, 'webinarReadmore'])->name('webinar.readmore');
Route::get('/privacy/policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/edux-Fees', [HomeController::class, 'eduxFees'])->name('eduxfees');
Route::get('/term-and-condition', [HomeController::class, 'termAndCondition'])->name('term.and.condition');

// Route::get('/userdashboard', [UserDashController::class, 'userdashboard'])->name('userdashboard');

// google login
Route::get('auth/google', [RegisterController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [RegisterController::class, 'handleGoogleCallback']);

// facebook login

Route::get('/auth/facebook', [RegisterController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [RegisterController::class, 'handleFacebookCallback']);


Route::get('/admin/login', function () {
    return view('admin.login');
})->name('adminlogin');

Route::post('/admin/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/apply/now', [ProgramApplyNowController::class, 'store']);
Route::get('/admin/apply/program', [ProgramApplyNowController::class, 'index'])->name('admin.applynow.program');
Route::delete('/admin/apply/delete/{id}', [ProgramApplyNowController::class, 'destroy'])->name('admin.applynow.delete');

Route::middleware(['auth'])->group(function () {

    
    // Dashboard Routes
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/pages/edit_privacy', [PagesController::class, 'edit_privacy'])->name('pages.edit_privacy');
    Route::post('/admin/pages/edit_privacy/update', [PagesController::class, 'store'])->name('pages.edit_privac.storey');
    Route::get('/admin/pages/edit_term', [PagesController::class, 'edit_term'])->name('pages.edit_term');
    Route::post('/admin/pages/edit_term/update', [PagesController::class, 'storeTerm'])->name('pages.edit_term.storey');

    // Show profile (viewing the profile)
    Route::get('/admin/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('admin.profile');
    Route::get('/admin/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('profile.show');


    // Institute Routes/city list
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/edit/{id}', [CityController::class, 'edit'])->name('cities.edit');
    Route::post('/cities/update/{id}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/city/delete/{id}', [CityController::class, 'destroy'])->name('city.delete');
    Route::get('/cities/{id}', [CityController::class, 'show']);

    // Institute Routes/country list
    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
    Route::get('/countries/edit/{id}', [CountryController::class, 'edit'])->name('countries.edit');
    Route::post('/countries/update/{id}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/country/delete/{id}', [CountryController::class, 'destroy'])->name('country.delete');
    // Route::get('/admin/countries/{id}', [CountryController::class, 'show'])->name('countries.show');
    Route::get('/countries/{id}', [CountryController::class, 'show'])->name('countries.show');


    // Institute Routes/college list
    Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
    Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');
    Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');
    Route::get('/colleges/edit/{id}', [CollegeController::class, 'edit'])->name('colleges.edit');
    Route::post('/colleges/update/{id}', [CollegeController::class, 'update'])->name('colleges.update');
    Route::delete('/college/delete/{id}', [CollegeController::class, 'destroy'])->name('college.delete');
    Route::delete('/colleges/{id}', [CollegeController::class, 'destroy'])->name('colleges.destroy');
    // Route::get('/admin/colleges/{id}', [CollegeController::class, 'show'])->name('colleges.show');
    Route::get('/colleges/{id}', [CollegeController::class, 'show']);


    // Institute Routes/schools list
    Route::get('/schools', [SchoolController::class, 'index'])->name('school.index');
    Route::get('/schools/create', [SchoolController::class, 'create'])->name('schools.create');
    Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
    Route::get('/schools/edit/{id}', [SchoolController::class, 'edit'])->name('schools.edit');
    Route::post('/schools/update/{id}', [SchoolController::class, 'update'])->name('schools.update');
    Route::delete('/school/delete/{id}', [SchoolController::class, 'destroy'])->name('school.delete');
    // Route::get('/admin/schools/{id}', [SchoolController::class, 'show'])->name('schools.show');
    Route::get('/schools/{id}', [SchoolController::class, 'show']);



    // Student Routes
    Route::get('/students-list', [StudentController::class, 'index'])->name('students-list');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('/students/{id}/toggle-status', [StudentController::class, 'toggleStatus']);

    // Mentor Application
    Route::get('/admin/mentors', [MentorController::class, 'index'])->name('admin.mentors');
    Route::delete('/admin/mentors/{id}', [MentorController::class, 'destroy'])->name('mentors.destroy');

    // webinar
    Route::get('/admin/webinars', [WebinarController::class, 'index'])->name('webinars.index');
    Route::get('/admin/webinars/create', [WebinarController::class, 'create'])->name('webinars.create');
    Route::post('/admin/webinars', [WebinarController::class, 'store'])->name('webinars.store');
    Route::get('/admin/webinars/{id}/edit', [WebinarController::class, 'edit'])->name('webinars.edit');
    Route::put('/admin/webinars/{id}', [WebinarController::class, 'update'])->name('webinars.update');
    Route::delete('/admin/webinars/{id}', [WebinarController::class, 'destroy'])->name('webinars.destroy');

    // contact-info
    Route::resource('contact-infos', ContactInfoController::class);
    
    //   Role Permission
    Route::get('/roles-permission', [RolePermissionController::class, 'index'])->name('roles_permission.index');
    Route::get('/create', [RolePermissionController::class, 'create'])->name('roles_permission.create');
    Route::post('/store', [RolePermissionController::class, 'store'])->name('roles.store');
    Route::get('/roles-permission/edit/{id}', [RolePermissionController::class, 'edit'])->name('roles_permission.edit');
    Route::put('/roles/update/{id}', [RolePermissionController::class, 'update'])->name('roles.update');
    Route::delete('/roles-permission/delete/{id}', [RolePermissionController::class, 'destroy'])->name('roles_permission.destroy');


    // home page -states 
    Route::get('/stats', [StatController::class, 'index'])->name('stats.index');
    Route::get('/stats/{id}/edit', [StatController::class, 'edit'])->name('stats.edit');
    Route::put('/stats/{id}', [StatController::class, 'update'])->name('stats.update');
    Route::get('/admin/stats/create', [StatController::class, 'create'])->name('stats.create');
    Route::post('/stats', [StatController::class, 'store'])->name('stats.store'); 



    // discover_program Routes
    Route::get('/discover_program-list', [ProgramController::class, 'index'])->name('discover_program-list');
    Route::get('/discover_program', [ProgramController::class, 'index'])->name('discover_program.index');
    Route::get('/discover_program/create', [ProgramController::class, 'create'])->name('discover_program.create');
    Route::post('/discover_program', [ProgramController::class, 'store'])->name('discover_program.store');
    Route::get('/discover_program/{id}', [ProgramController::class, 'show'])->name('discover_program.show');
    Route::get('/discover_program/{program}/edit', [ProgramController::class, 'edit'])->name('discover_program.edit');
    Route::put('/discover_program/{id}', [ProgramController::class, 'update'])->name('discover_program.update');
    Route::delete('/discover_program/{discover_program}', [ProgramController::class, 'destroy'])->name('discover_program.destroy');
    // Route::post('/discover_program/{id}/toggle-status', [ProgramController::class, 'toggleStatus']);



    // Partner Routes
    Route::get('/partners-list', [PartnerController::class, 'index'])->name('partners-list');
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('partners/{id}', [PartnerController::class, 'show'])->name('partners.show');
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
    Route::post('/partners/{partner}/toggle-status', [PartnerController::class, 'toggleStatus'])->name('partners.toggle-status');

    // Enquiry Routes
    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('enquiries.show');
    Route::post('enquiries/{id}/toggle-status', [EnquiryController::class, 'toggleStatus'])->name('enquiries.toggleStatus');
    Route::delete('/enquiries/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');
    Route::get('/enquiries-list', [EnquiryController::class, 'index'])->name('enquiries-list');


    // Manage Routes
    Route::get('/manage/home', [ManageController::class, 'home'])->name('manage-home');
    Route::get('/manage/about', [ManageController::class, 'about'])->name('manage-about');
    Route::get('/manage/contact', [ManageController::class, 'contact'])->name('manage-contact');


    // Blog Routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('create-blog'); // Show create blog form
    Route::post('/blogs', [BlogController::class, 'store'])->name('store-blog'); // Store blog
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('edit-blog');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::post('/blogs/{blog}/toggle-status', [BlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    // Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');


    // Subscription Routes
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{id}', [SubscriptionController::class, 'show']);
    Route::delete('/subscriptions/{id}', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
    // In your routes/web.php, add a route to handle status updates
    Route::post('/update-status/subscription/{id}', [SubscriptionController::class, 'updateStatus'])->name('subscription.updateStatus');


    // Payment Routes
    Route::get('/payments/received', [PaymentController::class, 'received'])->name('received-payments');
    Route::get('/payments/failed', [PaymentController::class, 'failed'])->name('failed-payments');
    Route::get('/payments/setup', [PaymentController::class, 'setup'])->name('payment-setup');

    // Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');

    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/consultation_booking', [ConsultationBookController::class, 'index'])->name('consultation.booking');


    // Home Route


});


