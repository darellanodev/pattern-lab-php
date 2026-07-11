---
name: extract-pattern-classes
description: Use this skill to extract PHP classes from a temporary `tmp-classes.php` file in a design pattern's client directory and move them into the appropriate `src/` package structure.
---

# Extract Design Pattern Classes Skill

**Purpose**: Quickly extract classes from a temporary `tmp-classes.php` file in a pattern's client directory and move them into the appropriate `src/` package structure.

## When to Use

- The `tmp-classes.php` file contains one or more PHP classes that need to be split into separate files under `src/`.
- The target directory follows the naming convention: `src/<Category>/<Pattern>/<ExampleName>/` (PascalCase).

## Naming Conventions

| Location                | Convention                      | Example                                     |
| ----------------------- | ------------------------------- | ------------------------------------------- |
| `examples/` directories | snake_case                      | `examples/structural/adapter/audio_player/` |
| `src/` directories      | PascalCase                      | `src/Structural/Adapter/AudioPlayer/`       |
| PHP namespaces          | PascalCase, no `Patterns` level | `App\Structural\Adapter\AudioPlayer`        |
| Root `index.php`        | `PatternCard::render()` calls   | See existing entries                        |

## Steps

1. **Locate the source**
   - Identify the root pattern directory: `examples/<category>/<pattern_name>/<example_name>/` (snake_case).
   - Open the `tmp-classes.php` file.

2. **Extract classes**
   - Copy each class definition (including its full namespace if present) into individual files.
   - Preserve the original class name and set the appropriate namespace (`App\<Category>\<Pattern>\<ExampleName>`).
   - Namespace uses PascalCase (e.g., `App\Structural\Adapter\AudioPlayer`).

3. **Create target directory**
   - Ensure the destination directory `src/<Category>/<Pattern>/<ExampleName>/` exists (PascalCase).
   - If it does not, create it.

4. **Move classes**
   - For each extracted class, write it to a new file named `<ClassName>.php` inside the target directory.
   - Verify the file contains only its class.

5. **Create client code index.php**
   - Create an `index.php` file in the pattern's client directory: `examples/<category>/<pattern_name>/<example_name>/index.php`.
   - Structure the file exactly like other example `index.php` files.
   - Use `use` statements to import each needed class from the extracted namespace.
   - Copy the client-code section from the original `tmp-classes.php` (the PHP code that instantiates classes and runs a demo) and adapt it to use the imported class names.
   - Follow the exact formatting and spacing used in reference `index.php` files (like `examples/structural/adapter/audio_player/index.php`).

6. **Cleanup**
   - Delete the original `tmp-classes.php` file once all classes have been moved.

7. **Verify autoload**
   - Run `composer dump-autoload` to ensure the new classes are discoverable.
   - Optionally, test by requiring one of the new class files to confirm it loads correctly.

8. **Update root index.php**
   - Open the root `index.php` (located at the project root).
   - Add a new `PatternCard::render()` call in the appropriate category section (see existing examples for the exact format: name, description, use case, and path to the example's `index.php`).

## Example

```
# Directory structure
#  examples/
#   structural/
#     adapter/
#       audio_player/
#         tmp-classes.php <- temporary file with the initial classes to be split
#   src/
#     Structural/
#       Adapter/
#         AudioPlayer/
#           AudioPlayer.php
#           MediaAdapter.php
#           MediaPlayer.php
#           MkvPlayer.php
#           MkvPlayerInterface.php
#           Mp4Player.php
#           MP4PlayerInterface.php
```

1. Read `examples/structural/adapter/audio_player/tmp-classes.php`.
2. Create `src/Structural/Adapter/AudioPlayer/`.
3. Write `AudioPlayer.php`, `MediaAdapter.php`, `MediaPlayer.php`, `MkvPlayer.php`, `MkvPlayerInterface.php`, `Mp4Player.php` and `MP4PlayerInterface.php` into that folder,
4. Remove `tmp-classes.php`.
