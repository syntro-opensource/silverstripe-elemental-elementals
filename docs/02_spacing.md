# Spacing

## Element Spacing

This module adds spacing options to elements for the spacing before
and after the element. You can control the available options by
setting the following config options:

```yml
---
Name: elementals-spacing
After:
  - syntro/silverstripe-elemental-elementals
---
YourElement:
  spacing_before:
    sm: Small spacing
    md: Medium spacing
    lg: Large spacing
  spacing_after:
    sm: Small spacing
    md: Medium spacing
    lg: Large spacing
```

You can render the keys of the array in your template by using `$SpacingBefore`
and `$SpacingAfter` respectively.

The default options are the ones provided in the example above. If you need
to remove them, you can do this via config as follows:

```yml
---
Name: elementals-spacing-reset
After:
  - syntro/silverstripe-elemental-elementals
---
DNADesign\Elemental\Models\BaseElement:
  spacing_before: null
  spacing_after: null

---
Name: elementals-spacing-custom
After:
  - elementals-spacing-reset
---
DNADesign\Elemental\Models\BaseElement:
  spacing_before:
    small: Small
    large: Large
  spacing_after:
    small: Small
    large: Large
```
The same can be done for a specific element if needed.

## The Spacer Element

This module provides a spacing element, which allows the content editor
to insert space between two other elements or at the start or the end of the
content. The default spacing options are as follows:

```yml
Syntro\SilverstripeElementalElementals\Element\Spacer:
  spacing_options:
    p-1: Very small
    p-2: Small
    p-3: Medium
    p-4: Large
    p-5: Very large
```
You can Access the current spacing option in the template by using `$Spacing`.

Resetting the default options can be done analogous to the spacing example:

```yml
---
Name: elementals-spacer-reset
After:
  - syntro/silverstripe-elemental-elementals
---
Syntro\SilverstripeElementalElementals\Element\Spacer:
  spacing_options: null

---
Name: elementals-spacer-custom
After:
  - elementals-spacer-reset
---
Syntro\SilverstripeElementalElementals\Element\Spacer:
  spacing_options:
    small: Small
    large: Large
```
