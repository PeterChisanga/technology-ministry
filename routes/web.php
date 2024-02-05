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
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MandateController;
use App\Http\Controllers\ProductionUnityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ItemController;

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

// Route::get('/login',[AuthController::class, 'showLoginPage']);
// Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/government-institutions', [GovernmentInstitutionController::class, 'index'])->name('government-institutions.index');
Route::get('/government-institutions/create', [GovernmentInstitutionController::class, 'create'])->name('government-institutions.create');
Route::post('/government-institutions/store', [GovernmentInstitutionController::class, 'store'])->name('government-institutions.store');
Route::get('/government-institutions/{government_institution}/edit', [GovernmentInstitutionController::class, 'edit'])->name('government-institutions.edit');
Route::get('/government-institutions/{government_institution}', [GovernmentInstitutionController::class, 'show'])->name('government-institutions.show');
Route::put('/government-institutions/{government_institution}', [GovernmentInstitutionController::class, 'update'])->name('government-institutions.update');
Route::delete('/government-institutions/{government_institution}', [GovernmentInstitutionController::class, 'destroy'])->name('government-institutions.destroy');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

Route::get('/departments/{department}/procurements', [ProcurementController::class, 'index'])->name('procurements.index');
Route::get('/departments/{department}/procurements/create', [ProcurementController::class, 'create'])->name('procurements.create');
Route::post('/departments/{department}/procurements', [ProcurementController::class, 'store'])->name('procurements.store');
Route::get('/procurements/{procurement}', [ProcurementController::class, 'show'])->name('procurements.show');
Route::get('/procurements/{procurement}/edit', [ProcurementController::class, 'edit'])->name('procurements.edit');
Route::put('/procurements/{procurement}', [ProcurementController::class, 'update'])->name('procurements.update');
Route::delete('/procurements/{procurement}', [ProcurementController::class, 'destroy'])->name('procurements.destroy');

Route::get('/procurements/{procurement}/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/procurements/{procurement}/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

Route::get('/government-institutions/{governmentInstitution}/annual-work-plans', [AnnualWorkPlanController::class, 'index'])->name('annual_work_plans.index');
Route::get('/annual-work-plans/{annual_work_plan}', [AnnualWorkPlanController::class, 'show'])->name('annual_work_plans.show');
Route::get('/government-institutions/{governmentInstitution}/annual-work-plans/create', [AnnualWorkPlanController::class, 'create'])->name('annual_work_plans.create');
Route::post('/government-institutions/{governmentInstitution}/annual-work-plans', [AnnualWorkPlanController::class, 'store'])->name('annual_work_plans.store');
Route::get('/annual-work-plans/{annual_work_plan}/edit', [AnnualWorkPlanController::class, 'edit'])->name('annual_work_plans.edit');
Route::put('/annual-work-plans/{annual_work_plan}', [AnnualWorkPlanController::class, 'update'])->name('annual_work_plans.update');
Route::delete('/annual_work_plans/{annual_work_plan}', [AnnualWorkPlanController::class, 'destroy'])->name('annual_work_plans.destroy');

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

Route::get('/government-institutions/{governmentInstitution}/repositories', [RepositoryController::class, 'index'])->name('repositories.index');
Route::get('/government-institutions/{governmentInstitution}/repositories/create', [RepositoryController::class, 'create'])->name('repositories.create');
Route::post('/government-institutions/{governmentInstitution}/repositories', [RepositoryController::class, 'store'])->name('repositories.store');
Route::get('/repositories/{repository}', [RepositoryController::class, 'show'])->name('repositories.show');
Route::get('/repositories/{repository}/edit', [RepositoryController::class, 'edit'])->name('repositories.edit');
Route::put('/repositories/{repository}', [RepositoryController::class, 'update'])->name('repositories.update');
Route::delete('/repositories/{repository}', [RepositoryController::class, 'destroy'])->name('repositories.destroy');

//these routes have to be redone
Route::get('/repositories/{repository}/documents', [RepositoryDocumentController::class, 'index'])->name('repository-documents.index');
Route::get('/repositories/{repository}/documents/create', [RepositoryDocumentController::class, 'create'])->name('repository-documents.create');
Route::post('/repositories/{repository}/documents', [RepositoryDocumentController::class, 'store'])->name('repository-documents.store');
Route::get('/repository-documents/{document}', [RepositoryDocumentController::class, 'show'])->name('repository-documents.show');
Route::get('/repository-documents/{document}/edit', [RepositoryDocumentController::class, 'edit'])->name('repository-documents.edit');
Route::put('/repository-documents/{document}', [RepositoryDocumentController::class, 'update'])->name('repository-documents.update');
Route::delete('/repository-documents/{document}', [RepositoryDocumentController::class, 'destroy'])->name('repository-documents.destroy');

Route::get('/government-institutions/{governmentInstitution}/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/government-institutions/{governmentInstitution}/programs/create', [ProgramController::class, 'create'])->name('programs.create');
Route::post('/government-institutions/{governmentInstitution}/programs', [ProgramController::class, 'store'])->name('programs.store');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');

Route::get('/government-institutions/{governmentInstitution}/productionunities', [ProductionUnityController::class, 'index'])->name('productionunities.index');
Route::get('/government-institutions/{governmentInstitution}/productionunities/create', [ProductionUnityController::class, 'create'])->name('productionunities.create');
Route::post('/government-institutions/{governmentInstitution}/productionunities', [ProductionUnityController::class, 'store'])->name('productionunities.store');
Route::get('/productionunities/{productionunity}', [ProductionUnityController::class, 'show'])->name('productionunities.show');
Route::get('/productionunities/{productionunity}/edit', [ProductionUnityController::class, 'edit'])->name('productionunities.edit');
Route::put('/productionunities/{productionunity}', [ProductionUnityController::class, 'update'])->name('productionunities.update');
Route::delete('/productionunities/{productionunity}', [ProductionUnityController::class, 'destroy'])->name('productionunities.destroy');

Route::get('/mandates', [MandateController::class, 'index'])->name('mandates.index');
Route::get('/mandates/{mandate}', [MandateController::class, 'show'])->name('mandates.show');
Route::get('/mandates/create', [MandateController::class, 'create'])->name('mandates.create');
Route::post('/mandates', [MandateController::class, 'store'])->name('mandates.store');
Route::get('/mandates/{mandate}/edit', [MandateController::class, 'edit'])->name('mandates.edit');
Route::put('/mandates/{mandate}', [MandateController::class, 'update'])->name('mandates.update');
Route::delete('/mandates/{mandate}', [MandateController::class, 'destroy'])->name('mandates.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// Authentication routes
Route::get('/login', function () {
    return view('users.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
