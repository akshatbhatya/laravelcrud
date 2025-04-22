@extends("layouts.layout")
@section("content")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white">
        <div class="sidebar-header p-3 text-center border-bottom">
            <h3><i class="bi bi-speedometer2 me-2"></i>Admin Panel</h3>
        </div>
        <div class="user-info p-3 border-bottom">
            <div class="d-flex align-items-center">
                <div class="avatar bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <span>{{substr($data->name, 0, 1)}}</span>
                </div>
                <div>
                    <div class="fw-bold">{{$data->name}}</div>
                    <small class="text-white">Administrator</small>
                </div>
            </div>
        </div>
        <ul class="nav flex-column pt-3">
            <li class="nav-item">
                <a class="nav-link active text-white" href="#" id="showUsers">
                    <i class="bi bi-people-fill me-2"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" id="showDepartments">
                    <i class="bi bi-building me-2"></i> Departments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" id="showAssignments">
                    <i class="bi bi-person-badge me-2"></i> Assignments
                </a>
            </li>

        
            
            <li class="nav-item mt-5">
                <a class="nav-link text-danger" href="{{route('logout')}}">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content p-4">
        <div class="content-header d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Dashboard</h2>
            <div class="d-flex">
                <button class="btn btn-primary me-2 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-person-plus me-1"></i> Add User
                </button>
                <button class="btn btn-success rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                    <i class="bi bi-building-add me-1"></i> Add Department
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-gradient shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-primary fw-bold text-uppercase">Total Users</h6>
                                <h2 class="mb-0 fw-bold">
                                    @php
                                        use App\Models\User;
                                        $userCount = User::count();
                                        echo $userCount;
                                    @endphp
                                </h2>
                            </div>
                            <div class="icon-bg bg-primary bg-opacity-10 p-3 rounded-circle">
                                <i class="bi bi-people-fill text-primary fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-gradient shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-success fw-bold text-uppercase">Departments</h6>
                                <h2 class="mb-0 fw-bold">
                                    @php
                                        // Assuming you have a Department model
                                       
                                    @endphp
                                </h2>
                            </div>
                            <div class="icon-bg bg-success bg-opacity-10 p-3 rounded-circle">
                                <i class="bi bi-building text-success fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-gradient shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-info fw-bold text-uppercase">Assignments</h6>
                                <h2 class="mb-0 fw-bold">
                                    @php
                                        // Assuming you have a user_department table
                                       
                                    @endphp
                                </h2>
                            </div>
                            <div class="icon-bg bg-info bg-opacity-10 p-3 rounded-circle">
                                <i class="bi bi-diagram-3 text-info fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="content-section" id="usersSection">
            <!-- Users Management Section -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-light py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-people me-2"></i>User Management</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $allUsers = User::all();
                                @endphp
                                @foreach ($allUsers as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @php
                                                // Assuming you have a user_department relationship
                                                
                                            @endphp
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-url="{{route('updateuser', $user->id)}}" 
                                                    data-name="{{$user->name}}"
                                                    data-email="{{$user->email}}" 
                                                    data-id="{{$user->id}}" 
                                                    class="btn btn-sm btn-outline-primary rounded-circle"
                                                    onclick="openEditUserModal(this)" title="Edit User">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-success rounded-circle ms-1" 
                                                    onclick="openAssignDeptModal({{$user->id}}, '{{$user->name}}')" title="Assign Department">
                                                    <i class="bi bi-building"></i>
                                                </button>
                                                <a class="btn btn-sm btn-outline-danger rounded-circle ms-1" href="{{route('deleteUser', $user->id)}}"
                                                    onclick="return confirm('Are you sure you want to delete this user?')" title="Delete User">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section d-none" id="departmentsSection">
            <!-- Departments Management Section -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-light py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-building me-2"></i>Department Management</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Users Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                                    use App\Models\Department;
                                   $departments=Department::all();
                               @endphp
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{$department->id}}</td>
                                        <td><span class="fw-bold text-success">{{$department->departmentname}}</span></td>
                                        <td>
                                            {{-- @php
                                                $userCount = DB::table('user_department')
                                                    ->where('department_id', $department->id)
                                                    ->count();
                                                echo '<span class="badge bg-primary rounded-pill">'.$userCount.' users</span>';
                                            @endphp --}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-id="{{$department->id}}"
                                                    data-name="{{$department->departmentname}}"
                                                    
                                                    class="btn btn-sm btn-outline-primary rounded-circle"
                                                    onclick="openEditDeptModal(this)" title="Edit Department">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <a class="btn btn-sm btn-outline-danger rounded-circle ms-1" href="#"
                                                    onclick="confirmDeleteDept({{$department->id}})" title="Delete Department">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section d-none" id="assignmentsSection">
            <!-- User-Department Assignments Section -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-light py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-diagram-3 me-2"></i>Department Assignments</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>User</th>
                                    <th>Department</th>
                                    <th>Assigned Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    // Join users, departments and assignments
                                    $assignments = DB::table('users')
                                        ->join('user_department', 'users.id', '=', 'user_department.user_id')
                                        ->join('departments', 'departments.id', '=', 'user_department.department_id')
                                        ->select('users.name as user_name', 'users.id as user_id', 
                                                'departments.name as dept_name', 'departments.id as dept_id',
                                                'user_department.created_at')
                                        ->get() ?? [];
                                @endphp --}}
                                {{-- @foreach ($assignments as $assignment)
                                    <tr>
                                        <td><span class="fw-bold">{{$assignment->user_name}}</span></td>
                                        <td><span class="badge bg-success rounded-pill">{{$assignment->dept_name}}</span></td>
                                        <td>{{date('Y-m-d', strtotime($assignment->created_at))}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger rounded-pill"
                                                onclick="removeAssignment({{$assignment->user_id}}, {{$assignment->dept_id}})">
                                                <i class="bi bi-x-circle me-1"></i> Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-person-plus me-2"></i>Add New User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('adduser')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department (Optional)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <select name="department_id" class="form-select">
                                <option value="">Select Department</option>
                                @php
                                    $departments = DB::table('departments')->get() ?? [];
                                @endphp
                                 @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->departmentname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="bi bi-person-gear me-2"></i>Edit User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateUserForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" id="edit_name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="edit_email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-lg me-1"></i>Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="bi bi-building-add me-2"></i>Add New Department</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route("createdepartment")}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dept_name" class="form-label">Department Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" name="departmentname" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Add Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Department Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-building-gear me-2"></i>Edit Department</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateDeptForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_dept_name" class="form-label">Department Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" id="edit_dept_name" name="name" class="form-control" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Update Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Assign Department Modal -->
<div class="modal fade" id="assignDeptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title"><i class="bi bi-diagram-3 me-2"></i>Assign Department</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route("assigndepartment")}}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="assign_user_id" name="userid">
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Assigning department for: <strong id="assign_user_name"></strong>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="departmentid" class="form-label">Select Department</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <select name="departmentid" class="form-select" required>
                                <option value="">Choose Department</option>
                                @php
                                    $departments = DB::table('departments')->get() ?? [];
                                @endphp
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->departmentname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info text-white"><i class="bi bi-link me-1"></i>Assign Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        display: flex;
        min-height: 100vh;
    }
    
    .sidebar {
        width: 250px;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 100;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    
    .main-content {
        flex: 1;
        margin-left: 250px;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
        min-height: 100vh;
    }
    
    .nav-link {
        padding: 0.8rem 1rem;
        border-radius: 8px;
        margin: 0 0.5rem 0.5rem 0.5rem;
        transition: all 0.2s ease;
    }
    
    .nav-link:hover {
        background-color: rgba(255,255,255,0.1);
        transform: translateX(5px);
    }
    
    .nav-link.active {
        background-color: rgba(255,255,255,0.2);
        border-left: 4px solid white;
    }
    
    .card {
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: none;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    .btn-group .btn {
        margin: 0 2px;
    }
    
    .table {
        vertical-align: middle;
    }
    
    .icon-bg {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    
    .table tbody tr {
        transition: all 0.2s ease;
    }
    
    .table tbody tr:hover {
        background-color: rgba(0,0,0,0.02);
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(0,123,255,.25);
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.8em;
    }
    
    @media (max-width: 768px) {
        .sidebar {
            width: 70px;
        }
        
        .main-content {
            margin-left: 70px;
        }
        
        .sidebar .sidebar-header h3,
        .sidebar .user-info .fw-bold,
        .sidebar .user-info small,
        .sidebar .nav-link span {
            display: none;
        }
        
        .sidebar .nav-link {
            text-align: center;
            padding: 0.8rem 0;
        }
        
        .sidebar .nav-link i {
            margin: 0 !important;
            font-size: 1.25rem;
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showUsers = document.getElementById('showUsers');
        const showDepartments = document.getElementById('showDepartments');
        const showAssignments = document.getElementById('showAssignments');

        const sections = {
            users: document.getElementById('usersSection'),
            departments: document.getElementById('departmentsSection'),
            assignments: document.getElementById('assignmentsSection')
        };

        function showSection(section) {
            for (const key in sections) {
                sections[key].classList.add('d-none');
            }
            sections[section].classList.remove('d-none');
        }

        showUsers.addEventListener('click', function() {
            showSection('users');
            showUsers.classList.add('active');
            showDepartments.classList.remove('active');
            showAssignments.classList.remove('active');
        });

        showDepartments.addEventListener('click', function() {
            showSection('departments');
            showDepartments.classList.add('active');
            showUsers.classList.remove('active');
            showAssignments.classList.remove('active');
        });

        showAssignments.addEventListener('click', function() {
            showSection('assignments');
            showAssignments.classList.add('active');
            showUsers.classList.remove('active');
            showDepartments.classList.remove('active');
        });
    });
</script>
<script>
    
    // Function to open Edit User Modal
    function openEditUserModal(element) {
        const modal = document.getElementById('editUserModal');
        const form = document.getElementById('updateUserForm');
        
        // Set form action
        form.setAttribute('action', element.dataset.url);
        
        // Fill in form fields
        document.getElementById('edit_name').value = element.dataset.name;
        document.getElementById('edit_email').value = element.dataset.email;
        
        // Show modal
        const bsModal = new bootstrap.Modal(modal);
        bsModal.show();
    }
    
    // Function to open Edit Department Modal
    function openEditDeptModal(element) {
        const modal = document.getElementById('editDepartmentModal');
        const form = document.getElementById('updateDeptForm');
        
        // Set form action (assuming you have a route like 'updatedepartment/{id}')
        form.setAttribute('action', '/dashboard/updatedepartment/' + element.dataset.id);
        
        // Fill in form fields
        document.getElementById('edit_dept_name').value = element.dataset.name;
        
        
        // Show modal
        const bsModal = new bootstrap.Modal(modal);
        bsModal.show();
    }
    
    // Function to open Assign Department Modal
    function openAssignDeptModal(userId, userName) {
        const modal = document.getElementById('assignDeptModal');
        
        // Set user ID and name
        document.getElementById('assign_user_id').value = userId;
        document.getElementById('assign_user_name').textContent = userName;
        
        // Show modal
        const bsModal = new bootstrap.Modal(modal);
        bsModal.show();
    }
</script>
@endsection