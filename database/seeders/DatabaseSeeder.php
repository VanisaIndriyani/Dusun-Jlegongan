<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Content;
use App\Models\PopulationStatistic;
use App\Models\Activity;
use App\Models\Facility;
use App\Models\Potential;
use App\Models\Schedule;
use App\Models\Organization;
use App\Models\Gallery;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Dusun',
            'email' => 'admin@dusunjlegongan.id',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Content::create([
            'type' => 'sejarah',
            'title' => 'Sejarah Dusun Jlegongan',
            'description' => 'Sejarah singkat Dusun Jlegongan yang kaya akan nilai budaya dan toleransi.',
            'content' => '<p>Dusun Jlegongan merupakan salah satu dusun yang terletak di wilayah Kalurahan Margodadi, Kecamatan Seyegan, Kabupaten Sleman, D.I. Yogyakarta. Nama "Jlegongan" berasal dari kata "legong" yang berarti tenang dan damai, menggambarkan suasana kehidupan masyarakat di dusun ini.</p><p>Dusun ini telah dihuni oleh masyarakat dari berbagai latar belakang agama dan suku sejak puluhan tahun yang lalu. Keberagaman ini justru menjadi kekuatan utama bagi warga Jlegongan dalam membangun kehidupan bermasyarakat yang rukun dan harmonis.</p><p>Salah satu ciri khas Dusun Jlegongan adalah tradisi toleransi yang sangat kuat antarumat beragama. Warga Muslim, Kristen, Katolik, Hindu, dan penganut kepercayaan lainnya hidup berdampingan dengan penuh rasa hormat.</p>',
        ]);

        Content::create([
            'type' => 'geografis',
            'title' => 'Kondisi Geografis Dusun Jlegongan',
            'description' => 'Informasi mengenai letak geografis dan kondisi wilayah Dusun Jlegongan.',
            'content' => '<p>Dusun Jlegongan terletak di wilayah Kalurahan Margodadi, Kecamatan Seyegan, Kabupaten Sleman, Provinsi D.I. Yogyakarta. Dusun ini berada di ketinggian sekitar 150 meter di atas permukaan laut dengan suhu udara rata-rata berkisar antara 22°C hingga 30°C, memberikan suasana yang sejuk dan nyaman.</p><p>Kondisi tanah di Dusun Jlegongan sangat subur, menjadikannya wilayah yang ideal untuk kegiatan pertanian. Sebagian besar lahan di dusun ini dimanfaatkan sebagai sawah, ladang pertanian, dan perkebunan rakyat.</p><p>Dusun Jlegongan dilalui oleh beberapa sungai kecil yang menjadi sumber air utama bagi kegiatan pertanian dan kebutuhan sehari-hari warga. Topografi wilayah cenderung datar dengan sedikit perbukitan di bagian utara yang berbatasan dengan lereng Gunung Merapi.</p><p>Jarak dari pusat kecamatan Seyegan sekitar 3 km, dari pusat kabupaten Sleman sekitar 12 km, dan dari pusat Kota Yogyakarta sekitar 18 km. Akses jalan menuju dusun sudah cukup baik, sehingga memudahkan mobilitas warga dan distribusi hasil pertanian.</p>',
        ]);

        $kelamin = [
            ['category' => 'jenis_kelamin', 'subcategory' => 'Laki-laki', 'count' => 485, 'male' => 485, 'female' => null],
            ['category' => 'jenis_kelamin', 'subcategory' => 'Perempuan', 'count' => 472, 'male' => null, 'female' => 472],
        ];
        foreach ($kelamin as $data) {
            PopulationStatistic::create($data);
        }

        $usia = [
            ['category' => 'kelompok_usia', 'subcategory' => '0–5 tahun', 'count' => 85],
            ['category' => 'kelompok_usia', 'subcategory' => '6–12 tahun', 'count' => 112],
            ['category' => 'kelompok_usia', 'subcategory' => '13–17 tahun', 'count' => 98],
            ['category' => 'kelompok_usia', 'subcategory' => '18–25 tahun', 'count' => 135],
            ['category' => 'kelompok_usia', 'subcategory' => '26–40 tahun', 'count' => 198],
            ['category' => 'kelompok_usia', 'subcategory' => '41–60 tahun', 'count' => 215],
            ['category' => 'kelompok_usia', 'subcategory' => '> 60 tahun', 'count' => 114],
        ];
        foreach ($usia as $data) {
            PopulationStatistic::create($data);
        }

        $pekerjaan = [
            ['category' => 'pekerjaan', 'subcategory' => 'Petani', 'count' => 245],
            ['category' => 'pekerjaan', 'subcategory' => 'Peternak', 'count' => 78],
            ['category' => 'pekerjaan', 'subcategory' => 'Wiraswasta', 'count' => 132],
            ['category' => 'pekerjaan', 'subcategory' => 'Pelajar/Mahasiswa', 'count' => 156],
            ['category' => 'pekerjaan', 'subcategory' => 'Ibu Rumah Tangga', 'count' => 185],
            ['category' => 'pekerjaan', 'subcategory' => 'Pekerjaan lainnya', 'count' => 161],
        ];
        foreach ($pekerjaan as $data) {
            PopulationStatistic::create($data);
        }

        $agama = [
            ['category' => 'agama', 'subcategory' => 'Islam', 'count' => 612],
            ['category' => 'agama', 'subcategory' => 'Kristen', 'count' => 145],
            ['category' => 'agama', 'subcategory' => 'Katolik', 'count' => 85],
            ['category' => 'agama', 'subcategory' => 'Hindu', 'count' => 72],
            ['category' => 'agama', 'subcategory' => 'Buddha', 'count' => 28],
            ['category' => 'agama', 'subcategory' => 'Kepercayaan/lainnya', 'count' => 15],
        ];
        foreach ($agama as $data) {
            PopulationStatistic::create($data);
        }

        $kegiatan = [
            ['category' => 'Pertanian', 'name' => 'Panen Raya Padi', 'description' => 'Kegiatan panen padi bersama yang dilakukan oleh seluruh warga petani di Dusun Jlegongan setiap musim panen tiba.'],
            ['category' => 'Pertanian', 'name' => 'Penanaman Pohon', 'description' => 'Program penanaman pohon buah dan tanaman keras di lahan-lahan pekarangan warga dan area hutan desa.'],
            ['category' => 'Peternakan', 'name' => 'Pelatihan Ternak Kambing', 'description' => 'Pelatihan dan penyuluhan mengenai cara beternak kambing yang sehat dan produktif bagi warga peternak.'],
            ['category' => 'Peternakan', 'name' => 'Pemberian Pakan Ternak', 'description' => 'Program pemberian pakan tambahan untuk ternak warga pada musim kemarau.'],
            ['category' => 'Karang Taruna', 'name' => 'Gotong Royong', 'description' => 'Kegiatan gotong royong membersihkan lingkungan dusun yang diadakan setiap minggu pertama oleh pemuda Karang Taruna.'],
            ['category' => 'Karang Taruna', 'name' => 'Posyandu Remaja', 'description' => 'Layanan kesehatan khusus bagi remaja yang dikelola oleh Karang Taruna bekerja sama dengan puskesmas terdekat.'],
            ['category' => 'Lainnya', 'name' => 'Arisan Warga', 'description' => 'Kegiatan arisan rutin warga Dusun Jlegongan sebagai sarana silaturahmi antar tetangga.'],
        ];
        foreach ($kegiatan as $data) {
            Activity::create($data);
        }

        $fasilitas = [
            [
                'name' => 'Perpustakaan Dusun Jlegongan',
                'description' => 'Perpustakaan dusun yang menyediakan berbagai koleksi buku bacaan, buku pelajaran, dan literatur umum. Dikelola secara sukarela oleh warga dan terbuka untuk semua kalangan.',
                'schedule' => 'Senin–Sabtu: 08.00–16.00',
            ],
            [
                'name' => 'TPA Baitul Hikmah',
                'description' => 'Taman Pendidikan Al-Quran Baitul Hikmah merupakan lembaga pendidikan non-formal untuk anak-anak usia dini dan sekolah dasar dalam mempelajari Al-Quran. Dibimbing oleh ustadz dan ustadzah berpengalaman.',
                'schedule' => 'Senin–Jumat: 15.00–17.00',
            ],
            [
                'name' => 'Rumah Hibah',
                'description' => 'Rumah Hibah adalah balai pertemuan serbaguna yang digunakan untuk berbagai kegiatan warga, seperti rapat RT, pengajian, arisan, dan kegiatan kebersamaan lainnya. Fasilitas ini juga dapat disewa warga dengan biaya yang sangat terjangkau.',
                'schedule' => 'Setiap hari: 06.00–21.00',
            ],
        ];
        foreach ($fasilitas as $data) {
            Facility::create($data);
        }

        $potensi = [
            [
                'category' => 'Sosial Kemasyarakatan',
                'title' => 'Toleransi Antar Umat Beragama',
                'description' => 'Dusun Jlegongan dikenal sebagai dusun yang menjunjung tinggi nilai toleransi. Warga dari berbagai latar belakang agama hidup rukun berdampingan.',
                'content' => '<p>Salah satu contoh nyata toleransi di Dusun Jlegongan adalah tradisi warga Muslim yang secara rutin datang membantu mempersiapkan perayaan Natal bagi saudara-saudara Kristen dan Katolik. Demikian pula, warga Kristen dan Katolik dengan senang hati membantu saat perayaan Hari Raya Idul Fitri.</p><p>Tradisi doa bersama lintas agama juga rutin diadakan, terutama pada saat-saat penting seperti perayaan hari kemerdekaan, panen raya, atau ketika ada musibah yang menimpa warga. Semua elemen masyarakat berkumpul tanpa memandang perbedaan keyakinan untuk mendoakan yang terbaik bagi dusun dan seluruh warganya.</p><p>Nilai-nilai kebersamaan ini telah diwariskan secara turun-temurun dan menjadi bagian identitas dari warga Dusun Jlegongan. Tidak ada sekat-sekat yang memisahkan antarumat beragama, yang ada hanyalah rasa kemanusiaan dan persaudaraan yang tinggi.</p>',
                'source' => 'Mojok.co — "Belajar Toleransi dari Natal Warga Jlegongan"',
                'source_url' => 'https://mojok.co/liputan/belajar-toleransi-dari-natal-warga-jlegongan/amp/',
            ],
            [
                'category' => 'Pertanian',
                'title' => 'Potensi Pertanian Padi dan Palawija',
                'description' => 'Tanah di Dusun Jlegongan sangat subur, menjadikannya penghasil padi dan palawija berkualitas tinggi.',
                'content' => '<p>Dusun Jlegongan memiliki lahan sawah yang luas dengan sistem irigasi yang baik. Hasil panen padi di dusun ini rata-rata mencapai 5-7 ton per hektar. Selain padi, warga juga menanam berbagai jenis palawija seperti jagung, kacang tanah, dan kedelai.</p>',
            ],
            [
                'category' => 'Peternakan',
                'title' => 'Peternakan Kambing dan Sapi',
                'description' => 'Peternakan kambing dan sapi merupakan mata pencaharian tambahan yang cukup menjanjikan bagi warga.',
                'content' => '<p>Lebih dari 30% warga Dusun Jlegongan memiliki ternak, baik kambing maupun sapi. Ketersediaan pakan hijauan yang melimpah membuat peternakan di dusun ini sangat potensial untuk dikembangkan lebih lanjut.</p>',
            ],
            [
                'category' => 'Kepemudaan',
                'title' => 'Karang Taruna yang Aktif dan Kreatif',
                'description' => 'Pemuda Dusun Jlegongan tergabung dalam organisasi Karang Taruna yang sangat aktif mengadakan berbagai kegiatan positif.',
                'content' => '<p>Karang Taruna Dusun Jlegongan secara rutin mengadakan kegiatan olahraga, seni budaya, pengajian remaja, dan kegiatan sosial lainnya. Organisasi ini juga menjadi wadah bagi pemuda untuk mengembangkan kreativitas dan jiwa kepemimpinan.</p>',
            ],
            [
                'category' => 'Lainnya',
                'title' => 'Kerajinan Tangan dan UMKM',
                'description' => 'Banyak warga Dusun Jlegongan yang mengembangkan usaha mikro, kecil, dan menengah di bidang kerajinan tangan.',
                'content' => '<p>Beberapa produk kerajinan tangan dari Dusun Jlegongan antara lain anyaman bambu, kerajinan dari kayu, dan olahan makanan tradisional. Produk-produk ini telah dipasarkan hingga ke luar daerah melalui pameran-pameran UMKM.</p>',
            ],
        ];
        foreach ($potensi as $data) {
            Potential::create($data);
        }

        $jadwal = [
            ['name' => 'Pengajian Rutin', 'day' => 'Senin', 'time' => '19.00–20.30', 'description' => 'Pengajian rutin Bapak-Bapak dan Ibu-Ibu di Musholla Al-Hidayah.'],
            ['name' => 'Latihan Karang Taruna', 'day' => 'Selasa', 'time' => '19.00–21.00', 'description' => 'Latihan kepemudaan dan rapat evaluasi kegiatan Karang Taruna.'],
            ['name' => 'Posyandu Balita', 'day' => 'Rabu', 'time' => '08.00–11.00', 'description' => 'Pemeriksaan kesehatan rutin bagi balita dan ibu hamil di Posyandu Melati.'],
            ['name' => 'Arisan Ibu-Ibu', 'day' => 'Kamis', 'time' => '14.00–16.00', 'description' => 'Kegiatan arisan dan silaturahmi Ibu-Ibu PKK Dusun Jlegongan.'],
            ['name' => 'Gotong Royong', 'day' => 'Sabtu', 'time' => '07.00–10.00', 'description' => 'Kegiatan kerja bakti membersihkan lingkungan dusun.'],
            ['name' => 'Olahraga Bersama', 'day' => 'Minggu', 'time' => '06.00–08.00', 'description' => 'Senam dan olahraga pagi bersama di Lapangan Dusun Jlegongan.'],
            ['name' => 'TPA Baitul Hikmah', 'day' => 'Senin–Jumat', 'time' => '15.00–17.00', 'description' => 'Kegiatan belajar mengajar di Taman Pendidikan Al-Quran.'],
        ];
        foreach ($jadwal as $data) {
            Schedule::create($data);
        }

        $organisasi = [
            [
                'type' => 'PKK',
                'name' => 'PKK Dusun Jlegongan',
                'description' => 'PKK (Pemberdayaan Kesejahteraan Keluarga) Dusun Jlegongan adalah organisasi kemasyarakatan yang mewadahi kegiatan ibu-ibu dalam meningkatkan kesejahteraan keluarga dan masyarakat. PKK Jlegongan aktif dalam berbagai program pengabdian masyarakat.',
                'activities' => '<p><strong>Kegiatan Rutin PKK:</strong></p><ul><li>Posyandu balita dan lansia setiap hari Rabu</li><li>Program BKKBN dan kesehatan keluarga</li><li>Pelatihan keterampilan memasak dan kerajinan tangan</li><li>Arisan dan dana sosial bergulir</li><li>Rapat rutin setiap bulan</li><li>Peringatan Hari Ibu dan hari besar lainnya</li></ul>',
            ],
            [
                'type' => 'KWT',
                'name' => 'KWT Mekar Sari',
                'description' => 'KWT (Kelompok Wanita Tani) Mekar Sari merupakan kelompok tani wanita di Dusun Jlegongan yang fokus pada pemberdayaan wanita di bidang pertanian dan usaha mikro. KWT ini membantu meningkatkan ekonomi keluarga melalui kegiatan produktif yang dikelola oleh ibu-ibu tani.',
                'activities' => '<p><strong>Kegiatan Rutin KWT Mekar Sari:</strong></p><ul><li>Budidaya sayuran organik di kebun kolektif</li><li>Pelatihan pengolahan hasil pertanian</li><li>Pemasaran produk hasil pertanian warga</li><li>Program tabungan wanita tani</li><li>Pertemuan rutin setiap minggu kedua</li><li>Pelatihan kewirausahaan dan manajemen usaha</li></ul>',
            ],
        ];
        foreach ($organisasi as $data) {
            Organization::create($data);
        }

        $galeri = [
            ['title' => 'Panen Raya Padi', 'description' => 'Kegiatan panen padi bersama warga Dusun Jlegongan', 'category' => 'Pertanian'],
            ['title' => 'Gotong Royong', 'description' => 'Warga bersama-sama membersihkan selokan dusun', 'category' => 'Kegiatan'],
            ['title' => 'Perayaan Natal Bersama', 'description' => 'Momen kebersamaan warga lintas agama saat perayaan Natal', 'category' => 'Sosial'],
            ['title' => 'Posyandu Balita', 'description' => 'Pemeriksaan kesehatan rutin balita di Posyandu Melati', 'category' => 'Kesehatan'],
            ['title' => 'Karang Taruna', 'description' => 'Pemuda Karang Taruna saat latihan voli bersama', 'category' => 'Kepemudaan'],
            ['title' => 'TPA Baitul Hikmah', 'description' => 'Anak-anak sedang belajar mengaji di TPA', 'category' => 'Pendidikan'],
            ['title' => 'Peternakan Kambing', 'description' => 'Warga peternak sedang memberi makan ternak kambing', 'category' => 'Peternakan'],
            ['title' => 'KWT Mekar Sari', 'description' => 'Ibu-ibu KWT sedang memanen sayuran organik', 'category' => 'Pertanian'],
        ];
        foreach ($galeri as $data) {
            Gallery::create($data);
        }
    }
}
