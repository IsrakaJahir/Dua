<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dua App - Your Spiritual Companion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'islamic-green': '#2D5016',
                        'soft-green': '#7FB069',
                        'light-green': '#A7C957',
                        'gold': '#D4AF37',
                        'light-gold': '#F4E4BC'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Inter:wght@300;400;500;600&display=swap');
        
        .arabic-font {
            font-family: 'Amiri', serif;
        }
        
        .pattern-bg {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(127, 176, 105, 0.1) 0%, transparent 50%);
        }
        
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4AF37' fill-opacity='0.05'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm0 0c0 11.046 8.954 20 20 20s20-8.954 20-20-8.954-20-20-20-20 8.954-20 20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .recite-counter {
            background: linear-gradient(135deg, #7FB069 0%, #A7C957 100%);
        }
    </style>
</head>
<body class="bg-gray-50 font-['Inter']">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-islamic-green to-soft-green rounded-lg flex items-center justify-center">
                        <span class="text-white text-xl arabic-font">د</span>
                    </div>
                    <span class="text-xl font-semibold text-islamic-green">DuaApp</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-islamic-green font-medium border-b-2 border-gold pb-1">Home</a>
                    <a href="#" class="text-gray-600 hover:text-islamic-green transition-colors">My Duas</a>
                    <a href="c.html" class="text-gray-600 hover:text-islamic-green transition-colors">Calendar</a>
                    <a href="add.php" class="text-gray-600 hover:text-islamic-green transition-colors">Add Dua</a>
                    <a href="display-dua-set.php" class="text-gray-600 hover:text-islamic-green transition-colors">Dua Sets</a>
                </div>
                
                <button class="md:hidden p-2 rounded-md text-islamic-green">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-light-green to-soft-green pattern-bg islamic-pattern min-h-[500px] flex items-center">
        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Find Peace in Prayer
                </h1>
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-8 mb-8">
                    <p class="text-2xl md:text-3xl arabic-font text-white mb-4 leading-relaxed">
                        رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ
                    </p>
                    <p class="text-lg text-white opacity-90 italic">
                        "Our Lord, give us good in this world and good in the hereafter, and save us from the punishment of the Fire."
                    </p>
                </div>
                <button class="bg-gold hover:bg-yellow-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Start Your Journey
                </button>
            </div>
        </div>
    </section>

    <!-- Sample Duas Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-islamic-green mb-4">Daily Duas</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Begin your spiritual journey with these beautiful supplications
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dua Card  -->
                 <?php
  $result = $conn->query("SELECT * FROM duas");
  while ($row = $result->fetch_assoc()) {
    ?>
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-islamic-green"><?= $row['title']?></h3>
                        <div class="recite-counter text-white px-3 py-1 rounded-full text-sm font-medium">
                            <?=$row['repeat_count'] ?> recites
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font text-gray-800 mb-3 leading-relaxed">
                                  <?=$row['Dua']?>                 </p>
                        <p class="text-gray-600 text-sm">
                            "<?=$row['meaning']?>"
                        </p>
                    </div>
                    <a href="counter.php?id=<?= $row['id'] ?>" 
   class="w-full bg-light-green hover:bg-soft-green text-white py-3 rounded-lg font-medium transition-colors block text-center">
   Recite Now
</a>

                </div>

              <?php
  }
  ?>  
              
        </div>
    </section>

    <!-- Track Recitation Section -->
    <section class="py-16 bg-gradient-to-r from-light-gold to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white rounded-3xl shadow-xl p-12">
                <div class="mb-8">
                    <div class="w-20 h-20 bg-gradient-to-br from-gold to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-islamic-green mb-4">
                        Track Your Spiritual Journey
                    </h2>
                    <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                        Monitor your daily recitations, set reminders, and watch your spiritual growth with our comprehensive tracking system.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-soft-green mb-2">159</div>
                        <div class="text-gray-600">Total Recitations</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-gold mb-2">7</div>
                        <div class="text-gray-600">Day Streak</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-islamic-green mb-2">12</div>
                        <div class="text-gray-600">Favorite Duas</div>
                    </div>
                </div>
                
                <button class="bg-gradient-to-r from-islamic-green to-soft-green hover:from-soft-green hover:to-islamic-green text-white px-10 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Track Your Recitation
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-islamic-green text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center">
                            <span class="text-white text-xl arabic-font">د</span>
                        </div>
                        <span class="text-xl font-semibold">DuaApp</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Your companion for daily spiritual growth and connection with Allah through beautiful duas and supplications.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-gold transition-colors">My Duas</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Calendar</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Add Dua</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Settings</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-gold transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-gold transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-600 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; 2024 DuaApp. Made with ❤️ for the Muslim community.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('button[class*="md:hidden"]');
            const navigation = document.querySelector('nav div div div:nth-child(2)');
            
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    // This would toggle mobile menu in a real app
                    console.log('Mobile menu toggled');
                });
            }
            
            // Add click functionality to all buttons
            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                if (!button.classList.contains('md:hidden')) {
                    button.addEventListener('click', function() {
                        // Add subtle animation feedback
                        this.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 150);
                        
                        // Log action for demo purposes
                        console.log('Button clicked:', this.textContent.trim());
                    });
                }
            });
            
            // Add functionality to recite buttons
            const reciteButtons = document.querySelectorAll('button:contains("Recite Now")');
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('Recite Now')) {
                    button.addEventListener('click', function() {
                        const card = this.closest('.card-hover');
                        const counter = card.querySelector('.recite-counter');
                        const currentCount = parseInt(counter.textContent.match(/\d+/)[0]);
                        counter.textContent = `${currentCount + 1} recites`;
                        
                        // Visual feedback
                        counter.style.animation = 'pulse 0.5s ease-in-out';
                        setTimeout(() => {
                            counter.style.animation = '';
                        }, 500);
                    });
                }
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96355ac0b345e87e',t:'MTc1MzIxMjY0Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>

