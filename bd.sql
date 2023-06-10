-- Creación de la tabla Alumnos
CREATE TABLE Alumnos(
  alum_ID INT PRIMARY KEY,
  alum_Nombre VARCHAR(60),
  alum_Grado VARCHAR(60),
  alum_Arma VARCHAR(60),
  alum_Nacionalidad VARCHAR(60)
);

-- Creación de la tabla Materias
CREATE TABLE Materias (
  mate_ID INT PRIMARY KEY,
  mate_Nombre VARCHAR(70)
);

-- Creación de la tabla Notas
CREATE TABLE Notas (
  not_ID INT PRIMARY KEY,
  not_ID_Alumno INT,
  not_ID_Materia INT,
  not_Punteo FLOAT,
  FOREIGN KEY (not_ID_Alumno) REFERENCES Alumnos(alum_ID),
  FOREIGN KEY (not_ID_Materia) REFERENCES Materias(mate_ID)
);

-- Creación de la tabla Resultados
CREATE TABLE Resultados (
  res_ID INT PRIMARY KEY,
  res_ID_Alumno INT,
  res_ID_Materia INT,
  res_Numero INT,
  res_Punteo FLOAT,
  res_Resultado VARCHAR(10),
  FOREIGN KEY (res_ID_Alumno) REFERENCES Alumnos(alum_ID),
  FOREIGN KEY (res_ID_Materia) REFERENCES Materias(mate_ID)
);

-- Inserción de un alumno
INSERT INTO Alumnos (ID, Nombre, GradoMilitar, Nacionalidad)
VALUES (1, 'John Doe', 'Sargento', 'Estados Unidos');

-- Inserción de una materia
INSERT INTO Materias (ID, Nombre)
VALUES (1, 'Matemáticas');

-- Inserción de una nota
INSERT INTO Notas (ID, ID_Alumno, ID_Materia, Punteo)
VALUES (1, 1, 1, 8.5);

-- Asignación de un alumno a una materia
INSERT INTO Resultados (ID, ID_Alumno, ID_Materia, Numero, Punteo, Estado)
VALUES (1, 1, 1, 1, 8.5, 'Ganó');

SELECT Alumnos.Nombre, Alumnos.GradoMilitar, Alumnos.Nacionalidad, Resultados.Numero, Materias.Nombre, Resultados.Punteo, Resultados.Estado
FROM Alumnos
JOIN Resultados ON Alumnos.ID = Resultados.ID_Alumno
JOIN Materias ON Resultados.ID_Materia = Materias.ID
ORDER BY Alumnos.Nombre, Materias.Nombre, Resultados.Numero;


SELECT Alumnos.Nombre, AVG(Resultados.Punteo) AS Promedio
FROM Alumnos
JOIN Resultados ON Alumnos.ID = Resultados.ID_Alumno
GROUP BY Alumnos.Nombre;

-- Inserción de más materias
INSERT INTO Materias (ID, Nombre)
VALUES (2, 'Ciencias');
INSERT INTO Materias (ID, Nombre)
VALUES (3, 'Historia');


INSERT INTO Resultados (ID, ID_Alumno, ID_Materia, Numero, Punteo, Estado)
VALUES (2, 1, 2, 1, 7.9, 'Ganó');
INSERT INTO Resultados (ID, ID_Alumno, ID_Materia, Numero, Punteo, Estado)
VALUES (3, 1, 3, 1, 6.8, 'Perdió');