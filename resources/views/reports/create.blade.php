<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Lodge a Report') }}
        </h2>
    </x-slot>

    <style>
        .container {
            padding: 20px;
            background: linear-gradient(to bottom right, rgb(180, 187, 219), rgb(88, 135, 150)); /* Updated background */
            min-height: 100vh; /* Ensures it covers the entire viewport height */
            margin: 0;
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

        .submit-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #388e3c;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
        }

    </style>

    <div class = "container">
        <div class="card">
            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="mahallah">Mahallah</label>
                    <select name="mahallah" id="mahallah">
                        <option value="Ali">Ali</option>
                        <option value="Siddiq">Siddiq</option>
                        <option value="Faruq">Faruq</option>
                        <option value="Uthman">Uthman</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="block">Block</label>
                    <input type="text" name="block" id="block">
                </div>
                <div class="form-group">
                    <label for="compartment">Compartment</label>
                    <input type="text" name="compartment" id="compartment">
                </div>
                <div class="form-group">
                    <label for="issue_type">Type of Issue</label>
                    <input type="text" name="issue_type" id="issue_type">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Add Picture</label>
                    <input type="file" name="image" id="image">
                </div>
                <button type="submit" class="submit-button">Submit Report</button>
            </form>
        </div>
    </div>
</x-app-layout>
