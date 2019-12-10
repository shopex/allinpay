<?php
/**
 *
 *
 * @date 2019/9/5 15:34
 */

namespace Tonglian\Allinpay\Port;

use Tonglian\Allinpay\Common\AllinpayClient;
use Tonglian\Allinpay\Requests\MemberRequest;

class MemberService
{
    private $allinpay;

    public function __construct($config) {
        $this->allinpay = new AllinpayClient($config);
    }

    /**
     * 4.1.1 创建会员
     *
     * @param MemberRequest $request
     * @return array
     */
    public function createMember(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'memberType' => $request->getMemberType(),
            'source' => $request->getSource(),
            'extendParam' => $request->getExtendParam(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'createMember', $param);
    }

    /**
     * 4.1.2 发送短信验证码
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function sendVerificationCode(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'phone' => $request->getPhone(),
            'verificationCodeType' => $request->getVerificationCodeType(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'sendVerificationCode', $param);
    }

    /**
     * 4.1.3 绑定手机
     *
     * @param MemberRequest $request
     * @return array
     */
    public function bindPhone(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'phone' => $request->getPhone(),
            'verificationCode' => $request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bindPhone', $param);
    }

    /**
     * 4.1.4 会员电子协议签约
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function signContract(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'jumpUrl' => $request->getJumpUrl(),
            'backUrl' => $request->getBackUrl(),
            'source' => $request->getSource(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberService', 'signContract', $param);
    }

    /**
     * 4.1.5 个人实名认证
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function setRealName(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'name' => $request->getName(),
            // 类型（身份证=1）目前只支持身份证
            'identityType' => $request->getIdentityType(),
            // RSA 加密
            'identityNo' => $this->allinpay->RsaEncode($request->getIdentityNo()),
            'isAuth' => $request->getIsAuth(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'setRealName', $param);
    }

    /**
     * 4.1.6 设置企业信息
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function setCompanyInfo(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'backUrl' => $request->getBackUrl(),
            // JSONObject
            'companyBasicInfo' => $request->getCompanyBasicInfo(),
            'isAuth' => $request->getIsAuth(),
            'companyExtendInfo' => $request->getCompanyExtendInfo(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'setCompanyInfo', $param);
    }

    /**
     * 4.1.7 企业信息审核结果通知
     *
     * @param MemberRequest $request
     * @return array|mixed
     */

