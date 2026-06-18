DELIMITER $$

DROP PROCEDURE IF EXISTS sp_DeleteAllergeen$$

CREATE PROCEDURE sp_DeleteAllergeen(
    IN p_id INT
)
BEGIN
    DELETE FROM Allergeen
    WHERE Id = p_id;

    SELECT ROW_COUNT() AS affected;
END$$

DELIMITER ;
