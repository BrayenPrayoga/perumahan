PGDMP     0    "                |            rukun_tetangga    13.10    13.10 j    C           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            D           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            E           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            F           1262    433856    rukun_tetangga    DATABASE     r   CREATE DATABASE rukun_tetangga WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE rukun_tetangga;
                postgres    false            �            1259    433885    FAQ    TABLE     ~   CREATE TABLE public."FAQ" (
    id bigint NOT NULL,
    question character varying(100),
    answer character varying(255)
);
    DROP TABLE public."FAQ";
       public         heap    postgres    false            �            1259    433857 
   FAQ_id_seq    SEQUENCE     u   CREATE SEQUENCE public."FAQ_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public."FAQ_id_seq";
       public          postgres    false    214            G           0    0 
   FAQ_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public."FAQ_id_seq" OWNED BY public."FAQ".id;
          public          postgres    false    200            �            1259    433889    biografi_ketua    TABLE     �   CREATE TABLE public.biografi_ketua (
    id smallint NOT NULL,
    nama character varying(100),
    image character varying(255),
    deskripsi character varying(255),
    biografi character varying(1200)
);
 "   DROP TABLE public.biografi_ketua;
       public         heap    postgres    false            �            1259    433859    biografi_ketua_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.biografi_ketua_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.biografi_ketua_id_seq;
       public          postgres    false    215            H           0    0    biografi_ketua_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.biografi_ketua_id_seq OWNED BY public.biografi_ketua.id;
          public          postgres    false    201            �            1259    433896 
   data_covid    TABLE     �  CREATE TABLE public.data_covid (
    id bigint NOT NULL,
    id_provinsi character varying(10),
    shortlabel character varying(10),
    label character varying(100),
    jumlah_kasus double precision,
    jumlah_sembuh double precision,
    jumlah_meninggal double precision,
    jumlah_dirawat double precision,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.data_covid;
       public         heap    postgres    false            �            1259    433861    data_covid_id_seq    SEQUENCE     z   CREATE SEQUENCE public.data_covid_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.data_covid_id_seq;
       public          postgres    false    216            I           0    0    data_covid_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.data_covid_id_seq OWNED BY public.data_covid.id;
          public          postgres    false    202            �            1259    433900    detail_surat_menikah    TABLE       CREATE TABLE public.detail_surat_menikah (
    id bigint NOT NULL,
    id_menikah bigint,
    nama character varying(100),
    tempat_lahir character varying(30),
    tgl_lahir date,
    bin_binti character varying(100),
    agama character varying(20),
    pekerjaan character varying(100),
    alamat character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    jenis_kelamin character varying(10),
    nik_ktp integer,
    data character varying(10)
);
 (   DROP TABLE public.detail_surat_menikah;
       public         heap    postgres    false            �            1259    433863    detail_surat_menikah_id_seq    SEQUENCE     �   CREATE SEQUENCE public.detail_surat_menikah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.detail_surat_menikah_id_seq;
       public          postgres    false    217            J           0    0    detail_surat_menikah_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.detail_surat_menikah_id_seq OWNED BY public.detail_surat_menikah.id;
          public          postgres    false    203            �            1259    433907    jadwal_ronda    TABLE     {   CREATE TABLE public.jadwal_ronda (
    id bigint NOT NULL,
    id_users bigint,
    tgl_ronda date,
    status smallint
);
     DROP TABLE public.jadwal_ronda;
       public         heap    postgres    false            K           0    0    COLUMN jadwal_ronda.status    COMMENT     ]   COMMENT ON COLUMN public.jadwal_ronda.status IS '1 = Hadir ,2 = Digantikan 3 = Tidak Hadir';
          public          postgres    false    218            �            1259    433865    jadwal_ronda_id_seq    SEQUENCE     |   CREATE SEQUENCE public.jadwal_ronda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.jadwal_ronda_id_seq;
       public          postgres    false    218            L           0    0    jadwal_ronda_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.jadwal_ronda_id_seq OWNED BY public.jadwal_ronda.id;
          public          postgres    false    204            �            1259    433911    master_berita    TABLE       CREATE TABLE public.master_berita (
    id bigint NOT NULL,
    judul character varying(50),
    deskripsi character varying(255),
    isi character varying(1200),
    gambar character varying(100),
    status smallint,
    status_news character varying(20),
    tanggal date
);
 !   DROP TABLE public.master_berita;
       public         heap    postgres    false            �            1259    433867    master_berita_id_seq    SEQUENCE     }   CREATE SEQUENCE public.master_berita_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.master_berita_id_seq;
       public          postgres    false    219            M           0    0    master_berita_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.master_berita_id_seq OWNED BY public.master_berita.id;
          public          postgres    false    205            �            1259    433918    master_testimoni    TABLE     �   CREATE TABLE public.master_testimoni (
    id bigint NOT NULL,
    id_users bigint,
    pesan character varying(400),
    status smallint
);
 $   DROP TABLE public.master_testimoni;
       public         heap    postgres    false            �            1259    433869    master_testimoni_id_seq    SEQUENCE     �   CREATE SEQUENCE public.master_testimoni_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.master_testimoni_id_seq;
       public          postgres    false    220            N           0    0    master_testimoni_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.master_testimoni_id_seq OWNED BY public.master_testimoni.id;
          public          postgres    false    206            �            1259    433922    master_tugas    TABLE     �   CREATE TABLE public.master_tugas (
    id bigint NOT NULL,
    jabatan character varying(50),
    tugas character varying(1000)
);
     DROP TABLE public.master_tugas;
       public         heap    postgres    false            �            1259    433871    master_tugas_id_seq    SEQUENCE     |   CREATE SEQUENCE public.master_tugas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.master_tugas_id_seq;
       public          postgres    false    221            O           0    0    master_tugas_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.master_tugas_id_seq OWNED BY public.master_tugas.id;
          public          postgres    false    207            �            1259    433929    master_video    TABLE     �   CREATE TABLE public.master_video (
    id smallint NOT NULL,
    link character varying(150),
    durasi character varying(10)
);
     DROP TABLE public.master_video;
       public         heap    postgres    false            �            1259    433873    master_video_id_seq    SEQUENCE     |   CREATE SEQUENCE public.master_video_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.master_video_id_seq;
       public          postgres    false    222            P           0    0    master_video_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.master_video_id_seq OWNED BY public.master_video.id;
          public          postgres    false    208            �            1259    433933 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    433875    migrations_id_seq    SEQUENCE     z   CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    223            Q           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    209            �            1259    433937    struktur_organisasi    TABLE     �   CREATE TABLE public.struktur_organisasi (
    id smallint NOT NULL,
    title character varying(30),
    name character varying(100),
    color character varying(15),
    id_noted character varying(50),
    "column" smallint,
    height smallint
);
 '   DROP TABLE public.struktur_organisasi;
       public         heap    postgres    false            �            1259    433877    struktur_organisasi_id_seq    SEQUENCE     �   CREATE SEQUENCE public.struktur_organisasi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.struktur_organisasi_id_seq;
       public          postgres    false    224            R           0    0    struktur_organisasi_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.struktur_organisasi_id_seq OWNED BY public.struktur_organisasi.id;
          public          postgres    false    210            �            1259    433941    surat_domisili    TABLE     j  CREATE TABLE public.surat_domisili (
    id bigint NOT NULL,
    nama character varying(100),
    tempat_lahir character varying(255),
    tgl_lahir date,
    agama character varying(20),
    status smallint,
    id_users bigint,
    catatan character varying(255),
    created_at timestamp(6) without time zone,
    updated_at timestamp(6) without time zone
);
 "   DROP TABLE public.surat_domisili;
       public         heap    postgres    false            �            1259    433879    surat_domisili_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.surat_domisili_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.surat_domisili_id_seq;
       public          postgres    false    225            S           0    0    surat_domisili_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.surat_domisili_id_seq OWNED BY public.surat_domisili.id;
          public          postgres    false    211            �            1259    433948    surat_menikah    TABLE     �  CREATE TABLE public.surat_menikah (
    id bigint NOT NULL,
    id_users bigint,
    hari character varying(10),
    tanggal date,
    nama_kua character varying(50),
    kecamatan character varying(50),
    walikota character varying(50),
    provinsi character varying(50),
    status_nikah character varying(20),
    status smallint,
    catatan character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.surat_menikah;
       public         heap    postgres    false            �            1259    433881    surat_menikah_id_seq    SEQUENCE     }   CREATE SEQUENCE public.surat_menikah_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.surat_menikah_id_seq;
       public          postgres    false    226            T           0    0    surat_menikah_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.surat_menikah_id_seq OWNED BY public.surat_menikah.id;
          public          postgres    false    212            �            1259    433955    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    status smallint,
    password_real character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    nik_ktp bigint,
    jenis_kelamin smallint
);
    DROP TABLE public.users;
       public         heap    postgres    false            U           0    0    COLUMN users.status    COMMENT     B   COMMENT ON COLUMN public.users.status IS '1 = warga ,2 = admin ';
          public          postgres    false    227            V           0    0    COLUMN users.jenis_kelamin    COMMENT     H   COMMENT ON COLUMN public.users.jenis_kelamin IS '1 = laki ,2 = wanita';
          public          postgres    false    227            �            1259    433883    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    227            W           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    213            w           2604    433888    FAQ id    DEFAULT     d   ALTER TABLE ONLY public."FAQ" ALTER COLUMN id SET DEFAULT nextval('public."FAQ_id_seq"'::regclass);
 7   ALTER TABLE public."FAQ" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    200    214            x           2604    433892    biografi_ketua id    DEFAULT     v   ALTER TABLE ONLY public.biografi_ketua ALTER COLUMN id SET DEFAULT nextval('public.biografi_ketua_id_seq'::regclass);
 @   ALTER TABLE public.biografi_ketua ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    215    215            y           2604    433899    data_covid id    DEFAULT     n   ALTER TABLE ONLY public.data_covid ALTER COLUMN id SET DEFAULT nextval('public.data_covid_id_seq'::regclass);
 <   ALTER TABLE public.data_covid ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    216    216            z           2604    433903    detail_surat_menikah id    DEFAULT     �   ALTER TABLE ONLY public.detail_surat_menikah ALTER COLUMN id SET DEFAULT nextval('public.detail_surat_menikah_id_seq'::regclass);
 F   ALTER TABLE public.detail_surat_menikah ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    203    217            {           2604    433910    jadwal_ronda id    DEFAULT     r   ALTER TABLE ONLY public.jadwal_ronda ALTER COLUMN id SET DEFAULT nextval('public.jadwal_ronda_id_seq'::regclass);
 >   ALTER TABLE public.jadwal_ronda ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    204    218            |           2604    433914    master_berita id    DEFAULT     t   ALTER TABLE ONLY public.master_berita ALTER COLUMN id SET DEFAULT nextval('public.master_berita_id_seq'::regclass);
 ?   ALTER TABLE public.master_berita ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    205    219            }           2604    433921    master_testimoni id    DEFAULT     z   ALTER TABLE ONLY public.master_testimoni ALTER COLUMN id SET DEFAULT nextval('public.master_testimoni_id_seq'::regclass);
 B   ALTER TABLE public.master_testimoni ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    220    220            ~           2604    433925    master_tugas id    DEFAULT     r   ALTER TABLE ONLY public.master_tugas ALTER COLUMN id SET DEFAULT nextval('public.master_tugas_id_seq'::regclass);
 >   ALTER TABLE public.master_tugas ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    221    221                       2604    433932    master_video id    DEFAULT     r   ALTER TABLE ONLY public.master_video ALTER COLUMN id SET DEFAULT nextval('public.master_video_id_seq'::regclass);
 >   ALTER TABLE public.master_video ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    222    222            �           2604    433936    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    223    223            �           2604    433940    struktur_organisasi id    DEFAULT     �   ALTER TABLE ONLY public.struktur_organisasi ALTER COLUMN id SET DEFAULT nextval('public.struktur_organisasi_id_seq'::regclass);
 E   ALTER TABLE public.struktur_organisasi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    210    224            �           2604    433944    surat_domisili id    DEFAULT     v   ALTER TABLE ONLY public.surat_domisili ALTER COLUMN id SET DEFAULT nextval('public.surat_domisili_id_seq'::regclass);
 @   ALTER TABLE public.surat_domisili ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    225    225            �           2604    433951    surat_menikah id    DEFAULT     t   ALTER TABLE ONLY public.surat_menikah ALTER COLUMN id SET DEFAULT nextval('public.surat_menikah_id_seq'::regclass);
 ?   ALTER TABLE public.surat_menikah ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    226    226            �           2604    433958    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    213    227            3          0    433885    FAQ 
   TABLE DATA           5   COPY public."FAQ" (id, question, answer) FROM stdin;
    public          postgres    false    214   �{       4          0    433889    biografi_ketua 
   TABLE DATA           N   COPY public.biografi_ketua (id, nama, image, deskripsi, biografi) FROM stdin;
    public          postgres    false    215   }       5          0    433896 
   data_covid 
   TABLE DATA           �   COPY public.data_covid (id, id_provinsi, shortlabel, label, jumlah_kasus, jumlah_sembuh, jumlah_meninggal, jumlah_dirawat, created_at, updated_at) FROM stdin;
    public          postgres    false    216   �       6          0    433900    detail_surat_menikah 
   TABLE DATA           �   COPY public.detail_surat_menikah (id, id_menikah, nama, tempat_lahir, tgl_lahir, bin_binti, agama, pekerjaan, alamat, created_at, updated_at, jenis_kelamin, nik_ktp, data) FROM stdin;
    public          postgres    false    217   �       7          0    433907    jadwal_ronda 
   TABLE DATA           G   COPY public.jadwal_ronda (id, id_users, tgl_ronda, status) FROM stdin;
    public          postgres    false    218   �       8          0    433911    master_berita 
   TABLE DATA           h   COPY public.master_berita (id, judul, deskripsi, isi, gambar, status, status_news, tanggal) FROM stdin;
    public          postgres    false    219   ۄ       9          0    433918    master_testimoni 
   TABLE DATA           G   COPY public.master_testimoni (id, id_users, pesan, status) FROM stdin;
    public          postgres    false    220   ��       :          0    433922    master_tugas 
   TABLE DATA           :   COPY public.master_tugas (id, jabatan, tugas) FROM stdin;
    public          postgres    false    221   ~�       ;          0    433929    master_video 
   TABLE DATA           8   COPY public.master_video (id, link, durasi) FROM stdin;
    public          postgres    false    222   ȋ       <          0    433933 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    223   �       =          0    433937    struktur_organisasi 
   TABLE DATA           a   COPY public.struktur_organisasi (id, title, name, color, id_noted, "column", height) FROM stdin;
    public          postgres    false    224   Y�       >          0    433941    surat_domisili 
   TABLE DATA           �   COPY public.surat_domisili (id, nama, tempat_lahir, tgl_lahir, agama, status, id_users, catatan, created_at, updated_at) FROM stdin;
    public          postgres    false    225   a�       ?          0    433948    surat_menikah 
   TABLE DATA           �   COPY public.surat_menikah (id, id_users, hari, tanggal, nama_kua, kecamatan, walikota, provinsi, status_nikah, status, catatan, created_at, updated_at) FROM stdin;
    public          postgres    false    226   2�       @          0    433955    users 
   TABLE DATA           �   COPY public.users (id, name, email, email_verified_at, password, status, password_real, remember_token, created_at, updated_at, nik_ktp, jenis_kelamin) FROM stdin;
    public          postgres    false    227   ��       X           0    0 
   FAQ_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public."FAQ_id_seq"', 8, true);
          public          postgres    false    200            Y           0    0    biografi_ketua_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.biografi_ketua_id_seq', 2, false);
          public          postgres    false    201            Z           0    0    data_covid_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.data_covid_id_seq', 35, true);
          public          postgres    false    202            [           0    0    detail_surat_menikah_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.detail_surat_menikah_id_seq', 5, true);
          public          postgres    false    203            \           0    0    jadwal_ronda_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.jadwal_ronda_id_seq', 16, true);
          public          postgres    false    204            ]           0    0    master_berita_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.master_berita_id_seq', 3, true);
          public          postgres    false    205            ^           0    0    master_testimoni_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.master_testimoni_id_seq', 7, true);
          public          postgres    false    206            _           0    0    master_tugas_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.master_tugas_id_seq', 16, true);
          public          postgres    false    207            `           0    0    master_video_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.master_video_id_seq', 2, false);
          public          postgres    false    208            a           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 3, true);
          public          postgres    false    209            b           0    0    struktur_organisasi_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.struktur_organisasi_id_seq', 16, true);
          public          postgres    false    210            c           0    0    surat_domisili_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.surat_domisili_id_seq', 9, true);
          public          postgres    false    211            d           0    0    surat_menikah_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.surat_menikah_id_seq', 3, true);
          public          postgres    false    212            e           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 11, true);
          public          postgres    false    213            �           2606    433963    FAQ FAQ_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public."FAQ"
    ADD CONSTRAINT "FAQ_pkey" PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."FAQ" DROP CONSTRAINT "FAQ_pkey";
       public            postgres    false    214            �           2606    433965 "   biografi_ketua biografi_ketua_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.biografi_ketua
    ADD CONSTRAINT biografi_ketua_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.biografi_ketua DROP CONSTRAINT biografi_ketua_pkey;
       public            postgres    false    215            �           2606    433967    data_covid data_covid_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.data_covid
    ADD CONSTRAINT data_covid_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.data_covid DROP CONSTRAINT data_covid_pkey;
       public            postgres    false    216            �           2606    433969 .   detail_surat_menikah detail_surat_menikah_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.detail_surat_menikah
    ADD CONSTRAINT detail_surat_menikah_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.detail_surat_menikah DROP CONSTRAINT detail_surat_menikah_pkey;
       public            postgres    false    217            �           2606    433971    jadwal_ronda jadwal_ronda_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.jadwal_ronda
    ADD CONSTRAINT jadwal_ronda_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.jadwal_ronda DROP CONSTRAINT jadwal_ronda_pkey;
       public            postgres    false    218            �           2606    433973     master_berita master_berita_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.master_berita
    ADD CONSTRAINT master_berita_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.master_berita DROP CONSTRAINT master_berita_pkey;
       public            postgres    false    219            �           2606    433975 &   master_testimoni master_testimoni_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.master_testimoni
    ADD CONSTRAINT master_testimoni_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.master_testimoni DROP CONSTRAINT master_testimoni_pkey;
       public            postgres    false    220            �           2606    433977    master_tugas master_tugas_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.master_tugas
    ADD CONSTRAINT master_tugas_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.master_tugas DROP CONSTRAINT master_tugas_pkey;
       public            postgres    false    221            �           2606    433979    master_video master_video_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.master_video
    ADD CONSTRAINT master_video_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.master_video DROP CONSTRAINT master_video_pkey;
       public            postgres    false    222            �           2606    433981    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    223            �           2606    433983 ,   struktur_organisasi struktur_organisasi_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.struktur_organisasi
    ADD CONSTRAINT struktur_organisasi_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.struktur_organisasi DROP CONSTRAINT struktur_organisasi_pkey;
       public            postgres    false    224            �           2606    433985 "   surat_domisili surat_domisili_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.surat_domisili
    ADD CONSTRAINT surat_domisili_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.surat_domisili DROP CONSTRAINT surat_domisili_pkey;
       public            postgres    false    225            �           2606    433987     surat_menikah surat_menikah_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.surat_menikah
    ADD CONSTRAINT surat_menikah_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.surat_menikah DROP CONSTRAINT surat_menikah_pkey;
       public            postgres    false    226            �           2606    433989    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    227            �           2606    433991    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    227            3   O  x��R�N�0����_����C���`�1N��U�{��*U%�ı����F<���'Р�1���A��&M��F����B���G<\ԑz��Ŭ
��	^ފ�tn���eCQ�Ř���fY�����썥�N�}g`����O�����ߓ���Ҕjg�o��L�vL��5^7��K��J e�|� �}��w�a��(�}ʳ4���	=�����/���1`6hG`�D�wBe�zXݬiI�O^��(��,��i�"cx�%{8 ���g�٣:̍E�ϟ8(��B��+q9s��Q�~7��9͝���K^�E���;\��T�B~-�����=      4   �  x��T�n�0<�_��p)�c��@�)�Ծ���y-��@���)ڋ$R����C��nig�oX��1ϲ/���-[>,睩&kWv���ȩֲ��V7�W�VL%:�*���dCy��M1B��k��
C�)��L3�x�\�tl�:�C��ǂ^�Bj�jX�H�H- �8УR�?�=����x�6�����������|��P��ieN\�$��b�Ⱦ�L��8�f�M�]�·���݆�*ǴF�sZ�F8���N���#��Z�����F��Xw<
5d�g��!�K�zc���𹱄x�A_)?�.)&�c�X)��*�)�ϔ���V
\��K��j�J��y��5\�1��KNق�9��좥����1@��Jq�Cav��\*G7;���c���6�
�q1L
�.�}��K�[��N�d��j�Y���2�f�갔��J���X�f���)U�� O�Ut'&�nM��0���7ع��6J�5�t<`~�R_�/_�/a��E�]�,40�S��j���>��t�%������<?�_�@�@?����':<~|�����J�P�Rr4��pT�h����'�ͽ�&���p��Q�Ķ�UH�w�g�qs���@�_��t�f�¤      5   V  x�]U[��8��>EN��H=?�#��q~`����[J,�gq�*V�`������kY�0��A�D�l��a�Z��y>��
�	�~/[Ϝ���Vfƻ$�>Z5"�.�� g0.��}*{�/�Pvx����H��������)]��c�t�4l�|�7����j4�(�7&��Tx�_5إ�D!��4J�Xg~ú�������IH���9&&�'�L(|�7�e�e&g��A�l�#���i�g�~�u�~��4I`e�|dKG��X�y�O��LL�UD�l��W0�?���C]H�i(b�D*��{�_����*��@lU�*���8�F��˭�e�
�����Ro�Y�삷��V~���h(�"$�3�v�W;�3��_��k'���a0�$��78���n�����!1�x�)��-��D������#4F��\9�7g���z�p�v�T�"N	&x�3����VY�7E(/}M��µ�z��|�˙�N�0�
�io�LD��3�T�̙���il��S�����.�d�0�ZN*y5���%}��G��$]k�#�5��wG<��p}�,nz0,�j�LM�)O-��m{y��K2!q�����&\Ԇǁ�nÑ�\PJyS�����,���6J��a���g��AC�5y��+,q��-k����µ�yV&����q�>n=�N�����{��5&���\Tl��d�Tف�P����9�2�kL��\J��̩���B3X�+<�@n�3L�ܴ�=q�%H���WX��m=[�axmΗ<�����*Lz��Cv�,�!GW-#I��LH����V5l���H+��(c����%���8b��U̵F9Em�\�����|�\�      6   Z  x�u�MN�0�דS�H�B�2��@PUM61��.�-��q�� �/<���7(��k2��<z�:C=\QG>(!D.ƹ�$��r�����~��6���ߓ�%m	�>���sM�@{Ύ�\�T,S`XD�@=۶%���ɇ�����@�K�ׁ֝<���B?S��Kw��6�H�*ˢTlh ے�$��=muJ�k	�����3��D��+���\P;���pOᕼ�3۲���;?�6�7�h�l��u�p�^��H�
�+�%����/ ���9x�m��i����8
*ۤ���C�d��j[��-�Ncb�竝�)��}&O��*�)�?aݏ�,{�ک&      7   L   x�]���0��"�b�"��:�DV�I�P��`1�ĺib6)T��b�J �$�]�a���?
9V�kۺ���NO      8   �  x�͒M��0���)� ��ff[f;H6O�FQ,�*��+��e;8`�ƥ��������+��:�\uR�
iH�u >����8Q���k����C��ְ����eC}�wͿҡ�^���� G����@����f�Ns�*��B�8#h�$F������rp��P�R͈�[9��ݔ�(qW�p�,BWr�f^,�VR�$�-U/��վ���I��t�UI�T�����>�}��_�w#��V'�aU%~�=�3'ҹ�/<BR��yr�g*�uif\�ؖ�h�i�IT"'�q(n��s��ἡTb��,��8p�Z�@\��櫼��yyɱD�X�H�u�.�w�^�+�ʜC��9���u�A`m��-�k��N�:���U�p%��^�ч� x�%0�}��;v'�\�Ū�|��X��g�������u�5Zc      9   �   x�M�1n�0Eg�<@ -�t��C2v��	��M���/�d�����:�G�+M0��_Ђ+�^�jN�f!L ��Ʃ�3�
+�ߌ�ʪ��(��^w�^ha�ݠY�'�B�kt�e��=�g�l.w@�ރΓq�<��
�����D�1^��6qbC����*Z'	�H��9A��p�|�/��������n�?�Abj      :   :  x��Vˎ�6<�_��8����$�`�c.�W��C1���n��<� {1,��GUuQߟ�l��3��66��h2%���8�J�bF,�6���Nx�8��N�o��f���9�	K��8����=�'�)�l_�2%,:	z=�pz����E�Tl��8eo�e�t���3�w���O��Ȧ�a�Xx������u)��+}Z�l֣�D�զ�D�y���Q��b�M��/�k��$?����{� #:��qj����
8��7�G5E>�q=�x�˺d%�'Ik=�L�A���s��4���V5�+�<0S�M�K�ޫ�hv�ojߎ�%fMT^� �D%�Rʼ��)�Gj`ᯧuA=lê���8-(�
�J�Ƚ��۹�z=�t�M�K_#"*�~��gk�E� ct<H����4Yњ���%m����PV���V��篊�!�����:��4'��d^-tRGDB'�8;1 �1�A��!�6J�`ȮZ��c	���v�FkvR�D�$g�Ft!�V�.�ւ��֡��z�ek�w�pL[�o��h#�Pl	m]z��^� ��q������gif泼%NƋ��
���E���:��S�
�=�c-;w!-�f����ey>#�%����|�QH��X�*�� x��N�yw-�[l ���>N�u�o��̈��O��o>8���&������(�������6�1�`�8��i�JN&T�QqV�MX���K)�W~�f2Qx8��F֥Jt)7��M�uo����E�[��J'�N���v[���>�aՁ&���@�=L���'t�&���e�1Co���$��!���;�V�6�$�!�0�Y#P��W];��m���A�z���=�kw�o��j��=.�'L�pL�Uo���+x���;a)��c�,e��v�C)D���"V�,�#]��f;2���]�X�ܭ`�-CC���x���R=b��Np�"_$#�$|4Tѐު �V�g�;f1/�۲vK,����h}��Ƃ:�qK�������{_����<���D =)端��מ���r��z>���`��      ;   A   x�3��())(���///׫�/-)MJ�K���/O,Iΰ/�Mw,�w�+*��-�40�25����� C�A      <   0   x�3�4202�7��72��Ff�%I9�)�%����e�)��\1z\\\ �f       =   �   x�M�]k�0�������U����̬Q4R��hPך?���Yq�\���Ã,�X�Te��D�ۏ�!ӆ�����.��P��ri��,�J(��*b=N��;(���#�� �͋��
���m����w=���҇7m.�PO 82!yn�+���E�w�в�FMO5�'�o�M"%�Y!ޅ��.8x���� >�]�e�������VQz\�5���;���Br��'A<�,��<j�O��y�8�/=�eL      >   �   x�]O�
�0<o�"?I֣҇HQEģ�k�F����wS��²���n���M<�-�П�7���r.�����2�G�]��[o:����b
V��{jW���m�Cr[%���n��6h	ܺnc��R�)6�R-u�,4�>��4H�O�);��K!�~5�6~@���ﴗ��+~�jO3��T�L�      ?   �   x��N;�@�ߞ�@̾Q��FM,��fpC(��������IfF(�c^�m$��H��rW�|����-*�|r�>�z��C�>i:�id�,s+���5,�Mb+�2�Y��;��jL�������u���j�F�q#��-j�.�p�<\�*�sPV�N',3�G,�y����~T�      @   �  x���˒�@�u�,܊}XE�ʨ����5����@@�>(Y��*����Yt}u�h�<�&"����������������ZG���z�Y��D������Owdk�N�Qs�~�>���x3`�b��� �#1H�_�!�h4�!Ä́�$�1.�����]"�)���	lM<
ĕ��!�+�=�k��4Ɖ<�q6%��b7{giض6��R� ė�BԀzjRMBLDK3E7��*4���F!�w���)ebˤ�h�p���I�0�$���b��@+%w�ggQ諜�T��N�Z
�5��Y�%�ܤ���z)���gVQ��ɪ�a�R�m)Ϭ�(�f)��,,��<���'�2�~�s�TI:�I�}_�8�h+o�1Y���l/���n�y<t\bˑ'�s7ɉHE��*�_����c<N�4}l&q�}���LT�&�l��.i�O�3���o���K���pfL���}��I��١����!D�HShC������>�Z����     