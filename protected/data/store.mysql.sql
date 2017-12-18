CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    role VARCHAR(128) NOT NULL
);

CREATE TABLE tbl_tinyurl (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    tinyurl VARCHAR(128) NOT NULL,
    created INTEGER(128) NOT NULL,
    updated INTEGER(128) NOT NULL
);


INSERT INTO tbl_user (username, password, email, role) VALUES ('ohdavey',
'$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'ohdavey@example.com', 1);

INSERT INTO tbl_user (username, password, email, role)
  VALUES ('johnQ', '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'johnq@example.com', 2);

INSERT INTO tbl_user (username, password, email, role)
  VALUES ('mikeG', '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'mikeg@example.com', 2);

CREATE TABLE tbl_employee (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    department_id INTEGER NOT NULL,
    name VARCHAR(128) NOT NULL,
    title VARCHAR(128) NOT NULL
);
INSERT INTO tbl_employee (user_id, department_id, name, title)
  VALUES (2, 1, 'John Q', 'Sales Associate');

INSERT INTO tbl_employee (user_id, department_id, name, title)
  VALUES (3, 2, 'Mike G', 'Sales Associate');

CREATE TABLE tbl_department (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL
);
INSERT INTO tbl_department (name) VALUES ('Electronics');
INSERT INTO tbl_department (name) VALUES ('Furniture');

CREATE TABLE tbl_vendor (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL
);
INSERT INTO tbl_vendor (name) VALUES ('Voltronics Inc.');
INSERT INTO tbl_vendor (name) VALUES ('Worldniture Inc.');

CREATE TABLE tbl_product (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    department_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    vendor_id INTEGER NOT NULL,
    title VARCHAR(128) NOT NULL,
    details TEXT,
    price DOUBLE(10,2) NOT NULL
);
INSERT INTO tbl_product (department_id, vendor_id, category_id, title, price)
  VALUES (1, 1, '1', 'Canon 3x', 42.40);

INSERT INTO tbl_product (department_id, vendor_id, category_id, title, price)
  VALUES (1, 1, '2', 'Galaxy S8+', 342.25);

INSERT INTO tbl_product (department_id, vendor_id, category_id, title, price)
  VALUES (1, 2, '3', 'Leather Bali XT', 264.99);

INSERT INTO tbl_product (department_id, vendor_id, category_id, title, price)
  VALUES (1, 2, '4', 'Full King MemoryFoam GE', 920.00);


CREATE TABLE tbl_order (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    employee_id INTEGER NOT NULL,
    customer_name VARCHAR(128) NOT NULL,
    zipcode INTEGER(5) NOT NULL,
    qty INTEGER NOT NULL,
    total DOUBLE(10,2) NOT NULL,
    status INTEGER(1) NOT NULL,
    order_date INTEGER NOT NULL,
    updated INTEGER NOT NULL
);

CREATE TABLE tbl_order_line_item (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    qty INTEGER NOT NULL
);

CREATE TABLE tbl_inventory (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_id INTEGER NOT NULL,
    qty INTEGER NOT NULL,
    updated INTEGER NOT NULL
);
INSERT INTO tbl_inventory (product_id, qty, updated) VALUES (1, 50, 1230952187);
INSERT INTO tbl_inventory (product_id, qty, updated) VALUES (2, 30, 1230952187);
INSERT INTO tbl_inventory (product_id, qty, updated) VALUES (3, 40, 1230952187);
INSERT INTO tbl_inventory (product_id, qty, updated) VALUES (4, 10, 1230952187);


CREATE TABLE tbl_product_category (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL
);
INSERT INTO tbl_product_category (name) VALUES ('Camera');
INSERT INTO tbl_product_category (name) VALUES ('Smartphones');
INSERT INTO tbl_product_category (name) VALUES ('Couch');
INSERT INTO tbl_product_category (name) VALUES ('Bed');
