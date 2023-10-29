# Inventory

Inventory system that uses a SQL server to store item information. 

This uses a CSS frame from SB-admin

Back-end is written in PHP with no authentication to local server

Xampp was used during testing so is recommended

## General

- The idea is that there are a series of shelves or location that are assigned a barcode where items that are part of the inventory are placed and this is recorded. 
- This allows a user to look up where particular items are stored and it points them to the shelf / area
- It also allows users to group certain items together to make a order / job which can then be updated once its complete so that all items are removed from the system instead of manually doing it one by one
- A barcode scanner is required (USB)
- A label maker is required (this will need configuring to make sure it is the right format and size)

## Database Design

- There are 3 databases:
    - Items
    - Itemstock
    - Main
- When a new type of item is added, it is added to the Items database
- Itemstock stores the current number of a particular type of item, which is changed when it is reserved or a more is added to the system
- Main stores items that have had a barcode assigned to them, and the shelf they are assigned to. 


