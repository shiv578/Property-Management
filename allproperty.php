<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties - PropertyPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Urbanist', sans-serif;
            scroll-behavior: smooth;
        }
        
        /* Property Card Animations */
        .property-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(168, 85, 247, 0.3);
        }
        
        .view-details-btn {
            transition: all 0.3s ease;
            transform: scale(1);
            position: relative;
            overflow: hidden;
        }
        
        .view-details-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(168, 85, 247, 0.4);
        }
        
        .view-details-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .view-details-btn:hover::after {
            left: 100%;
        }
        
        /* Modal Animations */
        .property-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            z-index: 1000;
            overflow-y: auto;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .modal-content {
            background-color: #111827;
            margin: 5% auto;
            padding: 30px;
            border-radius: 12px;
            max-width: 900px;
            transform: translateY(-50px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.1);
        }
        
        .modal-show {
            opacity: 1;
        }
        
        .modal-show .modal-content {
            transform: translateY(0);
        }
        
        .close-modal {
            color: #a78bfa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .close-modal:hover {
            color: #8b5cf6;
            transform: rotate(90deg);
        }
        
        /* Gallery Animation */
        .gallery-image {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .gallery-image:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        /* Amenities Animation */
        .amenity-item {
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 6px;
            background: rgba(255,255,255,0.05);
        }
        
        .amenity-item:hover {
            transform: translateX(5px);
            background: rgba(168, 85, 247, 0.1);
            color: #a78bfa;
        }
        
        /* Back Button Animation */
        .sticky-back-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .sticky-back-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 20px rgba(168, 85, 247, 0.3);
        }
        
        /* Property Badge */
        .property-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .property-badge:hover {
            transform: scale(1.1);
        }
        
        /* Price Pulse Animation */
        .price-tag {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gray-800 text-gray-100">
    <!-- Sticky Back Button -->
    <a href="dashboard.php" class="sticky-back-btn fixed bottom-8 right-8 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg flex items-center z-50">
        <i class="fas fa-home mr-2"></i> Back to Home
    </a>

    <!-- Properties Section -->
    <section id="properties" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <span class="text-purple-400 font-semibold">ALL PROPERTIES</span>
                <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4">Our Complete Portfolio</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Browse through our extensive collection of premium properties across India.
                </p>
            </div>
            
            <!-- Property Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Property 1 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Modern villa" class="w-full h-64 object-cover">                             <button>fav</button>


                        <div class="property-badge bg-pink-600 text-white">
                            For Sale
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Luxury Villa in Hyderabad</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Jubilee Hills, Hyderabad
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 4 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2800 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹3.2 Crore</span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(1)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Modern apartment" class="w-full h-64 object-cover">
                        <div class="property-badge bg-purple-600 text-white">
                            For Rent
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Premium Apartment in Mumbai</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Worli, Mumbai
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 3 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 2 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 1800 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹1,25,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(2)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Beach house" class="w-full h-64 object-cover">
                        <div class="property-badge bg-pink-600 text-white">
                            For Sale
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Beachfront Villa in Goa</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Morjim, Goa
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 5 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 4 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 3200 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹5.5 Crore</span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(3)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 4 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Penthouse" class="w-full h-64 object-cover">
                        <div class="property-badge bg-purple-600 text-white">
                            For Rent
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Luxury Penthouse in Delhi</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Vasant Vihar, Delhi
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 4 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 3000 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹2,50,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(4)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 5 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80" 
                             alt="Office space" class="w-full h-64 object-cover">
                        <div class="property-badge bg-blue-600 text-white">
                            Commercial
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Office Space in Bangalore</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Koramangala, Bangalore
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-door-open text-purple-400 mr-1"></i> 8 Cabins</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2500 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹85,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(5)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 6 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Studio apartment" class="w-full h-64 object-cover">
                        <div class="property-badge bg-purple-600 text-white">
                            For Rent
                        </div>
                  <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Designer Studio in Pune</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Kalyani Nagar, Pune
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 1 Bed</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 1 Bath</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 550 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹18,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(6)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 7 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Modern house" class="w-full h-64 object-cover">
                        <div class="property-badge bg-pink-600 text-white">
                            For Sale
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Contemporary Home in Chennai</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Besant Nagar, Chennai
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 3 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 2 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2000 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹1.8 Crore</span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(7)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 8 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Farmhouse" class="w-full h-64 object-cover">
                        <div class="property-badge bg-green-600 text-white">
                            Farmhouse
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Countryside Farmhouse in Alibaug</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Alibaug, Maharashtra
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 6 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 4 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 2 Acres</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹4.2 Crore</span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(8)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 9 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Luxury apartment" class="w-full h-64 object-cover">
                        <div class="property-badge bg-purple-600 text-white">
                            For Rent
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Executive Apartment in Gurgaon</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> DLF Phase 5, Gurgaon
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 2 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 2 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 1500 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹75,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(9)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 10 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Heritage home" class="w-full h-64 object-cover">
                        <div class="property-badge bg-yellow-600 text-white">
                            Heritage
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Heritage Bungalow in Kolkata</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Ballygunge, Kolkata
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 5 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 4000 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹3.8 Crore</span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(10)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 11 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1400&q=80" 
                             alt="Luxury penthouse with city view" class="w-full h-64 object-cover">
                        <div class="property-badge bg-purple-600 text-white">
                            Penthouse
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Skyline Penthouse in Mumbai</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Lower Parel, Mumbai
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-bed text-purple-400 mr-1"></i> 3 Beds</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 3.5 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 3200 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹3,75,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(11)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 12 -->
                <div class="property-card bg-gray-900 rounded-xl overflow-hidden hover:shadow-xl hover:shadow-purple-500/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Modern office space" class="w-full h-64 object-cover">
                        <div class="property-badge bg-blue-600 text-white">
                            Commercial
                        </div>
                        <button class="favorite-btn absolute top-2 left-2 bg-black/50 rounded-full p-2 hover:bg-pink-600/80 transition-colors"
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
                        <h3 class="text-xl font-bold mb-2">Tech Park Office in Pune</h3>
                        <p class="text-gray-400 mb-4">
                            <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> Hinjewadi, Pune
                        </p>
                        <div class="flex justify-between text-gray-300 mb-4">
                            <span><i class="fas fa-door-open text-purple-400 mr-1"></i> 12 Cabins</span>
                            <span><i class="fas fa-bath text-purple-400 mr-1"></i> 4 Baths</span>
                            <span><i class="fas fa-ruler-combined text-purple-400 mr-1"></i> 5000 sqft</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold price-tag">₹1,25,000<span class="text-sm text-gray-400">/month</span></span>
                            <button class="view-details-btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg" 
                                    onclick="showPropertyDetails(12)">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Details Modal -->
    <div id="propertyModal" class="property-modal">
        <div class="modal-content relative">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <div id="modalContent" class="mt-6">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>

    <script>
        // Property Data (would normally come from a database)
        const properties = {
            1: {
                title: "Luxury Villa in Hyderabad",
                location: "Jubilee Hills, Hyderabad",
                type: "Villa",
                status: "For Sale",
                price: "₹3.2 Crore",
                beds: 4,
                baths: 3,
                area: "2800 sqft",
                description: "This stunning contemporary villa offers luxurious living with panoramic city views. Featuring a private pool, landscaped gardens, and smart home technology throughout. The open floor plan includes a gourmet kitchen, home theater, and rooftop terrace perfect for entertaining.",
                mainImage: "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Swimming Pool", "Landscaped Garden", "Smart Home", "Home Theater", 
                    "Gourmet Kitchen", "Rooftop Terrace", "Parking (4 Cars)", "Security System",
                    "Central AC", "Walk-in Closets", "Maid's Room", "Solar Panels"
                ],
                agent: {
                    name: "Rahul Sharma",
                    phone: "+91 98765 43210",
                    email: "rahul@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/32.jpg"
                }
            },
            2: {
                title: "Premium Apartment in Mumbai",
                location: "Worli, Mumbai",
                type: "Apartment",
                status: "For Rent",
                price: "₹1,25,000/month",
                beds: 3,
                baths: 2,
                area: "1800 sqft",
                description: "Sophisticated high-rise apartment with breathtaking sea views. Features floor-to-ceiling windows, premium finishes, and access to building amenities including gym, pool, and 24/7 concierge service. Located in one of Mumbai's most prestigious neighborhoods.",
                mainImage: "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Sea View", "Floor-to-Ceiling Windows", "Concierge", "Swimming Pool",
                    "Gym", "Parking", "24/7 Security", "AC", "Modular Kitchen", "Balcony"
                ],
                agent: {
                    name: "Priya Patel",
                    phone: "+91 87654 32109",
                    email: "priya@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/44.jpg"
                }
            },
            3: {
                title: "Beachfront Villa in Goa",
                location: "Morjim, Goa",
                type: "Villa",
                status: "For Sale",
                price: "₹5.5 Crore",
                beds: 5,
                baths: 4,
                area: "3200 sqft",
                description: "Exclusive beachfront property with private beach access. This Portuguese-style villa features open living spaces, a chef's kitchen, infinity pool, and lush tropical gardens. Perfect as a vacation home or luxury rental property.",
                mainImage: "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600607688969-a5bfa64630c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Beach Access", "Infinity Pool", "Tropical Garden", "Chef's Kitchen",
                    "Outdoor Dining", "Staff Quarters", "Parking (6 Cars)", "Solar Heating",
                    "AC Throughout", "Home Office", "Security System", "Private Dock"
                ],
                agent: {
                    name: "Vikram Singh",
                    phone: "+91 76543 21098",
                    email: "vikram@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/75.jpg"
                }
            },
            4: {
                title: "Luxury Penthouse in Delhi",
                location: "Vasant Vihar, Delhi",
                type: "Penthouse",
                status: "For Rent",
                price: "₹2,50,000/month",
                beds: 4,
                baths: 3,
                area: "3000 sqft",
                description: "Ultra-luxurious penthouse in Delhi's most exclusive neighborhood. Features 360-degree city views, private elevator access, smart home automation, and premium designer finishes throughout. Includes access to building's spa and wellness center.",
                mainImage: "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1400&q=80",
                    "https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "360° City Views", "Private Elevator", "Smart Home", "Home Theater",
                    "Wine Cellar", "Spa Access", "Gym", "Concierge", "Secure Parking",
                    "Maid Service", "Central AC", "Balcony"
                ],
                agent: {
                    name: "Neha Gupta",
                    phone: "+91 65432 10987",
                    email: "neha@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/68.jpg"
                }
            },
            5: {
                title: "Office Space in Bangalore",
                location: "Koramangala, Bangalore",
                type: "Commercial",
                status: "For Rent",
                price: "₹85,000/month",
                beds: 0,
                baths: 3,
                area: "2500 sqft",
                description: "Premium office space in Bangalore's tech hub. Features modern interiors, high-speed internet, meeting rooms, and breakout areas. Ideal for startups or established businesses looking for a professional workspace in a prime location.",
                mainImage: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80",
                    "https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "High-Speed Internet", "Meeting Rooms", "Breakout Area", "Reception",
                    "Pantry", "AC", "Security", "Cleaning Service", "Elevator",
                    "Parking (10 Cars)", "Fire Safety", "Power Backup"
                ],
                agent: {
                    name: "Arjun Reddy",
                    phone: "+91 54321 09876",
                    email: "arjun@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/82.jpg"
                }
            },
            6: {
                title: "Designer Studio in Pune",
                location: "Kalyani Nagar, Pune",
                type: "Studio",
                status: "For Rent",
                price: "₹18,000/month",
                beds: 1,
                baths: 1,
                area: "550 sqft",
                description: "Chic and compact designer studio apartment perfect for young professionals. Features smart space solutions, modern kitchenette, and access to building amenities including gym and rooftop lounge.",
                mainImage: "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Smart Space Design", "Kitchenette", "Building Gym", "Rooftop Lounge",
                    "Laundry", "24/7 Security", "AC", "WiFi", "Housekeeping",
                    "Parking (1 Car)", "Elevator", "Balcony"
                ],
                agent: {
                    name: "Ananya Desai",
                    phone: "+91 43210 98765",
                    email: "ananya@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/33.jpg"
                }
            },
            7: {
                title: "Contemporary Home in Chennai",
                location: "Besant Nagar, Chennai",
                type: "House",
                status: "For Sale",
                price: "₹1.8 Crore",
                beds: 3,
                baths: 2,
                area: "2000 sqft",
                description: "Beautiful contemporary home just minutes from the beach. Features open-plan living, solar panels, rainwater harvesting, and a private garden. Perfect for families looking for sustainable living in a prime location.",
                mainImage: "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600607688969-a5bfa64630c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Solar Panels", "Rainwater Harvesting", "Private Garden", "Open Plan Living",
                    "Modular Kitchen", "Parking (2 Cars)", "Security", "AC", "Study Room",
                    "Terrace", "Walk-in Closets", "Maid's Room"
                ],
                agent: {
                    name: "Rohan Iyer",
                    phone: "+91 32109 87654",
                    email: "rohan@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/45.jpg"
                }
            },
            8: {
                title: "Countryside Farmhouse in Alibaug",
                location: "Alibaug, Maharashtra",
                type: "Farmhouse",
                status: "For Sale",
                price: "₹4.2 Crore",
                beds: 6,
                baths: 4,
                area: "2 Acres",
                description: "Sprawling countryside retreat with organic farm, swimming pool, and guest cottage. Perfect for those seeking a peaceful getaway or eco-friendly living. Includes fruit orchards and vegetable gardens.",
                mainImage: "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Organic Farm", "Swimming Pool", "Guest Cottage", "Fruit Orchards",
                    "Vegetable Garden", "Parking (6 Cars)", "Solar Power", "Rainwater Harvesting",
                    "Staff Quarters", "Outdoor Kitchen", "Security", "AC"
                ],
                agent: {
                    name: "Meera Joshi",
                    phone: "+91 21098 76543",
                    email: "meera@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/52.jpg"
                }
            },
            9: {
                title: "Executive Apartment in Gurgaon",
                location: "DLF Phase 5, Gurgaon",
                type: "Apartment",
                status: "For Rent",
                price: "₹75,000/month",
                beds: 2,
                baths: 2,
                area: "1500 sqft",
                description: "Sophisticated executive apartment in Gurgaon's business district. Features premium finishes, smart home features, and access to building amenities including pool, gym, and business center.",
                mainImage: "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1400&q=80",
                    "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Smart Home", "Building Pool", "Gym", "Business Center",
                    "Concierge", "Parking (2 Cars)", "24/7 Security", "AC",
                    "Modular Kitchen", "Balcony", "Housekeeping", "WiFi"
                ],
                agent: {
                    name: "Aditya Kapoor",
                    phone: "+91 10987 65432",
                    email: "aditya@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/28.jpg"
                }
            },
            10: {
                title: "Heritage Bungalow in Kolkata",
                location: "Ballygunge, Kolkata",
                type: "Bungalow",
                status: "For Sale",
                price: "₹3.8 Crore",
                beds: 5,
                baths: 3,
                area: "4000 sqft",
                description: "Exquisitely restored heritage bungalow with original architectural details. Features high ceilings, wooden floors, verandas, and a lush private garden. Modern amenities blended with old-world charm.",
                mainImage: "https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600607688969-a5bfa64630c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Original Architectural Details", "High Ceilings", "Wooden Floors", "Verandas",
                    "Private Garden", "Parking (4 Cars)", "Modern Kitchen", "AC",
                    "Staff Quarters", "Study", "Puja Room", "Security"
                ],
                agent: {
                    name: "Ishita Banerjee",
                    phone: "+91 98765 43210",
                    email: "ishita@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/63.jpg"
                }
            },
            11: {
                title: "Skyline Penthouse in Mumbai",
                location: "Lower Parel, Mumbai",
                type: "Penthouse",
                status: "For Rent",
                price: "₹3,75,000/month",
                beds: 3,
                baths: 3.5,
                area: "3200 sqft",
                description: "Breathtaking penthouse with panoramic views of Mumbai skyline and Arabian Sea. Features floor-to-ceiling windows, private terrace, smart home technology, and premium finishes throughout.",
                mainImage: "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1400&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1400&q=80",
                    "https://images.unsplash.com/photo-1600607688969-a5bfa64630c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                ],
                amenities: [
                    "Panoramic Views", "Private Terrace", "Smart Home", "Home Theater",
                    "Wine Cellar", "Concierge", "Gym Access", "Pool Access", "Parking (3 Cars)",
                    "Maid Service", "Central AC", "Walk-in Closets"
                ],
                agent: {
                    name: "Rajat Malhotra",
                    phone: "+91 87654 32109",
                    email: "rajat@propertypro.com",
                    image: "https://randomuser.me/api/portraits/men/65.jpg"
                }
            },
            12: {
                title: "Tech Park Office in Pune",
                location: "Hinjewadi, Pune",
                type: "Commercial",
                status: "For Rent",
                price: "₹1,25,000/month",
                beds: 0,
                baths: 4,
                area: "5000 sqft",
                description: "Modern office space in Pune's IT park. Features open floor plan, meeting rooms, high-speed internet, and 24/7 access. Perfect for tech companies looking for a professional workspace.",
                mainImage: "https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                gallery: [
                    "https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1497366811353-6870744d04b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80",
                    "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1680&q=80"
                ],
                amenities: [
                    "Open Floor Plan", "Meeting Rooms", "High-Speed Internet", "24/7 Access",
                    "Pantry", "AC", "Security", "Cleaning Service", "Elevator",
                    "Parking (15 Cars)", "Fire Safety", "Power Backup"
                ],
                agent: {
                    name: "Nandini Rao",
                    phone: "+91 76543 21098",
                    email: "nandini@propertypro.com",
                    image: "https://randomuser.me/api/portraits/women/71.jpg"
                }
            }
        };

        function showPropertyDetails(propertyId) {
            const property = properties[propertyId];
            if (!property) return;
            
            const modalContent = `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <div class="relative h-64 lg:h-96 rounded-xl overflow-hidden mb-4">
                            <img src="${property.mainImage}" alt="${property.title}" class="w-full h-full object-cover transition-opacity duration-300">
                        </div>
                        <div class="grid grid-cols-3 gap-2 mb-6">
                            ${property.gallery.map(img => `
                                <div class="gallery-image rounded-md overflow-hidden h-24 cursor-pointer" onclick="changeMainImage(this, '${img}')">
                                    <img src="${img}" class="w-full h-full object-cover">
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    
                    <div>
                        <h2 class="text-3xl font-bold mb-2">${property.title}</h2>
                        <div class="flex items-center mb-4">
                            <span class="bg-${property.status === 'For Sale' ? 'pink' : 'purple'}-600 text-white px-3 py-1 rounded-full text-sm font-semibold mr-3">
                                ${property.status}
                            </span>
                            <p class="text-gray-400">
                                <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i>${property.location}
                            </p>
                        </div>
                        
                        <div class="bg-gray-800 rounded-lg p-4 mb-6 transition-all duration-300 hover:shadow-lg">
                            <div class="flex justify-between mb-4">
                                <div class="text-center">
                                    <p class="text-gray-400">Beds</p>
                                    <p class="text-xl font-bold"><i class="fas fa-bed text-purple-400 mr-2"></i>${property.beds}</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-400">Baths</p>
                                    <p class="text-xl font-bold"><i class="fas fa-bath text-purple-400 mr-2"></i>${property.baths}</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-gray-400">Area</p>
                                    <p class="text-xl font-bold"><i class="fas fa-ruler-combined text-purple-400 mr-2"></i>${property.area}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-3xl font-bold text-purple-400 animate-pulse">${property.price}</p>
                            </div>
                        </div>
                        
                        <h3 class="text-xl font-bold mb-2">Description</h3>
                        <p class="text-gray-300 mb-6">${property.description}</p>
                        
                        <h3 class="text-xl font-bold mb-2">Amenities</h3>
                        <div class="grid grid-cols-2 gap-2 mb-6">
                            ${property.amenities.map(amenity => `
                                <div class="amenity-item flex items-center text-gray-300">
                                    <i class="fas fa-check-circle text-purple-400 mr-2"></i>${amenity}
                                </div>
                            `).join('')}
                        </div>
                        
                        <div class="bg-gray-800 rounded-lg p-4 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center mb-4">
                                <img src="${property.agent.image}" class="w-12 h-12 rounded-full object-cover mr-3">
                                <div>
                                    <h3 class="text-xl font-bold text-purple-400">Contact Agent</h3>
                                    <p class="text-gray-300">${property.agent.name}</p>
                                </div>
                            </div>
                            <div class="flex items-center mb-2">
                                <i class="fas fa-phone text-gray-400 mr-3 w-5"></i>
                                <a href="tel:${property.agent.phone}" class="hover:text-purple-400 transition">${property.agent.phone}</a>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-gray-400 mr-3 w-5"></i>
                                <a href="mailto:${property.agent.email}" class="hover:text-purple-400 transition">${property.agent.email}</a>
                            </div>
                            <button class="mt-4 w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition flex items-center justify-center">
                                <i class="fas fa-phone-alt mr-2"></i> Contact Now
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('modalContent').innerHTML = modalContent;
            
            const modal = document.getElementById('propertyModal');
            modal.style.display = 'block';
            setTimeout(() => {
                modal.classList.add('modal-show');
            }, 10);
            
            // Scroll to top of modal
            modal.scrollTo(0, 0);
        }
        
        function changeMainImage(element, newSrc) {
            const mainImage = document.querySelector('.modal-content .relative img');
            
            // Add click effect to thumbnail
            element.classList.add('ring-2', 'ring-purple-500');
            setTimeout(() => {
                element.classList.remove('ring-2', 'ring-purple-500');
            }, 300);
            
            // Fade out current image
            mainImage.style.opacity = '0';
            
            setTimeout(() => {
                // Change image source
                mainImage.src = newSrc;
                
                // Fade in new image
                setTimeout(() => {
                    mainImage.style.opacity = '1';
                }, 50);
            }, 300);
        }
        
        function closeModal() {
            const modal = document.getElementById('propertyModal');
            modal.classList.remove('modal-show');
            setTimeout(() => {
                modal.style.display = 'none';
                modal.style.opacity = '0';
            }, 400);
        }
        
        // Close modal when clicking outside content
        window.onclick = function(event) {
            const modal = document.getElementById('propertyModal');
            if (event.target == modal) {
                closeModal();
            }
        }
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            const modal = document.getElementById('propertyModal');
            if (event.key === "Escape" && modal.style.display === "block") {
                closeModal();
            }
        });
    </script>
</body>
</html>