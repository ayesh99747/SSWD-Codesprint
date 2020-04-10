CREATE DATABASE codesprint;

CREATE TABLE Users(
userId int(4) AUTO_INCREMENT,
userType varchar(1) NOT NULL,
userFName varchar(50) NOT NULL,
userSName varchar(50) NOT NULL,
userAddress varchar(50) NOT NULL,
userPostCode varchar(50) NOT NULL,
userTelNo varchar(50) NOT NULL,
userEmail varchar(50) NOT NULL,
userPassword varchar(50) NOT NULL,
CONSTRAINT user_userid_pk PRIMARY KEY(userId)
);