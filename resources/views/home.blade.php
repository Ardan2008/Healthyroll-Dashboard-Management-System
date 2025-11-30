<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/lg.png') }}">
    <title>Healthyroll Indonesia</title>
</head>
<body>
    <x-navbar></x-navbar>

    {{-- Home --}}
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="filter-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" id="searchInput" placeholder="Search here...">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <div class="user">
                <a href="{{ route('profile') }}" title="Lihat Profil">
                    <img src="{{ asset('image/lg.png') }}" alt="user">
                </a>
            </div>
        </div>

        {{-- Card --}}
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers" data-target="1504" data-suffix="+">0</div>
                    <div class="cardName">Daily Views</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers" data-target="80" data-suffix="+">0</div>
                    <div class="cardName">Sales</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers" data-target="5" data-suffix="+">0</div>
                    <div class="cardName">Comments</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers" data-target="600000" data-prefix="Rp">0</div>
                    <div class="cardName">Earnings</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>

        {{-- Order Details List --}}
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="/order" class="btn">View All</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Chicken Roll Original</td>
                            <td>Rp 15.000</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Keju</td>
                            <td>Rp 23.000</td>
                            <td>Due</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Teriyaki</td>
                            <td>Rp 18.000</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Sambal</td>
                            <td>Rp 20.000</td>
                            <td>Due</td>
                            <td><span class="status inProgress">In Progress</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Keju</td>
                            <td>Rp 23.000</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Delivered</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Teriyaki</td>
                            <td>Rp 18.000</td>
                            <td>Due</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Original</td>
                            <td>Rp 15.000</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>

                        <tr>
                            <td>Chicken Roll Sambal</td>
                            <td>Rp 20.000</td>
                            <td>Due</td>
                            <td><span class="status inProgress">In Progress</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- New Customers --}}
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>

                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/01.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>David <br> <span>Amerika</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/02.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Jonshon <br> <span>Italy</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/03.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Chelsee <br> <span>Singapura</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/04.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Frank <br> <span>Swiss</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/05.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>William <br> <span>China</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/06.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Smith <br> <span>California</span></h4>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/07.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Christian <br> <span>Spanyol</span></h4>
                        </td>
                    </tr>

                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../image/customers/08.png" alt="customers"></div>
                        </td>
                        <td>
                            <h4>Mary <br> <span>Inlandia</span></h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Customer Habits & Customer Growth --}}
        <div class="bottomSection">
            <!-- Customer Habits -->
            <div class="customerHabits">
                <div class="cardHeader">
                    <div>
                        <h2>Customers Habits</h2>
                        <p>Track your customers habits</p>
                    </div>
                    <select id="habitsPeriodSelect" class="periodSelect">
                        <option value="thisYear">This year</option>
                        <option value="lastYear">Last year</option>
                    </select>
                </div>

                <div class="habitsChartWrapper">
                    <canvas id="customerHabitsChart"></canvas>
                    <div id="habitsTooltip">
                    <div style="font-weight:600; margin-bottom:4px;" id="tooltipMonth">Dec</div>
                    <div>
                        <span class="dot"></span>
                        <strong id="tooltipValue">57.234</strong>
                        <span style="opacity:0.8; margin-left:6px;" id="tooltipPercent">100%</span>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Customer Growth -->
            <div class="customerGrowth">
                <div class="cardHeader">
                    <h2 style="color: #2a2185">Customers Growth</h2>
                    <p>Track customers by country</p>
                    <select class="periodSelect" id="growthPeriod">
                        <option value="today">Today</option>
                        <option value="week">This week</option>
                        <option value="month">This month</option>
                    </select>
                </div>
                <div class="growthCircles" id="growthCircles"></div>
            </div>
        </div>
    </div>

    <!-- FLOATING CHATBOT -->
    <div id="chatbot-container">
        <div id="chatbot-header">
            <div class="header-content">
                <img src="{{ asset('image/lg.png') }}" alt="Healthyroll" class="chatbot-avatar">
                <div class="header-text">
                    <div class="header-title">Healthyroll Assistant</div>
                    <div class="header-status">Online</div>
                </div>
            </div>
            <button id="chatbot-close">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div id="chatbot-messages"></div>

        <div id="chatbot-input-area">
            <input type="text" id="chatbot-input" placeholder="Silahkan tanya apa saja...." autocomplete="off">
            <button id="chatbot-send">
                <ion-icon name="send"></ion-icon>
            </button>
        </div>
    </div>

    {{-- OVERLAY UNTUK KLIK DI LUAR --}}
    <div id="chatbot-overlay"></div>

    {{-- CHATBOT TOGGLE --}}
    <div id="chatbot-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
            <path d="M8 10h.01M12 10h.01M16 10h.01M9 14h6"/>
        </svg>
        <span class="online-badge"></span>
        <span class="notification-badge" id="notif-badge">0</span>
        <span class="ripple"></span>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                document.querySelectorAll(".cardBox .card .numbers").forEach(el => {
                    const target = parseInt(el.dataset.target) || 0;
                    const prefix = el.dataset.prefix || "";
                    const suffix = el.dataset.suffix || "";
                    let start = 0;
                    const increment = target / 120; // ~2 detik

                    const timer = setInterval(() => {
                        start += increment;
                        if (start >= target) {
                            el.textContent = prefix + target.toLocaleString("id-ID") + suffix;
                            clearInterval(timer);
                        } else {
                            el.textContent = prefix + Math.floor(start).toLocaleString("id-ID") + suffix;
                        }
                    }, 16);
                });
            }, 300);
        });

        // CHATBOT
        window.addEventListener('load', function() {
            const OPENROUTER_API_KEY = "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"; // Key sementara hidup (test 30 Nov 2025)
            const messageSound = new Audio("{{ asset('sound/message.mp3') }}"); // Download: https://assets.mixkit.co/sfx/preview/mixkit-software-interface-start-2574.mp3

            // === ELEMEN DOM ===
            const chatbotToggle = document.getElementById('chatbot-toggle');
            const chatbotContainer = document.getElementById('chatbot-container');
            const chatbotClose = document.getElementById('chatbot-close');
            const chatbotMessages = document.getElementById('chatbot-messages');
            const chatbotInput = document.getElementById('chatbot-input');
            const chatbotSend = document.getElementById('chatbot-send');
            const notifBadge = document.getElementById('notif-badge');

            if (!chatbotToggle || !chatbotContainer || !chatbotMessages) {
                console.warn('Chatbot elemen tidak ditemukan! Pastikan HTML sudah ada.');
                return;
            }

            let isOpen = false;
            let chatHistory = [];
            let unreadCount = 0;

            // === FUNGSI UTAMA ===
            function addMessage(sender, text) {
                const div = document.createElement('div');
                div.className = `message ${sender}`;
                div.innerHTML = text.replace(/\n/g, '<br>');
                chatbotMessages.appendChild(div);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;

                if (sender === 'bot' && !isOpen) {
                    unreadCount++;
                    if (notifBadge) {
                        notifBadge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                        notifBadge.classList.add('show');
                    }
                    messageSound.currentTime = 0;
                    messageSound.play().catch(() => {});
                }
            }

            function welcomeMessage() {
                addMessage('bot', `Halo! Selamat datang di <b>Healthyroll Indonesia</b>! 🐔✨\n\nAda yang bisa dibantu hari ini? 😊`);
            }

            function showTyping() {
                removeTyping();
                const typing = document.createElement('div');
                typing.className = 'message bot typing';
                typing.id = 'typing-indicator';
                typing.innerHTML = `Sedang mengetik <span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>`;
                chatbotMessages.appendChild(typing);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }

            function removeTyping() {
                const el = document.getElementById('typing-indicator');
                if (el) el.remove();
            }

            async function sendToAI(message) {
                showTyping();

                try {
                    const response = await fetch("https://openrouter.ai/api/v1/chat/completions", {
                        method: "POST",
                        headers: {
                            "Authorization": `Bearer ${OPENROUTER_API_KEY}`,
                            "HTTP-Referer": window.location.href,
                            "X-Title": "Healthyroll Indonesia",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            model: "x-ai/grok-4.1-fast:free", 
                            messages: [
                                { 
                                    role: "system", 
                                    content: "Kamu adalah asisten ramah Healthyroll Indonesia (toko chicken roll sehat). Jawab dalam bahasa Indonesia santai, ramah, membantu. Gunakan emoji secukupnya. Fokus pada produk: chicken roll, promo, pesanan. Jangan formal berlebihan. Macam-Macam product Healthyroll Indonesia yaitu Chicken Roll Original, Chicken Roll Keju, Chicken Roll Teriyaki, Chicken Roll Sambal. Harga product chicken roll yaitu Chicken Roll Original berharga 15.000, Chicken Roll Keju berharga 23.000, Chicken Roll Teriyaki berharga 18.000, Chicken Roll Sambal berharga 20.000. Penjelasan mengenai Healthyroll Indonesia berikut ini : HealthyRoll Indonesia adalah usaha kuliner kreatif yang menghadirkan Chicken Roll sehat, bergizi, dan praktis. Kami berkomitmen menciptakan makanan cepat saji yang tetap menyehatkan dan membanggakan produk lokal. Identitas Perusahaan Nama HealthyRoll Indonesia dipilih karena menggambarkan identitas produk utama yaitu makanan Chicken Roll sehat dan praktis. Kata “Healthy” menonjolkan konsep makanan bergizi dan rendah minyak, sedangkan “Roll” menggambarkan bentuk produk gulungan ayam yang unik dan menarik. Penambahan kata “Indonesia” menunjukkan kebanggaan terhadap produk lokal. Visi dan Misi nya yaitu Visi Menjadi pelopor makanan cepat saji sehat dan inovatif di Indonesia yang digemari semua kalangan. Misi 🐔 Kualitas tinggi & bahan segar, 💡 Inovasi rasa & kemasan, 🌱 Produksi ramah lingkungan, 📱 Pemasaran digital, 🚚 Layanan cepat. Deskripsi mengenai logo dan makna logo sebagai berikut : Deskripsi Logo: Logo berbentuk ayam bergulung (roll) dengan dominasi warna hijau dan orange. Hijau : melambangkan kesegaran, kesehatan, dan bahan alami. Orange: melambangkan semangat, kreativitas, dan cita rasa yang menggugah selera. Bentuk gulungan ayam menunjukkan inovasi dan keunikan produk. Makna Logo: Melambangkan semangat HealthyRoll Indonesia untuk menghadirkan makanan sehat, bergizi, dan modern bagi semua kalangan. Motto dan Tujuan Utamanya sebagai berikut : Mottonya yaitu Sehatnya Nampol, Praktis Setiap Saat. Motto ini mencerminkan nilai utama perusahaan: menyajikan makanan sehat yang tetap lezat dan mudah dinikmati kapan pun dan di mana pun. Tujuan Utamanya yaitu Menyediakan makanan cepat saji yang sehat, Meningkatkan kesadaran pola makan sehat, Mengembangkan produk lokal, Membuka peluang usaha kreatif. Deskripsi mengenai Chicken Roll yaitu sebagai berikut : Chicken Roll adalah olahan ayam dengan campuran sayuran seperti wortel, jagung, dan keju yang digulung menjadi makanan sehat, lezat, dan praktis — cocok untuk semua usia!. Kalau mau order bisa mengisi form di website Healthyroll Indonesia!. Nomor Wa yang akan dihubungi yaitu 088298374130. Untuk metode pembayaran ada Bayar di tempat dan Transfer Bank. Untuk metode pengiriman ada COD, Gojek/Grab, Kurir Toko. Buy 1 Get 1. Saat user memberikan pertanyaan bukan mengenai Healthyroll Indonesia kamu jawab dengan baik dan terstruktur dengan baik dan untuk teksnya kamu rapikan. teksnya harus rapi dan tidak belibet. jawabnya harus benar. Chicken roll digulung atau dilapisi dengan kubis yang segar. kubisnya itu dikukus dulu sebelum dilapisi ke adonan chicken roll, jadi benar-benar lembut. Isi adonan chicken roll yaitu ayam, sayuran (wortel, jagung).  Product yang varian Chicken Roll Keju adalah yang direkomendasikan dan premium." 
                                },
                                ...chatHistory,
                                { role: "user", content: message }
                            ],
                            temperature: 0.8,
                            max_tokens: 512
                        })
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }

                    const data = await response.json();
                    removeTyping();

                    if (data.choices?.[0]?.message?.content) {
                        const reply = data.choices[0].message.content.trim();
                        addMessage('bot', reply);
                        chatHistory.push({ role: "assistant", content: reply });
                    } else {
                        addMessage('bot', "Maaf ya, server AI lagi ramai nih 😅 Coba lagi sebentar lagi!");
                    }
                } catch (err) {
                    removeTyping();
                    addMessage('bot', "Ups! Koneksi lagi bermasalah 📶 Coba refresh halaman atau tanya lagi ya!");
                    console.error('AI Error:', err);
                }
            }

            function sendMessage() {
                const text = chatbotInput.value.trim();
                if (!text) return;

                addMessage('user', text);
                chatHistory.push({ role: "user", content: text });
                chatbotInput.value = '';
                if (chatbotInput) chatbotInput.focus();

                // Batasi history biar ga overload (max 10 turns)
                if (chatHistory.length > 20) chatHistory = chatHistory.slice(-10);

                sendToAI(text);
            }

            // === EVENT LISTENERS ===
            chatbotToggle.addEventListener('click', function(e) {
            e.stopPropagation(); // penting!
            
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            const rect = this.getBoundingClientRect();
            ripple.style.left = (e.clientX - rect.left) + 'px';
            ripple.style.top = (e.clientY - rect.top) + 'px';
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 700);

            isOpen = !isOpen;
            chatbotContainer.style.display = isOpen ? 'flex' : 'none';
            document.getElementById('chatbot-overlay').classList.toggle('active', isOpen);

            if (isOpen) {
                if (chatbotMessages.children.length === 0) setTimeout(welcomeMessage, 400);
                unreadCount = 0;
                notifBadge?.classList.remove('show');
                setTimeout(() => chatbotInput.focus(), 300);
            }
            });

            // TUTUP KETIKA KLIK DI LUAR
        document.getElementById('chatbot-overlay').addEventListener('click', () => {
            chatbotContainer.style.display = 'none';
            document.getElementById('chatbot-overlay').classList.remove('active');
            isOpen = false;
        });

        // Tutup dengan tombol close
        chatbotClose.addEventListener('click', (e) => {
            e.stopPropagation();
            chatbotContainer.style.display = 'none';
            document.getElementById('chatbot-overlay').classList.remove('active');
            isOpen = false;
        });

            if (chatbotSend) {
                chatbotSend.addEventListener('click', sendMessage);
            }

            if (chatbotInput) {
                chatbotInput.addEventListener('keypress', e => {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        sendMessage();
                    }
                });
            }

            // Auto-open sekali (setelah 2.5s)
            if (localStorage.getItem('healthyroll_chat_welcomed') !== 'true') {
                setTimeout(() => {
                    if (chatbotToggle) chatbotToggle.click();
                    localStorage.setItem('healthyroll_chat_welcomed', 'true');
                }, 2500);
            }

            console.log('✅ Chatbot Healthyroll loaded! Model: Gemini Flash Free');
        });
    </script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Script utama -->
    <script src="{{ asset('js/script.js') }}?v={{ time() }}"></script>

    <!-- Routes Laravel untuk JS -->
    <x-app-routes />
</body>
</html>