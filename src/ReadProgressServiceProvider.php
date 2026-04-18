<?php

/**
 * Read Progress Bar — Contensio plugin.
 * https://contensio.com
 *
 * @copyright   Copyright (c) 2026 Iosif Gabriel Chimilevschi
 * @license     https://www.gnu.org/licenses/agpl-3.0.txt  AGPL-3.0-or-later
 */

namespace Contensio\Plugins\ReadProgress;

use Contensio\Support\Hook;
use Illuminate\Support\ServiceProvider;

class ReadProgressServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'read-progress');

        // Inject the progress bar element + JS into <head> on every page.
        // The JS self-limits to pages that contain .contensio-post-body —
        // it exits immediately on pages where that class is absent.
        Hook::add('contensio/frontend/head', function (): string {
            return view('read-progress::partials.bar')->render();
        });
    }
}
