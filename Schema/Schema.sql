DROP DATABASE MOVIEPASSDB;

CREATE DATABASE MOVIEPASSDB;

USE MOVIEPASSDB;

create table Countries (
    IdCountry int AUTO_INCREMENT,
    CountryName varchar(50) not null UNIQUE,
    CountryCode varchar(10) not null UNIQUE,
    constraint Pk_Countries primary key (IdCountry)
);

create table States (
    IdState int AUTO_INCREMENT,
    StateName varchar(50) not null,
    IdCountry int not null,
    constraint Pk_States primary key (IdState),
    constraint Fk_Country foreign key (IdCountry)
        references Countries (IdCountry)
);

create table Cities (
    IdCity int AUTO_INCREMENT,
    CityName varchar(50) not null,
    ZipCode int not null,
    IdState int not null,
    constraint Pk_Cities primary key (IdCity),
    constraint Fk_State foreign key (IdState)
        references States (IdState)
);

create table Addresses (
    IdAddress int AUTO_INCREMENT,
    Street varchar(100) not null,
    NumberStreet int not null,
    Department varchar(10),
    DepartmentFloor SmallInt,
    IdCity int not null,
    constraint Pk_Addresses primary key (IdAddress),
    constraint Fk_Cities foreign key (IdCity)
        references Cities (IdCity)
);

create table Cinemas (
    IdCinema int AUTO_INCREMENT,
    CinemaName varchar(50) not null,
    IdAddress int not null,
    constraint Pk_Cinema primary key (IdCinema),
    constraint Fk_Address foreign key (IdAddress)
        references Addresses (IdAddress)
);

create table NonWorkDays (
    IdNonWorkDay int AUTO_INCREMENT,
    DateNonWorkDay date not null,
    Reason varchar(300) not null,
    constraint Pk_NonWorkDays primary key (IdNonWorkDay)
);

create table NonWorkDaysXCinemas (
    IdNonWorkDay int not null,
    IdCinema int not null,
    constraint Pk_NonWorkDaysXCinemas primary key (IdNonWorkDay , IdCinema),
    constraint Fk_NonWorkDays foreign key (IdNonWorkDay)
        references NonWorkDays (IdNonWorkDay),
    constraint Fk_Cinema foreign key (IdCinema)
        references Cinemas (IdCinema)
);

create table Clasifications (
    IdClasification int AUTO_INCREMENT,
    ClasificationCode varchar(20),
    Description varchar(200),
    constraint Pk_Clasifications primary key (IdClasification)
);

create table Directors (
    IdDirector int,
    DirectorName varchar(50) not null,
    BirthDate date not null,
    IdCountry int not null,
    constraint Pk_Directors primary key (IdDirector),
    constraint Fk_Country foreign key (IdCountry)
        references Countries (IdCountry)
);

create table Genres (
    IdGenre int AUTO_INCREMENT,
    GenreName varchar(50) not null,
    constraint Pk_Genres primary key (IdGenre)
);

create table MoviesXGenre (
    IdMovie int,
    IdGenre int,
    constraint Pk_MoviesXGenre primary key (IdMovie , IdGenre),
    constraint Fk_Movie foreign key (IdMovie)
        references Movies (IdMovie),
    constraint Fk_Genre foreign key (IdGenre)
        references Genres (IdGenre)
);

create table Actors (
    IdActor int AUTO_INCREMENT,
    ActorFirstName varchar(30) not null,
    ActorLastName varchar(30) not null,
    BirthDate Date,
    Photo text,
    IdCountry int,
    IdGender int not null,
    constraint Pk_Actors primary key (IdActor),
    constraint Fk_Country foreign key (IdCountry)
        references Countries (IdCountry),
    constraint Fk_Gender foreign key (IdGender)
        references Genders (IdGender)
);

create table MoviesXActor (
    IdMovie int,
    IdActor int,
    constraint Pk_MoviesXActor primary key (IdMovie , IdActor),
    constraint Fk_Movie foreign key (IdMovie)
        references Movies (IdMovie),
    constraint Fk_Actor foreign key (IdActor)
        references Actors (IdActor)
);

create table Movies (
    IdMovie int AUTO_INCREMENT,
    IdMovieIMDB int,
    MovieName varchar(250) not null,
    /*Duration time,
    Synopsis varchar(800),*/
    ReleaseDate date,
    Photo varchar(200) DEFAULT null,
    /*IdDirector int not null,
    IdCountry int,
    Earnings decimal(15 , 2 ),
    Budget decimal(15 , 2 ),
    IdClasification int,
    IsPlaying boolean,*/
    constraint Pk_Movies primary key (IdMovie)
   /* constraint Fk_Director foreign key (IdDirector)
        references Directors (IdDirector),
    constraint Fk_Country foreign key (IdCountry)
        references Countries (IdCountry),
    constraint Fk_Clasification foreign key (IdClasification)
        references Clasifications (IdClasification)*/
);

