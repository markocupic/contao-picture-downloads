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
use Contao\StringUtil;
use Contao\Template;

class AddTemplateData
{
    /**
     * @var PictureDownload
     */
    private $pictureDownload;

    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var int
     */
    private $ceDownloadPictureSize;

    /**
     * @var int
     */
    private $ceDownloadsPictureSize;

    public function __construct(PictureDownload $pictureDownload, string $projectDir, int $ceDownloadPictureSize, int $ceDownloadsPictureSize)
    {
        $this->pictureDownload = $pictureDownload;
        $this->projectDir = $projectDir;
        $this->ceDownloadPictureSize = $ceDownloadPictureSize;
        $this->ceDownloadsPictureSize = $ceDownloadsPictureSize;
    }

    /**
     * Augment template object with more properties.
     *
     * @throws \Exception
     */
    public function add(Template $template): void
    {
        // Do not change this order
        if (0 === strpos($template->getName(), 'ce_downloads')) {
            $this->augmentDownloadsTemplate($template);
        } elseif (0 === strpos($template->getName(), 'ce_download')) {
            $this->augmentDownloadTemplate($template);
        }
    }

    /**
     * Content element "ce_download".
     *
     * @throws \Exception
     */
    private function augmentDownloadTemplate(Template $template): void
    {
        $template->isImage = false;

        if (isset($template->singleSRC) && !empty($template->singleSRC) && is_file($this->projectDir.'/'.$template->singleSRC)) {
            if (null !== ($objFiles = FilesModel::findByPath($template->singleSRC))) {
                $objFile = new File($template->singleSRC);

                if ($objFile->isImage) {
                    $template->isImage = true;
                    $template->pictureSize = $this->ceDownloadPictureSize;
                    $template->origMeta = $this->pictureDownload->getMetaData($objFiles);
                    $template->stringUuid = StringUtil::binToUuid($objFiles->uuid);
                    $template->origMeta = $this->pictureDownload->getMetaData($objFiles);
                    $template->pictureSize = $this->ceDownloadsPictureSize;
                    $template->objFile = $objFiles->row();
                }
            }
        }
    }

    /**
     * Content element "ce_downloads".
     *
     * @throws \Exception
     */
    private function augmentDownloadsTemplate(Template $template): void
    {
        if (isset($template->files) && !empty($template->files) && \is_array($template->files)) {
            $arrFiles = $template->files;
            $template->hasImagesInDownloadCollection = false;
            $template->pictureSize = $this->ceDownloadsPictureSize;

            foreach ($arrFiles as $i => $arrFile) {
                if (null !== ($objFiles = FilesModel::findByUuid($arrFile['uuid']))) {
                    $objFile = new File($objFiles->path);
                    $arrFile['isImage'] = $objFile->isImage;
                    $arrFile['origMeta'] = $this->pictureDownload->getMetaData($objFiles);
                    $arrFile['stringUuid'] = StringUtil::binToUuid($arrFile['uuid']);
                    $arrFile['objFile'] = $objFiles->row();
                    $template->hasImagesInDownloadCollection = true;
                }
                $arrFiles[$i] = $arrFile;
            }

            $template->files = $arrFiles;
        }
    }
}
