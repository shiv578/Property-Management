<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property Management </title>
  <meta name="description" content="Professional property management services for owners and tenants">
  
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  
  <!-- Fonts & Icons -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --primary: #8b5cf6;
      --primary-dark: #7c3aed;
      --secondary: #ec4899;
      --dark: #1e293b;
      --darker: #0f172a;
    }
    
    html {
      scroll-behavior: smooth;
      scroll-padding-top: 80px;
    }
    
    body {
      font-family: 'Urbanist', sans-serif;
      background-color: var(--darker);
      color: white;
    }
    
    /* Navbar Styles */
    .navbar {
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      background-color: rgba(15, 23, 42, 0.85);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .navbar.scrolled {
      background-color: rgba(15, 23, 42, 0.95);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    }
    
    .nav-link {
      position: relative;
      padding: 0.5rem 1rem;
    }
    
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background: var(--primary);
      transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
      width: 70%;
    }
    
    .nav-link.active::after {
      width: 70%;
    }
    
    /* Hero Section */
    .hero-gradient {
      background: linear-gradient(135deg, var(--darker) 0%, var(--primary-dark) 100%);
    }
    
    .hero-title {
      background: linear-gradient(to right, white, #e2e8f0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    /* Animations */
    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
    }
    
    .floating {
      animation: float 3s ease-in-out infinite;
    }
    
    @keyframes pulse {
      0%, 100% {
        opacity: 1;
      }
      50% {
        opacity: 0.7;
      }
    }
    
    .pulse {
      animation: pulse 2s infinite;
    }
    
    /* Cards */
    .feature-card {
      transition: all 0.3s ease;
      background: rgba(30, 41, 59, 0.5);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      background: rgba(59, 130, 246, 0.1);
      border-color: var(--primary);
    }
    
    /* Testimonials */
    .testimonial-card {
      background: linear-gradient(145deg, var(--darker), rgba(30, 41, 59, 0.7));
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Pricing Cards */
    .pricing-card {
      transition: all 0.3s ease;
      background: rgba(30, 41, 59, 0.7);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .pricing-card:hover {
      transform: scale(1.03);
      box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
      border-color: var(--primary);
    }
    
    .pricing-card.popular {
      border: 2px solid var(--primary);
      position: relative;
      overflow: hidden;
    }
    
    .popular-badge {
      position: absolute;
      top: 0;
      right: 0;
      background: var(--primary);
      color: white;
      padding: 0.25rem 1rem;
      font-size: 0.75rem;
      font-weight: bold;
      transform: translateY(-50%) rotate(15deg);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    /* Chat Button */
    .chat-button {
      box-shadow: 0 4px 20px rgba(139, 92, 246, 0.5);
      transition: all 0.3s ease;
    }
    
    .chat-button:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 25px rgba(139, 92, 246, 0.7);
    }
    
    /* Mobile Menu */
    .mobile-menu {
      transition: all 0.3s ease;
      max-height: 0;
      overflow: hidden;
    }
    
    .mobile-menu.open {
      max-height: 500px;
    }
    
    /* Property Badges */
    .property-badge {
      position: absolute;
      top: 1rem;
      left: 1rem;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    
    /* User Profile Dropdown */
    .profile-dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 100%;
      min-width: 200px;
      background: rgba(15, 23, 42, 0.95);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 0.5rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      z-index: 50;
    }
    
    .profile-dropdown.show {
      display: block;
    }
    
    /* Property Details Modal */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 100;
      overflow-y: auto;
    }
    
    .modal-content {
      background-color: #0f172a;
      margin: 2rem auto;
      padding: 2rem;
      border-radius: 0.5rem;
      max-width: 900px;
      animation: modalFadeIn 0.3s ease-out;
    }
    
    @keyframes modalFadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Property Gallery */
    .property-gallery {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0.5rem;
      margin-top: 1rem;
    }
    
    .gallery-main {
      grid-column: span 3;
      grid-row: span 2;
    }
    
    .gallery-thumb {
      cursor: pointer;
      transition: all 0.2s ease;
    }
    
    .gallery-thumb:hover {
      opacity: 0.8;
    }
    
    /* Amenities */
    .amenities-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      gap: 1rem;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .property-gallery {
        grid-template-columns: 1fr;
      }
      
      .gallery-main {
        grid-column: span 1;
        grid-row: span 1;
      }
      
      .amenities-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Enhanced Navbar -->
  <!-- Enhanced Navbar with Advanced Features -->
<header id="navbar" class="navbar fixed top-0 w-full z-50 backdrop-blur-md bg-gray-900/80 shadow-lg transition-all duration-300 hover:bg-gray-900/95">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">
      <!-- Logo with Animation -->
      <div class="flex items-center space-x-2 group">
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center transform transition-transform duration-500 group-hover:rotate-180 shadow-lg">
          <i class="fas fa-home text-white text-lg"></i>
        </div>
        <span class="text-2xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent bg-size-200 hover:bg-right transition-all duration-1000">
          Property<span class="font-light">Pro</span>
        </span>
      </div>

      <!-- Desktop Navigation with Animated Underline -->
      <nav class="hidden lg:flex items-center space-x-1">
        <a href="#home" class="nav-link relative group active">
          <span class="z-10">Home</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#features" class="nav-link relative group">
          <span class="z-10">Services</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#properties" class="nav-link relative group">
          <span class="z-10">Properties</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#pricing" class="nav-link relative group">
          <span class="z-10">Subscription</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#testimonials" class="nav-link relative group">
          <span class="z-10">Reviews</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
        <a href="#faq" class="nav-link relative group">
          <span class="z-10">FAQ</span>
          <span class="absolute bottom-0 left-0 w-full h-0.5 bg-pink-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
      </nav>

      <!-- Right Side: Auth & Search with Enhanced Interactions -->
      <div class="hidden lg:flex items-center space-x-6">
        <!-- Animated Search Bar -->
        <div class="relative group">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 group-focus-within:text-purple-400 transition-colors">
            <i class="fas fa-search"></i>
          </div>
          <input type="text" placeholder="Search properties..." 
                 class="bg-gray-800 border border-gray-700 rounded-full py-2 px-4 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 w-64 transition-all duration-300 group-hover:w-72 group-hover:shadow-lg group-hover:shadow-purple-500/20">
          <div class="absolute inset-y-0 right-0 flex items-center pr-3 hidden group-focus-within:block">
            <button class="text-xs bg-gradient-to-r from-purple-500 to-pink-500 text-white px-2 py-1 rounded-full hover:shadow-md transition-all">
              Go
            </button>
          </div>
        </div>
        <button id="notifBtn" class="fixed top-4 right-4 bg-indigo-600 px-4 py-2 rounded-lg z-50 hover:bg-indigo-700 shadow-lg flex items-center gap-2">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
  </svg>
  
</button>

<!-- Overlay -->
<div id="notifOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden backdrop-blur-sm"></div>

<!-- Notification Panel -->
<div id="notifPanel"
     class="fixed top-0 right-0 h-screen w-[400px] bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 overflow-y-auto flex flex-col">

  <!-- Header -->
  <div class="flex justify-between items-center p-6 border-b border-gray-700 bg-gray-900">
    <div class="flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
      </svg>
      <h2 class="text-2xl font-bold">Property Alerts</h2>
    </div>
    <button id="closeNotif" class="text-2xl font-bold text-gray-400 hover:text-white transition-colors">×</button>
  </div>

  <!-- Notification List -->
  <div class="flex-1 space-y-6 p-6 text-sm">
    <!-- Today -->
    <div>
      <h3 class="text-md font-bold text-indigo-400 mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
        Today
      </h3>
      <div class="space-y-4">
        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-green-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-green-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">New lease signed for <span class="text-white">Ocean View Apartment</span></p>
              <p class="text-gray-400 text-xs mt-1">Tenant: Michael Johnson • 2-year lease • $2,800/month</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">2 hours ago</span>
                <a href="property-details.php?id=2" class="text-xs text-indigo-400 hover:text-indigo-300 inline-block">
  View Details
</a>

              </div>
            </div>
          </div>
        </div>

        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-blue-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-blue-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">Rent payment received for <span class="text-white">Downtown Loft #304</span></p>
              <p class="text-gray-400 text-xs mt-1">$3,200 • Paid on time • Balance: $0</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">5 hours ago</span>
                <button class="text-xs text-indigo-400 hover:text-indigo-300">View Receipt</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- This Week -->
    <div>
      <h3 class="text-md font-bold text-indigo-400 mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        This Week
      </h3>
      <div class="space-y-4">
        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-yellow-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-yellow-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">Maintenance request for <span class="text-white">Hillside Villa #12</span></p>
              <p class="text-gray-400 text-xs mt-1">Category: Plumbing • Urgency: High • Reported by tenant</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">2 days ago</span>
                <div class="flex gap-2">
                  <button class="text-xs bg-yellow-600 hover:bg-yellow-700 px-2 py-1 rounded">Assign</button>
                  <button class="text-xs text-indigo-400 hover:text-indigo-300">Details</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-purple-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-purple-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">New tenant application for <span class="text-white">Riverside Condo</span></p>
              <p class="text-gray-400 text-xs mt-1">Applicant: Sarah Williams • Credit score: 720 • 2 references</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">3 days ago</span>
                <div class="flex gap-2">
                  <button class="text-xs bg-green-600 hover:bg-green-700 px-2 py-1 rounded">Approve</button>
                  <button class="text-xs bg-red-600 hover:bg-red-700 px-2 py-1 rounded">Reject</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earlier -->
    <div>
      <h3 class="text-md font-bold text-indigo-400 mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Earlier
      </h3>
      <div class="space-y-4">
        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-red-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-red-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">Late rent notice for <span class="text-white">Garden Apartments #5B</span></p>
              <p class="text-gray-400 text-xs mt-1">Tenant: Robert Chen • 5 days overdue • Late fee: $75</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">1 week ago</span>
                <button class="text-xs text-indigo-400 hover:text-indigo-300">Send Reminder</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Notification Item -->
        <div class="p-4 bg-gray-800 rounded-lg border-l-4 border-indigo-500 hover:bg-gray-750 transition-colors">
          <div class="flex items-start gap-3">
            <div class="bg-indigo-500/20 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="flex-1">
              <p class="font-medium">Annual inspection scheduled for <span class="text-white">All Properties</span></p>
              <p class="text-gray-400 text-xs mt-1">Starting May 15 • Fire safety check included</p>
              <div class="flex justify-between items-center mt-3">
                <span class="text-xs text-gray-500">2 weeks ago</span>
                <button class="text-xs text-indigo-400 hover:text-indigo-300">View Schedule</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Big Delete All Box -->
  <div class="mt-auto p-6 border-t border-gray-700 bg-gray-900/50">
    <button class="w-full bg-red-600/90 hover:bg-red-700 py-3 rounded-lg text-white font-semibold flex items-center justify-center gap-2 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
      Clear All Notifications
    </button>
  </div>
</div>

<!-- JS for Toggle -->
<script>
  const notifBtn = document.getElementById("notifBtn");
  const notifPanel = document.getElementById("notifPanel");
  const closeNotif = document.getElementById("closeNotif");
  const notifOverlay = document.getElementById("notifOverlay");

  notifBtn.onclick = () => {
    notifPanel.classList.remove("translate-x-full");
    notifOverlay.classList.remove("hidden");
    document.body.style.overflow = "hidden";
  };

  closeNotif.onclick = () => {
    notifPanel.classList.add("translate-x-full");
    notifOverlay.classList.add("hidden");
    document.body.style.overflow = "auto";
  };

  notifOverlay.onclick = () => {
    notifPanel.classList.add("translate-x-full");
    notifOverlay.classList.add("hidden");
    document.body.style.overflow = "auto";
  };
</script>
        

        <!-- Advanced User pre Dropdown -->
        <div class="relative group">
          <button id="profileButton" class="flex items-center space-x-2 focus:outline-none transition-all duration-200 hover:bg-gray-800/50 rounded-full p-1 pr-3">
            <div class="relative">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwTjn7ADTGtefL4Im3WluJ6ersByvJf8k7-Q&s" alt="User profile" 
                   class="w-10 h-10 rounded-full border-2 border-transparent group-hover:border-purple-500 transition-all duration-300 object-cover">
              <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-900"></div>
            </div>
            <span class="text-sm font-medium">Demo User</span>
            <i class="fas fa-chevron-down text-xs text-gray-400 transform transition-transform duration-200 group-hover:rotate-180"></i>
          </button>
          
          <div id="profileDropdown" class="profile-dropdown hidden absolute right-0 mt-2 w-56 bg-gray-800 rounded-lg shadow-xl border border-gray-700 py-2 z-50 transform origin-top transition-all duration-200 scale-95 opacity-0 group-hover:scale-100 group-hover:opacity-100">
            <div class="px-4 py-3 border-b border-gray-700 flex items-center space-x-3">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full">
              <div>
                <p class="text-sm font-medium">Demo User</p>
                <p class="text-xs text-gray-400">Premium Member</p>
              </div>
            </div>
            <a href="./profile.php" class="block px-4 py-2 text-sm hover:bg-gray-700 transition-colors flex items-center space-x-2">
              <i class="fas fa-user-circle w-5 text-purple-400"></i>
              <span>My Profile</span>
            </a>
            <a href="my-properties.html" class="block px-4 py-2 text-sm hover:bg-gray-700 transition-colors flex items-center space-x-2">
              <i class="fas fa-home w-5 text-blue-400"></i>
              <span>My Properties</span>
            </a>
            <a href="favorite.php" class="block px-4 py-2 text-sm hover:bg-gray-700 transition-colors flex items-center space-x-2">
              <i class="fas fa-heart w-5 text-pink-400"></i>
              <span>Favorites</span>
            </a>
            <div class="border-t border-gray-700 my-1"></div>
            <a href="settings.html" class="block px-4 py-2 text-sm hover:bg-gray-700 transition-colors flex items-center space-x-2">
              <i class="fas fa-cog w-5 text-gray-400"></i>
              <span>Settings</span>
            </a>
            <a href="logout.php" class="block px-4 py-2 text-sm hover:bg-gray-700 transition-colors flex items-center space-x-2 group">
              <i class="fas fa-sign-out-alt w-5 text-red-400 group-hover:text-red-300"></i>
              <span class="text-red-400 group-hover:text-red-300">Logout</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobileMenuButton" class="lg:hidden text-gray-300 hover:text-white focus:outline-none">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="lg:hidden hidden bg-gray-900 border-t border-gray-800">
    <div class="container mx-auto px-4 py-3">
      <div class="flex flex-col space-y-3">
        <a href="#home" class="nav-link-mobile active">Home</a>
        <a href="#features" class="nav-link-mobile">Services</a>
        <a href="#properties" class="nav-link-mobile">Properties</a>
        <a href="#pricing" class="nav-link-mobile">Subscription</a>
        <a href="#testimonials" class="nav-link-mobile">Reviews</a>
        <a href="#faq" class="nav-link-mobile">FAQ</a>
        <div class="pt-2 border-t border-gray-800 mt-2">
          <input type="text" placeholder="Search..." class="w-full bg-gray-800 border border-gray-700 rounded-full py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
        </div>
        <div class="pt-2 border-t border-gray-800 mt-2 flex items-center space-x-4">
          <a href="login.html" class="text-sm font-medium text-purple-400 hover:text-purple-300">Login</a>
          <a href="register.html" class="text-sm font-medium bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full hover:shadow-md transition-all">Register</a>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
  // Toggle mobile menu
  document.getElementById('mobileMenuButton').addEventListener('click', function() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
    this.innerHTML = menu.classList.contains('hidden') ? 
      '<i class="fas fa-bars text-2xl"></i>' : 
      '<i class="fas fa-times text-2xl"></i>';
  });

  // Toggle notifications dropdown
  const notificationButton = document.querySelector('.relative button.fa-bell').parentElement;
  notificationButton.addEventListener('click', function(e) {
    e.stopPropagation();
    document.querySelector('.notification-dropdown').classList.toggle('hidden');
  });

  // Close dropdowns when clicking outside
  document.addEventListener('click', function() {
    document.querySelector('.notification-dropdown').classList.add('hidden');
  });

  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 10) {
      navbar.classList.add('bg-gray-900');
      navbar.classList.remove('bg-gray-900/80');
    } else {
      navbar.classList.remove('bg-gray-900');
      navbar.classList.add('bg-gray-900/80');
    }
  });
