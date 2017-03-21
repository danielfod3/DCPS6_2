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
