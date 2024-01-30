<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GovernmentInstitutionController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\RepositoryDocumentController;
use App\Http\Controllers\AnnualWorkPlanController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\FundingController;
use App\Http\Controllers\ProgramController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class, 'showLoginPage']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/government_institutions', [GovernmentInstitutionController::class, 'index'])->name('government_institutions.index');
Route::get('/government_institutions/{government_institution}', [GovernmentInstitutionController::class, 'show'])->name('government_institutions.show');
Route::get('/government_institutions/create', [GovernmentInstitutionController::class, 'create'])->name('government_institutions.create');
Route::post('/government_institutions', [GovernmentInstitutionController::class, 'store'])->name('government_institutions.store');
Route::get('/government_institutions/{government_institution}/edit', [GovernmentInstitutionController::class, 'edit'])->name('government_institutions.edit');
Route::put('/government_institutions/{government_institution}', [GovernmentInstitutionController::class, 'update'])->name('government_institutions.update');
Route::delete('/government_institutions/{government_institution}', [GovernmentInstitutionController::class, 'destroy'])->name('government_institutions.destroy');

Route::get('/government_institutions/{governmentInstitutionId}/annual_work_plans', [AnnualWorkPlanController::class, 'index'])->name('annual_work_plans.index');
Route::get('/annual_work_plans/{id}', [AnnualWorkPlanController::class, 'show'])->name('annual_work_plans.show');
Route::get('/government_institutions/{governmentInstitutionId}/annual_work_plans/create', [AnnualWorkPlanController::class, 'create'])->name('annual_work_plans.create');
Route::post('/government_institutions/{governmentInstitutionId}/annual_work_plans', [AnnualWorkPlanController::class, 'store'])->name('annual_work_plans.store');
Route::get('/annual_work_plans/{id}/edit', [AnnualWorkPlanController::class, 'edit'])->name('annual_work_plans.edit');
Route::put('/annual_work_plans/{id}', [AnnualWorkPlanController::class, 'update'])->name('annual_work_plans.update');
Route::delete('/annual_work_plans/{id}', [AnnualWorkPlanController::class, 'destroy'])->name('annual_work_plans.destroy');

// Hr functionality has to be done well
Route::get('/government-institutions/{governmentInstitution}/hr', [HrController::class, 'index'])->name('hr.index');
Route::get('/hr/{hrPersonnel}', [HrController::class, 'show'])->name('hr.show');
Route::get('/government-institutions/{governmentInstitution}/hr/create', [HrController::class, 'create'])->name('hr.create');
Route::post('/government-institutions/{governmentInstitution}/hr', [HrController::class, 'store'])->name('hr.store');
Route::get('/hr/{hrPersonnel}/edit', [HrController::class, 'edit'])->name('hr.edit');
Route::put('/hr/{hrPersonnel}', [HrController::class, 'update'])->name('hr.update');
Route::delete('/hr/{hrPersonnel}', [HrController::class, 'destroy'])->name('hr.destroy');

Route::get('/government-institutions/{governmentInstitution}/boards', [BoardController::class, 'index'])->name('boards.index');
Route::get('/boards/{boardMember}', [BoardController::class, 'show'])->name('boards.show');
Route::get('/government-institutions/{governmentInstitution}/boards/create', [BoardController::class, 'create'])->name('boards.create');
Route::post('/government-institutions/{governmentInstitution}/boards', [BoardController::class, 'store'])->name('boards.store');
Route::get('/boards/{boardMember}/edit', [BoardController::class, 'edit'])->name('boards.edit');
Route::put('/boards/{boardMember}', [BoardController::class, 'update'])->name('boards.update');
Route::delete('/boards/{boardMember}', [BoardController::class, 'destroy'])->name('boards.destroy');

Route::get('/government-institutions/{governmentInstitution}/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/government-institutions/{governmentInstitution}/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/government-institutions/{governmentInstitution}/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/{project}/funding', [FundingController::class, 'index'])->name('funding.index');
Route::get('/funding/{funding}', [FundingController::class, 'show'])->name('funding.show');
Route::get('/projects/{project}/funding/create', [FundingController::class, 'create'])->name('funding.create');
Route::post('/projects/{project}/funding', [FundingController::class, 'store'])->name('funding.store');
Route::get('/funding/{funding}/edit', [FundingController::class, 'edit'])->name('funding.edit');
Route::put('/funding/{funding}', [FundingController::class, 'update'])->name('funding.update');
Route::delete('/funding/{funding}', [FundingController::class, 'destroy'])->name('funding.destroy');

Route::get('/government_institutions/{governmentInstitution}/repositories', [RepositoryController::class, 'index'])->name('repositories.index');
Route::get('/government_institutions/{governmentInstitution}/repositories/create', [RepositoryController::class, 'create'])->name('repositories.create');
Route::post('/government_institutions/{governmentInstitution}/repositories', [RepositoryController::class, 'store'])->name('repositories.store');
Route::get('/repositories/{repository}', [RepositoryController::class, 'show'])->name('repositories.show');
Route::get('/repositories/{repository}/edit', [RepositoryController::class, 'edit'])->name('repositories.edit');
Route::put('/repositories/{repository}', [RepositoryController::class, 'update'])->name('repositories.update');
Route::delete('/repositories/{repository}', [RepositoryController::class, 'destroy'])->name('repositories.destroy');

//these routes have to be redone
Route::get('/repositories/{repository}/documents', [RepositoryDocumentController::class, 'index'])->name('repository_documents.index');
Route::get('/repositories/{repository}/documents/create', [RepositoryDocumentController::class, 'create'])->name('repository_documents.create');
Route::post('/repositories/{repository}/documents', [RepositoryDocumentController::class, 'store'])->name('repository_documents.store');
Route::get('/repository_documents/{document}', [RepositoryDocumentController::class, 'show'])->name('repository_documents.show');
Route::get('/repository_documents/{document}/edit', [RepositoryDocumentController::class, 'edit'])->name('repository_documents.edit');
Route::put('/repository_documents/{document}', [RepositoryDocumentController::class, 'update'])->name('repository_documents.update');
Route::delete('/repository_documents/{document}', [RepositoryDocumentController::class, 'destroy'])->name('repository_documents.destroy');

Route::get('/government_institutions/{governmentInstitution}/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/government_institutions/{governmentInstitution}/programs/create', [ProgramController::class, 'create'])->name('programs.create');
Route::post('/government_institutions/{governmentInstitution}/programs', [ProgramController::class, 'store'])->name('programs.store');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
