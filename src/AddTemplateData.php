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

use Contao\FilesModel;
use Contao\StringUtil;
use Contao\Template;

class AddTemplateData
{
    /**
     * @var PictureDownload
     */
    private $pictureDownload;

    /**
     * @var int
     */
    private $pictureSize;

    public function __construct(PictureDownload $pictureDownload, int $pictureSize)
    {
        $this->pictureDownload = $pictureDownload;
        $this->pictureSize = $pictureSize;
    }

    /**
     * Augment template with more file properties.
     */
    public function add(Template $template): void
    {
        if (isset($template->files) && !empty($template->files) && \is_array($template->files)) {
            $arrFiles = $template->files;
            $template->hasImagesInDownloadCollection = false;
            $template->pictureSize = $this->pictureSize;

            foreach ($arrFiles as $i => $arrFile) {
                if (null !== ($objFiles = FilesModel::findByUuid($arrFile['uuid']))) {
                    $arrFile['isImage'] = $this->pictureDownload->isImage($objFiles);
                    $arrFile['stringUuid'] = StringUtil::binToUuid($arrFile['uuid']);
                    $template->hasImagesInDownloadCollection = true;
                }
                $arrFiles[$i] = $arrFile;
            }

            $template->files = $arrFiles;
        }
    }
}
