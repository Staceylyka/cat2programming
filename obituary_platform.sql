USE obituary_platform;
CREATE TABLE obituaries
(
ID INT NOT NULL AUTO_INCREMENT,
NAME VARCHAR(100) NOT NULL,
DATE_OF_BIRTH DATE,
DATE_OF_DEATH DATE,
CONTEXT TEXT,
AUTHOR VARCHAR(100) NOT NULL,
SUBMISSION_DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
SLUG VARCHAR(255) UNIQUE,
PRIMARY KEY(ID)
);
