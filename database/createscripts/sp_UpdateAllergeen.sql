DROP PROCEDURE IF EXISTS sp_UpdateAllergeen;

DELIMITER $$

CREATE PROCEDURE sp_UpdateAllergeen(
    IN p_id INT
    ,IN p_name VARCHAR(50)
    ,IN p_description VARCHAR(255)
)
BEGIN

    UPDATE Allergeen
        SET Naam = p_name,
            Omschrijving = p_description
    WHERE Id = p_id;

    SELECT ROW_COUNT() AS affected;

END$$

DELIMITER ;
