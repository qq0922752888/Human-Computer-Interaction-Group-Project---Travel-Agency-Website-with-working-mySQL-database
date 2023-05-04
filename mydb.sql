
DROP DATABASE IF EXISTS db_4474;
CREATE DATABASE db_4474;
USE db_4474;


CREATE TABLE Account_info (
  username VARCHAR(50) NOT NULL,
  user_id INT NOT NULL AUTO_INCREMENT,
  password VARCHAR(30),
  fname VARCHAR(20),
  lname VARCHAR(20),
  PRIMARY KEY (user_id,username)

);

CREATE TABLE User_info (
    Postal VARCHAR(7) NOT NULL,
    user_id INT NOT NULL,
    Street_name VARCHAR(30),
    City VARCHAR(50),
    Prov VARCHAR(2),
    Country VARCHAR(50),
    birthday DATE,
    Phone VARCHAR(20),
    email VARCHAR(50),
    PRIMARY KEY (user_id,Postal),
    FOREIGN KEY (user_id) REFERENCES Account_info(user_id)
    
);

CREATE TABLE Credit_card (
    user_id INT NOT NULL,
    CreditNum VARCHAR(16) NOT NULL,
    expiry VARCHAR(5),
    CVV VARCHAR(3),
    fname VARCHAR(50),
    lname VARCHAR(50),
    PRIMARY KEY (user_id, CreditNum),
    FOREIGN KEY (user_id) REFERENCES Account_info(user_id)
);


CREATE TABLE Trips (
    trip_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    trip_name VARCHAR(50) ,
    country_of_trip VARCHAR(30),
    duration INT,
    myDate DATE ,
    ticket_price FLOAT(10,2) 
);


CREATE TABLE Travelled_trip (booking_num INT NOT NULL,user_id INT NOT NULL,trip_id INT NOT NULL,myDate DATE ,Cost FLOAT,PRIMARY KEY (trip_id,user_id,booking_num),FOREIGN KEY (user_id) REFERENCES Account_info(user_id),FOREIGN KEY (trip_id) REFERENCES Trips(trip_id));

select * from Account_info;
select * from User_info;
select * from Trips;
select * from Travelled_trip;
