#3.1 new user
INSERT INTO SECURITY2.user_accounts VALUES (11, '349-449-1203', 'E.Temp');
#3.2 new a role
INSERT INTO SECURITY2.user_role (roleName, description) VALUES ('newRole', 'us stagg');
#3.3 create new table
INSERT INTO SECURITY2.DbTable VALUES ('newTable',4);
#3.4 add new privilege [in privilege superclass]
INSERT INTO SECURITY2.privileges VALUES (107,'reference');

#3.5 assign role to new account
UPDATE SECURITY2.user_role
SET userID = 11
WHERE userID = 15 AND roleName = 'newRole';

#3.6 assign role an account privilege
INSERT INTO SECURITY2.account_privileges VALUES (100,800,'newRole');
INSERT INTO SECURITY2.account_privileges VALUES (106,800,'newRole');

#3.7 assign new privilege [relatation privilege]
INSERT INTO SECURITY2.relation_privileges VALUES (106,801,4,'newRole','newTable');
INSERT INTO SECURITY2.relation_privileges VALUES (107,801,4,'newRole','newTable');

#3.8(a) retrieve privileges with a particular role
SELECT privType, roleName
FROM SECURITY2.privileges, SECURITY2.account_privileges
WHERE SECURITY2.account_privileges.pid = SECURITY2.privileges.pid AND SECURITY2.account_privileges.roleName='staff';

#3.8(b) Retrieves privileges for each user-account
SELECT SECURITY2.user_accounts.userID, SECURITY2.user_accounts.userName,
       SECURITY2.user_role.roleName, SECURITY2.role_priv.privType
FROM SECURITY2.user_accounts, SECURITY2.user_role, SECURITY2.role_priv
WHERE SECURITY2.user_accounts.userID = SECURITY2.user_role.userID
      AND SECURITY2.user_accounts.userID =3
      AND SECURITY2.user_role.roleName = SECURITY2.role_priv.roleName;

# View to show privileges for each user account
-- CREATE VIEW all_user_priv
-- AS (
--     SELECT SECURITY2.user_accounts.userID, SECURITY2.user_accounts.userName,
--        SECURITY2.user_role.roleName, SECURITY2.role_priv.privType
--         FROM SECURITY2.user_accounts, SECURITY2.user_role, SECURITY2.role_priv
--             WHERE SECURITY2.user_accounts.userID = SECURITY2.user_role.userID
--                 AND SECURITY2.user_role.roleName = SECURITY2.role_priv.roleName
-- );

SELECT * FROM all_user_priv;

#3.8(c) Check for partitular privileges on particular user account
SELECT userName, privType
FROM all_user_priv
WHERE userID = 11 AND privType = 'create';



/Users/niks/Library/Application Support/JetBrains/DataGrip2020.1/consoles/db/6322974e-3472-4337-80eb-a0653f61350d/transactions-test1.sql