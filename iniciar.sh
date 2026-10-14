#!/bin/bash
echo "=========================================="
echo "  Iniciando Servidor Web PHP (CRUD)"
echo "=========================================="
echo "Abriendo en tu navegador: http://localhost:8000"
open "http://localhost:8000"
/opt/homebrew/bin/php -S localhost:8000 -t "$(dirname "$0")"
