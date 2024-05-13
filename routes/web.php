<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Indexpage;
use App\Livewire\Landingpage\Openingjobs\Donesubmit;
use App\Livewire\Landingpage\Openingjobs\Jobs;
use App\Livewire\Landingpage\Openingjobs\Jobdetails;
use App\Livewire\Panels\Auth\Login;
use App\Livewire\Panels\Auth\Logout;
use App\Livewire\Panels\Home\Index AS PanelIndex;
use App\Livewire\Panels\Applicants\Index AS ApplicantsIndex;
use App\Livewire\Panels\Applicants\Filter AS ApplicantsFilter;
use App\Livewire\Panels\Applicants\Details AS ApplicantsDetails;
use App\Livewire\Panels\Vacancy\Jobs as VacancyJobsIndex;
use App\Livewire\Panels\Vacancy\Jobdetails as VacancyJobDetailsIndex;
use App\Livewire\Panels\Vacancy\Jobcreate as VacancyJobCreate;
use App\Livewire\Panels\System\Log as ViewLog;
use App\Livewire\Panels\System\Schedulerlog as ViewSchedulerLog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Indexpage::class)->name('indexPage');
Route::get('/jobs', Jobs::class)->name('jobsPage');
Route::get('/jobs/{jobId}', Jobdetails::class)->name('jobDetailsPage');
Route::get('/jobs/application/done', Donesubmit::class)->name('doneSubmitJobApplicationPage');

Route::get('/panels/login', Login::class)->name('panelLoginPage');
Route::get('/panels/logout', Logout::class)->name('panelLogoutPage');
Route::get('/panels/dashboard', PanelIndex::class)->name('panelDashboardPage');
Route::get('/panels/applicants', ApplicantsIndex::class)->name('panelApplicantsIndexPage');
Route::get('/panels/applicants/filter/{status}', ApplicantsFilter::class)->name('panelApplicantsFilterPage');
Route::get('/panels/applicant/{applicantId}', ApplicantsDetails::class)->name('panelApplicantsDetailsPage');
Route::get('/panels/jobs', VacancyJobsIndex::class)->name('panelVacancyJobsIndexPage');
Route::get('/panels/job/{jobId}', VacancyJobDetailsIndex::class)->name('panelVacancyJobDetailsPage');
Route::get('/panels/jobs/create', VacancyJobCreate::class)->name('panelVacancyJobCreatePage');
Route::get('/panels/system/logs', ViewLog::class)->name('panelSystemLogViewerPage');
Route::get('/panels/system/scheduler-logs', ViewSchedulerLog::class)->name('panelSchedulerLogViewerPage');
