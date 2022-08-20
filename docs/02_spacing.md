# Spacing

## Element Spacing

This module adds spacing options to elements for the spacing before
and after the element. You can control the available options by
setting the following config options:

```yml
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

## The Spacer Element

This module provides a spacing element, which allows the content editor
to insert space between two other elements or at the start or the end of the
content.
