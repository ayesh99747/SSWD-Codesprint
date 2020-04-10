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

INSERT INTO `users` (
    `userType`,
    `userFName`,
    `userSName`,
    `userAddress`,
    `userPostCode`,
    `userTelNo`,
    `userEmail`,
    `userPassword`
  )
VALUES
  (
    'Customer',
    'Jessica',
    'Bale',
    'Colombo, Sri Lanka',
    '06500',
    '0112345678',
    'jess@gmail.com',
    'qwe'
  ),
  (
    'Customer',
    'Jane',
    'Doe',
    'Colombo, Sri Lanka',
    '01500',
    '1234567891',
    'jane@gmail.com',
    'asd'
  ),
   (
    'Customer',
    'Max',
    'Loe',
    'Colombo, Sri Lanka',
    '01400',
    '1234567891',
    'maxie@gmail.com',
    'rfv'
  ),
   (
    'Customer',
    'Alex',
    'Bass',
    'Colombo, Sri Lanka',
    '01400',
    '1234567891',
    'bass@gmail.com',
    '9876'
  ),
  (
    'Administrator',
    'Anita',
    'Basil',
    'Colombo, Sri Lanka',
    '01500',
    '9876543210',
    'anita@gmail.com',
    'wer'
  );

CREATE TABLE IF NOT EXISTS product (
  prodId INT(4) NOT NULL AUTO_INCREMENT,
  prodName VARCHAR(30) NOT NULL,
  prodPicNameSmall VARCHAR(100) NOT NULL,
  prodPicNameLarge VARCHAR(100) NOT NULL,
  prodDescripShort VARCHAR(1000) NULL,
  prodDescripLong VARCHAR(3000) NULL,
  prodPrice DECIMAL(6, 2) NOT NULL,
  prodQuantity INT(4) NOT NULL,
  CONSTRAINT proid_product_pk PRIMARY KEY (prodId),
  CONSTRAINT prodname_product_unique UNIQUE (prodName)
);
INSERT INTO `product` (
    `prodName`,
    `prodPicNameSmall`,
    `prodPicNameLarge`,
    `prodDescripShort`,
    `prodDescripLong`,
    `prodPrice`,
    `prodQuantity`
  )
VALUES
  (
    'DE\'LONGHI COFFEE',
    'coffee.jpg',
    'coffee.jpg',
    'Fresh beans and fresh milk personalised by you. Enjoy your coffee your way with Dinamica Plus Bean to Cup from De\'longhi.',
    'It contains a determined quantity of ground coffee and usually encloses an internal filter paper for optimal brewing results. The single-serve coffeemaker technology often allows the choice of cup size and brew strength, and delivers a cup of brewed coffee rapidly, usually at the touch of a button.',
    '250.00',
    10
  ),
  (
    'APPLE WATCH SERIES 3',
    'watch.webp',
    'watch.webp',
    'Apple Watch Series 5 has something for everyone, whether you are training for a marathon or just want to be more active every day.',
    'Apple smart watches allow you to take phone calls, check notifications and navigate on the move. Choose from ceramic, aluminium or stainless steel cases in versatile shades. Need to keep it smart? Monochrome hues fit seamlessly into your working wardrobe. If you\'re packing a lot into your day, rubber wristbands can be worn while exercising to track your fitness.',
    '375.00',
    18
  ),
  (
    'GOOGLE NEST WIFI',
    'speaker.webp',
    'speaker.webp',
    'Google Nest Wi-Fi provides fast, reliable Wi-Fi coverage throughout the home, and keeps buffering at bay. It provides a strong connection in all directions so you can stay online, across all your devices.',
    'Being a scalable solution, you can add additional Google Nest Wi-Fi Points, to ensure you receive great coverage as you move from room to room. Each Nest Wi-fi Point is also a smart speaker with the Google Assistant built-in, so you can get questions answered and control compatible devices with just your voice (internet connection required).

	This pack contains one Google Nest Wi-Fi Router and one Google Nest Wi-Fi Point.',
    '200.00',
    20
  ),
  (
    'PHILI HUE WHITE LED LIGHT',
    'lighting.webp',
    'lighting.webp',
    'Designed with an integrated LED and Hue technology, this powerful light is equipped with a host of innovative features that allow you to take complete control of your home lighting and create the perfect ambience.',
    'The integrated LED within this Flourish ceiling light offers different shades of warm to cool white light, as well as colourful light. You can tune your lights to the perfect shade and brightness for your daily tasks using the four pre-set light recipes: Energise and Concentrate are cool-toned and help to keep you focused, while Read and Relax are warmer tones, ideal for reading and winding down. Multi-coloured light is perfect for a party and allows you to enhance your home decor with accents of colour.',
    '180.00',
    15
  ),
  (
    'HP PAVILION 15-CS2015NA',
    'laptop.webp',
    'laptop.webp',
    'Multitasking feels easy and fast with a high performance Intel Core i3-8145U Processor.',
    'The HP Pavilion 15-cs3009na has been created with a 10th generation Intel Core i5 processor, 8GB RAM and a 15.6” Full HD display. This stylish laptop will be able to assist with all your email, casual gaming, letter writing and work project requirements.',
    '570.00',
    22
  ),
  (
    'RING SMART VIDEO DOORBELL',
    'camera.webp',
    'camera.webp',
    'Ring\'s range of smart video doorbells and security cameras let you monitor your home from anywhere, so you never miss a visitor.',
    'With the upgraded Ring Video Doorbell 2 you can answer the door from anywhere. Get an instant alert to your smart device when anyone presses the doorbell or triggers the built-in motion sensor. With two-way voice interaction you can see, hear and speak to your visitor by using the Ring app on your smart device, while noise cancellation technology improves the quality of the audio signal. The Video Doorbell 2 emits an audible alert outside the home. It can be wired to trigger your existing doorbell, or linked over Wi-Fi to the Ring Chime or Ring Chime Pro (sold separately) to sound an alert within the home.',
    '120.00',
    8
  );

  CREATE TABLE WishList(
prodId int(4) NOT NULL,
userId int(4) NOT NULL,
CONSTRAINT wishlist_wid_pk PRIMARY KEY(prodId, userId),
CONSTRAINT wishlist_prodid_fk FOREIGN KEY (prodId)
    REFERENCES Product(prodId),
CONSTRAINT wishlist_userid_fk FOREIGN KEY (userId)
    REFERENCES Users(userId)
);