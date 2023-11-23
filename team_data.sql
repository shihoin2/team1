-- データベース作成
CREATE DATABASE team1
  CHARACTER SET utf8mb4;

-- userテーブル作成
CREATE TABLE users (
  user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255) NOT NULL
)
CHARACTER SET utf8mb4;

-- categoryテーブル作成
CREATE TABLE categories (
  category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(255) NOT NULL
)
CHARACTER SET utf8mb4;

-- imagesテーブル作成
CREATE TABLE images (
  image_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  image_data VARCHAR(255) NOT NULL,
  image_name VARCHAR(255) NOT NULL
)
CHARACTER SET utf8mb4;

-- itemsテーブル作成
-- 外部キー制約: (user_id) REFERENCES users(user_id)
-- 外部キー制約: (category_id) REFERENCES users(category_id)
-- 外部キー制約: (image_id) REFERENCES Images(image_id)
CREATE TABLE items (
  item_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  category_id INT,
  item_name VARCHAR(255) NOT NULL,
  description TEXT,
  like_status ENUM('like','dislike'),
  image_id INT,
  FOREIGN KEY (user_id)
    REFERENCES users(user_id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (category_id)
    REFERENCES categories(category_id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (image_id)
    REFERENCES images(image_id)
    ON UPDATE CASCADE ON DELETE RESTRICT
)
CHARACTER SET utf8mb4;

-- テストユーザー入力
-- usersテーブル
INSERT INTO users(user_id, user_name)
VALUES (1, "テスト1 さん");

-- categoriesテーブル
INSERT INTO categories(category_id, category_name)
VALUES (1, "お菓子");

-- itemsテーブル
INSERT INTO items(item_id, user_id, category_id, item_name, like_status)
VALUES (1, 1, 1, "果汁グミ", 'like');
