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

namespace Markocupic\ContaoPictureDownloads\Listener\ContaoHooks;

use Contao\CalendarEventsModel;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Template;
use Markocupic\ContaoPictureDownloads\AddTemplateData;

/**
 * @Hook(ParseTemplateListener::HOOK, priority=ParseTemplateListener::PRIORITY)
 */
final class ParseTemplateListener
{
    public const HOOK = 'parseTemplate';
    public const PRIORITY = 1000;

    /**
     * @var ContaoFramework
     */
    private $framework;

    /**
     * @var AddTemplateData
     */
    private $addTemplateData;

    public function __construct(ContaoFramework $framework, AddTemplateData $addTemplateData)
    {
        $this->framework = $framework;
        $this->addTemplateData = $addTemplateData;
    }

    /**
     * Add registration data to calendar templates.
     */
    public function __invoke(Template $template): void
    {

        if (0 !== strpos($template->getName(), 'ce_downloads')) {
            return;
        }

        $this->addTemplateData->add($template);
    }
}
