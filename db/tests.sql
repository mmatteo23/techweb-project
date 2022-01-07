SELECT Article.id, title, subtitle, Tag.name, publication_date, cover_img FROM (article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id
		WHERE !is_approved AND(
		title LIKE '%flash%' OR
		subtitle LIKE '%flash%' OR
		text LIKE '%flash%' OR
		Tag.name IN (SELECT Tag.name as Tname FROM (article_tags JOIN Article ON article_id=Article.id) JOIN Tag ON tag_id=Tag.id WHERE Tag.name LIKE '%flash%'))
		GROUP BY Title
		ORDER BY publication_date DESC;