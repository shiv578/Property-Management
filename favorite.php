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