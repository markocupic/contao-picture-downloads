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

use Contao\File;
use Contao\FilesModel;

class PictureDownload
{
    public function __construct()
    {
    }

    public function isImage(FilesModel $objFile): bool
    {
        $file = new File($objFile->path);

        return $file->isImage;
    }
}
