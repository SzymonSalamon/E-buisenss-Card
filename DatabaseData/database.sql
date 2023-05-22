create table users
(
    id        integer generated always as identity
        constraint id
            primary key,
    email     varchar(100)                                    not null,
    password  varchar(255)                                    not null,
    name      varchar(100)                                    not null,
    surname   varchar(100)                                    not null,
    privilage varchar(10) default 'normal'::character varying not null
);

alter table users
    owner to dbuser;

create table projects
(
    project_id     integer generated always as identity
        constraint project_id
            primary key,
    project_name   varchar(100) not null,
    id_owner       integer      not null
        constraint id_owner
            references users,
    background     varchar(7),
    description    varchar(255),
    skill          varchar(255),
    p_name         varchar(100),
    surname        varchar(100),
    company        varchar(100),
    phone          integer,
    email          varchar(255),
    www            varchar(255),
    location       varchar(255),
    fb_link        varchar(255),
    instagram_link varchar(255),
    linkedin_link  varchar(255),
    logo           varchar(255)
);

alter table projects
    owner to dbuser;

create table users_projects
(
    user_id    integer not null
        constraint users_id
            references users
            on update cascade on delete cascade,
    project_id integer not null
        constraint project_id
            references projects
            on update cascade on delete cascade
);

alter table users_projects
    owner to dbuser;

