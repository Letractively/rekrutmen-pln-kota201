/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     7/6/2012 2:10:37 PM                          */
/*==============================================================*/


drop table if exists AGAMA;

drop table if exists AKUNPELAMAR;

drop table if exists BATASUSIA;

drop table if exists BIDANGJABATAN;

drop table if exists BIDANGJABATANDIBUKA;

drop table if exists CAPTCHA;

drop table if exists HISTORIPENGGUNA;

drop table if exists HISTORIUBAHAKUN;

drop table if exists JENISREKRUTMEN;

drop table if exists JENISSTUDI;

drop table if exists KATEGORIKESEHATAN;

drop table if exists KOTAKABUPATEN;

drop table if exists KURSUS;

drop table if exists LOKASI;

drop table if exists PASSINGGRADE;

drop table if exists PELAKSANA;

drop table if exists PELAMAR;

drop table if exists PENDIDIKANFORMALNONPT;

drop table if exists PENDIDIKANFORMALPT;

drop table if exists PENGALAMANKERJA;

drop table if exists PERGURUANTINGGI;

drop table if exists PESERTA;

drop table if exists PESERTALULUS;

drop table if exists PESERTATIDAKLULUS;

drop table if exists PROGRAMSTUDI;

drop table if exists PROGRAMSTUDIPERBIDANG;

drop table if exists PROVINSI;

drop table if exists PSIKOTEST;

drop table if exists REKRUTMEN;

drop table if exists STATUSPERNIKAHAN;

drop table if exists TEMPLATEREKRUTMEN;

drop table if exists TESTAKADEMIK;

drop table if exists TESTGAT;

drop table if exists TESTKESEHATAN;

drop table if exists TINGKATPENDIDIKAN;

drop table if exists USER;

drop table if exists WAWANCARA;

/*==============================================================*/
/* Table: AGAMA                                                 */
/*==============================================================*/
create table AGAMA
(
   ID_AGAMA             smallint not null auto_increment,
   NAMA_AGAMA           varchar(20) not null,
   STATUS_AGAMA         bool,
   primary key (ID_AGAMA)
)
type = InnoDB;

/*==============================================================*/
/* Table: AKUNPELAMAR                                           */
/*==============================================================*/
create table AKUNPELAMAR
(
   ID_AKUN              bigint not null auto_increment,
   NO_KTP               varchar(20) not null,
   EMAIL                varchar(30) not null,
   PASSWORD             varchar(50) not null,
   SALT                 varchar(50),
   STATUS_PENGGUNA      bool,
   KODE_AKTIFASI        varchar(50) not null,
   primary key (ID_AKUN)
)
type = InnoDB;

/*==============================================================*/
/* Table: BATASUSIA                                             */
/*==============================================================*/
create table BATASUSIA
(
   ID_REKRUTMEN         smallint not null,
   ID_TINGKAT           smallint not null,
   USIA_PELAMAR_MAX     smallint not null,
   primary key (ID_REKRUTMEN, ID_TINGKAT)
)
type = InnoDB;

/*==============================================================*/
/* Table: BIDANGJABATAN                                         */
/*==============================================================*/
create table BIDANGJABATAN
(
   ID_BID               smallint not null auto_increment,
   ID_TINGKAT           smallint not null,
   ID_JS                smallint not null,
   KODE_BID             varchar(3) not null,
   NAMA_BID             varchar(50) not null,
   DESKRIPSI            text,
   STATUS_BIDANG        bool,
   primary key (ID_BID)
)
type = InnoDB;

/*==============================================================*/
/* Table: BIDANGJABATANDIBUKA                                   */
/*==============================================================*/
create table BIDANGJABATANDIBUKA
(
   ID_REKRUTMEN         smallint not null,
   ID_BID               smallint not null,
   QUOTA                int,
   primary key (ID_REKRUTMEN, ID_BID)
)
type = InnoDB;

/*==============================================================*/
/* Table: CAPTCHA                                               */
/*==============================================================*/
create table CAPTCHA
(
   CAPTCHA_ID           int not null auto_increment,
   CAPTCHA_TIME         int not null,
   IP_ADDRESS           varchar(16) not null,
   WORD                 varchar(20) not null,
   primary key (CAPTCHA_ID)
)
type = InnoDB;

