<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MercaCompra - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        verde:        '#2D6A4F',
                        'verde-md':   '#40916C',
                        'verde-lt':   '#52B788',
                        menta:        '#B7E4C7',
                        crema:        '#FEFAE0',
                        'crema-dk':   '#F2EDD5',
                        naranja:      '#E76F51',
                        'naranja-lt': '#F4A261',
                        marron:       '#5C3D2E',
                    },
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        body:    ['"DM Sans"', 'sans-serif'],
                    },
                    keyframes: {
                        fadeUp: {
                            '0%':   { opacity: '0', transform: 'translateY(24px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%,100%': { transform: 'translateY(0px)' },
                            '50%':     { transform: 'translateY(-10px)' },
                        },
                        pulseS: {
                            '0%,100%': { opacity: '1' },
                            '50%':     { opacity: '.55' },
                        },
                    },
                    animation: {
                        'fade-up':    'fadeUp 0.7s ease both',
                        'fade-up-1':  'fadeUp 0.7s 0.15s ease both',
                        'fade-up-2':  'fadeUp 0.7s 0.30s ease both',
                        'fade-up-3':  'fadeUp 0.7s 0.45s ease both',
                        'fade-up-4':  'fadeUp 0.7s 0.60s ease both',
                        'float':      'float 4s ease-in-out infinite',
                        'float-d':    'float 4s 1s ease-in-out infinite',
                        'pulse-s':    'pulseS 3s ease-in-out infinite',
                    },
                }
            }
        }
    </script>
    <style>
        /* Grain overlay sutil */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 50;
            opacity: 0.35;
        }

        .blob  { border-radius: 60% 40% 55% 45% / 45% 55% 40% 60%; }
        .blob2 { border-radius: 40% 60% 45% 55% / 55% 45% 60% 40%; }

        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(45,106,79,0.15); }

        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute;
            bottom: -3px; left: 0;
            width: 0; height: 2px;
            background: #E76F51;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }

        .food-badge {
            background: white; border-radius: 50%;
            width: 56px; height: 56px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .step-num {
            width: 48px; height: 48px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif;
            font-weight: 900; font-size: 1.3rem; flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-crema font-body overflow-x-hidden">

    <!-- ════════ NAV ════════ -->
    <nav class="sticky top-0 z-40 bg-crema/90 backdrop-blur-sm border-b-2 border-menta">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="index.html" class="font-display text-2xl font-black text-verde tracking-tight">
                Merca<span class="text-naranja">Compra</span>
            </a>
            <ul class="hidden md:flex items-center gap-8">
                <li><a href="index.html"  class="nav-link text-marron font-medium text-sm hover:text-verde transition-colors">Inicio</a></li>
                <li><a href="menu.html"   class="nav-link text-marron font-medium text-sm hover:text-verde transition-colors">Menú Semanal</a></li>
                <li><a href="lista.html"  class="nav-link text-marron font-medium text-sm hover:text-verde transition-colors">Lista de la Compra</a></li>
            </ul>
            <a href="menu.html" class="hidden md:inline-flex items-center gap-2 bg-verde text-crema text-sm font-semibold px-5 py-2.5 rounded-full hover:bg-verde-md transition-colors shadow-md">
                Empezar →
            </a>
            <button id="menu-btn" class="md:hidden text-verde">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-crema border-t border-menta px-6 py-4 flex flex-col gap-4">
            <a href="index.html"  class="text-marron font-medium">Inicio</a>
            <a href="menu.html"   class="text-marron font-medium">Menú Semanal</a>
            <a href="lista.html"  class="text-marron font-medium">Lista de la Compra</a>
            <a href="menu.html"   class="bg-verde text-crema text-sm font-semibold px-5 py-2.5 rounded-full text-center">Empezar →</a>
        </div>
    </nav>

    <!-- ════════ HERO ════════ -->
    <section class="relative min-h-[88vh] flex items-center overflow-hidden">
        <!-- Blobs decorativos -->
        <div class="blob absolute -top-20 -left-32 w-96 h-96 bg-menta/40 animate-pulse-s pointer-events-none"></div>
        <div class="blob2 absolute -bottom-24 -right-24 w-80 h-80 bg-naranja-lt/20 animate-pulse-s pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center w-full">

            <!-- Texto izquierda -->
            <div class="space-y-8">
                <span class="animate-fade-up inline-block bg-menta text-verde text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full">
                    🌿 Planificación inteligente
                </span>

                <h1 class="animate-fade-up-1 font-display text-5xl md:text-6xl font-black text-marron leading-tight">
                    Planifica tu semana.<br>
                    <em class="text-verde not-italic">Come bien</em>,<br>
                    compra <span class="text-naranja">justo</span>.
                </h1>

                <p class="animate-fade-up-2 text-marron/70 text-lg leading-relaxed max-w-md">
                    Crea tu menú semanal, genera automáticamente la lista de la compra y evita desperdiciar comida ni dinero.
                </p>

                <div class="animate-fade-up-3 flex flex-wrap gap-4">
                    <a href="menu.html"
                       class="inline-flex items-center gap-2 bg-verde text-crema font-semibold px-7 py-3.5 rounded-full shadow-lg hover:bg-verde-md transition-all hover:shadow-xl hover:-translate-y-0.5">
                        Planificar menú
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="lista.html"
                       class="inline-flex items-center gap-2 bg-crema border-2 border-verde text-verde font-semibold px-7 py-3.5 rounded-full hover:bg-menta/40 transition-all">
                        Ver lista de compra
                    </a>
                </div>

                <!-- Estadísticas -->
                <div class="animate-fade-up-4 flex gap-8 pt-2">
                    <div>
                        <p class="font-display text-3xl font-black text-verde">7</p>
                        <p class="text-marron/60 text-sm">días planificados</p>
                    </div>
                    <div class="w-px bg-menta"></div>
                    <div>
                        <p class="font-display text-3xl font-black text-naranja">21</p>
                        <p class="text-marron/60 text-sm">comidas por semana</p>
                    </div>
                    <div class="w-px bg-menta"></div>
                    <div>
                        <p class="font-display text-3xl font-black text-verde-lt">0</p>
                        <p class="text-marron/60 text-sm">desperdicio</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta visual derecha -->
            <div class="relative flex justify-center animate-fade-up-2">
                <!-- Badges flotantes -->
                <div class="food-badge absolute -top-4 -left-4 animate-float z-10">🥦</div>
                <div class="food-badge absolute top-16 -right-6 animate-float-d z-10">🍅</div>
                <div class="food-badge absolute -bottom-4 left-8 animate-float z-10" style="animation-delay:0.5s">🥚</div>
                <div class="food-badge absolute bottom-12 -right-2 animate-float-d z-10" style="animation-delay:0.8s">🥕</div>

                <div class="relative bg-white rounded-3xl shadow-2xl p-7 w-full max-w-sm border border-menta/60">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="font-display font-bold text-marron text-lg">Menú esta semana</h3>
                        <span class="text-xs bg-verde text-crema px-3 py-1 rounded-full font-semibold">Sem. 15</span>
                    </div>
                    <div class="space-y-3">
                        <!-- Día 1 -->
                        <div class="flex items-center gap-3 bg-crema rounded-xl px-4 py-2.5">
                            <span class="text-xs font-bold text-verde-lt uppercase tracking-wider w-7">LUN</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-marron">Lentejas con verduras</p>
                                <p class="text-xs text-marron/50">Cena · Tortilla de patatas</p>
                            </div>
                            <span class="text-green-500 text-sm font-bold">✓</span>
                        </div>
                        <!-- Día 2 -->
                        <div class="flex items-center gap-3 bg-crema rounded-xl px-4 py-2.5">
                            <span class="text-xs font-bold text-verde-lt uppercase tracking-wider w-7">MAR</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-marron">Pollo al horno</p>
                                <p class="text-xs text-marron/50">Cena · Ensalada verde</p>
                            </div>
                            <span class="text-green-500 text-sm font-bold">✓</span>
                        </div>
                        <!-- Día sin planificar -->
                        <div class="flex items-center gap-3 bg-naranja/10 border border-naranja/30 rounded-xl px-4 py-2.5">
                            <span class="text-xs font-bold text-naranja uppercase tracking-wider w-7">MIÉ</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-marron">Sin planificar</p>
                                <p class="text-xs text-marron/50">¡Añade una comida!</p>
                            </div>
                            <span class="text-naranja font-bold text-lg">+</span>
                        </div>
                        <!-- Día 4 -->
                        <div class="flex items-center gap-3 bg-crema rounded-xl px-4 py-2.5 opacity-60">
                            <span class="text-xs font-bold text-verde-lt uppercase tracking-wider w-7">JUE</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-marron">Pasta boloñesa</p>
                                <p class="text-xs text-marron/50">Cena · Fruta</p>
                            </div>
                        </div>
                    </div>
                    <!-- Badge lista compra -->
                    <div class="mt-5 bg-verde/10 border border-verde/20 rounded-2xl px-4 py-3 flex items-center gap-3">
                        <div class="w-10 h-10 bg-verde rounded-xl flex items-center justify-center text-crema text-lg flex-shrink-0">🛒</div>
                        <div>
                            <p class="text-sm font-semibold text-verde">Lista generada</p>
                            <p class="text-xs text-verde/70">14 productos · 3 pendientes</p>
                        </div>
                        <a href="lista.html" class="ml-auto text-verde text-xs font-bold hover:underline whitespace-nowrap">Ver →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════ ACCESOS ════════ -->
    <section class="bg-crema py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="font-display text-4xl font-black text-marron">¿Por dónde <em class="text-naranja">empezamos?</em></h2>
                <p class="text-marron/60 mt-3 text-lg">Elige tu punto de entrada</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Menú -->
                <a href="menu.html" class="card-hover group relative overflow-hidden bg-verde rounded-3xl p-10 shadow-lg flex flex-col justify-between min-h-64">
                    <div class="blob2 absolute -right-10 -bottom-10 w-48 h-48 bg-verde-lt/30 pointer-events-none"></div>
                    <div>
                        <span class="text-5xl block mb-4">🗓️</span>
                        <h3 class="font-display text-3xl font-black text-crema mb-2">Menú Semanal</h3>
                        <p class="text-crema/70 leading-relaxed">Planifica los 7 días. Añade tus recetas, organiza comidas y cenas a tu gusto.</p>
                    </div>
                    <div class="mt-8 inline-flex items-center gap-2 bg-crema text-verde font-bold px-6 py-3 rounded-full text-sm w-fit group-hover:gap-4 transition-all">
                        Ir al menú <span>→</span>
                    </div>
                </a>

                <!-- Lista -->
                <a href="lista.html" class="card-hover group relative overflow-hidden bg-naranja rounded-3xl p-10 shadow-lg flex flex-col justify-between min-h-64">
                    <div class="blob absolute -left-10 -top-10 w-48 h-48 bg-naranja-lt/40 pointer-events-none"></div>
                    <div>
                        <span class="text-5xl block mb-4">🛒</span>
                        <h3 class="font-display text-3xl font-black text-crema mb-2">Lista de la Compra</h3>
                        <p class="text-crema/70 leading-relaxed">Revisa qué te falta, marca lo que ya tienes y lleva la lista al súper desde el móvil.</p>
                    </div>
                    <div class="mt-8 inline-flex items-center gap-2 bg-crema text-naranja font-bold px-6 py-3 rounded-full text-sm w-fit group-hover:gap-4 transition-all">
                        Ver lista <span>→</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ════════ FOOTER ════════ -->
    <footer class="bg-marron text-crema/70 py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <span class="font-display text-xl font-black text-crema">
                Merca<span class="text-naranja-lt">Compra</span>
            </span>
            <p class="text-sm text-crema/50">© 2026 MercaCompra · Planifica, compra, disfruta 🌿</p>
            <div class="flex gap-6 text-sm">
                <a href="menu.html"  class="hover:text-crema transition-colors">Menú</a>
                <a href="lista.html" class="hover:text-crema transition-colors">Lista</a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>