    /**
     * 4.1.8 获取会员信息
     *
     * @param MemberRequest $request
     * @return array
     */
    public function getMemberInfo(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'getMemberInfo', $param);
    }

    /**
     * 4.1.9 查询卡 bin
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function getBankCardBin(MemberRequest $request)
    {
        $param = [
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'getBankCardBin', $param);
    }

    /**
     * 4.1.10 请求绑定银行卡
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function applyBindBankCard(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
            'phone' => $request->getPhone(),
            'name' => $request->getName(),
            // 类型（身份证=1）目前只支持身份证
            'identityType' => $request->getIdentityType(),
            'identityNo' => $this->allinpay->RsaEncode($request->getIdentityNo()),

            // 以下为非必填
            'cardCheck' => $request->getCardCheck(),
            'validate' => $request->getValidate(),
            'cvv2' => $request->getCvv2() ? $this->allinpay->RsaEncode($request->getCvv2()) : null,
            'isSafeCard' => $request->getIsSafeCard(),
            'unionBank' => $request->getUnionBank(),
        ];

        return $this->allinpay->AllinpayCurl('MemberService', 'applyBindBankCard', $param);
    }

    /**
     * 4.1.11 确认绑定银行卡
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function bindBankCard(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'tranceNum' => $request->getTranceNum(),
            'transDate' => $request->getTransDate(),
            'phone' => $request->getPhone(),
            'validate' => $request->getvalidate() ? $this->allinpay->RsaEncode($request->getvalidate()) : null,
            'cvv2' => $request->getCvv2() ? $this->allinpay->RsaEncode($request->getCvv2()) : null,
            'verificationCode' => $request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bindBankCard', $param);
    }

    /**
     * 4.1.12 设置安全卡
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function setSafeCard(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
            'setSafeCard' => $request->getSetSafeCard(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'setSafeCard', $param);
    }

    /**
     * 4.1.13 查询绑定银行卡
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function queryBankCard(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'queryBankCard', $param);
    }

    /**
     * 4.1.14 解绑绑定银行卡
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function unbindBankCard(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unbindBankCard', $param);
    }

    /**
     * 4.1.15 锁定会员
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function lockMember(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'lockMember', $param);
    }

    /**
     * 4.1.16 解锁会员
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function unlockMember(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unlockMember', $param);
    }

    /**
     * 4.1.17 设置支付密码【密码验证版】
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function setPayPwd(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'phone' => $request->getPhone(),
            'name' => $request->getName(),
            'identityType' => $request->getIdentityType(),
            'identityNo' => $request->getIdentityNo() ? $this->allinpay->RsaEncode($request->getIdentityNo()) : null,
            'jumpUrl' => $request->getJumpUrl(),
            'backUrl' => $request->getBackUrl(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberPwdService', 'setPayPwd', $param);
    }

    /**
     * 4.1.18 修改支付密码【密码验证版】
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function updatePayPwd(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'name' => $request->getName(),
            'identityType' => $request->getIdentityType(),
            'identityNo' => $request->getIdentityNo() ? $this->allinpay->RsaEncode($request->getIdentityNo()) : null,
            'jumpUrl' => $request->getJumpUrl(),
            'backUrl' => $request->getBackUrl(),
        ];
        return $this->allinpay->getPaymentCodeParams('MemberPwdService', 'updatePayPwd', $param);
    }

    /**
     * 4.1.19 重置支付密码【密码验证版】
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function resetPayPwd(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'phone' => $request->getPhone(),
            'name' => $request->getName(),
            'identityType' => $request->getIdentityType(),
            'identityNo' => $request->getIdentityNo() ? $this->allinpay->RsaEncode($request->getIdentityNo()) : null,
            'jumpUrl' => $request->getJumpUrl(),
            'backUrl' => $request->getBackUrl(),
        ];
        return $this->allinpay->AllinpayCurl('MemberPwdService', 'resetPayPwd', $param);
    }

    /**
     * 4.1.20 修改绑定手机【密码验证版】
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function updatePhoneByPayPwd(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'oldPhone' => $request->getPhone(),
            'name' => $request->getName(),
            'identityType' => $request->getIdentityType(),
            'identityNo' => $request->getIdentityNo() ? $this->allinpay->RsaEncode($request->getIdentityNo()) : null,
            'jumpUrl' => $request->getJumpUrl(),
            'backUrl' => $request->getBackUrl(),
        ];
        return $this->allinpay->AllinpayCurl('MemberPwdService', 'updatePhoneByPayPwd', $param);
    }

    /**
     * 4.1.21 会员收银宝渠道商户信息及终端信息绑定
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function vspTermidService(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'operationType' => $request->getOperationType(),
            'vspMerchantid' => $request->getVspMerchantid(),
            'vspCusid' => $request->getVspCusid(),
            'appid' => $request->getAppid(),
            'vspTermid' => $request->getVspTermid(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'vspTermidService', $param);
    }

    /**
     * 4.1.22 当面付标准模式支付及收银宝 POS 订单支付订单补登[回调]
     *
     * @param MemberRequest $request
     * @return array|mixed
     */

    /**
     * 4.1.23 会员绑定支付账户用户标识
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function applyBindAcct(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'operationType' => $request->getOperationType(),
            // weChatPublic -微信公众号 weChatMiniProgram -微信小程序 aliPayService -支付宝生活号
            'acctType' => $request->getAcctType(),
            // 微信公众号支付 openid——微信分配 微信小程序支付 openid——微信分配 支付宝生活号支付 user_id——支付宝分配 附：openid 示例 oUpF8uMuAJO_M2pxb1Q9zNjWeS6o
            'acct' => $request->getAcct(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'applyBindAcct', $param);
    }

    /**
     * 4.1.24 解绑手机(验证原手机短信验证码)
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function unbindPhone(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'phone' => $request->getPhone(),
            'verificationCode' => $request->getVerificationCode(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'unbindPhone', $param);
    }

    /**
     * 4.1.25 修改绑定手机(银行卡验证)
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function bankCardChangeBindPhone(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'cardNo' => $request->getCardNo() ? $this->allinpay->RsaEncode($request->getCardNo()) : null,
            'phone' => $request->getPhone(),
            'name' => $request->getName(),
            'cardCheck' => $request->getCardCheck(), // 2-ITS 四要素+短信 6-通联通协议支付签约 7-收银宝快捷支付签约
            'identityType' => $request->getIdentityType(),
            'identityNo' => $request->getIdentityNo() ? $this->allinpay->RsaEncode($request->getIdentityNo()) : null,
            'validate' => $request->getValidate(),
            'cvv2' => $request->getCvv2() ? $this->allinpay->RsaEncode($request->getCvv2()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'bankCardChangeBindPhone', $param);
    }

    /**
     * 4.1.26 确定修改绑定手机(银行卡验证)
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function verifyBankCardChangeBindPhone(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'tranceNum' => $request->getTranceNum(),
            'transDate' => $request->getTransDate(),
            'phone' => $request->getPhone(),
            'verificationCode' => $request->getVerificationCode(),
            'validate' => $request->getValidate(),
            'cvv2' => $request->getCvv2() ? $this->allinpay->RsaEncode($request->getCvv2()) : null,
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'verifyBankCardChangeBindPhone', $param);
    }

    /**
     * 4.1.27 子账户开户
     *
     * @param MemberRequest $request
     * @return array|mixed
     */
    public function createBankSubAcctNo(MemberRequest $request)
    {
        $param = [
            'bizUserId' => $request->getBizUserId(),
            'accountSetNo' => $request->getAccountSetNo(),
            'acctOrgType' => $request->getAcctOrgType(),
        ];
        return $this->allinpay->AllinpayCurl('MemberService', 'createBankSubAcctNo', $param);
    }

}