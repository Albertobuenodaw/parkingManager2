<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://i.postimg.cc/j2bHvbQh/PARKINGMANAGER-free-file.png" width="400" alt="ParkingManager Logo"></a></p>


## About ParkingManager2

Parking Manager 2 es la continuación de un trabajo de clase que reune las funcionalidades básicas principales de Laravel como un requerimiento de implementación por parte de los alumnos de 2º de DAW

- Control de Versiones de una App
- Control y manejo de una app que usa paradigma MVC
- Acceso y manejo de una base de datos mediante Eloquent ORM
- Creación de vistas y uso de Blade
- Routing y Route Model Binding
- Uso de API para la generación de fuentes de datos en formato JSON
- Autentificación

Con este proyecto se procura practicar y sacar partido de las herramientas de Laravel como framework.

## ¿Qué se pide?

We want to add some functionality to our Parking Manager. We need to link our cars to the user they belong to. For this:

    1.-We need to store the relationship between users and cars.

    2.-Create a migration file for the users table. It must have the name, lastname and email of the user. Look at Laravel’s default migration for the users table and make the necessary changes.


    3.-Update the Eloquent models to have the relationship between the users and their cars. Each car belongs to one user, and the users can have many cars.

        4.-Our website will have the necessary fields in the main form, to allow us to create a new user while we are creating the new car, or to select an existing user from a combo box if we don’t need to create a new user for the car.

    5.-In the results list, we will show the user that each car is related to.

    6.-We will create another page that will allow users to do an advanced search. It will have the following functionalities:

        + look for cars that got into the parking lot at a certain date.

        + look for all the cars of a user.


    7.-Create an API with three endpoints:

        + a)one to list all the users with all the cars each user has. The list 
            has to be alphabetically ordered by the last name.

        + b)one to get the details of a user. The user id will be passed as a url  parameter.

        + c) another one to show the latest 10 cars that got into the parking lot.

    8.-Validate the input from the form to create a new car entry:

        + a) The brand has to be between 3 and 15 letters long.

        + b) The model has to be between 1 and 15 letters long.

        + c) The plate has to have 4 digits and 3 letters


If there’s any error, you have to show a message indicating the error’s description.

You must use a Form Request object and customize the error messages.