/*==============================================================*/
/* Table: HISTORIPENGGUNA                                       */
/*==============================================================*/
create table HISTORIPENGGUNA
(
   ID_AKUN              bigint not null,
   WAKTU_MASUK          datetime,
   WAKTU_KELUAR         datetime,
   IP_KOMPUTER          varchar(20)
)
type = InnoDB;

/*==============================================================*/
/* Table: HISTORIUBAHAKUN                                       */
/*==============================================================*/
create table HISTORIUBAHAKUN
(
   ID_AKUN              bigint not null,
   WAKTU                datetime,
   ISI_DIGANTI          varchar(40),
   ISI_MENGGANTI        varchar(50),
   JENIS_UBAH_AKUN      int
)
type = InnoDB;

/*==============================================================*/
/* Table: JENISREKRUTMEN                                        */
/*==============================================================*/
create table JENISREKRUTMEN
(
   ID_JENIS_REKRUT      smallint not null auto_increment,
   NAMA_JENIS_REKRUT    varchar(50) not null,
   STATUS_JENIS_REKRUT  bool,
   primary key (ID_JENIS_REKRUT)
)
type = InnoDB;

/*==============================================================*/
/* Table: JENISSTUDI                                            */
/*==============================================================*/
create table JENISSTUDI
(
   ID_JS                smallint not null auto_increment,
   NAMA_JS              varchar(30) not null,
   MIN_IPK              decimal(3,2) not null,
   primary key (ID_JS)
)
type = InnoDB;

/*==============================================================*/
/* Table: KATEGORIKESEHATAN                                     */
/*==============================================================*/
create table KATEGORIKESEHATAN
(
   ID_KATEGORI_SEHAT    smallint not null auto_increment,
   NAMA_KATEGORI_SEHAT  varchar(30) not null,
   STATUS_KATEGORI_SEHAT bool,
   primary key (ID_KATEGORI_SEHAT)
)
type = InnoDB;

/*==============================================================*/
/* Table: KOTAKABUPATEN                                         */
/*==============================================================*/
create table KOTAKABUPATEN
(
   ID_KOTA              smallint not null auto_increment,
   ID_PROV              smallint not null,
   NAMA_KOTA            varchar(60),
   STATUS_KOTA          bool,
   primary key (ID_KOTA)
)
type = InnoDB;

/*==============================================================*/
/* Table: KURSUS                                                */
/*==============================================================*/
create table KURSUS
(
   ID_KURSUS            smallint not null auto_increment,
   ID_PEL               int not null,
   NAMAPENDIDIKANINFORMAL varchar(50) not null,
   NAMA_INSTANSI        varchar(30) not null,
   TAHUN_SERTIFIKAT     varchar(4) not null,
   BERKAS_SERTIFIKAT    varchar(30),
   primary key (ID_KURSUS)
)
type = InnoDB;

/*==============================================================*/
/* Table: LOKASI                                                */
/*==============================================================*/
create table LOKASI
(
   ID_LOKASI            smallint not null auto_increment,
   KODE_LOKASI          varchar(5) not null,
   NAMA_LOKASI          varchar(25) not null,
   STATUS_LOKASI        bool,
   primary key (ID_LOKASI)
)
type = InnoDB;

/*==============================================================*/
/* Table: PASSINGGRADE                                          */
/*==============================================================*/
create table PASSINGGRADE
(
   ID_PG                int not null auto_increment,
   NAMATEST             varchar(50) not null,
   NILAI                int not null,
   primary key (ID_PG)
)
type = InnoDB;

/*==============================================================*/
/* Table: PELAKSANA                                             */
/*==============================================================*/
create table PELAKSANA
(
   ID_PELAKSANA         smallint not null auto_increment,
   NAMA_PELAKSANA       varchar(25) not null,
   STATUS_PELAKSANA     bool,
   primary key (ID_PELAKSANA)
)
type = InnoDB;

/*==============================================================*/
/* Table: PELAMAR                                               */
/*==============================================================*/
create table PELAMAR
(
   ID_PEL               int not null auto_increment,
   ID_AGAMA             smallint not null,
   ID_PROV              smallint not null,
   ID_PERNIKAHAN        smallint not null,
   ID_KOTA              smallint not null,
   KOT_ID_KOTA          smallint not null,
   ID_AKUN              bigint not null,
   PRO_ID_PROV          smallint not null,
   NAMA_PEL             varchar(50) not null,
   JK                   int not null,
   TEMPAT_LAHIR         varchar(25) not null,
   TGL_LAHIR            date not null,
   ALAMAT_KTP           varchar(50),
   ALAMAT_SURAT         varchar(50),
   KODEPOS_KTP          varchar(5) not null,
   KODEPOS_SURAT        varchar(5) not null,
   EMAIL                varchar(30) not null,
   NO_TELP              varchar(20),
   NO_HP                varchar(20),
   PENGHASILAN_DIINGINKAN numeric(9,0) not null,
   KESEDIAAN_PENEMPATAN bool not null,
   FOTO                 varchar(50),
   BERKAS_KTP           varchar(50),
   BERKAS_AKTE          varchar(50),
   STATUS_DAFTAR        bool,
   JML_DAFTAR           int,
   primary key (ID_PEL)
)
type = InnoDB;

