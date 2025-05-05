<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tablas de la Base de Datos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tablas de la Base de Datos</h1>

    <!-- Tabla User -->
    <h2>Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT id, name, lastname, email FROM \"User\"";
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Error al obtener datos.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <!-- Tabla Event -->
    <h2>Eventos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>ID Ticket</th>
                <th>ID Organizador</th>
                <th>ID Lugar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, name, date, description, ticket_id, organiser_id, place_id FROM "Event"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ticket_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['organiser_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['place_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Order -->
    <h2>Órdenes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Monto Total</th>
                <th>Fecha</th>
                <th>ID Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, status, total_amount, date, user_id FROM "Order"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['total_amount']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla OrderItem -->
    <h2>Ítems de Orden</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Orden</th>
                <th>ID Ticket</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, order_id, ticket_id, price, quantity FROM "OrderItem"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ticket_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Organiser -->
    <h2>Organizadores</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, name FROM "Organiser"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Payment -->
    <h2>Pagos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>ID Orden</th>
                <th>ID Transacción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, status, amount, date, order_id, transaction_id FROM "Payment"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['transaction_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Ticket -->
    <h2>Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>ID Zona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, price, status, zone_id FROM "Ticket"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['zone_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Tabla Place -->
    <h2>Lugares</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, name, address, capacity FROM "Place"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['capacity']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Seat -->
    <h2>Asientos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fila</th>
                <th>Número</th>
                <th>Etiqueta</th>
                <th>ID Zona</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, row, number, label, zone_id FROM "Seat"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['row']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['number']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['label']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['zone_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla TicketSupport -->
    <h2>Soporte de Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>Asunto</th>
                <th>Estado</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, user_id, subject, status, message, date FROM "TicketSupport"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Transaction -->
    <h2>Transacciones</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Intentos</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, provider, status, amount, attempt_number, created_at FROM "Transaction"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['provider']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['amount']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['attempt_number']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tabla Zone -->
    <h2>Zonas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>ID Lugar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT id, name, place_id FROM "Zone"';
            $result = pg_query($conn, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['place_id']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Error al obtener datos: " . pg_last_error($conn) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
