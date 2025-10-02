<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8fafc;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        /* .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
        } */

        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.2);
            /* border-left: 4px solid #3b82f6; */
            border-right: 4px solid #3b82f6;
        }
         .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .table-row:hover {
            background-color: #f8fafc;
        }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }
         </style>
        </head>
  <body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-white shadow-md flex-shrink-0">
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-book text-blue-500 text-2xl"></i>
                    <h1 class="text-xl font-bold text-gray-800">Library<span class="text-blue-500">Admin</span></h1>
                </div>
            </div>

            <div class="p-4">
                <div class="space-y-1">
                    <div class="sidebar-item flex items-center space-x-3 p-3 rounded-lg cursor-pointer" onclick="showSection('dashboard')">
                        <i class="fas fa-tachometer-alt text-blue-500"></i>
                        <span>Dashboard</span>
                    </div>

                    <div class="sidebar-item flex items-center space-x-3 p-3 rounded-lg cursor-pointer" onclick="showSection('books')">
                        <i class="fas fa-book text-gray-500"></i>
                        <span>Books Management</span>
                    </div>

                    <div class="sidebar-item flex items-center space-x-3 p-3 rounded-lg cursor-pointer" onclick="showSection('members')">
                        <i class="fas fa-users text-gray-500"></i>
                        <span>Members Management</span>
                    </div>

                    <div class="sidebar-item flex items-center space-x-3 p-3 rounded-lg cursor-pointer" onclick="showSection('borrow')">
                        <i class="fas fa-exchange-alt text-gray-500"></i>
                        <span>Borrow/Return</span>
                    </div>

                    {{-- <div class="sidebar-item flex items-center space-x-3 p-3 rounded-lg cursor-pointer" onclick="showSection('reports')">
                        <i class="fas fa-chart-bar text-gray-500"></i>
                        <span>Reports</span>
                    </div> --}}
                </div>


            </div>

            <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
                <div class="flex items-center space-x-3">
                    <div>
                        <p class="text-sm font-medium">{{Auth::user()->name}}</p>
                        <p class="text-xs text-gray-500">
                            <strong>{{Auth::user()->status}}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
            @yield('menu')
            @yield('content')
        <script src="{{ asset('frontend/main.js')}}"></script>
</html>
