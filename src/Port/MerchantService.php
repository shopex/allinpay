<?php
/**
 *
 *
 * @date 2019/9/5 15:34
 */

namespace Onex\Allinpay\Port;

use Onex\Allinpay\Common\AllinpayClient;
use Onex\Allinpay\Requests\MerchantRequest;

class MerchantService
{
    private $allinpay;

    private $request;

    public function __construct($config, MerchantRequest $request) {
        $this->allinpay = new AllinpayClient($config);
        $this->request = $request;
    }

    /**
     * 4.3.1 通联通头寸查询
     *
     * @param MerchantRequest $this->request
     * @return array
     */
    public function queryReserveFundBalance()
    {
        $param = [
            'sysid' => $this->request->getSysid(),
        ];
        return $this->allinpay->AllinpayCurl('MerchantService', 'queryReserveFundBalance', $param);
    }

    /**
     * 4.3.2 商户集合对账文件下载
     *
     * @param MerchantRequest $this->request
     * @return array
     */
    public function getCheckAccountFile()
    {
        $param = [
            'date'    =>  $this->request->getDate(),
            'fileType'    =>  $this->request->getFileType(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'getCheckAccountFile', $param);
    }

    /**
     * 4.3.3 通联通划款入账通知[回调]
     *
     * @param MerchantRequest $this->request
     * @return array
     */

    /**
     * 4.3.4 平台账户集余额查询
     *
     * @param MerchantRequest $this->request
     * @return array
     */
    public function queryMerchantBalance()
    {
        $param = [
            'accountSetNo'    =>  $this->request->getAccountSetNo(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'queryMerchantBalance', $param);
    }

    /**
     * 4.3.5 平台银行存管账户余额查询
     *
     * @param MerchantRequest $this->request
     * @return array
     */
    public function queryBankBalance()
    {
        $param = [
            'acctOrgType'    =>  $this->request->getAcctOrgType(),
            'acctNo'    =>  $this->request->getAcctNo(),
            'acctName'    =>  $this->request->getAcctName(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'queryBankBalance', $param);
    }

}