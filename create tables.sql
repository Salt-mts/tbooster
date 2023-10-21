CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `facebook` varchar(255) NULL,
`instagram` varchar(255) NULL,
  `youtube` varchar(255) NULL,
  `twitter` varchar(255) NULL,
  `tiktok` varchar(255) NULL,
  `linkedin` varchar(255) NULL,
  `audiomack` varchar(255) NULL
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
  `audiomack` varchar(255) NULL
)

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `playstore` varchar(255) NULL,
`appstore` varchar(255) NULL
)

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `whatsapp` varchar(255) NULL,
  `facebook` varchar(255) NULL,
`telegram` varchar(255) NULL
)

CREATE TABLE `posting` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `link` text(1000) NULL
)

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `email` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
`fullname` varchar(255) NULL,
  `bank` varchar(255) NULL,
  `acct_no` varchar(255) NULL,
  `date_added` varchar(255) NOT NULL,
  `status` varchar(255) NULL
)

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT(1)
)

CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT KEY,
  `name` varchar(255) NOT NULL
  `brand_id` varchar(255) UNIQUE NOT NULL,
  `logo` varchar(255) DEFAULT('default.png'),
  `status` varchar(255) DEFAULT(0),
  `date_added` varchar(255) NOT NULL
)