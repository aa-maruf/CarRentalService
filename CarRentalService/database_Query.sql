

CREATE TABLE User_Table (

    User_ID INT PRIMARY KEY,

    User_Name VARCHAR(100),

    User_Rating VARCHAR(15),

    User_NID_Info VARCHAR(10),

    User_Email VARCHAR(255) UNIQUE ,

    User_Password VARCHAR(255),

    User_Contact_Number VARCHAR(11),

    User_Emergency_Contact VARCHAR(11),

    User_Gender VARCHAR(10),

    User_Address VARCHAR(255) ,

    User_Profile_Picture VARCHAR(255)
);






CREATE TABLE Car (

    Car_ID INT PRIMARY KEY,

    Car_Rating VARCHAR(15) ,

    Car_Rental_Cost INT ,

    Car_Picture VARCHAR(255),

    Car_Type VARCHAR(20),

    Car_Model VARCHAR(50),

    Car_Number_Plate VARCHAR(20),

    Car_Available_Seats INT,

    Car_Fuel_Type VARCHAR(20),

    Car_Mileage INT,

    Car_Status VARCHAR(20)
);






CREATE TABLE Book (

    Booking_ID INT PRIMARY KEY,

    Amount INT,

    User_ID INT,

    Car_ID INT,

    Booking_Date DATETIME,
    Rent_Start DATETIME,
    Rent_End DATETIME,

    Payment_Status VARCHAR(20),

    CONSTRAINT FK_Book_User FOREIGN KEY (User_ID) REFERENCES [User](User_ID),
    CONSTRAINT FK_Book_Car FOREIGN KEY (Car_ID) REFERENCES Car(Car_ID)
);





CREATE TABLE Driver (

    Driver_ID INT PRIMARY KEY,

    Driver_Name VARCHAR(100) ,

    Driver_Email VARCHAR(255) UNIQUE,

    Driver_Password VARCHAR(255) UNIQUE,

    Driver_NID_Info VARCHAR(10) UNIQUE,

    Driver_Contact_Number VARCHAR(11),

    Driver_Emergency_Number VARCHAR(11),

    Driver_Gender VARCHAR(10) ,

    Driver_Address VARCHAR(255) ,

    Driver_Experience INT,

    Driver_Total_Ride INT,

    Driver_Salary INT DEFAULT 0,


    Driver_Rating VARCHAR(15) ,






    Driver_Profile_Picture VARCHAR(255),



    Driver_License VARCHAR(15)
);





CREATE TABLE Rate (

    Rate_ID INT PRIMARY KEY,

    User_ID INT,

    Driver_ID INT,

    User_Rating VARCHAR(15),

    Driver_Rating VARCHAR(15),

    Comment VARCHAR(255),

    CONSTRAINT FK_Rate_User FOREIGN KEY (User_ID) REFERENCES [User](User_ID),
    CONSTRAINT FK_Rate_Driver FOREIGN KEY (Driver_ID) REFERENCES Driver(Driver_ID)
);





CREATE TABLE Drive (

    Micro BOOLEAN,
    SUV BOOLEAN,
    Pick_Up_Truck BOOLEAN,
    Mini_Bus BOOLEAN,
    Private_Bus BOOLEAN,
    Jeep BOOLEAN,
    Truck BOOLEAN,
    Driver_ID INT
);






