/*	20005760
	16/05/2021
	SQL Script E-commerce
	Adam Ungier */

/* Table creations */

DROP TABLE IF EXISTS Driver;
CREATE TABLE Driver(
	Driverid INT(4) NOT NULL AUTO_INCREMENT,
	Email VARCHAR(20) NOT NULL,
	Password VARCHAR(8) NOT NULL,
	Surname VARCHAR(20) NOT NULL,
	Initials CHAR(2) NULL,
	DateOfBirth DATE NOT NULL,
	PhoneNo VARCHAR(15) NULL,
	Gender CHAR(1) NULL,
	DvlaNo VARCHAR(20) NOT NULL,
	PRIMARY KEY (Driverid)
	)AUTO_INCREMENT=1000;
	
DROP TABLE IF EXISTS Booking;
CREATE TABLE Booking(
	VehicleNo INT(2) NOT NULL,
	BookingDay DATE NOT NULL,
	Driverid INT(4) NOT NULL,
	AccountStatus CHAR(1) NULL,
	CONSTRAINT BookingPK PRIMARY KEY (VehicleNo,BookingDay,Driverid),
	FOREIGN KEY (VehicleNo) REFERENCES Vehicle(VehicleNo),
	FOREIGN KEY (Driverid) REFERENCES Driver(Driverid)
	);
	
DROP TABLE IF EXISTS Vehicle;
CREATE TABLE Vehicle(
	VehicleNo INT(2) NOT NULL AUTO_INCREMENT,
	VehicleReg CHAR(9) NOT NULL,
	MakeModel VARCHAR(25) NOT NULL,
	DailyCost INT(2) NOT NULL,
	PRIMARY KEY (VehicleNo)
	)AUTO_INCREMENT=10;
	
/* Table inserts - examples */

INSERT INTO Driver (Email,Password,Surname,Initials,DateOfBirth,PhoneNo,Gender,DvlaNo)
VALUES ('icars@cars.com','Password','John','JJ','1999/01/01','+447575646464','M','BSEJ38224BG87');

INSERT INTO Vehicle (VehicleReg, MakeModel, DailyCost)
  VALUES ('SY NN GGG','Toyota Rav4', 27),
  ('ST FF HHH','Ford Focus',25),
  ('AA RR ZZZ','Audi A4',20),
 ('BB CC DDD','Vauxhall Insignia',15); 
 
 INSERT INTO Booking (VehicleNo, BookingDay, Driverid, AccountStatus)
 VALUES (11, '2021-06-07' 1000, NULL),
 (11, '2021-06-08', 1000, NULL),
 (11, '2021-06-09', 1000, NULL),
 (11, '2021-06-10', 1000, NULL),
 (11, '2021-06-11', 1000, NULL),
 (11, '2021-06-12', 1000, NULL),
 (11, '2021-06-13', 1000, NULL)
  (11, '2021-06-14', 1000, NULL);


	