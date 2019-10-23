<?php
declare(strict_types=1);

namespace Epam\Plugin\Plugin\Magento\Theme\Block\Html;

use Magento\Theme\Block\Html\Breadcrumbs as HtmlBreadcrumbs;

class Breadcrumbs
{

    /**
     * @param HtmlBreadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     *
     * @return array
     */
    public function beforeAddCrumb(HtmlBreadcrumbs $subject, string $crumbName, array $crumbInfo)
    {
        $crumbInfo['label'] = 'Awesome ' . $crumbInfo['label'];
        return [$crumbName, $crumbInfo];
    }
}