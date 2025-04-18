<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plans | Property Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes shine {
      0% { background-position: 200% center; }
      100% { background-position: -200% center; }
    }

    .shine {
      background-image: linear-gradient(
        120deg,
        rgba(255, 255, 255, 0.1) 0%,
        rgba(255, 255, 255, 0.3) 50%,
        rgba(255, 255, 255, 0.1) 100%
      );
      background-size: 200% auto;
      animation: shine 2s linear infinite;
    }

    .glow {
      box-shadow: 0 0 15px rgba(139, 92, 246, 0.3);
    }

    .btn-hover-theme {
      transition: all 0.3s ease-in-out;
    }

    .btn-basic:hover {
      background-color: #a855f7; /* violet-500 */
    }

    .btn-standard:hover {
      background-color: #d946ef; /* fuchsia-500 */
    }

    .btn-premium:hover {
      background-color: #facc15; /* yellow-400 */
    }

    .btn-pro:hover {
      background-color: #22d3ee; /* cyan-400 */
    }

    .btn-enterprise:hover {
      background-color: #ec4899; /* pink-500 */
    }

    .btn-annual:hover {
      background-color: #84cc16; /* lime-500 */
    }
  </style>
</head>
<body class="bg-[#1a0b2e] text-white font-sans">

  <!-- Special Offer Banner -->
  <div class="py-6 px-8 bg-gradient-to-r from-purple-700 to-pink-600 text-white text-center shadow-lg">
    <h3 class="text-3xl font-extrabold mb-2">🎁 Limited Time Offer!</h3>
    <p class="text-lg mb-2">Get <span class="text-yellow-300 font-bold">25% OFF</span> your first 3 months if you subscribe today!</p>
    <div class="text-2xl font-bold text-yellow-300 mb-2" id="countdown-timer">Offer ends in: 00:00:00</div>
    <button class="bg-yellow-300 text-purple-900 px-6 py-2 rounded-full font-bold shadow-md hover:shadow-lg transition">Claim Offer</button>
  </div>

  <!-- Plans Section -->
  <section class="py-20 px-6">
    <div class="container mx-auto text-center max-w-7xl">
      <h2 class="text-5xl font-extrabold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">Flexible Plans for Every Property Owner</h2>
      <p class="text-purple-200 text-lg mb-14">Whether you're a solo landlord or a property management company, we've got you covered.</p>

      <div class="grid gap-10 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <!-- Basic -->
        <div class="bg-[#2a1344] rounded-3xl p-8 hover:scale-105 transition glow">
          <h3 class="text-2xl font-bold mb-2 text-purple-300">🏠 Basic Plan</h3>
          <p class="text-purple-200 mb-4">For landlords managing up to 2 properties.</p>
          <ul class="text-left text-purple-300 space-y-2 mb-4">
            <li>✅ Property Listings</li>
            <li>✅ Maintenance Tracking</li>
            <li>✅ Email Support</li>
          </ul>
          <p class="text-3xl font-bold">$49<span class="text-base">/mo</span></p>
          <button class="mt-5 w-full bg-purple-700 text-white py-2 rounded-xl font-semibold btn-hover-theme btn-basic shine">Buy Now</button>
        </div>

        <!-- Standard -->
        <div class="bg-[#351859] rounded-3xl p-8 hover:scale-105 transition glow scale-105">
          <h3 class="text-2xl font-bold mb-2 text-white">🏢 Standard Plan</h3>
          <p class="text-purple-200 mb-4">Up to 10 properties + rent collection.</p>
          <ul class="text-left text-purple-200 space-y-2 mb-4">
            <li>✅ All Basic Features</li>
            <li>✅ Rent Reminders</li>
            <li>✅ Full Screening</li>
          </ul>
          <p class="text-3xl font-bold">$99<span class="text-base">/mo</span></p>
          <button class="mt-5 w-full bg-white text-purple-800 py-2 rounded-xl font-semibold btn-hover-theme btn-standard">Buy Now</button>
        </div>

        <!-- Premium -->
        <div class="bg-[#2a1344] rounded-3xl p-8 hover:scale-105 transition glow">
          <h3 class="text-2xl font-bold mb-2 text-yellow-300">🏦 Premium Plan</h3>
          <p class="text-purple-200 mb-4">For managers with 10+ properties.</p>
          <ul class="text-left text-purple-300 space-y-2 mb-4">
            <li>✅ All Standard Features</li>
            <li>✅ Legal Assistance</li>
            <li>✅ 24/7 Dispatch</li>
          </ul>
          <p class="text-3xl font-bold">$149<span class="text-base">/mo</span></p>
          <button class="mt-5 w-full bg-purple-700 text-white py-2 rounded-xl font-semibold btn-hover-theme btn-premium shine">Buy Now</button>
        </div>

        <!-- Pro -->
        <div class="bg-[#3e1e6b] rounded-3xl p-8 hover:scale-105 transition glow">
          <h3 class="text-2xl font-bold mb-2 text-cyan-300">👨‍💼 Pro Plan</h3>
          <p class="text-purple-200 mb-4">Up to 50 properties + team tools.</p>
          <ul class="text-left text-purple-200 space-y-2 mb-4">
            <li>✅ Team Collaboration</li>
            <li>✅ Owner Reports</li>
            <li>✅ Custom Branding</li>
          </ul>
          <p class="text-3xl font-bold">$249<span class="text-base">/mo</span></p>
          <button class="mt-5 w-full bg-cyan-500 text-purple-900 py-2 rounded-xl font-bold btn-hover-theme btn-pro">Buy Now</button>
        </div>

        <!-- Enterprise -->
        <div class="bg-[#2a1344] rounded-3xl p-8 hover:scale-105 transition glow">
          <h3 class="text-2xl font-bold mb-2 text-pink-300">🏢 Enterprise</h3>
          <p class="text-purple-200 mb-4">100+ units, agencies & full features.</p>
          <ul class="text-left text-purple-200 space-y-2 mb-4">
            <li>✅ Unlimited Listings</li>
            <li>✅ Role-Based Access</li>
            <li>✅ Dedicated Manager</li>
          </ul>
          <p class="text-3xl font-bold">$499<span class="text-base">/mo</span></p>
          <button class="mt-5 w-full bg-pink-500 text-white py-2 rounded-xl font-bold btn-hover-theme btn-enterprise">Buy Now</button>
        </div>

        <!-- Annual Saver -->
        <div class="bg-[#351859] rounded-3xl p-8 hover:scale-105 transition glow">
          <h3 class="text-2xl font-bold mb-2 text-lime-300">💰 Annual Saver</h3>
          <p class="text-purple-200 mb-4">Pay once a year, save 2 months.</p>
          <ul class="text-left text-purple-200 space-y-2 mb-4">
            <li>✅ All Premium Features</li>
            <li>✅ 2 Months Free</li>
            <li>✅ Priority Rollouts</li>
          </ul>
          <p class="text-3xl font-bold">$1,490<span class="text-base">/yr</span></p>
          <button class="mt-5 w-full bg-lime-500 text-purple-900 py-2 rounded-xl font-bold btn-hover-theme btn-annual">Buy Now</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Timer Script -->
  <script>
    const countdown = () => {
      const end = new Date();
      end.setHours(end.getHours() + 1);
      const timer = setInterval(() => {
        const now = new Date().getTime();
        const distance = end - now;

        const hours = String(Math.floor((distance / (1000 * 60 * 60)) % 24)).padStart(2, "0");
        const minutes = String(Math.floor((distance / (1000 * 60)) % 60)).padStart(2, "0");
        const seconds = String(Math.floor((distance / 1000) % 60)).padStart(2, "0");

        document.getElementById("countdown-timer").textContent = `Offer ends in: ${hours}:${minutes}:${seconds}`;

        if (distance < 0) {
          clearInterval(timer);
          document.getElementById("countdown-timer").textContent = "Offer expired 😢";
        }
      }, 1000);
    };
    countdown();
  </script>
</body>
</html>
