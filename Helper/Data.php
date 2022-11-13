<?php
/**
 * PL Development.
 *
 * @category    PL
 * @author      Linh Pham <plinh5@gmail.com>
 * @copyright   Copyright (c) 2016 PL Development. (http://www.polacin.com)
 */
namespace PL\Activitystream\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const XML_PATH_ENABLE      = 'activitystream/base_settings/enable';

    const XML_PATH_TIME_DISPLAY      = 'activitystream/base_settings/time_display';

    const XML_PATH_TIME_DELAY      = 'activitystream/base_settings/time_delay';

    const XML_PATH_FIRST_TIME      = 'activitystream/base_settings/first_time_load';

    const XML_PATH_MAX_NUMBER      = 'activitystream/base_settings/max_number';

    const XML_PATH_MESSAGE         = 'activitystream/base_settings/message';

    const XML_PATH_IS_MOBILE            ='activitystream/advance_settings/mobile';

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
    }

    /**
     * @param null $store
     * @return mixed
     */
    public function isEnabled($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @param null $store
     * @return mixed
     */
    public function getTimeDisplay($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_TIME_DISPLAY,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**\
     * @param null $store
     * @return mixed
     */
    public function getTimeDelay($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_TIME_DELAY,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @param null $store
     * @return mixed
     */
    public function getFirstTime($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_FIRST_TIME,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @param null $store
     * @return int
     */
    public function getMaxNumber($store = null)
    {
        return (int)$this->_scopeConfig->getValue(
            self::XML_PATH_MAX_NUMBER,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @param null $store
     * @return mixed
     */
    public function getMessage($store = null)
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_MESSAGE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function allowMobile()
    {
        return $this->_scopeConfig->getValue(
            self::XML_PATH_IS_MOBILE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return int
     */
    public function isMobile()
    {
        return preg_match(
            "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
            $_SERVER["HTTP_USER_AGENT"]
        );
    }
}
