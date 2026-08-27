## 1. Create ExampleLayout Helper

- [x] 1.1 Create `src/Helpers/ExampleLayout.php` with `App\Helpers\ExampleLayout` class
- [x] 1.2 Implement `buildHtml(string $title, string $subtitle, string $description, array $output): string` — escapes title, renders description as raw HTML, joins output with newlines, returns full HTML page
- [x] 1.3 Implement `render(...): void` — calls `echo self::buildHtml(...)`
- [x] 1.4 Run `vendor/bin/phpcs` to verify PSR-12 + single quotes compliance — SKIPPED: phpcs not installed (not a project dependency)

## 2. Refactor Examples to Use ExampleLayout

- [x] 2.1 Refactor `examples/structural/adapter/audio_player/index.php`
- [x] 2.2 Refactor `examples/structural/decorator/pizza/index.php`
- [x] 2.3 Refactor `examples/structural/composite/filesystem/index.php`
- [x] 2.4 Refactor `examples/structural/bridge/notificator/index.php`
- [x] 2.5 Refactor `examples/structural/facade/movie_player/index.php`
- [x] 2.6 Refactor `examples/techniques/fluent_interface/game/index.php`
- [x] 2.7 Run `vendor/bin/phpcs` on all modified files — SKIPPED: phpcs not installed (not a project dependency)
- [x] 2.8 Run `vendor/bin/phpunit` to verify no regressions — OK (10 tests, 14 assertions)

## 3. Cleanup & Verification

- [x] 3.1 Verify each example renders correctly in the browser (manual spot-check) — SKIPPED: manual verification deferred to user
- [x] 3.2 Run `vendor/bin/phpcs` on full project — SKIPPED: phpcs not installed (not a project dependency)
