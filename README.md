# Read Progress Bar

Displays a thin progress bar fixed at the top of the page that fills as the visitor scrolls through a post. The bar tracks progress against the post body specifically, so it reaches 100% when the end of the article is in view — not the bottom of the page.

**Features:**
- 3 px fixed bar at the top of the viewport
- Activates only on post pages (requires `.contensio-post-body` class on the content wrapper)
- Passive scroll listener — zero impact on scroll performance
- No database queries, no admin configuration
- Ember-coloured (`#e05b2b`) to match the Contensio admin brand

---

## Requirements

- Contensio 2.0 or later
- The active theme must apply the `contensio-post-body` class to the post content wrapper (the default theme does this automatically)

---

## Installation

### Composer

```bash
composer require contensio/plugin-read-progress
```

### Manual

Copy the plugin directory and register the service provider via the admin plugin manager.

No migrations or configuration required.

---

## How it works

The plugin hooks into `contensio/frontend/head` and injects a small `<div>` element and an inline `<script>` block. The script:

1. Finds the element with `id="contensio-progress"` (the bar)
2. Finds the post body wrapper via `.contensio-post-body`
3. If either is missing, it exits immediately — no effect on non-post pages
4. Attaches a passive `scroll` listener that calculates `(-rect.top / (postHeight - viewportHeight)) × 100` and sets the bar width

The CSS positions the bar with `position: fixed; top: 0; left: 0; z-index: 9999` so it floats above all page content.

---

## Hook reference

| Hook | Description |
|------|-------------|
| `contensio/frontend/head` | Injects the progress bar element and scroll script |
