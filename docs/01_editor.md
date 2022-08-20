# Bootstrap-Specific HTMLEditor Config

Bootstrap comes with some utility classes for styling content on the fly.
While most formatting can be done easy enough in the default editor config,
there are some usecases where additional options are required.

## Text Utilities
Bootstrap comes with class based text utilities, that allow you to change the
visual appearance of text without changing the tag. These classes are made available
to the editor in the formats dropdown. You can customize the available formats
via yaml config:
```yml
Syntro\SilverstripeElementalElementals\BootstrapConfig:
  enable_small_format: true
  enable_lead_format: true
  enable_headings_format: true
  display_classes:
    display-1: Display 1
    display-2: Display 2
    display-3: Display 3
    display-4: Display 4
    display-5: Display 5
    display-6: Display 6
```

## Text (or Link) Color
Text color can be influenced by adding `.text-{colorname}` (or `.link-{colorname}`)
to any block. These colors differ from hardcoded colors set via `style=...` tag,
as they allow changing the font color by building bootstrap with different variables.

By default, the following colors are available:
```yml
Syntro\SilverstripeElementalElementals\BootstrapConfig:
  colors:
    primary: 'Primary'
    secondary: 'Secondary'
    info: 'Info'
    success: 'Success'
    warning: 'Warning'
    danger: 'Danger'
    dark: 'Dark'
    light: 'Light'
  utility_colors:
    black: 'Black'
    white: 'White'
```

You can add any colors you want by adding the color name to one of the two
config values.

## Table Styles
Bootstrap has a default table style applied to a table tag with the `table` class.
Then, additional styles can be added via the editor, when a table is selected via the
formats dropdown.

You can add new styles by adding a class to the corresponding config array:
```yml
Syntro\SilverstripeElementalElementals\BootstrapConfig:
  table_styles:
    table-borderless: Borderless Table
    table-bordered: Bordered Table
    table-striped: Striped Rows
    table-striped-columns: Striped Columns
    table-hover: Hoverable Rows
    table-sm: Small Table
  wrap_tables: true
```

> Note: the `wrap_tables` option wraps all table on the page with a 'table-responsive'
> div if enabled
