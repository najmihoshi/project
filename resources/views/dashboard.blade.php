<x-app-layout>
    <style>
        /* General Page Styling */
        .body {         
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Centered Title Section Styling */
        .title-section {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title-section h1 {
            font-size: 32px;
            font-weight: bold;
            color: #1e3a8a; /* Dark blue */
            margin: 0;
        }

        /* Button Container Styling */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/IIUM._Morning_From_Block_D%2C_Mahallah_Al-Faruq_-_panoramio.jpg/1280px-IIUM._Morning_From_Block_D%2C_Mahallah_Al-Faruq_-_panoramio.jpg'); /* Placeholder image */
            background-size: cover; /* Ensures the image covers the entire container */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents tiling */
            padding: 20px;
            border-radius: 10px;
            height: 100vh; /* Makes the container fill the viewport height */
            width: 100%; /* Ensures it spans the full width of the screen */
        }


        /* Button Styling */
        a div, .admin-button {
            padding: 20px 40px;
            color: white;
            font-size: 24px;
            border-radius: 80px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        a div {
            background-color: #4CAF50; /* Green */
            text-decoration: none;
        }

        .admin-button {
            background-color: #3b82f6; /* Blue */
            cursor: pointer;
        }

        a div:hover, .admin-button:hover {
            background-color: #1e40af; /* Darker Blue */
            transform: scale(1.05); /* Slight zoom on hover */
        }

        /* Image Styling */
        img {
            width: 150px;
            height: 150px;
            margin-top: 20px;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        /* Custom Pop-up Styling */
        .custom-alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000;
        }

        .custom-alert h2 {
            color: #d32f2f; /* Red for alert */
            font-size: 18px;
        }

        .custom-alert button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-alert button:hover {
            background-color: #388e3c;
        }

        /* Overlay for the alert */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>

    <!-- Buttons and Image -->
    <div class="button-container">
         <!-- Placeholder Image -->
         <img src="https://seeklogo.com/images/I/international-islamic-university-malaysia-logo-221DAA8603-seeklogo.com.png" alt="Placeholder Image">
        <!-- Title Section -->
        <div class="title-section">
            <h1>MAHALLAH REPORTING SYSTEM</h1>
        </div>

        <!-- Profile Button -->
        <a href="profile">
            <div>PROFILE</div>
        </a>

        <!-- Admin Button -->
        <div class="admin-button" onclick="checkAdminAccess()">ADMIN</div>

       
    </div>

    <!-- Custom Alert -->
    <div class="overlay" id="overlay"></div>
    <div class="custom-alert" id="custom-alert">
        <h2>Access Denied</h2>
        <button onclick="closeAlert()">Close</button>
    </div>

    <!-- JavaScript for Admin Button -->
    <script>
        function checkAdminAccess() {
            fetch("{{ route('admin.check') }}", {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for security
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                if (response.status === 403) {
                    // Show the custom alert
                    document.getElementById('overlay').style.display = 'block';
                    document.getElementById('custom-alert').style.display = 'block';
                } else if (response.redirected) {
                    // Redirect to the admin page
                    window.location.href = response.url;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function closeAlert() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('custom-alert').style.display = 'none';
        }
    </script>
</x-app-layout>
