<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .container {
            min-height: 100vh; /* Ensures the container takes at least the full height of the viewport */
            flex-direction: column; /* Keeps the content flowing vertically */
            justify-content: flex-start; /* Ensures the content stays at the top unless centered */
            padding: 3rem 0;
            background: linear-gradient(to bottom right,rgb(180, 187, 219),rgb(88, 135, 150));
        }

        .card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown {
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            width: 100px;
        }

        .table-container {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .table {
            min-width: 100%;
            background-color: white;
            border: 1px solid #d1d5db;
            border-collapse: collapse;
        }

        .table th {
            background-color: #f3f4f6;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            text-align: center;
        }

        .table td {
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            text-align: left;
        }

        .table img {
            width: 4rem;
            height: 4rem;
            object-fit: cover;
            border-radius: 4px;
        }

        

        .action-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;    
        }

        .action-button.edit {
            background-color: #3b82f6;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .action-button.edit:hover {
            background-color: #2563eb;
            transform: translateY(-3px);
        }

        .action-button.delete {
            background-color: #ef4444;
        }

        .action-button.delete:hover {
            background-color: #dc2626;

        }

        .delete-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border-radius: 6px;
            color: white;
            background-color: #ef4444;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .delete-button:hover {
            background-color: #dc2626;
            transform: translateY(-3px);
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1f2937;
        }
    </style>

    <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="p-6">
                    <!-- Mahallah Dropdown -->
                    <form method="GET">
                        <select name="mahallah" onchange="this.form.submit()" class="dropdown">
                            <option value="Ali" {{ $mahallah == 'Ali' ? 'selected' : '' }}>Ali</option>
                            <option value="Siddiq" {{ $mahallah == 'Siddiq' ? 'selected' : '' }}>Siddiq</option>
                            <option value="Faruq" {{ $mahallah == 'Faruq' ? 'selected' : '' }}>Faruq</option>
                            <option value="Uthman" {{ $mahallah == 'Uthman' ? 'selected' : '' }}>Uthman</option>
                        </select>
                    </form>
                
                    <!-- Centered Reports Table -->
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Matric Number</th>
                                    <th>Type of Issue</th>
                                    <th>Description</th>
                                    <th>Block</th>
                                    <th>Status</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->user?->matric_no ?? 'N/A' }}</td>
                                        <td>{{ $report->issue_type }}</td>
                                        <td>{{ $report->description }}</td>
                                        <td>{{ $report->block }}</td>
                                        <td>{{ $report->status }}</td>
                                        <td>
                                            @if ($report->image_path)
                                                <a href="{{ asset('storage/' . $report->image_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $report->image_path) }}" alt="Proof">
                                                </a>
                                            @else
                                                No photo
                                            @endif
                                        </td>
                                        <td class= "button">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.reports.edit', $report->id) }}" class="action-button edit">
                                                Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this report?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