create table Rooms (
    IdRoom int AUTO_INCREMENT,
    RoomNumber int not null,
    CinemaId int NOT NULL,
    constraint PK_Rooms primary key (IdRoom),
    constraint Fk_Cinema foreign key (CinemaId)
        references Cinemas (IdCinema)
);

create table Users (
    IdUser int AUTO_INCREMENT,
    UserName varchar(50) not null,
    Email varchar(50) not null UNIQUE,
    UserPassword varchar(50) not null,
    IdAddress int not null,
    IdGender int not null,
    Birthdate date,
	IsAdmin bit,
	ChangedPassword bit,
    constraint Pk_Users primary key (IdUser),
    constraint Fk_Address foreign key (IdAddress)
        references Addresses (IdAddress),
    constraint Fk_Gender foreign key (IdGender)
        references Genders (IdGender)
);

/*Agregarle check para que solo acepte 2d y 3d*/
create table Dimensions (
    IdDimension int AUTO_INCREMENT,
    DimensionDescrip varchar(50) not null UNIQUE,
    constraint Pk_Dimensions primary key (IdDimension),
    constraint Chk_Dimension check (DimensionDescrip = '3D'
        OR DimensionDescrip = '2D')
);

create table Languages (
    IdLanguage int AUTO_INCREMENT,
    CodLanguage varchar(10) not null UNIQUE,
    Description varchar(50) not null UNIQUE,
    constraint Pk_Languages primary key (IdLanguage)
);

create table Screenings (
    IdScreening int AUTO_INCREMENT,
    IdMovie int not null,
    StartDate datetime not null,
    IdRoom int not null,
    IdSubsLanguage int,
    IdAudioLanguage int not null,
    IdDimension int not null,
    constraint Pk_Screenings primary key (IdScreening),
    constraint Fk_Movie foreign key (IdMovie)
        references Movies (IdMovie),
    constraint Fk_Room foreign key (IdRoom)
        references Rooms (IdRoom),
    constraint Fk_SubLanguage foreign key (IdSubsLanguage)
        references Languages (IdLanguage),
    constraint Fk_AudioLanguage foreign key (IdAudioLanguage)
        references Languages (IdLanguage),
    constraint Fk_Dimension foreign key (IdDimension)
        references Dimensions (IdDimension)
);

create table Seats (
    IdRoom int,
    SeatRow int,
    SeatCol int,
    constraint Pk_Seats primary key (IdRoom , SeatRow , SeatCol),
    constraint Fk_Room foreign key (IdRoom)
        references Rooms (IdRoom)
);

create table Orders (
    IdOrder int AUTO_INCREMENT,
    SubTotal decimal(10 , 2 ),
    Total decimal(10 , 2 ),
    DatePurchase datetime not null,
    Discount decimal(6 , 2 ),
    IdUser int not null,
    IdScreening int not null,
    constraint Pk_Orders primary key (IdOrder),
    constraint Fk_User foreign key (IdUser)
        references Users (IdUser),
    constraint Fk_Screening foreign key (IdScreening)
        references Screenings (IdScreening)
);

create table Combos (
    IdCombo int AUTO_INCREMENT,
    ComboName varchar(50) not null UNIQUE,
    Price decimal(10 , 2 ),
    Description varchar(500),
    IdOrder int not null,
    constraint Pk_Combos primary key (IdCombo),
    constraint Fk_Order foreign key (IdOrder)
        references Orders (IdOrder)
);

create table ItemsCombo (
    IdItem int AUTO_INCREMENT,
    ItemName varchar(50) not null UNIQUE,
    Photo text,
    IdCombo int not null,
    constraint Pk_ItemsCombo primary key (IdItem),
    constraint Fk_Combo foreign key (IdCombo)
        references Combos (IdCombo)
);

/*Resolver si las foreign keys que apuntan a Seats van a terminar siendo asi*/
create table Tickets (
    IdTicket int AUTO_INCREMENT,
    Price decimal(10 , 2 ) not null,
    IdRoom int not null,
    IdSeatRow int not null,
    IdSeatCol int not null,
    IdOrder int not null,
    constraint Pk_Tickets primary key (IdTicket),
    constraint Fk_TicketRoom foreign key (IdRoom)
        references Seats (IdRoom),
    constraint Fk_TicketSeatRow foreign key (IdSeatRow)
        references Seats (SeatRow),
    constraint Fk_Ticket foreign key (IdSeatCol)
        references Seats (SeatCol),
    constraint Fk_Order foreign key (IdOrder)
        references Orders (IdOrder)
);