insert into school.users (name, email, password)
values ('John', 'john@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Mark', 'mark@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Zoe', 'Zoe@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Cloe', 'cloe@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Petter', 'petter@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Ken', 'ken@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Michael', 'michael@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Louise', 'louise@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Hugo', 'hugo@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Rachel', 'Rachel@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Sean', 'sean@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Adrian', 'adrian@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Ray', 'ray@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Melissa', 'melissa@swiftqueue-school.com', '$2y$10$nE7Vx6V4FoMniSjTwiXNc.RiMBdmZpOa1sbvBeYwrheQE0U5BIfGa'),
       ('Milena', 'milena@swiftqueue-school.com', '$2y$10$XApelCHz0meWz3o8R8iQqOOt.qae80Zvlo8GwjVRvlgR2pQLTmE6y');

insert into school.statuses (id, name)
values (1, 'Open'),
       (2, 'Pending'),
       (3, 'Active'),
       (4, 'Inactive'),
       (5, 'Finished');

insert into school.courses (name, start_date, end_date, status_id)
values ('Build Website Responsive with HTML', '2024-07-08 18:30:00', '2024-07-19 20:30:00', 5),
       ('PHP OOP', '2024-08-12 17:00:00', '2024-09-18 19:00:00', 1),
       ('Laravel 11', '2024-07-29 18:30:00', '2024-08-03 20:30:00', 2),
       ('Bootstrap 5 from Scratch', '2024-07-26 18:00:00', '2024-07-27 20:00:00', 3),
       ('Javascript Full Understanding', '2024-08-06 17:30:00', '2024-08-16 19:00:00', 3),
       ('Angular - The Complete Guider', '2024-07-29 19:00:00', '2024-08-30 21:00:00', 4),
       ('Build Website with CSS', '2024-08-06 17:30:00', '2024-08-10 19:00:00', 3),
       ('Building Scalable APIs', '2024-07-30 19:00:00', '2024-08-31 21:00:00', 2),
       ('Graphic Design Masterclass', '2024-08-09 17:30:00', '2024-10-16 19:00:00', 3),
       ('Learn PHP 8', '2024-07-29 19:00:00', '2024-09-30 21:00:00', 3);
