-- Conectar a la base de datos
\c tickealo;

-- Importar los datos de User
\copy "User"("id", "name", "lastname", "role", "dni", "email", "password_hash", "register_date") FROM './data/User.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Organiser
\copy "Organiser"("id", "name") FROM './data/Organiser.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Place
\copy "Place"("id", "name", "address", "capacity") FROM './data/Place.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Zone
\copy "Zone"("id", "name", "place_id") FROM './data/Zone.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Seat
\copy "Seat"("id", "row", "number", "label", "zone_id") FROM './data/Seat.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Ticket
\copy "Ticket"("id", "price", "status", "zone_id") FROM './data/Ticket.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Event
\copy "Event"("id", "name", "date", "description", "ticket_id", "organiser_id", "place_id") FROM './data/Event.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Order
\copy "Order"("id", "status", "total_amount", "date", "user_id") FROM './data/Order.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de OrderItem
\copy "OrderItem"("id", "order_id", "ticket_id", "price", "quantity") FROM './data/OrderItem.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Payment
\copy "Payment"("id", "status", "amount", "date", "order_id", "transaction_id") FROM './data/Payment.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de Transaction
\copy "Transaction"("id", "provider", "status", "amount", "attempt_number", "created_at") FROM './data/Transaction.csv' DELIMITER ',' CSV HEADER;

-- Importar los datos de TicketSupport
\copy "TicketSupport"("id", "user_id", "subject", "status", "message", "date") FROM './data/TicketSupport.csv' DELIMITER ',' CSV HEADER;
