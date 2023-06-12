-- Creación de la tabla Alumnos
CREATE TABLE Alumnos(
  alum_ID SERIAL PRIMARY KEY,
  alum_Nombre VARCHAR(60) NOT NULL,
  alum_apellido  VARCHAR(60) NOT NULL,
  alum_Grado VARCHAR(60) NOT NULL,
  alum_Arma VARCHAR(60) NOT NULL,
  alum_Nacionalidad VARCHAR(60) NOT NULL,
  detalle_situacion CHAR (1) DEFAULT '1'
);

-- Creación de la tabla Materias
CREATE TABLE Materias (
  mate_ID SERIAL PRIMARY KEY,
  mate_Nombre VARCHAR(70) NOT NULL,
  detalle_situacion CHAR (1) DEFAULT '1'
);

--tabla de realcion materia alumnos 
CREATE TABLE relacion_mate_alum (
  id_mate_alum SERIAL PRIMARY KEY,
  mate_alumno INT NOT NULL,
  mate_materia INT NOT NULL,
  FOREIGN KEY (mate_alumno) REFERENCES Alumnos(alum_ID),
  FOREIGN KEY (mate_materia) REFERENCES Materias(mate_ID)
);


-- Creación de la tabla Resultados
CREATE TABLE Resultados (
  res_ID SERIAL PRIMARY KEY,
  res_Alumno INT NOT NULL,
  res_Materia INT NOT NULL,
  res_Punteo FLOAT NOT NULL,
  res_Resultado VARCHAR(10),
  detalle_situacion CHAR (1) DEFAULT '1',
  FOREIGN KEY (res_Alumno) REFERENCES Alumnos(alum_ID),
  FOREIGN KEY (res_Materia) REFERENCES Materias(mate_ID)
);

-- Inserción de datos en la tabla Alumnos
INSERT INTO Alumnos (alum_Nombre, alum_apellido, alum_Grado, alum_Arma, alum_Nacionalidad)
VALUES ('Bryan Daniel', 'Marin Arana', 'Alferez de fragata', 'infanteria de marina', 'Guatemalteco');

INSERT INTO Alumnos (alum_Nombre, alum_apellido, alum_Grado, alum_Arma, alum_Nacionalidad)
VALUES ('Dany', 'Cornelio Farias', 'Teniente', 'Artilleria', 'Dominicano');


-- Inserción de datos en la tabla Materias
INSERT INTO Materias (mate_Nombre)
VALUES ('Matemáticas');

INSERT INTO Materias (mate_Nombre)
VALUES ('Historia');


-- Inserción de datos en la tabla relacion_mate_alum
INSERT INTO relacion_mate_alum (mate_alumno, mate_materia)
VALUES (1, 1);

INSERT INTO relacion_mate_alum (mate_alumno, mate_materia)
VALUES (2, 2);


-- Inserción de datos en la tabla Resultados
INSERT INTO Resultados (res_Alumno, res_Materia, res_Punteo, res_Resultado)
VALUES (1, 1, 95.5, 'Aprobado');

INSERT INTO Resultados (res_Alumno, res_Materia, res_Punteo, res_Resultado)
VALUES (2, 2, 88.0, 'Aprobado');


/querys/

SELECT alumnos.alum_Nombre || ' ' || alumnos.alum_apellido as Nombre,
alumnos.alum_Grado, alumnos.alum_Arma, alumnos.alum_Nacionalidad, materias.mate_Nombre,
resultados.res_Punteo, resultados.res_Resultado
FROM alumnos
JOIN resultados ON alumnos.alum_ID = resultados.res_Alumno
JOIN materias ON resultados.res_Materia = materias.mate_ID
ORDER BY alumnos.alum_Nombre, materias.mate_Nombre, resultados.res_ID;



SELECT alumnos.alum_nombre || ' ' || alumnos.alum_apellido AS Nombre, AVG(resultados.res_Punteo) AS Promedio
FROM alumnos
JOIN resultados ON alumnos.alum_ID = resultados.res_Alumno
GROUP BY alumnos.alum_nombre, alumnos.alum_apellido;


***************************************************************************************************************







































