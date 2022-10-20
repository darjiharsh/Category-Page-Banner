<?php

namespace CWH\Category\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    public function getConfig()
    {
        return $this->scopeConfig->getValue(
            'category/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}