CREATE TABLE `bills` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `payment` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `bill_detail` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_bill` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_food` int(11) DEFAULT NULL,
  `id_vacxin` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `customer` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `food` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `jobs` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_food` int(11) NOT NULL,
  `id_vacxin` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `pets` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_typepet` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `products` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_typeproduct` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `role` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL
);

CREATE TABLE `type_pet` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_role` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `vacxins` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_pet` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

ALTER TABLE `users` ADD FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

ALTER TABLE `vacxins` ADD FOREIGN KEY (`id_pet`) REFERENCES `pets` (`id`);

ALTER TABLE `jobs` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `products` ADD FOREIGN KEY (`id_typeproduct`) REFERENCES `type_pet` (`id`);

ALTER TABLE `jobs` ADD FOREIGN KEY (`id_food`) REFERENCES `food` (`id`);

ALTER TABLE `jobs` ADD FOREIGN KEY (`id_vacxin`) REFERENCES `vacxins` (`id`);

ALTER TABLE `bills` ADD FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

ALTER TABLE `bill_detail` ADD FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`);

ALTER TABLE `pets` ADD FOREIGN KEY (`id_typepet`) REFERENCES `type_pet` (`id`);

ALTER TABLE `bill_detail` ADD FOREIGN KEY (`id_vacxin`) REFERENCES `vacxins` (`id`);

ALTER TABLE `bill_detail` ADD FOREIGN KEY (`id_food`) REFERENCES `food` (`id`);

ALTER TABLE `bill_detail` ADD FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
