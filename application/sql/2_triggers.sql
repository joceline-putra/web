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
    IF NEW.file_from_table = 'products' THEN
        UPDATE products SET product_image = NEW.file_url WHERE product_id = NEW.file_from_id;
    END IF;   
END$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER `tr_file_after_update`$$
CREATE TRIGGER `tr_file_after_update` AFTER UPDATE ON `files` 
FOR EACH ROW 
BEGIN
    IF NEW.file_from_table = 'products' THEN
        UPDATE products SET product_image = NEW.file_url WHERE product_id = NEW.file_from_id;
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

DELIMITER $$
DROP FUNCTION IF EXISTS `fn_create_card_number`$$
CREATE FUNCTION `fn_create_card_number`() 
RETURNS VARCHAR(255) CHARSET latin1 COLLATE latin1_swedish_ci
    DETERMINISTIC
BEGIN
    DECLARE mNUMBER VARCHAR(255);
    DECLARE mLAST_NUMBER INT(255);
    DECLARE mRESULT VARCHAR(255);
    
    SELECT IFNULL(MAX(RIGHT(`card_number`,6)),0) INTO mLAST_NUMBER
    FROM cards
    WHERE DATE_FORMAT(card_date_created, '%Y%m')=DATE_FORMAT(vDATE,'%Y%m')
    AND card_type=vTYPE;

      /* Generate Number */
    IF mLAST_NUMBER = 0 THEN
      SET @mNUMBER := '00001';
    ELSE
      SET mNUMBER := mLAST_NUMBER + 1; 	
      SELECT LPAD(mNUMBER,5,0) INTO @mNUMBER;
    END IF;
    SET mRESULT = CONCAT('INV-',DATE_FORMAT(vDATE, '%y%m'),'-',@mNUMBER); -- INV-2206-00001
    RETURN mRESULT;
  END$$

DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `tr_card_before_insert`$$ 
CREATE TRIGGER `tr_card_before_insert` BEFORE INSERT ON `cards`
FOR EACH ROW 
BEGIN
    DECLARE mINIT VARCHAR(5);
    DECLARE mNUMBER VARCHAR(255);
    DECLARE mLAST_NUMBER INT(255);
    DECLARE mRESULT VARCHAR(255);

    SELECT LEFT(NEW.card_type,1) INTO mINIT;

    SELECT IFNULL(MAX(RIGHT(`card_number`,6)),0) INTO mLAST_NUMBER
    FROM cards
    WHERE card_type=NEW.card_type;

    /* Generate Number */
    IF mLAST_NUMBER = 0 THEN
      SET @mNUMBER := '000001';
    ELSE
      SET mNUMBER := mLAST_NUMBER + 1; 	
      SELECT LPAD(mNUMBER,6,0) INTO @mNUMBER;
    END IF;
    SET mRESULT = CONCAT(mINIT,@mNUMBER);

    SET NEW.card_number = mRESULT;
    SET NEW.card_session = fn_create_session_length(20);
END $$
DELIMITER ;