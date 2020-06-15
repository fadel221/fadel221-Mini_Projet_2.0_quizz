#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE fadel_root;

#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        idUser   Int  Auto_increment  NOT NULL ,
        login    Varchar (50) NOT NULL ,
        prenom   Varchar (50) NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        role     Varchar (50) NOT NULL ,
        avatar   Varchar (50) NOT NULL ,
        statut   Varchar (50) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: score
#------------------------------------------------------------

CREATE TABLE score(
        idScore    Int  Auto_increment  NOT NULL ,
        valueScore Int NOT NULL ,
        idUser     Int NOT NULL
	,CONSTRAINT score_PK PRIMARY KEY (idScore)

	,CONSTRAINT score_Utilisateur_FK FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Question
#------------------------------------------------------------

CREATE TABLE Question(
        idQuestion   Int  Auto_increment  NOT NULL ,
        val_question Varchar (50) NOT NULL ,
        idScore      Int NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (idQuestion)

	,CONSTRAINT Question_score_FK FOREIGN KEY (idScore) REFERENCES score(idScore)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Réponse
#------------------------------------------------------------

CREATE TABLE Reponse(
        idReponse   Int  Auto_increment  NOT NULL ,
        val_reponse Varchar (200) NOT NULL ,
        idQuestion  Int NOT NULL
	,CONSTRAINT Reponse_PK PRIMARY KEY (idReponse)

	,CONSTRAINT Reponse_Question_FK FOREIGN KEY (idQuestion) REFERENCES Question(idQuestion)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: repondre
#------------------------------------------------------------

CREATE TABLE repondre(
        idReponse Int NOT NULL ,
        idUser    Int NOT NULL
	,CONSTRAINT repondre_PK PRIMARY KEY (idReponse,idUser)

	,CONSTRAINT repondre_Reponse_FK FOREIGN KEY (idReponse) REFERENCES Reponse(idReponse)
	,CONSTRAINT repondre_Utilisateur0_FK FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
)ENGINE=InnoDB;

