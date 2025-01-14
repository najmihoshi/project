<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Edit Report') }}
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

        .card {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .discard-button {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #6b7280;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
        }

        .save-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
        }
    </style>

    <div class = "container">
        <div class="card">
            <form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="mahallah">Mahallah</label>
                    <select name="mahallah" id="mahallah">
                        <option value="Ali" {{ $report->mahallah == 'Ali' ? 'selected' : '' }}>Ali</option>
                        <option value="Siddiq" {{ $report->mahallah == 'Siddiq' ? 'selected' : '' }}>Siddiq</option>
                        <option value="Faruq" {{ $report->mahallah == 'Faruq' ? 'selected' : '' }}>Faruq</option>
                        <option value="Uthman" {{ $report->mahallah == 'Uthman' ? 'selected' : '' }}>Uthman</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="block">Block</label>
                    <input type="text" name="block" id="block" value="{{ $report->block }}">
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
                    <label for="image">Add Picture</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="action-buttons">
                    <a href="{{ route('profile') }}" class="discard-button">Discard</a>
                    <button type="submit" class="save-button">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
