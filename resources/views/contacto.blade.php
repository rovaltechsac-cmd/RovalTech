@extends('layouts.app')

@section('title', 'Contacto | Roval Tech')
@section('description', 'Contacta con Roval Tech para cotizaciones, consultoría, soporte técnico, compra de componentes y capacitación.')

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span><span>Contacto</span>
        </nav>
        <span class="eyebrow"><span class="dot"></span> Estemos en contacto</span>
        <h1>Hablemos de <span class="grad-text">tu próximo proyecto</span></h1>
        <p>Cuéntanos tu idea, tu necesidad o tu reto técnico. Nos pondremos en contacto para analizarlo y proponerte una solución.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <aside class="contact-info">
            <div class="contact-item reveal">
                <div class="icon-box icon-blue">✉</div>
                <div><h3>Correo electrónico</h3><p><a href="mailto:contacto@rovaltech.com">contacto@rovaltech.com</a></p></div>
            </div>
            <div class="contact-item reveal">
                <div class="icon-box icon-cyan">☎</div>
                <div><h3>Teléfono</h3><p><a href="tel:+525500000000">+52 55 0000 0000</a></p></div>
            </div>
            <div class="contact-item reveal">
                <div class="icon-box icon-green">⌖</div>
                <div><h3>Ubicación</h3><p>México · Atención a nivel local y remoto</p></div>
            </div>
            <div class="contact-item reveal">
                <div class="icon-box icon-amber">◷</div>
                <div><h3>Horario de atención</h3><p>Lunes a viernes · 9:00 a 18:00</p></div>
            </div>
            <div class="contact-note reveal">
                <strong>¿Sabías que podemos ayudarte desde el primer paso?</strong>
                Te apoyamos con estudios de factibilidad, expedientes técnicos y cotizaciones para que tomes decisiones con información clara.
            </div>
        </aside>

        <div class="form-card reveal">
            <h2>Envíanos un mensaje</h2>
            <p>Completa el formulario y daremos seguimiento a tu solicitud.</p>

            @if (session('success'))
                <div class="alert-success" role="status">
                    <span aria-hidden="true">✓</span>
                    <div><strong>Mensaje recibido</strong>{{ session('success') }}</div>
                </div>
            @endif

            <form action="{{ route('contacto.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre completo <span>*</span></label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre" value="{{ old('nombre') }}" required>
                        @error('nombre') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico <span>*</span></label>
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="nombre@empresa.com" value="{{ old('correo') }}" required>
                        @error('correo') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="empresa">Empresa <span style="font-weight:400;color:#8a9ab0;">(opcional)</span></label>
                        <input type="text" id="empresa" name="empresa" class="form-control" placeholder="Nombre de tu empresa" value="{{ old('empresa') }}">
                        @error('empresa') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto <span>*</span></label>
                        <select id="asunto" name="asunto" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                            <option value="Cotización de proyecto" {{ old('asunto') == 'Cotización de proyecto' ? 'selected' : '' }}>Cotización de proyecto</option>
                            <option value="Consultoría e ingeniería" {{ old('asunto') == 'Consultoría e ingeniería' ? 'selected' : '' }}>Consultoría e ingeniería</option>
                            <option value="Soporte o mantenimiento" {{ old('asunto') == 'Soporte o mantenimiento' ? 'selected' : '' }}>Soporte o mantenimiento</option>
                            <option value="Compra de componentes" {{ old('asunto') == 'Compra de componentes' ? 'selected' : '' }}>Compra de componentes</option>
                            <option value="Capacitación" {{ old('asunto') == 'Capacitación' ? 'selected' : '' }}>Capacitación</option>
                            <option value="Otro" {{ old('asunto') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('asunto') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje <span>*</span></label>
                    <textarea id="mensaje" name="mensaje" class="form-control" placeholder="Describe brevemente tu proyecto o consulta..." required>{{ old('mensaje') }}</textarea>
                    @error('mensaje') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-arrow">Enviar mensaje</button>
                    <small>Al enviar aceptas que Roval Tech use tus datos para responder tu solicitud.</small>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