/*==============================================================*/
/* Table: PENDIDIKANFORMALNONPT                                 */
/*==============================================================*/
create table PENDIDIKANFORMALNONPT
(
   ID_PENDIDIKAN        bigint not null auto_increment,
   ID_TINGKAT           smallint not null,
   ID_PEL               int not null,
   NAMA_INSTITUSI       varchar(40) not null,
   TEMPAT_INSTITUSI     varchar(30) not null,
   TAHUN_MASUK          varchar(4) not null,
   TAHUN_LULUS          varchar(4) not null,
   BERKAS_IJAZAH        varchar(30),
   primary key (ID_PENDIDIKAN)
)
type = InnoDB;

/*==============================================================*/
/* Table: PENDIDIKANFORMALPT                                    */
/*==============================================================*/
create table PENDIDIKANFORMALPT
(
   ID_PENDIDIKAN_PT     smallint not null auto_increment,
   ID_PT                int not null,
   ID_PS                int not null,
   ID_TINGKAT           smallint not null,
   ID_PEL               int not null,
   KONSENTRASI          varchar(40),
   IPK                  decimal(3,2) not null,
   TAHUN_MASUK          varchar(4) not null,
   TAHUN_LULUS          varchar(4) not null,
   BERKAS_IJAZAH        varchar(30),
   GELAR                varchar(5),
   primary key (ID_PENDIDIKAN_PT)
)
type = InnoDB;

/*==============================================================*/
/* Table: PENGALAMANKERJA                                       */
/*==============================================================*/
create table PENGALAMANKERJA
(
   ID_KERJA             bigint not null auto_increment,
   ID_PEL               int,
   NAMA_PERUSAHAAN      varchar(25) not null,
   JABATAN              varchar(25) not null,
   TGL_MASUK            date not null,
   TGL_KELUAR           date not null,
   WEBSITE_PERUSAHAAN   varchar(25),
   PENGHASILAN          decimal(9,2),
   primary key (ID_KERJA)
)
type = InnoDB;

/*==============================================================*/
/* Table: PERGURUANTINGGI                                       */
/*==============================================================*/
create table PERGURUANTINGGI
(
   ID_PT                int not null auto_increment,
   NAMA_PT              varchar(100) not null,
   STATUS_PT            bool,
   NEGARA_PT            varchar(30),
   primary key (ID_PT)
)
type = InnoDB;

/*==============================================================*/
/* Table: PESERTA                                               */
/*==============================================================*/
create table PESERTA
(
   ID_REKRUTMEN         smallint not null,
   ID_BID               smallint not null,
   ID_PEL               int not null,
   TGL_DAFTAR           datetime,
   NO_TEST              varchar(20),
   primary key (ID_REKRUTMEN, ID_BID, ID_PEL)
)
type = InnoDB;

/*==============================================================*/
/* Table: PESERTALULUS                                          */
/*==============================================================*/
create table PESERTALULUS
(
   ID_REKRUTMEN         smallint not null,
   ID_BID               smallint not null,
   ID_PEL               int not null,
   TGL_DAFTAR           datetime,
   NO_TEST              varchar(20),
   primary key (ID_REKRUTMEN, ID_BID, ID_PEL)
)
type = InnoDB;

/*==============================================================*/
/* Table: PESERTATIDAKLULUS                                     */
/*==============================================================*/
create table PESERTATIDAKLULUS
(
   ID_REKRUTMEN         smallint not null,
   ID_BID               smallint not null,
   ID_PEL               int not null,
   KETERANGAN           varchar(100),
   TGL_DAFTAR           datetime,
   NO_TEST              varchar(20),
   primary key (ID_REKRUTMEN, ID_BID, ID_PEL)
)
type = InnoDB;

