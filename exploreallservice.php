<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Property Services | Elite Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --purple-400: #a855f7;
      --indigo-300: #818cf8;
      --gradient: linear-gradient(135deg, var(--purple-400), var(--indigo-300));
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at 10% 20%, #111827 0%, #0f172a 100%);
      color: #f3f4f6;
    }
    
    .gradient-text {
      background: var(--gradient);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }
    
    .service-card {
      perspective: 1000px;
      transform-style: preserve-3d;
    }
    
    .service-card-inner {
      transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
      transform-style: preserve-3d;
    }
    
    .service-card:hover .service-card-inner {
      transform: rotateY(10deg) rotateX(5deg) scale(1.02);
      box-shadow: 0 25px 50px -12px rgba(168, 85, 247, 0.25);
    }
    
    .service-icon {
      transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
      transform-style: preserve-3d;
    }
    
    .service-card:hover .service-icon {
      transform: rotateY(180deg) scale(1.1);
      background: var(--gradient);
    }
    
    .service-card:hover .service-icon i {
      color: white !important;
    }
    
    .feature-highlight {
      position: relative;
      display: inline-block;
    }
    
    .feature-highlight::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 2px;
      bottom: -4px;
      left: 0;
      background: var(--gradient);
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.4s cubic-bezier(0.86, 0, 0.07, 1);
    }
    
    .feature-highlight:hover::after {
      transform: scaleX(1);
      transform-origin: left;
    }
    
    .floating {
      animation: floating 6s ease-in-out infinite;
    }
    
    @keyframes floating {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-15px); }
      100% { transform: translateY(0px); }
    }
    
    .pulse {
      animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
    
    .glow {
      filter: drop-shadow(0 0 8px rgba(168, 85, 247, 0.6));
    }
    
    .hover-grow {
      transition: transform 0.3s ease;
    }
    
    .hover-grow:hover {
      transform: scale(1.05);
    }
    
    .parallax-bg {
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    
    .gradient-border {
      position: relative;
      border: 1px solid transparent;
      background-clip: padding-box;
    }
    
    .gradient-border::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: -1;
      margin: -1px;
      border-radius: inherit;
      background: var(--gradient);
      opacity: 0;
      transition: opacity 0.4s ease;
    }
    
    .gradient-border:hover::before {
      opacity: 1;
    }
    
    /* Particle background effect */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }
    
    .particle {
      position: absolute;
      background: rgba(168, 85, 247, 0.5);
      border-radius: 50%;
      animation: float linear infinite;
    }
    
    @keyframes float {
      0% {
        transform: translateY(0) translateX(0);
        opacity: 1;
      }
      100% {
        transform: translateY(-100vh) translateX(100px);
        opacity: 0;
      }
    }
    
    /* Scroll animation */
    .fade-in {
      opacity: 0;
      transition: opacity 0.6s ease, transform 0.6s ease;
      transform: translateY(20px);
    }
    
    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: #1f2937;
    }
    
    ::-webkit-scrollbar-thumb {
      background: var(--gradient);
      border-radius: 4px;
    }
  </style>
