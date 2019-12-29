create database DiyetinGuvende
use  DiyetinGuvende

Create Table KullaniciTur(
Id int AUTO_INCREMENT PRIMARY KEY,
TurAd varchar(15) not null
) 

insert into KullaniciTur(TurAd) values ('Diyetisyen');
insert into KullaniciTur(TurAd) values ('Spor Hocası');
insert into KullaniciTur(TurAd) values ('Kullanıcı');
insert into KullaniciTur(TurAd) values ('Yönetici');


Create Table Cinsiyet (
Id int AUTO_INCREMENT PRIMARY KEY,
CinsiyetAd varchar(10) not null
)

Create Table ProgramGun (
Id int AUTO_INCREMENT PRIMARY KEY,
Gun varchar(9) not null
)

insert into ProgramGun(Gun) values ('Pazartesi');
insert into ProgramGun(Gun) values ('Salı');
insert into ProgramGun(Gun) values ('Çarşamba');
insert into ProgramGun(Gun) values ('Perşembe');
insert into ProgramGun(Gun) values ('Cuma');
insert into ProgramGun(Gun) values ('Cumartesi');
insert into ProgramGun(Gun) values ('Pazar');

Create Table Kullanici(
Id int AUTO_INCREMENT PRIMARY KEY,
CinsiyetId int not null,
Ad varchar(30) not null,
Soyad varchar(30) not null,
DogumTarih date not null,
KullaniciAdi varchar(15) not null,
Email varchar(50) not null,
TelefonNo varchar(15) not null,
Sifre varchar(150) not null,
KullaniciTurId int not null,
CONSTRAINT U_Kullanici UNIQUE (TelefonNo),
CONSTRAINT U_Kullanici2 UNIQUE (KullaniciAdi),
CONSTRAINT U_Kullanici3 UNIQUE (Email),
CONSTRAINT FK_Kullanici FOREIGN KEY (CinsiyetId) REFERENCES Cinsiyet(Id),
CONSTRAINT FK_Kullanici2 FOREIGN KEY (KullaniciTurId) REFERENCES KullaniciTur(Id)
)

Create Table DiyetTablosu( 
Id int AUTO_INCREMENT PRIMARY KEY,
TabloAdi varchar(20) not null,
TabloAciklamasi varchar(120),
DiyetisyenId int not null,
TabloTarih date,
CONSTRAINT FK_DiyetTablosu FOREIGN KEY (DiyetisyenId) REFERENCES Kullanici(Id) 
)

Create Table SporTablosu( 
Id int AUTO_INCREMENT PRIMARY KEY,
TabloAdi varchar(20) not null,
TabloAciklamasi varchar(120),
KocId int not null,
TabloTarih date,
CONSTRAINT FK_SporTablosu FOREIGN KEY (KocId) REFERENCES Kullanici(Id) 
)

Create Table DiyetTabloSatir( 
Id int AUTO_INCREMENT PRIMARY KEY,
ProgramGunId int not null,
DiyetTabloId int not null,
Aciklama varchar(25) not null,
CONSTRAINT FK_DiyetTabloSatir FOREIGN KEY (ProgramGunId) REFERENCES ProgramGun(Id), 
CONSTRAINT FK_DiyetTabloSatir2 FOREIGN KEY (DiyetTabloId) REFERENCES DiyetTablosu(Id) 
)

Create Table SporTabloSatir( 
Id int AUTO_INCREMENT PRIMARY KEY,
ProgramGunId int not null,
SporTabloId int not null,
Aciklama varchar(25) not null,
CONSTRAINT FK_SporTabloSatir FOREIGN KEY (ProgramGunId) REFERENCES ProgramGun(Id), 
CONSTRAINT FK_SporTabloSatir2 FOREIGN KEY (SporTabloId) REFERENCES SporTablosu(Id)
)

Create Table HastaBilgi( 
Id int AUTO_INCREMENT PRIMARY KEY,
KullaniciId int not null,
Boy int not null, 
Kilo float not null,
YagOrani float not null, 
DiyetisyenId int,
DiyetTabloId int,
SporTabloId int,
KocId int,
CONSTRAINT FK_HastaBilgi FOREIGN KEY (KullaniciId) REFERENCES Kullanici(Id),
CONSTRAINT FK_HastaBilgi2 FOREIGN KEY (DiyetisyenId) REFERENCES Kullanici(Id), 
CONSTRAINT FK_HastaBilgi3 FOREIGN KEY (KocId) REFERENCES Kullanici(Id),
CONSTRAINT FK_HastaBilgi4 FOREIGN KEY (DiyetTabloId) REFERENCES DiyetTablosu(Id), 
CONSTRAINT FK_HastaBilgi5 FOREIGN KEY (SporTabloId) REFERENCES SporTablosu(Id)  
)


Create Table DestekKategori(
Id int AUTO_INCREMENT PRIMARY KEY,
Ad varchar(30) not null
)

insert into DestekKategori(Ad) values ('Teknik Sorunlar');
insert into DestekKategori(Ad) values ('Bağlantı Sorunları');
insert into DestekKategori(Ad) values ('Güvenlik Sorunları');

Create Table Destek(
Id int AUTO_INCREMENT PRIMARY KEY,
GonderenId int not null,
Sorun varchar(250) not null,
SorunKategoriId int not null,
CONSTRAINT FK_Destek FOREIGN KEY (GonderenId) REFERENCES Kullanici(Id),
CONSTRAINT FK_Destek2 FOREIGN KEY (SorunKategoriId) REFERENCES DestekKategori(Id)
)

create table KullaniciMesaj(
Id int AUTO_INCREMENT PRIMARY KEY not null,
GonderenId int not null,
AlanId int not null,
Mesaj varchar(400) not null,
GonderilmeTarihi datetime not null,
CONSTRAINT F_UserMessage FOREIGN KEY(GonderenId) REFERENCES Kullanici(Id),
CONSTRAINT F_UserMessage2 FOREIGN KEY(AlanId) REFERENCES Kullanici(Id)
)


