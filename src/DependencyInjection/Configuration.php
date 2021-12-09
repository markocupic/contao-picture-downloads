<?php

declare(strict_types=1);

/*
 * This file is part of Contao Picture Downloads.
 *
 * (c) Marko Cupic 2021 <m.cupic@gmx.ch>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/contao-picture-downloads
 */

namespace Markocupic\ContaoPictureDownloads\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const ROOT_KEY = 'markocupic_contao_picture_downloads';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::ROOT_KEY);

        $treeBuilder->getRootNode()
            ->children()
                ->integerNode('ce_download_picture_size')
                ->defaultValue(1)
                ->end()
                ->integerNode('ce_downloads_picture_size')
                ->defaultValue(1)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
