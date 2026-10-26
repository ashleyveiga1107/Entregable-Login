
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Aero Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            font-family: "Segoe UI", Tahoma, sans-serif;

            background:
                radial-gradient(
                    ellipse at 85% 85%,
                    rgba(122, 241, 255, 0.95),
                    transparent 48%
                ),
                radial-gradient(
                    ellipse at 15% 15%,
                    rgba(0, 48, 122, 0.9),
                    transparent 60%
                ),
                linear-gradient(
                    135deg,
                    #003c90 0%,
                    #0075df 50%,
                    #4fd6f4 100%
                );
        }

        /* Líneas luminosas del fondo */
        body::before {
            content: "";
            position: fixed;
            width: 130vw;
            height: 65vh;
            left: -15vw;
            top: 25%;
            border-top: 2px solid rgba(255,255,255,0.35);
            border-radius: 50%;
            transform: rotate(15deg);
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 120vw;
            height: 60vh;
            left: -10vw;
            bottom: -35%;
            border-top: 2px solid rgba(150,255,120,0.5);
            border-radius: 50%;
            transform: rotate(-12deg);
            pointer-events: none;
        }

        /* Ventana de cristal Aero */
        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 35px;
            color: white;

            background: linear-gradient(
                135deg,
                rgba(255,255,255,0.28),
                rgba(255,255,255,0.09)
            );

            border: 1px solid rgba(255,255,255,0.65);
            border-radius: 18px;

            box-shadow:
                0 20px 60px rgba(0,35,90,0.4),
                inset 0 1px 1px rgba(255,255,255,0.8);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        h2 {
            text-align: center;
            font-size: 30px;
            font-weight: 400;
            margin: 10px 0 30px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            height: 46px;
            padding: 0 14px;

            background: linear-gradient(
                to bottom,
                #ffffff,
                #e3f3ff
            );

            border: 1px solid #9bc8ed;
            border-radius: 7px;

            color: #244768;
            font-size: 15px;
            font-family: inherit;

            box-shadow:
                inset 0 2px 4px rgba(0,0,0,0.12),
                0 1px 0 rgba(255,255,255,0.3);

            outline: none;
        }

        .form-input:focus {
            border-color: #4cc8ff;
            box-shadow:
                0 0 0 3px rgba(150,225,255,0.35),
                inset 0 2px 4px rgba(0,0,0,0.08);
        }

        /* Botón clásico brillante */
        .btn-login {
            width: 100%;
            height: 48px;
            margin-top: 8px;

            border: 1px solid #83dfff;
            border-radius: 7px;

            background: linear-gradient(
                to bottom,
                #8ae5ff 0%,
                #25b8ff 45%,
                #0074e7 50%,
                #0056bc 100%
            );

            color: white;
            font-size: 17px;
            font-weight: 600;
            font-family: inherit;
            text-shadow: 0 1px 2px #004584;

            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.9),
                0 4px 10px rgba(0,45,110,0.3);

            cursor: pointer;
            transition: filter 0.2s, transform 0.2s;
        }

        .btn-login:hover {
            filter: brightness(1.15);
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        .separator {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 25px 0;
            font-size: 14px;
            color: #f0faff;
        }

        .separator::before,
        .separator::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.45);
        }

        /* Botón de Google */
        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;

            width: 100%;
            min-height: 46px;
            padding: 10px;

            background: linear-gradient(
                to bottom,
                #ffffff,
                #dceaf5
            );

            border: 1px solid #b7d5eb;
            border-radius: 7px;

            color: #315779;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;

            box-shadow:
                inset 0 1px 0 white,
                0 3px 8px rgba(0,40,100,0.2);

            transition: filter 0.2s;
        }

        .btn-google:hover {
            filter: brightness(1.08);
        }

        .google-icon {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        .links {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            line-height: 2;
        }

        .links a {
            color: #ffffff;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .links a:hover {
            color: #c4f6ff;
        }

        .error {
            background: rgba(180, 20, 40, 0.35);
            border: 1px solid rgba(255,180,180,0.6);
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .status {
            background: rgba(15,130,70,0.4);
            border: 1px solid rgba(160,255,190,0.5);
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 25px 20px;
            }

            h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

    <div class="card">

        <h2>Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="error" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('status'))
            <div class="status" role="status">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login tradicional -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input
                    class="form-input"
                    id="email"
                    type="email"
                    name="email"
                    placeholder="tucorreo@ejemplo.com"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input
                    class="form-input"
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Tu contraseña"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button class="btn-login" type="submit">
                Ingresar
            </button>
        </form>

        <div class="separator">
            O inicia sesión con
        </div>

        <!-- Login con Google -->
        <a href="{{ route('google.login') }}"
           class="btn-google">

            <svg class="google-icon" viewBox="0 0 24 24"
                 aria-hidden="true">
                <path fill="#4285F4"
                    d="M21.35 12.22c0-.71-.06-1.39-.18-2.05H12v3.87h5.24a4.48 4.48 0 0 1-1.95 2.94v2.44h3.15c1.84-1.7 2.91-4.2 2.91-7.2z"/>
                <path fill="#34A853"
                    d="M12 21.5c2.63 0 4.84-.87 6.45-2.36l-3.15-2.44c-.87.59-1.98.94-3.3.94-2.54 0-4.69-1.72-5.46-4.03H3.29v2.52A9.75 9.75 0 0 0 12 21.5z"/>
                <path fill="#FBBC05"
                    d="M6.54 13.61a5.86 5.86 0 0 1 0-3.22V7.87H3.29a9.75 9.75 0 0 0 0 8.26z"/>
                <path fill="#EA4335"
                    d="M12 6.36c1.43 0 2.72.49 3.73 1.47l2.8-2.8A9.32 9.32 0 0 0 12 2.5a9.75 9.75 0 0 0-8.71 5.37l3.25 2.52C7.31 8.08 9.46 6.36 12 6.36z"/>
            </svg>

            Continuar con Google
        </a>

        <div class="links">
            <a href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>

            <div>
                ¿No tienes cuenta?
                <a href="{{ route('register') }}">
                    Regístrate aquí
                </a>
            </div>
        </div>

    </div>

</body>
</html>
