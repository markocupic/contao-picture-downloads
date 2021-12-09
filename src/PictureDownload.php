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

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\File;
use Contao\FilesModel;
use Contao\Frontend;
use Contao\PageModel;
use Contao\System;
use Symfony\Component\HttpFoundation\RequestStack;

class PictureDownload
{
    private $requestStack;
    private $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }




    public function getMetaData(FilesModel $objFiles)
    {

        $request = $this->requestStack->getCurrentRequest();

        if ($request && $this->scopeMatcher->isBackendRequest($request))
        {
            $arrMeta = Frontend::getMetaData($objFiles->meta, $GLOBALS['TL_LANGUAGE']);
        }
        else
        {
            /** @var PageModel $objPage */
            global $objPage;

            $arrMeta = Frontend::getMetaData($objFiles->meta, $objPage->language);

            if (empty($arrMeta) && $objPage->rootFallbackLanguage !== null)
            {
                $arrMeta = Frontend::getMetaData($objFiles->meta, $objPage->rootFallbackLanguage);
            }
        }

        return $arrMeta ?? [];
    }
}
