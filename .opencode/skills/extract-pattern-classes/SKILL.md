---
name: extract-pattern-classes
description: Use this skill to extract PHP classes from a temporary `tmp-classes.php` file in a design pattern's client directory and move them into the appropriate `src/` package structure.
---

# Extract Design Pattern Classes Skill

**Purpose**: Quickly extract classes from a temporary `tmp-classes.php` file in a pattern's client directory and move them into the appropriate `src/` package structure.

## When to Use

- The `tmp-classes.php` file contains one or more PHP classes that need to be split into separate files under `src/`.
- The target directory follows the same naming convention: `src/CreationalPatterns/FactoryMethod/<ExampleName>/`.

## Steps

1. **Locate the source**
   - Identify the root pattern directory (e.g., `creational_patterns/factory_method/<example_name>/`).
   - Open the `tmp-classes.php` file.

2. **Extract classes**
   - Copy each class definition (including its full namespace if present) into individual files.
   - Preserve the original class name and extend the appropriate namespace (`App\Patterns\CreationalPatterns\FactoryMethod\<ExampleName>`).

3. **Create target directory**
   - Ensure the destination directory `src/CreationalPatterns/FactoryMethod/<ExampleName>/` exists.
   - If it does not, create it.

4. **Move classes**
   - For each extracted class, write it to a new file named `<ClassName>.php` inside the target directory.
   - Verify the file contains only its class.

5. **Create client code index.php**
   - Create an `index.php` file in the pattern's client directory (e.g., `structural_patterns/adapter/audio_player/index.php`).
   - Structure the file exactly like other example `index.php` files.
   - Use the `use` statements to import each needed class from the extracted namespace.
   - Copy the client‑code section from the original `tmp-classes.php` (the PHP code that instantiates classes and runs a demo) and adapt it to use fully qualified class names in the `new` calls (e.g., `new DarkTheme()` → `new DarkTheme()` after using `use App\StructuralPatterns\Bridge\Webpage\DarkTheme;`).
   * Follow the exact formatting and spacing used in reference `index.php` files (like `structural_patterns/adapter/audio_player/index.php`).

6. **Cleanup**
   - Delete the original `tmp-classes.php` file once all classes have been moved.

7. **Update root index.php**
   - Open the root `index.php` (located at the project root).
   - Add the new pattern example to the appropriate location, see other existing examples.

## Example

```
# Directory structure
#  examples/
#   structural/
#     adapter/
#       audio_player/
#         tmp-classes.php <- temporary file with the initial classes to be splitted
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
