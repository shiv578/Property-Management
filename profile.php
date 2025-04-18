<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: createacc.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "users"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user data from database
$email = $_SESSION['user_email'];
$sql = "SELECT firstname, lastname, email, created_at FROM dataforlogin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // If no user found, redirect to login
    header("Location: createacc.php");
    exit();
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: rgba(30, 41, 59, 0.3);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .profile-initials {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .hover-grow {
            transition: all 0.3s ease;
        }
        
        .hover-grow:hover {
            transform: translateY(-5px);
        }
        
        .glow {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.5);
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(99, 102, 241, 0); }
            100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0); }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #6366f1, #ec4899);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center text-white">

    <div class="w-full max-w-4xl mx-auto mt-10 mb-16 glass rounded-2xl overflow-hidden shadow-2xl hover-grow">
        <!-- Header -->
        <div class="relative bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-600 p-10 text-center">
            <!-- Decorative elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-20">
                <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-purple-500 mix-blend-overlay filter blur-xl"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 rounded-full bg-pink-500 mix-blend-overlay filter blur-xl"></div>
            </div>
            
            <!-- Profile Picture -->
            <div class="relative z-10 w-36 h-36 mx-auto mb-5 rounded-full profile-initials flex items-center justify-center text-5xl font-extrabold border-4 border-white/30 shadow-2xl floating">
                <?php 
                    echo strtoupper(substr($user['firstname'], 0, 1)) . strtoupper(substr($user['lastname'], 0, 1));
                ?>
            </div>
            
            <div class="relative z-10">
                <h1 class="text-4xl font-bold tracking-wide mb-1 gradient-text"><?php echo htmlspecialchars(ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname'])); ?></h1>
                <p class="text-sm opacity-90 flex items-center justify-center gap-2">
                    <i class="fas fa-envelope text-indigo-200"></i>
                    <?php echo htmlspecialchars($user['email']); ?>
                </p>
                <?php if (!empty($user['created_at'])): ?>
                    <p class="mt-3 inline-flex items-center bg-white/10 backdrop-blur-sm text-white text-xs px-4 py-2 rounded-full shadow border border-white/10">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Member since <?php echo date("F Y", strtotime($user['created_at'])); ?>
                    </p>
                <?php endif; ?>
            </div>
            
            <!-- Decorative corner elements -->
            <div class="absolute top-0 left-0 w-16 h-16 border-t-4 border-l-4 border-white/20"></div>
            <div class="absolute top-0 right-0 w-16 h-16 border-t-4 border-r-4 border-white/20"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 border-b-4 border-l-4 border-white/20"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 border-b-4 border-r-4 border-white/20"></div>
        </div>

        <!-- Body -->
        <div class="px-10 py-8 space-y-6 bg-gray-900/70">
            <!-- Personal Info -->
            <div class="glass p-6 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02] hover-glow">
                <div class="flex items-center mb-4">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-2 rounded-lg mr-3">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Personal Information</h2>
                </div>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-signature text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">First Name</span>
                        </div>
                        <span class="font-medium"><?php echo htmlspecialchars($user['firstname']); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-signature text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">Last Name</span>
                        </div>
                        <span class="font-medium"><?php echo htmlspecialchars($user['lastname']); ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-at text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">Email</span>
                        </div>
                        <span class="font-medium"><?php echo htmlspecialchars($user['email']); ?></span>
                    </div>
                </div>
            </div>

            <!-- Account Details -->
            <div class="glass p-6 rounded-xl shadow-lg transition-all duration-300 hover:scale-[1.02] hover-glow">
                <div class="flex items-center mb-4">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-2 rounded-lg mr-3">
                        <i class="fas fa-lock text-white text-lg"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Account Details</h2>
                </div>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-user-tag text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">Account Type</span>
                        </div>
                        <span class="font-medium flex items-center">
                            <span class="bg-indigo-600/20 text-indigo-400 px-3 py-1 rounded-full text-xs">Premium</span>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-circle-check text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">Status</span>
                        </div>
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2 pulse-animation"></span>
                            <span class="text-green-400 font-semibold">Active</span>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center py-3 px-4 bg-gray-800/50 rounded-lg hover:bg-gray-800/70 transition">
                        <div class="flex items-center">
                            <i class="fas fa-clock text-indigo-400 mr-3"></i>
                            <span class="font-medium text-gray-300">Last Login</span>
                        </div>
                        <span class="font-medium"><?php echo date("F j, Y, g:i a"); ?></span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gradient-to-br from-indigo-900/50 to-indigo-700/30 p-4 rounded-xl border border-indigo-800/50 flex items-center hover-grow">
                    <div class="bg-indigo-600/20 p-3 rounded-lg mr-4">
                        <i class="fas fa-calendar-check text-indigo-300"></i>
                    </div>
                    <div>
                        <p class="text-sm text-indigo-300">Days Active</p>
                        <p class="text-xl font-bold">128</p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-900/50 to-purple-700/30 p-4 rounded-xl border border-purple-800/50 flex items-center hover-grow">
                    <div class="bg-purple-600/20 p-3 rounded-lg mr-4">
                        <i class="fas fa-trophy text-purple-300"></i>
                    </div>
                    <div>
                        <p class="text-sm text-purple-300">Achievements</p>
                        <p class="text-xl font-bold">5</p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-pink-900/50 to-pink-700/30 p-4 rounded-xl border border-pink-800/50 flex items-center hover-grow">
                    <div class="bg-pink-600/20 p-3 rounded-lg mr-4">
                        <i class="fas fa-star text-pink-300"></i>
                    </div>
                    <div>
                        <p class="text-sm text-pink-300">User Rating</p>
                        <p class="text-xl font-bold">4.8</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6">
                <a href="#" class="flex-1 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 rounded-lg text-white font-semibold text-center shadow-md transition duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                    <i class="fas fa-share-alt"></i> Share Profile
                </a>
                <a href="editprofile.php" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 rounded-lg text-white font-semibold text-center shadow-md transition duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-black/20 text-center py-4 text-sm text-gray-400 border-t border-gray-800">
            <p>Last updated: <?php echo date("F j, Y \a\\t g:i A"); ?></p>
        </div>
    </div>

    <!-- Decorative floating elements -->
    <div class="fixed -bottom-20 -left-20 w-64 h-64 rounded-full bg-indigo-900/20 filter blur-3xl -z-10"></div>
    <div class="fixed -top-20 -right-20 w-64 h-64 rounded-full bg-purple-900/20 filter blur-3xl -z-10"></div>
    <div class="fixed top-1/4 left-1/4 w-16 h-16 rounded-full bg-pink-500/10 filter blur-xl -z-10 animate-pulse"></div>
    <div class="fixed bottom-1/3 right-1/3 w-24 h-24 rounded-full bg-indigo-500/10 filter blur-xl -z-10 animate-pulse delay-300"></div>

</body>
</html>