/*==============================================================*/
/* Table: PROGRAMSTUDI                                          */
/*==============================================================*/
create table PROGRAMSTUDI
(
   ID_PS                int not null auto_increment,
   NAMA_PS              varchar(50) not null,
   STATUSAKTIFPROGRAMSTUDI bool,
   primary key (ID_PS)
)
type = InnoDB;

/*==============================================================*/
/* Table: PROGRAMSTUDIPERBIDANG                                 */
/*==============================================================*/
create table PROGRAMSTUDIPERBIDANG
(
   ID_REKRUTMEN         smallint not null,
   ID_BID               smallint not null,
   ID_PS                int not null,
   primary key (ID_REKRUTMEN, ID_BID, ID_PS)
)
type = InnoDB;

/*==============================================================*/
/* Table: PROVINSI                                              */
/*==============================================================*/
create table PROVINSI
(
   ID_PROV              smallint not null auto_increment,
   NAMA_PROV            varchar(50) not null,
   STATUS_PROV          bool,
   primary key (ID_PROV)
)
type = InnoDB;

/*==============================================================*/
/* Table: PSIKOTEST                                             */
/*==============================================================*/
create table PSIKOTEST
(
   ID_REKRUTMEN         smallint,
   ID_BID               smallint,
   ID_PEL               int,
   INTELEGENSI          smallint,
   ABSTRAKSI            smallint,
   NUMERIK              smallint,
   STABILITASI          smallint,
   EMOSI                smallint,
   ADAPTASI             smallint,
   KERJASAMA_KELOMPOK   smallint,
   KONTAKSOSIAL         smallint,
   KEPEMIMPINAN         smallint,
   TOLERANSISTRESS      smallint,
   MOTIVASIKERJA        smallint,
   TEMPO                smallint,
   TELITI               smallint,
   KETAHANANKERJA       smallint,
   NILAIAKHIR           int not null,
   STATUSLULUS          bool
)
type = InnoDB;

/*==============================================================*/
/* Table: REKRUTMEN                                             */
/*==============================================================*/
create table REKRUTMEN
(
   ID_REKRUTMEN         smallint not null auto_increment,
   ID_LOKASI            smallint not null,
   ID_JENIS_REKRUT      smallint,
   ID_PELAKSANA         smallint not null,
   NAMA_REKRUTMEN       varchar(50) not null,
   TGL_BUKA             date not null,
   TGL_TUTUP            date not null,
   STATUS_REKRUTMEN     bool,
   primary key (ID_REKRUTMEN)
)
type = InnoDB;

/*==============================================================*/
/* Table: STATUSPERNIKAHAN                                      */
/*==============================================================*/
create table STATUSPERNIKAHAN
(
   ID_PERNIKAHAN        smallint not null auto_increment,
   NAMA_PERNIKAHAN      varchar(30) not null,
   STATUS_PERNIKAHAN    bool,
   primary key (ID_PERNIKAHAN)
)
type = InnoDB;

/*==============================================================*/
/* Table: TEMPLATEREKRUTMEN                                     */
/*==============================================================*/
create table TEMPLATEREKRUTMEN
(
   ID_TEMPLATE          smallint not null auto_increment,
   NAMA_TEMPLATE        varchar(50),
   DESKRIPSI            text,
   STATUS_TEMPLATE      smallint,
   primary key (ID_TEMPLATE)
)
type = InnoDB;

/*==============================================================*/
/* Table: TESTAKADEMIK                                          */
/*==============================================================*/
create table TESTAKADEMIK
(
   ID_REKRUTMEN         smallint,
   ID_BID               smallint,
   ID_PEL               int,
   AKADEMIK             int,
   TOEFL                int,
   NILAIAKHIR           int,
   STATUSLULUS          bool
)
type = InnoDB;

/*==============================================================*/
/* Table: TESTGAT                                               */
/*==============================================================*/
create table TESTGAT
(
   ID_REKRUTMEN         smallint,
   ID_BID               smallint,
   ID_PEL               int,
   INTELEGENSI          smallint,
   ABSTRAKSI            smallint,
   VERBAL               smallint,
   NUMERIK              smallint,
   NILAIAKHIR           int not null,
   STATUSLULUS          bool
)
type = InnoDB;

/*==============================================================*/
/* Table: TESTKESEHATAN                                         */
/*==============================================================*/
create table TESTKESEHATAN
(
   ID_KATEGORI_SEHAT    smallint,
   ID_REKRUTMEN         smallint,
   ID_BID               smallint,
   ID_PEL               int,
   PENYAKITDIDERITA     varchar(100),
   CATATAN              varchar(100),
   STATUSLULUS          bool
)
type = InnoDB;