</script>

<style>
  .nav-link {
    @apply px-4 py-2 text-gray-300 hover:text-white transition-colors duration-200;
  }
  
  .nav-link.active {
    @apply text-white;
  }
  
  .nav-link-mobile {
    @apply block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition-colors;
  }
  
  .nav-link-mobile.active {
    @apply text-white bg-gray-800;
  }
  
  .profile-dropdown {
    @apply hidden absolute right-0 mt-2 w-56 bg-gray-800 rounded-lg shadow-xl border border-gray-700 py-2 z-50;
  }
  
  .notification-dropdown {
    @apply hidden absolute right-0 mt-2 w-72 bg-gray-800 rounded-lg shadow-xl border border-gray-700 py-2 z-50;
  }
  
  .bg-size-200 {
    background-size: 200% auto;
  }
</style>
<!-- Advanced Popup Notification -->
<div id="popup" class="fixed bottom-6 left-6 z-50 bg-gradient-to-r from-purple-700 to-pink-600 text-white px-6 py-4 rounded-2xl shadow-2xl opacity-0 pointer-events-none transition-all duration-500 ease-in-out transform translate-y-5 max-w-xs w-full flex items-start space-x-3">
  <div class="text-2xl animate-bounce">📢</div>
  <div class="flex-1">
    <div id="popup-message" class="text-sm font-medium leading-snug"></div>
    <div class="h-1 bg-white/30 rounded-full mt-3 overflow-hidden">
      <div id="progress-bar" class="h-full bg-yellow-300 transition-all duration-[5000ms] ease-linear w-0"></div>
    </div>
  </div>
  <button onclick="hidePopup()" class="text-white text-lg ml-2 hover:text-yellow-300 transition duration-300">&times;</button>
