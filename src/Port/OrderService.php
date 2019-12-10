<?php
/**
 *
 *
 * @date 2019/9/5 15:34
 */

namespace Tonglian\Allinpay\Port;

use Tonglian\Allinpay\Common\AllinpayClient;
use Tonglian\Allinpay\Requests\OrderRequest;

class OrderService
{

    private $allinpay;

    public function __construct($config) {
        $this->allinpay = new AllinpayClient($config);
    }

    /**
     * 4.2.1 订单类接口调用说明
     *
     * @param OrderRequest $request
     * @return array|mixed
     */

    /**
     * 4.2.2 充值申请
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function depositApply(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'validateType' => $request->getValidateType(),
            'frontUrl' => $request->getFrontUrl(),
            'backUrl' => $request->getBackUrl(),
            'orderExpireDatetime' => $request->getOrderExpireDatetime(),
            'payMethod' => $request->getPayMethod(),
            'goodsName' => $request->getGoodsName(),
            'goodsDesc' => $request->getGoodsDesc(),
            'industryCode' => $request->getIndustryCode(),
            'industryName' => $request->getIndustryName(),
            'source' => $request->getSource(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'depositApply', $param);
    }

    /**
     * 4.2.3 提现申请
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function withdrawApply(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'validateType' => $request->getValidateType(),
            'backUrl' => $request->getBackUrl(),
            'orderExpireDatetime' => $request->getOrderExpireDatetime(),
            'payMethod' => $request->getPayMethod(),
            'bankCardNo' => $request->getBankCardNo() ? $this->allinpay->RsaEncode($request->getBankCardNo()) : null,
            'bankCardPro' => $request->getBankCardPro(),
            'withdrawType' => $request->getWithdrawType(),
            'industryCode' => $request->getIndustryCode(),
            'industryName' => $request->getIndustryName(),
            'source' => $request->getSource(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'withdrawApply', $param);
    }

    /**
     * 4.2.4 消费申请
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function consumeApply(OrderRequest $request)
    {
        $param = [
            'payerId' => $request->getPayerId(),
            'recieverId' => $request->getRecieverId(),
            'bizOrderNo' => $request->getBizOrderNo(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'validateType' => $request->getValidateType(),
            'splitRule' => $request->getSplitRule(),
            'frontUrl' => $request->getFrontUrl(),
            'backUrl' => $request->getBackUrl(),
            'orderExpireDatetime' => $request->getOrderExpireDatetime(),
            'payMethod' => $request->getPayMethod(),
            'goodsType' => $request->getGoodsType(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
            'goodsName' => $request->getGoodsName(),
            'goodsDesc' => $request->getGoodsDesc(),
            'industryCode' => $request->getIndustryCode(),
            'industryName' => $request->getIndustryName(),
            'source' => $request->getSource(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'consumeApply', $param);
    }

    /**
     * 4.2.5 托管代收申请(标准版)
     *
     * @param OrderRequest $request
     * @return array
     */
    public function agentCollectApply(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'payerId' => $request->getPayerId(),
            'recieverList' => $request->getRecieverList(),
            'goodsType' => $request->getGoodsType(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
            'tradeCode' => $request->getTradeCode(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'validateType' => $request->getValidateType(),
            'frontUrl' => $request->getFrontUrl(),
            'backUrl' => $request->getBackUrl(),
            'orderExpireDatetime' => $request->getOrderExpireDatetime(),
            'payMethod' => $request->getPayMethod(),
            'goodsName' => $request->getGoodsName(),
            'goodsDesc' => $request->getGoodsDesc(),
            'industryCode' => $request->getIndustryCode(),
            'industryName' => $request->getIndustryName(),
            'source' => $request->getSource(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('OrderService', 'agentCollectApply', $param);
    }

    /**
     * 4.2.6 单笔托管代付(标准版)
     *
     * @param OrderRequest $request
     * @return array
     */
    public function signalAgentPay(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'collectPayList' => $request->getCollectPayList(),
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'backUrl' => $request->getBackUrl(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'splitRuleList' => $request->getSplitRuleList(),
            'goodsType' => $request->getGoodsType(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
            'tradeCode' => $request->getTradeCode(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'signalAgentPay', $param);
    }

    /**
     * 4.2.7 批量托管代付（标准版）
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function batchAgentPay(OrderRequest $request)
    {
        $param = [
            'bizBatchNo' => $request->getBizBatchNo(),
            'batchPayList' => $request->getBatchPayList(),
            'goodsType' => $request->getgoodsType(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
            'tradeCode' => $request->gettradeCode(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'batchAgentPay', $param);
    }

    /**
     * 4.2.8 确认支付(后台+短信验证码确认)
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function pay(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'bizOrderNo' => $request->getBizOrderNo(),
            'tradeNo' => $request->getTradeNo(),
            'jumpUrl' => $request->getJumpUrl(),
            'verificationCode' => $request->getVerificationCode(),
            'consumerIp' => $request->getConsumerIp(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'pay', $param);
    }

    /**
     * 4.2.9 确认支付(前台+短信验证码确认)[api pay]
     *
     * @param OrderRequest $request
     * @return array|mixed
     */

    /**
     * 4.2.10 确认支付(前台+密码验证版)[api pay]
     *
     * @param OrderRequest $request
     * @return array|mixed
     */

    /**
     * 4.2.11 商品录入
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function entryGoods(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'goodsType' => $request->getGoodsType(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
            'goodsName' => $request->getGoodsName(),
            'goodsDetail' => $request->getGoodsDetail(),
            'goodsParams' => $request->getGoodsParams(),
            'showUrl' => $request->getShowUrl(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'entryGoods', $param);
    }

    /**
     * 4.2.12 查询商品
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function queryGoods(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'bizGoodsNo' => $request->getBizGoodsNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryGoods', $param);
    }

    /**
     * 4.2.13 冻结金额
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function freezeMoney(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'bizFreezenNo' => $request->getBizFreezenNo(),
            'accountSetNo' => $request->getAccountSetNo(),
            'amount' => $request->getAmount(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'freezeMoney', $param);
    }

    /**
     * 4.2.14 解冻金额
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function unfreezeMoney(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'bizFreezenNo' => $request->getBizFreezenNo(),
            'accountSetNo' => $request->getAccountSetNo(),
            'amount' => $request->getAmount(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'unfreezeMoney', $param);
    }

    /**
     * 4.2.16 退款申请
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function refund(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'oriBizOrderNo' => $request->getOriBizOrderNo(),
            'bizUserId' => $request->getBizUserId(),
            'refundType' => $request->getRefundType(),
            'refundList' => $request->getRefundList(),
            'backUrl' => $request->getBackUrl(),
            'amount' => $request->getAmount(),
            'couponAmount' => $request->getCouponAmount(),
            'feeAmount' => $request->getFeeAmount(),
            'extendInfo' => $request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'refund', $param);
    }

    /**
     * 4.2.17 平台转账
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function applicationTransfer(OrderRequest $request)
    {
        $param = [
            'bizTransferNo' => $request->getBizTransferNo(),
            'sourceAccountSetNo' => $request->getSourceAccountSetNo(),
            'targetBizUserId' => $request->getTargetBizUserId(),
            'targetAccountSetNo' => $request->getTargetAccountSetNo(),
            'amount' => $request->getAmount(),
            'extendInfo' => $request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'applicationTransfer', $param);
    }

    /**
     * 4.2.18 查询余额
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function queryBalance(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryBalance', $param);
    }

    /**
     * 4.2.19 查询订单状态
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function getOrderDetail(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo()
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getOrderDetail', $param);
    }

    /**
     * 4.2.20 查询账户收支明细
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function queryInExpDetail(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'dateStart' => $request->getDateStart(),
            'dateEnd' => $request->getDateEnd(),
            'startPosition' => $request->getStartPosition(),
            'queryNum' => $request->getQueryNum(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'queryInExpDetail', $param);
    }

    /**
     * 4.2.21 付款方资金代付明细查询
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function getPaymentInformationDetail(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'dateStart' => $request->getDateStart(),
            'dateEnd' => $request->getDateEnd(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getPaymentInformationDetail', $param);
    }

    /**
     * 4.2.22 收款方在途资金明细查询
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function getPayeeFundsInTransitDetail(OrderRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'bizOrderNo' => $request->getBizOrderNo(),
            'dateStart' => $request->getDateStart(),
            'dateEnd' => $request->getDateEnd(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getPayeeFundsInTransitDetail', $param);
    }

    /**
     * 4.2.23 跨境提现申请
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function crossBorderWithdrawApply(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'amount' => $request->getAmount(),
            'fee' => $request->getFee(),
            'validateType' => $request->getValidateType(),
            'backUrl' => $request->getBackUrl(),
            'orderExpireDatetime' => $request->getOrderExpireDatetime(),
            'payMethod' => $request->getPayMethod(),
            'crossBorderbizUserId' => $request->getCrossBorderbizUserId(),
            'bankCardNo' => $request->getBankCardNo() ? $this->allinpay->RsaEncode($request->getBankCardNo()) : null,
            'bankCardPro' => $request->getBankCardPro(),
            'withdrawType' => $request->getWithdrawType(),
            'industryCode' => $request->getIndustryCode(),
            'industryName' => $request->getIndustryName(),
            'source' => $request->getSource(),
            'summary' => $request->getSummary(),
            'extendInfo' => $request->getExtendInfo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'crossBorderWithdrawApply', $param);
    }

    /**
     * 4.2.24 订单分账明细查询
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function getOrderSplitRuleListDetail(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'getOrderSplitRuleListDetail', $param);
    }

    /**
     * 4.2.25 重发支付短信验证码
     *
     * @param OrderRequest $request
     * @return array|mixed
     */
    public function resendPaySMS(OrderRequest $request)
    {
        $param = [
            'bizOrderNo' => $request->getBizOrderNo(),
        ];
        return $this->allinpay->AllinpayCurl('OrderService', 'resendPaySMS', $param);
    }

}