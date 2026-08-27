## Why

The 6 example `index.php` files under `examples/` share identical HTML structure: DOCTYPE, head with Tailwind CDN, dark-themed body, container layout, description card, `<pre>` output block, and "Back to Patterns" link. Only 4 parameters differ per example (title, subtitle, description, output). This duplication means any layout change requires editing all 6 files, and inconsistencies can creep in.

## What Changes

- Create `src/Helpers/ExampleLayout.php` — a static helper (following the existing `PatternCard` pattern) that renders the shared HTML structure.
- Refactor all 6 `examples/**/index.php` files to use `ExampleLayout::render()` instead of inline HTML.
- The PHP logic section of each example (use statements, pattern instantiation, `$output` population) remains untouched.

## Capabilities

### New Capabilities
- `example-layout`: A helper class that renders the common HTML layout for pattern demo pages, accepting title, subtitle, description, and output array as parameters.

### Modified Capabilities

_(none — no existing specs are affected)_

## Impact

- **New file**: `src/Helpers/ExampleLayout.php`
- **Modified files**: 6 example `index.php` files
  - `examples/structural/adapter/audio_player/index.php`
  - `examples/structural/decorator/pizza/index.php`
  - `examples/structural/composite/filesystem/index.php`
  - `examples/structural/bridge/notificator/index.php`
  - `examples/structural/facade/movie_player/index.php`
  - `examples/techniques/fluent_interface/game/index.php`
- **No new dependencies** — pure PHP, no Composer changes needed.
