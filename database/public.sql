/*
 Navicat Premium Data Transfer

 Source Server         : localhost postgree
 Source Server Type    : PostgreSQL
 Source Server Version : 90524
 Source Host           : localhost:5432
 Source Catalog        : rukun_tetangga
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90524
 File Encoding         : 65001

 Date: 25/09/2021 19:11:37
*/


-- ----------------------------
-- Sequence structure for FAQ_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."FAQ_id_seq";
CREATE SEQUENCE "public"."FAQ_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for biografi_ketua_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."biografi_ketua_id_seq";
CREATE SEQUENCE "public"."biografi_ketua_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for data_covid_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."data_covid_id_seq";
CREATE SEQUENCE "public"."data_covid_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for detail_surat_menikah_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_surat_menikah_id_seq";
CREATE SEQUENCE "public"."detail_surat_menikah_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jadwal_ronda_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jadwal_ronda_id_seq";
CREATE SEQUENCE "public"."jadwal_ronda_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_berita_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_berita_id_seq";
CREATE SEQUENCE "public"."master_berita_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_testimoni_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_testimoni_id_seq";
CREATE SEQUENCE "public"."master_testimoni_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_tugas_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_tugas_id_seq";
CREATE SEQUENCE "public"."master_tugas_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_video_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_video_id_seq";
CREATE SEQUENCE "public"."master_video_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for struktur_organisasi_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."struktur_organisasi_id_seq";
CREATE SEQUENCE "public"."struktur_organisasi_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for surat_domisili_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."surat_domisili_id_seq";
CREATE SEQUENCE "public"."surat_domisili_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for surat_menikah_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."surat_menikah_id_seq";
CREATE SEQUENCE "public"."surat_menikah_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for FAQ
-- ----------------------------
DROP TABLE IF EXISTS "public"."FAQ";
CREATE TABLE "public"."FAQ" (
  "id" int8 NOT NULL DEFAULT nextval('"FAQ_id_seq"'::regclass),
  "question" varchar(100) COLLATE "pg_catalog"."default",
  "answer" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of FAQ
-- ----------------------------
INSERT INTO "public"."FAQ" VALUES (1, 'Bagaimana Cara menggunaakn website ini?', 'Cara nya adalah dengan mengakses link yang sudah ditetakan');
INSERT INTO "public"."FAQ" VALUES (2, 'Cara mengubah NIK sebagai masuk?', 'Silahkan Hubungi Ketua RT setempat untuk mengubah NIK');
INSERT INTO "public"."FAQ" VALUES (5, 'Bagaimana cara mendapatkan akses login?', 'Untuk mendapatkan akses login bisa menghubungi pengurus RT setempat untuk dibuatkan akses akun login');
INSERT INTO "public"."FAQ" VALUES (6, 'Apakah tanda tangan digital dapat diakui dikelurahan setempat?', 'menurut keterangan Ketua RT 015 / RW 010 untuk tanda tangan digital dapat diakui.');
INSERT INTO "public"."FAQ" VALUES (7, 'Apakah bisa digunakan untuk warga diluar RT 015 RW 010?', 'Untuk saat ini hanya bisa digunakan warga RT 015/ 010 karena hanya nomor induk kependudukan warga RT 015/010 saja yang diberikan akses.');

-- ----------------------------
-- Table structure for biografi_ketua
-- ----------------------------
DROP TABLE IF EXISTS "public"."biografi_ketua";
CREATE TABLE "public"."biografi_ketua" (
  "id" int2 NOT NULL DEFAULT nextval('biografi_ketua_id_seq'::regclass),
  "nama" varchar(100) COLLATE "pg_catalog"."default",
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "deskripsi" varchar(255) COLLATE "pg_catalog"."default",
  "biografi" varchar(1200) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of biografi_ketua
-- ----------------------------
INSERT INTO "public"."biografi_ketua" VALUES (1, 'Bapak Rasiman', '61004650c0737.png', 'Bapak Rasiman, seorang kepala keluarga dan juga ketua rukun tetangga ini sangat akrab dengan warga nya ,apalagi dengan para pemuda yang terbentuk dalam sebuah organisasi didalam warga nya yaitu Karang Taruna', 'Pada tahun 1975-1990 pernah menjabat sebagai anggota Hansip, Ketua Karang Taruna dan Ketua AMPI Desa Buniayu. Beliau menjadi Perangkat Desa Buniayu mulai tahun 1991 dengan jabatan Kaur Keuangan sampai dengan tahun 2002. Kemudian pada tahun 2003 menjabat sebagai Kaur Umum Desa Buniayu dan pada tahun 2007 diangkat menjadi Pj. Kepala Desa Buniayu selama 1,5 tahun dan diteruskan menjadi Kuar Umum kembali dalam melaksanakan tugas kesehariannya. Pada tanggal 1 Juni 2013 di Desa buniayu diadakan Pilkades (Pemilihan Kepala Desa) ternyata beliau terpilih menjadi Kepala Desa Buniayu Kecamatan Tambak Kabupaten Banyumas periode 2013-2019. Beliau seorang anak guru ngaji Pimpinan Pondok Pesantren (Pon-Pes) Islami Desa Buniayu yang didirikan pada tahun 1927-1965. Begitulah sekelumit cerita dari sosok seorang anak ndeso yang sekarang menjabat menjadi Kepala Desa Buniayu atau SATRIA UJUNG TIMUR karena Desa Buniayu Kecamatan Tambak adalah daerah paling ujung bagian Timur dari wilayah Banyumas yang berbatasan dengan wilayah Kabupaten Kebumen');

-- ----------------------------
-- Table structure for data_covid
-- ----------------------------
DROP TABLE IF EXISTS "public"."data_covid";
CREATE TABLE "public"."data_covid" (
  "id" int8 NOT NULL DEFAULT nextval('data_covid_id_seq'::regclass),
  "id_provinsi" varchar(10) COLLATE "pg_catalog"."default",
  "shortlabel" varchar(10) COLLATE "pg_catalog"."default",
  "label" varchar(100) COLLATE "pg_catalog"."default",
  "jumlah_kasus" float8,
  "jumlah_sembuh" float8,
  "jumlah_meninggal" float8,
  "jumlah_dirawat" float8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of data_covid
-- ----------------------------
INSERT INTO "public"."data_covid" VALUES (14, '18', 'NT', 'NUSA TENGGARA TIMUR', 62427, 59619, 1277, 1531, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (15, '32', 'SL', 'SUMATERA SELATAN', 59482, 55711, 3022, 749, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (16, '40', 'KR', 'KEPULAUAN RIAU', 53523, 51026, 1725, 772, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (17, '35', 'BB', 'KEPULAUAN BANGKA BELITUNG', 50882, 47643, 1370, 1869, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (18, '15', 'LA', 'LAMPUNG', 48836, 42949, 3728, 2159, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (19, '21', 'ST', 'SULAWESI TENGAH', 45978, 42640, 1536, 1802, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (20, '13', 'KT', 'KALIMANTAN TENGAH', 44963, 41767, 1379, 1817, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (21, '11', 'KB', 'KALIMANTAN BARAT', 39664, 38260, 1034, 370, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (22, '01', 'AC', 'ACEH', 37395, 30654, 1834, 4907, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (23, '42', 'KU', 'KALIMANTAN UTARA', 34684, 30594, 761, 3329, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (24, '31', 'SA', 'SULAWESI UTARA', 34026, 31678, 1022, 1326, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (1, '04', 'JK', 'DKI JAKARTA', 856931, 840206, 13505, 3220, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (2, '30', 'JR', 'JAWA BARAT', 701723, 681990, 14553, 5180, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (25, '36', 'PA', 'PAPUA', 33576, 31199, 421, 1956, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (26, '05', 'JA', 'JAMBI', 29437, 27823, 769, 845, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (27, '17', 'NB', 'NUSA TENGGARA BARAT', 27286, 25994, 786, 506, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (28, '03', 'BE', 'BENGKULU', 22990, 22439, 465, 86, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (29, '39', 'IB', 'PAPUA BARAT', 22869, 22382, 351, 136, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (30, '22', 'SG', 'SULAWESI TENGGARA', 19993, 18906, 518, 569, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (31, '28', 'MA', 'MALUKU', 14500, 13958, 257, 285, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (32, '41', 'SR', 'SULAWESI BARAT', 12085, 11302, 330, 453, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (33, '29', 'MU', 'MALUKU UTARA', 11935, 11499, 302, 134, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (34, '34', 'GO', 'GORONTALO', 11708, 10905, 455, 348, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (3, '07', 'JT', 'JAWA TENGAH', 480688, 446197, 29758, 4733, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (4, '08', 'JI', 'JAWA TIMUR', 394385, 361185, 29284, 3916, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (5, '14', 'KI', 'KALIMANTAN TIMUR', 156365, 148530, 5348, 2487, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (6, '10', 'YO', 'DAERAH ISTIMEWA YOGYAKARTA', 154398, 145954, 5140, 3304, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (7, '33', 'BT', 'BANTEN', 131202, 127308, 2662, 1232, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (8, '37', 'RI', 'RIAU', 127383, 121544, 4017, 1822, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (9, '02', 'BA', 'BALI', 112059, 105570, 3861, 2628, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (10, '38', 'SN', 'SULAWESI SELATAN', 108230, 103480, 2185, 2565, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (11, '26', 'SU', 'SUMATERA UTARA', 104194, 97431, 2775, 3988, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (12, '24', 'SB', 'SUMATERA BARAT', 89066, 84973, 2092, 2001, NULL, NULL);
INSERT INTO "public"."data_covid" VALUES (13, '12', 'KS', 'KALIMANTAN SELATAN', 69219, 65484, 2315, 1420, NULL, NULL);

-- ----------------------------
-- Table structure for detail_surat_menikah
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_surat_menikah";
CREATE TABLE "public"."detail_surat_menikah" (
  "id" int8 NOT NULL DEFAULT nextval('detail_surat_menikah_id_seq'::regclass),
  "id_menikah" int8,
  "nama" varchar(100) COLLATE "pg_catalog"."default",
  "tempat_lahir" varchar(30) COLLATE "pg_catalog"."default",
  "tgl_lahir" date,
  "bin_binti" varchar(100) COLLATE "pg_catalog"."default",
  "agama" varchar(20) COLLATE "pg_catalog"."default",
  "pekerjaan" varchar(100) COLLATE "pg_catalog"."default",
  "alamat" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "jenis_kelamin" varchar(10) COLLATE "pg_catalog"."default",
  "nik_ktp" int4,
  "data" varchar(10) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of detail_surat_menikah
-- ----------------------------
INSERT INTO "public"."detail_surat_menikah" VALUES (3, 2, 'Muhamad Nur Akmal', 'Jakarta', '2000-07-20', 'Ramones', 'Islam', 'Directur Utama', 'Jalan Raya Poncol', NULL, NULL, 'Laki Laki', 3, 'diri');
INSERT INTO "public"."detail_surat_menikah" VALUES (4, 2, 'Susi Susniati', 'Purbalingga', '1998-07-21', 'Belom tau', 'Islam', 'Sekretaris Directur Utama', 'Jalan Pejaten', NULL, NULL, 'Perempuan', 12553523, 'pasangan');
INSERT INTO "public"."detail_surat_menikah" VALUES (1, 1, 'Brayen Prayoga S.T,', 'Jakarta Timur', '2021-06-13', 'Sony', 'Islam', 'Software Engineer', 'Jalan Raya Centex Gg Epatik 2 Dalam No.12A RT 15 / RW 10', NULL, NULL, 'Laki Laki', 3, 'diri');
INSERT INTO "public"."detail_surat_menikah" VALUES (2, 1, 'Fitri Nurfadilah', 'Jakarta', '2021-07-02', 'Andri Agustian', 'Islam', 'Admin Asyiqa Butik', 'Jalan Raya Soreang Banjaran', NULL, NULL, 'Perempuan', 317509107, 'pasangan');

-- ----------------------------
-- Table structure for jadwal_ronda
-- ----------------------------
DROP TABLE IF EXISTS "public"."jadwal_ronda";
CREATE TABLE "public"."jadwal_ronda" (
  "id" int8 NOT NULL DEFAULT nextval('jadwal_ronda_id_seq'::regclass),
  "id_users" int8,
  "tgl_ronda" date,
  "status" int2
)
;
COMMENT ON COLUMN "public"."jadwal_ronda"."status" IS '1 = Hadir ,2 = Digantikan 3 = Tidak Hadir';

-- ----------------------------
-- Records of jadwal_ronda
-- ----------------------------
INSERT INTO "public"."jadwal_ronda" VALUES (2, 2, '2021-03-27', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (6, 6, '2021-03-27', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (8, 8, '2021-03-27', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (4, 4, '2021-03-30', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (5, 5, '2021-03-30', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (7, 7, '2021-03-27', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (14, 3, '2021-07-24', NULL);
INSERT INTO "public"."jadwal_ronda" VALUES (15, 10, '2021-08-15', NULL);

-- ----------------------------
-- Table structure for master_berita
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_berita";
CREATE TABLE "public"."master_berita" (
  "id" int8 NOT NULL DEFAULT nextval('master_berita_id_seq'::regclass),
  "judul" varchar(50) COLLATE "pg_catalog"."default",
  "deskripsi" varchar(255) COLLATE "pg_catalog"."default",
  "isi" varchar(1200) COLLATE "pg_catalog"."default",
  "gambar" varchar(100) COLLATE "pg_catalog"."default",
  "status" int2,
  "status_news" varchar(20) COLLATE "pg_catalog"."default",
  "tanggal" date
)
;

-- ----------------------------
-- Records of master_berita
-- ----------------------------
INSERT INTO "public"."master_berita" VALUES (1, 'Banjir Tahunan', 'Terjadi banjr di wilayah RT 15/10 Ciracas pada tanggal 15 Januari 2021.', 'Terjadi banjr di wilayah RT 15/10 Ciracas pada tanggal 15 Januari 2021. Banjir terjadi dikarenakan meluapnya kali ciliwung. Beberapa rumah warga terendam hingga sepinggang orang dewasa yang menyebabkan beberapa lansia terpaksa mengungsi dirumah sodara nya', '6086e0ffa73bc.png', 1, 'latest', '2021-07-05');
INSERT INTO "public"."master_berita" VALUES (2, 'Wabah Covid', 'seorang warga diketahui terpapar virus covid-19 setelah melakukan swab test yang diwajibkan melalui tempat warga tersebut bekerja.', 'seorang warga diketahui terpapar virus covid-19 setelah melakukan swab test yang diwajibkan melalui tempat warga tersebut bekerja. Setelah diketahui bahwa ada warga yang terkena covid-19, ketua RT 15 langsung memanggil satgas covid untuk dilakukan penjemputan agar tidak penyebar kepada warga lain. Ketua RT 15 dan pengurus RT lainnnya melakukan penyemprotan kerumah rumah warga agar tidak menyebar kewarga lainnya.', '6086e02ad427c.png', 1, 'popular', '2021-07-04');

-- ----------------------------
-- Table structure for master_testimoni
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_testimoni";
CREATE TABLE "public"."master_testimoni" (
  "id" int8 NOT NULL DEFAULT nextval('master_testimoni_id_seq'::regclass),
  "id_users" int8,
  "pesan" varchar(400) COLLATE "pg_catalog"."default",
  "status" int2
)
;

-- ----------------------------
-- Records of master_testimoni
-- ----------------------------
INSERT INTO "public"."master_testimoni" VALUES (2, 3, 'Kalo dari saya mah support sekali ada nya website ini karena dalam kondisi skrng ini untuk mengurangi kontak antar warga', 1);
INSERT INTO "public"."master_testimoni" VALUES (5, 3, 'Seperti nya butuh sedikit pelatihan untuk menggunakan ini ,karena untuk beberapa orang tua pasti bingung dalam penggunaan nya', 1);
INSERT INTO "public"."master_testimoni" VALUES (6, 3, 'TEST TESTIMONI', 1);

-- ----------------------------
-- Table structure for master_tugas
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_tugas";
CREATE TABLE "public"."master_tugas" (
  "id" int8 NOT NULL DEFAULT nextval('master_tugas_id_seq'::regclass),
  "jabatan" varchar(50) COLLATE "pg_catalog"."default",
  "tugas" varchar(500) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of master_tugas
-- ----------------------------
INSERT INTO "public"."master_tugas" VALUES (1, 'Penasihat', 'Memberikan saran, pendapat, dan pemikiran perihal kinerja pengurus RT. Memberikan motivasi kepada pengurus RT dalam melaksanakan program kerja');
INSERT INTO "public"."master_tugas" VALUES (2, 'Ketua', 'Membantu menjalankan tugas pelayanan kepada masyarakat yang menjadi tanggung jawab Pemerintah Kota/Kabupaten, Memelihara Kerukunan hidup warga, serta Menyusun rencana dan melaksanakan pembangunan dengan mengembangkan aspirasi dan swadaya murni masyarakat');
INSERT INTO "public"."master_tugas" VALUES (3, 'Sekretaris', 'Menyelenggarakan administrasi dan memberikan saran-saran serta pertimbangan kepada Ketua untuk kemajuan dan perkembangan RT. Penyelenggaraan surat-menyurat, kearsipan, pendataan dan penyusunan laporan. Pelaksanaan tugas-tugas tertentu yang diberikan oleh Ketua');
INSERT INTO "public"."master_tugas" VALUES (4, 'Bendahara', 'Menyelenggarakan pengelolaan administrasi keuangan RT termasuk benda-benda bergerak dan tidak bergerak. Pengelolaan, penerimaan, penyimpanan dan pengeluaran keuangan RT');
INSERT INTO "public"."master_tugas" VALUES (5, 'Humas', 'Membantu merencanakan, menyiapkan, dan menyusun program dan kebijakan RT, mengumumkan dan mengkoordinasikan program dan kebijakan RT dengan masyarakat dan berbagai pihak terkait, dan menerima saran, usulan, kritik, dan data-data dari warga');
INSERT INTO "public"."master_tugas" VALUES (6, 'Ketahanan', 'Mengelola keamanan dan ketertiban dilingkungan, mengatur pengamanan keluar masuk orang, barang dan binatang, serta pengamanan kegiatan warga');
INSERT INTO "public"."master_tugas" VALUES (7, 'Kesejahteraan Masyarakat', 'Melaksanakan program, pembinaan, fasilitasi dan koordinasi pelaksanaan kebijakan di bidang agama, pendidikan, pemuda dan olahraga serta kesejahteraan sosial');
INSERT INTO "public"."master_tugas" VALUES (8, 'Pembangunan', 'Membantu membuat perencanaan dan pelaksanaan pembangunan serta meningkatkan prakarsa, menggerakan partisipasi masyarakat untuk melaksanakan pembangunan');
INSERT INTO "public"."master_tugas" VALUES (9, 'Sosial', 'Menciptakan suasana kerukunan dan kebersamaan warga dalam segala aspek kehidupan, tanpa ada sifat diskriminasi dan beda perlakuan antar sesama warga');
INSERT INTO "public"."master_tugas" VALUES (10, 'Pemberdayaan Kesejahteraan Keluarga', 'Bertanggung jawab atas seluruh kegiatan PKK tingkat RT seperti kegiatan posyandu, kesehatan balita dan anak, arisan, darma wanita, pengadian dan kegiatan lain');
INSERT INTO "public"."master_tugas" VALUES (11, 'Karang Taruna', 'Secara bersama sama dengan Pemerintah dan komponen masyarakat lainnya untuk menanggulangi berbagai masalah kesejahteraan sosial terutama yang dihadapi generasi muda, baik yang bersifat preventif, rehabilitatif maupun pengembangan potensi generasi muda di lingkungannya');
INSERT INTO "public"."master_tugas" VALUES (12, 'Pemuda Olahraga', 'Melaksanakan kegiatan untuk membantu program pemerintah dalam bidang penanggulangan kenakalan remaja dan mengarahkan, membimbing serta membina pemuda putus sekolah');
INSERT INTO "public"."master_tugas" VALUES (13, 'Koordinator Jumantik', 'Satu atau lebih jumantik yang ditunjuk oleh Ketua RT untuk melakukan pemantauan dan pembinaan pelaksanaan jumantik rumah dan jumantik lingkungan');
INSERT INTO "public"."master_tugas" VALUES (14, 'Posyandu', 'Melakukan persiapan penyelenggaraan kegiatan Posyandu');
INSERT INTO "public"."master_tugas" VALUES (15, 'Dasa Wisma', 'Kegiatannya diarahkan pada peningkatan kesehatan keluarga. Bentuk kegiatannya seperti arisan, pembuatan jamban, sumur, kembangkan dana sehat (PMT, pengobatan ringan, membangun sarana sampah dan kotoran)');

-- ----------------------------
-- Table structure for master_video
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_video";
CREATE TABLE "public"."master_video" (
  "id" int2 NOT NULL DEFAULT nextval('master_video_id_seq'::regclass),
  "link" varchar(150) COLLATE "pg_catalog"."default",
  "durasi" varchar(10) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of master_video
-- ----------------------------
INSERT INTO "public"."master_video" VALUES (1, 'https://www.youtube.com/watch?v=gAuOBnrpoMw', '07:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (2, '2021_09_25_090726_tbl_data_covid', 1);

-- ----------------------------
-- Table structure for struktur_organisasi
-- ----------------------------
DROP TABLE IF EXISTS "public"."struktur_organisasi";
CREATE TABLE "public"."struktur_organisasi" (
  "id" int2 NOT NULL DEFAULT nextval('struktur_organisasi_id_seq'::regclass),
  "title" varchar(30) COLLATE "pg_catalog"."default",
  "name" varchar(100) COLLATE "pg_catalog"."default",
  "color" varchar(15) COLLATE "pg_catalog"."default",
  "id_noted" varchar(50) COLLATE "pg_catalog"."default",
  "column" int2,
  "height" int2
)
;

-- ----------------------------
-- Records of struktur_organisasi
-- ----------------------------
INSERT INTO "public"."struktur_organisasi" VALUES (7, 'KESRA', '1. A.JAZURI<br>2. ABD. ROHMAN', '#359154', 'Kesra', 3, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (8, 'PEMBANGUNAN', '1. SARNO<br>2. TIYOSO<br>3. SRI HARTONO', '#359154', 'Pembangunan', 3, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (9, 'SOSIAL', '1. ROHMAN<br>2. KAMLI', '#359154', 'Sosial', 3, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (10, 'PKK', '1. AAH. DANIAH<br>2. C.WIJI LESTARI', '#359154', 'PKK', 3, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (11, 'KARANG TARUNA', '1. NUGI<br>2. HARI', '#007bff', 'Kartar', 4, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (12, 'PEMUDA OLAHRAGA', '1. SIGIT<br>2. RIYAN<br>3. ANDRI', '#007bff', 'Olahraga', 4, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (13, 'KOOR JUMANTIK', '1. ENI SUCIATI<br>2. TRI TARSI NINGSIH<br>3. MUTMAINAN.F', '#007bff', 'Jumantik', 4, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (14, 'POSYANDU', '1.ENI SUCIATI', '#007bff', 'Posyandu', 4, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (15, 'DASA WISMA', '1. TRI NURTININGSIHI<br>2. MARIANA<br>3. TRI TARSINGSIH', '#007bff', 'Wisma', 4, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (2, 'KETUA RT 015/010', 'RASIMAN', 'silver', 'Ketua', NULL, NULL);
INSERT INTO "public"."struktur_organisasi" VALUES (3, 'Sekretaris', 'GUNTOYO', '#980104', 'Sekretaris', NULL, NULL);
INSERT INTO "public"."struktur_organisasi" VALUES (4, 'Bendahara', 'IMAM RUSDIONO', '#980104', 'Bendahara', NULL, NULL);
INSERT INTO "public"."struktur_organisasi" VALUES (6, 'KETAHANAN', '1. HERI SUSILO<br>2. A.NURAJAB<br>3. AMIN DAHLAN', '#359154', 'Ketahanan', 3, 80);
INSERT INTO "public"."struktur_organisasi" VALUES (1, 'PENASIHAT', 'Drs. SUNAR', 'silver', 'Penasihat', NULL, NULL);
INSERT INTO "public"."struktur_organisasi" VALUES (5, 'HUMAS', '1. ERWAN<br>2. AGUS', '#359154', 'Humas', 3, 80);

-- ----------------------------
-- Table structure for surat_domisili
-- ----------------------------
DROP TABLE IF EXISTS "public"."surat_domisili";
CREATE TABLE "public"."surat_domisili" (
  "id" int8 NOT NULL DEFAULT nextval('surat_domisili_id_seq'::regclass),
  "nama" varchar(100) COLLATE "pg_catalog"."default",
  "tempat_lahir" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_lahir" date,
  "agama" varchar(20) COLLATE "pg_catalog"."default",
  "status" int2,
  "id_users" int8,
  "catatan" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6)
)
;

-- ----------------------------
-- Records of surat_domisili
-- ----------------------------
INSERT INTO "public"."surat_domisili" VALUES (3, 'Fitri Nurfadilah', 'Bandung', '1999-07-02', 'Islam', 3, 3, 'Data kurang lengkap', NULL, NULL);
INSERT INTO "public"."surat_domisili" VALUES (1, 'Brayen Prayoga', 'Jakarta Timur', '1998-10-13', 'Islam', 2, 3, 'Hahaha hihihi hu', NULL, '2021-07-04 01:26:52');
INSERT INTO "public"."surat_domisili" VALUES (7, 'a', 'a', '2021-07-22', 'a', 0, 3, NULL, NULL, NULL);
INSERT INTO "public"."surat_domisili" VALUES (4, 'a', 'a', '2021-06-03', 'a', 0, 3, NULL, NULL, NULL);
INSERT INTO "public"."surat_domisili" VALUES (8, 'Fathur Rahiem', 'Jakarta Timur', '2021-08-15', 'Islam', 3, 3, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for surat_menikah
-- ----------------------------
DROP TABLE IF EXISTS "public"."surat_menikah";
CREATE TABLE "public"."surat_menikah" (
  "id" int8 NOT NULL DEFAULT nextval('surat_menikah_id_seq'::regclass),
  "id_users" int8,
  "hari" varchar(10) COLLATE "pg_catalog"."default",
  "tanggal" date,
  "nama_kua" varchar(50) COLLATE "pg_catalog"."default",
  "kecamatan" varchar(50) COLLATE "pg_catalog"."default",
  "walikota" varchar(50) COLLATE "pg_catalog"."default",
  "provinsi" varchar(50) COLLATE "pg_catalog"."default",
  "status_nikah" varchar(20) COLLATE "pg_catalog"."default",
  "status" int2,
  "catatan" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of surat_menikah
-- ----------------------------
INSERT INTO "public"."surat_menikah" VALUES (1, 3, 'Selasa', '2021-07-06', 'Ciracas Raya', 'Ciracas', 'Jakarta Timur', 'DKI Jakarta', 'Duda', 0, NULL, '2021-06-29 17:12:20', '2021-07-02 16:43:16');
INSERT INTO "public"."surat_menikah" VALUES (2, 3, 'Senin', '2021-07-12', 'Ciracas Raya', 'Ciracas', 'Jakarta Timur', 'DKI Jakarta', 'Duda', 3, 'untuk pengisian tanggal dan nama ada yang salah, harap diperbaiki', '2021-07-02 16:18:10', '2021-07-04 15:05:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2,
  "password_real" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "nik_ktp" int8,
  "jenis_kelamin" int2
)
;
COMMENT ON COLUMN "public"."users"."status" IS '1 = warga ,2 = admin ';
COMMENT ON COLUMN "public"."users"."jenis_kelamin" IS '1 = laki ,2 = wanita';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'Ketua RT', 'aboutteddybear@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 2, 'kartar15', NULL, '2020-09-19 06:20:32', NULL, 1111111111111111, 1);
INSERT INTO "public"."users" VALUES (2, 'Pengurus', 'pengurus@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 2, 'kartar15', NULL, '2020-09-19 06:01:30', NULL, 2222222222222222, 1);
INSERT INTO "public"."users" VALUES (3, 'Brayen Prayoga', 'brayenprayoga41@gmail.com', NULL, '$2y$10$SPWykAFLziaP3hnABFkAYeFVEkKqacuLVs25EH8h3ivZVXVcaPq3a', 1, '1723298582', NULL, '2020-09-19 06:01:30', NULL, 3333333333333333, 1);
INSERT INTO "public"."users" VALUES (10, 'Fathur Rahiem', 'fathurrahiem02@gmail.com', NULL, '$2y$10$yjueZ6e9G2h/AcwtLtu.SetxR3Baf34qHnzHKtxwoCBfoBA42Ko2q', 2, 'kartar15', NULL, '2021-08-06 15:33:17', '2021-08-06 15:48:39', 3175090423670002, 1);
INSERT INTO "public"."users" VALUES (6, 'user warga 6', 'user6@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 1, 'kartar15', NULL, '2021-03-26 15:41:33', '2021-03-26 16:02:35', 6666666666666666, 1);
INSERT INTO "public"."users" VALUES (7, 'user warga 7', 'user7@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 1, 'kartar15', NULL, '2021-03-26 15:47:58', '2021-03-26 16:02:18', 7777777777777777, 2);
INSERT INTO "public"."users" VALUES (8, 'user warga 8', 'user8@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 1, 'kartar15', NULL, '2021-03-26 16:04:21', NULL, 8888888888888888, 1);
INSERT INTO "public"."users" VALUES (5, 'user warga 5', 'user5@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 1, 'kartar15', NULL, '2020-09-19 06:01:30', NULL, 5555555555555555, 2);
INSERT INTO "public"."users" VALUES (4, 'user warga 4', 'user4@gmail.com', NULL, '$2y$10$cPNeYcPSwINswNNzizLvYO9rBL5QnO/WwDxl8brce/nasWQodKdNe', 1, 'kartar15', NULL, '2020-09-19 06:01:30', NULL, 4444444444444444, 2);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."FAQ_id_seq"
OWNED BY "public"."FAQ"."id";
SELECT setval('"public"."FAQ_id_seq"', 8, true);
ALTER SEQUENCE "public"."biografi_ketua_id_seq"
OWNED BY "public"."biografi_ketua"."id";
SELECT setval('"public"."biografi_ketua_id_seq"', 2, false);
ALTER SEQUENCE "public"."data_covid_id_seq"
OWNED BY "public"."data_covid"."id";
SELECT setval('"public"."data_covid_id_seq"', 35, true);
ALTER SEQUENCE "public"."detail_surat_menikah_id_seq"
OWNED BY "public"."detail_surat_menikah"."id";
SELECT setval('"public"."detail_surat_menikah_id_seq"', 5, true);
ALTER SEQUENCE "public"."jadwal_ronda_id_seq"
OWNED BY "public"."jadwal_ronda"."id";
SELECT setval('"public"."jadwal_ronda_id_seq"', 16, true);
ALTER SEQUENCE "public"."master_berita_id_seq"
OWNED BY "public"."master_berita"."id";
SELECT setval('"public"."master_berita_id_seq"', 3, true);
ALTER SEQUENCE "public"."master_testimoni_id_seq"
OWNED BY "public"."master_testimoni"."id";
SELECT setval('"public"."master_testimoni_id_seq"', 7, true);
ALTER SEQUENCE "public"."master_tugas_id_seq"
OWNED BY "public"."master_tugas"."id";
SELECT setval('"public"."master_tugas_id_seq"', 16, true);
ALTER SEQUENCE "public"."master_video_id_seq"
OWNED BY "public"."master_video"."id";
SELECT setval('"public"."master_video_id_seq"', 2, false);
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 3, true);
ALTER SEQUENCE "public"."struktur_organisasi_id_seq"
OWNED BY "public"."struktur_organisasi"."id";
SELECT setval('"public"."struktur_organisasi_id_seq"', 16, true);
ALTER SEQUENCE "public"."surat_domisili_id_seq"
OWNED BY "public"."surat_domisili"."id";
SELECT setval('"public"."surat_domisili_id_seq"', 9, true);
ALTER SEQUENCE "public"."surat_menikah_id_seq"
OWNED BY "public"."surat_menikah"."id";
SELECT setval('"public"."surat_menikah_id_seq"', 3, true);
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 11, true);

-- ----------------------------
-- Primary Key structure for table FAQ
-- ----------------------------
ALTER TABLE "public"."FAQ" ADD CONSTRAINT "FAQ_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table biografi_ketua
-- ----------------------------
ALTER TABLE "public"."biografi_ketua" ADD CONSTRAINT "biografi_ketua_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table data_covid
-- ----------------------------
ALTER TABLE "public"."data_covid" ADD CONSTRAINT "data_covid_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table detail_surat_menikah
-- ----------------------------
ALTER TABLE "public"."detail_surat_menikah" ADD CONSTRAINT "detail_surat_menikah_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table jadwal_ronda
-- ----------------------------
ALTER TABLE "public"."jadwal_ronda" ADD CONSTRAINT "jadwal_ronda_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_berita
-- ----------------------------
ALTER TABLE "public"."master_berita" ADD CONSTRAINT "master_berita_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_testimoni
-- ----------------------------
ALTER TABLE "public"."master_testimoni" ADD CONSTRAINT "master_testimoni_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_tugas
-- ----------------------------
ALTER TABLE "public"."master_tugas" ADD CONSTRAINT "master_tugas_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_video
-- ----------------------------
ALTER TABLE "public"."master_video" ADD CONSTRAINT "master_video_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table struktur_organisasi
-- ----------------------------
ALTER TABLE "public"."struktur_organisasi" ADD CONSTRAINT "struktur_organisasi_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table surat_domisili
-- ----------------------------
ALTER TABLE "public"."surat_domisili" ADD CONSTRAINT "surat_domisili_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table surat_menikah
-- ----------------------------
ALTER TABLE "public"."surat_menikah" ADD CONSTRAINT "surat_menikah_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
