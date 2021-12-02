CREATE TABLE SAUVETEURS(
    idSauveteur CHAR(5), nomSauveteur VARCHAR(30), prenomSauveteur VARCHAR(30), dateNaissance DATE, dateDeces DATE, fonctionSauveteur VARCHAR(50), nbSauvetages INT, photoSauveteur TEXT,
    CONSTRAINT pk_idSauveteur PRIMARY KEY (idSauveteur)
);

CREATE TABLE SAUVETAGES(
    codeSauvetage CHAR(7), lieuSauvetage VARCHAR(50), dateSauvetage DATE, nbHommesSauves INT, nbSauveteursDecedes INT, idSauveteur CHAR(5),
    CONSTRAINT pk_codeSauvetage PRIMARY KEY (codeSauvetage),
    CONSTRAINT fk_idSauveteur FOREIGN KEY (idSauveteur) REFERENCES SAUVETEURS(idSauveteur)
);

CREATE TABLE BATEAUX(
    idBateau CHAR(4), nomBateau VARCHAR(50), typeBateau VARCHAR(50),
    CONSTRAINT pk_bateau PRIMARY KEY (idBateau)
    CONSTRAINT nn_nomBateau CHECK (nomBateau is not NULL)
);


CREATE TABLE NAUFRAGES(
    idNaufrage CHAR(5), nomNaufrage VARCHAR(50), prenomNaufrage VARCHAR(50), dateNaissance DATE, codeSauvetage CHAR(5),
    CONSTRAINT pk_Naufrage PRIMARY KEY (idNaufrage),
    CONSTRAINT fk_codeSauvetage FOREIGN KEY (codeSauvetage) REFERENCES SAUVETAGES(codeSauvetage)


);

CREATE TABLE PARTICIPER(
    idSauveteur CHAR(5), codeSauvetage CHAR(5),
    CONSTRAINT fk_idSauveteur_codeSauvetage PRIMARY KEY (idSauveteur, codeSauvetage),
    CONSTRAINT fk_idSauveteur FOREIGN KEY (idSauveteur) REFERENCES SAUVETEUR(idSauveteur),
    CONSTRAINT fk_codeSauvetage FOREIGN KEY (codeSauvetage) REFERENCES SAUVETAGES(codeSauvetage)
);


CREATE TABLE CONCERNER(
    codeSauvetage CHAR(5), idBateau CHAR(5),
    CONSTRAINT fk_codeSauvetage_idBateau PRIMARY KEY (codeSauvetage, idBateau),
    CONSTRAINT fk_codeSauvetage FOREIGN KEY (codeSauvetage) REFERENCES SAUVETAGES(codeSauvetage),
    CONSTRAINT fk_idBateau FOREIGN KEY (idBateau) REFERENCES BATEAUX(idBateau)
);
