CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `owner` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

# htb-stdnt:Academy_student!
INSERT INTO `users` (`id`, `username`, `description`, `password`) VALUES
(1, 'a', 'This is the user for HackTheBox Academy students.', '$2a$12$f4QYLeB2WH/H1GA/v3M0I.MkOqaDAkCj8vK4oHCvI3xxu7jNhjlJ.'),
(1, 'b', 'This is the user for HackTheBox Academy students.', '$2a$12$f4QYLeB2WH/H1GA/v3M0I.MkOqaDAkCj8vK4oHCvI3xxu7jNhjlJ.');


INSERT INTO `data` (`id`, `owner`, `name`) VALUES
(1, 'a', 'Lorem Ipsuma');
INSERT INTO `data` (`id`, `owner`, `name`) VALUES
(2, 'b', 'Lorem Ipsumb');