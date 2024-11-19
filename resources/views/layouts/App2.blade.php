<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <!-- Link to Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert2 for Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* Custom styles for navbar */
        body {
            font-family: 'Roboto', sans-serif;
            background: #f8fafc;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background: linear-gradient(145deg, #34d399, #10b981);
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            transition: all 0.3s ease;
            box-shadow: 4px 0px 15px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .sidebar a {
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s ease-in-out;
            border-radius: 8px;
            z-index: 9999;
        }

        .sidebar a:hover {
            background-color: #16a34a;
            transform: translateX(10px);
            z-index: 9999;
        }

        .sidebar i {
            font-size: 20px;
            margin-right: 10px;
            z-index: 9999;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(145deg, #0d4c4c, #2b6e6e); /* Gradient navbar */
            color: white;
            position: fixed;
            width: 100%;
            z-index: 999;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            padding: 8px 20px;
        }

        .navbar a {
            color: white;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            font-size: 18px;
            transition: color 0.3s, transform 0.3s ease-in-out;
        }

        .navbar a:hover {
            color: #34d399; /* Accent green for hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        .navbar i {
            font-size: 20px;
            margin-right: 8px;
        }

        .main-content {
            margin-left: 250px;
            padding-top: 80px;
            padding: 30px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: #10b981;
            color: white;
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card-body {
            padding: 20px;
            font-size: 16px;
            color: #333;
            text-align: justify;
        }

        .btn {
            background: #34d399;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease, transform 0.3s ease-in-out;
        }

        .btn:hover {
            background: #16a34a;
            transform: translateY(-2px);
        }

        .icon-btn {
            font-size: 22px;
            margin-right: 10px;
        }

        /* Dashboard Stats Layout */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .stats-card .title {
            font-size: 1.25rem;
            font-weight: 500;
            color: #333;
        }

        .stats-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #10b981;
        }

        /* Modal Styling */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="p-6 text-center">
        <h3 class="text-white text-2xl font-semibold">Admin Panel</h3>
    </div>
    <a href="{{url('/admin')}}"><i class="fas fa-tachometer-alt icon-btn"></i> Dashboard</a>
    <a href="{{url('/artikel_admin')}}"><i class="fas fa-newspaper icon-btn"></i> Kelola Artikel</a>
    <a href="{{ url('/titik_admin') }}"><i class="fas fa-map-marker-alt icon-btn"></i> Kelola Titik Pembuangan</a>

</div>

<!-- Navbar -->
<nav class="navbar shadow-md p-4 flex items-center justify-between">
    <a href="{{url('/Admin')}}" class="text-white text-2xl flex items-center">
        <i class="fas fa-cogs mr-2"></i> BersihBumi Admin
    </a>
    <div class="flex space-x-6">
        <a href="{{ url('/') }}" class="text-white flex items-center">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
    </div>
</nav>

<!-- content -->
@yield('content')

</body>
</html>