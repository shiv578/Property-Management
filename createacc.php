 <?php
// Start  session if not a lready started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection - adjusted to your database name 'users'
$conn = new mysqli('localhost', 'root', '', 'users');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$accountCreated = false;
$errorMessage = '';
$successMessage = '';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    // Validate inputs
    $errors = [];
    
    if (empty($first_name)) {
        $errors[] = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
        $errors[] = "Only letters and white space allowed in first name";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
        $errors[] = "Only letters and white space allowed in last name";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors[] = "Invalid phone number format";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    } elseif (!preg_match("/[^A-Za-z0-9]/", $password)) {
        $errors[] = "Password must contain at least one special character";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // If no validation errors, proceed with database operations
    if (empty($errors)) {
        // Check if email or phone already exists
        $stmt = $conn->prepare("SELECT * FROM dataforlogin WHERE email = ? OR phonenumber = ?");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errorMessage = "Email or phone number already registered";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
            // Prepare and execute insert statement
            $stmt = $conn->prepare("INSERT INTO dataforlogin (firstname, lastname, phonenumber, email, password, created_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $first_name, $last_name, $phone, $email, $hashed_password, $created_at);
            
            if ($stmt->execute()) {
                $accountCreated = true;
                $successMessage = "Account created successfully!";
                
                // Store user data in session
                $_SESSION['user_email'] = $email;
                $_SESSION['user_firstname'] = $first_name;
                
                // Redirect to signup.php after successful registration
                $_SESSION['registration_success'] = true;
                header("Location: ./signup.php");
                exit;
            } else {
                $errorMessage = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    } else {
        $errorMessage = implode("<br>", $errors);
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account - Property Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Urbanist', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'gradient': 'gradient 8s ease infinite',
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        gradient: {
                            '0%, 100%': { 'background-position': '0% 50%' },
                            '50%': { 'background-position': '100% 50%' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        };
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #4ade80, #3b82f6, #a855f7);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradient 8s ease infinite;
        }
        
        .input-field {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.3);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #4ade80, #3b82f6);
            background-size: 200% 200%;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(74, 222, 128, 0.3);
            background-position: right center;
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .toast {
            animation: fadeIn 0.3s ease-out;
        }
        
        .property-icon {
            filter: drop-shadow(0 5px 10px rgba(74, 222, 128, 0.3));
        }
        
        .blob {
            filter: blur(40px);
            opacity: 0.3;
        }
        
        .signin-btn {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .signin-btn:hover {
            border-color: #4ade80;
            transform: translateY(-2px);
        }
        
        /* Fix for scrolling */
        html, body {
            height: 100%;
            overflow-x: hidden;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 font-heading">

    <!-- Background elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 left-20 w-64 h-64 rounded-full bg-green-500 blob animate-float opacity-20"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 rounded-full bg-blue-500 blob animate-float opacity-20 animation-delay-2000"></div>
        <div class="absolute top-1/3 right-1/4 w-56 h-56 rounded-full bg-purple-500 blob animate-float opacity-20 animation-delay-4000"></div>
    </div>

    <!-- Toast notification container -->
    <div id="toastContainer" class="fixed top-6 right-6 z-50 space-y-3"></div>

    <!-- Success message display -->
    <?php if (isset($_SESSION['registration_success'])): ?>
        <div class="fixed top-0 left-0 right-0 bg-green-500 text-white text-center py-2 z-50">
            Account created successfully! You can now login.
        </div>
        <?php unset($_SESSION['registration_success']); ?>
    <?php endif; ?>

    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-xl space-y-6 animate-fade-in">
            <!-- Header with floating icon -->
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg property-icon mb-4 animate-float">
                    <i class="fas fa-home text-white text-3xl"></i>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-center gradient-text drop-shadow-lg">PropertyPro</h1>
                <h2 class="text-2xl font-bold text-center text-white dark:text-gray-200 mt-2">Create Your Account</h2>
            </div>

            <!-- Form container -->
            <div class="bg-white/5 dark:bg-gray-900/50 rounded-3xl shadow-2xl p-8 md:p-10 space-y-6 backdrop-blur-lg border border-white/10 relative">
                <!-- Decorative elements -->
                <div class="absolute -top-20 -right-20 w-40 h-40 rounded-full bg-green-500/10"></div>
                <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-blue-500/10"></div>
                
                <!-- Error message display -->
                <?php if (!empty($errorMessage)): ?>
                    <div class="bg-red-500/20 border-l-4 border-red-500 text-red-200 p-4 mb-4 rounded-lg">
                        <?php echo htmlspecialchars($errorMessage); ?>
                    </div>
                <?php endif; ?>
                
                <form action="createacc.php" method="POST" onsubmit="return validateForm()" class="space-y-5 relative z-10">
                    <!-- Name fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-gray-300 mb-2 font-medium">First Name</label>
                            <div class="relative">
                                <input id="first_name" name="first_name" type="text" required 
                                       class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                       placeholder="John" />
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="last_name" class="block text-gray-300 mb-2 font-medium">Last Name</label>
                            <div class="relative">
                                <input id="last_name" name="last_name" type="text" required 
                                       class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                       placeholder="Doe" />
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phone field -->
                    <div>
                        <label for="phone" class="block text-gray-300 mb-2 font-medium">Phone Number</label>
                        <div class="relative">
                            <input id="phone" name="phone" type="tel" required 
                                   class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                   placeholder="(123) 456-7890" />
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Email field -->
                    <div>
                        <label for="email" class="block text-gray-300 mb-2 font-medium">Email</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" required 
                                   class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                   placeholder="your@email.com" autocomplete="off" />
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password field -->
                    <div>
                        <label for="password" class="block text-gray-300 mb-2 font-medium">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required 
                                   class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                   placeholder="••••••••" autocomplete="new-password" />
                            <button type="button" onclick="togglePassword('password')" 
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition">
                                <i class="fas fa-eye" id="password-eye"></i>
                            </button>
                        </div>
                        <div class="text-xs text-gray-400 mt-1">Must be at least 8 characters with a special character</div>
                    </div>

                    <!-- Confirm Password field -->
                    <div>
                        <label for="confirm_password" class="block text-gray-300 mb-2 font-medium">Confirm Password</label>
                        <div class="relative">
                            <input id="confirm_password" name="confirm_password" type="password" required 
                                   class="w-full px-4 py-3 rounded-xl input-field border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400" 
                                   placeholder="••••••••" autocomplete="new-password" />
                            <button type="button" onclick="togglePassword('confirm_password')" 
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition">
                                <i class="fas fa-eye" id="confirm-password-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button id="submitBtn" type="submit" 
                            class="w-full submit-btn text-white py-3 rounded-xl font-semibold shadow-lg transition">
                        Create Account
                    </button>

                    <!-- Terms and conditions -->
                    <div class="text-xs text-center text-gray-400">
                        By creating an account, you agree to our <a href="#" class="text-green-400 hover:underline">Terms of Service</a> and <a href="#" class="text-green-400 hover:underline">Privacy Policy</a>
                    </div>
                </form>

                <!-- Alternative sign-in option -->
                <div class="text-center pt-4 border-t border-gray-800">
                    <p class="text-gray-400">Already registered?</p>
                    <a href="signup.php" class="inline-block mt-2 signin-btn text-white px-6 py-2 rounded-lg font-medium">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In to Your Account
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Toggle password visibility
        function togglePassword(id) {
            const input = document.getElementById(id);
            const eyeIcon = document.getElementById(`${id}-eye`);
            
            if (input.type === "password") {
                input.type = "text";
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = "password";
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Form validation
        function validateForm() {
            const first = document.getElementById("first_name").value.trim();
            const last = document.getElementById("last_name").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("confirm_password").value;
            const specialChar = /[^A-Za-z0-9]/;
            const nameRegex = /^[A-Za-z\s-]+$/;
            const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

            if (!nameRegex.test(first)) {
                showToast("First name must contain only letters, spaces, and hyphens.", "error");
                return false;
            }
            if (!nameRegex.test(last)) {
                showToast("Last name must contain only letters, spaces, and hyphens.", "error");
                return false;
            }
            if (!phoneRegex.test(phone)) {
                showToast("Please enter a valid phone number.", "error");
                return false;
            }
            if (!specialChar.test(pass)) {
                showToast("Password must include a special character.", "error");
                return false;
            }
            if (pass.length < 8) {
                showToast("Password must be at least 8 characters long.", "error");
                return false;
            }
            if (pass !== confirm) {
                showToast("Passwords do not match.", "error");
                return false;
            }

            // Show loading state
            const submitBtn = document.getElementById("submitBtn");
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating Account...';
            submitBtn.disabled = true;

            return true;
        }

        // Toast notification function
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            
            const colors = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500'
            };
            
            toast.className = `toast px-6 py-3 rounded-lg shadow-lg text-white flex items-center ${colors[type]}`;
            toast.innerHTML = `
                <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle'} mr-2"></i>
                <span>${message}</span>
            `;
            
            toastContainer.appendChild(toast);
            
            // Remove toast after 5 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
    </script>
</body>
</html>
