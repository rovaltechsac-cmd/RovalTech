@extends('layouts.app')

@section('title', 'Iniciar sesión | Roval Tech')
@section('description', 'Acceso al panel de administración de proyectos de Roval Tech.')

@section('content')

<section class="auth-shell">
    <div class="container">
        <div class="auth-card reveal">
            <span class="eyebrow"><span class="dot"></span> Acceso restringido</span>
            <h1>Ingresar al panel</h1>
            <p>Administra los proyectos publicados en el sitio de Roval Tech.</p>

            @if (session('success'))
                <div class="alert-success" role="status">
                    <span aria-hidden="true">✓</span>
                    <div><strong>Listo</strong>{{ session('success') }}</div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-success" role="alert" style="border-color:#603838;color:#d98a8a;background:rgba(217,138,138,.06);">
                    <span aria-hidden="true">!</span>
                    <div><strong>Revisa tus datos</strong>{{ $errors->first() }}</div>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Correo electrónico <span>*</span></label>
                    <input id="email" name="email" type="email" class="form-control"
                           value="{{ old('email') }}" placeholder="nombre@empresa.com"
                           autocomplete="username" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña <span>*</span></label>
                    <input id="password" name="password" type="password" class="form-control"
                           placeholder="••••••••" autocomplete="current-password" required>
                </div>

                <div class="checkbox-row" style="margin:4px 0 24px;">
                    <input type="checkbox" id="remember" name="remember" value="1" style="accent-color:var(--color-copper);">
                    <label for="remember" style="color:var(--color-fog);font-size:13px;cursor:pointer;">Mantener la sesión iniciada</label>
                </div>

                <button type="submit" class="btn btn-primary btn-arrow">Ingresar</button>
            </form>

            <div class="auth-hint">
                <strong style="color:var(--color-bone);font-weight:500;">Cuenta de demostración</strong><br>
                Correo: <code>admin@rovaltech.com</code><br>
                Contraseña: <code>rovaltech2026</code>
            </div>
        </div>
    </div>
</section>

@endsection
