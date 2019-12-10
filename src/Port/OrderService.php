<?php
/**
 *
 *
 * @date 2019/9/5 15:34
 */

namespace Onex\Allinpay\Port;

use Onex\Allinpay\Common\AllinpayClient;
use Onex\Allinpay\Requests\OrderRequest;

class OrderService
{

    private $allinpay;

    private $request;

    public function __construct($config, OrderRequest $request) {
        $this->allinpay = new AllinpayClient($config);
        $this->request = $request;
    }

    /**
     * 4.2.1 订单类接口调用说明
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */

    /**
     * 4.2.2 充值申请
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function depositApply()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'validateType' => $this->request->getValidateType(),
            'frontUrl' => $this->request->getFrontUrl(),
            'backUrl' => $this->request->getBackUrl(),
            'orderExpireDatetime' => $this->request->getOrderExpireDatetime(),
            'payMethod' => $this->request->getPayMethod(),
            'goodsName' => $this->request->getGoodsName(),
            'goodsDesc' => $this->request->getGoodsDesc(),
            'industryCode' => $this->request->getIndustryCode(),
            'industryName' => $this->request->getIndustryName(),
            'source' => $this->request->getSource(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'depositApply', $param);
    }

    /**
     * 4.2.3 提现申请
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function withdrawApply()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'validateType' => $this->request->getValidateType(),
            'backUrl' => $this->request->getBackUrl(),
            'orderExpireDatetime' => $this->request->getOrderExpireDatetime(),
            'payMethod' => $this->request->getPayMethod(),
            'bankCardNo' => $this->request->getBankCardNo() ? $this->allinpay->RsaEncode($this->request->getBankCardNo()) : null,
            'bankCardPro' => $this->request->getBankCardPro(),
            'withdrawType' => $this->request->getWithdrawType(),
            'industryCode' => $this->request->getIndustryCode(),
            'industryName' => $this->request->getIndustryName(),
            'source' => $this->request->getSource(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'withdrawApply', $param);
    }

    /**
     * 4.2.4 消费申请
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function consumeApply()
    {
        $param = [
            'payerId' => $this->request->getPayerId(),
            'recieverId' => $this->request->getRecieverId(),
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'validateType' => $this->request->getValidateType(),
            'splitRule' => $this->request->getSplitRule(),
            'frontUrl' => $this->request->getFrontUrl(),
            'backUrl' => $this->request->getBackUrl(),
            'orderExpireDatetime' => $this->request->getOrderExpireDatetime(),
            'payMethod' => $this->request->getPayMethod(),
            'goodsType' => $this->request->getGoodsType(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
            'goodsName' => $this->request->getGoodsName(),
            'goodsDesc' => $this->request->getGoodsDesc(),
            'industryCode' => $this->request->getIndustryCode(),
            'industryName' => $this->request->getIndustryName(),
            'source' => $this->request->getSource(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'consumeApply', $param);
    }

    /**
     * 4.2.5 托管代收申请(标准版)
     *
     * @param OrderRequest $this->request
     * @return array
     */
    public function agentCollectApply()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'payerId' => $this->request->getPayerId(),
            'recieverList' => $this->request->getRecieverList(),
            'goodsType' => $this->request->getGoodsType(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
            'tradeCode' => $this->request->getTradeCode(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'validateType' => $this->request->getValidateType(),
            'frontUrl' => $this->request->getFrontUrl(),
            'backUrl' => $this->request->getBackUrl(),
            'orderExpireDatetime' => $this->request->getOrderExpireDatetime(),
            'payMethod' => $this->request->getPayMethod(),
            'goodsName' => $this->request->getGoodsName(),
            'goodsDesc' => $this->request->getGoodsDesc(),
            'industryCode' => $this->request->getIndustryCode(),
            'industryName' => $this->request->getIndustryName(),
            'source' => $this->request->getSource(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'agentCollectApply', $param);
    }

    /**
     * 4.2.6 单笔托管代付(标准版)
     *
     * @param OrderRequest $this->request
     * @return array
     */
    public function signalAgentPay()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'collectPayList' => $this->request->getCollectPayList(),
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'backUrl' => $this->request->getBackUrl(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'splitRuleList' => $this->request->getSplitRuleList(),
            'goodsType' => $this->request->getGoodsType(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
            'tradeCode' => $this->request->getTradeCode(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'signalAgentPay', $param);
    }

    /**
     * 4.2.7 批量托管代付（标准版）
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function batchAgentPay()
    {
        $param = [
            'bizBatchNo' => $this->request->getBizBatchNo(),
            'batchPayList' => $this->request->getBatchPayList(),
            'goodsType' => $this->request->getgoodsType(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
            'tradeCode' => $this->request->gettradeCode(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'batchAgentPay', $param);
    }

    /**
     * 4.2.8 确认支付(后台+短信验证码确认)
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function pay()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'tradeNo' => $this->request->getTradeNo(),
            'jumpUrl' => $this->request->getJumpUrl(),
            'verificationCode' => $this->request->getVerificationCode(),
            'consumerIp' => $this->request->getConsumerIp(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'pay', $param);
    }

    /**
     * 4.2.9 确认支付(前台+短信验证码确认)[api pay]
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */

    /**
     * 4.2.10 确认支付(前台+密码验证版)[api pay]
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */

    /**
     * 4.2.11 商品录入
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function entryGoods()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'goodsType' => $this->request->getGoodsType(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
            'goodsName' => $this->request->getGoodsName(),
            'goodsDetail' => $this->request->getGoodsDetail(),
            'goodsParams' => $this->request->getGoodsParams(),
            'showUrl' => $this->request->getShowUrl(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'entryGoods', $param);
    }

    /**
     * 4.2.12 查询商品
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function queryGoods()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'bizGoodsNo' => $this->request->getBizGoodsNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryGoods', $param);
    }

    /**
     * 4.2.13 冻结金额
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function freezeMoney()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'bizFreezenNo' => $this->request->getBizFreezenNo(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'amount' => $this->request->getAmount(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'freezeMoney', $param);
    }

    /**
     * 4.2.14 解冻金额
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function unfreezeMoney()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'bizFreezenNo' => $this->request->getBizFreezenNo(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'amount' => $this->request->getAmount(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'unfreezeMoney', $param);
    }

    /**
     * 4.2.16 退款申请
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function refund()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'oriBizOrderNo' => $this->request->getOriBizOrderNo(),
            'bizUserId' => $this->request->getBizUserId(),
            'refundType' => $this->request->getRefundType(),
            'refundList' => $this->request->getRefundList(),
            'backUrl' => $this->request->getBackUrl(),
            'amount' => $this->request->getAmount(),
            'couponAmount' => $this->request->getCouponAmount(),
            'feeAmount' => $this->request->getFeeAmount(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'refund', $param);
    }

    /**
     * 4.2.17 平台转账
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function applicationTransfer()
    {
        $param = [
            'bizTransferNo' => $this->request->getBizTransferNo(),
            'sourceAccountSetNo' => $this->request->getSourceAccountSetNo(),
            'targetBizUserId' => $this->request->getTargetBizUserId(),
            'targetAccountSetNo' => $this->request->getTargetAccountSetNo(),
            'amount' => $this->request->getAmount(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'applicationTransfer', $param);
    }

    /**
     * 4.2.18 查询余额
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function queryBalance()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryBalance', $param);
    }

    /**
     * 4.2.19 查询订单状态
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function getOrderDetail()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo()
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getOrderDetail', $param);
    }

    /**
     * 4.2.20 查询账户收支明细
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function queryInExpDetail()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'dateStart' => $this->request->getDateStart(),
            'dateEnd' => $this->request->getDateEnd(),
            'startPosition' => $this->request->getStartPosition(),
            'queryNum' => $this->request->getQueryNum(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryInExpDetail', $param);
    }

    /**
     * 4.2.21 付款方资金代付明细查询
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function getPaymentInformationDetail()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'dateStart' => $this->request->getDateStart(),
            'dateEnd' => $this->request->getDateEnd(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getPaymentInformationDetail', $param);
    }

    /**
     * 4.2.22 收款方在途资金明细查询
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function getPayeeFundsInTransitDetail()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'dateStart' => $this->request->getDateStart(),
            'dateEnd' => $this->request->getDateEnd(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getPayeeFundsInTransitDetail', $param);
    }

    /**
     * 4.2.23 跨境提现申请
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function crossBorderWithdrawApply()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'amount' => $this->request->getAmount(),
            'fee' => $this->request->getFee(),
            'validateType' => $this->request->getValidateType(),
            'backUrl' => $this->request->getBackUrl(),
            'orderExpireDatetime' => $this->request->getOrderExpireDatetime(),
            'payMethod' => $this->request->getPayMethod(),
            'crossBorderbizUserId' => $this->request->getCrossBorderbizUserId(),
            'bankCardNo' => $this->request->getBankCardNo() ? $this->allinpay->RsaEncode($this->request->getBankCardNo()) : null,
            'bankCardPro' => $this->request->getBankCardPro(),
            'withdrawType' => $this->request->getWithdrawType(),
            'industryCode' => $this->request->getIndustryCode(),
            'industryName' => $this->request->getIndustryName(),
            'source' => $this->request->getSource(),
            'summary' => $this->request->getSummary(),
            'extendInfo' => $this->request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'crossBorderWithdrawApply', $param);
    }

    /**
     * 4.2.24 订单分账明细查询
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function getOrderSplitRuleListDetail()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getOrderSplitRuleListDetail', $param);
    }

    /**
     * 4.2.25 重发支付短信验证码
     *
     * @param OrderRequest $this->request
     * @return array|mixed
     */
    public function resendPaySMS()
    {
        $param = [
            'bizOrderNo' => $this->request->getBizOrderNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'resendPaySMS', $param);
    }

}