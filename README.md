# Inventory Manager

Readme containing the SQL sentence for the database: inventario. The database contains a single table named `producto` to manage inventory data such as product name, quantity, purchase price, and public price.

```sql
CREATE DATABASE `inventario`;
```

## Table: `producto`

The `producto` table stores information about the products in the inventory. Below is the schema for creating the table:

### SQL Create Table Statement

```sql
CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `name` varchar(50),
  `quantity` int(11),
  `purchase_price` int(11),
  `public_price` int(11),
  PRIMARY KEY (`id`)
);
```
