-- auto-generated definition
CREATE TABLE utilisateurs
(
  id            INT AUTO_INCREMENT
    PRIMARY KEY,
  civilite      VARCHAR(255) DEFAULT '''NULL''' NULL,
  nom           VARCHAR(255) DEFAULT 'NULL'     NULL,
  prenom        VARCHAR(255) DEFAULT '''NULL''' NULL,
  adresse       VARCHAR(255) DEFAULT 'NULL'     NULL,
  codePostal    VARCHAR(50) DEFAULT 'NULL'      NULL,
  ville         VARCHAR(255) DEFAULT 'NULL'     NULL,
  dateNaissance INT DEFAULT NULL             NULL,
  email         VARCHAR(255) DEFAULT 'NULL'     NULL,
  validation    INT DEFAULT '0'                 NOT NULL,
  dateInsci     DATE DEFAULT NOW()             NOT NULL
);