</div>

<script>
  const popup = document.getElementById("popup");
  const messageSpan = document.getElementById("popup-message");
  const progressBar = document.getElementById("progress-bar");

  const messages = [
    "🏡 Hurry up! Canada plot is getting sold!",
    "💎 Big discount on Mumbai penthouse!",
    "🌆 Dubai apartments now open for booking!",
    "🚨 New project launched in New York!",
    "🌴 Goa villa prices slashed for limited time!",
    "📣 Bangalore tech park offices available!",
    "✨ Early bird offer for Singapore sky condo!",
    "🔥 Pune townhouses almost gone!",
    "🎯 Limited flats left in Delhi metro zone!",
    "🕐 Book now & save 15% on Kolkata property!"
  ];

  let popupTimeout;

  function showPopup() {
    const message = messages[Math.floor(Math.random() * messages.length)];
    messageSpan.textContent = message;
    popup.classList.remove("opacity-0", "pointer-events-none", "translate-y-5");
    popup.classList.add("opacity-100", "pointer-events-auto", "translate-y-0");
    
    // Animate progress bar
    progressBar.classList.remove("w-0");
    progressBar.classList.add("w-full");

    // Auto-hide after 5s
    popupTimeout = setTimeout(() => {
      hidePopup();
    }, 5000);
  }

  function hidePopup() {
    clearTimeout(popupTimeout);
    popup.classList.add("opacity-0", "pointer-events-none", "translate-y-5");
    popup.classList.remove("opacity-100", "pointer-events-auto", "translate-y-0");
    progressBar.classList.remove("w-full");
    progressBar.classList.add("w-0");
  }

  // Show popup every 10s, with first appearing in 3s
  setTimeout(showPopup, 3000);
  setInterval(showPopup, 10000);
</script>


 <!-- Enhanced Hero Section -->
<section id="home" class="hero-gradient pt-28 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
  <div class="container mx-auto flex flex-col lg:flex-row items-center relative">
    <!-- Floating gradient blobs -->
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-purple-600 rounded-full filter blur-[90px] opacity-10 animate-float1"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-pink-600 rounded-full filter blur-[100px] opacity-10 animate-float2"></div>
    
    <!-- Content -->
    <div class="lg:w-1/2 mb-12 lg:mb-0 relative z-10">
      <div class="inline-block bg-purple-900/30 backdrop-blur-sm px-4 py-2 rounded-full mb-6 border border-purple-500/30">
        <p class="text-sm text-purple-300 flex items-center">
          <span class="inline-block w-2 h-2 bg-purple-400 rounded-full mr-2 animate-pulse"></span>
          Trusted by 5,000+ property owners
        </p>
      </div>
      
      <h1 class="text-4xl sm:text-5xl md:text-6xl xl:text-7xl font-extrabold leading-tight mb-6 text-white">
        Discover Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Dream</span> Property
      </h1>
      
      <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-lg leading-relaxed">
        We revolutionize property management with seamless connections between owners and tenants. 
        Experience the future of real estate today.
      </p>
      
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mb-12">
        <a href="#properties" 
           class="relative overflow-hidden group bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full font-semibold hover:shadow-xl hover:shadow-purple-500/20 transition-all duration-300 text-center">
          <span class="relative z-10">Explore &rarr;</span>
          <span class="absolute inset-0 bg-gradient-to-r from-purple-700 to-pink-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
        </a>
      
      </div>
      
      <!-- Trust indicators -->
      <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-8">
        <div class="flex items-center">
          <div class="flex -space-x-3">
            <img src="https://randomuser.me/api/portraits/women/12.jpg" class="w-12 h-12 rounded-full border-2 border-purple-500 hover:scale-110 transition-transform">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full border-2 border-purple-500 hover:scale-110 transition-transform">
            <img src="https://randomuser.me/api/portraits/women/45.jpg" class="w-12 h-12 rounded-full border-2 border-purple-500 hover:scale-110 transition-transform">
          </div>
          <div class="ml-4">
            <p class="text-sm text-gray-300">Join <span class="font-bold text-white">5,000+</span> satisfied clients</p>
            <div class="flex items-center text-yellow-400">
              ★★★★★ <span class="ml-2 text-white text-sm">4.9/5 (1,200+ reviews)</span>
            </div>
          </div>
        </div>
        
        <div class="flex items-center space-x-2 bg-gray-900/50 px-4 py-2 rounded-full border border-gray-800">
          <div class="flex space-x-1">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
          </div>
          <span class="text-xs text-gray-300">Live properties available</span>
        </div>
      </div>
    </div>
    
    <!-- Enhanced Video Showcase -->
<div class="lg:w-1/2 flex justify-center relative z-10 mt-12 lg:mt-0">
  <!-- Animated gradient blobs -->
  <div class="absolute -top-8 -left-8 w-28 h-28 bg-purple-500 rounded-full filter blur-3xl opacity-20 animate-float1"></div>
  <div class="absolute -bottom-8 -right-8 w-28 h-28 bg-pink-500 rounded-full filter blur-3xl opacity-20 animate-float2"></div>
  
  <!-- Video Container -->
  <div class="relative w-full max-w-xl group">
    <!-- Floating verified badge -->
    <div class="absolute -top-4 -right-4 z-20 bg-white/90 backdrop-blur-sm p-2 rounded-xl shadow-lg border border-white/20 transform rotate-3 hover:rotate-0 transition-transform duration-300">
      <div class="flex items-center">
        <div class="bg-green-100 p-2 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
       
      </div>
    </div>
    
    <!-- Video with hover effects -->
    <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white/10 transform group-hover:scale-[1.02] transition-all duration-500 hover:shadow-purple-500/20">
      <video 
        autoplay 
        loop 
        muted 
        playsinline 
        class="w-full h-auto floating"
        poster="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
      >
        <source src="https://assets.mixkit.co/videos/preview/mixkit-aerial-view-of-a-modern-house-in-the-middle-of-the-forest-15810-large.mp4" type="video/mp4">
        <!-- Fallback image -->
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Modern house" class="w-full h-full object-cover">
      </video>
      
      <!-- Property info overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex flex-col justify-end p-6 transition-all duration-500 group-hover:opacity-100">
        <div class="transform translate-y-5 group-hover:translate-y-0 transition-transform duration-300">
          <div class="flex items-center justify-between">
        
          <!-- Amenities list -->
      
      </div>
      
      <!-- Play/pause button (functional) -->
      <button class="absolute top-4 left-4 bg-black/50 text-white p-2 rounded-full backdrop-blur-sm hover:bg-purple-600/80 transition-all duration-300 opacity-0 group-hover:opacity-100" onclick="togglePlay(this)">
        <svg id="play-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
        </svg>
        <svg id="pause-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>
</div>

<!-- Animation styles -->
<style>
  @keyframes float1 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(-10px, -10px) scale(1.05); }
  }
  @keyframes float2 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(10px, 10px) scale(1.05); }
  }
  .animate-float1 { animation: float1 8s ease-in-out infinite; }
  .animate-float2 { animation: float2 10s ease-in-out infinite reverse; }
  .floating { animation: float1 6s ease-in-out infinite; }
</style>

<!-- Video play/pause functionality -->
<script>
  function togglePlay(button) {
    const video = button.closest('.group').querySelector('video');
    const playIcon = button.querySelector('#play-icon');
    const pauseIcon = button.querySelector('#pause-icon');
    
    if (video.paused) {
      video.play();
      playIcon.classList.add('hidden');
      pauseIcon.classList.remove('hidden');
    } else {
      video.pause();
      playIcon.classList.remove('hidden');
      pauseIcon.classList.add('hidden');
    }
  }
</script>
        
        <!-- Decorative floating elements -->
       
      </div>
    </div>
  </div>
</section>

<!-- Add these animations to your CSS -->
<style>
  @keyframes float1 {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-10px, -10px); }
  }
  @keyframes float2 {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(10px, 10px); }
  }
  .animate-float1 { animation: float1 8s ease-in-out infinite; }
  .animate-float2 { animation: float2 10s ease-in-out infinite; }
  .floating {
    animation: float1 6s ease-in-out infinite;
  }
