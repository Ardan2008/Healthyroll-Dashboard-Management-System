console.log("script.js berhasil dimuat!");

// Hover efek di sidebar
document.querySelectorAll('.navigation li').forEach(item => {
    item.addEventListener('mouseover', function () {
        document.querySelectorAll('.navigation li').forEach(el => el.classList.remove('hovered'));
        this.classList.add('hovered');
    });
});

// Toggle sidebar
document.querySelector('.toggle')?.addEventListener('click', () => {
    document.querySelector('.navigation').classList.toggle('active');
    document.querySelector('.main').classList.toggle('active');
});

// Search Navigasi
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("searchInput");
    if (!input) return console.log("searchInput tidak ada di halaman ini");

    input.focus(); // agar biar langsung bisa ketik

    input.addEventListener("keypress", function (e) {
        if (e.key !== "Enter") return;

        const query = this.value.trim().toLowerCase();
        if (!query) return;

        const routes = {
            // keyword → nama route Laravel
            "profile": "profile",
            "profil": "profile",

            "home": "home",
            "beranda": "home",
            "dashboard": "home",

            "about": "about",
            "tentang": "about",

            "product": "product",
            "produk": "product",
            "menu": "product",

            "order": "order",
            "pesanan": "order",
            "orders": "order",

            "message": "messages",
            "messages": "messages",
            "pesan": "messages",
            "chat": "messages",
            "inbox": "messages"
        };

        let targetRoute = null;
        for (const [keyword, routeName] of Object.entries(routes)) {
            if (keyword.includes(query)) {
                targetRoute = routeName;
                break;
            }
        }

        if (targetRoute && window.appRoutes?.[targetRoute]) {
            // Sukses!
            this.style.backgroundColor = "#d4edda";
            this.style.transition = "0.4s";
            setTimeout(() => {
                window.location.href = window.appRoutes[targetRoute];
            }, 300);
        } else {
            // Gagal
            this.style.backgroundColor = "#f8d7da";
            this.value = "";
            this.placeholder = "Tidak ditemukan! Coba: produk, order, pesan";
            setTimeout(() => {
                this.style.backgroundColor = "";
                this.placeholder = "Search here... (tekan Enter)";
            }, 2000);
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById('customerHabitsChart');
    const tooltipEl = document.getElementById('habitsTooltip');

    const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

    const thisYear = [41233, 39821, 37500, 40200, 42800, 44500, 47200, 49800, 52100, 53800, 54900, 57234];
    const lastYear = [35800, 37200, 34500, 35900, 36800, 38200, 39500, 41200, 42800, 41900, 43500, 44800];

    let currentData = [...thisYear];
    let maxValue = Math.max(...currentData);

    const chart = new Chart(canvas, {
        type: 'bar',
        data: {
        labels: months,
        datasets: [{
            data: currentData,
            backgroundColor: '#e0d4ff',
            hoverBackgroundColor: '#2a2185',
            borderRadius: 30,
            borderSkipped: false,
            barThickness: 38,
            categoryPercentage: 0.88,
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
            enabled: false,
            external: function(context) {
                // Jika tidak hover, sembunyikan
                if (context.tooltip.opacity === 0) {
                tooltipEl.style.opacity = 0;
                return;
                }

                const index = context.tooltip.dataPoints[0].dataIndex;
                const value = currentData[index];
                const percentage = Math.round((value / maxValue) * 100);

                // Update isi tooltip
                document.getElementById('tooltipMonth').textContent = months[index];
                document.getElementById('tooltipValue').textContent = value.toLocaleString();
                document.getElementById('tooltipPercent').textContent = percentage + '%';

                // Munculkan tooltip di pojok kanan bawah
                tooltipEl.style.opacity = 1;
            }
            }
        },
        scales: {
            x: { grid: { display: false }, ticks: { color: '#888', font: { weight:500 } } },
            y: { display: false }
        },
        animation: { duration: 1800, easing: 'easeOutQuart' }
        }
    });

    // Ganti tahun
    document.getElementById('habitsPeriodSelect').addEventListener('change', function() {
        currentData = this.value === 'thisYear' ? [...thisYear] : [...lastYear];
        maxValue = Math.max(...currentData);
        chart.data.datasets[0].data = currentData;
        chart.update();
        tooltipEl.style.opacity = 0; // sembunyikan saat ganti data
    });

    // Sembunyikan tooltip saat mouse keluar
    canvas.addEventListener('mouseleave', () => {
        tooltipEl.style.opacity = 0;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById('growthCircles');
    const select    = document.getElementById('growthPeriod');

    // Data per periode
    const data = {
        today: [
            { country: "Indonesia", code: "id", value: 892 },
            { country: "United States", code: "us", value: 1 },
            { country: "Japan", code: "jp", value: 3 },
            { country: "Germany", code: "de", value: 2 },
            { country: "Hong Kong", code: "hk", value: 8 },
            { country: "Australia", code: "au", value: 1 }
        ],
        week: [
            { country: "Singapore", code: "sg", value: 7 },
            { country: "Finland", code: "fi", value: 3 },
            { country: "China", code: "cn", value: 2 },
            { country: "Switzerland", code: "ch", value: 8 },
            { country: "Malaysia", code: "my", value: 19 },
            { country: "Taiwan", code: "tw", value: 14 }
        ],
        month: [
            { country: "Russia", code: "ru", value: 2 },
            { country: "Brunei", code: "bn", value: 4 },
            { country: "South Korea", code: "kr", value: 5 },
            { country: "Laos", code: "la", value: 3 },
            { country: "Myanmar", code: "mm", value: 8 },
            { country: "Turkey", code: "tr", value: 5 }
        ]
    };

    // Render semua negara sesuai periode
    function renderCountries(period) {
        const countries = data[period] || data.today;
        container.innerHTML = ''; // reset

        countries.forEach(item => {
            const itemEl = document.createElement('div');
            itemEl.className = 'countryItem';

            itemEl.innerHTML = `
                <div class="circleBig">
                    <img src="https://flagcdn.com/w80/${item.code}.png" alt="${item.country}" class="flag">
                </div>
                <div class="info">
                    <span class="countryName">${item.country}</span>
                    <span class="numbers">${item.value.toLocaleString()}</span>
                </div>
            `;

            container.appendChild(itemEl);
        });
    }

    // Load pertama kali
    renderCountries('today');

    // Ganti periode
    select.addEventListener('change', function () {
        renderCountries(this.value);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Menangkap form dan elemen hasil
    const orderForm = document.getElementById('orderForm');
    const orderResultDiv = document.getElementById('orderResult');

    if (orderForm) {
        orderForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form melakukan submit default

            // 1. Mengambil data dari form
            const formData = new FormData(orderForm);
            const data = {};
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }

            // 2. Membuat tampilan tabel hasil
            const resultHtml = `
                <table class="order-table">
                    <tr>
                        <th>Field</th>
                        <th>Nilai</th>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>${data.fullName}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>${data.phoneNumber}</td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>${data.address.replace(/\n/g, '<br>')}</td>
                    </tr>
                    <tr>
                        <td>Pilih Produk</td>
                        <td>**${data.product.toUpperCase()}**</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pesanan</td>
                        <td>${data.quantity}</td>
                    </tr>
                    <tr>
                        <td>Catatan Tambahan</td>
                        <td>${data.notes || '-'}</td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>${data.paymentMethod}</td>
                    </tr>
                    <tr>
                        <td>Metode Pengiriman</td>
                        <td>${data.deliveryMethod}</td>
                    </tr>
                </table>
                <p style="margin-top: 15px; font-style: italic; color: green;">*Pesanan Anda telah berhasil direkam!</p>
            `;

            // 3. Menampilkan hasil di sebelah kiri
            orderResultDiv.innerHTML = resultHtml;

            // 4. MENGHILANGKAN ISI FORM (RESET)
            // Metode .reset() pada elemen form akan mengembalikan semua field ke nilai default/kosong.
            orderForm.reset();
        });
    }
});

document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Memproses...';

    const formData = new FormData(this);

    fetch(`{{ route('orders.store') }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`HTTP ${response.status}: ${text.substring(0, 500)}`);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert(data.message || 'Pesanan berhasil!');

            // Tampilkan hasil di sebelah kanan
            document.getElementById('orderResult').innerHTML = `
                <div class="order-card success">
                    <h3>Pesanan #${data.order.id} <span style="color:green">Berhasil!</span></h3>
                    <p><strong>Nama:</strong> ${data.order.full_name}</p>
                    <p><strong>Telepon:</strong> ${data.order.phone_number}</p>
                    <p><strong>Alamat:</strong> ${data.order.address}</p>
                    <p><strong>Produk:</strong> ${formatProduct(data.order.product)} × ${data.order.quantity}</p>
                    <p><strong>Total:</strong> Rp ${Number(data.order.total_price).toLocaleString('id-ID')}</p>
                    <p><strong>Pembayaran:</strong> ${data.order.payment_method}</p>
                    <p><strong>Pengiriman:</strong> ${data.order.delivery_method}</p>
                    ${data.order.notes ? `<p><strong>Catatan:</strong> ${data.order.notes}</p>` : ''}
                    <hr>
                    <small>Terima kasih! Kami akan hubungi Anda via WhatsApp.</small>
                </div>
            `;

            this.reset();
            // Refresh daftar pesanan kalau ada tabel
            location.reload(); 
        } else {
            alert(data.message || 'Gagal menyimpan pesanan');
        }
    })
    .catch(err => {
        console.error('Error detail:', err);
        alert('Error: ' + err.message);
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
});

function formatProduct(str) {
    const map = {
        'chicken roll original': 'Chicken Roll Original',
        'chicken roll keju': 'Chicken Roll Keju',
        'chicken roll teriyaki': 'Chicken Roll Teriyaki',
        'chicken roll sambal': 'Chicken Roll Sambal'
    };
    return map[str] || str;
}