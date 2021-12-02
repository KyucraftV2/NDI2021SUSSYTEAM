
Bateaux = (idBateau CHAR(4), nomBateau(NOT NULL) VARCHAR(50), typeBateau VARCHAR(50));

CREATE TABLE SAUVETEURS(
    idSauveteur CHAR(5), nomSauveteur VARCHAR(30), prenomSauveteur VARCHAR(30), dateNaissance DATE, dateDeces DATE, fonctionSauveteur VARCHAR(50), nbSauvetages INT, photoSauveteur TEXT,
    CONSTRAINT pk_idSauveteur PRIMARY KEY (idSauveteur);
);

CREATE TABLE SAUVETAGES(
    codeSauvetage CHAR(7), lieuSauvetage VARCHAR(50), dateSauvetage DATE, nbHommesSauvés INT, nbSauveteursDécédés INT, idSauveteur CHAR (5)
    CONSTRAINT pk_codeSauvetage PRIMARY KEY (codeSauvetage),
    CONSTRAINT fk_idSauveteur FOREIGN KEY (idSauveteur)
)