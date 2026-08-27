## Context

The `examples/` directory contains 6 self-contained `index.php` demos for design patterns. Each file duplicates ~40 lines of identical HTML (DOCTYPE, Tailwind CDN, dark-themed layout, `<pre>` output block, "Back to Patterns" link). Only 4 values differ: title, subtitle, description, and output array.

An existing helper, `App\Helpers\PatternCard`, already demonstrates the static helper pattern in this project — it provides `buildHtml()` (returns string) and `render()` (echoes) for the index page cards.

## Goals / Non-Goals

**Goals:**
- Extract the shared HTML into a single `ExampleLayout` helper in `src/Helpers/`.
- Refactor all 6 examples to use the helper, eliminating HTML duplication.
- Follow the exact same conventions as `PatternCard` (static methods, `buildHtml` + `render` pair).

**Non-Goals:**
- Templating engine or partials system — overkill for this educational project.
- Making the "Back to Patterns" link configurable — all examples sit at the same depth.
- Touching the PHP logic sections of any example (only the HTML wrapper changes).

## Decisions

### 1. Static helper class (not a template/partial include)

**Choice**: `App\Helpers\ExampleLayout` with static methods.

**Rationale**: Matches `PatternCard` convention. Single class, no file discovery, no include path headaches. The examples are all identical in structure — no need for the flexibility of partials.

**Alternatives considered**:
- Partial includes (`head.php`, `header.php`, etc.) — more files, more complexity, no flexibility benefit since all examples are identical.
- A base class that examples extend — PHP examples aren't classes, they're scripts. Doesn't fit.

### 2. Dual-method pattern: `buildHtml()` + `render()`

**Choice**: `buildHtml(string, string, string, array): string` and `render(...): void`.

**Rationale**: Mirrors `PatternCard`. `buildHtml` allows testing the output; `render` is the convenience method for examples.

### 3. Description parameter accepts raw HTML

**Choice**: The `$description` parameter is NOT htmlspecialchars-escaped.

**Rationale**: All 6 examples use `<strong>` tags in their descriptions. This is controlled content (not user input), so escaping is unnecessary and would break formatting. Titles are escaped.

### 4. Output parameter is `array`, implode happens internally

**Choice**: `render()` accepts `array $output` and does `implode("\n", $output)`.

**Rationale**: Every example builds an array and then implodes. Moving the implode into the helper removes one line of boilerplate from each.

## Risks / Trade-offs

- **Layout change = one file**: Future HTML/CSS changes only touch `ExampleLayout.php`. This is the main benefit.
- **Minor coupling**: Examples become dependent on `ExampleLayout`. If the helper signature changes, all 6 must update. Mitigated by the simple, stable interface.
- **No visual regression tests**: We're not testing that the rendered HTML looks correct. Acceptable for an educational project with manual browser verification.
