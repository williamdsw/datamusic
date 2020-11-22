INSERT INTO `user` (`user_id`, `name`, `password`, `last_changed`) 
VALUES (NULL, 'root', ENCODE ('root', 'mykey'), CURRENT_TIMESTAMP);