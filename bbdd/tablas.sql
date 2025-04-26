CREATE TABLE users (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   identificacion CHAR(10) UNIQUE,
   name VARCHAR(30),
   apellidos VARCHAR(60),
   email VARCHAR(40) UNIQUE,
   telefono CHAR(12),
   direccion VARCHAR(150),
   localidad VARCHAR(50),
   codigo_postal CHAR(5),
   iban CHAR(24),
   fecha_nacimiento DATE,
   fecha_comienzo DATE,
   fecha_fin DATE NULL,
   password VARCHAR(255),
   remember_token VARCHAR(100) NULL,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL
);

CREATE TABLE clientes (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   identificacion CHAR(10) UNIQUE,
   nombre VARCHAR(30),
   apellidos VARCHAR(60),
   email VARCHAR(40) NULL,
   telefono CHAR(12),
   codigo_postal CHAR(5),
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL
);

CREATE TABLE parcelas (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   id_cliente BIGINT UNSIGNED,
   referencia_catastral CHAR(20) UNIQUE,
   superficie INT UNSIGNED,
   latitud DECIMAL(10, 6),
   longitud DECIMAL(10, 6),
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL,
   FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

CREATE TABLE maquinarias (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   numero_serie VARCHAR(20),
   matricula CHAR(10),
   marca VARCHAR(20),
   descripcion VARCHAR(200),
   ip_alta VARCHAR(45) NULL,
   ip_ult_mod VARCHAR(45) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL
);

CREATE TABLE fitosanitarios (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nombre VARCHAR(29),
   marca VARCHAR(29),
   numero_registro VARCHAR(29),
   tipo CHAR(2),
   estado CHAR(2),
   descripcion VARCHAR(200),
   entidad_vendedora VARCHAR(40),
   materia_activa VARCHAR(30),
   cantidad_materia_activa DECIMAL(5, 2),
   dosis_maxima DECIMAL(5, 2),
   plazo_seguridad INT,
   observaciones VARCHAR(200) NULL,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL
);

CREATE TABLE servicios (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   tipo_servicio ENUM('CP', 'CM', 'SC', 'SS'),
   descripcion VARCHAR(60),
   fecha_servicio DATE,
   hora_servicio TIME,
   duracion INT,
   presupuesto DECIMAL(7, 2),
   metodo_pago ENUM('EF', 'TA', 'TR'),
   estado ENUM('P', 'N'),
   id_parcela BIGINT UNSIGNED,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL,
   FOREIGN KEY (id_parcela) REFERENCES parcelas(id)
);

CREATE TABLE servicios_users (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   id_servicio BIGINT UNSIGNED,
   id_user BIGINT UNSIGNED,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL,
   FOREIGN KEY (id_servicio) REFERENCES servicios(id) ON DELETE CASCADE,
   FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE servicios_maquinarias (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   id_servicio BIGINT UNSIGNED,
   id_maquinaria BIGINT UNSIGNED,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL,
   FOREIGN KEY (id_servicio) REFERENCES servicios(id) ON DELETE CASCADE,
   FOREIGN KEY (id_maquinaria) REFERENCES maquinarias(id) ON DELETE CASCADE
);

CREATE TABLE servicios_fitosanitarios (
   id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   id_servicio BIGINT UNSIGNED,
   id_fitosanitario BIGINT UNSIGNED,
   ip_alta VARCHAR(15) NULL,
   ip_ult_mod VARCHAR(15) NULL,
   created_at TIMESTAMP NULL,
   updated_at TIMESTAMP NULL,
   FOREIGN KEY (id_servicio) REFERENCES servicios(id) ON DELETE CASCADE,
   FOREIGN KEY (id_fitosanitario) REFERENCES fitosanitarios(id) ON DELETE CASCADE
);
