CREATE TABLE homestead.posts (
	id INT auto_increment NOT NULL,
	slug varchar(255) NULL,
	body TEXT NULL,
    PRIMARY KEY (id)
);

INSERT INTO homestead.posts (slug, body) VALUES
('my-first-post', 'Hello, this is my first post!'),
('my-second-post', 'This is my second post.');
