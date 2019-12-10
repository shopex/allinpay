<?php

namespace Onex\Allinpay\Requests;


class MerchantRequest
{
    private $sysid;
    private $date;
    private $fileType;
    private $accountSetNo;
    private $acctOrgType;
    private $acctNo;
    private $acctName;

    /**
     * @return mixed
     */
    public function getSysid()
    {
        return $this->sysid;
    }

    /**
     * @param mixed $sysid
     */
    public function setSysid($sysid): void
    {
        $this->sysid = $sysid;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param mixed $fileType
     */
    public function setFileType($fileType): void
    {
        $this->fileType = $fileType;
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

    /**
     * @return mixed
     */
    public function getAcctNo()
    {
        return $this->acctNo;
    }

    /**
     * @param mixed $acctNo
     */
    public function setAcctNo($acctNo): void
    {
        $this->acctNo = $acctNo;
    }

    /**
     * @return mixed
     */
    public function getAcctName()
    {
        return $this->acctName;
    }

    /**
     * @param mixed $acctName
     */
    public function setAcctName($acctName): void
    {
        $this->acctName = $acctName;
    }

}