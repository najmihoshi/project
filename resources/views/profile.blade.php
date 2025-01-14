<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        .container {
            min-height: 100vh; /* Ensures the container takes at least the full height of the viewport */
            flex-direction: column; /* Keeps the content flowing vertically */
            justify-content: flex-start; /* Ensures the content stays at the top unless centered */
            padding: 20px;
            background: linear-gradient(to bottom right,rgb(180, 187, 219),rgb(88, 135, 150));
        }


        .container .card {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            
        }

        .profile-detail {
            font-size: 18px;
            color: #333;
        }

        .lodge-report {
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }

        .lodge-report div {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .lodge-report div:hover {
            background-color: #388e3c;
            transform: translateY(-5px);
        }

        .report-title {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
            margin-top: 30px;
        }

        .report-list {
            list-style: none;
            padding: 0;
        }

        .report-item {
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 0;
        }

        .report-item-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-detail {
            font-size: 16px;
            color: #333;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-button, .delete-button {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .edit-button {
            background-color: #3b82f6;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .edit-button:hover {
            background-color: #2563eb;
            transform: translateY(-3px);
        }

        .delete-button {
            background-color: #ef4444;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .delete-button:hover {
            background-color: #dc2626;
            transform: translateY(-3px);
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
        }
    </style>

    <div class="container">
        <div class="card">
            <p class="profile-detail"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="profile-detail"><strong>Matric Number:</strong> {{ $user->matric_no }}</p>

            <!-- Lodge Report Button -->
            <a href="{{ route('reports.create') }}" class="lodge-report">
                <div>Lodge a Report</div>
            </a>

            <h2 class="report-title">Your Reports</h2>
            <ul class="report-list">
                @foreach($reports as $report)
                    <li class="report-item">
                        <div class="report-item-content">
                            <div>
                                <p class="report-detail"><strong>Type of Issue:</strong> {{ $report->issue_type }}</p>
                                <p class="report-detail"><strong>Status:</strong> {{ $report->status }}</p>
                                <p class="report-detail"><strong>Description:</strong> {{ $report->description }}</p>
                            </div>
                            <div class="action-buttons">
                                <!-- Edit Button -->
                                <a href="{{ route('reports.edit', $report->id) }}" class="edit-button">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
