# Login Laravel con Google Socialite

## Instalación

**1. Descargar el proyecto**

```bash
git clone URL_DEL_REPOSITORIO
cd login-laravel
```

**2. Instalar las dependencias**

```bash
composer install
```

**3. Configurar el archivo `.env`**

Copiar `.env.example` y renombrar la copia como `.env`.

Ejecutar:

```bash
php artisan key:generate
```

**4. Configurar la base de datos**

- Iniciar Apache y MySQL en XAMPP.
- Abrir phpMyAdmin.
- Crear una base de datos llamada `login_db`.
- Importar el archivo `database/login_db_para_profesor.sql` en la base de datos vacía.

Configurar la conexión en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=login_db
DB_USERNAME=root
DB_PASSWORD=
```

No es necesario ejecutar las migraciones si se importó el archivo SQL.

**5. Configurar Google Socialite**

Agregar las credenciales OAuth de Google en `.env`:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

Para probar Google, se necesita un cliente OAuth configurado en Google Cloud con esa URL de redirección y una cuenta autorizada si la aplicación está en modo de prueba.

**6. Ejecutar el proyecto**

```bash
php artisan config:clear
php artisan serve
```

Abrir en el navegador:

http://127.0.0.1:8000

## Funciones disponibles

- Registro de usuarios.
- Inicio y cierre de sesión.
- Inicio de sesión con Google.
- Recuperación de contraseña (requiere configurar el correo).
