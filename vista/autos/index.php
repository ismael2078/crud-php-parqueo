<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Autos - Parqueo</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand">
                <span class="brand-icon">🚗</span>
                <div>
                    <span class="brand-title">Sistema de Parqueo</span>
                    <span class="brand-subtitle">CRUD PHP • Arquitectura MVC + DAO</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="index.php?modulo=autos" class="nav-btn active">🚗 Autos (Asignación)</a>
                <a href="index.php?modulo=productos" class="nav-btn">📦 Productos (PDF)</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="header-card">
            <div class="header-info">
                <h1><span>🚗</span> Control de Autos en Parqueo</h1>
                <p>Base de datos: <strong>parqueo</strong> &nbsp;|&nbsp; Tabla: <strong>auto</strong> &nbsp;|&nbsp; Registros: <strong><?= count($autos) ?></strong></p>
            </div>
            <a href="index.php?accion=nuevo" class="btn btn-primary">
                <span>➕</span> Registrar Nuevo Auto
            </a>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th style="width: 90px;">Foto</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Modelo</th>
                            <th>Tipo de Auto</th>
                            <th style="width: 170px; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($autos)): ?>
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <span class="empty-icon">🚙</span>
                                        <h3>No hay autos registrados</h3>
                                        <p>Presiona el botón "Registrar Nuevo Auto" para añadir el primero.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($autos as $auto): ?>
                                <tr>
                                    <td><strong>#<?= $auto->getId() ?></strong></td>
                                    <td>
                                        <div class="thumbnail-box">
                                            <?php if (!empty($auto->getFotografia())): ?>
                                                <img src="<?= htmlspecialchars($auto->getFotografia()) ?>" alt="Auto" onerror="this.onerror=null; this.src='https://placehold.co/100x70?text=Auto';">
                                            <?php else: ?>
                                                <span class="thumbnail-placeholder">🚗</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-plate"><?= htmlspecialchars($auto->getPlaca()) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-color-dot">
                                            <span class="color-indicator" style="background-color: <?= htmlspecialchars($auto->getColor()) ?>;"></span>
                                            <?= htmlspecialchars($auto->getColor()) ?>
                                        </span>
                                    </td>
                                    <td><strong><?= htmlspecialchars($auto->getModelo()) ?></strong></td>
                                    <td>
                                        <span class="badge badge-tipo"><?= htmlspecialchars($auto->getTipoauto()) ?></span>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="actions-cell" style="justify-content: center;">
                                            <a href="index.php?accion=editar&id=<?= $auto->getId() ?>" class="btn btn-warning btn-sm">
                                                ✏️ Editar
                                            </a>
                                            <a href="index.php?accion=eliminar&id=<?= $auto->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar el auto con placa <?= htmlspecialchars($auto->getPlaca()) ?>?');">
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
            <p>Proyecto CRUD PHP • MVC + DAO • Sistema Parqueo (Tabla: auto)</p>
        </footer>
    </main>
</body>
</html>
