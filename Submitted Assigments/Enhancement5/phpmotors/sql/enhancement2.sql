/* 
Create 6 SQL queries interacting with the phpmotors website and database

1. Insert the following new client into the clients table (NOTE: The clientId and clientLevel fields should handle their own values and do not need to be part of this query.):
Tony, Stark, tony@starkent.com, Iam1ronM@n, "I am the real Ironman"

2. Modify the Tony Stark record to change the clientLevel to 3. The previous insert query will have to have been stored in the database for the update query to work.

3. Modify the "GM Hummer" record to read "spacious interior" rather than "small interior" using a single query. Explore the SQL Replace function. It needs to be part of an Update query as shown in the code examples of the SQL Reading - Read Ch. 1, section 3.

4. Use an inner join to select the invModel field from the inventory table and the classificationName field from the carclassification table for inventory items that belong to the "SUV" category. (These resources may help you: https://www.w3schools.com/sql/sql_join.asp and https://www.youtube.com/watch?v=0FEjw2HnfDs) Four records should be returned as a result of the query.

5. Delete the Jeep Wrangler from the database. [Note: You can restore the Inventory table by importing the SQL file that was used to create it again].

6. Update all records in the Inventory table to add "/phpmotors" to the beginning of the file path in the invImage and invThumbnail columns using a single query. These references may prove helpful - SQL Update, SQL Concat().

7. Create a video of you running all of these SQL statements and showing the result of running each SQL statement.
*/

/* 1. */
INSERT INTO clients(
    clientFirstname,
    clientLastname,
    clientEmail,
    clientPassword,
    COMMENT
)
VALUES(
    'Tony',
    "Stark",
    "tony@starkent.com",
    "Iam1ronM@n",
    "I am the real Ironman"
);

/* 2. */
UPDATE
    `clients`
SET
    `clientLevel` = '3'
WHERE
    clientFirstname = 'Tony';

/* 3. */
UPDATE
    `inventory`
SET
    invDescription =
REPLACE
    (
        invDescription,
        'small interior',
        'spacious interior'
    )
WHERE
    invMake = 'GM' AND invModel = 'Hummer';

/* 4. */
SELECT
    inventory.invModel,
    carclassification.classificationName
FROM
    inventory
INNER JOIN carclassification ON classificationName = 'suv';

/* 5. */
DELETE
FROM
    `inventory`
WHERE
    invMake = 'Jeep' AND invModel = 'Wrangler';

/* 6. */
UPDATE
    inventory
SET
    invImage = CONCAT('/phpmotors', invImage),
    invThumbnail = CONCAT('/phpmotors', invThumbnail);

/* 7. */
/* https://youtu.be/70qcD3kYazE */