-- This SQL script creates a database for the Moffat Bay lodge reservation system.
CREATE DATABASE LodgeReservation;

USE LodgeReservation;

-- User Table
CREATE TABLE User (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- RoomType Table
CREATE TABLE RoomType (
    typeID INT AUTO_INCREMENT PRIMARY KEY,
    typeName VARCHAR(50) NOT NULL,
    description TEXT,
    amenities TEXT,
    maxOccupancy INT NOT NULL CHECK (maxOccupancy > 0),
    dailyRate DECIMAL(10,2) NOT NULL CHECK (dailyRate >= 0)
);

-- Room Table
CREATE TABLE Room (
    roomNumber INT PRIMARY KEY,
    roomType INT NOT NULL,
    FOREIGN KEY (roomType) REFERENCES RoomType(typeID) ON DELETE CASCADE
);

-- Reservation Table
CREATE TABLE Reservation (
    reservationID INT AUTO_INCREMENT PRIMARY KEY,
    user INT NOT NULL,
    roomNumber INT NOT NULL,
    checkin DATE NOT NULL,
    checkout DATE NOT NULL,
    numberGuests INT NOT NULL CHECK (numberGuests > 0),
    discount DECIMAL(5,2) DEFAULT 0 CHECK (discount >= 0),
    amountPaid DECIMAL(10,2) NOT NULL CHECK (amountPaid >= 0),
    FOREIGN KEY (user) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (roomNumber) REFERENCES Room(roomNumber) ON DELETE CASCADE
);