DELIMITER $$
DROP TRIGGER `tr_file_after_delete`$$
CREATE
TRIGGER `tr_file_after_delete` AFTER DELETE ON `files` 
FOR EACH ROW 
BEGIN
    DECLARE mCOUNT INT(50) DEFAULT 0;
    SELECT COUNT(*) INTO mCOUNT FROM files WHERE file_from_table=OLD.file_from_table AND file_from_id=OLD.file_from_id;
    IF OLD.file_from_table = 'orders' THEN
        UPDATE orders SET order_files_count=mCOUNT WHERE order_id=OLD.file_from_id;
    ELSEIF OLD.file_from_table = 'trans' THEN
        UPDATE trans SET trans_files_count=mCOUNT WHERE trans_id=OLD.file_from_id;
    END IF;   
END$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER `tr_file_after_insert`$$
CREATE TRIGGER `tr_file_after_insert` AFTER INSERT ON `files` 
FOR EACH ROW 
BEGIN
    DECLARE mCOUNT INT(50) DEFAULT 0;
    SELECT COUNT(*) INTO mCOUNT FROM files WHERE file_from_table=NEW.file_from_table AND file_from_id=NEW.file_from_id;
    IF NEW.file_from_table = 'orders' THEN
        UPDATE orders SET order_files_count=mCOUNT WHERE order_id=NEW.file_from_id;
    ELSEIF NEW.file_from_table = 'trans' THEN
        UPDATE trans SET trans_files_count=mCOUNT WHERE trans_id=NEW.file_from_id;
    END IF;   
END$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `tr_product_after_insert`$$ 
CREATE TRIGGER `tr_product_after_insert` AFTER INSERT ON `products`
FOR EACH ROW 
BEGIN
    IF NEW.product_category_id IS NOT NULL THEN
        UPDATE categories SET category_count_data=(
            SELECT COUNT(*) FROM products WHERE product_category_id=NEW.product_category_id
        ) WHERE category_id=NEW.product_category_id; 
    END IF;
END $$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `tr_product_after_update`$$ 
CREATE TRIGGER `tr_product_after_update` AFTER UPDATE ON `products`
FOR EACH ROW 
BEGIN
    IF NEW.product_category_id IS NOT NULL THEN
        IF NEW.product_category_id != OLD.product_category_id THEN
            UPDATE categories SET category_count_data=(
                SELECT COUNT(*) FROM products WHERE product_category_id=NEW.product_category_id
            ) WHERE category_id=NEW.product_category_id; 

            UPDATE categories SET category_count_data=(
                SELECT COUNT(*) FROM products WHERE product_category_id=OLD.product_category_id
            ) WHERE category_id=OLD.product_category_id;
        END IF;
    END IF;

    IF NEW.product_category_id IS NULL THEN
        IF OLD.product_category_id IS NOT NULL THEN 
            UPDATE categories SET category_count_data=(
                SELECT COUNT(*) FROM products WHERE product_category_id=OLD.product_category_id
            ) WHERE category_id=OLD.product_category_id;            
        END IF;  
    END IF;
END $$
DELIMITER ;