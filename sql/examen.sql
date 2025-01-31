DELIMITER //
drop table if exists estudiante cascade;
drop table if exists expediente cascade;
//

create table estudiante(
    nia integer,
    nombre varchar(100),
    correo varchar(255),
    ref_expediente varchar(10) NULL
);
//
create table expediente(
    referencia varchar(10),
    contenido varchar(1000),
    fecha_modificacion date
);
//

alter table estudiante add constraint pk_estudiante primary key (nia);
alter table expediente add constraint pk_expediente primary key (referencia);
//
alter table estudiante add constraint fk_estudiante_expediente foreign key (ref_expediente) references expediente(referencia) ON DELETE CASCADE;