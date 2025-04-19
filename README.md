## ISD_LAB_Project_CSE_3224

---

# Car Rental Service

## Overview
The **Car Rental Service** is a web-based platform that enables users to rent cars seamlessly. It includes three primary roles:
- **Admin**: Manages users, drivers, and cars.
- **User**: Books cars and manages their reservations.
- **Driver**: Provides transportation services for booked cars.

## Features

### Authentication
- Secure authentication for **Admin, User, and Driver**.

### Admin Panel
- Dashboard to monitor overall system activity.
- Profile editing functionality.
- User and driver management (View, Add, Edit).
- Car management (Add Cars, View Cars).

### User Panel
- Dashboard with easy navigation.
- View booking history.
- Access detailed booking information.
- View full car details.

### Driver Panel
- Dedicated dashboard for managing trips.
- Profile management functionality.

## Future Enhancements
- **Car Tracking**: Users will be able to track their booked cars in real-time.
- **Payment Gateway**: Integration of payment systems for seamless transactions.
- **Payment Receipt**: Automatic generation of payment receipts after booking completion.

## Installation & Setup
1. Clone the repository:
   ```
   git clone https://github.com/aa-maruf/CarRentalService.git
   ```
2. Import the **database_Query.sql** into your database.
3. Configure the database connection in `Connection.php`.
4. Run the project using a local server (e.g., **XAMPP, WAMP, or MAMP**).

## Tech Stack
- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
