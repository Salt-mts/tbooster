CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `facebook` varchar(255) NULL,
`instagram` varchar(255) NULL,
  `youtube` varchar(255) NULL,
  `twitter` varchar(255) NULL,
  `tiktok` varchar(255) NULL,
  `linkedin` varchar(255) NULL,
  `audiomack` varchar(255) NULL,
  `price` double NULL,
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id) on delete cascade
)


CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `facebook` varchar(255) NULL,
`instagram` varchar(255) NULL,
  `youtube` varchar(255) NULL,
  `twitter` varchar(255) NULL,
  `tiktok` varchar(255) NULL,
  `linkedin` varchar(255) NULL,
  `audiomack` varchar(255) NULL,
  `price` double NULL,
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id) on delete cascade
)

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `playstore` varchar(255) NULL,
`appstore` varchar(255) NULL,
  `price` double NULL,
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id) on delete cascade
)

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `whatsapp` varchar(255) NULL,
  `facebook` varchar(255) NULL,
`telegram` varchar(255) NULL,
  `price` double NULL,
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id) on delete cascade
)

CREATE TABLE `posting` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `link` text(1000),
  `price` double NULL,
  FOREIGN KEY (brand_id) REFERENCES brand(brand_id) on delete cascade
)

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `email` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
`fullname` varchar(255) NULL,
  `bank` varchar(255) NULL,
  `acct_no` varchar(255) NULL,
  `jobpass` varchar(20) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `status` int(11) DEFAULT(1)
)

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `password` varchar(255) NOT NULL,
  `level` int(255) DEFAULT(1)
)

CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `name` varchar(255) NOT NULL,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `logo` varchar(255) DEFAULT('default.png'),
  `brand_type` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `status` int(11) DEFAULT(0),
  `date_added` varchar(255) NOT NULL
)

CREATE TABLE `completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `user_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `brand_type` varchar(255) NOT NULL,
  `price` double NULL,
  `status` int(11) DEFAULT(0),
  `is_paid` int(11) DEFAULT(0),
  `date_added` varchar(255) NOT NULL
)


CREATE TABLE `jobpass` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `owner` varchar(255) NOT NULL,
  `pass` varchar(255) UNIQUE NOT NULL,
  `date_added` varchar(255) NOT NULL
)