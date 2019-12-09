<?php

namespace Tonglian\Allinpay\Requests;


class MemberRequest
{
    private $bizUserId;
    private $memberType;
    private $source;
    private $extendParam;
    private $phone;
    private $verificationCode;
    private $jumpUrl;
    private $backUrl;
    private $isAuth;
    private $name;
    private $identityType;
    private $identityNo;
    private $companyBasicInfo;
    private $companyExtendInfo;
    private $cardNo;
    private $cardCheck;
    private $cvv2;
    private $isSafeCard;
    private $unionBank;
    private $validate;
    private $verificationCodeType;
    private $tranceNum;
    private $transDate;
    private $operationType;
    private $acctType;
    private $acct;
    private $vspMerchantid;
    private $vspCusid;
    private $appid;
    private $vspTermid;
    private $result;
    private $checkTime;
    private $remark;
    private $failReason;
    private $setSafeCard;
    private $accountSetNo;
    private $acctOrgType;

    /**
     * @return mixed
     */
    public function getBizUserId()
    {
        return $this->bizUserId;
    }

    /**
     * @param mixed $bizUserId
     */
    public function setBizUserId($bizUserId): void
    {
        $this->bizUserId = $bizUserId;
    }

    /**
     * @return mixed
     */
    public function getMemberType()
    {
        return $this->memberType;
    }

    /**
     * @param mixed $memberType
     */
    public function setMemberType($memberType): void
    {
        $this->memberType = $memberType;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source): void
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getExtendParam()
    {
        return $this->extendParam;
    }