</head>
<body class="min-h-screen overflow-x-hidden">
  <!-- Animated Background Particles -->
  <div class="particles" id="particles"></div>
  
  <!-- Hero Section with Parallax Effect -->
  <section class="relative py-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-purple-900/20 to-indigo-900/10 z-0"></div>
    <div class="container mx-auto text-center relative z-10">
      <div class="floating inline-block mb-8">
        <span class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-sm font-semibold rounded-full shadow-lg">
          Premium Property Solutions
        </span>
      </div>
      <h1 class="text-5xl md:text-7xl font-bold mb-6 gradient-text leading-tight">
        Elevate Your <span class="inline-block hover-grow">Real Estate</span> Experience
      </h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-10">
        Discover our comprehensive suite of property management services designed to maximize your returns while minimizing your stress.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="#services" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-lg hover:shadow-xl hover:shadow-purple-500/30 transition-all duration-300 hover:-translate-y-1 text-lg glow-on-hover">
          Explore Services <i class="fas fa-chevron-down ml-2"></i>
        </a>
        <a href="#contact" class="px-8 py-4 bg-transparent border-2 border-purple-500 text-white font-bold rounded-lg hover:bg-purple-500/10 transition-all duration-300 hover:-translate-y-1 text-lg">
          Get Started <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Stats Bar -->
  <div class="bg-gradient-to-r from-purple-900/30 to-indigo-900/30 border-y border-gray-800 py-8">
    <div class="container mx-auto">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="fade-in">
          <div class="text-4xl font-bold gradient-text mb-2" id="stat1">0</div>
          <div class="text-gray-300 uppercase text-sm tracking-wider">Properties Managed</div>
        </div>
        <div class="fade-in">
          <div class="text-4xl font-bold gradient-text mb-2" id="stat2">0</div>
          <div class="text-gray-300 uppercase text-sm tracking-wider">Satisfied Clients</div>
        </div>
        <div class="fade-in">
          <div class="text-4xl font-bold gradient-text mb-2" id="stat3">0%</div>
          <div class="text-gray-300 uppercase text-sm tracking-wider">Occupancy Rate</div>
        </div>
        <div class="fade-in">
          <div class="text-4xl font-bold gradient-text mb-2" id="stat4">0</div>
          <div class="text-gray-300 uppercase text-sm tracking-wider">Years Experience</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <section id="services" class="py-20 px-4 sm:px-6 lg:px-8 relative">
    <div class="container mx-auto">
      <div class="text-center mb-20 fade-in">
        <h2 class="text-4xl font-bold text-white mb-4">
          Our <span class="gradient-text">Comprehensive</span> Services
        </h2>
        <p class="text-gray-300 max-w-2xl mx-auto">
          Each service is meticulously designed to provide complete peace of mind and maximum returns on your investment.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Service Card 1 -->
        <div class="service-card fade-in">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-file-contract text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Legal Assistance</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Complete contract drafting and review by real estate attorneys</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Local regulation compliance monitoring</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Eviction protection and legal representation</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              Get Legal Support 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 2 -->
        <div class="service-card fade-in" style="transition-delay: 100ms">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-search-dollar text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Property Valuation</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">AI-powered comparative market analysis</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Rental yield optimization strategies</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Quarterly value reassessment reports</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              Request Valuation 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 3 -->
        <div class="service-card fade-in" style="transition-delay: 200ms">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-user-shield text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Tenant Screening</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Comprehensive credit & background checks</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Employment & income verification</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Previous landlord reference checks</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              Screen Tenants 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 4 -->
        <div class="service-card fade-in" style="transition-delay: 300ms">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-receipt text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Rent Collection</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Automated payment processing system</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Customizable late fee enforcement</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Detailed payment history tracking</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              Payment Options 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 5 -->
        <div class="service-card fade-in" style="transition-delay: 400ms">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-tools text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Maintenance</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">24/7 emergency repair coordination</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Vetted contractor network</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Preventative maintenance programs</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              Maintenance Plans 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 6 -->
        <div class="service-card fade-in" style="transition-delay: 500ms">
          <div class="service-card-inner h-full p-8 rounded-xl bg-gray-800/50 backdrop-blur-sm border border-gray-700 hover:border-purple-400/30 transition-all duration-500 gradient-border">
            <div class="service-icon w-20 h-20 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 mx-auto">
              <i class="fas fa-chart-line text-4xl text-purple-400"></i>
            </div>
            <h3 class="text-2xl font-bold mb-4 text-center text-white">Financial Reporting</h3>
            <ul class="space-y-3 mb-6">
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Detailed income/expense statements</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Automated year-end tax documentation</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check-circle text-purple-400 mt-1 mr-3"></i>
                <span class="text-gray-300">Customizable reporting formats</span>
              </li>
            </ul>
            <a href="#contact" class="feature-highlight mt-6 inline-flex items-center text-purple-400 font-medium group">
              View Reports 
              <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-900 to-gray-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-0 left-1/4 w-32 h-32 rounded-full bg-purple-500 filter blur-3xl"></div>
      <div class="absolute bottom-0 right-1/4 w-32 h-32 rounded-full bg-indigo-500 filter blur-3xl"></div>
    </div>
    <div class="container mx-auto relative">
      <div class="text-center mb-16 fade-in">
        <h2 class="text-4xl font-bold text-white mb-4">
          What Our <span class="gradient-text">Clients Say</span>
        </h2>
        <p class="text-gray-300 max-w-2xl mx-auto">
          Don't just take our word for it - hear from property owners who've transformed their investments with our services.
        </p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="fade-in bg-gray-800/50 p-8 rounded-xl border border-gray-700 hover:border-purple-400/30 transition-all duration-500 hover:-translate-y-2">
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center text-white font-bold mr-4">
              JD
            </div>
            <div>
              <h4 class="text-white font-semibold">James Donovan</h4>
              <p class="text-purple-400 text-sm">Property Investor</p>
            </div>
          </div>
          <p class="text-gray-300 italic mb-6">
            "The team's legal expertise saved me from a potentially disastrous lease agreement. Their attention to detail is unmatched in the industry."
          </p>
          <div class="flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        
        <!-- Testimonial 2 -->
        <div class="fade-in bg-gray-800/50 p-8 rounded-xl border border-gray-700 hover:border-purple-400/30 transition-all duration-500 hover:-translate-y-2" style="transition-delay: 100ms">
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center text-white font-bold mr-4">
              SM
            </div>
            <div>
              <h4 class="text-white font-semibold">Sarah Mitchell</h4>
              <p class="text-purple-400 text-sm">Real Estate Developer</p>
            </div>
          </div>
          <p class="text-gray-300 italic mb-6">
            "Their AI valuation tools helped me price my properties perfectly, resulting in 97% occupancy across my portfolio within weeks of listing."
          </p>
          <div class="flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        
        <!-- Testimonial 3 -->
        <div class="fade-in bg-gray-800/50 p-8 rounded-xl border border-gray-700 hover:border-purple-400/30 transition-all duration-500 hover:-translate-y-2" style="transition-delay: 200ms">
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center text-white font-bold mr-4">
              RK
            </div>
            <div>
              <h4 class="text-white font-semibold">Robert Kelly</h4>
              <p class="text-purple-400 text-sm">Commercial Landlord</p>
            </div>
          </div>
          <p class="text-gray-300 italic mb-6">
            "From tenant screening to maintenance coordination, they've streamlined every aspect of my property management. My stress levels have plummeted!"
          </p>
          <div class="flex text-yellow-400">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-purple-900/20 to-indigo-900/10 z-0"></div>
    <div class="container mx-auto text-center relative z-10">
      <div class="max-w-3xl mx-auto fade-in">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
          Ready to <span class="gradient-text">Transform</span> Your Property Management?
        </h2>
        <p class="text-xl text-gray-300 mb-10">
          Schedule a consultation with our experts today and discover how we can maximize your returns while minimizing your workload.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="tel:+1234567890" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-lg hover:shadow-xl hover:shadow-purple-500/30 transition-all duration-300 hover:-translate-y-1 text-lg glow-on-hover">
            <i class="fas fa-phone-alt mr-2"></i> Call Now
          </a>
          <a href="mailto:info@propertymanagement.com" class="px-8 py-4 bg-transparent border-2 border-purple-500 text-white font-bold rounded-lg hover:bg-purple-500/10 transition-all duration-300 hover:-translate-y-1 text-lg">
            <i class="fas fa-envelope mr-2"></i> Email Us
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900/80 border-t border-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="fade-in">
          <h3 class="text-white text-lg font-semibold mb-4">Property Elite</h3>
          <p class="text-gray-400">
            Premium property management solutions designed to maximize your investment returns with minimal effort.
          </p>
        </div>
        <div class="fade-in" style="transition-delay: 100ms">
          <h3 class="text-white text-lg font-semibold mb-4">Services</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Legal Assistance</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Property Valuation</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Tenant Screening</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Maintenance</a></li>
          </ul>
        </div>
        <div class="fade-in" style="transition-delay: 200ms">
          <h3 class="text-white text-lg font-semibold mb-4">Company</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">About Us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Our Team</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Careers</a></li>
            <li><a href="#" class="text-gray-400 hover:text-purple-400 transition">Blog</a></li>
          </ul>
        </div>
        <div class="fade-in" style="transition-delay: 300ms">
          <h3 class="text-white text-lg font-semibold mb-4">Connect</h3>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-purple-600 transition">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-purple-600 transition">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-purple-600 transition">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-purple-600 transition">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
          <div class="mt-6">
            <p class="text-gray-400 mb-2">Subscribe to our newsletter</p>
            <div class="flex">
              <input type="email" placeholder="Your email" class="px-4 py-2 bg-gray-800 text-white rounded-l-lg focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
              <button class="px-4 py-2 bg-purple-600 text-white rounded-r-lg hover:bg-purple-700 transition">
                <i class="fas fa-paper-plane"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm fade-in">
        <p>© 2023 Property Elite Management. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    // Animated background particles
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 30;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // Random size between 2px and 6px
        const size = Math.random() * 4 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.bottom = `-${size}px`;
        
        // Random animation duration between 10s and 20s
        const duration = Math.random() * 10 + 10;
        particle.style.animationDuration = `${duration}s`;
        
        // Random delay
        particle.style.animationDelay = `${Math.random() * 10}s`;
        
        particlesContainer.appendChild(particle);
      }
    }
    
    // Animated counter for stats
    function animateCounters() {
      const counters = document.querySelectorAll('[id^="stat"]');
      const speed = 200;
      
      counters.forEach(counter => {
        const target = counter.id === 'stat1' ? 1250 : 
                      counter.id === 'stat2' ? 850 : 
                      counter.id === 'stat3' ? 98 : 
                      15;
        const increment = target / speed;
        let current = 0;
        
        const updateCounter = () => {
          current += increment;
          if (current < target) {
            if (counter.id === 'stat3') {
              counter.textContent = `${Math.ceil(current)}%`;
            } else {
              counter.textContent = Math.ceil(current);
            }
            setTimeout(updateCounter, 1);
          } else {
            if (counter.id === 'stat3') {
              counter.textContent = `${target}%`;
            } else {
              counter.textContent = target;
            }
          }
        };
        
        updateCounter();
      });
    }
    
    // Scroll animation
    function checkScroll() {
      const elements = document.querySelectorAll('.fade-in');
      
      elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementTop < windowHeight - 100) {
          element.classList.add('visible');
        }
      });
    }
    
    // Initialize everything
    document.addEventListener('DOMContentLoaded', () => {
      createParticles();
      
      // Start counter animation when stats section is visible
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });
      
      const statsSection = document.querySelector('.bg-gradient-to-r');
      if (statsSection) {
        observer.observe(statsSection);
      }
      
      // Check scroll position on load and scroll
      checkScroll();
      window.addEventListener('scroll', checkScroll);
    });
  </script>
</body>
</html>