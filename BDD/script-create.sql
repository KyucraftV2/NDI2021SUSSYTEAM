CREATE TABLE SAUVETEURS(
   idSauveteur CHAR(5),
   nomSauveteur VARCHAR(30),
   prenomSauveteur VARCHAR(30),
   dateNaissance DATE,
   dateDeces DATE,
   fonctionSauveteur VARCHAR(50),
   nbSauvetages INT,
   photoSauveteur TEXT,
   PRIMARY KEY(idSauveteur)
);

CREATE TABLE Sauvetage(
   codeSauvetage CHAR(7),
   lieuSauvetage VARCHAR(50),
   dateSauvetage DATE NOT NULL,
   nbHommesSauvés INT,
   nbSauveteursDécédés INT,
   idSauveteur CHAR(5) NOT NULL,
   PRIMARY KEY(codeSauvetage),
   FOREIGN KEY(idSauveteur) REFERENCES SAUVETEURS(idSauveteur)
);

CREATE TABLE Bateaux(
   idBateau CHAR(4),
   nomBateau VARCHAR(50) NOT NULL,
   typeBateau VARCHAR(50),
   PRIMARY KEY(idBateau)
);

CREATE TABLE Naufragés(
   idNaufragé CHAR(5),
   nomNaufragé VARCHAR(50),
   prenomNaufragé VARCHAR(50),
   dateNaissance DATE,
   codeSauvetage CHAR(7) NOT NULL,
   PRIMARY KEY(idNaufragé),
   FOREIGN KEY(codeSauvetage) REFERENCES Sauvetage(codeSauvetage)
);

CREATE TABLE Participer(
   idSauveteur CHAR(5),
   codeSauvetage CHAR(7),
   PRIMARY KEY(idSauveteur, codeSauvetage),
   FOREIGN KEY(idSauveteur) REFERENCES SAUVETEURS(idSauveteur),
   FOREIGN KEY(codeSauvetage) REFERENCES Sauvetage(codeSauvetage)
);

CREATE TABLE Concerner(
   codeSauvetage CHAR(7),
   idBateau CHAR(4),
   PRIMARY KEY(codeSauvetage, idBateau),
   FOREIGN KEY(codeSauvetage) REFERENCES Sauvetage(codeSauvetage),
   FOREIGN KEY(idBateau) REFERENCES Bateaux(idBateau)
);