    /**
     * @param mixed $extendParam
     */
    public function setExtendParam($extendParam): void
    {
        $this->extendParam = $extendParam;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getVerificationCode()
    {
        return $this->verificationCode;
    }

    /**
     * @param mixed $verificationCode
     */
    public function setVerificationCode($verificationCode): void
    {
        $this->verificationCode = $verificationCode;
    }

    /**
     * @return mixed
     */
    public function getJumpUrl()
    {
        return $this->jumpUrl;
    }

    /**
     * @param mixed $jumpUrl
     */
    public function setJumpUrl($jumpUrl): void
    {
        $this->jumpUrl = $jumpUrl;
    }

    /**
     * @return mixed
     */
    public function getBackUrl()
    {
        return $this->backUrl;
    }

    /**
     * @param mixed $backUrl
     */
    public function setBackUrl($backUrl): void
    {
        $this->backUrl = $backUrl;
    }

    /**
     * @return mixed
     */
    public function getIsAuth()
    {
        return $this->isAuth;
    }

    /**
     * @param mixed $isAuth
     */
    public function setIsAuth($isAuth): void
    {
        $this->isAuth = $isAuth;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdentityType()
    {
        return $this->identityType;
    }

    /**
     * @param mixed $identityType
     */
    public function setIdentityType($identityType): void
    {
        $this->identityType = $identityType;
    }

    /**
     * @return mixed
     */
    public function getIdentityNo()
    {
        return $this->identityNo;
    }

    /**
     * @param mixed $identityNo
     */
    public function setIdentityNo($identityNo): void
    {
        $this->identityNo = $identityNo;
    }

    /**
     * @return mixed
     */
    public function getCompanyBasicInfo()
    {
        return $this->companyBasicInfo;
    }

    /**
     * @param mixed $companyBasicInfo
     */
    public function setCompanyBasicInfo($companyBasicInfo): void
    {
        $this->companyBasicInfo = $companyBasicInfo;
    }

    /**
     * @return mixed
     */
    public function getCompanyExtendInfo()
    {
        return $this->companyExtendInfo;
    }

    /**
     * @param mixed $companyExtendInfo
     */
    public function setCompanyExtendInfo($companyExtendInfo): void
    {
        $this->companyExtendInfo = $companyExtendInfo;
    }

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo): void
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getCardCheck()
    {
        return $this->cardCheck;
    }

    /**
     * @param mixed $cardCheck
     */
    public function setCardCheck($cardCheck): void
    {
        $this->cardCheck = $cardCheck;
    }

    /**
     * @return mixed
     */
    public function getCvv2()
    {
        return $this->cvv2;
    }

    /**
     * @param mixed $cvv2
     */
    public function setCvv2($cvv2): void
    {
        $this->cvv2 = $cvv2;
    }

    /**
     * @return mixed
     */
    public function getIsSafeCard()
    {
        return $this->isSafeCard;
    }

    /**
     * @param mixed $isSafeCard
     */
    public function setIsSafeCard($isSafeCard): void
    {
        $this->isSafeCard = $isSafeCard;
    }

    /**
     * @return mixed
     */
    public function getUnionBank()
    {
        return $this->unionBank;
    }

    /**
     * @param mixed $unionBank
     */
    public function setUnionBank($unionBank): void
    {
        $this->unionBank = $unionBank;
    }

    /**
     * @return mixed
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * @param mixed $validate
     */
    public function setValidate($validate): void
    {
        $this->validate = $validate;
    }

    /**
     * @return mixed
     */
    public function getVerificationCodeType()
    {
        return $this->verificationCodeType;
    }

    /**
     * @param mixed $verificationCodeType
     */
    public function setVerificationCodeType($verificationCodeType): void
    {
        $this->verificationCodeType = $verificationCodeType;
    }

    /**
     * @return mixed
     */
    public function getTranceNum()
    {
        return $this->tranceNum;
    }

    /**
     * @param mixed $tranceNum
     */
    public function setTranceNum($tranceNum): void
    {
        $this->tranceNum = $tranceNum;
    }

    /**
     * @return mixed
     */
    public function getTransDate()
    {
        return $this->transDate;
    }

    /**
     * @param mixed $transDate
     */
    public function setTransDate($transDate): void
    {
        $this->transDate = $transDate;
    }

    /**
     * @return mixed
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * @param mixed $operationType
     */
    public function setOperationType($operationType): void
    {
        $this->operationType = $operationType;
    }

    /**
     * @return mixed
     */
    public function getAcctType()
    {
        return $this->acctType;
    }

    /**
     * @param mixed $acctType
     */
    public function setAcctType($acctType): void
    {
        $this->acctType = $acctType;
    }

    /**
     * @return mixed
     */
    public function getAcct()
    {
        return $this->acct;
    }

    /**
     * @param mixed $acct
     */
    public function setAcct($acct): void
    {
        $this->acct = $acct;
    }

    /**
     * @return mixed
     */
    public function getVspMerchantid()
    {
        return $this->vspMerchantid;
    }

    /**
     * @param mixed $vspMerchantid
     */
    public function setVspMerchantid($vspMerchantid): void
    {
        $this->vspMerchantid = $vspMerchantid;
    }

    /**
     * @return mixed
     */
    public function getVspCusid()
    {
        return $this->vspCusid;
    }

    /**
     * @param mixed $vspCusid
     */
    public function setVspCusid($vspCusid): void
    {
        $this->vspCusid = $vspCusid;
    }

    /**
     * @return mixed
     */
    public function getAppid()
    {
        return $this->appid;
    }

    /**
     * @param mixed $appid
     */
    public function setAppid($appid): void
    {
        $this->appid = $appid;
    }

    /**
     * @return mixed
     */
    public function getVspTermid()
    {
        return $this->vspTermid;
    }

    /**
     * @param mixed $vspTermid
     */
    public function setVspTermid($vspTermid): void
    {
        $this->vspTermid = $vspTermid;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getCheckTime()
    {
        return $this->checkTime;
    }

    /**
     * @param mixed $checkTime
     */
    public function setCheckTime($checkTime): void
    {
        $this->checkTime = $checkTime;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return mixed
     */
    public function getFailReason()
    {
        return $this->failReason;
    }

    /**
     * @param mixed $failReason
     */
    public function setFailReason($failReason): void
    {
        $this->failReason = $failReason;
    }

    /**
     * @return mixed
     */
    public function getSetSafeCard()
    {
        return $this->setSafeCard;
    }

    /**
     * @param mixed $setSafeCard
     */
    public function setSetSafeCard($setSafeCard): void
    {
        $this->setSafeCard = $setSafeCard;
    }

    /**
     * @return mixed
     */
    public function getAccountSetNo()
    {
        return $this->accountSetNo;
    }

    /**
     * @param mixed $accountSetNo
     */
    public function setAccountSetNo($accountSetNo): void
    {
        $this->accountSetNo = $accountSetNo;
    }

    /**
     * @return mixed
     */
    public function getAcctOrgType()
    {
        return $this->acctOrgType;
    }

    /**
     * @param mixed $acctOrgType
     */
    public function setAcctOrgType($acctOrgType): void
    {
        $this->acctOrgType = $acctOrgType;
    }

}