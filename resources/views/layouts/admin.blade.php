<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <!-- Custom Styles -->
    <style>
        .sidebar {
            min-height: 100vh;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            overflow-y: auto;
            height: calc(100vh - 56px);
        }
    </style>
</head>
<body class="bg-light">

    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar bg-dark text-white p-3">
            <h4 class="text-center py-3">PMS Admin</h4>
            <ul class="nav flex-column">
    <!-- Masters Section -->
    <li class="nav-item">
        <a href="#mastersMenu" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="mastersMenu">
            <i class="fas fa-tools me-2"></i>Masters
        </a>
        <ul class="collapse ms-3" id="mastersMenu">
            <li class="nav-item">
                <a href="{{ route('admin.floors.index') }}" class="nav-link"><i class="fas fa-building me-2"></i>Manage Floors</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.room-types.index') }}" class="nav-link"><i class="fas fa-bed me-2"></i>Room Types</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.rate-types.index') }}" class="nav-link"><i class="fas fa-percentage me-2"></i>Rate Types</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.room-tariffs.index') }}" class="nav-link"><i class="fas fa-money-bill me-2"></i>Room Tariffs</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.taxes.index') }}" class="nav-link"><i class="fas fa-file-invoice-dollar me-2"></i>Taxes</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.room-amenities.index') }}" class="nav-link"><i class="fas fa-couch me-2"></i>Room Amenities</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.rooms.index') }}" class="nav-link"><i class="fas fa-couch me-2"></i>Rooms</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settlement-types.index') }}" class="nav-link"><i class="fas fa-credit-card me-2"></i>Settlement Type</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.extra-charges.index') }}" class="nav-link"><i class="fas fa-wallet me-2"></i>Extra Charges</a>
            </li>
        </ul>
    </li>

    <!-- Reservations Section -->
    <li class="nav-item">
        <a href="#reservationsMenu" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reservationsMenu">
            <i class="fas fa-calendar-alt me-2"></i>Reservations
        </a>
        <ul class="collapse ms-3" id="reservationsMenu">
            <li class="nav-item">
                <a href="{{ route('admin.reservations.create') }}" class="nav-link"><i class="fas fa-plus-circle me-2"></i>Create Reservation</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reservations.index') }}" class="nav-link"><i class="fas fa-list me-2"></i>Reservation List</a>
            </li>
        </ul>
    </li>

    <!-- Logout -->
    <li class="nav-item mt-3">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
        </form>
    </li>
</ul>

        </nav>

        <!-- Main Content -->
        <div class="flex-fill">
            <!-- Top Navbar -->
            <nav class="navbar navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Admin Panel</span>
                    <button class="btn btn-outline-secondary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="content p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>
