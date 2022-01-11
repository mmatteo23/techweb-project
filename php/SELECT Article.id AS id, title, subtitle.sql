SELECT Article.id AS id, title, subtitle, text, publication_date, author, read_time, Game.name AS name, cover_img, alt_cover_img FROM Article JOIN Game on game_id = Game.id WHERE id=5
		