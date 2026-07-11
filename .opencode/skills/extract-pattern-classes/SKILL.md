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

   - **IMPORTANT**: The `index.php` MUST include the full HTML layout with Tailwind CSS dark mode. Do NOT use plain `echo` statements. Follow this exact structure:

     ```php
     <?php

     require_once __DIR__.'/../../../../vendor/autoload.php';

     use App\...\ClassName;

     // PHP logic to prepare output data (store in $output array)
     $output = [];
     $output[] = "line 1";
     $output[] = "line 2";

     ?>
     <!DOCTYPE html>
     <html lang="en" class="dark">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Pattern Name Example</title>
         <script src="https://cdn.tailwindcss.com"></script>
     </head>
     <body class="dark:bg-gray-900 min-h-screen">
         <div class="container mx-auto px-4 py-8">
             <h1 class="text-3xl font-bold text-center text-white mb-2">Pattern Name Example</h1>
             <p class="text-center text-gray-400 mb-8">Pattern Category Pattern Demo</p>

             <div class="max-w-2xl mx-auto mb-8">
                 <div class="bg-gray-800 rounded-lg p-6">
                     <p class="text-gray-300 mb-4">
                     Brief explanation of the pattern and what the example demonstrates.
                     </p>
                 </div>
             </div>

             <div class="max-w-2xl mx-auto">
                 <pre class="bg-gray-800 text-green-400 p-6 rounded-lg shadow-md overflow-x-auto font-mono text-sm"><?php echo implode("\n", $output); ?></pre>

                 <div class="mt-8 text-center">
                     <a href="../../../../index.php" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded transition">
                         Back to Patterns
                     </a>
                 </div>
             </div>
         </div>
     </body>
     </html>
     ```

   - Use `use` statements to import each needed class from the extracted namespace.
   - Collect all output lines in an `$output` array, then render with `implode("\n", $output)` inside the `<pre>` block.

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
