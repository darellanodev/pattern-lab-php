# AGENTS.md

## Qué hace el proyecto

**Pattern Lab PHP** es un proyecto educativo que implementa patrones de diseño en PHP con ejemplos interactivos. Cada patrón tiene una implementación en `src/` y un demo HTML/PHP en `examples/` que se puede abrir en el navegador.

Patrones implementados:
- **Structural**: Adapter, Decorator, Composite, Bridge, Facade
- **Techniques**: Fluent Interface

## Stack tecnológico

| Componente       | Tecnología                  |
|------------------|-----------------------------|
| Lenguaje         | PHP 8.2+                    |
| Testing          | PHPUnit 10                  |
| Linting          | PHP CodeSniffer (phpcs)     |
| Estándar código  | PSR-12 + comillas simples   |
| Frontend demos   | Tailwind CSS (CDN)          |
| Autoload         | PSR-4 (Composer)            |
| Gestor paquetes  | Composer                    |

## Estructura de carpetas

```
├── src/                    # Código fuente (App\)
│   ├── Helpers/            # Utilidades compartidas
│   ├── Structural/         # Patrones estructurales
│   │   ├── Adapter/AudioPlayer/
│   │   ├── Bridge/Notificator/
│   │   ├── Composite/FileSystem/
│   │   ├── Decorator/Pizza/
│   │   └── Facade/MoviePlayer/
│   └── Techniques/         # Técnicas de diseño
│       └── FluentInterface/Game/
├── tests/                  # Tests PHPUnit (Tests\)
│   └── Helpers/
├── examples/               # Demos HTML/PHP ejecutables
│   ├── structural/
│   └── techniques/
├── openspec/               # OpenSpec (schema: spec-driven)
│   ├── changes/            # Cambios activos
│   │   └── archive/        # Cambios archivados
│   ├── specs/              # Specs (vacío actualmente)
│   └── config.yaml
├── .opencode/              # Config OpenCode AI
│   └── skills/             # Skills personalizados
├── composer.json
├── phpunit.xml
├── phpcs.xml
└── run_tests.sh
```

## Convenciones de código (reales del repo)

### Namespaces y autoloading
- PSR-4: `App\` → `src/`, `Tests\` → `tests/`
- El namespace refleja la estructura de directorios exactamente:
  `App\Structural\Adapter\AudioPlayer\AudioPlayer`

### Estilo de código
- **PSR-12** como base
- **Comillas simples** siempre que no haya interpolación (regla phpcs: `Squiz.Strings.DoubleQuoteUsage`)
- Una clase por archivo
- Interfaces para contratos (`MediaPlayer`, `Pizza`, `FileSystemComponent`, `NotificationChannel`)
- Clases abstractas para comportamiento compartido (`PizzaDecorator`, `Notification`)
- Constructor promotion cuando es apropiado (`private string $name`)
- Propiedades con tipos de PHP 8.2+

### Estructura de patrones
Cada patrón sigue esta organización:
```
src/Structural/{Patron}/{Subsistema}/
    ├── {Interface}.php          # Contrato
    ├── {ClasePrincipal}.php     # Implementación principal
    └── {ClasesSoporte}.php      # Implementaciones concretas
```

### Ejemplos (examples/)
- Cada demo es un archivo `index.php` autocontenido
- Usan Tailwind CSS vía CDN
- Tema oscuro consistente (`class="dark"`)
- Estructura HTML fija: título, descripción del patrón, output en `<pre>`, enlace "Back to Patterns"
- Autoload relativo: `require_once __DIR__.'/../../../../vendor/autoload.php';`

### Tests
- Namespace `Tests\` → `tests/`
- Extienden `PHPUnit\Framework\TestCase`
- Nombre del archivo: `{Clase}Test.php`
- Métodos: `test{NombreDelMetodo}(): void`
- Solo `tests/Helpers/` tiene tests actualmente

## Comandos

```bash
# Instalar dependencias
composer install

# Ejecutar tests
./run_tests.sh                    # Git Bash
vendor/bin/phpunit                # Directo

# Verificar estilo de código
vendor/bin/phpcs                  # Usa phpcs.xml (PSR-12 + comillas simples)

# Corregir automáticamente
vendor/bin/phpcbf                 # Auto-fix lo que pueda
```

## Reglas OpenSpec

1. **Antes de codear**: revisar `openspec list` para cambios activos
2. **Crear cambio**: `openspec new change "<nombre>"` si se va a implementar algo nuevo
3. **Validar**: `openspec validate` antes de dar por terminado un cambio
4. **Archivar**: `openspec archive` al acabar un cambio
5. **Schema**: `spec-driven` (configurado en `openspec/config.yaml`)
6. **Actualizar AGENTS.md**: Si un change introduce o modifica convenciones, comandos, estructura o dependencias relevantes, actualizar `AGENTS.md` como parte de ese mismo change.
7. **Campos importantes**:
   - `openspec/changes/` → cambios en progreso
   - `openspec/changes/archive/` → cambios completados
   - `openspec/specs/` → especificaciones (actualmente vacío)

## Notas importantes

- El proyecto es educativo, no productivo
- Los demos se abren directamente en el navegador vía XAMPP
- No hay build step, no hay minificación
- Tailwind se carga vía CDN (no instalado localmente)
- Solo `Helpers/PatternCard` tiene tests; los patrones no tienen tests unitarios aún
