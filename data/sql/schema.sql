CREATE TABLE action (id INT AUTO_INCREMENT, name VARCHAR(200) NOT NULL, body TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE activity_log (id BIGINT AUTO_INCREMENT, user_id BIGINT, object_action_conn_id BIGINT, object_type_id INT, object_id BIGINT, sentence_html VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX object_action_conn_id_idx (object_action_conn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE banner (id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, file_name VARCHAR(255) NOT NULL, link VARCHAR(255), partner VARCHAR(255), position_id INT NOT NULL, order_id INT NOT NULL, published TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX position_id_idx (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE banner_position (id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, order_id TINYINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE basket (id BIGINT AUTO_INCREMENT, session_id BIGINT, user_id BIGINT, cart_count BIGINT DEFAULT 0, total_price FLOAT(18, 2) DEFAULT 0, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX section_id_inx_idx (session_id), INDEX user_id_inx_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE basket_item (id BIGINT AUTO_INCREMENT, basket_id BIGINT, session_id BIGINT, user_id BIGINT, quantity INT DEFAULT 0, product_id INT, unit_price FLOAT(18, 2), total_price FLOAT(18, 2), sale_log VARCHAR(125), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX basket_id_idx (basket_id), INDEX product_id_idx (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE category_translation (id INT, name VARCHAR(100), description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE category (id INT AUTO_INCREMENT, section_id INT NOT NULL, published TINYINT(1) DEFAULT '1' NOT NULL, access VARCHAR(50) NOT NULL, order_id BIGINT, created_by BIGINT NOT NULL, updated_by BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX section_id_idx (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE category_content (content_id INT, category_id INT, PRIMARY KEY(content_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE comment (id INT AUTO_INCREMENT, content_id INT NOT NULL, name VARCHAR(100), email VARCHAR(150), comment_text TEXT, created_by INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX content_id_idx (content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE content_translation (id INT, title VARCHAR(200), intro_text TEXT, full_text TEXT, description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE content (id INT AUTO_INCREMENT, is_feature TINYINT(1), published TINYINT(1) DEFAULT '1' NOT NULL, section_id INT NOT NULL, album_id BIGINT, image_name VARCHAR(255), created_by INT NOT NULL, updated_by INT, rating TINYINT, hits INT, access VARCHAR(50) NOT NULL, start_date DATETIME, end_date DATETIME, extra VARCHAR(255), order_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX section_id_idx (section_id), INDEX album_id_idx (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE content_rating (id INT AUTO_INCREMENT, rating TINYINT NOT NULL, title VARCHAR(100), description TEXT, user_id BIGINT, content_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX content_id_idx (content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE email (id INT AUTO_INCREMENT, email VARCHAR(255) NOT NULL, subscribe INT DEFAULT '1' NOT NULL, extra VARCHAR(100), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE feedback (id INT AUTO_INCREMENT, title VARCHAR(100) NOT NULL, body TEXT NOT NULL, name VARCHAR(100), phone VARCHAR(50), email VARCHAR(100), ip_address VARCHAR(100) NOT NULL, is_read TINYINT(1) DEFAULT '0', user_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE gallery (id BIGINT AUTO_INCREMENT, title VARCHAR(255), description TEXT, is_active TINYINT(1), category_id INT, section_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX section_id_idx (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE object_action_conn (id BIGINT AUTO_INCREMENT, action_id INT, object_type_id INT, slug VARCHAR(100) UNIQUE, sentence_format VARCHAR(255), is_wall TINYINT(1) DEFAULT '0', is_notification TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX object_type_id_idx (object_type_id), INDEX action_id_idx (action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE object_type (id INT AUTO_INCREMENT, name VARCHAR(200) NOT NULL, slug VARCHAR(50) NOT NULL UNIQUE, object_model_name VARCHAR(100) UNIQUE, object_table_name VARCHAR(100) UNIQUE, body VARCHAR(255), sentence_format VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE order_shipping (id BIGINT AUTO_INCREMENT, order_id BIGINT NOT NULL, address TEXT, user_id BIGINT, is_complete TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE page_translation (id INT, title VARCHAR(255) NOT NULL, body TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE page (id INT AUTO_INCREMENT, slug VARCHAR(100), category_id INT, image_name VARCHAR(255), order_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE photos (id BIGINT AUTO_INCREMENT, title VARCHAR(255), picpath VARCHAR(255), gallery_id BIGINT, order_photo INT, is_default TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255), UNIQUE INDEX photos_sluggable_idx (slug), INDEX gallery_id_idx (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll_translation (id INT, question VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll (id INT AUTO_INCREMENT, order_id INT, position_id INT, published TINYINT(1) DEFAULT '1' NOT NULL, frequency INT DEFAULT '86400', created_by INT, updated_by INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX position_id_idx (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll_data_translation (id INT, answer VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll_data (id INT AUTO_INCREMENT, created_by INT, poll_id INT NOT NULL, order_id INT, vote_count INT DEFAULT '0', published TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX poll_id_idx (poll_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll_date (id BIGINT AUTO_INCREMENT, poll_id INT NOT NULL, answer_id INT NOT NULL, ip_address VARCHAR(100) NOT NULL, user_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX poll_id_idx (poll_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE poll_position (id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, symbol VARCHAR(50), description VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE prod_cont_type_translation (id INT, name VARCHAR(100), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE prod_cont_type (id INT AUTO_INCREMENT, description VARCHAR(255), sort_order TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_comment (id BIGINT AUTO_INCREMENT, user_id BIGINT, product_id INT, comment VARCHAR(255), is_block TINYINT(1) DEFAULT '0', is_read TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_stock (id BIGINT AUTO_INCREMENT, product_id INT NOT NULL, value INT DEFAULT 0 NOT NULL, date_when DATETIME, is_add TINYINT(1) DEFAULT '1', description text, order_id BIGINT, created_by BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX created_by_idx (created_by), INDEX product_id_idx (product_id), INDEX order_id_idx (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_to_content_translation (id BIGINT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_to_content (id BIGINT AUTO_INCREMENT, product_id INT, content_id INT, type_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX content_id_idx (content_id), INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_to_product_translation (id BIGINT, name VARCHAR(100), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE product_to_product (id BIGINT AUTO_INCREMENT, product_id INT, relation_product_id INT, sort_order TINYINT, type_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX relation_product_id_idx (relation_product_id), INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE section_translation (id INT, name VARCHAR(100), description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE section (id INT AUTO_INCREMENT, published TINYINT(1) DEFAULT '1' NOT NULL, access VARCHAR(50) NOT NULL, type_id INT NOT NULL, order_id INT, created_by INT NOT NULL, updated_by INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE section_type (id INT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, description TEXT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shipping_zone (id INT AUTO_INCREMENT, name VARCHAR(125), description VARCHAR(255), value FLOAT(18, 2), city VARCHAR(100), zone VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_bonus (id BIGINT AUTO_INCREMENT, type_id INT, object_id INT, min_interval FLOAT(18, 2), percent FLOAT(18, 2), sale_value FLOAT(18, 2), kg_value FLOAT(18, 2), start_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_category_translation (id INT, name VARCHAR(100) NOT NULL, description VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_category (id INT AUTO_INCREMENT, parent_id INT, sort_order TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX parent_id_idx (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_category_option_conn (category_id INT, option_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(category_id, option_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_coupon (id BIGINT AUTO_INCREMENT, type_id INT, object_id INT, user_id BIGINT, percent FLOAT(18, 2), sale_value FLOAT(18, 2), kg_value FLOAT(18, 2), start_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_id_idx (type_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_object_type (id INT AUTO_INCREMENT, object_model_name VARCHAR(125), object_table_name VARCHAR(125), name VARCHAR(125), extra VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_option_translation (id INT, name VARCHAR(100) NOT NULL, description VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_option (id INT AUTO_INCREMENT, type VARCHAR(255), sort_order TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_option_value_translation (id INT, name VARCHAR(100) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_option_value (id INT AUTO_INCREMENT, option_id INT, image_name VARCHAR(255), sort_order TINYINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX option_id_idx (option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order (id BIGINT AUTO_INCREMENT, invoice_number VARCHAR(50), invoice_number_report VARCHAR(50), status_id INT, user_id BIGINT, shipping_fee FLOAT(18, 2), remain_amount FLOAT(18, 2), total_amount FLOAT(18, 2), product_total_amount FLOAT(18, 2), product_count TINYINT, ip_address VARCHAR(20), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX status_id_idx (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_item (id BIGINT AUTO_INCREMENT, order_id BIGINT, quantity INT DEFAULT 0, product_id INT, unit_price FLOAT(18, 2), total_price FLOAT(18, 2), sale_log VARCHAR(125), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX product_id_idx (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_message (id BIGINT AUTO_INCREMENT, order_id BIGINT, send_user_id BIGINT, message VARCHAR(255), is_block TINYINT(1) DEFAULT '0', is_read TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX send_user_id_idx (send_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_status_translation (id INT, name VARCHAR(50) NOT NULL, description VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_status (id INT AUTO_INCREMENT, step TINYINT UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_status_log (id BIGINT AUTO_INCREMENT, order_id BIGINT, status_id INT, user_id BIGINT, when_date DATETIME, description VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX status_id_idx (status_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_order_transaction (id BIGINT AUTO_INCREMENT, order_id BIGINT, status_id INT, user_id BIGINT, code VARCHAR(100), amount FLOAT(18, 2), exchange VARCHAR(20), description VARCHAR(255), ip_address VARCHAR(20), created_by BIGINT, updated_by BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX order_id_idx (order_id), INDEX updated_by_idx (updated_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_translation (id INT, title VARCHAR(100) NOT NULL, intro_text TEXT, content TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product (id INT AUTO_INCREMENT, category_id INT NOT NULL, code VARCHAR(255), cover_photo_id INT, price FLOAT(18, 2), price_type INT DEFAULT 0, product_code VARCHAR(100), stock_count INT, total_add INT, total_minus INT, created_by VARCHAR(255), is_active TINYINT(1) DEFAULT '1', is_featured TINYINT(1) DEFAULT '0', is_submit TINYINT(1) DEFAULT '0', is_new TINYINT(1) DEFAULT '0', related_content INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX cover_photo_id_idx (cover_photo_id), INDEX related_content_idx (related_content), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_bonus (id BIGINT AUTO_INCREMENT, product_id INT, min_interval FLOAT(18, 2), percent FLOAT(18, 2), sale_value FLOAT(18, 2), kg_value FLOAT(18, 2), start_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_image (id INT AUTO_INCREMENT, product_id INT NOT NULL, img_src VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT '1', caption VARCHAR(100), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_option_value_conn (product_id INT, option_id INT, value_id INT, quantity INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX option_id_idx (option_id), PRIMARY KEY(product_id, value_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_sale_translation (id BIGINT, description VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_product_sale (id BIGINT AUTO_INCREMENT, product_id INT, type_id INT, percent FLOAT(18, 2), sale_value FLOAT(18, 2), kg_value FLOAT(18, 2), start_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_sale_translation (id BIGINT, description VARCHAR(255), lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE shop_sale (id BIGINT AUTO_INCREMENT, type_id INT, object_id INT, percent FLOAT(18, 2), sale_value FLOAT(18, 2), kg_value FLOAT(18, 2), start_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX type_id_idx (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE video_translation (id INT, title VARCHAR(100) NOT NULL, description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE video (id INT AUTO_INCREMENT, section_id INT NOT NULL, category_id INT NOT NULL, image VARCHAR(255), file_name VARCHAR(255), is_embed TINYINT(1) DEFAULT '1', embed_src TEXT, order_id INT NOT NULL, published TINYINT(1) DEFAULT '1' NOT NULL, created_by INT, updated_by INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX category_id_idx (category_id), INDEX section_id_idx (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE website_config_translation (id INT, company_name VARCHAR(100), company_slogan VARCHAR(255), address TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE website_config (id INT AUTO_INCREMENT, logo VARCHAR(255), phone VARCHAR(255), fax VARCHAR(100), email VARCHAR(100), google_map TEXT, domain VARCHAR(255), facebook_page VARCHAR(255), twitter VARCHAR(255), google_plus VARCHAR(255), linkedin VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_login_history (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, ip_address VARCHAR(50) NOT NULL, access_type VARCHAR(50) DEFAULT 'Browser', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, phone VARCHAR(50), phone2 VARCHAR(50), address VARCHAR(255), zone_id INT, profile_image VARCHAR(255), fb_user_id BIGINT, twitter_user_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), INDEX zone_id_idx (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
ALTER TABLE activity_log ADD CONSTRAINT activity_log_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE activity_log ADD CONSTRAINT activity_log_object_action_conn_id_object_action_conn_id FOREIGN KEY (object_action_conn_id) REFERENCES object_action_conn(id);
ALTER TABLE banner ADD CONSTRAINT banner_position_id_banner_position_id FOREIGN KEY (position_id) REFERENCES banner_position(id);
ALTER TABLE basket ADD CONSTRAINT basket_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE SET NULL;
ALTER TABLE basket_item ADD CONSTRAINT basket_item_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE basket_item ADD CONSTRAINT basket_item_basket_id_basket_id FOREIGN KEY (basket_id) REFERENCES basket(id) ON DELETE CASCADE;
ALTER TABLE category_translation ADD CONSTRAINT category_translation_id_category_id FOREIGN KEY (id) REFERENCES category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE category ADD CONSTRAINT category_section_id_section_id FOREIGN KEY (section_id) REFERENCES section(id);
ALTER TABLE category_content ADD CONSTRAINT category_content_content_id_content_id FOREIGN KEY (content_id) REFERENCES content(id);
ALTER TABLE category_content ADD CONSTRAINT category_content_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE comment ADD CONSTRAINT comment_content_id_content_id FOREIGN KEY (content_id) REFERENCES content(id);
ALTER TABLE content_translation ADD CONSTRAINT content_translation_id_content_id FOREIGN KEY (id) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE content ADD CONSTRAINT content_section_id_section_id FOREIGN KEY (section_id) REFERENCES section(id);
ALTER TABLE content ADD CONSTRAINT content_album_id_gallery_id FOREIGN KEY (album_id) REFERENCES gallery(id);
ALTER TABLE content_rating ADD CONSTRAINT content_rating_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE content_rating ADD CONSTRAINT content_rating_content_id_content_id FOREIGN KEY (content_id) REFERENCES content(id);
ALTER TABLE feedback ADD CONSTRAINT feedback_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE gallery ADD CONSTRAINT gallery_section_id_section_id FOREIGN KEY (section_id) REFERENCES section(id) ON DELETE CASCADE;
ALTER TABLE gallery ADD CONSTRAINT gallery_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE;
ALTER TABLE object_action_conn ADD CONSTRAINT object_action_conn_object_type_id_object_type_id FOREIGN KEY (object_type_id) REFERENCES object_type(id);
ALTER TABLE object_action_conn ADD CONSTRAINT object_action_conn_action_id_action_id FOREIGN KEY (action_id) REFERENCES action(id);
ALTER TABLE order_shipping ADD CONSTRAINT order_shipping_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE order_shipping ADD CONSTRAINT order_shipping_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE page_translation ADD CONSTRAINT page_translation_id_page_id FOREIGN KEY (id) REFERENCES page(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE page ADD CONSTRAINT page_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE photos ADD CONSTRAINT photos_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id) ON DELETE CASCADE;
ALTER TABLE poll_translation ADD CONSTRAINT poll_translation_id_poll_id FOREIGN KEY (id) REFERENCES poll(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE poll ADD CONSTRAINT poll_position_id_poll_position_id FOREIGN KEY (position_id) REFERENCES poll_position(id);
ALTER TABLE poll_data_translation ADD CONSTRAINT poll_data_translation_id_poll_data_id FOREIGN KEY (id) REFERENCES poll_data(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE poll_data ADD CONSTRAINT poll_data_poll_id_poll_id FOREIGN KEY (poll_id) REFERENCES poll(id);
ALTER TABLE poll_date ADD CONSTRAINT poll_date_poll_id_poll_id FOREIGN KEY (poll_id) REFERENCES poll(id);
ALTER TABLE prod_cont_type_translation ADD CONSTRAINT prod_cont_type_translation_id_prod_cont_type_id FOREIGN KEY (id) REFERENCES prod_cont_type(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE product_comment ADD CONSTRAINT product_comment_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE product_comment ADD CONSTRAINT product_comment_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE product_stock ADD CONSTRAINT product_stock_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE product_stock ADD CONSTRAINT product_stock_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE product_stock ADD CONSTRAINT product_stock_created_by_sf_guard_user_id FOREIGN KEY (created_by) REFERENCES sf_guard_user(id);
ALTER TABLE product_to_content_translation ADD CONSTRAINT product_to_content_translation_id_product_to_content_id FOREIGN KEY (id) REFERENCES product_to_content(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE product_to_content ADD CONSTRAINT product_to_content_type_id_prod_cont_type_id FOREIGN KEY (type_id) REFERENCES prod_cont_type(id);
ALTER TABLE product_to_content ADD CONSTRAINT product_to_content_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE product_to_content ADD CONSTRAINT product_to_content_content_id_content_id FOREIGN KEY (content_id) REFERENCES content(id);
ALTER TABLE product_to_product_translation ADD CONSTRAINT product_to_product_translation_id_product_to_product_id FOREIGN KEY (id) REFERENCES product_to_product(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE product_to_product ADD CONSTRAINT product_to_product_type_id_prod_cont_type_id FOREIGN KEY (type_id) REFERENCES prod_cont_type(id);
ALTER TABLE product_to_product ADD CONSTRAINT product_to_product_relation_product_id_shop_product_id FOREIGN KEY (relation_product_id) REFERENCES shop_product(id);
ALTER TABLE section_translation ADD CONSTRAINT section_translation_id_section_id FOREIGN KEY (id) REFERENCES section(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE section ADD CONSTRAINT section_type_id_section_type_id FOREIGN KEY (type_id) REFERENCES section_type(id);
ALTER TABLE shop_bonus ADD CONSTRAINT shop_bonus_type_id_shop_object_type_id FOREIGN KEY (type_id) REFERENCES shop_object_type(id);
ALTER TABLE shop_category_translation ADD CONSTRAINT shop_category_translation_id_shop_category_id FOREIGN KEY (id) REFERENCES shop_category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_category ADD CONSTRAINT shop_category_parent_id_shop_category_id FOREIGN KEY (parent_id) REFERENCES shop_category(id);
ALTER TABLE shop_category_option_conn ADD CONSTRAINT shop_category_option_conn_option_id_shop_option_id FOREIGN KEY (option_id) REFERENCES shop_option(id) ON DELETE CASCADE;
ALTER TABLE shop_category_option_conn ADD CONSTRAINT shop_category_option_conn_category_id_shop_category_id FOREIGN KEY (category_id) REFERENCES shop_category(id) ON DELETE CASCADE;
ALTER TABLE shop_coupon ADD CONSTRAINT shop_coupon_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE shop_coupon ADD CONSTRAINT shop_coupon_type_id_shop_object_type_id FOREIGN KEY (type_id) REFERENCES shop_object_type(id);
ALTER TABLE shop_option_translation ADD CONSTRAINT shop_option_translation_id_shop_option_id FOREIGN KEY (id) REFERENCES shop_option(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_option_value_translation ADD CONSTRAINT shop_option_value_translation_id_shop_option_value_id FOREIGN KEY (id) REFERENCES shop_option_value(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_option_value ADD CONSTRAINT shop_option_value_option_id_shop_option_id FOREIGN KEY (option_id) REFERENCES shop_option(id) ON DELETE CASCADE;
ALTER TABLE shop_order ADD CONSTRAINT shop_order_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE shop_order ADD CONSTRAINT shop_order_status_id_shop_order_status_id FOREIGN KEY (status_id) REFERENCES shop_order_status(id);
ALTER TABLE shop_order_item ADD CONSTRAINT shop_order_item_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE shop_order_item ADD CONSTRAINT shop_order_item_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE shop_order_message ADD CONSTRAINT shop_order_message_send_user_id_sf_guard_user_id FOREIGN KEY (send_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE shop_order_message ADD CONSTRAINT shop_order_message_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE shop_order_status_translation ADD CONSTRAINT shop_order_status_translation_id_shop_order_status_id FOREIGN KEY (id) REFERENCES shop_order_status(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_order_status_log ADD CONSTRAINT shop_order_status_log_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE shop_order_status_log ADD CONSTRAINT shop_order_status_log_status_id_shop_order_status_id FOREIGN KEY (status_id) REFERENCES shop_order_status(id);
ALTER TABLE shop_order_status_log ADD CONSTRAINT shop_order_status_log_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE shop_order_transaction ADD CONSTRAINT shop_order_transaction_updated_by_sf_guard_user_id FOREIGN KEY (updated_by) REFERENCES sf_guard_user(id);
ALTER TABLE shop_order_transaction ADD CONSTRAINT shop_order_transaction_order_id_shop_order_id FOREIGN KEY (order_id) REFERENCES shop_order(id);
ALTER TABLE shop_product_translation ADD CONSTRAINT shop_product_translation_id_shop_product_id FOREIGN KEY (id) REFERENCES shop_product(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_product ADD CONSTRAINT shop_product_related_content_content_id FOREIGN KEY (related_content) REFERENCES content(id);
ALTER TABLE shop_product ADD CONSTRAINT shop_product_cover_photo_id_shop_product_image_id FOREIGN KEY (cover_photo_id) REFERENCES shop_product_image(id);
ALTER TABLE shop_product ADD CONSTRAINT shop_product_category_id_shop_category_id FOREIGN KEY (category_id) REFERENCES shop_category(id);
ALTER TABLE shop_product_bonus ADD CONSTRAINT shop_product_bonus_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE shop_product_image ADD CONSTRAINT shop_product_image_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id) ON DELETE CASCADE;
ALTER TABLE shop_product_option_value_conn ADD CONSTRAINT shop_product_option_value_conn_value_id_shop_option_value_id FOREIGN KEY (value_id) REFERENCES shop_option_value(id) ON DELETE CASCADE;
ALTER TABLE shop_product_option_value_conn ADD CONSTRAINT shop_product_option_value_conn_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id) ON DELETE CASCADE;
ALTER TABLE shop_product_option_value_conn ADD CONSTRAINT shop_product_option_value_conn_option_id_shop_option_id FOREIGN KEY (option_id) REFERENCES shop_option(id);
ALTER TABLE shop_product_sale_translation ADD CONSTRAINT shop_product_sale_translation_id_shop_product_sale_id FOREIGN KEY (id) REFERENCES shop_product_sale(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_product_sale ADD CONSTRAINT shop_product_sale_type_id_shop_object_type_id FOREIGN KEY (type_id) REFERENCES shop_object_type(id);
ALTER TABLE shop_product_sale ADD CONSTRAINT shop_product_sale_product_id_shop_product_id FOREIGN KEY (product_id) REFERENCES shop_product(id);
ALTER TABLE shop_sale_translation ADD CONSTRAINT shop_sale_translation_id_shop_sale_id FOREIGN KEY (id) REFERENCES shop_sale(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE shop_sale ADD CONSTRAINT shop_sale_type_id_shop_object_type_id FOREIGN KEY (type_id) REFERENCES shop_object_type(id);
ALTER TABLE video_translation ADD CONSTRAINT video_translation_id_video_id FOREIGN KEY (id) REFERENCES video(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE video ADD CONSTRAINT video_section_id_section_id FOREIGN KEY (section_id) REFERENCES section(id);
ALTER TABLE video ADD CONSTRAINT video_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id);
ALTER TABLE website_config_translation ADD CONSTRAINT website_config_translation_id_website_config_id FOREIGN KEY (id) REFERENCES website_config(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_login_history ADD CONSTRAINT sf_guard_login_history_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user ADD CONSTRAINT sf_guard_user_zone_id_shipping_zone_id FOREIGN KEY (zone_id) REFERENCES shipping_zone(id);
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
