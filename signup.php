<?php
// Set secure session settings BEFORE starting session
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);

// Start session
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    exit;
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'users');
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// Initialize variables with proper default values
$error_message = '';
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';

// Process login form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // Sanitize email input
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "❌ Invalid email format";
        } else {
            // Prepare query to get user data
            $stmt = $conn->prepare("SELECT firstname, lastname, email, password FROM dataforlogin WHERE email = ?");
            
            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if user exists
                if ($result && $result->num_rows === 1) {
                    $user = $result->fetch_assoc();
                    
                    // Verify password against hashed password in database
                    if (password_verify($password, $user['password'])) {
                        // Regenerate session ID for security
                        session_regenerate_id(true);
                        
                        // Set session variables
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_firstname'] = $user['firstname'];
                        $_SESSION['user_lastname'] = $user['lastname'];
                        $_SESSION['logged_in'] = true;
                        
                        // Redirect to dashboard
                        header("Location: dashboard.php");
                        exit;
                    } else {
                        $error_message = "❌ Invalid email or password";
                    }
                } else {
                    $error_message = "❌ Invalid email or password";
                }
                $stmt->close();
            } else {
                $error_message = "❌ Database error";
            }
        }
    } else {
        $error_message = "⚠️ Please enter both email and password";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="light-mode">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PropertyPro Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3a0ca3;
            --dark: #14213d;
            --light: #f8f9fa;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --gold: #ffd60a;
            --bg-primary: #14213d;
            --bg-secondary: #1a2a4a;
            --text-primary: #f8f9fa;
            --text-secondary: #e9ecef;
            --card-bg: rgba(255, 255, 255, 0.1);
            --card-border: rgba(255, 255, 255, 0.1);
        }

        :root.light-mode {
            --bg-primary: #f8f9fa;
            --bg-secondary: #e9ecef;
            --text-primary: #14213d;
            --text-secondary: #1a2a4a;
            --card-bg: rgba(255, 255, 255, 0.9);
            --card-border: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, var(--bg-primary), var(--bg-secondary));
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            color: var(--text-primary);
        }

        .property-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80') no-repeat center center;
            background-size: cover;
            z-index: -1;
            opacity: 0.1;
        }

        .background-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
            }
        }

        .login-container {
            position: relative;
            width: 100%;
            max-width: 1000px;
            display: flex;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--card-border);
            z-index: 1;
        }

        .login-left {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .login-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(20, 33, 61, 0.8), transparent);
        }

        .login-right-content {
            position: absolute;
            bottom: 40px;
            left: 40px;
            color: white;
            z-index: 2;
        }

        .login-right-content h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--gold);
        }

        .login-right-content p {
            font-size: 1rem;
            opacity: 0.9;
            max-width: 80%;
        }

        .login-header {
            margin-bottom: 40px;
            color: var(--text-primary);
        }

        .login-header h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .login-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--gold);
            border-radius: 3px;
        }

        .login-header p {
            font-size: 0.9rem;
            opacity: 0.8;
            color: var(--text-secondary);
        }

        .input-group {
            position: relative;
            margin-bottom: 30px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            outline: none;
            border-radius: 8px;
            font-size: 1rem;
            color: var(--text-primary);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-left: 3px solid var(--gold);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .input-group label {
            position: absolute;
            top: 15px;
            left: 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -20px;
            left: 15px;
            font-size: 0.8rem;
            color: var(--gold);
        }

        .input-group i {
            position: absolute;
            top: 15px;
            right: 20px;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .remember-forgot label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .remember-forgot input {
            margin-right: 5px;
            accent-color: var(--gold);
        }

        .remember-forgot a {
            color: var(--gold);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
            color: var(--primary-light);
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: var(--gold);
            border: none;
            outline: none;
            border-radius: 8px;
            color: var(--dark);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 214, 10, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            background: #ffea00;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 214, 10, 0.6);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .register-link a {
            color: var(--gold);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        .error-message {
            background: rgba(247, 37, 133, 0.2);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 3px solid var(--danger);
            animation: shake 0.5s ease-in-out;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 10px;
            color: var(--danger);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .social-login {
            margin-top: 30px;
            text-align: center;
        }

        .social-login p {
            color: var(--text-secondary);
            margin-bottom: 15px;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-5px);
        }

        /* Dark mode toggle */
        .theme-toggle {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        .theme-toggle i {
            font-size: 1.2rem;
            color: var(--gold);
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                max-width: 90%;
            }
            
            .login-right {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .login-left {
                padding: 40px 30px;
            }
            
            .theme-toggle {
                top: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
            }
        }

        /* Ripple effect */
        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        /* Floating animation */
        @keyframes float-up {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float-up 3s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <div class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </div>

    <div class="property-bg"></div>
    <div class="background-shapes" id="backgroundShapes"></div>
    
    <div class="login-container floating">
        <div class="login-left">
            <div class="login-header">
                <h2>Welcome to PropertyPro</h2>
                <p>Manage your properties with ease</p>
            </div>

            <?php if (!empty($error_message)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $error_message; ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" action="signup.php">
                <div class="input-group">
                    <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
                    <label for="email">Email</label>
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <a href="forgot-password.php">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <span>Login</span>
                </button>
            </form>

            <div class="social-login">
                <p>Or login with</p>
                <div class="social-icons">
                    <a href="#" title="Login with Google"><i class="fab fa-google"></i></a>
                    <a href="#" title="Login with Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Login with LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="register-link">
                New to PropertyPro? <a href="createacc.php">Create an account</a>
            </div>
        </div>

        <div class="login-right">
            <div class="login-right-content">
                <h3>Find Your Dream Property</h3>
                <p>Join thousands of satisfied clients who found their perfect home through our platform.</p>
            </div>
        </div>
    </div>

    <script>
        // Password toggle visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Create floating background shapes
        const backgroundShapes = document.getElementById('backgroundShapes');
        const colors = ['rgba(255, 255, 255, 0.1)', 'rgba(255, 255, 255, 0.15)', 'rgba(255, 255, 255, 0.05)'];

        for (let i = 0; i < 15; i++) {
            const shape = document.createElement('div');
            shape.classList.add('shape');
            
            const size = Math.random() * 200 + 50;
            const posX = Math.random() * window.innerWidth;
            const posY = Math.random() * window.innerHeight;
            const color = colors[Math.floor(Math.random() * colors.length)];
            const delay = Math.random() * 5;
            const duration = Math.random() * 20 + 10;
            
            shape.style.width = `${size}px`;
            shape.style.height = `${size}px`;
            shape.style.left = `${posX}px`;
            shape.style.top = `${posY}px`;
            shape.style.background = color;
            shape.style.animationDelay = `${delay}s`;
            shape.style.animationDuration = `${duration}s`;
            
            backgroundShapes.appendChild(shape);
        }

        // Input label animation
        const inputs = document.querySelectorAll('.input-group input');
        inputs.forEach(input => {
            if (input.value) {
                input.nextElementSibling.style.top = '-20px';
                input.nextElementSibling.style.left = '15px';
                input.nextElementSibling.style.fontSize = '0.8rem';
                input.nextElementSibling.style.color = '#ffd60a';
            }

            input.addEventListener('focus', function() {
                this.nextElementSibling.style.top = '-20px';
                this.nextElementSibling.style.left = '15px';
                this.nextElementSibling.style.fontSize = '0.8rem';
                this.nextElementSibling.style.color = '#ffd60a';
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.nextElementSibling.style.top = '15px';
                    this.nextElementSibling.style.left = '20px';
                    this.nextElementSibling.style.fontSize = '1rem';
                    this.nextElementSibling.style.color = 'rgba(255, 255, 255, 0.8)';
                }
            });
        });

        // Button ripple effect
        const buttons = document.querySelectorAll('.btn-login');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.classList.add('ripple-effect');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Dark mode toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle.querySelector('i');
        
        // Check for saved theme preference or use preferred color scheme
        const savedTheme = localStorage.getItem('theme') || 
                          (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        document.documentElement.classList.toggle('light-mode', savedTheme === 'light');
        updateThemeIcon();
        
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('light-mode');
            localStorage.setItem('theme', document.documentElement.classList.contains('light-mode') ? 'light' : 'dark');
            updateThemeIcon();
        });
        
        function updateThemeIcon() {
            if (document.documentElement.classList.contains('light-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        }

        // Add subtle parallax effect to background
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            document.querySelector('.property-bg').style.transform = `translate(-${x * 20}px, -${y * 20}px)`;
        });
    </script>
</body>
</html>