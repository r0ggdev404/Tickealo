-- Crear la base de datos llamada 'Tickealo' (si no existe)
CREATE DATABASE tickealo;

-- Conectar a la base de datos recién creada
\c tickealo;

-- Definir los tipos ENUM
CREATE TYPE order_status AS ENUM ('pending', 'paid', 'cancelled', 'completed');
CREATE TYPE ticket_status AS ENUM ('available', 'reserved', 'sold');
CREATE TYPE payment_status AS ENUM ('pending', 'approved', 'failed', 'refunded');
CREATE TYPE user_role AS ENUM ('customer', 'admin', 'promoter');
CREATE TYPE ticket_support_status AS ENUM ('open', 'closed', 'pending');
CREATE TYPE transaction_status AS ENUM ('success', 'failed', 'pending');

-- Crear las tablas
CREATE TABLE "User" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(100),
    "lastname" VARCHAR(100),
    "role" user_role,
    "dni" VARCHAR(15),
    "email" VARCHAR(255),
    "password_hash" VARCHAR(255),
    "register_date" TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE "Organiser" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(255)
);

CREATE TABLE "Place" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(255),
    "address" TEXT,
    "capacity" INTEGER
);

CREATE TABLE "Zone" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(100),
    "place_id" INTEGER,
    CONSTRAINT "fk_Zone_place_id_Place_id" FOREIGN KEY ("place_id") REFERENCES "Place"("id")
);

CREATE TABLE "Seat" (
    "id" SERIAL PRIMARY KEY,
    "row" VARCHAR(10),
    "number" VARCHAR(10),
    "label" VARCHAR(20),
    "zone_id" INTEGER,
    CONSTRAINT "fk_Seat_zone_id_Zone_id" FOREIGN KEY ("zone_id") REFERENCES "Zone"("id")
);

CREATE TABLE "Ticket" (
    "id" SERIAL PRIMARY KEY,
    "price" DECIMAL(10, 2),
    "status" ticket_status,
    "zone_id" INTEGER,
    CONSTRAINT "fk_Ticket_zone_id_Zone_id" FOREIGN KEY ("zone_id") REFERENCES "Zone"("id")
);

CREATE TABLE "Event" (
    "id" SERIAL PRIMARY KEY,
    "name" VARCHAR(255),
    "date" DATE,
    "description" TEXT,
    "ticket_id" INTEGER,
    "organiser_id" INTEGER,
    "place_id" INTEGER,
    CONSTRAINT "fk_Event_organiser_id_Organiser_id" FOREIGN KEY("organiser_id") REFERENCES "Organiser"("id"),
    CONSTRAINT "fk_Event_place_id_Place_id" FOREIGN KEY("place_id") REFERENCES "Place"("id"),
    CONSTRAINT "fk_Event_ticket_id_Ticket_id" FOREIGN KEY("ticket_id") REFERENCES "Ticket"("id")
);

CREATE TABLE "Order" (
    "id" SERIAL PRIMARY KEY,
    "status" order_status,
    "total_amount" DECIMAL(10, 2),
    "date" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "user_id" INTEGER,
    CONSTRAINT "fk_Order_user_id_User_id" FOREIGN KEY ("user_id") REFERENCES "User"("id")
);

CREATE TABLE "OrderItem" (
    "id" SERIAL PRIMARY KEY,
    "order_id" INTEGER,
    "ticket_id" INTEGER,
    "price" DECIMAL(10, 2),
    "quantity" INTEGER,
    CONSTRAINT "fk_OrderItem_order_id_Order_id" FOREIGN KEY ("order_id") REFERENCES "Order"("id"),
    CONSTRAINT "fk_OrderItem_ticket_id_Ticket_id" FOREIGN KEY ("ticket_id") REFERENCES "Ticket"("id")
);

CREATE TABLE "Transaction" (
    "id" SERIAL PRIMARY KEY,
    "provider" VARCHAR(100),
    "status" transaction_status,
    "amount" DECIMAL(10, 2),
    "attempt_number" INTEGER,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE "Payment" (
    "id" SERIAL PRIMARY KEY,
    "status" payment_status,
    "amount" DECIMAL(10, 2),
    "date" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "order_id" INTEGER,
    "transaction_id" INTEGER,
    CONSTRAINT "fk_Payment_order_id_Order_id" FOREIGN KEY ("order_id") REFERENCES "Order"("id"),
    CONSTRAINT "fk_Payment_transaction_id_Transaction_id" FOREIGN KEY ("transaction_id") REFERENCES "Transaction"("id")
);



CREATE TABLE "TicketSupport" (
    "id" SERIAL PRIMARY KEY,
    "user_id" INTEGER,
    "subject" VARCHAR(255),
    "status" ticket_support_status,
    "message" TEXT,
    "date" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT "fk_TicketSupport_user_id" FOREIGN KEY ("user_id") REFERENCES "User"("id")
);
