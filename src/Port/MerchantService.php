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

    public function __construct($config) {
        $this->allinpay = new AllinpayClient($config);
    }

    /**
     * 4.3.1 通联通头寸查询
     *
     * @param MerchantRequest $request
     * @return array
     */
    public function queryReserveFundBalance(MerchantRequest $request)
    {
        $param = [
            'sysid' => $request->getSysid(),
        ];
        return $this->allinpay->AllinpayCurl('MerchantService', 'queryReserveFundBalance', $param);
    }

    /**
     * 4.3.2 商户集合对账文件下载
     *
     * @param MerchantRequest $request
     * @return array
     */
    public function getCheckAccountFile(MerchantRequest $request)
    {
        $param = [
            'date'    =>  $request->getDate(),
            'fileType'    =>  $request->getFileType(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'getCheckAccountFile', $param);
    }

    /**
     * 4.3.3 通联通划款入账通知[回调]
     *
     * @param MerchantRequest $request
     * @return array
     */

    /**
     * 4.3.4 平台账户集余额查询
     *
     * @param MerchantRequest $request
     * @return array
     */
    public function queryMerchantBalance(MerchantRequest $request)
    {
        $param = [
            'accountSetNo'    =>  $request->getAccountSetNo(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'queryMerchantBalance', $param);
    }

    /**
     * 4.3.5 平台银行存管账户余额查询
     *
     * @param MerchantRequest $request
     * @return array
     */
    public function queryBankBalance(MerchantRequest $request)
    {
        $param = [
            'acctOrgType'    =>  $request->getAcctOrgType(),
            'acctNo'    =>  $request->getAcctNo(),
            'acctName'    =>  $request->getAcctName(),
        ];

        return $this->allinpay->AllinpayCurl('MerchantService', 'queryBankBalance', $param);
    }

}