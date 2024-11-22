<?php
session_start();
include 'koneksi.php'; // Ensure this file correctly initializes $mysqli

// Initialize variables
$error_message = "";
$lockout_time = 0;

// Function to check if the account is locked
function is_account_locked() {
    if (isset($_SESSION['login_attempts'])) {
        $attempts = $_SESSION['login_attempts'];
        if ($attempts['count'] >= 5 && time() - $attempts['time'] < 30) {
            return true;
        }
    }
    return false;
}

// Function to get remaining lockout time
function get_lockout_time() {
    if (isset($_SESSION['login_attempts'])) {
        $attempts = $_SESSION['login_attempts'];
        if ($attempts['count'] >= 5) {
            $time_passed = time() - $attempts['time'];
            if ($time_passed < 30) {
                return 30 - $time_passed;
            }
        }
    }
    return 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = md5($password . $username);

    // Check if the account is locked
    if (is_account_locked()) {
        $error_message = "Account is locked. Please try again later.";
        $lockout_time = get_lockout_time();
    } else {
        // Check the password against the database
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$hashed_password'";
        $result = mysqli_query($mysqli, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // Fetch user data
            $user = mysqli_fetch_assoc($result);
            $role = $user['role'];

            // Successful login
            unset($_SESSION['login_attempts']);
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['login'] = true;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == 'admin') {
                header("Location: dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            // Failed login attempt
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = ['count' => 0, 'time' => time()];
            }
            $_SESSION['login_attempts']['count']++;
            $_SESSION['login_attempts']['time'] = time();

            $attempts_left = 5 - $_SESSION['login_attempts']['count'];
            if ($attempts_left > 0) {
                $error_message = "Incorrect password. You have {$attempts_left} attempts left.";
            } else {
                $error_message = "Too many failed attempts. Account is locked for 30 seconds.";
                $lockout_time = 30;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glass Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?nature,water');
            background-size: cover;
            background-position: center;
        }
        .glass {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="glass w-full max-w-md p-8 space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-black">
                Sign in to your account
            </h2>
        </div>
        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"><?php echo $error_message; ?></span>
            </div>
        <?php endif; ?>
        <?php if ($lockout_time > 0): ?>
            <div class="text-center text-white" id="lockout-timer">
                Account locked. Try again in <span id="countdown"><?php echo $lockout_time; ?></span> seconds.
            </div>
        <?php endif; ?>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username">
                </div>
                <div class="mt-4">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-white">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="forgot_password.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Forgot your password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
            <div class="register">
                <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Register
                </a>
            </div>
        </form>
    </div>

    <script>
        // Countdown timer
        let countdown = <?php echo $lockout_time; ?>;
        const countdownDisplay = document.getElementById('countdown');
        const lockoutTimer = document.getElementById('lockout-timer');

        if (countdown > 0) {
            const timer = setInterval(() => {
                countdown--;
                countdownDisplay.textContent = countdown;
                if (countdown <= 0) {
                    clearInterval(timer);
                    lockoutTimer.style.display = 'none';
                }
            }, 1000);
        }
    </script>
</body>
</html>