USE breezedemo;

DROP PROCEDURE IF EXISTS Sp_GetAllUsers;

DELIMITER $$

CREATE PROCEDURE Sp_GetAllUsers(
    IN p_Id INTEGER
)
BEGIN
    SELECT USRS.Id
          ,USRS.name
          ,USRS.email
          ,USRS.rolename
    FROM Users as USRS
    WHERE USRS.Id != p_Id;
END $$

DELIMITER ;
