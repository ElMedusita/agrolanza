 
DROP TABLE clientes;

CREATE TABLE clientes (
    id                  int not null auto_increment primary key,
    identificacion      char(10) UNIQUE,
    nombre              varchar(30) not null,
    apellidos           varchar(60) not null,
    email               varchar(40),
    telefono            char(12) not null,
    codigo_postal       char(5) not null,

    ip_alta            VARCHAR(15),
    fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod         VARCHAR(15),
    fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE users;

CREATE TABLE users (
    id                  int not null auto_increment primary key,
    identificacion      char(10) UNIQUE,
    nombre              varchar(30) not null,
    apellidos           varchar(60) not null,
    email               varchar(40) not null,
    telefono            char(12) not null,
    codigo_postal       char(5) not null,
    iban                char(24) not null,
    fecha_nacimiento    timestamp,

    ip_alta            VARCHAR(15),
    fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod         VARCHAR(15),
    fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE parcelas;

CREATE TABLE parcelas (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente          INT NOT NULL,
    referencia_catastral CHAR(14) NOT NULL,
    superficie          DECIMAL(7,2) NOT NULL,
    latitud             DECIMAL(9,6) NOT NULL,
    longitud            DECIMAL(10,6) NOT NULL,
    
    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

DROP TABLE fitosanitarios;

CREATE TABLE fitosanitarios (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre              varchar(29) NOT NULL,
    marca               varchar(29) NOT NULL,
    tipo                char(2) not null,
    descripcion         VARCHAR(60) NOT NULL,
    entidad_vendedora   varchar(40) NOT NULL,
    materia_activa      varchar(30) NOT NULL,
    dosis_maxima        decimal(5,2) NOT NULL,

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE maquinarias;

CREATE TABLE maquinarias (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numero_serie        varchar(14) NOT NULL,
    matricula           char(10) NOT NULL,
    marca               varchar(20) NOT NULL,
    descripcion         VARCHAR(60) NOT NULL,

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE servicios;

CREATE TABLE servicios (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_servicio       char(2) NOT NULL,
    descripcion         VARCHAR(60),
    metodo_pago         char(2) NOT NULL,
    fecha_servicio      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    hora_servicio       TIME NOT NULL,
    presupuesto         decimal(7,2) NOT NULL,
    forma_pago          char(2) NOT NULL,
    estado            char(1) NOT NULL,
    
    id_cliente          INT NOT NULL,
    

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

DROP TABLE servicios_trabajadores;

CREATE TABLE servicios_trabajadores (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_servicio         int NOT NULL,
    id_trabajador       int NOT NULL,

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (id_servicio) REFERENCES servicios(id),
    FOREIGN KEY (id_trabajador) REFERENCES trabajadores(id)
);


DROP TABLE servicios_maquinarias;

CREATE TABLE servicios_maquinarias (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_servicio         int NOT NULL,
    id_maquinaria       int NOT NULL,

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (id_servicio) REFERENCES servicios(id),
    FOREIGN KEY (id_maquinaria) REFERENCES maquinarias(id)
);


DROP TABLE servicios_fitosanitarios;

CREATE TABLE servicios_fitosanitarios (
    id                  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_servicio         int NOT NULL,
    id_fitosanitario    int NOT NULL,

    ip_alta             VARCHAR(15),
    fecha_alta          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    ip_ult_mod          VARCHAR(15),
    fecha_ult_mod       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (id_servicio) REFERENCES servicios(id),
    FOREIGN KEY (id_fitosanitario) REFERENCES fitosanitarios(id)
);
