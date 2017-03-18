/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  15/02/2017 12:01:15                      */
/*==============================================================*/


drop table if exists CARTE;

drop table if exists CONTIENT;

drop table if exists INVITER;

drop table if exists JOUEUR;

drop table if exists MAIN;

drop table if exists PARTICIPE;

drop table if exists PARTIE;

drop table if exists POSERPILE;

/*==============================================================*/
/* Table : CARTE                                                */
/*==============================================================*/
create table CARTE
(
   NUMERO               int not null,
   POINT                int not null,
   primary key (NUMERO)
);

/*==============================================================*/
/* Table : CONTIENT                                             */
/*==============================================================*/
create table CONTIENT
(
   IDMAIN               int not null,
   NUMERO               int not null,
   primary key (IDMAIN, NUMERO)
);

/*==============================================================*/
/* Table : INVITER                                              */
/*==============================================================*/
create table INVITER
(
   IDPARTIE             int not null,
   IDJOUEUR             int not null,
   primary key (IDPARTIE, IDJOUEUR)
);

/*==============================================================*/
/* Table : JOUEUR                                               */
/*==============================================================*/
create table JOUEUR
(
   PSEUDO               varchar(20) not null,
   MDP                  varchar(20) not null,
   ADRESSEMAIL          varchar(20) not null,
   NBRPARTIEJOUEE       int(6),
   NBRPARTIEGAGNEE      int(6),
   IDJOUEUR             int(9) not null auto_increment,
   primary key (IDJOUEUR)
);

/*==============================================================*/
/* Table : MAIN                                                 */
/*==============================================================*/
create table MAIN
(
   IDMAIN               int(8) not null,
   IDJOUEUR             int(9) not null,
   IDPARTIE             int not null,
   primary key (IDMAIN)
);

/*==============================================================*/
/* Table : PARTICIPE                                            */
/*==============================================================*/
create table PARTICIPE
(
   IDJOUEUR             int not null,
   IDPARTIE             int not null,
   SCORE                decimal(8) not null,
   primary key (IDJOUEUR, IDPARTIE)
);

/*==============================================================*/
/* Table : PARTIE                                               */
/*==============================================================*/
create table PARTIE
(
   IDPARTIE             int(9) not null auto_increment,
   IDJOUEUR             int(9) not null,
   PUBLIQUE             bool not null,
   ENCOURS              bool not null,
   NOMPARTIE            varchar(30),
   primary key (IDPARTIE)
);

/*==============================================================*/
/* Table : POSERPILE                                            */
/*==============================================================*/
create table POSERPILE
(
   NUMERO               int not null,
   IDPARTIE             int not null,
   COLONNE              decimal(1) not null,
   primary key (NUMERO, IDPARTIE)
);

alter table CONTIENT add constraint FK_CONTIENT foreign key (IDMAIN)
      references MAIN (IDMAIN) on delete restrict on update cascade;

alter table CONTIENT add constraint FK_CONTIENT2 foreign key (NUMERO)
      references CARTE (NUMERO) on delete restrict on update cascade;

alter table INVITER add constraint FK_INVITER foreign key (IDPARTIE)
      references PARTIE (IDPARTIE) on delete restrict on update cascade;

alter table INVITER add constraint FK_INVITER2 foreign key (IDJOUEUR)
      references JOUEUR (IDJOUEUR) on delete restrict on update cascade;

alter table MAIN add constraint FK_APPARTIENT foreign key (IDPARTIE)
      references PARTIE (IDPARTIE) on delete restrict on update cascade;

alter table MAIN add constraint FK_POSSEDE foreign key (IDJOUEUR)
      references JOUEUR (IDJOUEUR) on delete restrict on update cascade;

alter table PARTICIPE add constraint FK_PARTICIPE foreign key (IDJOUEUR)
      references JOUEUR (IDJOUEUR) on delete restrict on update cascade;

alter table PARTICIPE add constraint FK_PARTICIPE2 foreign key (IDPARTIE)
      references PARTIE (IDPARTIE) on delete restrict on update cascade;

alter table PARTIE add constraint FK_CREER foreign key (IDJOUEUR)
      references JOUEUR (IDJOUEUR) on delete restrict on update cascade;

alter table POSERPILE add constraint FK_POSERPILE foreign key (NUMERO)
      references CARTE (NUMERO) on delete restrict on update cascade;

alter table POSERPILE add constraint FK_POSERPILE2 foreign key (IDPARTIE)
      references PARTIE (IDPARTIE) on delete restrict on update cascade;