</style>
  <!-- Features Section -->
  <section id="features" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-900 to-gray-800 relative overflow-hidden">
  <!-- Decorative elements -->
  <div class="absolute top-0 left-0 w-full h-full opacity-5">
    <div class="absolute top-20 left-10 w-40 h-40 rounded-full bg-purple-400 blur-3xl"></div>
    <div class="absolute bottom-10 right-20 w-60 h-60 rounded-full bg-indigo-500 blur-3xl"></div>
  </div>
  
  <div class="container mx-auto relative z-10">
    <div class="text-center mb-16">
      <span class="text-purple-400 font-semibold tracking-wider text-sm uppercase">WHY CHOOSE US</span>
      <h2 class="text-4xl sm:text-5xl font-bold mt-4 mb-6 bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-indigo-300">
        Premium Property Management Services
      </h2>
      <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed">
        We provide comprehensive solutions for property owners and tenants, making the entire process <span class="text-purple-300 font-medium">seamless</span> and <span class="text-purple-300 font-medium">stress-free</span>.
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-file-contract text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">Legal Assistance</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          Our legal team handles all documentation and contracts, ensuring compliance with local regulations and protecting your interests.
        </p>
        <div class="mt-4">
          <a href="exploreallservice.php" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
      
      <!-- Feature 2 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-search-dollar text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">Free Valuation</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          Get an accurate market valuation of your property from our experts to help you make informed pricing decisions.
        </p>
        <div class="mt-4">
          <a href="exploreallservice.php" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
      
      <!-- Feature 3 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-headset text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">24/7 Support</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          Our dedicated support team is available round the clock to address any concerns or emergencies you may have.
        </p>
        <div class="mt-4">
          <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
      
      <!-- Feature 4 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-shield-alt text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">Tenant Screening</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          We thoroughly vet all potential tenants with background checks, credit reports, and rental history verification.
        </p>
        <div class="mt-4">
          <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
      
      <!-- Feature 5 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-coins text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">Rent Collection</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          Automated rent collection system with multiple payment options and timely reminders for tenants.
        </p>
        <div class="mt-4">
          <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
      
      <!-- Feature 6 -->
      <div class="feature-card group p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-300 hover:-translate-y-2 shadow-lg hover:shadow-purple-500/10">
        <div class="w-16 h-16 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-all">
          <i class="fas fa-tools text-3xl text-purple-400"></i>
        </div>
        <h3 class="text-xl font-bold mb-3 text-white">Maintenance</h3>
        <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
          Access to our network of trusted contractors for all maintenance needs, with quality assurance.
        </p>
        <div class="mt-4">
          <a href="#" class="text-purple-400 hover:text-purple-300 font-medium text-sm flex items-center group-hover:underline">
            Learn more <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
          </a>
        </div>
      </div>
    </div>
    
    <div class="text-center mt-16">
      <a href="exploreallservice.php" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-purple-500/20 transition-all duration-300 hover:-translate-y-1">
        Explore All Services
        <i class="fas fa-chevron-right ml-2 text-sm"></i>
      </a>
    </div>
  </div>
</section>
  <!-- Properties Section -->
  <section id="properties" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
    <div class="container mx-auto">
      <div class="text-center mb-16"><!-- Properties Section -->
<section id="properties" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
  <div class="container mx-auto">
    <div class="text-center mb-16">
      <span class="text-purple-400 font-semibold">OUR LISTINGS</span>
      <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4">Featured Properties</h2>
      <p class="text-gray-400 max-w-2xl mx-auto">
        Explore our curated selection of premium properties available for rent or purchase.
      </p>
    </div>
    
    <!-- Horizontal scrolling container -->
    <div class="relative">
      <div class="property-scroll-container overflow-x-auto pb-6 -mx-4 px-4">
        <div class="property-cards flex flex-nowrap gap-8 w-max">
          <!-- Property 1 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                   alt="Modern apartment" class="w-full h-64 object-cover">
              <div class="property-badge bg-purple-600 text-white">
                For Rent
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
              
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Luxury Apartment in Mumbai</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Bandra West, Mumbai
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-bed text-purple-400 mr-1"></i> 3 Beds</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 2 Baths</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 1200 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹85,000<span class="text-sm text-gray-400">/month</span></span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="1">
                  View Details
                </button>
              </div>
            </div>
          </div>
          
          <!-- Property 2 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                   alt="Modern house" class="w-full h-64 object-cover">
              <div class="property-badge bg-pink-600 text-white">
                For Sale
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Modern Villa in Bangalore</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Whitefield, Bangalore
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-bed text-purple-400 mr-1"></i> 4 Beds</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2200 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹2.5 Crore</span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="2">
                  View Details
                </button>
              </div>
            </div>
          </div>
          
          <!-- Property 3 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                   alt="Studio apartment" class="w-full h-64 object-cover">
              <div class="property-badge bg-purple-600 text-white">
                For Rent
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Cozy Studio in Delhi</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Connaught Place, Delhi
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-bed text-purple-400 mr-1"></i> 1 Bed</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 1 Bath</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 600 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹25,000<span class="text-sm text-gray-400">/month</span></span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="3">
                  View Details
                </button>
              </div>
            </div>
          </div>
          
          <!-- Property 4 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                   alt="Luxury villa" class="w-full h-64 object-cover">
              <div class="property-badge bg-pink-600 text-white">
                For Sale
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Luxury Villa in Goa</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Candolim, Goa
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-bed text-purple-400 mr-1"></i> 5 Beds</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 4 Baths</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 3500 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹4.8 Crore</span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="4">
                  View Details
                </button>
              </div>
            </div>
          </div>
          
          <!-- Property 5 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                   alt="Penthouse" class="w-full h-64 object-cover">
              <div class="property-badge bg-purple-600 text-white">
                For Rent
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Penthouse in Hyderabad</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Jubilee Hills, Hyderabad
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-bed text-purple-400 mr-1"></i> 3 Beds</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2800 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹1,20,000<span class="text-sm text-gray-400">/month</span></span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="5">
                  View Details
                </button>
              </div>
            </div>
          </div>
          
          <!-- Property 6 -->
          <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10 w-80 flex-shrink-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80" 
                   alt="Commercial property" class="w-full h-64 object-cover">
              <div class="property-badge bg-blue-600 text-white">
                Commercial
              </div>
              <button class="favorite-btn absolute top-2 right-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
        onclick="toggleFavorite(this)">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-6 w-6 text-white heart-icon" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
    </svg>
</button>

<!-- Notification element -->
<div class="favorite-notification absolute top-12 left-2 bg-green-500 text-white px-3 py-1 rounded-lg text-sm hidden shadow-lg">
    Added to favorites!
</div>

<script>
function toggleFavorite(button) {
    const heartIcon = button.querySelector('.heart-icon');
    const notification = button.parentElement.querySelector('.favorite-notification');
    const isFavorited = !heartIcon.classList.contains('text-red-500');
    
    // Toggle heart color
    heartIcon.classList.toggle('text-red-500', isFavorited);
    heartIcon.classList.toggle('fill-red-500', isFavorited);
    
    // Show notification if favorited
    if (isFavorited) {
        notification.classList.remove('hidden');
        setTimeout(() => notification.classList.add('hidden'), 2000);
    }
    
    // Here you would typically send an AJAX request to your server
    // to update the favorite status in the database
    // For now, we'll just log to console
    console.log(`Property ${isFavorited ? 'added to' : 'removed from'} favorites`);
    
    // Prevent the default button behavior (navigation)
    return false;
}

