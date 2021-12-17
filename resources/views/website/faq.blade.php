@extends('layout.main')

@section('konten')
    <h1 class="text-center">
        FAQs - Frequently Asked Questions
    </h1>
    <hr>
    <div class="container m-3">
 
        <div class="col-lg-4">
            <div id="scroll-ku" class="list-group">
                <a class="list-group-item list-group-item-action" href="#pesan">Bagaimana Cara Pemesanan Produk?</a>
                <a class="list-group-item list-group-item-action" href="#bayar">Bagaimana Cara dan Metode Pembayaran?</a>
                <a class="list-group-item list-group-item-action" href="#kirim">Bagaimana Cara dan Metode Pengiriman Barang?</a>
                <a class="list-group-item list-group-item-action" href="#dana">Kapan Proses pengembalian dana dan Barang</a>
                <a class="list-group-item list-group-item-action" href="#kontak">Kontak</a>
            </div>
        </div>

        <div class="col-lg-8">
            <div data-spy="scroll" data-target="#scroll-ku" data-offset="0" style="height: 600px;overflow-y: scroll;">

                <h2 id="pesan">Pemesanan Produk</h2>
                <p>
                    Pemesanan produk dapat dilakukan setelah anda login/ masuk ke dalam website e-commerce Portio.id <br>
                    Setelah anda berhasil masuk, anda akan di arahkan ke halaman home website e-commerce Portio.ID, anda dapat memesan produk apa saja yang kami sediakan dengan klik tombol <b>Add To Cart</b> <br>
                    Produk yang anda klik, akan masuk ke halaman <b>Cart</b>, disana anda dapat menambah kuantitas produk yang anda ingin beli
                </p>

                <hr>

                <h2 id="bayar">Pembayaran Produk</h2>
                <p>
                    Untuk melanjutkan pembayaran, anda hanya perlu untuk klik tombol <b>check out</b> di halaman <b>cart</b> lalu memilih tipe pembayaran seperti apa yang anda inginkan.
                    <br>
                    terdepat beberapa metode atau jenis kartu yang kami terima untuk pembayaran produk anda, yakni <i>Pembayaran COD, ATM BRI, BNI, Mandiri, Jenius, Dana, OVO, dan lainnya</i>
                </p>

                <hr>
                <h2 id="kirim">Pengiriman Barang</h2>
                <p>
                    Pengiriman Barang di Portio.id menggunakan jasa Ekspedisi JNT, JNE , dan Kurir <br>
                    pada halaman <b>Cart</b> atau <b>Check Out</b>, Anda akan diminta untuk memasukkan alamat , kota , provinsi , dan kode pos anda untuk menentukan biaya pengiriman yang diperlukan. <br>
                    Produk yang anda pesan akan dikirimkan 2-7 hari kerja sesuai dengan jenis pengiriman yang anda pilih.
                </p>
                <hr>

                <h2 id="dana">Pengembalian Dana dan Barang</h2>
                <p>
                    Pembeli hanya boleh mengajukan permohonan pengembalian Barang dan/atau pengembalian dana dalam situasi berikut:
                    <ul>
                        <li>- Barang belum diterima oleh pembeli</li>
                        <li>- Barang tersebut rusak dan/atau cacat saat diterima oleh Pembeli</li>
                        <li>- Penjual telah mengirimkan barang yang tidak sesuai dengan spesifikasi yang disepakati</li>
                        <li>- Barang harus dikembalikan sesuai dengan yang dikirimkan, tidak kurang satupun</li>
                    </ul>
                    <br>
                    Kami akan melakukan pengembalian Dana dan/atau Barang 2-3 hari setelah proses disetujui
                </p>

                <hr>

                <h2 id="kontak">Kontak</h2>
                <p>
                    No Hp Owner Portio.ID:
                    <br/>
                    085156098532<br>
                    instagram : <br>
                    @Portio.id
                </p>

            </div>
        </div>
    </div>
</div>
      
@endsection