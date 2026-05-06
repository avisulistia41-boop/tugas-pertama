// DATA PRODUK
const produk = [
  { nama: "Nasi Goreng", harga: 15000, kategori: "makanan", gambar: "https://dcostseafood.id/wp-content/uploads/2023/04/Nasi-Goreng-Spesial.jpg", deskripsi: "Nasi goreng spesial" },
  { nama: "Mie Ayam", harga: 12000, kategori: "makanan", gambar: "https://cdn.yummy.co.id/content-images/images/20210627/CMvqtCKUxrMBbPCQ09CtypnobrGJ5b50-31363234373635373931d41d8cd98f00b204e9800998ecf8427e.jpg?x-oss-process=image/resize,w_388,h_388,m_fixed,x-oss-process=image/format,webp", deskripsi: "Mie ayam enak" },
  { nama: "Es Teh", harga: 5000, kategori: "minuman", gambar: "https://i.pinimg.com/736x/64/f9/04/64f904fa176bc6699ed488c40d02b414.jpg", deskripsi: "Minuman segar" },
  { nama: "Jus Jeruk", harga: 8000, kategori: "minuman", gambar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4fhT3e9GN8kkHH4uS1UP-x4hIYjYlW6risA&s", deskripsi: "Sehat dan segar" },
  { nama: "Keripik", harga: 10000, kategori: "snack", gambar: "https://img.lazcdn.com/g/p/1fe25f5d76235f8841eeaf172663d41b.jpg_960x960q80.jpg_.webp", deskripsi: "Snack renyah" }
];

// KERANJANG
let cart = [];

// TAMPIL PRODUK
function tampilProduk(data) {
  const container = document.getElementById("produk-list");
  container.innerHTML = "";

  data.forEach((item, index) => {
    container.innerHTML += `
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="${item.gambar}" class="img-fluid">
          <div class="card-body">
            <h5>${item.nama}</h5>
            <p>${item.deskripsi}</p>
            <strong>Rp ${item.harga}</strong><br>
            <button class="btn btn-primary mt-2" onclick="tambahKeCart(${index})">Beli</button>
          </div>
        </div>
      </div>
    `;
  });
}

// TAMBAH KE KERANJANG
function tambahKeCart(index) {
  cart.push(produk[index]);
  updateCart();
}

// UPDATE CART
function updateCart() {
  const list = document.getElementById("cart-list");
  const total = document.getElementById("total-harga");

  list.innerHTML = "";
  let totalHarga = 0;

  cart.forEach(item => {
    totalHarga += item.harga;

    list.innerHTML += `
      <li class="list-group-item d-flex justify-content-between">
        ${item.nama}
        <span>Rp ${item.harga}</span>
      </li>
    `;
  });

  total.textContent = totalHarga;
}

// FILTER
function filterProduk(kategori, event) {
  let hasil = kategori === "all"
    ? produk
    : produk.filter(item => item.kategori === kategori);

  tampilProduk(hasil);

  document.querySelectorAll(".filter-btn").forEach(btn => btn.classList.remove("active"));
  event.target.classList.add("active");
}

// LOAD AWAL
tampilProduk(produk);