// Check initial favorite status on page load
document.addEventListener('DOMContentLoaded', function() {
    // This would typically come from your server
    const initialFavorites = []; // Replace with actual favorite IDs
    
    initialFavorites.forEach(propertyId => {
        const heartIcon = document.querySelector(`[data-property-id="${propertyId}"] .heart-icon`);
        if (heartIcon) {
            heartIcon.classList.add('text-red-500', 'fill-red-500');
        }
    });
});
</script>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2">Office Space in Pune</h3>
              <p class="text-gray-400 mb-4">
                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Koregaon Park, Pune
              </p>
              <div class="flex justify-between text-gray-300 mb-4">
                <span><i class="fas fa-door-open text-purple-400 mr-1"></i> 6 Rooms</span>
                <span><i class="fas fa-bath text-purple-400 mr-1"></i> 2 Baths</span>
                <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 1800 sqft</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold">₹65,000<span class="text-sm text-gray-400">/month</span></span>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition view-details" data-property="6">
                  View Details
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Scroll hint -->
      <div class="text-center mt-4">
        <span class="text-gray-400 text-sm inline-flex items-center">
          <i class="fas fa-long-arrow-alt-right mr-2 animate-pulse"></i> Scroll horizontally to view more properties
        </span>
      </div>
    </div>
    
    <div class="text-center mt-12">
      <a href="allproperty.php" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition">
        View All Properties
      </a>
    </div>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const scroller = document.getElementById('propertyScroller');
    let isDown = false;
    let startX;
    let scrollLeft;
    let momentum;
    let lastScrollTime = 0;
    let lastScrollLeft = 0;
    let animationFrame;
    let isScrolling = false;

    // Mouse events
    scroller.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX - scroller.offsetLeft;
      scrollLeft = scroller.scrollLeft;
      scroller.style.cursor = 'grabbing';
      scroller.style.userSelect = 'none';
      cancelMomentum();
    });

    scroller.addEventListener('mouseleave', () => {
      if (isDown) {
        isDown = false;
        scroller.style.cursor = 'grab';
        startMomentum();
      }
    });

    scroller.addEventListener('mouseup', () => {
      isDown = false;
      scroller.style.cursor = 'grab';
      scroller.style.removeProperty('user-select');
      startMomentum();
    });

    scroller.addEventListener('mousemove', (e) => {
      if(!isDown) return;
      e.preventDefault();
      const x = e.pageX - scroller.offsetLeft;
      const walk = (x - startX) * 2; // Scroll multiplier
      scroller.scrollLeft = scrollLeft - walk;
      updateMomentumTracking();
    });

    // Touch events
    scroller.addEventListener('touchstart', (e) => {
      isDown = true;
      startX = e.touches[0].pageX - scroller.offsetLeft;
      scrollLeft = scroller.scrollLeft;
      cancelMomentum();
    }, { passive: true });

    scroller.addEventListener('touchend', () => {
      isDown = false;
      startMomentum();
    });

    scroller.addEventListener('touchmove', (e) => {
      if(!isDown) return;
      const x = e.touches[0].pageX - scroller.offsetLeft;
      const walk = (x - startX) * 2; // Scroll multiplier
      scroller.scrollLeft = scrollLeft - walk;
      updateMomentumTracking();
    }, { passive: true });

    // Momentum scrolling functions
    function updateMomentumTracking() {
      const now = Date.now();
      const timeDiff = now - lastScrollTime;
      
      if (timeDiff > 0) {
        momentum = (scroller.scrollLeft - lastScrollLeft) / timeDiff;
        lastScrollTime = now;
        lastScrollLeft = scroller.scrollLeft;
      }
    }

    function startMomentum() {
      cancelMomentum();
      isScrolling = true;
      momentum *= 15; // Adjust momentum strength
    
      const step = () => {
        if (!isDown && isScrolling && Math.abs(momentum) > 0.5) {
          scroller.scrollLeft += momentum;
          momentum *= 0.95; // Friction
          animationFrame = requestAnimationFrame(step);
        } else {
          isScrolling = false;
          snapToNearestCard();
        }
      };
      
      animationFrame = requestAnimationFrame(step);
    }

    function cancelMomentum() {
      isScrolling = false;
      cancelAnimationFrame(animationFrame);
    }

    // Snap to nearest card when scrolling stops
    function snapToNearestCard() {
      const cards = document.querySelectorAll('.property-card');
      let closestCard = null;
      let smallestDistance = Infinity;
      
      cards.forEach(card => {
        const cardRect = card.getBoundingClientRect();
        const scrollerRect = scroller.getBoundingClientRect();
        const distance = Math.abs(cardRect.left - scrollerRect.left);
        
        if (distance < smallestDistance) {
          smallestDistance = distance;
          closestCard = card;
        }
      });
      
      if (closestCard) {
        closestCard.scrollIntoView({
          behavior: 'smooth',
          block: 'nearest',
          inline: 'center'
        });
      }
    }

    // Wheel event with improved handling
    scroller.addEventListener('wheel', (e) => {
      // If user is scrolling mostly horizontally
      if(Math.abs(e.deltaX) > Math.abs(e.deltaY) || Math.abs(e.deltaX) > 5) {
        e.preventDefault();
        scroller.scrollLeft += e.deltaX + e.deltaY;
        updateMomentumTracking();
      }
    }, { passive: false });

    // Card hover effects
    const cards = document.querySelectorAll('.property-card');
    cards.forEach(card => {
      card.addEventListener('mouseenter', () => {
        if (!isDown) {
          card.classList.add('card-hover');
        }
      });
      
      card.addEventListener('mouseleave', () => {
        card.classList.remove('card-hover');
      });
      
      // Click/tap to center
      card.addEventListener('click', (e) => {
        if (!isDown) {
          e.stopPropagation();
          card.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center'
          });
        }
      });
    });
  });
</script>

