<?php

declare(strict_types=1);

namespace Modules\Xot\Datas\Concerns;

use Filament\Support\Colors\Color;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Modules\Xot\Actions\File\AssetAction;
use Modules\Xot\Actions\File\AssetPathAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Support\PaDesignColors;

trait MetatagDataBrandThemeAccessors
{
    /**
     * Get the brand name.
     * This method reflects the semantic purpose of getting the brand name,
     * which is the title of the page.
     */
    public function getBrandName(): string
    {
        return $this->title;
    }

    /**
     * Get the brand logo.
     * This method reflects the semantic purpose of getting the brand logo,
     * rather than exposing implementation details about where the logo is used.
     */
    public function getBrandLogo(): string
    {
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header);

            return asset($path);
        } catch (\Throwable $e) {
            return asset($this->logo_header);
        }
    }

    public function getBrandLogoPath(): string
    {
        return app(AssetPathAction::class)->execute($this->logo_header);
    }

    /**
     * Get the dark mode brand logo.
     * This method reflects the semantic purpose of getting the dark mode brand logo.
     */
    public function getDarkModeBrandLogo(): string
    {
        try {
            /** @var string $path */
            $path = app(AssetAction::class)->execute($this->logo_header_dark);

            return asset($path);
        } catch (\Throwable $e) {
            return asset($this->logo_header_dark);
        }
    }

    /**
     * Get the brand logo height.
     * This method reflects the semantic purpose of getting the brand logo height.
     */
    public function getBrandLogoHeight(): string
    {
        return $this->logo_height;
    }

    /**
     * Get the brand logo as base64 data URI for inline embedding.
     * This method reflects the semantic purpose of getting the brand logo
     * as a base64 data URI that can be embedded directly in HTML img tags.
     *
     * @return string The base64 data URI (e.g., "data:image/png;base64,iVBORw0KGgoAAAA...")
     */
    public function getBrandLogoBase64(): string
    {
        try {
            // Get the asset path using AssetAction (same as getBrandLogo)
            /** @var string $assetPath */
            $assetPath = app(AssetAction::class)->execute($this->logo_header);

            // Get the physical file path
            $physicalPath = public_path($assetPath);

            // Check if file exists
            if (! File::exists($physicalPath)) {
                return '';
            }

            // Read file content
            $fileContent = File::get($physicalPath);

            // Get MIME type
            $mimeType = $this->getMimeTypeFromPath($physicalPath);

            // Convert to base64
            $base64Content = base64_encode($fileContent);

            // Return as data URI
            return "data:{$mimeType};base64,{$base64Content}";
        } catch (\Throwable $e) {
            // Fallback: try with the raw logo_header path
            try {
                $fallbackPath = public_path($this->logo_header);
                if (File::exists($fallbackPath)) {
                    $fileContent = File::get($fallbackPath);
                    $mimeType = $this->getMimeTypeFromPath($fallbackPath);
                    $base64Content = base64_encode($fileContent);

                    return "data:{$mimeType};base64,{$base64Content}";
                }
            } catch (\Throwable $fallbackException) {
                // Log the error but don't break the application
                Log::warning('Could not generate base64 logo', [
                    'original_error' => $e->getMessage(),
                    'fallback_error' => $fallbackException->getMessage(),
                    'logo_header' => $this->logo_header,
                ]);
            }

            return '';
        }
    }

    /**
     * @return array<string, string>
     */
    public function getThemeColors(): array
    {
        $filamentColors = $this->getFilamentColors();
        $defaults = [];

        // Convert Filament color arrays to simple string format
        foreach ($filamentColors as $key => $colorArray) {
            if (is_array($colorArray) && ! empty($colorArray)) {
                // Use the first color in the array as the default
                $defaults[$key] = (string) $colorArray[0];
            }
        }

        $custom = [];
        foreach ($this->colors as $key => $value) {
            if (Arr::has($value, 'color')) {
                $custom[$key] = (string) $value['color'];
            }
        }

        return array_merge($defaults, $custom);
    }

    /**
     * Get the theme settings.
     * This method reflects the semantic purpose of getting theme settings.
     *
     * @return array<string, string>
     */
    public function getThemeSettings(): array
    {
        return [
            'color_primary' => $this->color_primary,
            'color_title' => $this->color_title,
            'color_megamenu' => $this->color_megamenu,
            'color_hamburger' => $this->color_hamburger,
            'color_banner' => $this->color_banner,
        ];
    }

    /**
     * Get the brand description.
     * This method reflects the semantic purpose of getting the brand description.
     */
    public function getBrandDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Get the brand social links.
     * This method reflects the semantic purpose of getting social media links.
     *
     * @return array<string, string>
     */
    public function getBrandSocialLinks(): array
    {
        return [
            'facebook' => $this->facebook_href,
            'twitter' => $this->twitter_href,
            'youtube' => $this->youtube_href,
        ];
    }

    /**
     * Get the brand dimensions.
     * This method reflects the semantic purpose of getting brand-related dimensions.
     *
     * @return array<string, string>
     */
    public function getBrandDimensions(): array
    {
        return [
            'logo_height' => $this->logo_height,
        ];
    }

    /**
     * Get the brand settings.
     * This method reflects the semantic purpose of getting brand-related settings.
     *
     * @return array<string, string>
     */
    public function getBrandSettings(): array
    {
        return [
            'fastlink' => $this->fastlink,
            'hide_megamenu' => $this->hide_megamenu,
            'hero_type' => $this->hero_type,
        ];
    }

    /**
     * Get the favicon URL.
     */
    public function getFavicon(): string
    {
        try {
            return app(AssetAction::class)->execute($this->favicon);
        } catch (\Throwable $e) {
            return asset($this->favicon);
        }
    }

    public function getFaviconBySize(string $size, string $format): string
    {
        $xot = XotData::make();
        // return app(AssetAction::class)->execute($this->favicon, $size, $format);
        $file = 'favicon-'.$size.'.'.$format;

        return $xot->getPubThemePublicAsset($file);
    }

    /**
     * @deprecated Use getThemeColors() instead as it better reflects the semantic purpose
     *
     * @return array<string, array{key?: string, color: string, hex?: string}>
     */
    public function getColors(): array
    {
        return $this->colors;

        // return $this->getThemeColors();
    }

    /**
     * Get the default Filament colors configuration.
     *
     * @return array<string, array<int, string>|string>
     */
    public function getFilamentColors(): array
    {
        return PaDesignColors::filamentPalette();
    }

    /**
     * Get all colors with proper type handling.
     * Converts custom colors to Filament color format for compatibility.
     *
     * @return array<string, array<int, string>>
     */
    public function getAllColors(): array
    {
        $filamentColors = $this->getFilamentColors();
        $customColors = [];
        $normalizedFilamentColors = [];

        foreach ($filamentColors as $key => $value) {
            if (is_array($value)) {
                $normalizedFilamentColors[$key] = array_values(array_map(
                    static fn (mixed $color): string => (string) $color,
                    $value,
                ));
                continue;
            }

            $normalizedFilamentColors[$key] = [(string) $value];
        }

        // Convert custom color format to Filament color format
        foreach ($this->colors as $key => $value) {
            if (is_array($value) && Arr::has($value, 'color')) {
                // Convert single color value to array format for Filament compatibility
                $colorValue = (string) $value['color'];
                $customColors[$key] = [$colorValue];
            }
        }

        return array_merge($normalizedFilamentColors, $customColors);
    }

    /**
     * Get MIME type from file path extension.
     * Helper method for getBrandLogoBase64().
     */
    private function getMimeTypeFromPath(string $filePath): string
    {
        $extension = \strtolower(\pathinfo($filePath, PATHINFO_EXTENSION));

        return match ($extension) {
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'webp' => 'image/webp',
            'bmp' => 'image/bmp',
            'ico' => 'image/x-icon',
            default => 'image/png', // Fallback default
        };
    }
}
