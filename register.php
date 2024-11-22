<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password . $username);

    $query = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: login.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
    <style>
        body {
            background: white, 
            url("https://unsplash.com/photos/monitor-showing-java-programming-OqtafYT5kTw");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white/30 backdrop-blur-lg rounded-lg shadow-lg border border-white/20 p-8">
        <h2 class="text-center text-2xl font-bold text-black mb-6">Create Account</h2>
        <form action="register.php" method="POST" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-black">Username</label>
                <input type="text" id="username" name="username" 
                       class="mt-2 w-full px-4 py-2 bg-white/10 text-black border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <input type="password" id="password" name="password" 
                       class="mt-2 w-full px-4 py-2 bg-white/10 text-black border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       required>
            </div>
            <div>
                <button type="submit" 
                        class="w-full py-2 px-4 bg-indigo-500 hover:bg-indigo-600 text-black font-medium rounded-lg shadow-md focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    Register
                </button>
            </div>
        </form>
        <p class="mt-4 text-sm text-center text-gray-300">
            Already have an account? 
            <a href="login.php" class="text-indigo-400 hover:underline">Login here</a>
        </p>
    </div>

</body>
</html>