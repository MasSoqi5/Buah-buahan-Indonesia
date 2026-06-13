namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\Buah;
use Illuminate\Support\Str;
 
class BuahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'        => 'Durian',
                'nama_latin'  => 'Durio zibethinus',
                'asal_daerah' => 'Kalimantan',
                'musim_panen' => 'Desember - Februari',
                'deskripsi'   => 'Durian dijuluki "Raja Buah" di Asia Tenggara. Buah ini terkenal dengan aromanya yang kuat dan daging buah berwarna kuning atau putih yang lembut dan kaya rasa. Di Indonesia, durian tumbuh subur di Kalimantan, Sumatera, dan Sulawesi.',
                'manfaat'     => 'Kaya akan vitamin C, vitamin B kompleks, kalium, dan serat. Durian membantu meningkatkan energi, menjaga kesehatan tulang, dan mengandung antioksidan tinggi.',
                'author'      => 'Siti Rahayu',
            ],
            [
                'nama'        => 'Salak',
                'nama_latin'  => 'Salacca zalacca',
                'asal_daerah' => 'Jawa',
                'musim_panen' => 'Sepanjang tahun',
                'deskripsi'   => 'Salak adalah buah asli Indonesia yang khas dengan kulit bersisik coklat seperti kulit ular. Daging buahnya berwarna putih kekuningan, berasa manis dan sedikit sepat. Salak Pondoh dari Sleman, Yogyakarta sangat terkenal.',
                'manfaat'     => 'Mengandung tanin, saponin, dan flavonoid. Baik untuk kesehatan mata, membantu menurunkan kolesterol, dan mengandung kalsium untuk tulang.',
                'author'      => 'Ahmad Fauzi',
            ],
            [
                'nama'        => 'Manggis',
                'nama_latin'  => 'Garcinia mangostana',
                'asal_daerah' => 'Sumatera Barat',
                'musim_panen' => 'Oktober - Januari',
                'deskripsi'   => 'Manggis dikenal sebagai "Ratu Buah" karena rasanya yang lezat dan manis-asam yang menyegarkan. Kulitnya berwarna ungu gelap dengan daging putih berbentuk segmen. Buah ini kaya akan xanthone.',
                'manfaat'     => 'Kulit manggis mengandung xanthone tertinggi di dunia. Bermanfaat sebagai antioksidan, anti-inflamasi, antikanker, dan meningkatkan daya tahan tubuh.',
                'author'      => 'Dewi Lestari',
            ],
            [
                'nama'        => 'Rambutan',
                'nama_latin'  => 'Nephelium lappaceum',
                'asal_daerah' => 'Sumatera',
                'musim_panen' => 'November - Februari',
                'deskripsi'   => 'Rambutan adalah buah tropis yang terkenal dengan rambut-rambut lembut berwarna merah atau kuning di kulitnya. Daging buahnya putih, manis, dan berair. Nama "rambutan" berasal dari kata "rambut" dalam bahasa Melayu.',
                'manfaat'     => 'Kaya vitamin C dan zat besi. Membantu meningkatkan imunitas, mencegah anemia, dan menjaga kesehatan kulit.',
                'author'      => 'Budi Santoso',
            ],
            [
                'nama'        => 'Belimbing Wuluh',
                'nama_latin'  => 'Averrhoa bilimbi',
                'asal_daerah' => 'Jawa',
                'musim_panen' => 'Sepanjang tahun',
                'deskripsi'   => 'Belimbing Wuluh adalah buah khas Nusantara yang sangat asam dan sering digunakan sebagai bumbu masakan Indonesia. Bentuknya memanjang dan berwarna hijau. Berbeda dengan belimbing manis, buah ini hampir tidak dimakan langsung.',
                'manfaat'     => 'Digunakan dalam pengobatan tradisional untuk menurunkan tekanan darah, mengobati batuk, dan sebagai bahan perawatan kulit alami.',
                'author'      => 'Rina Sari',
            ],
            [
                'nama'        => 'Nangka',
                'nama_latin'  => 'Artocarpus heterophyllus',
                'asal_daerah' => 'Jawa',
                'musim_panen' => 'Januari - Agustus',
                'deskripsi'   => 'Nangka adalah salah satu buah terbesar di dunia, bisa mencapai 35 kg. Dagingnya berwarna kuning, manis, dan beraroma harum. Di Indonesia, nangka muda (gori) juga dimasak sebagai sayuran dalam berbagai hidangan tradisional.',
                'manfaat'     => 'Mengandung vitamin A, C, dan kalium. Serat tinggi untuk pencernaan, serta biji nangka bisa direbus sebagai sumber protein nabati.',
                'author'      => 'Hendra Wijaya',
            ],
        ];
 
        foreach ($data as $item) {
            $item['slug'] = Str::slug($item['nama']);
            Buah::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }