DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Options;
DROP TABLE IF EXISTS Gallery;
DROP TABLE IF EXISTS Creation;
DROP TABLE IF EXISTS GalleryCreations;
DROP TABLE IF EXISTS Contact;

CREATE TABLE Users(
    Id INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role INT NOT NULL DEFAULT 3,
    PRIMARY KEY (Id)
);

CREATE TABLE Options(
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Value VARCHAR(255) NOT NULL,
    PRIMARY KEY (Id)
);

CREATE TABLE Gallery(
    Id INT NOT NULL AUTO_INCREMENT,
    Title VARCHAR(150) NOT NULL,
    Description VARCHAR(255),
    PRIMARY KEY (Id)
);

CREATE TABLE Creation(
    Id INT NOT NULL AUTO_INCREMENT,
    Url VARCHAR(255) NOT NULL,
    IdGallery INT NOT NULL,
    IsFrontPage BOOLEAN NOT NULL,
    DateAdded DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (Id)
);

CREATE TABLE Contact(
    Id INT NOT NULL AUTO_INCREMENT,
    IdUser INT,
    Type INT NOT NULL,
    Value VARCHAR(255) NOT NULL,
    Alias VARCHAR(255),
    Note VARCHAR(255),
    PRIMARY KEY (Id, IdUser)
);

CREATE TABLE Tag(
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    IdGallery INT NOT NULL,
    PRIMARY KEY (Id)
);

CREATE TABLE Notification(
    Id INT NOT NULL AUTO_INCREMENT,
    Value VARCHAR(255),
    Date DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY (Id)
);

ALTER TABLE Contact ADD FOREIGN KEY (IdUser) REFERENCES Users(Id);
ALTER TABLE GalleryCreations ADD FOREIGN KEY (IdGallery) REFERENCES Gallery(Id);
ALTER TABLE GalleryCreations ADD FOREIGN KEY (IdCreation) REFERENCES Creation(Id);
/*ALTER TABLE Gallery ADD FOREIGN KEY (Id) REFERENCES Tag(IdGallery);*/

/******************************
******** DOCUMENTATION ********
*******************************
    Contact
        1 = LinkedIn
        2 = Twitter
        3 = Facebook
        4 = Email
        5 = Phone
        6 = Snapchat
        7 = ArtStation

    Options
        Titre du site :
        site_title | [value]

        Description du site :
        site_description | [value]

        Slogan du site :
        site_tagline

        Image en background :
        site_background_url
        
        URL du site :
        site_url | [value]

        Si le site est en construction :
        construction_mode | [value]

        Si l'administrateur veut afficher une vidéo Youtube en front page :
        youtubevideo_id | [value]

    Users
        Role : smaller is better; 1 = admin