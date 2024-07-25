CREATE TABLE `users` (
  `id` integer PRIMARY KEY,
  `name` integer,
  `mobile` varchar(255),
  `password` text
);

CREATE TABLE `articles` (
  `id` integer PRIMARY KEY,
  `text` text,
  `user_id` integer,
  `subset_id` integer,
  `category_id` integer
);

CREATE TABLE `questions` (
  `id` integer PRIMARY KEY,
  `text` text,
  `user_id` integer,
  `subset_id` integer,
  `category_id` integer
);

CREATE TABLE `subsets` (
  `id` integer PRIMARY KEY,
  `name` text,
  `category_id` integer
);

CREATE TABLE `categories` (
  `id` integer PRIMARY KEY,
  `name` text
);

CREATE TABLE `comments` (
  `id` integer PRIMARY KEY,
  `text` text,
  `article_id` integer,
  `question_id` integer,
  `user_id` integer
);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `articles` (`user_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `questions` (`user_id`);

ALTER TABLE `subsets` ADD FOREIGN KEY (`id`) REFERENCES `articles` (`subset_id`);

ALTER TABLE `subsets` ADD FOREIGN KEY (`id`) REFERENCES `questions` (`subset_id`);

ALTER TABLE `categories` ADD FOREIGN KEY (`id`) REFERENCES `questions` (`category_id`);

ALTER TABLE `categories` ADD FOREIGN KEY (`id`) REFERENCES `articles` (`category_id`);

ALTER TABLE `categories` ADD FOREIGN KEY (`id`) REFERENCES `subsets` (`category_id`);

ALTER TABLE `articles` ADD FOREIGN KEY (`id`) REFERENCES `comments` (`article_id`);

ALTER TABLE `questions` ADD FOREIGN KEY (`id`) REFERENCES `comments` (`question_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `comments` (`user_id`);
