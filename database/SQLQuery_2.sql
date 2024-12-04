USE PBLSistemTatib;
GO

SELECT * FROM Users;

CREATE TABLE Mahasiswa (
	Nama VARCHAR (255) NOT NULL,
	NIM VARCHAR(20) NOT NULL PRIMARY KEY,
	Jurusan VARCHAR(100) NOT NULL,
	Prodi VARCHAR(100) NOT NULL
);

DROP TABLE Mahasiswa;
SELECT * FROM Mahasiswa;

ALTER TABLE Mahasiswa
ALTER COLUMN NIM VARCHAR(20) NOT NULL;

ALTER TABLE Mahasiswa
ADD CONSTRAINT PK_Mahasiswa PRIMARY KEY (NIM);


INSERT INTO Mahasiswa(Nama,NIM,Jurusan,Prodi)
VALUES ('Erwan Majid','2341720064','Teknologi Informasi','Teknik Informatika');
