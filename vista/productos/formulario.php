<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $producto->getId() ? 'Editar Producto' : 'Nuevo Producto' ?> - Tienda1</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="index.php?modulo=productos" class="brand">
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
        <div class="form-card">
            <div class="form-header">
                <h2>
                    <span><?= $producto->getId() ? '✏️' : '➕' ?></span>
                    <?= $producto->getId() ? 'Editar Producto #' . $producto->getId() : 'Nuevo Producto' ?>
                </h2>
            </div>

            <form action="index.php?modulo=productos&accion=<?= $producto->getId() ? 'actualizar' : 'guardar' ?>" method="POST">
                <div class="form-body">
                    <?php if ($producto->getId()): ?>
                        <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nombre">Nombre del Producto <span style="color:var(--danger)">*</span></label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required 
                               placeholder="Ej: Teclado Mecánico RGB" 
                               value="<?= htmlspecialchars($producto->getNombre() ?? '') ?>" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio ($) <span style="color:var(--danger)">*</span></label>
                        <input type="number" step="0.01" min="0" id="precio" name="precio" class="form-control" required 
                               placeholder="Ej: 49.99" 
                               value="<?= htmlspecialchars($producto->getPrecio() ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock Disponible <span style="color:var(--danger)">*</span></label>
                        <input type="number" min="0" id="stock" name="stock" class="form-control" required 
                               placeholder="Ej: 25" 
                               value="<?= htmlspecialchars($producto->getStock() ?? '') ?>">
                    </div>
                </div>

                <div class="form-footer">
                    <a href="index.php?modulo=productos" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> <?= $producto->getId() ? 'Actualizar Producto' : 'Guardar Producto' ?>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
