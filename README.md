# rent-car-app
Ce repository contient une application de location de voitures développée en PHP 7 avec une base de données MySQL. L'application est conçue pour gérer à la fois les utilisateurs et les administrateurs, offrant des fonctionnalités de location de véhicules, de gestion des réservations, et d'authentification sécurisée.


<h1 align="center">Car Rental Website Project</h1>  

This is a project for a car rental website. It is a project for the College Mini Project.
# Car Rental Website Project

This project is a car rental website developed as part of a college mini project.

## Table of Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database](#database)
- [Admin Features](#admin-features)
- [User Features](#user-features)
- [Authors](#authors)


## Introduction

The car rental website allows users to rent cars and administrators to manage car listings, customer reservations, and bookings.

## Requirements

- XAMPP for running the project locally.
- Basic understanding of PHP, MySQL, and HTML/CSS.

## Installation

1. Install XAMPP.
2. Clone the project to the `htdocs` directory of XAMPP.
3. Start the Apache and MySQL services in XAMPP.
4. Import the SQL database from the `database` folder.
5. Access the project using `localhost` in your web browser.

## Database

- Database: MySQL
- Tables:
  - `voitures`: Manages car details (mark, model, year, availability, etc.).
  - `users`: Stores user information (name, email, etc.).
  - `reservations`: Handles car reservations with user details.

## Admin Features

- **Add/Edit/Delete Cars**:
  - Admins can add new cars, update existing car details, or remove cars from the system.

- **View Customer List**:
  - Admins can see a list of registered customers and their contact information.

- **View Reservations**:
  - Admins can view all reservations made by customers, including details like pickup date, return date, and car details.

- **Delete Reservations**:
  - Admins have the ability to cancel reservations made by customers.

## User Features

- **View Available Cars**:
  - Users can browse the list of available cars.

- **Reserve Cars**:
  - Users can reserve a car by selecting the pickup date and return date.

- **Modify Reservation**:
  - Users can modify their existing reservation by changing the return date.



## Authors

- [Ghayth Bouzayani(#) 

## Support

For any questions or issues, please contact :bouzayanighayth@gmail.com](mailto:bouzayanighayth@gmail.com).
