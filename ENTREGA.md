# Prueba Técnica – Reporte de Órdenes

**Repositorio:** https://github.com/<!-- PEGAR LINK AQUÍ -->

---

## ¿Qué construí?

Una aplicación web de una sola página desarrollada con **Laravel 12** y **PostgreSQL**, que muestra un reporte de órdenes consultando la base de datos `cariai_test`. No requiere autenticación ni login. Es accesible desde el dominio local `https://reports.local`.

La página presenta:
- Tarjetas de resumen: total de órdenes, unidades vendidas y monto total.
- Tabla de detalle con cada orden, mostrando cliente (nombre + identificación), producto (nombre + referencia), cantidad y total.

---

## Tecnologías utilizadas

- PHP 8.3 / Laravel 12
- PostgreSQL 16
- Nginx con HTTPS (certificado autofirmado, generado automáticamente)
- Docker y Docker Compose
- Tailwind CSS (CDN)

---

## Lo que hice paso a paso

1. **Configuré el entorno Docker** con tres servicios: PHP-FPM (`reports_app`), Nginx (`reports_nginx`) y PostgreSQL (`reports_postgres`).

2. **Configuré HTTPS** con un certificado autofirmado que se genera automáticamente en el primer arranque del contenedor Nginx, sin pasos manuales.

3. **Creé las migraciones** para las tablas `clients`, `products` y `orders`, respetando la estructura del SQL del enunciado con sus llaves foráneas.

4. **Creé los modelos Eloquent** (`Client`, `Product`, `Order`) con sus relaciones (`belongsTo` / `hasMany`).

5. **Creé los seeders** con los datos de prueba del enunciado (5 clientes, 3 productos, 5 órdenes).

6. **Creé el controlador** `ReportController` que carga las órdenes con eager loading y calcula los totales.

7. **Creé la vista** `report.blade.php` con una sola ruta raíz `/`, sin autenticación.

8. **Documenté todo** en el `README.md` con los pasos para levantar el proyecto desde cero.

---

## Pasos para ejecutar el proyecto

```bash
# 1. Agregar el dominio local
echo "127.0.0.1 reports.local" | sudo tee -a /etc/hosts

# 2. Copiar variables de entorno
cd src && cp .env.example .env && cd ..

# 3. Levantar Docker
docker compose up -d --build

# 4. Instalar dependencias
docker compose exec app composer install

# 5. Generar clave de la app
docker compose exec app php artisan key:generate

# 6. Ejecutar migraciones y datos de prueba
docker compose exec app php artisan migrate --force
docker compose exec app php artisan db:seed
```

Abrir en el navegador: **https://reports.local**

> El navegador mostrará una advertencia por el certificado autofirmado. Aceptar la excepción para continuar.
