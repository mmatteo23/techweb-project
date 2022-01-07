SELECT Article.id, title, subtitle, publication_date, cover_img FROM Article 
JOIN article_tags ON id=article_id
JOIN Tag on Tag.id = tag_id