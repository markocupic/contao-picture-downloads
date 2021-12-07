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

namespace Markocupic\ContaoPictureDownloads;

use Markocupic\ContaoPictureDownloads\DependencyInjection\MarkocupicContaoPictureDownloadsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MarkocupicContaoPictureDownloads
 */
class MarkocupicContaoPictureDownloads extends Bundle
{
	public function getContainerExtension(): MarkocupicContaoPictureDownloadsExtension
	{
		return new MarkocupicContaoPictureDownloadsExtension();
	}

	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
