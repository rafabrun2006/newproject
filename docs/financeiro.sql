drop table if exists usuario;

create table tb_usuario
(
   id                   int(11) not null,
   senha                varchar(50),
   nome                 varchar(80),
   cpf                  int(15) not null,
   email                int(11) not null,
   primary key (id)
)
ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6;


drop table if exists tb_registro_lancamento;

create table tb_registro_lancamento
(
   id                   int(11) not null,
   lancamento_id        int(11) not null,
   data_lancamento      date not null,
   usuario_id           int(11),
   primary key (id),
   unique key (id),
   key (usuario_id)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


create table tb_tipo_lancamento
(
   id                   int(11) not null,
   nome_tipo            char(1),
   primary key (id)
);

alter table tb_tipo_lancamento add constraint FK_Reference_6 foreign key (id)
      references tb_receita (id) on delete restrict on update restrict;

alter table tb_tipo_lancamento add constraint FK_Reference_7 foreign key (id)
      references tb_despesa (id) on delete restrict on update restrict;


create table tb_despesa
(
   id                   int(11) not null,
   fornecedor_id        int(11),
   usuario_id           int(11),
   tipo_lancamento_id   int(11),
   descricao            varchar(150),
   valor                double(8,2) not null,
   data_despesa         date not null,
   data_pagamento       date not null,
   primary key (id),
   key fornecedor_id (id)
)
ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47;

alter table tb_despesa add constraint FK_Reference_1 foreign key (id)
      references tb_registro_lancamento (lancamento_id) on delete restrict on update restrict;

alter table tb_despesa add constraint FK_Reference_2 foreign key (fornecedor_id)
      references tb_fornecedor (id) on delete restrict on update restrict;

alter table tb_despesa add constraint FK_Reference_5 foreign key (usuario_id)
      references tb_usuario (id) on delete restrict on update restrict;

alter table tb_despesa add constraint FK_Reference_8 foreign key (tipo_lancamento_id)
      references tb_tipo_lancamento (id) on delete restrict on update restrict;


create table tb_receita
(
   id                   int(11) not null,
   descricao            varchar(150),
   valor                double not null,
   data                 date not null,
   usuario_id           int(11),
   tipo_lancamento_id   int(11),
   primary key (id)
)
ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59;

alter table tb_receita add constraint FK_Reference_3 foreign key (usuario_id)
      references tb_usuario (id) on delete restrict on update restrict;

alter table tb_receita add constraint FK_Reference_9 foreign key (tipo_lancamento_id)
      references tb_tipo_lancamento (id) on delete restrict on update restrict;
      
drop table if exists vw_despesa_fornecedor;

drop table if exists tb_fornecedor;

/*==============================================================*/
/* Table: tb_fornecedor                                         */
/*==============================================================*/
create table tb_fornecedor
(
   id                   int(11) not null auto_increment,
   nome                 varchar(200),
   descricao            varchar(250),
   data_cadastro        date not null,
   cnpj                 int(11) default NULL,
   telefone             int(11) default NULL,
   email                varchar(200),
   endereco             varchar(100),
   cidade_id            int(11) not null,
   primary key (id)
)
ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6;


/*==============================================================*/
/* Table: vw_despesa_fornecedor                                 */
/*==============================================================*/
drop view vw_despesa_fornecedor;
create view vw_despesa_fornecedor
as
    select 
        d.id,
        d.descricao,
        f.descricao as descricao_fornecedor,
        valor,
        data_despesa,
        fornecedor_id,
        data_pagamento,
        nome,
        email,
        data_cadastro,
        cnpj,
        telefone,
        endereco,
        cidade_id
   from tb_despesa d
   inner join tb_fornecedor f on (d.fornecedor_id = f.id);

