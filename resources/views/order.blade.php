<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/lg.png') }}">
    <title>Healthyroll Indonesia</title>
</head>
<body>
    <x-navbar></x-navbar>

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

    <div class="order-container">
        <div class="order-form-wrapper">
                <h2>Form Pemesanan</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form id="orderForm" class="order-form" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon</label>
                        <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <textarea id="address" name="address" required>{{ old('address') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="product">Pilih Produk</label>
                        <select id="product" name="product" required>
                            <option value="">-- Pilih Produk --</option>
                            <option value="chicken roll original" {{ old('product') == 'chicken roll original' ? 'selected' : '' }}>Chicken Roll Original</option>
                            <option value="chicken roll keju" {{ old('product') == 'chicken roll keju' ? 'selected' : '' }}>Chicken Roll Keju</option>
                            <option value="chicken roll teriyaki" {{ old('product') == 'chicken roll teriyaki' ? 'selected' : '' }}>Chicken Roll Teriyaki</option>
                            <option value="chicken roll sambal" {{ old('product') == 'chicken roll sambal' ? 'selected' : '' }}>Chicken Roll Sambal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Jumlah Pesanan</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="notes">Catatan Tambahan (Opsional)</label>
                        <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <div class="radio-group">
                            <input type="radio" id="paymentCod" name="payment_method" value="COD (Bayar di tempat)" {{ old('payment_method') == 'COD (Bayar di tempat)' ? 'checked' : '' }} required>
                            <label for="paymentCod">Bayar di tempat</label><br>
                            <input type="radio" id="paymentTransfer" name="payment_method" value="Transfer Bank" {{ old('payment_method') == 'Transfer Bank' ? 'checked' : '' }}>
                            <label for="paymentTransfer">Transfer Bank</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="delivery_method">Metode Pengiriman</label>
                        <select id="delivery_method" name="delivery_method" required>
                            <option value="">-- Pilih Pengiriman --</option>
                            <option value="COD" {{ old('delivery_method') == 'COD' ? 'selected' : '' }}>COD</option>
                            <option value="Gojek/Grab" {{ old('delivery_method') == 'Gojek/Grab' ? 'selected' : '' }}>Gojek/Grab</option>
                            <option value="Kurir Toko" {{ old('delivery_method') == 'Kurir Toko' ? 'selected' : '' }}>Kurir Toko</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-btn">Buat Pesanan</button>
                    <button type="button" id="cancelEditBtn" style="display:none; background:#6c757d; margin-top:10px;" class="submit-btn">Batal</button>
                </form>
            </div>

            <!-- DAFTAR PESANAN -->
                <div class="order-result-wrapper">
                    <h2>Daftar Pesanan (<span id="orderCount">0</span>)</h2>
                    <div id="ordersTableContainer" class="table-scroll-wrapper">
                        @if($orders->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nomor</th>
                                        <th>Alamat</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Catatan</th>
                                        <th>Pembayaran</th>
                                        <th>Pengiriman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr data-id="{{ $order->id }}">
                                            <td data-label="Nama"><strong>{{ $order->full_name }}</strong></td>
                                            <td data-label="Nomor">{{ $order->phone_number }}</td>
                                            <td data-label="Alamat">{{ $order->address }}</td>
                                            <td data-label="Produk"><strong>{{ ucwords(str_replace('chicken roll ', 'Chicken Roll ', $order->product)) }}</strong></td>
                                            <td data-label="Jumlah"><span class="status-badge" style="background:#8b5cf6;color:white;">{{ $order->quantity }} </span></td>
                                            <td data-label="Catatan">{{ $order->notes ?? '-' }}</td>
                                            <td data-label="Bayar"><span class="status-badge {{ str_contains($order->payment_method, 'COD') ? 'status-cod' : 'status-transfer' }}">{{ $order->payment_method }}</span></td>
                                            <td data-label="Kirim"><span class="status-badge {{ $order->delivery_method === 'COD' ? 'status-cod' : ($order->delivery_method === 'Gojek/Grab' ? 'status-gojek' : 'status-kurir') }}">{{ $order->delivery_method }}</span></td>
                                            <td data-label="Aksi">
                                                <button class="btn-edit" onclick="editOrder({{ $order->id }})">Edit</button>
                                                <button class="btn-delete" onclick="deleteOrder({{ $order->id }})">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="no-data-msg">
                                <span style="font-size:4.5rem;opacity:0.15;display:block;margin-bottom:16px;">No Orders</span>
                                Belum ada pesanan.
                            </p>
                        @endif
                    </div>
                </div>
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

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const submitBtn = document.querySelector('.submit-btn');
    const cancelBtn = document.getElementById('cancelEditBtn');

    // Pasang event Cancel sekali saja saat halaman dimuat
    cancelBtn.addEventListener('click', cancelEdit);

    // Submit Form (Create / Update)
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const editingId = submitBtn.dataset.editingId;

        if (editingId) {
            formData.append('_method', 'PUT');
        }

        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Memproses...';

        fetch(editingId ? `/orders/${editingId}` : "{{ route('orders.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) throw new Error('Server error');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                alert(editingId ? 'Pesanan berhasil diperbarui!' : 'Pesanan berhasil dibuat!');
                
                // Reset semuanya
                this.reset();
                submitBtn.textContent = 'Buat Pesanan';
                delete submitBtn.dataset.editingId;
                cancelBtn.style.display = 'none';

                loadOrdersTable(); // refresh tabel
            } else {
                alert(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error: ' + err.message);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Buat Pesanan';
        });
    });

    function loadOrdersTable() {
        fetch("{{ route('orders.data') }}")
            .then(res => res.json())
            .then(result => {
                const container = document.getElementById('ordersTableContainer');
                const countSpan = document.getElementById('orderCount');

                if (!result.orders || result.orders.length === 0) {
                    countSpan.textContent = '0';
                    container.innerHTML = `
                        <p class="no-data-msg">
                            <span style="font-size:4.5rem;opacity:0.15;display:block;margin-bottom:16px;">No Orders</span>
                            Belum ada pesanan.
                        </p>`;
                    return;
                }

                countSpan.textContent = result.orders.length;

                let rows = '';
                result.orders.forEach(order => {
                    const paymentClass = order.payment_method.includes('COD') ? 'status-cod' : 'status-transfer';
                    const deliveryClass = order.delivery_method === 'COD' ? 'status-cod' : 
                                    order.delivery_method.includes('Gojek') || order.delivery_method.includes('Grab') ? 'status-gojek' : 'status-kurir';

                    rows += `
                    <tr data-id="${order.id}" style="text-align: center;">
                        <td data-label="Nama"><strong>${order.full_name}</strong></td>
                        <td data-label="Nomor">${order.phone_number}</td>
                        <td data-label="Alamat" style="max-width:220px;word-wrap:break-word;">${order.address}</td>
                        <td data-label="Produk"><strong>${ucwords(order.product.replace('chicken roll ', 'Chicken Roll '))}</strong></td>
                        <td data-label="Jumlah"><span class="status-badge" style="background:#8b5cf6;color:white;">${order.quantity} </span></td>
                        <td data-label="Catatan">${order.notes ? order.notes.substring(0,40)+(order.notes.length>40?'...':'') : '-'}</td>
                        <td data-label="Bayar"><span class="status-badge ${paymentClass}">${order.payment_method}</span></td>
                        <td data-label="Kirim"><span class="status-badge ${deliveryClass}">${order.delivery_method}</span></td>
                        <td data-label="Aksi">
                            <button class="btn-edit" onclick="editOrder(${order.id})">Edit</button>
                            <button class="btn-delete" onclick="deleteOrder(${order.id})">Hapus</button>
                        </td>
                    </tr>`;
                });

                container.innerHTML = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th><th>Nomor</th><th>Alamat</th><th>Produk</th><th>Jumlah</th>
                                <th>Catatan</th><th>Pembayaran</th><th>Pengiriman</th><th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>${rows}</tbody>
                    </table>`;
            })
            .catch(err => {
                console.error(err);
                document.getElementById('ordersTableContainer').innerHTML = 
                    `<p class="no-data-msg" style="color:#ef4444;">Gagal memuat data. <button onclick="loadOrdersTable()" style="margin-top:10px;padding:8px 16px;background:#6d28d9;color:white;border:none;border-radius:8px;cursor:pointer;">Coba Lagi</button></p>`;
            });
    }

    // Edit Order
    function editOrder(id) {
        fetch(`/orders/${id}/edit`)
            .then(res => res.json())
            .then(order => {
                document.getElementById('full_name').value = order.full_name;
                document.getElementById('phone_number').value = order.phone_number;
                document.getElementById('address').value = order.address;
                document.getElementById('product').value = order.product;
                document.getElementById('quantity').value = order.quantity;
                document.getElementById('notes').value = order.notes || '';

                // Radio button
                document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                    radio.checked = radio.value === order.payment_method;
                });

                document.getElementById('delivery_method').value = order.delivery_method;

                // Ubah tombol submit
                submitBtn.textContent = 'Update Pesanan';
                submitBtn.dataset.editingId = id;

                // Tampilkan tombol Batal
                cancelBtn.style.display = 'block';

                // Scroll ke form
                document.querySelector('.order-form-wrapper').scrollIntoView({behavior: 'smooth'});
            })
            .catch(err => {
                console.error(err);
                alert('Gagal mengambil data pesanan');
            });
    }

    // Batal Edit
    function cancelEdit() {
        document.getElementById('orderForm').reset();
        submitBtn.textContent = 'Buat Pesanan';
        delete submitBtn.dataset.editingId;
        cancelBtn.style.display = 'none';
    }

    // Hapus Order
    function deleteOrder(id) {
        if (!confirm('Yakin ingin menghapus pesanan ini?')) return;

        fetch(`/orders/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Pesanan berhasil dihapus!');
                loadOrdersTable();
            } else {
                alert(data.message || 'Gagal menghapus');
            }
        });
    }

    // Helper ucwords
    function ucwords(str) {
        return str.toLowerCase().replace(/(?:^|\s)\S/g, a => a.toUpperCase());
    }

    // Load tabel pertama kali
    document.addEventListener('DOMContentLoaded', loadOrdersTable);

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
                                    content: "Kamu adalah asisten ramah Healthyroll Indonesia (toko chicken roll sehat). Jawab dalam bahasa Indonesia santai, ramah, membantu. Gunakan emoji secukupnya. Fokus pada produk: chicken roll, promo, pesanan. Jangan formal berlebihan. Macam-Macam product Healthyroll Indonesia yaitu Chicken Roll Original, Chicken Roll Keju, Chicken Roll Teriyaki, Chicken Roll Sambal. Harga product chicken roll yaitu Chicken Roll Original berharga 15.000, Chicken Roll Keju berharga 23.000, Chicken Roll Teriyaki berharga 18.000, Chicken Roll Sambal berharga 20.000. Penjelasan mengenai Healthyroll Indonesia berikut ini : HealthyRoll Indonesia adalah usaha kuliner kreatif yang menghadirkan Chicken Roll sehat, bergizi, dan praktis. Kami berkomitmen menciptakan makanan cepat saji yang tetap menyehatkan dan membanggakan produk lokal. Identitas Perusahaan Nama HealthyRoll Indonesia dipilih karena menggambarkan identitas produk utama yaitu makanan Chicken Roll sehat dan praktis. Kata “Healthy” menonjolkan konsep makanan bergizi dan rendah minyak, sedangkan “Roll” menggambarkan bentuk produk gulungan ayam yang unik dan menarik. Penambahan kata “Indonesia” menunjukkan kebanggaan terhadap produk lokal. Visi dan Misi nya yaitu Visi Menjadi pelopor makanan cepat saji sehat dan inovatif di Indonesia yang digemari semua kalangan. Misi 🐔 Kualitas tinggi & bahan segar, 💡 Inovasi rasa & kemasan, 🌱 Produksi ramah lingkungan, 📱 Pemasaran digital, 🚚 Layanan cepat. Deskripsi mengenai logo dan makna logo sebagai berikut : Deskripsi Logo: Logo berbentuk ayam bergulung (roll) dengan dominasi warna hijau dan orange. Hijau : melambangkan kesegaran, kesehatan, dan bahan alami. Orange: melambangkan semangat, kreativitas, dan cita rasa yang menggugah selera. Bentuk gulungan ayam menunjukkan inovasi dan keunikan produk. Makna Logo: Melambangkan semangat HealthyRoll Indonesia untuk menghadirkan makanan sehat, bergizi, dan modern bagi semua kalangan. Motto dan Tujuan Utamanya sebagai berikut : Mottonya yaitu Sehatnya Nampol, Praktis Setiap Saat. Motto ini mencerminkan nilai utama perusahaan: menyajikan makanan sehat yang tetap lezat dan mudah dinikmati kapan pun dan di mana pun. Tujuan Utamanya yaitu Menyediakan makanan cepat saji yang sehat, Meningkatkan kesadaran pola makan sehat, Mengembangkan produk lokal, Membuka peluang usaha kreatif. Deskripsi mengenai Chicken Roll yaitu sebagai berikut : Chicken Roll adalah olahan ayam dengan campuran sayuran seperti wortel, jagung, dan keju yang digulung menjadi makanan sehat, lezat, dan praktis — cocok untuk semua usia!. Kalau mau order bisa mengisi form di website Healthyroll Indonesia!. Nomor Wa yang akan dihubungi yaitu 088298374130. Untuk metode pembayaran ada Bayar di tempat dan Transfer Bank. Untuk metode pengiriman ada COD, Gojek/Grab, Kurir Toko. Buy 1 Get 1. Saat user memberikan pertanyaan bukan mengenai Healthyroll Indonesia kamu jawab dengan baik dan terstruktur dengan baik dan untuk teksnya kamu rapikan. teksnya harus rapi dan tidak belibet. jawabnya harus benar. Chicken roll digulung atau dilapisi dengan kubis yang segar. kubisnya itu dikukus dulu sebelum dilapisi ke adonan chicken roll, jadi benar-benar lembut. Isi adonan chicken roll yaitu ayam, sayuran (wortel, jagung). Product yang varian Chicken Roll Keju adalah yang direkomendasikan dan premium." 
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

    <!-- Script utama -->
    <script src="{{ asset('js/script.js') }}?v={{ time() }}"></script>

    <!-- Routes Laravel untuk JS -->
    <x-app-routes />
</body>
</html>