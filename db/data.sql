insert into school.users (name, email, password)
values
    ('Melissa','melissa@email.com', '123456'),
    ('Milena', 'mile@email.com', 'secret');

insert into school.statuses (id, name)
values
    (1, 'Open'),
    (2, 'Active'),
    (3, 'Finished');

insert into school.courses (name, start_date, end_date, status_id)
values
    ('PHP OOP', '12/08/2024', '18/09/2024', 1),
    ('Laravel', '22/07/2024', '15/10/2024', 2);

