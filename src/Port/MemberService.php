<?php
/**
 *
 *
 * @date 2019/9/5 15:34
 */

namespace Onex\Allinpay\Port;

use Onex\Allinpay\Common\AllinpayClient;
use Onex\Allinpay\Requests\MemberRequest;

class MemberService
{
    private $allinpay;

    private $request;

    public function __construct($config, MemberRequest $request) {
        $this->allinpay = new AllinpayClient($config);
        $this->request = $request;
    }

    /**
     * 4.1.1 创建会员
     *
     * @param MemberRequest $this->request
     * @return array
     */
    public function createMember()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'memberType' => $this->request->getMemberType(),
            'source' => $this->request->getSource(),
            'extendParam' => $this->request->getExtendParam(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'createMember', $param);
    }

    /**
     * 4.1.2 发送短信验证码
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function sendVerificationCode()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'phone' => $this->request->getPhone(),
            'verificationCodeType' => $this->request->getVerificationCodeType(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'sendVerificationCode', $param);
    }

    /**
     * 4.1.3 绑定手机
     *
     * @param MemberRequest $this->request
     * @return array
     */
    public function bindPhone()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'phone' => $this->request->getPhone(),
            'verificationCode' => $this->request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bindPhone', $param);
    }

    /**
     * 4.1.4 会员电子协议签约
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function signContract()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'jumpUrl' => $this->request->getJumpUrl(),
            'backUrl' => $this->request->getBackUrl(),
            'source' => $this->request->getSource(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberService', 'signContract', $param);
    }

    /**
     * 4.1.5 个人实名认证
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function setRealName()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'name' => $this->request->getName(),
            // 类型（身份证=1）目前只支持身份证
            'identityType' => $this->request->getIdentityType(),
            // RSA 加密
            'identityNo' => $this->allinpay->RsaEncode($this->request->getIdentityNo()),
            'isAuth' => $this->request->getIsAuth(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'setRealName', $param);
    }

    /**
     * 4.1.6 设置企业信息
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function setCompanyInfo()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'backUrl' => $this->request->getBackUrl(),
            // JSONObject
            'companyBasicInfo' => $this->request->getCompanyBasicInfo(),
            'isAuth' => $this->request->getIsAuth(),
            'companyExtendInfo' => $this->request->getCompanyExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'setCompanyInfo', $param);
    }

    /**
     * 4.1.7 企业信息审核结果通知
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */

    /**
     * 4.1.8 获取会员信息
     *
     * @param MemberRequest $this->request
     * @return array
     */
    public function getMemberInfo()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'getMemberInfo', $param);
    }

    /**
     * 4.1.9 查询卡 bin
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function getBankCardBin()
    {
        $param = [
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'getBankCardBin', $param);
    }

    /**
     * 4.1.10 请求绑定银行卡
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function applyBindBankCard()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
            'phone' => $this->request->getPhone(),
            'name' => $this->request->getName(),
            // 类型（身份证=1）目前只支持身份证
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->allinpay->RsaEncode($this->request->getIdentityNo()),

            // 以下为非必填
            'cardCheck' => $this->request->getCardCheck(),
            'validate' => $this->request->getValidate(),
            'cvv2' => $this->request->getCvv2() ? $this->allinpay->RsaEncode($this->request->getCvv2()) : null,
            'isSafeCard' => $this->request->getIsSafeCard(),
            'unionBank' => $this->request->getUnionBank(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'applyBindBankCard', $param);
    }

    /**
     * 4.1.11 确认绑定银行卡
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function bindBankCard()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'tranceNum' => $this->request->getTranceNum(),
            'transDate' => $this->request->getTransDate(),
            'phone' => $this->request->getPhone(),
            'validate' => $this->request->getvalidate() ? $this->allinpay->RsaEncode($this->request->getvalidate()) : null,
            'cvv2' => $this->request->getCvv2() ? $this->allinpay->RsaEncode($this->request->getCvv2()) : null,
            'verificationCode' => $this->request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bindBankCard', $param);
    }

    /**
     * 4.1.12 设置安全卡
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function setSafeCard()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
            'setSafeCard' => $this->request->getSetSafeCard(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'setSafeCard', $param);
    }

    /**
     * 4.1.13 查询绑定银行卡
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function queryBankCard()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'queryBankCard', $param);
    }

    /**
     * 4.1.14 解绑绑定银行卡
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function unbindBankCard()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unbindBankCard', $param);
    }

    /**
     * 4.1.15 锁定会员
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function lockMember()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'lockMember', $param);
    }

    /**
     * 4.1.16 解锁会员
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function unlockMember()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unlockMember', $param);
    }

    /**
     * 4.1.17 设置支付密码【密码验证版】
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function setPayPwd()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'phone' => $this->request->getPhone(),
            'name' => $this->request->getName(),
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->request->getIdentityNo() ? $this->allinpay->RsaEncode($this->request->getIdentityNo()) : null,
            'jumpUrl' => $this->request->getJumpUrl(),
            'backUrl' => $this->request->getBackUrl(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberPwdService', 'setPayPwd', $param);
    }

    /**
     * 4.1.18 修改支付密码【密码验证版】
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function updatePayPwd()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'name' => $this->request->getName(),
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->request->getIdentityNo() ? $this->allinpay->RsaEncode($this->request->getIdentityNo()) : null,
            'jumpUrl' => $this->request->getJumpUrl(),
            'backUrl' => $this->request->getBackUrl(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberPwdService', 'updatePayPwd', $param);
    }

    /**
     * 4.1.19 重置支付密码【密码验证版】
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function resetPayPwd()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'phone' => $this->request->getPhone(),
            'name' => $this->request->getName(),
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->request->getIdentityNo() ? $this->allinpay->RsaEncode($this->request->getIdentityNo()) : null,
            'jumpUrl' => $this->request->getJumpUrl(),
            'backUrl' => $this->request->getBackUrl(),
        ];
        return $this->allinpay->AllinpayCurl('MemberPwdService', 'resetPayPwd', $param);
    }

    /**
     * 4.1.20 修改绑定手机【密码验证版】
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function updatePhoneByPayPwd()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'oldPhone' => $this->request->getPhone(),
            'name' => $this->request->getName(),
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->request->getIdentityNo() ? $this->allinpay->RsaEncode($this->request->getIdentityNo()) : null,
            'jumpUrl' => $this->request->getJumpUrl(),
            'backUrl' => $this->request->getBackUrl(),
        ];
        return $this->allinpay->AllinpayCurl('MemberPwdService', 'updatePhoneByPayPwd', $param);
    }

    /**
     * 4.1.21 会员收银宝渠道商户信息及终端信息绑定
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function vspTermidService()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'operationType' => $this->request->getOperationType(),
            'vspMerchantid' => $this->request->getVspMerchantid(),
            'vspCusid' => $this->request->getVspCusid(),
            'appid' => $this->request->getAppid(),
            'vspTermid' => $this->request->getVspTermid(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'vspTermidService', $param);
    }

    /**
     * 4.1.22 当面付标准模式支付及收银宝 POS 订单支付订单补登[回调]
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */

    /**
     * 4.1.23 会员绑定支付账户用户标识
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function applyBindAcct()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'operationType' => $this->request->getOperationType(),
            // weChatPublic -微信公众号 weChatMiniProgram -微信小程序 aliPayService -支付宝生活号
            'acctType' => $this->request->getAcctType(),
            // 微信公众号支付 openid——微信分配 微信小程序支付 openid——微信分配 支付宝生活号支付 user_id——支付宝分配 附：openid 示例 oUpF8uMuAJO_M2pxb1Q9zNjWeS6o
            'acct' => $this->request->getAcct(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'applyBindAcct', $param);
    }

    /**
     * 4.1.24 解绑手机(验证原手机短信验证码)
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function unbindPhone()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'phone' => $this->request->getPhone(),
            'verificationCode' => $this->request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unbindPhone', $param);
    }

    /**
     * 4.1.25 修改绑定手机(银行卡验证)
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function bankCardChangeBindPhone()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'cardNo' => $this->request->getCardNo() ? $this->allinpay->RsaEncode($this->request->getCardNo()) : null,
            'phone' => $this->request->getPhone(),
            'name' => $this->request->getName(),
            'cardCheck' => $this->request->getCardCheck(), // 2-ITS 四要素+短信 6-通联通协议支付签约 7-收银宝快捷支付签约
            'identityType' => $this->request->getIdentityType(),
            'identityNo' => $this->request->getIdentityNo() ? $this->allinpay->RsaEncode($this->request->getIdentityNo()) : null,
            'validate' => $this->request->getValidate(),
            'cvv2' => $this->request->getCvv2() ? $this->allinpay->RsaEncode($this->request->getCvv2()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bankCardChangeBindPhone', $param);
    }

    /**
     * 4.1.26 确定修改绑定手机(银行卡验证)
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function verifyBankCardChangeBindPhone()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'tranceNum' => $this->request->getTranceNum(),
            'transDate' => $this->request->getTransDate(),
            'phone' => $this->request->getPhone(),
            'verificationCode' => $this->request->getVerificationCode(),
            'validate' => $this->request->getValidate(),
            'cvv2' => $this->request->getCvv2() ? $this->allinpay->RsaEncode($this->request->getCvv2()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'verifyBankCardChangeBindPhone', $param);
    }

    /**
     * 4.1.27 子账户开户
     *
     * @param MemberRequest $this->request
     * @return array|mixed
     */
    public function createBankSubAcctNo()
    {
        $param = [
            'bizUserId' => $this->request->getBizUserId(),
            'accountSetNo' => $this->request->getAccountSetNo(),
            'acctOrgType' => $this->request->getAcctOrgType(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'createBankSubAcctNo', $param);
    }

}