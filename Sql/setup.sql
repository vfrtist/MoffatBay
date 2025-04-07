DROP DATABASE IF EXISTS LodgeReservation;
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
    dailyRate DECIMAL(10, 2) NOT NULL CHECK (dailyRate >= 0)
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
    discount DECIMAL(5, 2) DEFAULT 0 CHECK (discount >= 0),
    amountPaid DECIMAL(10, 2) NOT NULL CHECK (amountPaid >= 0),
    FOREIGN KEY (user) REFERENCES User(userID) ON DELETE CASCADE,
    FOREIGN KEY (roomNumber) REFERENCES Room(roomNumber) ON DELETE CASCADE
);

INSERT INTO User(firstName, lastName, email, password)
VALUES (
        "Alan",
        "Smithee",
        "asmithee@mailinator.com",
        "$2y$10$dcxEJHPIqKJk/1LaxY8Kz.6J7mL7zOiKtpV9viOj8tnxproLj/HBq"
    ),
    (
        "Bob",
        "Jones",
        "bjones@mailpro.live",
        "$2y$10$Qfqb5JXXI8XnT3/l2wBAjOc.5yDzMuz7bsZLZSKMq986SvwjTz9Y."
    ),
    (
        "Alex",
        "North",
        "northman@example.com",
        "$2y$10$Wig7qFFBfJl52QZX0DrYaef5SXUWgfy.wvvmsWDqV0.KQ1HNKpm8i"
    );

INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Deluxe King',
        'Relax in the beautiful views and sounds of nature with large pane windows. Featuring a plush king-sized bed, you''ll wake up refreshed and ready to relax or explore the mountain side',
        'King sized bed, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Iron and ironing board, Desk, Extended seating area',
        3,
        135
    ),
    (
        'Deluxe Queen',
        'Relax in the beautiful views and sounds of nature with large pane windows. Featuring a two queen-sized beds, you''ll wake up refreshed and ready to relax or explore the mountain side',
        'Queen sized beds, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Iron and ironing board, Desk, Extended seating area',
        4,
        145
    ),
    (
        'Lagoon King',
        'Elevate your getaway with a room blending the comfort and style in the Lagoon King. A personal balcony overlooks our award winning lagoon pool, where you can wake up with coffee or unwind with a cocktail.',
        'King sized bed, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Mini bar, Outdoor seating, Iron and ironing board, Desk, Extended seating area',
        3,
        182
    ),
    (
        'Lagoon Queen',
        'Elevate your getaway with a room blending the comfort and style in the Lagoon King. A personal balcony overlooks our award winning lagoon pool, where you can wake up with coffee or unwind with a cocktail.',
        'Queen sized beds, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Mini bar, Outdoor seating, Iron and ironing board, Desk, Extended seating area',
        4,
        194
    ),
    (
        'Luxury King',
        'Indulge in the ultimate mountain escape with our Luxury King room. This elegant suite offers sophisticated decor, a spacious balcony overlook, and truly decadent accomodations for you to enjoy.',
        'King sized bed, Luxury linens, Complimentary Wi-Fi, Large Flat-screen TV, Mini-fridge, Mini bar, Outdoor seating, Espresso station, Coffee maker, Iron and ironing Board, Desk, Private bath, Bathrobe and slippers',
        3,
        228
    ),
    (
        'Luxury Queen',
        'Indulge in the ultimate mountain escape with our Luxury Queen room. This elegant suite offers sophisticated decor, a spacious balcony overlook, and truly decadent accomodations for you to enjoy.',
        'Queen sized beds, Luxury linens, Complimentary Wi-Fi, Large Flat-screen TV, Mini-fridge, Mini bar, Outdoor seating, Espresso station, Coffee maker, Iron and ironing Board, Desk, Private bath, Bathrobe and slippers',
        4,
        240
    );
-- Rooms
INSERT INTO Room (roomNumber, roomType)
VALUES (101, 1),
    (103, 1),
    (105, 1),
    (107, 1),
    (109, 1),
    (102, 2),
    (104, 2),
    (106, 2),
    (108, 2),
    (110, 2),
    (111, 3),
    (113, 4),
    (115, 3),
    (117, 4),
    (119, 4),
    (112, 1),
    (114, 1),
    (116, 1),
    (118, 1),
    (120, 1),
    (201, 6),
    (203, 5),
    (205, 6),
    (207, 5),
    (209, 6),
    (202, 2),
    (204, 1),
    (206, 2),
    (208, 1),
    (210, 2),
    (211, 3),
    (213, 4),
    (215, 3),
    (217, 4),
    (219, 4),
    (212, 6),
    (214, 6),
    (216, 5),
    (218, 5),
    (220, 5);
-- Reservations
INSERT INTO Reservation (
        user,
        roomNumber,
        checkin,
        checkout,
        numberGuests,
        discount,
        amountPaid
    )
VALUES (
        1,
        101,
        '2025-04-10',
        '2025-04-15',
        2,
        10.00,
        450.00
    ),
    (
        2,
        102,
        '2025-04-12',
        '2025-04-14',
        1,
        0.00,
        200.00
    ),
    (
        3,
        103,
        '2025-04-11',
        '2025-04-16',
        3,
        5.00,
        600.00
    );