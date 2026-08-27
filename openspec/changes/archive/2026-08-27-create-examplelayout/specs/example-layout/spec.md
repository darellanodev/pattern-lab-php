## ADDED Requirements

### Requirement: ExampleLayout renders the common HTML structure for pattern demos
The system SHALL provide an `App\Helpers\ExampleLayout` class with a static `render()` method that outputs the complete HTML page for a pattern example, accepting title, subtitle, description, and output array as parameters.

#### Scenario: Render a complete example page
- **WHEN** `ExampleLayout::render('Game', 'Fluent Interface Pattern', '<p>Description</p>', ['line1', 'line2'])` is called
- **THEN** the system outputs a full HTML page with the title "Game", subtitle "Fluent Interface Pattern", the description rendered as raw HTML, and the output array joined by newlines inside a `<pre>` block

### Requirement: ExampleLayout provides buildHtml for string return
The system SHALL provide a `buildHtml()` method that returns the HTML as a string instead of echoing it, allowing callers to capture or test the output.

#### Scenario: Build HTML without outputting
- **WHEN** `$html = ExampleLayout::buildHtml('Game', 'Fluent Interface Pattern', '<p>Description</p>', ['line1'])` is called
- **THEN** `$html` contains the complete HTML page as a string and nothing is echoed

### Requirement: Title is HTML-escaped
The system SHALL htmlspecialchars-escape the title parameter to prevent XSS, using ENT_QUOTES and UTF-8 encoding.

#### Scenario: Title with special characters
- **WHEN** the title contains `<script>alert('x')</script>`
- **THEN** the rendered output contains the escaped entity, not raw HTML

### Requirement: Description is rendered as raw HTML
The system SHALL output the description parameter as-is (not escaped), allowing HTML tags like `<strong>` to render correctly.

#### Scenario: Description with HTML tags
- **WHEN** the description is `We have a <strong>SimplePizza</strong> class`
- **THEN** the rendered output contains `<strong>SimplePizza</strong>` as a bold element, not escaped text

### Requirement: Output array is joined with newlines
The system SHALL join the output array elements with `"\n"` and render them inside a `<pre>` block.

#### Scenario: Multi-line output
- **WHEN** the output array is `['line1', 'line2', 'line3']`
- **THEN** the `<pre>` block contains "line1\nline2\nline3"

### Requirement: Back to Patterns link points to index
The system SHALL include a "Back to Patterns" link pointing to `../../../../index.php` at the bottom of the page.

#### Scenario: Link is present
- **WHEN** the page is rendered
- **THEN** a link with text "Back to Patterns" and href "../../../../index.php" is present