/*==============================================================*/
/* Table: TINGKATPENDIDIKAN                                     */
/*==============================================================*/
create table TINGKATPENDIDIKAN
(
   ID_TINGKAT           smallint not null auto_increment,
   NAMA_TINGKAT         varchar(10) not null,
   STATUS_TINGKAT       bool,
   STATUS_PT            bool,
   primary key (ID_TINGKAT)
)
type = InnoDB;

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              int not null auto_increment,
   USERNAME             varchar(50),
   PASSWORD             varchar(50),
   NAMA_USER            varchar(50),
   EMAIL                varchar(30),
   ROLE                 varchar(20),
   primary key (ID_USER)
)
type = InnoDB;

/*==============================================================*/
/* Table: WAWANCARA                                             */
/*==============================================================*/
create table WAWANCARA
(
   ID_REKRUTMEN         smallint,
   ID_BID               smallint,
   ID_PEL               int,
   ADAPTASI             smallint not null,
   INTEGRITAS           smallint not null,
   ORIENTASIPADAPELANGGAN smallint not null,
   PEMBELAJARANKESINAMBUNGAN smallint not null,
   ORIENTASIHASIL       smallint not null,
   NILAIAKHIR           int not null,
   STATUSLULUS          bool
)
type = InnoDB;

alter table BATASUSIA add constraint FK_USIAMAKSIMALTINGKATPENDIDIKAN foreign key (ID_TINGKAT)
      references TINGKATPENDIDIKAN (ID_TINGKAT) on delete cascade on update cascade;

alter table BATASUSIA add constraint FK_USIAPELAMARREKRUTMEN foreign key (ID_REKRUTMEN)
      references REKRUTMEN (ID_REKRUTMEN) on delete cascade on update cascade;

alter table BIDANGJABATAN add constraint FK_BIDANGJABATANTINGKATPEND foreign key (ID_TINGKAT)
      references TINGKATPENDIDIKAN (ID_TINGKAT) on delete cascade on update cascade;

alter table BIDANGJABATAN add constraint FK_JENISSTUDIBIDANG foreign key (ID_JS)
      references JENISSTUDI (ID_JS) on delete cascade on update cascade;

alter table BIDANGJABATANDIBUKA add constraint FK_BIDANGDIBUKA foreign key (ID_BID)
      references BIDANGJABATAN (ID_BID) on delete cascade on update cascade;

alter table BIDANGJABATANDIBUKA add constraint FK_REKRUTMENBIDANGDIBUKA foreign key (ID_REKRUTMEN)
      references REKRUTMEN (ID_REKRUTMEN) on delete cascade on update cascade;

alter table HISTORIPENGGUNA add constraint FK_HISTORIPENGGUNAAN foreign key (ID_AKUN)
      references AKUNPELAMAR (ID_AKUN) on delete cascade on update cascade;

alter table HISTORIUBAHAKUN add constraint FK_HISTORIPERUBAHANAKUN foreign key (ID_AKUN)
      references AKUNPELAMAR (ID_AKUN) on delete cascade on update cascade;

alter table KOTAKABUPATEN add constraint FK_PROVINSIKOTAKABUPATEN foreign key (ID_PROV)
      references PROVINSI (ID_PROV) on delete cascade on update cascade;

alter table KURSUS add constraint FK_PENDIDIKANINFORMALPELAMAR foreign key (ID_PEL)
      references PELAMAR (ID_PEL) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_AGAMAPELAMAR foreign key (ID_AGAMA)
      references AGAMA (ID_AGAMA) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_AKUNPELAMAR foreign key (ID_AKUN)
      references AKUNPELAMAR (ID_AKUN) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_KOTAKABUPATENKTPPELAMAR foreign key (ID_KOTA)
      references KOTAKABUPATEN (ID_KOTA) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_KOTAKABUPATENSURATPELAMAR foreign key (KOT_ID_KOTA)
      references KOTAKABUPATEN (ID_KOTA) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_PELAMARSTATUSNIKAH foreign key (ID_PERNIKAHAN)
      references STATUSPERNIKAHAN (ID_PERNIKAHAN) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_RELATIONSHIP_35 foreign key (PRO_ID_PROV)
      references PROVINSI (ID_PROV) on delete cascade on update cascade;

