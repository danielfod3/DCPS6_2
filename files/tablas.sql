CREATE TABLE granjero (
	id   				INT UNSIGNED NOT NULL,
	nombre           	VARCHAR(30)  NOT NULL,
	sexo             	VARCHAR(1)   NOT NULL,
	edad			 	INT	UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT sexo_valido CHECK (sexo IN ('M', 'F'))
) ENGINE = InnoDB;



CREATE TABLE finca (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	granjero         	INT UNSIGNED NOT NULL,
	nombre          	VARCHAR(20)  NOT NULL,
	valor_propiedad     VARCHAR(100) NOT NULL,
	cantidad_vacas      INT UNSIGNED NOT NULL,
	cantidad_gallinas 	INT UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT granjero_finca FOREIGN KEY (granjero) REFERENCES granjero (id)
) ENGINE = InnoDB;


CREATE TABLE curso (
	id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre      VARCHAR(20)  NOT NULL,
	facultad    VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE estudiante (
	id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre           VARCHAR(20)  NOT NULL,
	edad             INT         NOT NULL,
	PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE matricula(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nota_final FLOAT(20) NOT NULL,
	id_curso INT UNSIGNED NOT NULL,
	id_estudiante INT UNSIGNED NOT NULL,
	PRIMARY KEY (id,id_curso,id_estudiante),
	CONSTRAINT est_curso FOREIGN KEY (id_curso) REFERENCES curso (id),
	CONSTRAINT est_estud FOREIGN KEY (id_estudiante) REFERENCES estudiante (id)
) ENGINE = InnoDB;
