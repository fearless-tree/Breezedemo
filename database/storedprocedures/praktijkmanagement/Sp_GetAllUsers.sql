USE Breezedemo;

DROP PROCEDURE IF EXISTS SP_GetAllUsers;

DELIMITER $$

CREATE PROCEDURE SP_GetAllUsers(
    IN p_Id INTEGER
)
BEGIN

    SELECT USRS.Id
          ,USRS.name
          ,USRS.email
          ,USRS.rolename
    FROM Users as USRS
    WHERE USRS.Id != p_Id;

END$$

DELIMITER ;
