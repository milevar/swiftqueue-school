insert into school.users (name, email, password)
values
    ('Melissa','melissa@swiftqueue-school.com', '$2a$10$0FHEQ5/cplO3eEKillHvh.y009Wsf4WCKvQHsZntLamTUToIBe.fG'),
    ('Milena', 'milena@swiftqueue-school.com', '$2a$10$0FHEQ5/cplO3eEKillHvh.y009Wsf4WCKvQHsZntLamTUToIBe.fG');

insert into school.statuses (id, name)
values
    (1, 'Open'),
    (2, 'Pending'),
    (3, 'Active'),
    (4, 'Inactive'),
    (5, 'Finished');

insert into school.courses (name, start_date, end_date, status_id)
values
    ('Build Website Responsive with HTML', '2024-07-08 18:30:00', '2024-07-19 20:30:00', 5),
    ('PHP OOP', '2024-08-12 17:00:00', '2024-09-18 19:00:00', 1),
    ('Laravel 11', '2024-07-29 18:30:00', '2024-08-03 20:30:00', 2),
    ('Bootstrap 5 from Scratch', '2024-07-26 18:00:00', '2024-07-27 20:00:00', 3),
    ('Javascript Full Understanding', '2024-08-06 17:30:00', '2024-08-16 19:00:00', 3),
    ('Angular - The Complete Guider', '2024-07-29 19:00:00', '2024-08-30 21:00:00', 4);