alter table PELAMAR add constraint FK_RELATIONSHIP_36 foreign key (ID_PROV)
      references PROVINSI (ID_PROV) on delete cascade on update cascade;

alter table PENDIDIKANFORMALNONPT add constraint FK_PENDIDIKANFORMALNONPTPELAMAR foreign key (ID_PEL)
      references PELAMAR (ID_PEL) on delete cascade on update cascade;

alter table PENDIDIKANFORMALNONPT add constraint FK_TINGKATPENDIDIKANFORMALNONPT foreign key (ID_TINGKAT)
      references TINGKATPENDIDIKAN (ID_TINGKAT) on delete cascade on update cascade;

alter table PENDIDIKANFORMALPT add constraint FK_PELAMARPENDIDIKANPT foreign key (ID_PEL)
      references PELAMAR (ID_PEL) on delete cascade on update cascade;

alter table PENDIDIKANFORMALPT add constraint FK_PERGURUANTINGGIPENDIDIKANPT foreign key (ID_PT)
      references PERGURUANTINGGI (ID_PT) on delete cascade on update cascade;

alter table PENDIDIKANFORMALPT add constraint FK_PROGRAMSTUDIPENDIDIKANPT foreign key (ID_PS)
      references PROGRAMSTUDI (ID_PS) on delete cascade on update cascade;

alter table PENDIDIKANFORMALPT add constraint FK_TINGKATPENDIDIKANFORMALPT foreign key (ID_TINGKAT)
      references TINGKATPENDIDIKAN (ID_TINGKAT) on delete cascade on update cascade;

alter table PENGALAMANKERJA add constraint FK_PENGALAMANKERJAPELAMAR foreign key (ID_PEL)
      references PELAMAR (ID_PEL) on delete cascade on update cascade;

alter table PESERTA add constraint FK_PELAMARMENDAFTAR foreign key (ID_PEL)
      references PELAMAR (ID_PEL) on delete cascade on update cascade;

alter table PESERTA add constraint FK_PESERTABIDANGJABATANDIBUKA foreign key (ID_REKRUTMEN, ID_BID)
      references BIDANGJABATANDIBUKA (ID_REKRUTMEN, ID_BID) on delete cascade on update cascade;

alter table PESERTALULUS add constraint FK_INHERITANCE_7 foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table PESERTATIDAKLULUS add constraint FK_INHERITANCE_8 foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table PROGRAMSTUDIPERBIDANG add constraint FK_JABATANPROGRAMSTUDIDIBUKA foreign key (ID_REKRUTMEN, ID_BID)
      references BIDANGJABATANDIBUKA (ID_REKRUTMEN, ID_BID) on delete cascade on update cascade;

alter table PROGRAMSTUDIPERBIDANG add constraint FK_PROGRAMSTUDIDIBUKA foreign key (ID_PS)
      references PROGRAMSTUDI (ID_PS) on delete cascade on update cascade;

alter table PSIKOTEST add constraint FK_PESERTAPSIKOTEST foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table REKRUTMEN add constraint FK_LOKASIREKRUTMEN foreign key (ID_LOKASI)
      references LOKASI (ID_LOKASI) on delete cascade on update cascade;

alter table REKRUTMEN add constraint FK_PELAKSANAREKRUTMEN foreign key (ID_PELAKSANA)
      references PELAKSANA (ID_PELAKSANA) on delete cascade on update cascade;

alter table REKRUTMEN add constraint FK_REKRUTMENJENIS foreign key (ID_JENIS_REKRUT)
      references JENISREKRUTMEN (ID_JENIS_REKRUT) on delete cascade on update cascade;

alter table TESTAKADEMIK add constraint FK_PESERTATESTAKADEMIK foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table TESTGAT add constraint FK_PESERTATESTGAT foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table TESTKESEHATAN add constraint FK_KESEHATANKATEGORISEHAT foreign key (ID_KATEGORI_SEHAT)
      references KATEGORIKESEHATAN (ID_KATEGORI_SEHAT) on delete cascade on update cascade;

alter table TESTKESEHATAN add constraint FK_PESERTATESTKESEHATAN foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

alter table WAWANCARA add constraint FK_PESERTAWAWANCARA foreign key (ID_REKRUTMEN, ID_BID, ID_PEL)
      references PESERTA (ID_REKRUTMEN, ID_BID, ID_PEL) on delete cascade on update cascade;

