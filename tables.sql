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
    'C',
    'Jessica',
    'Bale',
    'Colombo, Sri Lanka',
    '06500',
    '0112345678',
    'jess@gmail.com',
    'qwe'
  ),
  (
    'C',
    'Jane',
    'Doe',
    'Colombo, Sri Lanka',
    '01500',
    '1234567891',
    'jane@gmail.com',
    'asd'
  ),
  (
    'C',
    'Max',
    'Loe',
    'Colombo, Sri Lanka',
    '01400',
    '1234567891',
    'maxie@gmail.com',
    'rfv'
  ),
  (
    'C',
    'Alex',
    'Bass',
    'Colombo, Sri Lanka',
    '01400',
    '1234567891',
    'bass@gmail.com',
    '9876'
  ),
  (
    'A',
    'Anita',
    'Basil',
    'Colombo, Sri Lanka',
    '01500',
    '9876543210',
    'anita@gmail.com',
    'wer'
  );
CREATE TABLE IF NOT EXISTS tests (
    testId INT(4) NOT NULL AUTO_INCREMENT,
    testName VARCHAR(30) NOT NULL,
    testPicNameSmall VARCHAR(100) NOT NULL,
    testPicNameLarge VARCHAR(100) NOT NULL,
    testDescripShort VARCHAR(1000) NULL,
    testDescripLong VARCHAR(3000) NULL,
    testPrice DECIMAL(6, 2) NOT NULL,
    CONSTRAINT proid_product_pk PRIMARY KEY (testId),
    CONSTRAINT prodname_product_unique UNIQUE (testName)
  );
INSERT INTO `tests` (
    `testName`,
    `testPicNameSmall`,
    `testPicNameLarge`,
    `testDescripShort`,
    `testDescripLong`,
    `testPrice`
  )
VALUES
  (
    'Spelling Test',
    'spelling.jpg',
    'spelling.jpg',
    'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.',
    'Correct spelling says a lot about a person. And it says a lot about you as a jobseeker as well, especially when you are not spelling correctly.',
    '250'
  ),
  (
    'Antonym Test',
    'antonym.jpg',
    'antonym.jpg',
    'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.',
    'Antonym tests are standardized psychometric assessment tests that provide the employing organization with information about a candidate\\\'s knowledge of the English language.',
    '170'
  ),
  (
    'Synoynm Test',
    'synonym.jpg',
    'synonym.jpg',
    'Do these spelling tests and really improve your spelling. These can also help your reading by listening and reading along.',
    'Synonym tests are standardized psychometric assessment tests that provide the employing organization with information about a candidate\\\'s knowledge of the English language.',
    '150'
  );
CREATE TABLE IF NOT EXISTS orders (
    orderNo INT(4) NOT NULL AUTO_INCREMENT,
    userId INT(4) NOT NULL,
    orderDateTime DATETIME NOT NULL,
    orderTotal DECIMAL(8, 2) DEFAULT 0.00,
    CONSTRAINT orderno_orders_pk PRIMARY KEY (orderNo),
    CONSTRAINT userid_orders_fk FOREIGN KEY (userId) REFERENCES users (userId) ON UPDATE CASCADE ON DELETE CASCADE
  );
CREATE TABLE WishList(
    testId int(4) NOT NULL,
    userId int(4) NOT NULL,
    CONSTRAINT wishlist_wid_pk PRIMARY KEY(testId, userId),
    CONSTRAINT wishlist_testid_fk FOREIGN KEY (testId) REFERENCES Tests(testId),
    CONSTRAINT wishlist_userid_fk FOREIGN KEY (userId) REFERENCES Users(userId)
  );
CREATE TABLE Messages(
    msgID INT(10) AUTO_INCREMENT,
    userId INT(4) NOT NULL,
    message VARCHAR(1000),
    state VARCHAR(10) NOT NULL,
    submitTime DateTime NOT NULL,
    CONSTRAINT message_msgid_pk PRIMARY KEY(msgID),
    CONSTRAINT message_userid_fk FOREIGN KEY (userId) REFERENCES Users(userId)
  );