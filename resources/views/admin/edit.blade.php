<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report') }}
        </h2>
    </x-slot>

    <style>
        .container {
            padding: 20px;
            min-height: 100vh; /* Ensures the container takes at least the full height of the viewport */
            flex-direction: column; /* Keeps the content flowing vertically */
            justify-content: flex-start; /* Ensures the content stays at the top unless centered */
            padding: 20px;
            background: linear-gradient(to bottom right,rgb(180, 187, 219),rgb(88, 135, 150));
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .discard-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6b7280;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            outline: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .discard-button:hover {
            background-color: #4b5563;
            transform: translateY(-2px);
        }

        .discard-button:focus {
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.5);
        }

        .discard-button:active {
            transform: translateY(0);
        }

        .save-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            outline: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .save-button:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        .save-button:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }

        .save-button:active {
            transform: translateY(0);
        }
    </style>

    <div class="py-12 container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 form-container">
                    <form action="{{ route('admin.reports.update', $report->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="mahallah">Mahallah</label>
                            <select name="mahallah" id="mahallah" class="form-control" >
                                <option value="Ali" {{ $report->mahallah == 'Ali' ? 'selected' : '' }}>Ali</option>
                                <option value="Siddiq" {{ $report->mahallah == 'Siddiq' ? 'selected' : '' }}>Siddiq</option>
                                <option value="Faruq" {{ $report->mahallah == 'Faruq' ? 'selected' : '' }}>Faruq</option>
                                <option value="Uthman" {{ $report->mahallah == 'Uthman' ? 'selected' : '' }}>Uthman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="block">Block</label>
                            <input type="text" name="block" id="block" value="{{ $report->block }}" >
                        </div>

                        <div class="form-group">
                            <label for="compartment">Compartment</label>
                            <input type="text" name="compartment" id="compartment" value="{{ $report->compartment }}">
                        </div>

                        <div class="form-group">
                            <label for="issue_type">Type of Issue</label>
                            <input type="text" name="issue_type" id="issue_type" value="{{ $report->issue_type }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description">{{ $report->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $report->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Resolved" {{ $report->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>

                        <div class="button-container">
                            <a href="{{ route('admin') }}" class="discard-button">Discard</a>
                            <button type="submit" class="save-button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
