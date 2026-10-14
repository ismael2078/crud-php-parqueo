<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $auto->getId() ? 'Editar Auto' : 'Registrar Auto' ?> - Parqueo</title>
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
        <div class="form-card">
            <div class="form-header">
                <h2>
                    <span><?= $auto->getId() ? '✏️' : '➕' ?></span>
                    <?= $auto->getId() ? 'Editar Datos del Auto #' . $auto->getId() : 'Registrar Nuevo Auto' ?>
                </h2>
            </div>

            <form action="index.php?accion=<?= $auto->getId() ? 'actualizar' : 'guardar' ?>" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                    <?php if ($auto->getId()): ?>
                        <input type="hidden" name="id" value="<?= $auto->getId() ?>">
                        <input type="hidden" name="foto_actual" value="<?= htmlspecialchars($auto->getFotografia() ?? '') ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="placa">Placa del Vehículo <span style="color:var(--danger)">*</span></label>
                        <input type="text" id="placa" name="placa" class="form-control" required 
                               placeholder="Ej: ABC-123" 
                               value="<?= htmlspecialchars($auto->getPlaca() ?? '') ?>" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="color">Color del Vehículo <span style="color:var(--danger)">*</span></label>
                        <input type="text" id="color" name="color" class="form-control" required 
                               placeholder="Ej: Rojo, Azul Marino, Blanco Perla" 
                               value="<?= htmlspecialchars($auto->getColor() ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="modelo">Modelo / Marca <span style="color:var(--danger)">*</span></label>
                        <input type="text" id="modelo" name="modelo" class="form-control" required 
                               placeholder="Ej: Toyota Corolla 2024, Ford Explorer" 
                               value="<?= htmlspecialchars($auto->getModelo() ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="tipoauto">Tipo de Auto <span style="color:var(--danger)">*</span></label>
                        <select id="tipoauto" name="tipoauto" class="form-control" required>
                            <option value="">-- Selecciona el tipo --</option>
                            <?php
                            $tipos = ["Sedán", "SUV", "Camioneta", "Hatchback", "Deportivo", "Van / Minivan", "Pickup"];
                            foreach ($tipos as $tipo):
                                $selected = ($auto->getTipoauto() === $tipo) ? 'selected' : '';
                            ?>
                                <option value="<?= $tipo ?>" <?= $selected ?>><?= $tipo ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_archivo">Fotografía (Subir archivo o pegar URL)</label>
                        <input type="file" id="foto_archivo" name="foto_archivo" class="form-control" accept="image/*">
                        
                        <div style="margin-top: 8px;">
                            <input type="text" id="fotografia" name="fotografia" class="form-control" 
                                   placeholder="O pega una URL de imagen (opcional)" 
                                   value="<?= htmlspecialchars($auto->getFotografia() ?? '') ?>">
                        </div>

                        <?php if (!empty($auto->getFotografia())): ?>
                            <div class="preview-container">
                                <span style="font-size: 0.85rem; color: var(--text-muted);">Foto actual:</span>
                                <img src="<?= htmlspecialchars($auto->getFotografia()) ?>" alt="Preview" class="preview-img" onerror="this.style.display='none'">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> <?= $auto->getId() ? 'Actualizar Auto' : 'Guardar Auto' ?>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
