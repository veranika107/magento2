<?php
declare(strict_types=1);

namespace Epam\Plugin\Plugin\Magento\Theme\Block\Html;

use Magento\Theme\Block\Html\Header as HtmlHeader;

class Header
{

    /**
     * @param HtmlHeader $subject
     * @param string $result
     *
     * @return string
     */
    public function afterGetWelcome(HtmlHeader $subject, string $result = null)
    {
        if (empty($result)) {
            return 'Hello, world!';
        }
        return 'Hello, friend. ' . $result;
    }

}