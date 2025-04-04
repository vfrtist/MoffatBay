USE LodgeReservation;
-- 'Deluxe King' sleeps 3
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
    );
-- 'Deluxe Queen' sleeps 4
INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Deluxe Queen',
        'Relax in the beautiful views and sounds of nature with large pane windows. Featuring a two queen-sized beds, you''ll wake up refreshed and ready to relax or explore the mountain side',
        'Queen sized beds, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Iron and ironing board, Desk, Extended seating area',
        4,
        145
    );
-- 'Lagoon King' sleeps 3
INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Lagoon King',
        'Elevate your getaway with a room blending the comfort and style in the Lagoon King. A personal balcony overlooks our award winning lagoon pool, where you can wake up with coffee or unwind with a cocktail.',
        'King sized bed, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Mini bar, Outdoor seating, Iron and ironing board, Desk, Extended seating area',
        3,
        182
    );
-- 'Lagoon Queen' sleeps 4
INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Lagoon Queen',
        'Elevate your getaway with a room blending the comfort and style in the Lagoon King. A personal balcony overlooks our award winning lagoon pool, where you can wake up with coffee or unwind with a cocktail.',
        'Queen sized beds, Complimentary Wi-Fi, Flat-screen TV, Mini-fridge, Coffee maker, Mini bar, Outdoor seating, Iron and ironing board, Desk, Extended seating area',
        4,
        194
    );
-- 'Luxury King' sleeps 3
INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Luxury King',
        'Indulge in the ultimate mountain escape with our Luxury King room. This elegant suite offers sophisticated decor, a spacious balcony overlook, and truly decadent accomodations for you to enjoy.',
        'King sized bed, Luxury linens, Complimentary Wi-Fi, Large Flat-screen TV, Mini-fridge, Mini bar, Outdoor seating, Espresso station, Coffee maker, Iron and ironing Board, Desk, Private bath, Bathrobe and slippers',
        3,
        228
    );
-- 'Luxury Queen' sleeps 4
INSERT INTO RoomType (
        typeName,
        description,
        amenities,
        maxOccupancy,
        dailyRate
    )
VALUES (
        'Luxury Queen',
        'Indulge in the ultimate mountain escape with our Luxury Queen room. This elegant suite offers sophisticated decor, a spacious balcony overlook, and truly decadent accomodations for you to enjoy.',
        'Queen sized beds, Luxury linens, Complimentary Wi-Fi, Large Flat-screen TV, Mini-fridge, Mini bar, Outdoor seating, Espresso station, Coffee maker, Iron and ironing Board, Desk, Private bath, Bathrobe and slippers',
        4,
        240
    );
INSERT INTO Room (roomNumber, roomType)
VALUES (101, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (103, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (105, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (107, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (109, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (102, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (104, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (106, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (108, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (110, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (111, 3);
INSERT INTO Room (roomNumber, roomType)
VALUES (113, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (115, 3);
INSERT INTO Room (roomNumber, roomType)
VALUES (117, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (119, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (112, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (114, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (116, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (118, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (120, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (201, 6);
INSERT INTO Room (roomNumber, roomType)
VALUES (203, 5);
INSERT INTO Room (roomNumber, roomType)
VALUES (205, 6);
INSERT INTO Room (roomNumber, roomType)
VALUES (207, 5);
INSERT INTO Room (roomNumber, roomType)
VALUES (209, 6);
INSERT INTO Room (roomNumber, roomType)
VALUES (202, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (204, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (206, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (208, 1);
INSERT INTO Room (roomNumber, roomType)
VALUES (210, 2);
INSERT INTO Room (roomNumber, roomType)
VALUES (211, 3);
INSERT INTO Room (roomNumber, roomType)
VALUES (213, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (215, 3);
INSERT INTO Room (roomNumber, roomType)
VALUES (217, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (219, 4);
INSERT INTO Room (roomNumber, roomType)
VALUES (212, 6);
INSERT INTO Room (roomNumber, roomType)
VALUES (214, 6);
INSERT INTO Room (roomNumber, roomType)
VALUES (216, 5);
INSERT INTO Room (roomNumber, roomType)
VALUES (218, 5);
INSERT INTO Room (roomNumber, roomType)
VALUES (220, 5);