<style>
  .property-scroll-container {
    cursor: grab;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    overflow-x: auto;
    overflow-y: hidden;
    padding-bottom: 16px; /* Space for scrollbar */
    mask-image: linear-gradient(
      to right, 
      transparent, 
      black 20%, 
      black 80%, 
      transparent
    );
  }
  
  .property-scroll-container:active {
    cursor: grabbing;
  }
  
  .property-card {
    scroll-snap-align: center;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    transform-origin: center center;
    will-change: transform;
    position: relative;
  }
  
  /* Hover effect for non-touch devices */
  @media (hover: hover) {
    .property-card:hover {
      transform: scale(1.03);
      z-index: 10;
    }
    
    .card-hover {
      transform: scale(1.03) !important;
      z-index: 10 !important;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 
                  0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    }
  }
  
  /* Active/focused card */
  .property-card:focus {
    outline: none;
    transform: scale(1.03);
    box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.5);
    z-index: 10;
  }
  
  /* Gradient fade effect on scroll container edges */
  .property-scroll-container::before,
  .property-scroll-container::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 60px;
    pointer-events: none;
    z-index: 2;
  }
  
  .property-scroll-container::before {
    left: 0;
    background: linear-gradient(to right, rgba(15, 23, 42, 1), rgba(15, 23, 42, 0));
  }
  
  .property-scroll-container::after {
    right: 0;
    background: linear-gradient(to left, rgba(15, 23, 42, 1), rgba(15, 23, 42, 0));
  }
  
  /* Custom scrollbar styling */
  .property-scroll-container::-webkit-scrollbar {
    height: 6px;
    background: transparent;
  }
  
  .property-scroll-container::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    margin: 0 60px;
  }
  
  .property-scroll-container::-webkit-scrollbar-thumb {
    background: linear-gradient(to right, rgba(168, 85, 247, 0.6), rgba(236, 72, 153, 0.6));
    border-radius: 10px;
    background-size: 200% 100%;
    animation: scrollbarGradient 2s ease infinite;
  }
  
  .property-scroll-container::-webkit-scrollbar-thumb:hover {
    background: rgba(168, 85, 247, 0.9);
  }
  
  @keyframes scrollbarGradient {
    0% { background-position: 100% 50%; }
    50% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
  }
  
  /* Card enter animation */
  @keyframes cardEnter {
    from {
      opacity: 0;
      transform: translateY(20px) scale(0.95);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }
  
  .property-card {
    animation: cardEnter 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
  }
  
  /* Stagger the animations */
  .property-card:nth-child(1) { animation-delay: 0.1s; }
  .property-card:nth-child(2) { animation-delay: 0.2s; }
  .property-card:nth-child(3) { animation-delay: 0.3s; }
  .property-card:nth-child(4) { animation-delay: 0.4s; }
  .property-card:nth-child(5) { animation-delay: 0.5s; }
  .property-card:nth-child(6) { animation-delay: 0.6s; }
</style>
     

  <!-- Property Details Modal -->
  <div id="propertyModal" class="modal">
    <div class="modal-content">
      <button id="closeModal" class="float-right text-gray-400 hover:text-white">
        <i class="fas fa-times text-2xl"></i>
      </button>
      
      <div id="modalContent">
        <!-- Content will be loaded here via JavaScript -->
      </div>
    </div>
  </div>

 <!-- Pricing Section -->
<section id="pricing" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
  <div class="container mx-auto">
    <div class="text-center mb-16">
      <span class="text-purple-400 font-semibold">OUR PLANS</span>
      <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4">Simple, Transparent Pricing</h2>
      <p class="text-gray-400 max-w-2xl mx-auto">
        Choose the plan that fits your needs. No hidden fees, cancel anytime.
      </p>
    </div>
    
    <!-- Carousel Wrapper -->
    <div class="relative max-w-6xl mx-auto">
      <div class="overflow-hidden">
        <div class="carousel-inner flex transition-transform duration-300 ease-in-out">
          <!-- Offers Slide -->
          <div class="carousel-slide w-full flex-shrink-0 px-2">
            <div class="pricing-card p-8 rounded-xl bg-gradient-to-br from-purple-900 to-gray-800 border border-purple-500">
              <h3 class="text-xl font-bold mb-2 text-white">Special Offers</h3>
              <p class="text-purple-200 mb-6">Limited time deals for our customers</p>
              <div class="space-y-6">
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-lg">
                  <h4 class="font-bold text-white mb-2">Annual Discount</h4>
                  <p class="text-gray-300 text-sm">Get 20% off when you subscribe for a full year</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-lg">
                  <h4 class="font-bold text-white mb-2">Referral Bonus</h4>
                  <p class="text-gray-300 text-sm">Earn 1 month free for every successful referral</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-lg">
                  <h4 class="font-bold text-white mb-2">Bundle Deal</h4>
                  <p class="text-gray-300 text-sm">Combine with other services for additional savings</p>
                </div>
              </div>
              <a href="#pricing" class="block mt-8 text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-medium transition">
                View All Offers
              </a>
            </div>
          </div>
          
          <!-- First Time Login Offer -->
          <div class="carousel-slide w-full flex-shrink-0 px-2">
            <div class="pricing-card p-8 rounded-xl bg-gradient-to-br from-pink-900 to-gray-800 border border-pink-500">
              <div class="popular-badge">NEW USER</div>
              <h3 class="text-xl font-bold mb-2 text-white">First-Time Offer</h3>
              <p class="text-pink-200 mb-6">Exclusive deal for new customers</p>
              <div class="mb-6">
                <span class="text-4xl font-bold text-white">50% OFF</span>
                <span class="text-pink-200">first month</span>
              </div>
              <ul class="space-y-3 mb-8">
                <li class="flex items-center text-gray-300">
                  <i class="fas fa-check-circle text-pink-400 mr-2"></i> Applies to any plan
                </li>
                <li class="flex items-center text-gray-300">
                  <i class="fas fa-check-circle text-pink-400 mr-2"></i> No commitment required
                </li>
                <li class="flex items-center text-gray-300">
                  <i class="fas fa-check-circle text-pink-400 mr-2"></i> Cancel anytime
                </li>
                <li class="flex items-center text-gray-300">
                  <i class="fas fa-check-circle text-pink-400 mr-2"></i> Full features included
                </li>
              </ul>
              <a href="register.php" class="block text-center bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-medium transition">
                Claim Offer
              </a>
            </div>
          </div>
          
          <!-- Pricing Plans (original content) -->
          <div class="carousel-slide w-full flex-shrink-0">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              <!-- Basic Plan -->
              <div class="pricing-card p-8 rounded-xl">
                <h3 class="text-xl font-bold mb-2">Basic</h3>
                <p class="text-gray-400 mb-6">Perfect for individual property owners</p>
                <div class="mb-6">
                  <span class="text-4xl font-bold">₹199</span>
                  <span class="text-gray-400">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> 1 Property Listing
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Tenant Screening
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Basic Support
                  </li>
                  <li class="flex items-center text-gray-400 line-through">
                    <i class="fas fa-times-circle text-gray-600 mr-2"></i> Maintenance Coordination
                  </li>
                  <li class="flex items-center text-gray-400 line-through">
                    <i class="fas fa-times-circle text-gray-600 mr-2"></i> Financial Reporting
                  </li>
                </ul>
                <a href="planbuying.php" class="block text-center bg-gray-800 hover:bg-gray-700 text-white py-3 rounded-lg font-medium transition">
                  Get Started
                </a>
              </div>
              
              <!-- Standard Plan -->
              <div class="pricing-card p-8 rounded-xl">
                <h3 class="text-xl font-bold mb-2">Standard</h3>
                <p class="text-gray-400 mb-6">For small portfolio owners</p>
                <div class="mb-6">
                  <span class="text-4xl font-bold">₹499</span>
                  <span class="text-gray-400">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Up to 5 Properties
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Advanced Screening
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Priority Support
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Maintenance Coordination
                  </li>
                  <li class="flex items-center text-gray-400 line-through">
                    <i class="fas fa-times-circle text-gray-600 mr-2"></i> Financial Reporting
                  </li>
                </ul>
                <a href="planbuying.php" class="block text-center bg-gray-800 hover:bg-gray-700 text-white py-3 rounded-lg font-medium transition">
                  Get Started
                </a>
              </div>
              
              <!-- Premium Plan (Popular) -->
              <div class="pricing-card popular p-8 rounded-xl relative">
                <div class="popular-badge">POPULAR</div>
                <h3 class="text-xl font-bold mb-2">Premium</h3>
                <p class="text-gray-400 mb-6">For professional property managers</p>
                <div class="mb-6">
                  <span class="text-4xl font-bold">₹999</span>
                  <span class="text-gray-400">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Unlimited Properties
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Premium Screening
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> 24/7 VIP Support
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Full Maintenance
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Financial Reporting
                  </li>
                </ul>
                <a href="planbuying.php" class="block text-center bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-lg font-medium hover:opacity-90 transition">
                  Get Started
                </a>
              </div>
              
              <!-- Enterprise Plan -->
              <div class="pricing-card p-8 rounded-xl">
                <h3 class="text-xl font-bold mb-2">Enterprise</h3>
                <p class="text-gray-400 mb-6">Custom solutions for large portfolios</p>
                <div class="mb-6">
                  <span class="text-4xl font-bold">Custom</span>
                </div>
                <ul class="space-y-3 mb-8">
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Unlimited Properties
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Custom Solutions
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> Dedicated Manager
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> API Access
                  </li>
                  <li class="flex items-center text-gray-300">
                    <i class="fas fa-check-circle text-purple-400 mr-2"></i> White Label Options
                  </li>
                </ul>
                <a href="planbuying.php" class="block text-center bg-gray-800 hover:bg-gray-700 text-white py-3 rounded-lg font-medium transition">
                  Contact Sales
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Carousel Navigation -->
      <button class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-gray-800 hover:bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center text-white z-10">
        <i class="fas fa-chevron-left"></i>
      </button>
      <button class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-gray-800 hover:bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center text-white z-10">
        <i class="fas fa-chevron-right"></i>
      </button>
      
      <!-- Carousel Indicators -->
      <div class="flex justify-center mt-6 space-x-2">
        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-700 hover:bg-gray-600 focus:outline-none"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-700 hover:bg-gray-600 focus:outline-none"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-purple-500 focus:outline-none"></button>
      </div>
    </div>
    
    <!-- Explore All Plans Button -->
    <div class="text-center mt-12">
      <a href="exploreallplan.php" class="inline-block px-8 py-3 bg-transparent border border-purple-500 text-purple-400 hover:bg-purple-900 hover:bg-opacity-30 rounded-lg font-medium transition">
        Explore All Plans
      </a>
    </div>
  </div>
</section>

<style>
  .pricing-card {
    background: rgba(31, 41, 55, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
  }
  .pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  }
  .popular-badge {
    position: absolute;
    top: -12px;
    right: 20px;
    background: linear-gradient(to right, #8B5CF6, #EC4899);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
  }
  .carousel-inner {
    width: 300%;
  }
  .carousel-slide {
    width: 33.333%;
    float: left;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const carouselInner = document.querySelector('.carousel-inner');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const indicators = document.querySelectorAll('.carousel-indicator');
    
    let currentIndex = 2; // Start with pricing plans visible
    
    function updateCarousel() {
      carouselInner.style.transform = `translateX(-${currentIndex * 33.333}%)`;
      
      // Update indicators
      indicators.forEach((indicator, index) => {
        if (index === currentIndex) {
          indicator.classList.add('bg-purple-500');
          indicator.classList.remove('bg-gray-700');
        } else {
          indicator.classList.remove('bg-purple-500');
          indicator.classList.add('bg-gray-700');
        }
      });
    }
    
    // Next button
    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateCarousel();
    });
    
    // Previous button
    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateCarousel();
    });
    
    // Indicator clicks
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        currentIndex = index;
        updateCarousel();
      });
    });
    
    // Initialize
    updateCarousel();
    
    // Touch support for mobile swiping
    let touchStartX = 0;
    let touchEndX = 0;
    
    carouselInner.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    });
    
    carouselInner.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });
    
    function handleSwipe() {
      if (touchEndX < touchStartX - 50) {
        // Swipe left
        currentIndex = (currentIndex + 1) % slides.length;
      } else if (touchEndX > touchStartX + 50) {
        // Swipe right
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      }
      updateCarousel();
    }
  });
</script>

  <!-- Testimonials Section -->
  <section id="testimonials" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-800">
    <div class="container mx-auto">
      <div class="text-center mb-16">
        <span class="text-purple-400 font-semibold">CLIENT REVIEWS</span>
        <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4">What Our Clients Say</h2>
        <p class="text-gray-400 max-w-2xl mx-auto">
          Don't just take our word for it - hear from our satisfied clients.
        </p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Testimonial 1 -->
        <div class="testimonial-card p-8 rounded-xl">
          <div class="flex items-center mb-6">
            <img src="https://randomuser.me/api/portraits/women/43.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold">Sarah Johnson</h4>
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
          </div>
          <p class="text-gray-300 italic">
            "Property Management made renting out my apartment so easy. They found great tenants quickly and handled all the paperwork. Highly recommend!"
          </p>
        </div>
        
        <!-- Testimonial 2 -->
        <div class="testimonial-card p-8 rounded-xl">
          <div class="flex items-center mb-6">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold">Michael Chen</h4>
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
          </div>
          <p class="text-gray-300 italic">
            "As a tenant, I appreciate how responsive and professional the Property Management team is. Any maintenance issues are resolved within hours."
          </p>
        </div>
        
        <!-- Testimonial 3 -->
        <div class="testimonial-card p-8 rounded-xl">
          <div class="flex items-center mb-6">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <h4 class="font-bold">Emily Rodriguez</h4>
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
            </div>
          </div>
          <p class="text-gray-300 italic">
            "Managing multiple rental properties used to be stressful. Property Management streamlined everything and increased my rental income by 20%."
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900">
    <div class="container mx-auto max-w-4xl">
      <div class="text-center mb-16">
        <span class="text-purple-400 font-semibold">HAVE QUESTIONS?</span>
        <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4">Frequently Asked Questions</h2>
        <p class="text-gray-400 max-w-2xl mx-auto">
          Find answers to common questions about our services.
        </p>
      </div>
      
      <div class="space-y-4">
        <!-- FAQ Item 1 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden">
          <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
          <h3 class="text-2xl font-bold mb-6">🏠 How to List Your Property with Property Management.com</h4>
          <i class="fas fa-chevron-down text-purple-400 transition-transform"></i>
          </button>
          <div class="faq-content px-6 pb-6 hidden">
          <div class="bg-gray-900 text-white px-6 py-10 rounded-xl max-w-3xl mx-auto shadow-lg">
  <ul class="space-y-4 text-gray-300 text-base list-none">
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Visit the Website:</strong> Go to the official Propertymanagement website.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Find the "List Your Home" Section:</strong> Look for the “List Your Home” option on the homepage.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Fill Out the Form:</strong> Provide details about your property (location, type, features, etc.).</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Submit the Form:</strong> Click <em>Submit</em> to send your information to Property management.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Wait for a Response:</strong> Get a reply within 24 hours. Check your spam folder if needed.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Onboarding & Inspection:</strong> Property management ensures your property meets their standards or advises on upgrades.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Sign the Management Agreement:</strong> Sign the agreement outlining responsibilities and services.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Property ID Assignment:</strong> Receive your unique Property ID.</span>
    </li>
    <li class="flex items-start gap-3">
      <span class="text-green-400">✔️</span>
      <span><strong>Rent Analysis:</strong> Property management conducts an expected rent analysis with your input.</span>
    </li>
  </ul>
