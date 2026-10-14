<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - Tienda1</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand">
                <span class="brand-icon">📦</span>
                <div>
                    <span class="brand-title">Sistema de Tienda (PDF)</span>
                    <span class="brand-subtitle">CRUD PHP • Arquitectura MVC + DAO</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="index.php?modulo=autos" class="nav-btn">🚗 Autos (Asignación)</a>
                <a href="index.php?modulo=productos" class="nav-btn active">📦 Productos (PDF)</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="header-card">
            <div class="header-info">
                <h1><span>📦</span> Catálogo de Productos</h1>
                <p>Base de datos: <strong>tienda1</strong> &nbsp;|&nbsp; Tabla: <strong>producto</strong> &nbsp;|&nbsp; Registros: <strong><?= count($productos) ?></strong></p>
            </div>
            <a href="index.php?modulo=productos&accion=nuevo" class="btn btn-primary">
                <span>➕</span> Nuevo Producto
            </a>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Nombre del Producto</th>
                            <th style="width: 140px;">Precio</th>
                            <th style="width: 120px;">Stock</th>
                            <th style="width: 170px; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($productos)): ?>
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <span class="empty-icon">📦</span>
                                        <h3>No hay productos registrados</h3>
                                        <p>Presiona el botón "Nuevo Producto" para añadir uno.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><strong>#<?= $producto->getId() ?></strong></td>
                                    <td><strong><?= htmlspecialchars($producto->getNombre()) ?></strong></td>
                                    <td>
                                        <span style="font-weight: 700; color: #047857;">
                                            $<?= number_format($producto->getPrecio(), 2) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background: <?= $producto->getStock() > 5 ? '#dcfce7; color:#15803d' : '#fee2e2; color:#b91c1c' ?>;">
                                            <?= $producto->getStock() ?> unidades
                                        </span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="actions-cell" style="justify-content: center;">
                                            <a href="index.php?modulo=productos&accion=editar&id=<?= $producto->getId() ?>" class="btn btn-warning btn-sm">
                                                ✏️ Editar
                                            </a>
                                            <a href="index.php?modulo=productos&accion=eliminar&id=<?= $producto->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar el producto <?= htmlspecialchars($producto->getNombre()) ?>?');">
                                                🗑️ Eliminar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer class="footer-note">
            <p>Proyecto CRUD PHP • MVC + DAO • Ejemplo Base del PDF</p>
        </footer>
    </main>
</body>
</html>