</div>

          </div>
        </div>
        
        <!-- FAQ Item 2 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden">
          <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
            <h3 class="text-lg font-semibold">What kind of tenant screening do you perform?</h3>
            <i class="fas fa-chevron-down text-purple-400 transition-transform"></i>
          </button>
          <div class="faq-content px-6 pb-6 hidden">
            <p class="text-gray-400">
              We conduct comprehensive tenant screening that includes credit checks, criminal background checks, 
              employment verification, and rental history verification. We also check references from previous 
              landlords to ensure you get reliable tenants.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 3 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden">
          <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
            <h3 class="text-lg font-semibold">How are maintenance requests handled?</h3>
            <i class="fas fa-chevron-down text-purple-400 transition-transform"></i>
          </button>
          <div class="faq-content px-6 pb-6 hidden">
            <p class="text-gray-400">
              Tenants can submit maintenance requests through our online portal or mobile app. 
              For urgent issues, they can call our 24/7 support line. We have a network of trusted 
              contractors who will address the issue promptly. You'll be notified of all requests 
              and can approve any non-emergency work before it begins.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden">
          <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
            <h3 class="text-lg font-semibold">What are your fees?</h3>
            <i class="fas fa-chevron-down text-purple-400 transition-transform"></i>
          </button>
          <div class="faq-content px-6 pb-6 hidden">
            <p class="text-gray-400">
              Our fees vary depending on the services you need and the plan you choose. 
              We offer transparent pricing with no hidden fees. Basic property listing is free, 
              while our full-service management plans start at 8% of monthly rent. 
              Check our Pricing section for detailed information.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 5 -->
        <div class="bg-gray-800 rounded-xl overflow-hidden">
          <button class="faq-toggle w-full flex justify-between items-center p-6 text-left">
            <h3 class="text-lg font-semibold">Can I cancel my subscription anytime?</h3>
            <i class="fas fa-chevron-down text-purple-400 transition-transform"></i>
          </button>
          <div class="faq-content px-6 pb-6 hidden">
            <p class="text-gray-400">
              Yes! There are no long-term contracts. You can cancel your subscription anytime 
              through your account settings. If you cancel mid-month, you'll have access to 
              all services until the end of your current billing period.
            </p>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-12">
        <p class="text-gray-400 mb-4">Still have questions?</p>
        <a href="#" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition">
          Contact Support
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-purple-900 to-pink-900">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl sm:text-4xl font-bold mb-6">Ready to Simplify Your Property Management?</h2>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-8">
        Join thousands of property owners who trust us with their investments. 
        Get started today and experience stress-free property management.
      </p>
      <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <a href="register.html" 
           class="bg-white text-purple-900 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition">
          Get Started - It's Free
        </a>
        <a href="#" 
           class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white/10 transition">
          Schedule a Demo
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 pt-16 pb-8 px-4 sm:px-6 lg:px-8 border-t border-gray-800">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <!-- Logo & About -->
        <div>
          <div class="flex items-center space-x-2 mb-4">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
              <i class="fas fa-home text-white"></i>
            </div>
            <span class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Property Management</span>
          </div>
          <p class="text-gray-400 mb-4">
            Premium property management services for owners and tenants. Making real estate simple and profitable.
          </p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-purple-400 transition">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-purple-400 transition">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-purple-400 transition">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-purple-400 transition">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        
        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#home" class="text-gray-400 hover:text-purple-400 transition">Home</a></li>
            <li><a href="#features" class="text-gray-400 hover:text-purple-400 transition">Features</a></li>
            <li><a href="#properties" class="text-gray-400 hover:text-purple-400 transition">Properties</a></li>
            <li><a href="#pricing" class="text-gray-400 hover:text-purple-400 transition">Pricing</a></li>
            <li><a href="#testimonials" class="text-gray-400 hover:text-purple-400 transition">Testimonials</a></li>
            <li><a href="#faq" class="text-gray-400 hover:text-purple-400 transition">FAQ</a></li>
          </ul>
        </div>
        
        <!-- Services -->
        <div>
          <h3 class="text-lg font-semibold text-white mb-4">Services</h3>
          <ul class="space-y-2">
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Property Listing</a></li>
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Tenant Screening</a></li>
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Rent Collection</a></li>
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Maintenance</a></li>
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Legal Assistance</a></li>
            <li><a href="exploreallservice.php" class="text-gray-400 hover:text-purple-400 transition">Property Valuation</a></li>
          </ul>
        </div>
        
        <!-- Contact -->
        <div>
          <h3 class="text-lg font-semibold text-white mb-4">Contact Us</h3>
          <ul class="space-y-3">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt text-purple-400 mt-1 mr-3"></i>
              <span class="text-gray-400">123 Property St, Mumbai, 400001</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-phone-alt text-purple-400 mr-3"></i>
              <span class="text-gray-400">+91 98765 43210</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-envelope text-purple-400 mr-3"></i>
              <span class="text-gray-400">info@property Management.com</span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-500 text-sm mb-4 md:mb-0">
          &copy; 2023 Property Management. All rights reserved.
        </p>
        <div class="flex space-x-6">
          <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">Privacy Policy</a>
          <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">Terms of Service</a>
          <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">Cookie Policy</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Chat Button -->
  <div class="fixed bottom-8 right-8 z-50">
    <button class="chat-button bg-gradient-to-br from-purple-600 to-pink-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg">
      <i class="fas fa-comment-dots text-xl"></i>
    </button>
  </div>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-24 right-8 z-50 bg-gray-800 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg border border-gray-700 hover:bg-gray-700 transition opacity-0 invisible">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- JavaScript -->
  <script>
    // Property data for modal
    const properties = {
      1: {
        title: "Luxury Apartment in Mumbai",
        location: "Bandra West, Mumbai",
        type: "Apartment",
        status: "For Rent",
        price: "₹85,000/month",
        deposit: "₹1,70,000 (2 months rent)",
        beds: 3,
        baths: 2,
        area: "1200 sqft",
        yearBuilt: 2018,
        description: "This stunning luxury apartment in the heart of Bandra West offers breathtaking sea views and premium amenities. The property features a spacious living area, modern kitchen with high-end appliances, and a master bedroom with walk-in closet. The building includes 24/7 security, swimming pool, gym, and concierge services.",
        amenities: ["Swimming Pool", "Gym", "24/7 Security", "Concierge", "Parking", "Elevator", "AC", "Furnished"],
        images: [
          "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80",
          "https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      },
      2: {
        title: "Modern Villa in Bangalore",
        location: "Whitefield, Bangalore",
        type: "Villa",
        status: "For Sale",
        price: "₹2.5 Crore",
        beds: 4,
        baths: 3,
        area: "2200 sqft",
        yearBuilt: 2020,
        description: "This contemporary villa in the prestigious Whitefield area offers luxury living with modern design. The property features a landscaped garden, private terrace, open-plan living area, and high-end finishes throughout. The gated community includes 24/7 security, clubhouse, and children's play area.",
        amenities: ["Garden", "Terrace", "Parking", "Gated Community", "Clubhouse", "Play Area", "AC", "Modular Kitchen"],
        images: [
          "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600607688969-a5bfcd646154?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      },
      3: {
        title: "Cozy Studio in Delhi",
        location: "Connaught Place, Delhi",
        type: "Studio Apartment",
        status: "For Rent",
        price: "₹25,000/month",
        deposit: "₹50,000 (2 months rent)",
        beds: 1,
        baths: 1,
        area: "600 sqft",
        yearBuilt: 2015,
        description: "This charming studio apartment in the heart of Connaught Place is perfect for young professionals. The space is efficiently designed with a combined living/sleeping area, compact kitchenette, and modern bathroom. The building offers 24/7 security and is within walking distance to metro stations, restaurants, and shopping.",
        amenities: ["24/7 Security", "Near Metro", "AC", "Furnished", "WiFi", "Housekeeping", "Laundry"],
        images: [
          "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80",
          "https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      },
      4: {
        title: "Luxury Villa in Goa",
        location: "Candolim, Goa",
        type: "Villa",
        status: "For Sale",
        price: "₹4.8 Crore",
        beds: 5,
        baths: 4,
        area: "3500 sqft",
        yearBuilt: 2019,
        description: "This stunning luxury villa in Candolim offers the perfect blend of modern design and tropical living. The property features a private pool, spacious outdoor entertaining area, and high-end finishes throughout. Located just minutes from the beach, this villa is ideal as a vacation home or permanent residence.",
        amenities: ["Private Pool", "Garden", "Parking", "AC", "Furnished", "Sea View", "Near Beach", "Security"],
        images: [
          "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600607688969-a5bfcd646154?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      },
      5: {
        title: "Penthouse in Hyderabad",
        location: "Jubilee Hills, Hyderabad",
        type: "Penthouse",
        status: "For Rent",
        price: "₹1,20,000/month",
        deposit: "₹2,40,000 (2 months rent)",
        beds: 3,
        baths: 3,
        area: "2800 sqft",
        yearBuilt: 2021,
        description: "This exquisite penthouse in Jubilee Hills offers panoramic city views and luxurious living spaces. The property features a spacious terrace, modern kitchen with premium appliances, and floor-to-ceiling windows. Building amenities include a rooftop pool, gym, and 24/7 concierge service.",
        amenities: ["Rooftop Pool", "Gym", "Terrace", "Concierge", "Parking", "AC", "Furnished", "Smart Home"],
        images: [
          "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1468&q=80",
          "https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      },
      6: {
        title: "Office Space in Pune",
        location: "Koregaon Park, Pune",
        type: "Commercial",
        status: "For Rent",
        price: "₹65,000/month",
        deposit: "₹1,30,000 (2 months rent)",
        rooms: 6,
        baths: 2,
        area: "1800 sqft",
        yearBuilt: 2017,
        description: "This premium office space in Koregaon Park is ideal for businesses looking for a prestigious address. The space features an open floor plan, meeting rooms, reception area, and high-speed internet connectivity. The building offers ample parking, 24/7 security, and proximity to restaurants and hotels.",
        amenities: ["Parking", "24/7 Security", "High-Speed Internet", "Meeting Rooms", "Reception", "AC", "Near Restaurants"],
        images: [
          "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80",
          "https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80",
          "https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
          "https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
        ]
      }
    };

    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('open');
      mobileMenuButton.innerHTML = mobileMenu.classList.contains('open') ? 
        '<i class="fas fa-times text-2xl"></i>' : 
        '<i class="fas fa-bars text-2xl"></i>';
    });
    
    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
    
    // Back to Top Button
    const backToTopButton = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
      } else {
        backToTopButton.classList.remove('opacity-100', 'visible');
        backToTopButton.classList.add('opacity-0', 'invisible');
      }
    });
    
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
    
    // FAQ Toggle
    const faqToggles = document.querySelectorAll('.faq-toggle');
    faqToggles.forEach(toggle => {
      toggle.addEventListener('click', () => {
        const content = toggle.nextElementSibling;
        const icon = toggle.querySelector('i');
        
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      });
    });
    
    // Profile Dropdown
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');
    
    profileButton.addEventListener('click', () => {
      profileDropdown.classList.toggle('show');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
        profileDropdown.classList.remove('show');
      }
    });
    
    // Property Modal
    const propertyModal = document.getElementById('propertyModal');
    const closeModal = document.getElementById('closeModal');
    const modalContent = document.getElementById('modalContent');
    const viewDetailsButtons = document.querySelectorAll('.view-details');
    
    viewDetailsButtons.forEach(button => {
      button.addEventListener('click', () => {
        const propertyId = button.getAttribute('data-property');
        const property = properties[propertyId];
        
        // Generate modal content
        let content = `
          <div class="property-modal-content">
            <h2 class="text-3xl font-bold mb-4">${property.title}</h2>
            <p class="text-gray-400 mb-6">
              <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> ${property.location}
            </p>
            
            <div class="property-gallery">
              <div class="gallery-main rounded-lg overflow-hidden">
                <img src="${property.images[0]}" alt="${property.title}" class="w-full h-full object-cover">
              </div>
              ${property.images.slice(1, 5).map(img => `
                <div class="gallery-thumb rounded-lg overflow-hidden">
                  <img src="${img}" alt="${property.title}" class="w-full h-full object-cover">
                </div>
              `).join('')}
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
              <div class="md:col-span-2">
                <h3 class="text-xl font-bold mb-4">Property Details</h3>
                <div class="grid grid-cols-2 gap-4 mb-6">
                  <div>
                    <p class="text-gray-400">Status</p>
                    <p class="font-semibold">${property.status}</p>
                  </div>
                  <div>
                    <p class="text-gray-400">Price</p>
                    <p class="font-semibold">${property.price}</p>
                  </div>
                  ${property.deposit ? `
                  <div>
                    <p class="text-gray-400">Deposit</p>
                    <p class="font-semibold">${property.deposit}</p>
                  </div>
                  ` : ''}
                  <div>
                    <p class="text-gray-400">Type</p>
                    <p class="font-semibold">${property.type}</p>
                  </div>
                  <div>
                    <p class="text-gray-400">${property.beds ? 'Bedrooms' : 'Rooms'}</p>
                    <p class="font-semibold">${property.beds || property.rooms}</p>
                  </div>
                  <div>
                    <p class="text-gray-400">Bathrooms</p>
                    <p class="font-semibold">${property.baths}</p>
                  </div>
                  <div>
                    <p class="text-gray-400">Area</p>
                    <p class="font-semibold">${property.area}</p>
                  </div>
                  <div>
                    <p class="text-gray-400">Year Built</p>
                    <p class="font-semibold">${property.yearBuilt}</p>
                  </div>
                </div>
                
                <h3 class="text-xl font-bold mb-4">Description</h3>
                <p class="text-gray-400 mb-6">${property.description}</p>
                
                <h3 class="text-xl font-bold mb-4">Amenities</h3>
                <div class="amenities-grid mb-6">
                  ${property.amenities.map(amenity => `
                    <div class="flex items-center">
                      <i class="fas fa-check text-purple-400 mr-2"></i>
                      <span>${amenity}</span>
                    </div>
                  `).join('')}
                </div>
              </div>
              
              <div class="bg-gray-800 p-6 rounded-xl h-fit sticky top-4">
                <h3 class="text-xl font-bold mb-4">Schedule a Viewing</h3>
                <form>
                  <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Name</label>
                    <input type="text" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Email</label>
                    <input type="email" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Phone</label>
                    <input type="tel" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Preferred Date</label>
                    <input type="date" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                  </div>
                  <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Request Viewing
                  </button>
                </form>
                
                <div class="mt-6 pt-6 border-t border-gray-700">
                  <h3 class="text-xl font-bold mb-4">Contact Agent</h3>
                  <div class="flex items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full mr-3">
                    <div>
                      <p class="font-semibold">Priya Sharma</p>
                      <p class="text-gray-400 text-sm">Property Agent</p>
                    </div>
                  </div>
                  <div class="space-y-2">
                    <a href="#" class="flex items-center text-gray-400 hover:text-purple-400">
                      <i class="fas fa-phone-alt mr-2"></i> +91 98765 43210
                    </a>
                    <a href="#" class="flex items-center text-gray-400 hover:text-purple-400">
                      <i class="fas fa-envelope mr-2"></i> priya@propertyManagement.com
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `;
        
        modalContent.innerHTML = content;
        propertyModal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Add click event to gallery thumbs
        const thumbs = document.querySelectorAll('.gallery-thumb');
        const mainImage = document.querySelector('.gallery-main img');
        
        thumbs.forEach(thumb => {
          thumb.addEventListener('click', () => {
            const imgSrc = thumb.querySelector('img').src;
            mainImage.src = imgSrc;
          });
        });
      });
    });
    
    closeModal.addEventListener('click', () => {
      propertyModal.style.display = 'none';
      document.body.style.overflow = 'auto';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
      if (e.target === propertyModal) {
        propertyModal.style.display = 'none';
        document.body.style.overflow = 'auto';
      }
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
          
          // Close mobile menu if open
          if (mobileMenu.classList.contains('open')) {
            mobileMenu.classList.remove('open');
            mobileMenuButton.innerHTML = '<i class="fas fa-bars text-2xl"></i>';
          }
        }
      });
    });
    
    // Set active nav link based on scroll position
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    
    window.addEventListener('scroll', () => {
      let current = '';
      
      sections.forEach(section => {
        const sectionTop = section.offsetTop; 
        const sectionHeight = section.clientHeight;
        
        if (window.scrollY >= sectionTop - 100) {
          current = section.getAttribute('id');
        }
      });
      
      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
          link.classList.add('active');
        }
      });
    });
  </script>
</body>
</html>